<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// คัดลอกข้อมูลจาก rice_bowl ไป kitchen
$sql_copy = "INSERT INTO kitchen (ID, meat, type, topping, side_dishes, drink) SELECT ID, meat, type, topping, side_dishes, drink FROM rice_bowl";

if (!$conn->query($sql_copy)) {
    die("เกิดข้อผิดพลาดในการคัดลอกข้อมูล kitchen: " . $conn->error);
}

$sql_copy = "INSERT INTO statistic SELECT * FROM rice_bowl";

if (!$conn->query($sql_copy)) {
    die("เกิดข้อผิดพลาดในการคัดลอกข้อมูล statistic: " . $conn->error);
}

// ล้างข้อมูลใน rice_bowl
$sql_delete = "TRUNCATE TABLE rice_bowl";
if (!$conn->query($sql_delete)) {
    die("เกิดข้อผิดพลาดในการล้างข้อมูล: " . $conn->error);
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gohan Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Stylesheet -->
    
<link rel="stylesheet" href="style_wait.css" /> <!--import stylesheet -->

</head>

<body id="top">

    <div class="topnav">
        <a href="homeEN.php">HOME</a>
        <a href="orderEN.php">MENU</a>
        <div class="topnav-right">
            <a href="wait.php" align="right">TH|EN</a>
        </div>
    </div>

    <br>
    <center>
       Wait a minute
        <br>
        The food is in the process.
        <br>
        About 10 - 15 minute
        <br>
        <br>
        <div class="hourglass"></div>
        <br>
        If you wait too long
        <br>
        Please call the staff
        <br>
        <button class="custom-button" onclick="document.location='homeEN.php'">HOME</button>
        <button class="custom-button" onclick="document.location='orderEN.php'">MORE</button>
    
</body>

</html>

