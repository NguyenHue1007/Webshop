<!DOCTYPE html>
<html lang = "en">
  <?php include_once "link.php";?>
<head>
 <link rel="stylesheet" type="text/css" href="/weblaptop/public/css/h3style.css">
  <style>
     #clients {
         border-bottom: solid 2px rgb(232,232,232);

     }
     .logo-brand{
      max-width: 1300px;
      margin: auto;
      padding: 10px 0px;
     }
     .img-fluid {
      width: 105px;
     }
     .dssanpham-title h4:before, .dssanpham-title h4:after {
     content: "";
     width: 100px;
     height: 2px;
     background-color: #FF4500;
     display: inline-block;
}
  </style>

   <div style="height: 110px;">
    <?php include_once "header.php";?>
  </div>
</head>
<body>
  <div>
      <?php include_once "slider.php";?>
  </div>
    
    <section id="clients" class="clients">
      <div class="container logo-brand">
        <div class="container-fluid aos-init aos-animate">
          <div class="row py-4">
            <div class="col-lg-2 col-md-5 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/hp.png"class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/lenovo.png"class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/macbook.png"class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/asus.png"class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/dell.png"class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src ="/weblaptop/public/img/acer.png"class="img-fluid" alt="">
            </div>
          </div>
      </div>
      </div>
    </section>
<section style="background-color: #fff; display: flex;">
  <div class="text-center container py-5 dssanpham-title" style="width: 80%;">
    <h4 class="mt-4 mb-5">DANH SÁCH SẢN PHẨM</h4>
   <div class="row">
    <?php $path = "/weblaptop/public/image/anhmaytinh/" ?>
    <?php while ($row = mysqli_fetch_assoc($result)){ ?>
      <div class="col-lg-3 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="<?php echo $path.$row['hinhanh'] ?>"
              class="w-100" style= "width: 80% !important;"/>
          <div class="card-body">
            <a href="index.php?task=detail&id=<?php echo $row['mamt']; ?>" class="text-reset">
              <h5 style="font-size: 15px;" class="card-title mb-3"><?php echo $row['tenmaytinh']?></h5>
            </a>
            <a href="" class="text-reset">
              <p><?php echo $row['ram']?></p>
              <p><?php echo $row['cpu']?></p>
            </a>
            <h6 class="mb-3 price"><?php echo number_format($row['gia'],0,'.','.')?> VNĐ</h6>
          </div>
        </div>
      </div>
  </div>
<?php }; ?>
</div>
</div>
</section>
</body>
<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
	<?php include_once "footer.php";?>
</footer>
</html>