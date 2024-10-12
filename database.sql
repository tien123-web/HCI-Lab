-- Tạo bảng môn học (subjects)
CREATE TABLE subjects (
    subject_id INT PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(100) NOT NULL
);

-- Thêm dữ liệu mẫu vào bảng subjects
INSERT INTO subjects (subject_name) VALUES ('Toán học'), ('Vật lý'), ('Hóa học');

-- Tạo bảng lưu trữ tài liệu (documents)
CREATE TABLE documents (
    document_id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT NOT NULL,
    type ENUM('lecture', 'exercise', 'reference') NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
);

-- Thêm dữ liệu mẫu vào bảng documents
INSERT INTO documents (subject_id, type, file_path) 
VALUES 
(1, 'lecture', 'uploads/lecture1.pdf'), 
(1, 'exercise', 'uploads/exercise1.pdf'),
(2, 'reference', 'uploads/reference1.pdf');
