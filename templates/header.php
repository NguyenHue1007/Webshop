<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #f7f6f6;position: fixed;z-index: 100; width: 100vw; box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.1);">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?task=pagehome" style="color: red; font-size: 35px; margin: 15px 50px">
    	TN STORE
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?task=pagehome">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?task=pageintroduce">Giới thiệu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sản phẩm
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?task=pagehp">Hp</a></li>
            <li><a class="dropdown-item" href="index.php?task=pagelenovo">Lenovo</a></li>
             <li><a class="dropdown-item" href="index.php?task=pagemacbook">Macbook</a></li>
             <li><a class="dropdown-item" href="index.php?task=pageasus">Asus</a></li>
            <li><a class="dropdown-item" href="index.php?task=pagedell">Dell</a></li>
            <li><a class="dropdown-item" href="index.php?task=pageacer">Acer</a></li>
          </ul>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="index.php?task=pagecontact">Liên hệ</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <div class="navbar_cart_user">
         <div>
                    <?php if (isset($_SESSION['username'])){
                            if ($_SESSION['level'] ==2){ ?>
                            <a href="index.php?task=pageuser" class="btn btn-outline-light menu"><?php echo $_SESSION['username']?></a>
                            <a href="index.php?task=logout" class="btn btn-outline-light menu">Đăng xuất</a>
                    <?php }elseif ($_SESSION['level']==1){ ?>
                            <a href="" class="btn btn-outline-light menu"><?php echo $_SESSION['username']?></a>
                            <a href="index.php?task=logout" class="btn btn-outline-light menu">Đăng xuất</a>
                    <?php }?>
                    <?php }else{ ?>
                    <a href="index.php?task=pagelogin" class="btn btn-outline-light menu">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php } ?>
                      <a href="index.php?task=cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>

      	<!-- 	<a href="index.php?task=pagelogin">
      			<i class="fas fa-user"></i>
      		</a>
      		<a href="">
      			<i class="fas fa-shopping-cart"></i>
      		</a> -->
      </div>
    </div>
  </div>
</nav>