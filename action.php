<?php
// Thông tin kết nối lấy từ docker-compose
$host = 'db'; // Tên service trong file docker-compose 
$user = 'user';
$pass = 'password';
$db   = 'test_db';

$conn = new mysqli($host, $user, $pass, $db);

// Tạo bảng tự động nếu chưa có để nộp bài cho nhanh
$conn->query("CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50))");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $conn->query("INSERT INTO users (name) VALUES ('$name')");
    echo "Đã lưu tên: " . $name . " vào Database thành công!";
}
?>