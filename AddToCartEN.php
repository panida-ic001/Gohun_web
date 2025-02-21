<?php
include 'connection.php';

// ฟังก์ชันลบสินค้า (ถ้ามีการกดลบ)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM rice_bowl WHERE ID = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item removed successfully!'); window.location.href = 'AddToCartEN.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// ดึงข้อมูลจาก rice_bowl
$sql = "SELECT * FROM rice_bowl";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gohan Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="style_cart.css">
</head>

<body id="top">

    <div class="topnav">
        <a class="active" href="homeEN.php">HOME</a>
        <a href="orderEN.php">MENU</a>
        <div class="topnav-right">
            <a href="AddToCart.php" align="right">TH|EN</a>
        </div>
    </div>

    <div class="alert alert-warning">
        <strong>Cart</strong>
        <div class="right">
            <a href="AddToCartEN.php">
                <img src="picture/shopping-cart.png" style="width:45px; height:45px;">
            </a>
        </div>
    </div>

    <center>
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Order</th>
                    <th>Meat</th>
                    <th>Type</th>
                    <th>Topping</th>
                    <th>Side Dishes</th>
                    <th>Drink</th>
                    <th>Cost</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

                <?php
                $total_cost = 0;
                $index = 1; // เริ่มลำดับที่ 1
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $item_total = $row["price_meat"] + $row["price_topping"] + $row["price_side_dishes"] + $row["price_drink"];
                        $total_cost += $item_total;
                ?>
                        <tr>
                            <td>
                                <?= $index ?>
                            </td> <!-- เปลี่ยนจาก ID เป็นลำดับที่ -->
                            <td>
                                <?= $row["meat"] ?>
                            </td>
                            <td>
                                <?= $row["type"] ?>
                            </td>
                            <td>
                                <?= $row["topping"] ?>
                            </td>
                            <td>
                                <?= $row["side_dishes"] ?>
                            </td>
                            <td>
                                <?= $row["drink"] ?>
                            </td>

                            <td>
                                <?= $item_total ?>
                            </td>
                            <td>
                                <a href="?delete_id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm">❌ Delete</a>
                            </td>
                        </tr>
                <?php
                        $index++; // เพิ่มค่าลำดับรายการ
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Cart is empty</td></tr>";
                }
                ?>

                <tr class="table-warning">
                    <td colspan="6" class="text-end fw-bold">Total :</td>
                    <td class="fw-bold" id="total_price">
                        <?= $total_cost ?>
                    </td>
                    <td>
                        <button id="confirm_button" class="btn btn-success btn-sm" onclick="confirmOrder()" <?= $total_cost == 0 ? 'disabled' : '' ?>>✅ Comfirm Order</button>
                    </td>
                </tr>

                <script>
                    function confirmOrder() {
                        let total = parseInt(document.getElementById("total_price").innerText);
                        if (total === 0) {
                            alert("❌ Can not Cart Emtry!");
                        } else {
                            alert("✅ Order confirmed! Thank you for shopping.");
                            window.location.href = "pay.php";
                        }
                    }
                </script>

            </tbody>
        </table>
        <button class="custom-button"
            onclick="document.location='orderEN.php'">Order More</button>

    </center>
    </div>

    <script>
        function confirmOrder() {
            alert("✅ Order confirmed! Thank you for shopping.");
            window.location.href = "payEN.php";
        }
    </script>

</body>

</html>

<?php $conn->close(); ?>