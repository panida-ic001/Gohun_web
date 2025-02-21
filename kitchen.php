<?php
include 'connection.php';

// ฟังก์ชันแปลงค่าเป็นภาษาไทย
function translate($key, $type) {
    $translations = [
        'meat' => [
            'chicken' => 'เนื้อไก่',
            'beef' => 'เนื้อวัว',
            'pork' => 'เนื้อหมู',
            'salmon' => 'แซลม่อน',
            'seafood' => 'ทะเล'
        ],
        'type' => [
            'fry' => 'ทอด',
            'grill' => 'ย่าง'
        ],
        'topping' => [
            'omelette' => 'ไข่เจียว',
            'boiled egg' => 'ไข่ต้ม',
            'fried egg' => 'ไข่ดาว',
            'scrambled egg' => 'ไข่ข้น'
        ],
        'side_dishes' => [
            'salad' => 'สลัด',
            'tofu' => 'เต้าหู้',
            'miso soup' => 'ซุปมิโสะญี่ปุ่น',
            'oden' => 'โอเด้ง',
            'takoyaki' => 'ทาโกยากิ'
        ],
        'drink' => [
            'water' => 'น้ำเปล่า',
            'green tea' => 'ชาเขียว',
            'lemon tea' => 'ชามะนาว',
            'lemonade' => 'น้ำมะนาว',
            'bubble milk tea' => 'ชานมไข่มุก'
        ]
    ];
    return $translations[$type][$key] ?? $key; // ถ้าไม่มีในคำแปล ให้ใช้ค่าเดิม
}

// ฟังก์ชันลบสินค้า (ถ้ามีการกดลบ)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM kitchen WHERE ID = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item removed successfully!'); window.location.href = 'kitchen.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// ดึงข้อมูลจาก rice_bowl
$sql = "SELECT * FROM kitchen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gohan Kitchen</title>

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
        <a class="active" href="http://gohun.lovestoblog.com/home.php">HOME</a>
        <a href="http://gohun.lovestoblog.com/order.php">MENU</a>
        <div class="topnav-right">
            <a href="http://sweetunicorn.lovestoblog.com/WebProject/GohanOrderEN.php" align="right">TH|EN</a>
        </div>
    </div>

     <div class="alert alert-warning">
        <strong>ห้องครัว</strong>
    </div>

        <center>
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ลำดับ</th>
                    <th>เนื้อสัตว์</th>
                    <th>ประเภท</th>
                    <th>ท็อปปิ้ง</th>
                    <th>เครื่องเคียง</th>
                    <th>เครื่องดื่ม</th>
                    <th></th>
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
                        <?= translate($row["meat"], 'meat') ?> 
                    </td>
                    <td>
                        <?= translate($row["type"], 'type') ?>
                    </td>
                    <td>
                        <?= translate($row["topping"], 'topping') ?>
                    </td>
                    <td>
                        <?= translate($row["side_dishes"], 'side_dishes') ?> 
                    </td>
                    <td>
                        <?= translate($row["drink"], 'drink') ?>
                    </td>
                    <td>
                        <a href="?delete_id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm">❌ ลบ</a>
                    </td>
                </tr>
                <?php 
            $index++; // เพิ่มค่าลำดับรายการ
        } 
    } else { 
        echo "<tr><td colspan='8' class='text-center'>Cart is empty</td></tr>";
    } 
    ?>
            
            
            </tbody>
        </table>
        </center>
    </div>

</body>

</html>

<?php $conn->close(); ?>