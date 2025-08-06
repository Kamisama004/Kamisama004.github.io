<!-- register.php -->
<?php include 'includes/header.php'; ?>
<form method="post" action="register_process.php" class="auth-form">
    <h2>สมัครสมาชิก</h2>
    <input type="text" name="name" placeholder="ชื่อ-นามสกุล" required>
    <input type="email" name="email" placeholder="อีเมล" required>
    <input type="password" name="password" placeholder="รหัสผ่าน" required>
    <button type="submit">สมัครสมาชิก</button>
    <div class="link">
        <a href="login.php">กลับไปหน้าเข้าสู่ระบบ</a>
    </div>
</form>
<?php include 'includes/footer.php'; ?>