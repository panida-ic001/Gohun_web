<?php
include 'connection.php';

$sql = "SELECT * FROM rice_bowl";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gohan Pay</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Stylesheet -->
    
<link rel="stylesheet" href="style_pay.css" /> <!--import stylesheet -->

</head>

<body id="top">

    <div class="topnav">
        <a href="homeEN.php">HOME</a>
        <a class="active" href="orderEN.php">MENU</a>
        <div class="topnav-right">
            <a href="pay.php" align="right">TH|EN</a>
        </div>
    </div>
    <br>
    <center>
    <img src="picture/qrcode.png" style="width:30%" "height:5%"><br>
    <br>
     
     <?php 
    $total_cost = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $item_total = $row["price_meat"] + $row["price_topping"] + $row["price_side_dishes"] + $row["price_drink"];
            $total_cost += $item_total;
        }
    }
?>

<!-- แสดงยอดรวมหลังจากจบลูป -->
<font size="10px"> Total : </font>
<span class="fw-bold"> <font size="10px"><?= $total_cost ?> </font></span>
<font size="10px"> Baht </font>

    <br>
    <font size="5px"color="red"> Scan and Confirm !! </font>
    <br>
    <br>
    <button class="custom-button"
    onclick="document.location='orderEN.php'">BACK</button>
    <button class="custom-button"onclick="document.location='waitEN.php'">NEXT</button>
</body>

</html>

