<?php
include 'includes/db_connect.php';
include 'includes/header.php';

$category = $_GET['category'] ?? '';
?>

<style>
.category-title {
    text-align: center;
    color: #990000;
    margin-top: 20px;
    font-size: 28px;
}
.back-link {
    display: inline-block;
    margin: 15px;
    padding: 10px 20px;
    background: #990000;
    color: gold;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}
.product-card {
    width: 220px;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 15px;
    background: #fffaf0;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}
.product-card:hover {
    transform: translateY(-5px);
}
.product-card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}
.product-card h3 {
    color: #990000;
    margin-bottom: 10px;
    font-size: 18px;
}
.product-card p {
    margin: 4px 0;
    color: #333;
}
.product-card button {
    margin-top: 10px;
    background: gold;
    color: #990000;
    border: none;
    padding: 8px 15px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}
.product-card button:hover {
    background: #ffcc00;
}
#productModal {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 999;
}
#productModal .modal-content {
    background: white;
    padding: 20px;
    max-width: 500px;
    width: 90%;
    border-radius: 12px;
    position: relative;
}
#productModal .modal-close {
    position: absolute;
    top: 10px;
    right: 15px;
    cursor: pointer;
    font-size: 22px;
    font-weight: bold;
    color: #990000;
}
</style>

<h1 class="category-title">หมวด: <?= htmlspecialchars($category) ?></h1>
<a href="products.php" class="back-link">&larr; กลับไปยังหมวดหมู่</a>

<div class="product-grid">
<?php
$stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$products = $stmt->get_result();

while ($row = $products->fetch_assoc()) {
    $id = $row['id'];
    echo "<div class='product-card'>";
    echo "<img src='{$row['image']}' alt='{$row['product_name']}'>";
    echo "<h3>{$row['product_name']}</h3>";
    echo "<p>ราคาต่อชิ้น: <strong>{$row['price_per_unit']} บาท</strong></p>";
    echo "<p>ราคาต่อแพ็ค: <strong>{$row['price_per_pack']} บาท</strong></p>";
    echo "<p>ราคาต่อลัง: <strong>{$row['price_per_box']} บาท</strong></p>";
    echo "<p>คงเหลือ: <strong>{$row['quantity']}</strong></p>";
    echo "<button onclick=\"openModal($id)\">ดูเพิ่มเติม</button>";
    echo "</div>";
}
?>
</div>

<!-- Modal -->
<div id="productModal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <div id="modalContent">กำลังโหลด...</div>
    </div>
</div>

<script>
function openModal(id) {
    const modal = document.getElementById('productModal');
    const content = document.getElementById('modalContent');
    modal.style.display = 'flex';
    content.innerHTML = 'กำลังโหลด...';

    fetch('product_detail.php?id=' + id)
        .then(res => res.text())
        .then(html => content.innerHTML = html)
        .catch(() => content.innerHTML = '<p>โหลดข้อมูลไม่สำเร็จ</p>');
}

function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}
</script>

<?php include 'includes/footer.php'; ?>
