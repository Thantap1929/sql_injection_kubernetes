<?php
session_start();
include 'db.php'; // รวมไฟล์การเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // หากผู้ใช้ไม่ได้ล็อกอิน ให้เปลี่ยนไปหน้า login
    exit();
}

// ดึง user_id จาก URL
$user_id = $_GET['id']; // ใช้ค่า ID จาก URL โดยตรง (ช่องโหว่ SQL Injection)

// Query ที่มีช่องโหว่ SQL Injection
$query = "SELECT * FROM users_employees WHERE id = $user_id"; // ช่องโหว่ SQL Injection
$result = $conn->query($query);

// ตรวจสอบว่าคำสั่ง SQL สำเร็จหรือไม่
if (!$result) {
    die("Query Failed: " . $conn->error); // แสดงข้อผิดพลาดถ้ามี
}

$employee = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- รวมไฟล์ CSS -->
    <title>Employee Information</title>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

        <h2>Employee Information</h2>
        <?php if ($employee): ?>
            <p><strong>Name:</strong> <?php echo $employee['name']; ?></p>
            <p><strong>Position:</strong> <?php echo $employee['position']; ?></p>
            <p><strong>Department:</strong> <?php echo $employee['department']; ?></p>
            <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
        <?php else: ?>
            <p>No employee information available for this user.</p>
        <?php endif; ?>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
