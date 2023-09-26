<?php 
require_once "Model/laptopModel.php";
require_once "Views/viewLaptop.php";


class ControllerHome 
{
	var $model, $view;
	public function __construct()
	{
		$this->view = new ViewLaptop();
		$this->model = new laptopModel();
	}
	    public function getPageHome(){
        $result = $this->model->phanTrang();
        $row = mysqli_fetch_assoc($result);
        $total_record = $row['total'];
        // tìm số lượng trang và số sản phẩm trên 1 trang
        $current_page = isset($_GET['page'])? $_GET['page']:1;
        $limit = 15;
        // tổng trang
        $total_page = ceil($total_record/$limit);
        //
        if ($current_page > $total_page){
            $current_page = $total_page;
        }else if ($current_page < 1){
            $current_page = 1;
        }
        //trang bắt đầu
        $start = ($current_page - 1) * $limit;
        $result = $this->model->getDataHome();
        $arr = [];
        $temp = [];
        $temp['current_page'] = $current_page;
        $temp['total_page'] = $total_page;
        array_push($arr, $temp);

        $this->view->getPageHome($result, $arr);
    }

     public function getDetailPage($id)
    {
        $data = [];
        $products = $this->model->detailProduct($id);
        while($row = mysqli_fetch_assoc($products)) {
            $temp = [];
            $temp['mamt'] = $row['mamt'];
            $temp['tenmaytinh'] = $row['tenmaytinh'];
            $temp['gia'] = $row['gia'];
            $temp['cpu'] = $row['cpu'];
            $temp['ocung'] = $row['ocung'];
            $temp['cardmanhinh'] = $row['cardmanhinh'];
            $temp['manhinh'] = $row['manhinh'];
            $temp['hedieuhanh'] = $row['hedieuhanh'];
            $temp['hinhanh'] = $row['hinhanh'];
            array_push($data, $temp);
        }
        $this->view->getPageDetail($data);
    }

     // trang liên hệ
    public function getPageContact(){
        $this->view->getPageContact();
    }

         // trang gioi thieu
    public function getPageIntroduce(){
        $this->view->getPageIntroduce();
    }

      public function getPageHp(){
        $result = $this->model->getDataHp();
        $this->view->getPageHp($result);
    }

    public function getPageLenovo(){
        $result = $this->model->getDataLenovo();
        $this->view->getPageLenovo($result);
    }

    public function getPageMacbook(){
        $result = $this->model->getDataMacbook();
        $this->view->getPageMacbook($result);
    }

     public function getPageAsus(){
        $result = $this->model->getDataAsus();
        $this->view->getPageAsus($result);
    }

     public function getPageDell(){
        $result = $this->model->getDataDell();
        $this->view->getPageDell($result);
    }

     public function getPageAcer(){
        $result = $this->model->getDataAcer();
        $this->view->getPageAcer($result);
    }

     //trang dang nhap
    public function getPageLogin(){
        $this->view->getPageLogin();
    }

