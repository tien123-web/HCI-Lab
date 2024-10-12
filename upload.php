<?php
// Kết nối cơ sở dữ liệu
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_id = $_POST['subject'];
    $type = $_POST['type'];
    $file = $_FILES['file'];

    // Xử lý file upload
    $uploadDir = 'uploads/';
    $filePath = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Thêm thông tin vào cơ sở dữ liệu
        $sql = "INSERT INTO documents (subject_id, type, file_path) VALUES ('$subject_id', '$type', '$filePath')";
        if ($conn->query($sql) === TRUE) {
            echo "Tải tài liệu thành công.";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Lỗi khi tải tài liệu.";
    }
}
?>
