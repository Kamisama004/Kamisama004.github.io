<?php
include 'includes/db_connect.php';
include 'includes/header.php';

// กำหนดลำดับหมวดหมู่แบบกำหนดเอง
$customOrder = ['กระเทียมดอง', 'น้ำสมสายชู', 'น้ำมะนาว', 'น้ำดื่ม', 'สินค้า OME'];

// ดึงหมวดหมู่ทั้งหมดจากฐานข้อมูล
$result = $conn->query("SELECT * FROM product_categories");
$categories = [];

// สร้าง array ชั่วคราว
while ($row = $result->fetch_assoc()) {
    $categories[$row['category_name']] = $row;
}

// เรียงตามลำดับที่เรากำหนด
echo "<h1 style='text-align:center;'>หมวดหมู่สินค้า</h1>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;'>";

foreach ($customOrder as $catName) {
    if (isset($categories[$catName])) {
        $image = $categories[$catName]['image'];
        echo "<a href='category.php?category=" . urlencode($catName) . "' style='text-decoration:none;'>";
        echo "<div style='width: 200px; text-align: center; background: #fffaf0; border: 2px solid #990000; border-radius: 12px; padding: 15px; transition: 0.3s;'>";
        echo "<img src='{$image}' alt='{$catName}' style='width:100%; height:150px; object-fit:cover; border-radius:10px;'>";
        echo "<h3 style='color:#990000; margin-top:10px;'>$catName</h3>";
        echo "</div>";
        echo "</a>";
    }
}

echo "</div>";

include 'includes/footer.php';
?>
