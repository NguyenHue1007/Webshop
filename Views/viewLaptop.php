<?php 
class ViewLaptop
{
    public function getPageHome($result, $arr){
        include_once "templates/home.php";

    }

    public function getPageDetail($data){
        include_once "templates/product_detail.php";
    }

    public function getPageIntroduce(){
        include_once "templates/gioithieu.php";
    }

    public function getPageContact(){
        include_once "templates/lienhe.php";
    }

    public function getPageHp($result){
        include_once "templates/hp.php";
    }

    public function getPageLenovo($result){
        include_once "templates/lenovo.php";
    }

    public function getPageMacbook($result){
        include_once "templates/macbook.php";
    }

    public function getPageAsus($result){
        include_once "templates/asus.php";
    }

    public function getPageDell($result){
        include_once "templates/dell.php";
    }

    public function getPageAcer($result){
        include_once "templates/acer.php";
    }

    public function getPageLogin(){
        include_once "templates/login.php";
    }

    public function getPageRegister(){
        include_once "templates/sign_up.php";
    }
    public function getPageCart($data){
        include_once "templates/cart_product.php";
    }
        // quản lý user
    public function getPageUser($listUser){
        include_once "templates/pageUser.php";
    }

    //Sửa khách hàng
    public function getPageEditUser($result){
        include_once "templates/editUser.php";
    }

        // quản lý sản phẩm
    public function getPageProduct($listProduct){
        include_once "templates/pageProducts.php";
    }

    public function getPageEditProduct($result){
        include_once "templates/editProduct.php";
    }

    public function getPagePayment($data){
    include_once "templates/thanhtoan.php";
    }

    // quản lý hóa đơn
    public function getPageBill($listBill){
        include_once "templates/pageBill.php";
    }

    // Thống kê
    public function getPageThongKe($result){
        include_once "templates/thongke.php";
    }
}