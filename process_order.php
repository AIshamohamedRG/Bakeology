<?php
// Error handling - turn off display in production
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');

// Database connection
require_once "database.php";
if (!$conn) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validate JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    exit();
}

// Validate request method and data
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}

// Validate required fields
if (!isset($data['customer'], $data['paymentMethod'], $data['items'], $data['total']) ||
    !isset($data['customer']['name'], $data['customer']['email'], $data['customer']['address'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit();
}

try {
    // Prepare the SQL statement
    $sql = "INSERT INTO orders (
        customer_name, 
        customer_email, 
        customer_address, 
        payment_method, 
        order_total, 
        order_items, 
        order_date
    ) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . mysqli_error($conn));
    }
    
    // Bind parameters
    $itemsJson = json_encode($data['items']);
    $bound = mysqli_stmt_bind_param(
        $stmt, 
        "ssssds", 
        $data['customer']['name'],
        $data['customer']['email'],
        $data['customer']['address'],
        $data['paymentMethod'],
        $data['total'],
        $itemsJson
    );
    
    if (!$bound) {
        throw new Exception("Bind failed: " . mysqli_error($conn));
    }
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $response = [
            'success' => true,
            'message' => 'Order placed successfully!',
            'order_id' => mysqli_insert_id($conn)
        ];
    } else {
        throw new Exception("Execute failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    echo json_encode($response);
    
} catch (Exception $e) {
    http_response_code(500);
    error_log($e->getMessage()); // Log the error
    echo json_encode([
        'success' => false,
        'message' => 'Error processing order'
        // In development you might include: 'error' => $e->getMessage()
    ]);
}
?>