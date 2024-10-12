<?php
// Tệp config.php - cấu hình kết nối tới MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_management";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
