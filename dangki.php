<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCustomers = $cs->insert_customers($_POST);
    }
?>
<style>
.container1 {
    max-width: 1300px;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    margin: 5px auto;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container1 .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container1 .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}

form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid {
    border-color: #9b59b6;
}

form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
}

form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
}

form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
}

#dot-1:checked~.category label .one,
#dot-2:checked~.category label .two,
#dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
}

form input[type="radio"] {
    display: none;
}

form .button {
    height: 45px;
    margin: 35px 0
}

form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

form .button input:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}

@media(max-width: 584px) {
    .container1 {
        max-width: 100%;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }

    form .category {
        width: 100%;
    }

    .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
        width: 5px;
    }
}

@media(max-width: 459px) {
    .container .content .category {
        flex-direction: column;
    }
}
</style>
<div class="container1">
    <div class="title">Đăng kí</div>
    <div class="content">
        <?php
    		if(isset($insertCustomers)){
    			echo $insertCustomers;
    		}
    		?>
        <form action="#" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Họ và tên</span>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Ngày sinh</span>
                    <input type="date" name="date" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Số điện thoại</span>
                    <input type="text" name="phone" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Mật khẩu</span>
                    <input type="password" name="password1" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <div class="gender-details" style="width: 150px;">
                        <input type="radio" name="gender" id="dot-1" value="0">
                        <input type="radio" name="gender" id="dot-2" value="1">
                        <span class="gender-title">Giới tính</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender" name="gioitinh">Nam</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender" name="gioitinh">Nữ</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Nhập lại mật khẩu</span>
                    <input type="password" name="password2" placeholder="Confirm your password" required>
                </div>
            </div>
    </div>
    <div class="button">
        <input type="submit" name="submit" value="Đăng kí">
    </div>
</div>

</form>
</div>
</div>
<?php 
	include 'inc/footer.php';
	
 ?>