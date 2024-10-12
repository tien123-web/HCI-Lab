<?php
// Cấu hình kết nối cơ sở dữ liệu MySQL
$servername = "localhost";  // Địa chỉ MySQL (localhost nếu chạy trên máy tính cá nhân)
$username = "root";  // Tên tài khoản MySQL
$password = "";  // Mật khẩu MySQL (để trống nếu không có)
$dbname = "course_management";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<?php
// Cấu hình kết nối cơ sở dữ liệu MySQL
$servername = "localhost";  // Địa chỉ MySQL (localhost nếu chạy trên máy tính cá nhân)
$username = "root";  // Tên tài khoản MySQL
$password = "";  // Mật khẩu MySQL (để trống nếu không có)
$dbname = "course_management";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
