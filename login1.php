<?php 
	ob_start();
	include 'inc/header.php';
	// include 'inc/slider.php';
?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertCustomers = $cs->insert_customers($_POST);
    }
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $email=$_POST['email'];
		$password=md5($_POST['password']);
        $login_Customers = $cs->login_customers($email,$password);
    }
?>
<style>
.form-control {
    background: none;
}

.form-group {
    border: 1px solid #fbceb5;
    border-radius: 25px;
}

.form-group.d-md-flex {
    border: none;
}
</style>

<body class="img js-fullheight" id="particles-js">
    <section class="ftco-section"
        style="background-image: url(https://cdn.vietnammoi.vn/171464242508312576/2020/4/20/top-dien-thoai-chup-hinh-1-1587399375548846515816-15873994638171119435604.jpg);width:1300px;margin:0 auto;height: auto;">
        <div class="container">
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Đăng nhập</h3>
                        <form action="" class="signin-form" method="POST">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control1" placeholder="email@gmail.com">
                            </div>
                            <div class="form-group">
                                <i class="typcn typcn-eye" id="eye"></i>
                                <input type="password" name="password" class="form-control1" placeholder="Passsword"
                                    id="pwd" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign
                                    In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="dangki.php" style="color: #fff">Registration ?</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center" style="color: #fff;">— Or Sign In With —</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script id="rendered-js">
    var pwd = document.getElementById('pwd');
    var eye = document.getElementById('eye');

    eye.addEventListener('click', togglePass);

    function togglePass() {

        eye.classList.toggle('active');

        pwd.type == 'password' ? pwd.type = 'text' : pwd.type = 'password';
    }
    </script>
</body>
<?php 
	include 'inc/footer.php';
	ob_flush();
 ?>