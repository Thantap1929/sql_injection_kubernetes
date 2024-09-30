<?php
session_start();
include 'db.php'; // รวมไฟล์การเชื่อมต่อ

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // หากผู้ใช้ไม่เข้าสู่ระบบ ให้เปลี่ยนไปยังหน้า login
    exit();
}

// ดึงโพสต์ทั้งหมดจากฐานข้อมูล
$result = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id']; // สมมุติว่าคุณได้เก็บ user_id ในเซสชัน

    // เพิ่มโพสต์ใหม่
    $stmt = $conn->prepare("INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $content, $user_id);
    $stmt->execute();
    $stmt->close();

    // เปลี่ยนไปยังหน้า blog หลังจากเพิ่มโพสต์
    header("Location: blog.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

        <h2>Create a New Post</h2>
        <form method="POST" action="">
            <label>Title:</label>
            <input type="text" name="title" required>
            <label>Content:</label>
            <textarea name="content" required></textarea>
            <input type="submit" name="create_post" value="Create Post">
        </form>

        <h2>Blog Posts</h2>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="blog-post">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
                <p>Posted by: <?php echo $row['username']; ?> on <?php echo $row['created_at']; ?></p>
            </div>
        <?php endwhile; ?>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
