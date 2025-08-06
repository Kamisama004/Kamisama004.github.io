<?php
session_start();
if (!isset($_SESSION['member'])) {
    header("Location: login.php");
    exit();
}
include 'includes/db_connect.php';
include 'includes/header.php';

$member_id = $_SESSION['member']['id'];

// ดึงข้อมูลประวัติการสั่งซื้อ
$stmt = $conn->prepare("SELECT o.id, p.product_name, o.quantity, o.unit_type, o.payment_method, o.created_at 
                        FROM orders o 
                        LEFT JOIN products p ON o.product_id = p.id 
                        WHERE o.customer_id = ? 
                        ORDER BY o.created_at DESC");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<style>
.profile-card {
    max-width: 500px;
    margin: 30px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    color: #333;
}
.profile-card h2 {
    color: #990000;
    margin-bottom: 20px;
    border-bottom: 2px solid gold;
    padding-bottom: 10px;
}
.profile-card p {
    font-size: 16px;
    margin: 10px 0;
}
.order-history {
    max-width: 1000px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
.order-history h3 {
    color: #990000;
    margin-bottom: 20px;
    border-bottom: 2px solid gold;
    padding-bottom: 10px;
}
.order-history table {
    width: 100%;
    border-collapse: collapse;
}
.order-history th, .order-history td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}
.order-history th {
    background: #990000;
    color: gold;
}
</style>

<div class="profile-card">
    <h2>ข้อมูลสมาชิก</h2>
    <p><strong>ชื่อ:</strong> <?= htmlspecialchars($_SESSION['member']['name']) ?></p>
    <p><strong>อีเมล:</strong> <?= htmlspecialchars($_SESSION['member']['email']) ?></p>
</div>

<div class="order-history">
    <h3>ประวัติการสั่งซื้อ</h3>
    <table>
        <tr>
            <th>รหัส</th>
            <th>สินค้า</th>
            <th>จำนวน</th>
            <th>หน่วย</th>
            <th>ชำระเงิน</th>
            <th>วันที่สั่ง</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['product_name']) ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['unit_type'] ?></td>
            <td><?= $row['payment_method'] ?></td>
            <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
