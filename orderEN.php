
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
      header("Location: AddToCartEN.php");
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
        <a href="homeEN.php">HOME</a>
        <a class="active" href="order.php?i=1">MENU</a>
        <div class="topnav-right">
            <a href="order.php" align="right">TH|EN</a>
        </div>
    </div>

    <div class="alert alert-warning">
        <strong>Order</strong>
        <div class="right">
            <a href="AddToCartEN.php">
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
                                <h5> <strong> Meat </strong></h5>
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
                        </div> Beef <br> 99 Baht
                        </label>
                        </div>
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="pork" id="pork" required />
                            <label for="pork">
                                <img src="picture/meat/pork.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Pork <br> 89 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="chicken" id="chicken" required />
                            <label for="chicken">
                                <img src="picture/meat/chicken.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Chicken <br> 79 Baht
                    </th>

                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="salmon" id="salmon" required />
                            <label for="salmon">
                                <img src="picture/meat/salmon.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Salmon <br> 89 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="meat" value="seafood" id="seafood" required />
                            <label for="seafood">
                                <img src="picture/meat/seafood.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Seafood <br> 99 Baht
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
                                <h5><strong>Type</strong></h5>
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
                        </div> Fry
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="type" value="grill" id="grill" required />
                            <label for="grill">
                                <img src="picture/type/grilled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Grill
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
                                <h5><strong>Topping</strong></h5>
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
                        </div> Omelete <br>29 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="boiled egg" id="boiled egg" />
                            <label for="boiled egg">
                                <img src="picture/topping/boiled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Boiled egg <br>25 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="fried egg" id="fried egg" />
                            <label for="fried egg">
                                <img src="picture/topping/fried.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Fired <br>25 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="topping" value="scrambled egg" id="scrambled egg" />
                            <label for="scrambled egg">
                                <img src="picture/topping/scrambled.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Scrambled egg <br>32 Baht
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
                                <h5><strong>Side Dishes  </strong></h5>
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
                        </div> Tofu <br>29 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="miso soup" id="miso soup" />
                            <label for="miso soup">
                                <img src="picture/side_dishes/miso.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Miso soup <br>22 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="oden" id="oden" />
                            <label for="oden">
                                <img src="picture/side_dishes/odeng.png" style="width:65px; height:65px;" />
                            </label>
                        </div>Oden <br>27 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="salad" id="salad" />
                            <label for="salad">
                                <img src="picture/side_dishes/saladed.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Salad <br>25 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="side_dishes" value="takoyaki" id="takoyaki" />
                            <label for="takoyaki">
                                <img src="picture/side_dishes/takoyakii.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Takoyaki <br>69 Baht
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
                                <h5><strong>Drink </strong></h5>
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
                        </div> Water <br>12 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="bubble milk tea" id="bubble milk tea" />
                            <label for="bubble milk tea">
                                <img src="picture/drink/bubble.png" style="width:65px; height:65px;" />
                            </label>
                        </div> Bubble milk tea <br> 69 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="green tea" id="green tea" />
                            <label for="green tea">
                                <img src="picture/drink/green.png" style="width:65px; height:65px;" />
                            </label>
                        </div>Green tea <br>49 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="lemon tea" id="lemon tea" />
                            <label for="lemon tea">
                                <img src="picture/drink/lemon.png" style="width:65px; height:65px;" />
                            </label>
                        </div> lemon tea <br>59 Baht
                    </th>
                    <th>
                        <div class="container">
                            <input type="radio" name="drink" value="lemonade" id="lemonade" />
                            <label for="lemonade">
                                <img src="picture/drink/lemonadee.png" style="width:65px; height:65px;" />
                            </label>
                        </div> lemonade<br> 59 Baht
                    </th>
                </tr>
                </div>
            </table>

        </center>

        <br>

        <br>

        <center>

            <button class="custom-button" type="submit" name="submit">submit</button>

        </center>
        <br>
       

    <br>
    <button class="custom-button"
        onclick="document.location='homeEN.php'">BACK</button>

    <div class="right">
        <button class="custom-button"
            onclick="document.location='AddToCartEN.php'">NEXT</button>
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