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
            height: 100vh;  
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
                         <li class="item-left">
                            <a href="index.php?task=pageproduct">Quản lý sản phẩm</a>
                        </li>
                         <li class="item-left">
                            <a href="index.php?task=pagebill">Quản lý đơn hàng</a>
                        </li>
                        <li class="item-left">
                            <a href="index.php?task=pagethongke">Thống kê doanh thu</a>
                        </li>
                    </ul>
                </div>
            </aside>
            
            <main class="col-md-9 table-container table-main">
                <h2 class="table-title">Danh sách khách hàng</h2>
                <button class="btn btn-primary mb-2 btn-add-member">Thêm khách hàng</button>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Mật khẩu</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($listUser)){ ?>
                                    <tr>
                                        <td><?php echo $row['id_user'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                         <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <!-- <td><a class="text-danger" href="index.php?task=deleteuser&iduser=<?php echo $row['id_user'] ?>"><i class="far fa-trash-alt"></i></a></td> -->
                                        <td>
                                            <a href="index.php?task=edituser&id_user=<?php echo $row['id_user']; ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?task=deleteuser&id_user=<?php echo $row['id_user']; ?>" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }; ?>
                                
                            <!-- Add more rows for data -->
                        </tbody>
                    </table>
                </div>
            </main>
           <div class="add-member-form">
            <h2>Thêm khách hàng</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="full-name">Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>
                </div>
                <div class="form-group">
                    <label for="phone">Adress:</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>
                  <div class="form-group">
                    <label for="password">Repassword:</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Enter repassword" required>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
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
        $(document).ready(function() {
            $(".btn-add-member").click(function() {
                $(".table-container").hide();
                $(".add-member-form").show();
            });
             $(".btn-back-to-list").click(function() {
                $(".add-member-form").hide();
                $(".table-container").show();
            });
        });
    </script>




