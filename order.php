
<?php
require 'connection.php';

if(isset($_POST["submit"])) {
  
  $meat = $_POST["meat"];
  if($meat == 'beef'){
    $price_meat = 99;
  } else if($meat == 'pork'){
    $price_meat = 89;
  } else if($meat == 'chicken'){
    $price_meat = 79;
  } else if($meat == 'salmon'){
    $price_meat = 89;
  } else if($meat == 'seafood'){
    $price_meat = 99;
  }
  
  $type = $_POST["type"];
 
  $topping = $_POST["topping"];
  if($topping == 'omelette'){
    $price_topping = 29;
  } else if($topping == 'boiled egg'){
    $price_topping = 25;
  } else if($topping == 'fried egg'){
    $price_topping = 25;
  } else if($topping == 'scrambled egg'){
    $price_topping = 32;
  } 
  
  $side_dishes = $_POST["side_dishes"];
  if($side_dishes == 'tofu'){
    $price_side_dishes = 29;
  } else if($side_dishes == 'miso soup'){
    $price_side_dishes = 22;
  } else if($side_dishes == 'oden'){
    $price_side_dishes = 27;
  } else if($side_dishes == 'salad'){
    $price_side_dishes = 25;
  } else if($side_dishes == 'takoyaki'){
    $price_side_dishes = 69;
  } 
  
  $drink = $_POST["drink"];
  if($drink == 'water'){
    $price_drink = 12;
  } else if($drink == 'bubble milk tea'){
    $price_drink = 69;
  } else if($drink == 'green tea'){
    $price_drink = 49;
  } else if($drink == 'lemon tea'){
    $price_drink = 59;
  } else if($drink == 'lemonade'){
    $price_drink = 59;
  } 
  
  // คำนวณราคาทั้งหมด
  $cost = $price_meat + $price_topping + $price_side_dishes + $price_drink;

  // คำสั่ง SQL สำหรับเพิ่มข้อมูล
  $query = "INSERT INTO rice_bowl (meat, price_meat, type, topping, price_topping, side_dishes, price_side_dishes, drink, price_drink, cost) 
            VALUES ('$meat', '$price_meat', '$type', '$topping', '$price_topping', '$side_dishes', '$price_side_dishes', '$drink', '$price_drink', '$cost')";
  
  if(mysqli_query($conn, $query)) {
      // หากบันทึกสำเร็จ เปลี่ยนหน้าไปที่ AddToCart.php
      header("Location: AddToCart.php");
      exit(); // หยุดการทำงานของสคริปต์เพื่อไม่ให้โค้ดด้านล่างทำงานต่อ
  } else {
      echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
  }
}
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
    
<link rel="stylesheet" href="style_order.css" /> <!--import stylesheet -->

</head>

