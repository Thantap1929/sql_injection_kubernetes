<?php
session_start(); // เริ่มต้น session

// ทำลาย session เพื่อออกจากระบบ
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้าอื่นหลังจากล็อกเอาท์ (เช่น หน้าเข้าสู่ระบบ)
header("Location: login.php");
exit();
?>
