<?php
// รับข้อมูล JSON จาก LINE
$content = file_get_contents('php://input');
$events = json_decode($content, true);

// บันทึก log
file_put_contents('log.txt', $content . PHP_EOL, FILE_APPEND);

// ถ้ามี event
if (!empty($events['events'])) {
    foreach ($events['events'] as $event) {
        $type = $event['source']['type'];

        // แสดง userId หรือ groupId ตามประเภท
        if ($type == 'user') {
            $id = $event['source']['userId'];
        } elseif ($type == 'group') {
            $id = $event['source']['groupId'];
        } elseif ($type == 'room') {
            $id = $event['source']['roomId'];
        }

        // ส่งกลับหาผู้ใช้เพื่อทดสอบ
        $replyToken = $event['replyToken'];
        $message = ['type' => 'text', 'text' => "ID ของคุณคือ:\n" . $id];

        $accessToken = 'YOUR_CHANNEL_ACCESS_TOKEN';

        $response = [
            'replyToken' => $replyToken,
            'messages' => [$message]
        ];

        $ch = curl_init('https://api.line.me/v2/bot/message/reply');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
?>