        // dang nhap
    public function doLogin(){
        $result = $this->model->doLogin();
        $_SESSION['id_user'] = $result['id_user'];
        $_SESSION['username'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['phone'] = $result['phone'];
        $_SESSION['address'] = $result['address'];
        echo $result['address'];
        $_SESSION['level'] = $result['level'];
        if ($result['level'] == 2){
            header("location:index.php?task=pageuser");
        }elseif ($result['level'] == 1){
            header("location:index.php?task=pagehome");
        }
    }
    public function getPageUser(){
        $listUser = $this->model->getDataUser();
        $this->view->getPageUser($listUser);
    }

     // trang sửa khách khàng
    public function getPageEditUser(){
        $result = $this->model->getPageEditUser();
        $this->view->getPageEditUser($result);
    }

     public function doUpdateUser(){
        $result = $this->model->editUser();
        if ($result) {
        echo "<script>";
        echo "alert('Khách hàng đã được sửa thành công!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageuser'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Sửa khách hàng thất bại!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageuser'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
        }
    }

      // Xóa khách hàng
    public function delUser(){
        $result = $this->model->delUser();
        if ($result == true){
        echo "<script>";
        echo "alert('Khách hàng đã được xóa thành công!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageuser'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
        }else{
            var_dump($result);
        }
    }

        // lấy dữ liệu giỏ hàng
    public function getPageCart(){
        $product_info = [];
        for ($i=0; $i < count($_SESSION['cart']); $i++) {
            $data['quantity'] = $_SESSION['cart'][$i]['quantity'];
            $data['product_info'] = $this->model->getProductDetails($_SESSION['cart'][$i]['mamt']);
            array_push($product_info, $data);
        }
        $data = $product_info;
        $this->view->getPageCart($data);
    }
        //trang dang ky
    public function getPageRegister(){
        $this->view->getPageRegister('');
    }

        // dang ky
    public function doRegister($name, $email, $phone,$address, $password){
        $result =  $this->model->doRegister($name, $email, $phone,$address, $password);
        $message = "Đăng ký thành công !";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->view->getPageRegister();
    }

        // gio hang
    function add_to_cart($info)
    {
        if (count($_SESSION['cart']) > 0) {
            $this->merge($info);
        } else {
            array_push($_SESSION['cart'], $info);
        }
        //header('Location: '.$_SERVER["REQUEST_URI"].'');
    }
      function merge($new_added)
    {
        $ids = array_column($_SESSION['cart'], 'mamt');
        if(in_array($new_added['mamt'], $ids)) {
            for($i = 0; $i < count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i]['mamt'] == $new_added['mamt']) {
                    $total_quantity = $_SESSION['cart'][$i]['quantity'] + $new_added['quantity'];
                    if($total_quantity < 11) {
                        $_SESSION['cart'][$i]['quantity'] = $total_quantity;
                    } else {
                        $_SESSION['cart'][$i]['quantity'] = 10;
                    }
                }
            }
        } else {
            array_push($_SESSION['cart'], $new_added);
        }
    }
        // Xóa khỏi giỏ hàng
    function remove_from_cart($product_id)
    {
        $ids = array_column($_SESSION['cart'], 'mamt');
        if(in_array($product_id, $ids)) {
            $key = array_search($product_id, $ids);
            print_r($key);
            if($key !== false) {
                unset($_SESSION['cart'][$key]);
                Sort($_SESSION['cart']);
                header('Location: '.$_SERVER["HTTP_REFERER"].'');
            }
        }
    }

    public function getPagePayment(){
        $product_info = [];
        for ($i=0; $i < count($_SESSION['cart']); $i++) {
            $data['quantity'] = $_SESSION['cart'][$i]['quantity'];
            $data['product_info'] = $this->model->getProductDetails($_SESSION['cart'][$i]['mamt']);
            array_push($product_info, $data);
        }
        $data = $product_info;
        $this->view->getPagePayment($data);
    }

       public function payment(){
        $this->model->creatDetailOrder();
    }

       // lấy tranng quản lý đơn hàng
    public function getPageBill(){
        $listBill = $this->model->getDataBill();
        $this->view->getPageBill($listBill);
    }

     // quản lý sản phẩm
    public function getPageProduct(){
        $listProduct = $this->model->getDataProduct();
        $products = [];
        while($row = mysqli_fetch_assoc($listProduct)) {
            $temp = [];
            $temp['mamt'] = $row['mamt'];
            $temp['tenmaytinh'] = $row['tenmaytinh'];
            $temp['gia'] = $row['gia'];
            $temp['hang'] = $row['tenloai'];
            $temp['soluong'] = $row['soluong'];
            $temp['cpu'] = $row['cpu'];
            $temp['ram'] = $row['ram'];
            $temp['ocung'] = $row['ocung'];
            $temp['manhinh'] = $row['manhinh'];
            $temp['cardmanhinh'] = $row['cardmanhinh'];
            $temp['hedieuhanh'] = $row['hedieuhanh'];
            $temp['hinhanh'] = $row['hinhanh'];
            array_push($products, $temp);
        }
        $this->view->getPageProduct($products);
    }

   // Thêm sản phẩm
    public function addProduct($tenmaytinh, $gia, $soluong, $hang, $cpu, $ram, $ocung, $manhinh,$cardmanhinh, $hedieuhanh){
        if (isset($_FILES['hinhanh']['name'])){
            $image = $_FILES['hinhanh']['name'];
           // move_uploaded_file($_FILES['hinhanh']['tmp_name'], $image);
            // them anh
             if (empty($tenmaytinh) || empty($gia) || empty($soluong) || empty($hang) || empty($cpu) || empty($ram) || empty($ocung) || empty($manhinh) || empty($cardmanhinh) || empty($hedieuhanh)){
                echo"Them that bai";
                header("location:".$_SERVER['REQUEST_URI']."");
            }else {
                 $insert_id = $this->model->addProduct($tenmaytinh, $gia, $soluong, $hang, $cpu, $ram, $ocung, $manhinh, $cardmanhinh, $hedieuhanh, $image);
                    echo "<script>";
                    echo "alert('Sản phẩm đã được thêm thành công!');";
                    echo "</script>";
            }
        }else{
            echo "<div class='container mt-4' style='width: 380px;'><div class='alert alert-success text-center'>Vui lòng chọn ảnh!</div></div>";
        }
    }

     // trang sửa sản phẩm
    public function getPageEditProduct(){
        $result = $this->model->getPageEditProduct();
        $this->view->getPageEditProduct($result);
    }
    public function doUpdateProduct(){
        $result = $this->model->editProduct();
        if ($result) {
        echo "<script>";
        echo "alert('Sản phẩm đã được sửa thành công!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageproduct'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Sửa sản phẩm thất bại!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageproduct'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
        }
    }

        // Xóa sản phẩm
    public function delProduct(){
        $result = $this->model->delProduct();
        if ($result == true){
        echo "<script>";
        echo "alert('Sản phẩm đã được xóa thành công!');";
        echo "setTimeout(function(){ window.location.href = 'index.php?task=pageproduct'; }, 0);"; // Chuyển hướng sau 1 giây
        echo "</script>";
        }else{
            var_dump($result);
        }
    }

    //Thống kê
    public function getPageThongKe(){
        $result = $this->model->getPageThongKe();
        $this->view->getPageThongKe($result);
    }
}
?>