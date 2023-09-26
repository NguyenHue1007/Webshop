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
</head>
<body>
  <section style="background-color: #fff; display: flex;">
  <div class="text-center container py-5 dssanpham-title" style="width: 80%;">
   <div class="cf-title-03">
      <h3>Máy tính Asus</h3>
    </div>
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