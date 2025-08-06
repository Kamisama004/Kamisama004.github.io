<?php include 'includes/header.php'; ?>

<style>
.about-container {
    max-width: 1000px;
    margin: auto;
    padding: 30px;
    background-color: #fffaf0;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
}
.about-container h1 {
    color: #990000;
    text-align: center;
    margin-bottom: 20px;
}
.about-section {
    margin-bottom: 30px;
}
.about-section h2 {
    color: #660000;
    font-size: 20px;
    margin-bottom: 10px;
    border-left: 5px solid gold;
    padding-left: 10px;
}
.about-section p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
    margin: 0;
}
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.map-frame {
    border: none;
    width: 100%;
    height: 300px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}
</style>

<div class="about-container">
    <h1>เกี่ยวกับเรา</h1>

    <div class="about-section">
        <h2>ข้อมูลเจ้าของร้าน</h2>
        <p>คุณสุรชัย มลคง<br>เจ้าของร้านสุรมลคง ผู้เชี่ยวชาญด้านผลิตภัณฑ์ท้องถิ่น</p>
    </div>

    <div class="about-section">
        <h2>สถานที่ตั้ง</h2>
        <p>เลขที่ 123 หมู่ 4 ต.ตัวอย่าง อ.ตัวอย่าง จ.ตัวอย่าง 12345</p>
    </div>

    <div class="about-section">
        <h2>เกี่ยวกับร้านค้า</h2>
        <p>ร้านสุรมลคงเป็นร้านค้าท้องถิ่นที่จำหน่ายสินค้าเพื่อสุขภาพและเครื่องปรุงพื้นบ้าน มีความตั้งใจในการส่งมอบสินค้าคุณภาพดี ราคาย่อมเยา ให้กับลูกค้าทั่วประเทศ</p>
    </div>

    <div class="about-section">
        <h2>ช่องทางติดต่อ</h2>
        <div class="contact-info">
            <p>โทร: 012-345-6789</p>
            <p>อีเมล: suramonkong@example.com</p>
            <p>Facebook: facebook.com/suramonkongshop</p>
        </div>
    </div>

    <div class="about-section">
        <h2>แผนที่</h2>
        <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.700..." allowfullscreen loading="lazy"></iframe>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
