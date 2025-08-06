<?php
include 'includes/db_connect.php';
include 'includes/header.php';

$sql = "SELECT * FROM products WHERE category = 'สินค้า OME'";
$result = $conn->query($sql);
?>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #fffaf0;
    margin: 0;
    padding: 0;
}

.page-title {
    text-align: center;
    color: #990000;
    margin-top: 30px;
    font-size: 32px;
}

.product-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
    padding: 40px;
    max-width: 1100px;
    margin: auto;
}

.product-card {
    background: #fffaf0;
    border: 1px solid #ccc;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.product-card img {
    width: 100%;
    max-height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

.product-card h3 {
    color: #990000;
    margin: 10px 0 5px;
}

.product-card .price {
    font-weight: bold;
    color: #cc0000;
}

.product-card button.detail-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 6px 12px;
    background: #990000;
    color: white;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.product-card button.detail-btn:hover {
    background-color: #b30000;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fffdf5;
    margin: 8% auto;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 600px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    position: relative;
    text-align: center;
}

.close {
    position: absolute;
    top: 15px; right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #990000;
    cursor: pointer;
}
</style>

<h1 class="page-title">สินค้า OME</h1>

<div class="product-container">
<?php
while ($row = $result->fetch_assoc()) {
    $json = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8');
    echo "<div class='product-card'>";
    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['product_name']) . "'>";
    echo "<h3>" . htmlspecialchars($row['product_name']) . "</h3>";
    echo "<p class='price'>฿" . number_format($row['price'], 2) . "</p>";
    echo "<button class='detail-btn' onclick='showDetail(JSON.parse(\"$json\"))'>ดูรายละเอียดเพิ่มเติม</button>";
    echo "</div>";
}
?>
</div>

<!-- Modal สำหรับแสดงรายละเอียดสินค้า -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalDetails"></div>
    </div>
</div>

<script>
function showDetail(product) {
    const modal = document.getElementById('productModal');
    const details = document.getElementById('modalDetails');

    details.innerHTML = `
        <h3>${product.product_name}</h3>
        <img src="${product.image}" alt="${product.product_name}" style="max-width:300px; border-radius:10px;">
        <p><strong>ราคาต่อชิ้น:</strong> ฿${parseFloat(product.price_per_unit).toFixed(2)}</p>
        <p><strong>ราคาต่อแพ็ค:</strong> ฿${parseFloat(product.price_per_pack).toFixed(2)}</p>
        <p><strong>ราคาต่อลัง:</strong> ฿${parseFloat(product.price_per_box).toFixed(2)}</p>
        <p><strong>จำนวนคงเหลือ:</strong> ${product.quantity}</p>
        <p><strong>รายละเอียด:</strong> ${product.description ?? 'ไม่มีข้อมูล'}</p>
    `;
    modal.style.display = 'block';
}

function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}

// ปิด modal เมื่อคลิกนอกกล่อง
window.onclick = function(event) {
    const modal = document.getElementById('productModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include 'includes/footer.php'; ?>
