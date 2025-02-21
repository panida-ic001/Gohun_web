 <!DOCTYPE html>
 <html lang="th" dir="ltr">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Gohan Home</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
     </script>

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap"
         rel="stylesheet">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
     <!-- Stylesheet -->
     <link rel="stylesheet" href="style_home.css" />

 </head>

 <body id="top">

     <div class="topnav">
         <a class="active" href="home.php">HOME</a>
         <a href="order.php">MENU</a>
         <div class="topnav-right">
             <a href="homeEN.php" align="right">TH|EN</a>
         </div>
     </div>

     <center>

         <!-- Slideshow container -->
         <div class="slideshow-container">

             <br>

             <!-- Full-width images with number and caption text -->
             <div class="mySlides fade">
                 <div class="numbertext">1 / 3</div>
                 <img src="picture/1.jpg" style="width:75%" "height:30%">
             </div>

             <div class="mySlides fade">
                 <div class="numbertext">2 / 3</div>
                 <img src="picture/2.jpg" style="width:75%" "height:30%">
             </div>

             <div class="mySlides fade">
                 <div class="numbertext">3 / 3</div>
                 <img src="picture/3.jpg" style="width:75%" "height:30%">
             </div>

             <!-- Next and previous buttons -->
             <!--  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        //   <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
         </div>

     </center>

     <br>

     <!-- The dots/circles -->
     <div style="text-align:center">
         <span class="dot" onclick="currentSlide(1)"></span>
         <span class="dot" onclick="currentSlide(2)"></span>
         <span class="dot" onclick="currentSlide(3)"></span>
     </div>

     <script>
         let slideIndex = 0; // เริ่มต้นที่ 0 เพื่อให้เริ่มจากภาพแรก
         autoShowSlides(); // เรียกใช้ฟังก์ชันอัตโนมัติ

         function autoShowSlides() {
             let i;
             let slides = document.getElementsByClassName("mySlides");
             let dots = document.getElementsByClassName("dot");

             for (i = 0; i < slides.length; i++) {
                 slides[i].style.display = "none";
             }

             slideIndex++; // ไปยังภาพถัดไป
             if (slideIndex > slides.length) {
                 slideIndex = 1
             }

             slides[slideIndex - 1].style.display = "block";
             dots[slideIndex - 1].className += " active";

             setTimeout(autoShowSlides, 1700); // ตั้งให้เปลี่ยนทุก 3 วินาที
         }
     </script>

     <br>
     <center>
         ดงบุริ (Donburi) คือ เมนูข้าวหน้าเครื่องต่างๆ คำว่าดงบุริหมายถึงชามข้าว <br>จึงเสิร์ฟมาในชามทรงสูง ท็อปปิ้งบนหน้ามีหลากหลาย ทั้งเนื้อสัตว์ ซาชิมิ ไข่ ผักชุบแป้งทอด เป็นต้น <br>
         <button class="custom-button"
             onclick="document.location='order.php'">ORDER</button>

     </center>

 </html>