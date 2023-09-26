<?php
/**
 * Created by PhpStorm.
 * User: MewMew
 * Date: 3/6/2019
 * Time: 7:27
 */

class laptopModel
{
    public function __construct()
    {
        $db = mysqli_connect("localhost", "root","","tnstore");
        mysqli_set_charset($db, "utf8");
        $this->db = $db;
    }
    // đăng nhập
    public function doLogin(){
        $query = "SELECT * 
                  FROM users 
                  WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        return false;
    }
    // đăng kí
    public function doRegister($name, $email, $phone,$address, $password){
        $query = "INSERT INTO users (name, email, phone,address, password, level)
                  VALUES ('".$name."','".$email."', '".$phone."', '".$address."', '".$password."', '1')";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang chu
    public function getDataHome(){
        $query = "SELECT *
                  FROM maytinh
                  LIMIT 1, 12";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang giay nam
    public function getDataMen(){
        $query = "SELECT * 
                  FROM product, type
                  WHERE product.id_type = type.id_type
                  AND product.id_type = '1'";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lay du lieu trang giay nu
    public function getDataWomen(){
        $query = "SELECT * 
                  FROM product, type
                  WHERE product.id_type = type.id_type
                  AND product.id_type = '2'";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lay du lieu giay theo thuong hieu

    //converse
    public function getDataAcer(){
        $query = "SELECT * 
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '6'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // hp
    public function getDataHp(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '1'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lenovo
    public function getDataLenovo(){
        $query = "SELECT * 
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '2'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // macbook
    public function getDataMacbook(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '5'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // asus
    public function getDataAsus(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '4'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    //dell
    public function getDataDell(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = '3'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // them thanh vien
    public function addMember($name, $email, $phone, $password, $created){
        $query = "INSERT INTO users (name, email, phone, password, level, created)
                  VALUES ('".$name."','".$email."', '".$phone."', '".$password."', '1', '".$created."')";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // Xóa thành viên
    public function deleteUser(){
        $query = "DELETE FROM users
                  WHERE id_user = '{$_GET['iduser']}'";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // lay du lieu user
    public function getDataUser(){
        $query = "SELECT * 
                  FROM users
                  WHERE level = '1'";
        $listUser = mysqli_query($this->db, $query);
        return $listUser;
    }

     // lấy dữ liệu trang sửa khách hàng
      public function getPageEditUser(){
        $query = "SELECT *
                  FROM users
                  WHERE id_user = '{$_GET['id_user']}'";
        $result = mysqli_query($this->db, $query);
        return $result->fetch_assoc();
    }

     // Sửa khách hàng
    public function editUser(){
        $query = "UPDATE users SET 
            name = ?,
            email = ?,
            phone = ?,
            password = ?,
            address = ?
            WHERE id_user = ?";
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address'], $_POST['id_user']);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }
    //Xóa khách hàng
     public function delUser(){

        $query = "DELETE FROM users WHERE id_user = '{$_GET['id_user']}'";
        $result = mysqli_query($this->db, $query);
        return $result;
        // $message = "Xóa khách hàng ".$_GET['mamt']." thành công!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // return false;
    }
    // lay du lieu san pham
    public function getDataProduct(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = phanloai.maloai";
        $listProduct = mysqli_query($this->db,$query);
        return $listProduct;
    }
    // lấy dữ liệu đơn hàng
    public function getDataBill(){
        $query = "SELECT *
                  FROM donhang, users
                  WHERE donhang.id_user   = users.id_user";
        $listBill = mysqli_query($this->db, $query);
        return $listBill;
    }
    // lấy dữ liệu trang sửa sản phẩm
    public function getPageEditProduct(){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE mamt = '{$_GET['mamt']}'
                  AND maytinh.maloai = phanloai.maloai";
        $result = mysqli_query($this->db, $query);
        return $result->fetch_assoc();
    }
    // Sửa sản phẩm
    public function editProduct(){
        $query = "UPDATE maytinh SET 
            maloai = ?,
            tenmaytinh = ?,
            cpu = ?,
            ram = ?,
            ocung = ?,
            manhinh = ?,
            cardmanhinh = ?,
            hedieuhanh = ?,
            gia = ?,
            hinhanh = ?,
            soluong = ?
            WHERE mamt = ?";
        $stmt = mysqli_prepare($this->db, $query);
        $image = $_FILES['hinhanh']['name'];
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $_POST['maloai'], $_POST['tenmaytinh'], $_POST['cpu'], $_POST['ram'], $_POST['ocung'], $_POST['manhinh'], $_POST['cardmanhinh'], $_POST['hedieuhanh'], $_POST['gia'],$image, $_POST['soluong'], $_POST['mamt']);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }
    // xóa sản phẩm
    public function delProductSize(){
        $query = "DELETE FROM product_size
                  WHERE product_size.id_product = '{$_GET['mamt']}'";
        if (mysqli_query($this->db, $query)){
            return mysqli_insert_id($this->db);
        };
        return false;
    }
    public function delProduct(){

        $query = "DELETE FROM maytinh WHERE mamt = '{$_GET['mamt']}'";
        $result = mysqli_query($this->db, $query);
        return $result;
        $message = "Xóa sản phẩm".$_GET['mamt']." thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return false;
    }

    // lấy size
    public function getSize(){
        $query = "SELECT *
                  FROM size";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // du lieu san pham de them
    public function dataProduct(){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark
                  AND product.id_type = type.id_type";
        $dataProduct = mysqli_fetch_assoc($this->db, $query);
        return $dataProduct;
    }
    // tìm kiếm sản phẩm
    public function doSearch(string $key){
        $query = "SELECT *
                  FROM product, trandmark, type
                  WHERE product.id_trandmark = trandmark.id_trandmark
                  AND product.id_type = type.id_type 
                  AND (name_trandmark LIKE '%$key%' OR name_type LIKE '%$key%' OR name_product LIKE '%$key%' )";
        //echo $query;
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // Thêm sản phẩm
    public function addProduct($tenmaytinh, $gia, $soluong, $hang, $cpu, $ram, $ocung, $manhinh, $cardmanhinh, $hedieuhanh, $image)
    {
        $query = "INSERT INTO maytinh (maloai, tenmaytinh, cpu, ram, ocung, manhinh, cardmanhinh, hedieuhanh, gia, hinhanh, soluong) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, "sssssssssss", $hang, $tenmaytinh, $cpu, $ram, $ocung, $manhinh, $cardmanhinh, $hedieuhanh, $gia, $image, $soluong);

        if (mysqli_stmt_execute($stmt)) {
            return mysqli_insert_id($this->db);
        } else {
            return false;
        }
    }

    public function product_size($product_id)
    {
        $query = "SELECT * FROM product_size, size
                  WHERE id_product = {$product_id} 
                  AND size_id = size.id";
        $result = mysqli_query($this->db, $query);
        $arr = [];
        while($row = mysqli_fetch_assoc($result)) {
            $temp = [];
            $temp['id']   = $row['id'];
            $temp['name'] = $row['name'];
            array_push($arr, $temp);
        }
        return $arr;
    }
    public function addProductSize($product_id){
        $query = "INSERT INTO product_size(size_id, id_product)
                  VALUES('{$size}', '{$product_id}')";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    // xem chi tiet sản phẩm
    public function detailProduct($product_id){
        $query = "SELECT *
                  FROM maytinh
                  WHERE mamt = {$product_id}";
        $listProduct = mysqli_query($this->db,$query);

        return $listProduct;
    }
    // lấy chi tiết sản phẩm
    public function getProductDetails($product_id){
        $query = "SELECT *
                  FROM maytinh, phanloai
                  WHERE maytinh.maloai = phanloai.maloai
                  AND mamt = {$product_id}";
        $result = mysqli_query($this->db,$query);
        $arr = [];
        while($row = mysqli_fetch_assoc($result)){
            $temp = [];
            $temp['mamt'] = $row['mamt'];
            $temp['tenmaytinh'] = $row['tenmaytinh'];
            $temp['gia'] = $row['gia'];
            $temp['hinhanh'] = $row['hinhanh'];
            array_push($arr, $temp);
        }
        return $arr;
    }
    //phân trang
    public function phanTrang(){
        // tìm số bản ghi
        $result = mysqli_query($this->db, "SELECT count(mamt) as total FROM maytinh");
        return $result;
    }
    // Thanh toán
   public function createBill(){
        $created = date("Y.m.d");
        $query = "INSERT INTO donhang(phuongthucthanhtoan, id_user, tongtien, ngaytao)
                  VALUES ('{$_POST['payment_method']}', '{$_SESSION['id_user']}', '{$_SESSION['total']}', '{$created}')";

        if (mysqli_query($this->db, $query)){
            return mysqli_insert_id($this->db);
        };
    return false;
    }

    public function creatDetailOrder(){
        $madh = $this->createBill();
        for($i=0; $i < count($_SESSION['cart']); $i++) {
            $query = "INSERT INTO chitiethoadon(mamt,madh, soluong, tongtien)
                      VALUES ('{$_SESSION['cart'][$i]['mamt']}','{$madh}','{$_SESSION['cart'][$i]['quantity']}','{$_SESSION['sub_total']}')";
            if (mysqli_query($this->db, $query)){
                $message = "Thanh toán thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                unset($_SESSION['cart']);
                header("refresh:0; url=index.php?task=pagehome");
            }else{
                $message = "Thanh toán thất bại!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            };

        }
    }

      // Thống kê
   public function getPageThongKe(){
    $sql = "SELECT
        DATE_FORMAT(ngaytao, '%Y-%m') AS thang,
        SUM(tongtien) AS doanh_thu_thang
    FROM
        donhang
    GROUP BY
        DATE_FORMAT(ngaytao, '%Y-%m')
    ORDER BY
        thang";
    $results =  mysqli_query($this->db, $sql);
    return $results;
    }
}