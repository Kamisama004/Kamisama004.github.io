<?php include 'includes/header.php'; ?>

<style>
body {
    background-color: #fffaf0;
}

.featured-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 20px;
    max-width: 1200px;
    margin: auto;
    padding: 30px 20px;
}

.featured-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    color: white;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100%;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
    text-decoration: none;
    border: 2px solid #990000;
}

.featured-item:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
}

.featured-item.large {
    grid-row: span 2;
}

.featured-content {
    background: rgba(0, 0, 0, 0.5);
    padding: 25px;
    border-top: 2px solid gold;
    border-radius: 0 0 10px 10px;
}

.featured-item .tag {
    background: gold;
    color: #990000;
    font-size: 13px;
    font-weight: bold;
    padding: 5px 12px;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.featured-item h2 {
    font-size: 22px;
    margin: 0 0 6px;
    color: #fff;
    text-shadow: 1px 1px 2px #000;
}

.featured-item p {
    font-size: 15px;
    margin: 0;
    color: #f0f0f0;
}

@media (max-width: 768px) {
    .featured-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    .featured-item.large {
        grid-row: auto;
    }
}
</style>

<div class="featured-grid">
    <a href="products.php" class="featured-item large" id="productBanner">
        <div class="featured-content">
            <span class="tag">สินค้า</span>
            <h2>ชมสินค้าทั้งหมดของร้าน</h2>
            <p>คลิกเพื่อดูรายละเอียดสินค้า</p>
        </div>
    </a>
    <a href="order.php" class="featured-item" style="background-image: url('uploads/logo.jpg');">
        <div class="featured-content">
            <span class="tag">สั่งซื้อ</span>
            <h2>สั่งซื้อสินค้าออนไลน์</h2>
            <p>เลือกและสั่งซื้อสินค้าที่คุณต้องการ</p>
        </div>
    </a>
    <a href="about.php" class="featured-item" style="background-image: url('uploads/logo.jpg');">
        <div class="featured-content">
            <span class="tag">เกี่ยวกับเรา</span>
            <h2>ข้อมูลเกี่ยวกับร้าน</h2>
            <p>ประวัติและที่ตั้งร้านค้า</p>
        </div>
    </a>
    <a href="products.php" class="featured-item" style="background-image: url('uploads/logo.jpg');">
        <div class="featured-content">
            <span class="tag">แนะนำ</span>
            <h2>สินค้าขายดีประจำเดือน</h2>
            <p>ไม่ควรพลาด!</p>
        </div>
    </a>
</div>

<script>
const productImages = [
    'uploads/logo.jpg',
    'uploads/Update System.jpg',
    'uploads/Updating pictures.jpg',
    'uploads/Updating pictures2.jpg'
];
let currentImg = 0;
const banner = document.getElementById('productBanner');

function rotateBannerImage() {
    banner.style.backgroundImage = `url('${productImages[currentImg]}')`;
    currentImg = (currentImg + 1) % productImages.length;
}

rotateBannerImage();
setInterval(rotateBannerImage, 3000);
</script>

<?php include 'includes/footer.php'; ?>
