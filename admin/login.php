<?php
	include '../classes/adminlogin.php';
?>
<?php
	$class = new adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$adminUser = $_POST['adminUser'];
     	$adminPass = md5($_POST['adminPass']);
     	$login_check = $class->login_admin($adminUser,$adminPass);
	}
?>
</script>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://pdp.edu.vn/wp-content/uploads/2021/02/anh-icon-facebook-cute-dep.jpg">
    <title>admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/stylelo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script>
    window.console = window.console || function(t) {}; 
    </script>
      <script>
      if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
      }
    </script>
</head>
<body translate="no" id="particles-js">
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" action="" autocomplete="off" method="POST" >
      <h4>Admin<span>Dashboard</span></h4>
      <span><?php
			if(isset($login_check)){
				echo $login_check;
			}
			 ?></span>
      <h5>Sign in to your account.</h5>
        <input type="text" name="adminUser" placeholder="Username" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="adminPass" placeholder="Passsword" id="pwd" autocomplete="off">
        <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" name="dangnhap" value="Đăng nhập" class="btn1">
      </form>
        <a href="#" class="dnthave">Don’t have an account? Sign up</a>
  </div> 
       <div class="footer">
      <span>Made with <i class="fa fa-heart pulse"></i> <a href=""></a><a href="">By Anees Khan</a></span>
    </div>
</div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

  <script src="https://cldup.com/S6Ptkwu_qA.js"></script>
      <script id="rendered-js">
var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');

eye.addEventListener('click', togglePass);

function togglePass() {

  eye.classList.toggle('active');

  pwd.type == 'password' ? pwd.type = 'text' : pwd.type = 'password';
}

// Form Validation
// ParticlesJS

// ParticlesJS Config.
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 60,
      "density": {
        "enable": true,
        "value_area": 800 } },


    "color": {
      "value": "#ffffff" },

    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000" },

      "polygon": {
        "nb_sides": 5 },

      "image": {
        "src": "img/github.svg",
        "width": 70,
        "height": 70 } },


    "opacity": {
      "value": 0.1,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false } },


    "size": {
      "value": 6,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false } },


    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.1,
      "width": 2 },

    "move": {
      "enable": true,
      "speed": 1.5,
      "direction": "top",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200 } } },



  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse" },

      "onclick": {
        "enable": false,
        "mode": "push" },

      "resize": true },

    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1 } },


      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3 },

      "repulse": {
        "distance": 200,
        "duration": 0.4 },

      "push": {
        "particles_nb": 4 },

      "remove": {
        "particles_nb": 2 } } },



  "retina_detect": true });
//# sourceURL=pen.js
    </script>

</body></html>
