<?php
$host = 'mysql-service'; // ชื่อโฮสต์
$user = 'root';      // ชื่อผู้ใช้ฐานข้อมูล
$password = 'root';      // รหัสผ่านฐานข้อมูล
$database = 'sql_injection_lab'; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $user, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
