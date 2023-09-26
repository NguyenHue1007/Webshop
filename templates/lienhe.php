<!DOCTYPE html>
<html>
  <?php include_once "link.php";?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="/weblaptop/public/css/h3style.css">
  <div style="height: 110px;">
      <?php include_once "header.php";?>
  </div>

   <style>
    body, html {
      height: 100%;
    }
    .contact-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50%;
      background-color: #f7f7f7;
    }

    .contact-box {
      padding: 20px;
      text-align: left;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

    }

    .contact-box i{
       padding-right:10px;
    }
    .contact-title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .contact-info {
      font-size: 17px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="contact-container">
  <div class="contact-box">
    <h1 class="contact-title">Thông tin liên hệ</h1>
    <p class="contact-info">Mọi thắc mắc về sản phẩm hoặc dịch vụ của chúng tôi, vui lòng liên hệ với chúng tôi theo thông tin dưới đây:</p>
    <p class="contact-info"><i class="fas fa-map-marker-alt"></i> Xã Nga My, Huyện Phú Bình, Tỉnh Thái Nguyên </p>
    <p class="contact-info"><i class="fas fa-phone"></i> (123) 456-7890</p>
    <p class="contact-info"><i class="fas fa-envelope"></i> tnstore@gmail.com</p>
    <p class="contact-info"><i class="fa-solid fa-truck"></i>Giao hàng toàn quốc</p>
     <p class="contact-info"><i class="fa-solid fa-rotate-left"></i>Đổi trả trong vòng 7 ngày</p>
  </div>
</div>
</body>
<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
  <?php include_once "footer.php";?>
</footer>
</html>