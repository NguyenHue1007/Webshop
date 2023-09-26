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
                        <li class="item-left active">
                            <a href="index.php?task=pageuser">Quản lý khách hàng</a>
                        </li>
                         <li class="item-left ">
                            <a href="">Quản lý sản phẩm</a>
                        </li>
                         <li class="item-left">
                            <a href="">Quản lý đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </aside>
           <div class="add-member-form" style="display: block;">
            <h2>Sửa khách hàng</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="hidden" name="id_user" value="<?=$result['id_user']?>">
                    <input type="text" class="form-control" name="name" value="<?=$result['name']?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control"name="email" value="<?=$result['email']?>">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="<?=$result['phone']?>">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="<?=$result['address']?>">
                </div>
                 <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" class="form-control" name="password" value="<?=$result['password']?>">
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                    <a href="index.php?task=pageuser" class="btn btn-secondary btn-back-to-list">Back to List</a>
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
  document.getElementById("id_user").value = "<?=$result['id_user']?>";
</script>
