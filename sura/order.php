<?php
session_start();
$customer_id = isset($_SESSION['member']['id']) ? $_SESSION['member']['id'] : null;
include 'includes/db_connect.php';
include 'includes/header.php';

// ✅ ฟังก์ชันส่งข้อความไปยัง LINE OA
function sendLineMessage($messageText) {
    $accessToken = 'aA9UsXn8FKkQlZ1CBvHO3gSbb4y+KMUMu/VHy5ulsEvGN+OuZqFnLPxbdJ1vaUUQTg7IgSZo2J7Ot0RZOwe/91gOfTZ78GObXW8VQjz0TtQ8J8buzP/Sj/HjDJLv/uWzUsmIZ6s36xxeNrE5yLmfWAdB04t89/1O/w1cDnyilFU='; // 🔁 ใส่ Channel Access Token ของคุณ
    $userId = 'C06e219d7c2b09ece0c1fc1fdafc4ac2c'; // 🔁 ใส่ User ID หรือ Group ID ที่ต้องการแจ้งเตือน

    $messageData = [
        'to' => $userId,
        'messages' => [[
            'type' => 'text',
            'text' => $messageText
        ]]
    ];

    $ch = curl_init('https://api.line.me/v2/bot/message/push');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}
?>

<!-- ✅ HTML และ CSS ตามเดิม -->
<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: #fff8f0;
    margin: 0;
    padding: 0;
}

.order-section {
    max-width: 800px;
    margin: 40px auto;
    background: #fffdf5;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.order-section h2 {
    text-align: center;
    color: #990000;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #800000;
}

select,
input[type="number"],
input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #b30000;
    border-radius: 8px;
    background: #fff;
    transition: border-color 0.3s;
}

select:focus,
input:focus,
textarea:focus {
    outline: none;
    border-color: gold;
    box-shadow: 0 0 6px rgba(255, 215, 0, 0.3);
}

.product-preview {
    display: none;
    text-align: center;
    margin-top: 20px;
}

.product-preview img {
    max-width: 200px;
    border-radius: 12px;
    margin-bottom: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.product-preview p {
    color: #444;
    margin: 5px 0;
}

.btn-submit {
    display: block;
    margin: 25px auto 0;
    padding: 12px 35px;
    font-size: 16px;
    font-weight: bold;
    color: #990000;
    background: linear-gradient(to right, gold, #ffcc33);
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.btn-submit:hover {
    background: #ffcc00;
    transform: translateY(-2px);
}

.success-msg, .error-msg {
    text-align: center;
    margin-top: 20px;
    font-weight: bold;
    font-size: 16px;
}
.success-msg { color: green; }
.error-msg { color: red; }
</style>

<div class="order-section">
    <h2>แบบฟอร์มสั่งซื้อสินค้า</h2>

    <form method="post">
        <div class="form-group">
            <label for="product_id">เลือกสินค้า:</label>
            <select id="product_id" name="product_id" onchange="loadProduct()" required>
                <option value="">-- เลือกสินค้า --</option>
                <?php
                $res = $conn->query("SELECT * FROM products");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id']}' data-image='{$row['image']}' data-unit='{$row['price_per_unit']}' data-pack='{$row['price_per_pack']}' data-box='{$row['price_per_box']}' data-name='{$row['product_name']}'>
                        {$row['product_name']}
                    </option>";
                }
                ?>
            </select>
        </div>

        <div id="product_preview" class="product-preview">
            <img id="preview_image" src="" alt="">
            <p id="preview_name" style="font-weight:bold;"></p>
            <p>
                ราคา: <span id="price_unit"></span> บาท / ชิ้น |
                <span id="price_pack"></span> บาท / แพ็ค |
                <span id="price_box"></span> บาท / ลัง
            </p>

            <div class="form-group">
                <label for="quantity">จำนวน:</label>
                <input type="number" name="quantity" id="quantity" min="1" value="1" required>
            </div>

            <div class="form-group">
                <label for="unit_type">หน่วย:</label>
                <select name="unit_type" id="unit_type" required>
                    <option value="ชิ้น">ชิ้น</option>
                    <option value="แพ็ค">แพ็ค</option>
                    <option value="ลัง">ลัง</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="address">ที่อยู่จัดส่ง:</label>
            <textarea name="address" id="address" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="payment_method">วิธีชำระเงิน:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="โอนเงิน">โอนเงิน</option>
                <option value="เก็บเงินปลายทาง">เก็บเงินปลายทาง</option>
            </select>
        </div>

        <input type="hidden" name="customer_name" value="ลูกค้าทั่วไป">

        <button type="submit" class="btn-submit">ยืนยันการสั่งซื้อ</button>
    </form>

    <?php
    // ✅ เมื่อกด submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $unit = $_POST['unit_type'];
        $address = $_POST['address'];
        $payment = $_POST['payment_method'];
        $customer = $_POST['customer_name'];

        $stmt = $conn->prepare("INSERT INTO orders (customer_id, customer_name, product_id, quantity, unit_type, address, payment_method)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isissss", $customer_id, $customer, $product_id, $quantity, $unit, $address, $payment);

        if ($stmt->execute()) {
            echo "<p class='success-msg'>สั่งซื้อสำเร็จ!</p>";

            // ✅ ดึงชื่อสินค้า
            $product_result = $conn->query("SELECT product_name FROM products WHERE id = $product_id");
            $product_name = $product_result->fetch_assoc()['product_name'];

            // ✅ สร้างข้อความแจ้งเตือน
            $message = "📦 มีออเดอร์ใหม่!\n"
                     . "ลูกค้า: $customer\n"
                     . "สินค้า: $product_name\n"
                     . "จำนวน: $quantity $unit\n"
                     . "ที่อยู่: $address\n"
                     . "วิธีชำระเงิน: $payment";

            // ✅ ส่งแจ้งเตือน LINE
            sendLineMessage($message);
        } else {
            echo "<p class='error-msg'>เกิดข้อผิดพลาด: " . $conn->error . "</p>";
        }
    }
    ?>
</div>

<script>
function loadProduct() {
    const select = document.getElementById('product_id');
    const option = select.options[select.selectedIndex];

    if (option.value === '') {
        document.getElementById('product_preview').style.display = 'none';
        return;
    }

    document.getElementById('preview_image').src = option.dataset.image;
    document.getElementById('preview_name').innerText = option.dataset.name;
    document.getElementById('price_unit').innerText = option.dataset.unit;
    document.getElementById('price_pack').innerText = option.dataset.pack;
    document.getElementById('price_box').innerText = option.dataset.box;
    document.getElementById('product_preview').style.display = 'block';
}
</script>

<?php include 'includes/footer.php'; ?>
