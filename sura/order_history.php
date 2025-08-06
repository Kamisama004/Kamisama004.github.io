<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';

// รับข้อมูลจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit_type'];
    $address = $_POST['address'];
    $payment = $_POST['payment_method'];
    $customer = $_POST['customer_name'];

    // ถ้ามีสมาชิกล็อกอิน
    $customer_id = isset($_SESSION['member']['id']) ? $_SESSION['member']['id'] : null;

    // บันทึกลงฐานข้อมูล พร้อม customer_id
    $stmt = $conn->prepare("INSERT INTO orders (customer_id, customer_name, product_id, quantity, unit_type, address, payment_method) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isissss", $customer_id, $customer, $product_id, $quantity, $unit, $address, $payment);

    if ($stmt->execute()) {
        echo "<p class='success-msg'>สั่งซื้อสำเร็จ!</p>";
    } else {
        echo "<p class='error-msg'>เกิดข้อผิดพลาดในการสั่งซื้อ: {$conn->error}</p>";
    }
}

include 'includes/footer.php';
?>
