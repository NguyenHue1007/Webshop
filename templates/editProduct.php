<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .logo-header {
            padding-left: 95px;
        }
        .table-title {
            text-align: center;

        }
        th, td {
            text-align: center;
        }
        .logo {
            font-size: 35px;
            color: red;
            font-weight: 500;
        }
        .logo:hover{
            text-decoration: none;
        }
        .table-main{
            padding-top:20px;
        }
        .add-member-form{
            display: none;
        }
        .add-member-form {
        width: 50%; /* Độ rộng của form */
        margin: 20px auto; /* Canh giữa form */

        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .list-group {
            background-color: #2125291f;
            border-radius: unset;
            height: 100%;  
        }
        .main-admin {
            padding-left: 0;
        }
        .menu-left {
            padding: 0;
        }
        .item-left {
            list-style: none;
            padding: 10px;
            border-bottom: solid 1px #ccc;
        }
        .item-left a {
            padding-left: 15px;
            color: black;
            text-decoration: none;
            font-size: 18px;
            display: block; /* Hiển thị kiểu block cho thẻ <a> */
            width: 100%; /* Chiều rộng của thẻ <a> */        }
         .item-left:hover {
            background-color: rgb(167 202 240);
         }
         .active {
            background-color: rgb(167 202 240);
         }
    </style>
    <title>Admin Dashboard</title>
</head>
<body>
    <header class="bg-dark text-white py-2">
        <div class="logo-header">
            <div> 
                <a class = "logo"href="index.php?task=pagehome">TN Store</a>
            </div>
        </div>
    </header>
    
    <div class="container-fluid main-admin">
        <div class="row">
            <aside class="col-md-3">
                <div class="list-group">
                    <ul class="menu-left">
                        <li class="item-left">
                            <a href="index.php?task=pageuser">Quản lý khách hàng</a>
                        </li>
                         <li class="item-left active">
                            <a href="">Quản lý sản phẩm</a>
                        </li>
                         <li class="item-left">
                            <a href="">Quản lý đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </aside>
           <div class="add-member-form" style="display: block;">
            <h2>Sửa sản phẩm</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên máy</label>
                    <input type="hidden" name="mamt" value="<?=$result['mamt']?>">
                    <input type="text" class="form-control" name="tenmaytinh" value="<?=$result['tenmaytinh']?>">
                </div>
                <div class="form-group">
                    <label>Hãng</label>
                    <select id="maloai" name="maloai" class="form-control">
                        <option value="1">HP</option>
                        <option value="2">LENOVO</option>
                        <option value="3">DELL</option>
                        <option value="4">ASUS</option>
                        <option value="5">MACBOOK</option>
                        <option value="6">ACER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>CPU</label>
                    <input type="text" class="form-control" name="cpu" value="<?=$result['cpu']?>">
                </div>
                 <div class="form-group">
                    <label>RAM</label>
                    <input type="text" class="form-control" name="ram" value="<?=$result['ram']?>">
                </div>
                 <div class="form-group">
                    <label>Ổ cứng</label>
                    <input type="text" class="form-control" name="ocung" value="<?=$result['ocung']?>">
                </div>
                <div class="form-group">
                    <label>Màn hình</label>
                    <input type="text" class="form-control" name="manhinh" value="<?=$result['manhinh']?>">
                </div>
                <div class="form-group">
                    <label>Card màn hình</label>
                    <input type="text" class="form-control" name="cardmanhinh" value="<?=$result['cardmanhinh']?>">
                </div>
                <div class="form-group">
                    <label>Hệ điều hành</label>
                    <input type="text" class="form-control" name="hedieuhanh" value="<?=$result['hedieuhanh']?>">
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="number" class="form-control" name="gia" value="<?=$result['gia']?>">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="soluong" value="<?=$result['soluong']?>">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh">
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" name="update_product">Update</button>
                    <a href="index.php?task=pageproduct" class="btn btn-secondary btn-back-to-list">Back to List</a>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Đặt giá trị mặc định cho thẻ <select> bằng JavaScript
  document.getElementById("maloai").value = "<?=$result['maloai']?>";
</script>
