<!DOCTYPE html>
<?php include_once "link.php";?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
  		::placeholder {
    		font-size: 15px; 
  		}
  		.login{
  			font-size: 15px; 
  		}
  		.title-login{
  			padding: 10px 0;
  		}

</style>
</head>
<body>
<section style="padding: 35px 0;">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="/weblaptop/public/img/sign_up.png" 
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="">
        	<div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h2 class="title-login">Sign up</h2>
          </div>

           <!-- User input -->
          <div class="form-outline mb-4">
            <input name="name" type="text" id="form3Example3" class="form-control form-control-lg login "
              placeholder="Enter user name" />
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
          	<!-- <label class="form-label" for="form3Example3">Email address</label> -->
            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg login "
              placeholder="Enter email" />
          </div>

          <div class="form-outline mb-4">
            <input name="phone" type="number" id="form3Example3" class="form-control form-control-lg login "
              placeholder="Enter phone number" />
          </div>

          <div class="form-outline mb-4">
            <input name="address" type="text" id="form3Example3" class="form-control form-control-lg login "
              placeholder="Enter address" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
          	<!-- <label class="form-label" for="form3Example4">Password</label> -->
            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg login"
              placeholder="Enter password" />

          </div>

          <div class="form-outline mb-4">
            <!-- <label class="form-label" for="form3Example4">Password</label> -->
            <input name="repassword" type="password" id="form3Example4" class="form-control form-control-lg login"
              placeholder="Enter password" />

          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
               I agree all statements in terms of service
              </label>
            </div>
          </div>

          <div class="text-center mt-4 pt-2">
            <button type="submit" name="register" class="btn btn-primary" style="width: 100%;">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
<footer style="padding: 20px 45px; border-top: 2px solid rgb(104,104,104);">
		<?php include_once "footer.php";?>
</footer>
</html>