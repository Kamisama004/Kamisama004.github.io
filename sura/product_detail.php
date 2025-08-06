<?php
include 'includes/db_connect.php';

if (!isset($_GET['id'])) {
    echo "<p>ไม่พบสินค้า</p>";
    exit();
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

if (!$product) {
    echo "<p>ไม่พบข้อมูลสินค้า</p>";
} else {
    echo "<style>
        .product-detail {
            text-align: center;
        }
        .product-detail img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .product-detail h3 {
            color: #990000;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .product-detail p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }
        .product-detail strong {
            color: #660000;
        }
    </style>";

    echo "<div class='product-detail'>";
    echo "<h3>{$product['product_name']}</h3>";
    echo "<img src='{$product['image']}' alt='{$product['product_name']}'>";
    echo "<p><strong>ราคาต่อชิ้น:</strong> {$product['price_per_unit']} บาท</p>";
    echo "<p><strong>ราคาต่อแพ็ค:</strong> {$product['price_per_pack']} บาท</p>";
    echo "<p><strong>ราคาต่อลัง:</strong> {$product['price_per_box']} บาท</p>";
    echo "<p><strong>จำนวนคงเหลือ:</strong> {$product['quantity']}</p>";
    echo "<p><strong>รายละเอียด:</strong> {$product['description']}</p>";
    echo "</div>";
}
?>
