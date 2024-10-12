<?php
// Kết nối cơ sở dữ liệu
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài liệu học tập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            color: #333;
        }
        .subject {
            margin-bottom: 30px;
        }
        .materials ul {
            list-style-type: none;
            padding: 0;
        }
        .materials ul li {
            margin: 10px 0;
        }
        .materials ul li a {
            text-decoration: none;
            color: #007bff;
        }
        .materials ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
// Truy vấn lấy danh sách môn học
$subject_sql = "SELECT * FROM subjects";
$subject_result = $conn->query($subject_sql);

// Hiển thị tài liệu theo từng môn học
if ($subject_result->num_rows > 0) {
    while($subject = $subject_result->fetch_assoc()) {
        echo "<div class='subject'>";
        echo "<h2>Môn học: " . $subject['subject_name'] . "</h2>";

        // Lấy các tài liệu của môn học hiện tại
        $subject_id = $subject['subject_id'];
        $document_sql = "SELECT * FROM documents WHERE subject_id = $subject_id";
        $document_result = $conn->query($document_sql);

        // Kiểm tra xem có tài liệu không
        if ($document_result->num_rows > 0) {
            echo "<div class='materials'>";

            // Phân loại tài liệu
            $lecture_docs = [];
            $exercise_docs = [];
            $reference_docs = [];

            while ($document = $document_result->fetch_assoc()) {
                if ($document['type'] == 'lecture') {
                    $lecture_docs[] = $document;
                } elseif ($document['type'] == 'exercise') {
                    $exercise_docs[] = $document;
                } elseif ($document['type'] == 'reference') {
                    $reference_docs[] = $document;
                }
            }

            // Hiển thị Bài giảng
            if (!empty($lecture_docs)) {
                echo "<h3>Bài giảng</h3><ul>";
                foreach ($lecture_docs as $doc) {
                    echo "<li><a href='" . $doc['file_path'] . "' target='_blank'>" . basename($doc['file_path']) . "</a></li>";
                }
                echo "</ul>";
            }

            // Hiển thị Bài tập
            if (!empty($exercise_docs)) {
                echo "<h3>Bài tập</h3><ul>";
                foreach ($exercise_docs as $doc) {
                    echo "<li><a href='" . $doc['file_path'] . "' target='_blank'>" . basename($doc['file_path']) . "</a></li>";
                }
                echo "</ul>";
            }

            // Hiển thị Tài liệu tham khảo
            if (!empty($reference_docs)) {
                echo "<h3>Tài liệu tham khảo</h3><ul>";
                foreach ($reference_docs as $doc) {
                    echo "<li><a href='" . $doc['file_path'] . "' target='_blank'>" . basename($doc['file_path']) . "</a></li>";
                }
                echo "</ul>";
            }

            echo "</div>";
        } else {
            echo "<p>Chưa có tài liệu cho môn học này.</p>";
        }

        echo "</div>";
    }
} else {
    echo "<p>Không có môn học nào.</p>";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

</body>
</html>
