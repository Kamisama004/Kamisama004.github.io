<form method="post" action="login.php">
    <input type="email" name="email" placeholder="อีเมล" required>
    <input type="password" name="password" placeholder="รหัสผ่าน" required>
    <button type="submit">เข้าสู่ระบบ</button>
</form>

<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM members WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($_POST['password'], $result['password'])) {
        $_SESSION['member'] = $result;
        header("Location: profile.php");
        exit();
    } else {
        echo "เข้าสู่ระบบไม่สำเร็จ";
    }
}
?>
