<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ร้านค้า</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffaf0;
        }

        nav {
            background: linear-gradient(to right, #800000, #b30000);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            z-index: 999;
        }

        .logo img {
            height: 55px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .menu-toggle {
            cursor: pointer;
            display: inline-block;
            background-color: gold;
            color: #800000;
            padding: 6px 12px;
            font-weight: bold;
            border-radius: 6px;
            margin-left: auto;
        }

        .side-menu {
            position: fixed;
            top: 70px;
            right: 0;
            width: 250px;
            max-width: 80%;
            height: auto;
            background-color: #1a1a1a;
            color: gold;
            box-shadow: -2px 0 8px rgba(0,0,0,0.2);
            padding: 20px 15px;
            display: none;
            flex-direction: column;
            gap: 10px;
            border-radius: 10px 0 0 10px;
        }

        .side-menu a {
            color: gold;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .side-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .profile {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .profile a {
            background-color: #b30000;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .profile a:hover {
            background-color: #cc0000;
        }

        .container {
            padding: 30px;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <img src="uploads/logo.jpg" alt="โลโก้ร้านค้า">
    </div>
    <div class="menu-toggle" onclick="toggleMenu()">≡ เมนู</div>
</nav>

<div class="side-menu" id="sideMenu">
    <a href="index.php">หน้าหลัก</a>
    <a href="products.php">สินค้า</a>
    <a href="ome.php">สินค้า OME</a>
    <a href="order.php">สั่งซื้อ</a>
    <a href="about.php">เกี่ยวกับเรา</a>
    <?php if (isset($_SESSION['member'])): ?>
        <div class="profile">
            <span>👤 <?= htmlspecialchars($_SESSION['member']['name']) ?></span>
            <a href="profile.php">โปรไฟล์</a>
            <a href="logout.php">ออกจากระบบ</a>
        </div>
    <?php else: ?>
        <a href="register.php">สมัครสมาชิก</a>
        <a href="login.php">เข้าสู่ระบบ</a>
    <?php endif; ?>
</div>

<div class="container">
    <!-- เนื้อหา -->
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('sideMenu');
        menu.style.display = (menu.style.display === 'flex') ? 'none' : 'flex';
    }
</script>

</body>
</html>
