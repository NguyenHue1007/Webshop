<!DOCTYPE html>
<html lang="en">
<?php include_once "link.php";?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thanh Toán</title>
    <!-- Link tới Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS tùy chỉnh -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 48px;
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-pay {
            background-color: #007bff;
            color: #fff;
            float: right;
        }
        .btn-pay:hover{
           background-color: blue;
        }
    </style>
    <div style="height: 110px;">
      <?php include_once "header.php";?>
    </div>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Phần thông tin cá nhân -->
            <div class="col-md-6">
                <h2 class="form-title">Thông Tin Cá Nhân</h2>
                <form method="POST" >
                    <div class="form-group">
                        <label for="hoTen">Họ và Tên:</label>
                        <input type="text" class="form-control" id="hoTen" placeholder="Nhập họ và tên"
                        value="<?php echo $_SESSION['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số Điện Thoại:</label>
                        <input type="tel" class="form-control" id="sdt" placeholder="Nhập số điện thoại" value="<?php echo $_SESSION['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa Chỉ:</label>
                        <input class="form-control" id="diaChi"placeholder="Nhập địa chỉ" value="<?php echo $_SESSION['address']; ?>">
                        </input>
                    </div>
                     <div class="form-group" >
                        <label for="diaChi">Phương thức thanh toán: </label>
                       <select class="form-control" name = "payment_method">
                            <option value = "Ship cod">Ship cod</option>
                            <option value = "Thanh toán qua thẻ ngân hàng">Thanh toán qua thẻ ngân hàng</option>
                        </select>
                    </div>
            </div>
            <!-- Phần thông tin đơn hàng và tổng tiền -->
            <div class="col-md-6">
                <h2 class="form-title">Thông Tin Đơn Hàng</h2>
                <form method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                            $total = 0;
                            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                foreach ($data[$i]['product_info'] as $item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $item['tenmaytinh']; ?></td>
                                        <td><?php echo $data[$i]['quantity'];?></td>
                                        <td><?php
                                          $_SESSION['sub_total'] = $item['gia'] * $data[$i]['quantity'];
                                          echo number_format($_SESSION['sub_total'],0,'.','.');
                                        ?></td>
                                    </tr>

                                    <?php
                                        $total += $item['gia'] * $data[$i]['quantity'];
                                        $_SESSION['total'] = $total;
                                }

                            }
                            ?>
                    </tbody>
                </table>
                        <p class="font-weight-bold">
                        <?php
                          echo "Tổng tiền: ".number_format($total,0,'.','.')." VNĐ";
                        ?></p>
                
                <button type="submit" class="btn btn-pay" name ="ship">Thanh Toán</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link tới Bootstrap JS và jQuery (đặt ở cuối trang) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
  <?php include_once "footer.php";?>
</footer>
</html>
