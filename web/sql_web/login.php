<?php
session_start();
include 'db.php'; // รวมไฟล์การเชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query ที่มีช่องโหว่ SQL Injection
    $query = "SELECT * FROM users_employees WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    // ตรวจสอบผลลัพธ์
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id']; // เก็บ user_id ในเซสชัน

        // เปลี่ยนไปยังหน้าแสดงข้อมูลพนักงาน พร้อม ID
        header("Location: employee.php?id=" . $user['id']);
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid username or password!</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container login-form">
        <h2>Login</h2>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
