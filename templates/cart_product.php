<!DOCTYPE html>
<html>
  <?php include_once "link.php";?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <div style="height: 110px;">
      <?php include_once "header.php";?>
  </div>
</head>
<body>
<form method="POST">
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Giỏ hàng của bạn</h3>
        </div>
        <?php $path = "/weblaptop/public/image/anhmaytinh/" ?>
        <?php
          $total = 0;
          for($i=0; $i < count($_SESSION['cart']); $i++) { ?>
            <?php foreach ($data[$i]['product_info'] as $item) { ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="<?php echo $path . $data[$i]['product_info'][0]['hinhanh']; ?>"
                  class="img-fluid rounded-3">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $item['tenmaytinh']; ?></p>
              </div>
               <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button class="btn btn-link px-2"
                  onclick="updateQuantity(<?php echo $i; ?>, -1)">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="quantity<?php echo $i; ?>" min="1" name="quantity" value="<?php echo $data[$i]['quantity'];?>" type="number"
                  class="form-control form-control-sm quantity-input" data-index="<?php echo $i; ?>"/>

                <button class="btn btn-link px-2"
                  onclick="updateQuantity(<?php echo $i; ?>, 1)">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0 price" data-index="<?php echo $i; ?>"><?php
                  $_SESSION['sub_total'] = $item['gia'] * $data[$i]['quantity'];
                  echo number_format($_SESSION['sub_total'],0,'.','.');
                ?></h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="?task=del_cart&id=<?php echo $item['mamt'] ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

        <?php 
        $total += $item['gia'] * $data[$i]['quantity'];
        $_SESSION['total'] = $total;
        }?>

        <?php }?>
        <div class="card rounded-3 mb-4"  style="padding: 10px 10px;">
          <p style="margin: 0"><strong id="totalPrice">
            <?php
              echo "Tổng tiền: ".number_format($total,0,'.','.')." VNĐ";
            ?>
          </strong></p>
        </div>
        <div class="card">
          <div class="card-body">
            <button  style="width: 100%" type="submit" name = "thanhtoan" class="btn btn-warning btn-block btn-lg">Thanh toán</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<!-- <script>
  function updateQuantity(index, change) {
    event.preventDefault(); // Ngăn trang gửi yêu cầu tự động
    
    // Lấy phần tử input số lượng hiện tại
    var quantityInput = document.getElementById('quantity' + index);
    
    // Lấy giá trị số lượng hiện tại và chuyển đổi thành số nguyên
    var currentQuantity = parseInt(quantityInput.value);
    
    // Cập nhật số lượng dựa trên giá trị thay đổi
    currentQuantity += change;
    
    // Đảm bảo số lượng không nhỏ hơn 1
    if (currentQuantity < 1) {
      currentQuantity = 1;
    }
    
    // Cập nhật phần tử input số lượng với giá trị mới
    quantityInput.value = currentQuantity;
    
    // Lấy phần tử giá cho mặt hàng này
    var priceElement = document.querySelector('.price[data-index="' + index + '"]');
    
    // Lấy giá cho mỗi mặt hàng từ thuộc tính dữ liệu
    var pricePerItem = <?php echo $item['gia']; ?>;
    
    // Tính toán giá mới cho mặt hàng này
    var newTotalPrice = currentQuantity * pricePerItem;
    
    // Cập nhật giá hiển thị cho mặt hàng này
    priceElement.textContent = numberFormat(newTotalPrice) + ' VNĐ';
    
    // Tính toán lại tổng giá cho tất cả mặt hàng
    calculateTotalPrice();
  }
  
  function calculateTotalPrice() {
    var total = 0;
    var priceElements = document.querySelectorAll('.price');
    
    // Lặp qua tất cả các phần tử giá và tính tổng
    priceElements.forEach(function(priceElement) {
      var priceText = priceElement.textContent.replace(' VNĐ', '').replace('.', '');
      var itemTotal = parseInt(priceText);
      total += itemTotal;
    });
    
    // Cập nhật phần tử tổng giá
    var totalPriceElement = document.getElementById('totalPrice');
    totalPriceElement.textContent = 'Tổng tiền: ' + numberFormat(total) + ' VNĐ';
  }
  
  function numberFormat(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }
</script> -->

</body>
<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
  <?php include_once "footer.php";?>
</footer>
</html>
