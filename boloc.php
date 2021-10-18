<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<!-- <?php
	if(isset($_GET['action']) && $_GET['action']=='hmv'){
        $spmoi=$product->getproductdt_new();
    }else if(isset($_GET['action']) && $_GET['action']=='AZ'){
        $spAZ=$product->getproductdtAZ();
    }else if(isset($_GET['action']) && $_GET['action']=='ZA'){
        $spAZ=$product->getproductdtZA();
    }else if(isset($_GET['action']) && $_GET['action']=='tang'){
        $spAZ=$product->getproductdttang();
    }else if(isset($_GET['action']) && $_GET['action']=='giam'){
        $spAZ=$product->getproductdtgiam();
    }
    else{
        echo "<script>window.location ='404.php'";
    }
?> -->





<div class="head_boloc">
                <div class="boloc">
                    <p class="boloc_p">Có 30 sản phẩm</p>
                    <div class="check_gia">
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Dưới 5 triệu <input type="checkbox"><span class="checkmark"></span></a></label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Từ 5 đến 10 triệu <input type="checkbox"> <span class="checkmark"></span></a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Từ 10 đến 20 triệu <input type="checkbox" checked=""><span class="checkmark"></span></a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">Trên 20 triệu <input type="checkbox"><span class="checkmark"></span></a>
                            </label>
                        </div>
                    </div>
                    <div class="link_boloc">
                        <div class="a_boloc"><button class="dropbtn1" onclick="myFunction1()">Bộ lọc</button></div>
                        <div class="a_boloc">
                            <button type="button" class="dropbtn" onclick="myFunction()"> <span>Sắp xếp theo</span></button>
                            <div id="sort-dropdown" class="dropdown-content">
                                <a rel="nofollow" href="?action=hmv">Hàng mới về</a>
                                <a rel="nofollow" href="?action=AZ">A =&gt; Z</a>
                                <a rel="nofollow" href="?action=ZA">Z =&gt; A</a>
                                <a rel="nofollow" href="?action=tang">Giá tăng dần</a>
                                <a rel="nofollow" href="?action=giam">Giá giảm dần</a>
                            </div>
                            <script>
                                function myFunction() {
                                    document.getElementById("sort-dropdown").classList.toggle("show");
                                }

                                // Close the dropdown if the user clicks outside of it
                                window.onclick = function (event) {
                                    if (!event.target.matches('.dropbtn')) {
                                        var dropdowns = document.getElementsByClassName("dropdown-content");
                                        var i;
                                        if (dropdowns != null) {
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                    openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div id="filter-box" class="filter-content .active">
                    <div class="filter-feature">
                        <div class="filter-title">Tính năng</div>
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    2 SIM <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Bảo mật vân tay <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Chuyên self <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Hỗ trợ 4G <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    Pin khủng(&gt;3000 mAh) <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="filter-feature">
                        <div class="filter-title">Bộ nhớ</div>
                        <div class="options">
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    2 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    4 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    8 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    16 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                            <label class="container-checkbox">
                                <a rel="nofollow" href="">
                                    32 GB <input type="checkbox">
                                    <span class="checkmark"></span>
                                </a>
                            </label>
                        </div>
                    </div>
                </div>
                <script>
                    function myFunction1() {
                        document.getElementById("filter-box").classList.toggle("active");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function (event) {
                        if (!event.target.matches('.dropbtn1')) {
                            var dropdownss = document.getElementsByClassName("filter-content");
                            var i;
                            for (i = 0; i < dropdownss.length; i++) {
                                var openDropdown1 = dropdownss[i];
                                if (openDropdown1.classList.remove('active')) {
                                    openDropdown1.classList.contains('active');
                                }
                            }
                        }
                    }
                </script>
            </div>