<body id="top">

    <div class="topnav">
        <a href="home.php">HOME</a>
        <a class="active" href="order.php?i=1">MENU</a>
        <div class="topnav-right">
            <a href="orderEN.php" align="right">TH|EN</a>
        </div>
    </div>

    <div class="alert alert-warning">
        <strong>รายการสั่งอาหาร</strong>
        <div class="right">
            <a href="AddToCart.php">
                <img src="picture/shopping-cart.png" style="width:45px; height:45px;">
            </a>
        </div>
    </div>


    <form class="" action="" method="post" autocomplete="off">

        <br>

        <center>
            <table>
                <tr>
                    <th colspan="5">
                        <div class="custom-div">
                            <label for="">
                                <h5> <strong> เนื้อสัตว์ </strong></h5>
                            </label>
                    </th>
                <tr>
                    </div>

                    <div class="wrapper">
                <tr>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="beef" id="beef" required />
                            <label for="beef">
                                <img src="picture/meat/beef.png" style="width:65px; height:65px;" />
                            </label>
                        </div> เนื้อวัว <br> 99 บาท
                        </label>
                        </div>
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="pork" id="pork" required />
                            <label for="pork">
                                <img src="picture/meat/pork.png" style="width:65px; height:65px;" />
                            </label>
                        </div> เนื้อหมู <br> 89 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="chicken" id="chicken" required />
                            <label for="chicken">
                                <img src="picture/meat/chicken.png" style="width:65px; height:65px;" />
                            </label>
                        </div> เนื้อไก่ <br> 79 บาท
                    </th>

                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="salmon" id="salmon" required />
                            <label for="salmon">
                                <img src="picture/meat/salmon.png" style="width:65px; height:65px;" />
                            </label>
                        </div> แซลม่อน <br> 89 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="seafood" id="seafood" required />
                            <label for="seafood">
                                <img src="picture/meat/seafood.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ทะเล <br> 99 บาท
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <center>
            <table>
                <tr>
                    <th colspan="2">
                        <div class="custom-div">
                            <label for="">
                                <h5><strong>ประเภท</strong></h5>
                            </label>
                        </div>
                        <div class="wrapper">
                <tr>
                    <th>
                        <div class="container">
                            <input type="radio" name="type" value="fry" id="fry" required />
                            <label for="fry">
                                <img src="picture/type/fried.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ทอด
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="type" value="grill" id="grill" required />
                            <label for="grill">
                                <img src="picture/type/grilled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ย่าง
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <center>
            <table>
                <tr>
                    <th colspan="5">
                        <div class="custom-div">
                            <label for="">
                                <h5><strong>ท็อปปิ้ง</strong></h5>
                            </label>
                        </div>

                        <div class="wrapper">
                <tr>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="omelette" id="omelette" />
                            <label for="omelette">
                                <img src="picture/topping/omeletted.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ไข่เจียว <br>29 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="boiled egg" id="boiled egg" />
                            <label for="boiled egg">
                                <img src="picture/topping/boiled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ไข่ต้ม <br>25 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="fried egg" id="fried egg" />
                            <label for="fried egg">
                                <img src="picture/topping/fried.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ไข่ดาว <br>25 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="scrambled egg" id="scrambled egg" />
                            <label for="scrambled egg">
                                <img src="picture/topping/scrambled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ไข่ข้น <br>32 บาท
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <center>
            <table>
                <tr>
                    <th colspan="5">
                        <div class="custom-div">
                            <label for="">
                                <h5><strong>เครื่องเคียง </strong></h5>
                            </label>
                        </div>

                        <div class="wrapper">
                <tr>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="tofu" id="tofu" />
                            <label for="tofu">
                                <img src="picture/side_dishes/tofuu.png" style="width:65px; height:65px;" />
                            </label>
                        </div> เต้าหู้ <br>29 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="miso soup" id="miso soup" />
                            <label for="miso soup">
                                <img src="picture/side_dishes/miso.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ซุปมิโสะญี่ปุ่น <br>22 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="oden" id="oden" />
                            <label for="oden">
                                <img src="picture/side_dishes/odeng.png" style="width:65px; height:65px;" />
                            </label>
                        </div>โอเด้ง <br>27 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="salad" id="salad" />
                            <label for="salad">
                                <img src="picture/side_dishes/saladed.png" style="width:65px; height:65px;" />
                            </label>
                        </div> สลัด <br>25 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="takoyaki" id="takoyaki" />
                            <label for="takoyaki">
                                <img src="picture/side_dishes/takoyakii.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ทาโกะยากิ <br>69 บาท
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <center>
            <table>
                <tr>
                    <th colspan="5">
                        <div class="custom-div">
                            <label for="">
                                <h5><strong>เครื่องดื่ม </strong></h5>
                            </label>
                        </div>

                        <div class="wrapper">
                <tr>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="water" id="water" />
                            <label for="water">
                                <img src="picture/drink/waterr.png" style="width:65px; height:65px;" />
                            </label>
                        </div> น้ำเปล่า <br>12 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="bubble milk tea" id="bubble milk tea" />
                            <label for="bubble milk tea">
                                <img src="picture/drink/bubble.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ชานมไข่มุก<br> 69 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="green tea" id="green tea" />
                            <label for="green tea">
                                <img src="picture/drink/green.png" style="width:65px; height:65px;" />
                            </label>
                        </div>ชาเขียว <br>49 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="lemon tea" id="lemon tea" />
                            <label for="lemon tea">
                                <img src="picture/drink/lemon.png" style="width:65px; height:65px;" />
                            </label>
                        </div> ชามะนาว <br>59 บาท
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="lemonade" id="lemonade" />
                            <label for="lemonade">
                                <img src="picture/drink/lemonadee.png" style="width:65px; height:65px;" />
                            </label>
                        </div> น้ำมะนาว<br> 59 บาท
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <br>

        <center>

            <button class="custom-button" type="submit" name="submit">SUBMIT</button>

        </center>
        <br>
       

    <br>
    <button class="custom-button"
        onclick="document.location='home.php'">BACK</button>

    <div class="right">
        <button class="custom-button"
            onclick="document.location='AddToCart.php'">NEXT</button>
    </div>

    <p id="back-top">
        <a href="#top">
            <span style="color: white;" class="glyphicon glyphicon-arrow-up pondtoptoptop"></span>
            Back to Top
        </a>
    </p>
</body>

</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // hide #back-top first
        $("#back-top").hide();
        // fade in #back-top
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 10) {
                    $('#back-top').fadeIn();
                } else {
                    $('#back-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-top a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 10);
                return false;
            });
        });
    });
</script> 