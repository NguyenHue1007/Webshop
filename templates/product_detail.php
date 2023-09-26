<!DOCTYPE html>
<html>
 <?php include_once "link.php";?>
<head>
	<div style="height: 110px;">
    	<?php include_once "header.php";?>
 	</div>
      <style type="text/css">
        .detail-label-product {
            width: 180px;
            font-weight: 500;
        }
        .container-detail {
            margin-left: 255px;
           
        }
        .main-detail{
            padding: 20px 0;
            background-color: #E6E6FA;
        }
        
    </style>
</head>
<body>
	<div class="main-detail">
	  <?php $path = "/weblaptop/public/image/anhmaytinh/" ?>    
	  <?php foreach ($data as $product) { ?>
    <div class="container container-detail">
        <div class="row mx-auto" style="margin: 0;">
            <div class="col-4">
                <img src="<?php echo $path.$product['hinhanh'] ?>" style="width: 345px;">
            </div>
            <div class="col-8">
                <form action="" method="post">
                <table class="mb-5">
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Tên sản phẩm:</label></td>
                        <td><?php echo $product['tenmaytinh']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">CPU:</label></td>
                        <td><?php echo $product['cpu']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Ổ cứng:</label></td>
                        <td><?php echo $product['ocung']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Card màn hình:</label></td>
                        <td><?php echo $product['cardmanhinh']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Màn hình:</label></td>
                        <td><?php echo $product['manhinh']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Hệ điều hành:</label></td>
                        <td><?php echo $product['hedieuhanh']?></td>
                    </tr>
                    <tr>
                        <td class="p-1 detail-label-product"><label for="">Giá tiền:</label></td>
                        <td><?php echo $product['gia']?> VND</td>
                    </tr>
                </table>
                <div>
                    <input type="hidden" value="<?php echo $product['mamt'] ?>" name="mamt">
                    <input id="quantity" type="number" min = "1" value="1" name="quantity">
                    <input class="btn btn-danger" type="submit" name="btn-cart" value="THÊM VÀO GIỎ HÀNG">
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

</body>
	<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
		<?php include_once "footer.php";?>
	</footer>
	<script>
    $("input[name='quantity']").TouchSpin({
        initval: 1,
        min: 1,
        max: 20
    });
</script>
</html>