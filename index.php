<?php 
require_once "Controller/ControllerHome.php";

session_start();

// controller
$ControllHome = new ControllerHome();
$task =isset($_GET['task'])? $_GET['task']:null;


//login

$name = isset($_POST['name'])? $_POST['name']:null;
$email = isset($_POST['email'])? $_POST['email']:null;
$phone = isset($_POST['phone'])? $_POST['phone']:null;
$address = isset($_POST['address'])? $_POST['address']:null;
$password = isset($_POST['password'])? $_POST['password']:null;
$repassword = isset($_POST['repassword'])? $_POST['repassword']:null;

// dang nhap
if (isset($_POST['login'])){
    $ControllHome->doLogin();
}

// dang ky
if (isset($_POST['register'])){
    if (empty($name) || empty($email) || empty($phone || empty($address)  || empty($password) || empty($repassword))){
        $message = "Không được để trống !";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }elseif ($password != $repassword){
        $message = "Mật khẩu không trùng nhau !";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }elseif (isset($name) && isset($email) && isset($phone) && isset($address)  && isset($password) && isset($repassword) && $repassword = $password){
        $ControllHome->doRegister($name, $email, $phone, $address, $password);
    }
}

// sửa khách hàng
if (isset($_POST['update_user'])){
    $ControllHome->doUpdateUser();
}


// product
$tenmaytinh = isset($_POST['tenmaytinh'])? $_POST['tenmaytinh']:null;
$gia = isset($_POST['gia'])? $_POST['gia']:null;
$soluong = isset($_POST['soluong'])? $_POST['soluong']:null;
$hang = isset($_POST['maloai'])? $_POST['maloai']:null;
$cpu = isset($_POST['cpu'])? $_POST['cpu']:null;
$ram = isset($_POST['ram'])? $_POST['ram']:null;
$ocung = isset($_POST['ocung'])? $_POST['ocung']:null;
$manhinh = isset($_POST['manhinh'])? $_POST['manhinh']:null;
$cardmanhinh = isset($_POST['cardmanhinh'])? $_POST['cardmanhinh']:null;
$hedieuhanh = isset($_POST['hedieuhanh'])? $_POST['hedieuhanh']:null;
$image = isset($_POST['hinhanh'])? $_POST['hinhanh']:null;
// gio hang
if (empty($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

// them san pham
if (isset($_POST['add_product'])){
    $ControllHome->addProduct($tenmaytinh, $gia, $soluong, $hang, $cpu, $ram, $ocung, $manhinh,$cardmanhinh, $hedieuhanh);
}
// sủa sản phẩm
if (isset($_POST['update_product'])){
    $ControllHome->doUpdateProduct();
}

// them vao gio hang
if (isset($_POST['btn-cart'])){
    $arr = [];
    $arr['mamt'] = $_POST['mamt'];
    // $arr['tenmaytinh'] = $_POST['tenmaytinh'];
    $arr['quantity'] = $_POST['quantity'];
    $ControllHome->add_to_cart($arr);
}

// thanh toan
if (isset($_POST['thanhtoan'])){
    if (isset($_SESSION['username'])){
        header("location:index.php?task=payment");
    }else{
        header("location:index.php?task=pagelogin");
    }
}

// giao hàng
if (isset($_POST['ship'])){
    $ControllHome->payment();
}
switch ($task){
    case 'pagehome':
        $ControllHome->getPageHome();
        break;

        case 'pagecontact':
        $ControllHome->getPageContact();
        break;

        case 'pageintroduce':
        $ControllHome->getPageIntroduce();
        break;

        case 'detail':
        $ControllHome->getDetailPage($_GET['id']);
        break;

        case 'pagehp':
        $ControllHome->getPageHp();
        break;

        case 'pagelenovo':
        $ControllHome->getPageLenovo();
        break;

        case 'pagemacbook':
        $ControllHome->getPageMacbook();
        break;

        case 'pageasus':
        $ControllHome->getPageAsus();
        break;

        case 'pagedell':
        $ControllHome->getPageDell();
        break;

        case 'pageacer':
        $ControllHome->getPageAcer();
        break;

        case 'pagelogin':
        $ControllHome->getPageLogin();
        break;

        case 'pageregister':
        $ControllHome->getPageRegister();
        break;

        case 'edituser':
        $ControllHome->getPageEditUser();
        break;

        case 'deleteuser':
        $ControllHome->delUser();
        break;


        case 'pageuser':
        $ControllHome->getPageUser();
        break;

        case 'logout':
        session_destroy();
        header("location:index.php?task=pagehome");
        break;

        case 'cart':
        $ControllHome->getPageCart();
        break;

        case 'del_cart':
        $ControllHome->remove_from_cart($_GET['id']);
        break;


        case 'pageproduct':
        $ControllHome->getPageProduct();
        break;

        case 'editproduct':
        $ControllHome->getPageEditProduct();
        break;

        case 'deleteproduct':
        $ControllHome->delProduct();
        break;

        case 'payment':
        $ControllHome->getPagePayment();
        break;

        case 'pagebill':
        $ControllHome->getPageBill();
        break;

        case 'pagethongke':
        $ControllHome->getPageThongKe();
        break;


        default:
        $ControllHome->getPageHome();
        break;
}

?>
