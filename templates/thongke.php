<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
         .centered-div {
            display: flex;
            justify-content: center;
            align-items: center;

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
                         <li class="item-left ">
                            <a href="index.php?task=pageproduct">Quản lý sản phẩm</a>
                        </li>
                         <li class="item-left">
                            <a href="index.php?task=pagebill">Quản lý đơn hàng</a>
                        </li>
                        <li class="item-left active">
                            <a href="index.php?task=pagethongke">Thống kê doanh thu</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="col-md-9 table-container table-main">
                <h2 class="table-title">Thống kê doanh thu</h2>
                <div class="centered-div">
                    <div id="column_chart" style="width: 900px; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tháng');
            data.addColumn('number', 'Doanh thu');

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "data.addRow(['" . $row['thang'] . "', " . $row['doanh_thu_thang'] . "]);\n";
            }
            ?>

            var options = {
                title: 'Biểu đồ doanh thu theo tháng',
                titleTextStyle: {
                    fontSize: 20, // Đặt kích thước chữ tiêu đề
                },
                hAxis: {title: 'Tháng'},
                vAxis: {title: 'Doanh thu'},
                chartArea: {width: '80%', height: '70%'},
                legend: {position: 'none'},
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));

            chart.draw(data, options);
        }
    </script>