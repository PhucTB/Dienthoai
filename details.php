<?php
ob_start();
include 'inc/header.php';
// include 'inc/slider.php';
?><?php

    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location ='404.php'";
    } else {
        $id = $_GET['proid'];
    }
    $customer_id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

        $productid = $_POST['productid'];
        $insertCompare = $product->insertCompare($productid, $customer_id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

        $productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binhluansanpham'])) {

        $productid1 = $_POST['productid'];
        $binhluan = $_POST['binhluansp'];
        $time = $_POST['time'];
        $insertBinhluan = $product->insertBinhluan($productid1, $customer_id, $binhluan, $time);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($quantity, $id);
    }
    // if(isset($_POST['binhluan_submit'])){
    // 	$binhluan_insert = $cs->insert_binhluan();
    // }
    ?><style>
.group {
    zoom: 1;
    display: flex;
}

a.menu_col_1:hover {
    background-color: #fff;
    color: aqua;
    font-size: 20px;
}

ol.breadcrumb {
    background-color: #fff;
    margin: 0;
    padding: 20px 0;
}
</style>
<div class="main">
    <div class="content"><?php
                            $get_product_details = $product->get_details($id);
                            if ($get_product_details) {
                                while ($result_details = $get_product_details->fetch_assoc()) {
                            ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="topbrands.php?brandid=<?php echo $result_details['brandId'] ?>"><?php echo $result_details['brandName'] ?></a>
                </li>
            </ol>
        </nav>
        <div>
            <h4><?php echo $result_details['productName'] ?> </h4>
        </div>
        <div class="section group">

            <div class="cont-desc span_1_of_2">
                <div class="information_phone">
                    <div class="grid images_3_of_2 middle">
                        <div class="slides">
                            <input type="radio" name="r" id="r1" checked>
                            <input type="radio" name="r" id="r2">
                            <input type="radio" name="r" id="r3">
                            <div class="slides1 s1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                            <div class="slides1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                            <div class="slides1">
                                <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt />
                            </div>
                        </div>
                        <div class="navigation">
                            <label for="r1" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                            <label for="r2" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                            <label for="r3" class="bar"><img src="admin/uploads/<?php echo $result_details['image'] ?>"
                                    alt /></label>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?php echo $result_details['productName'] ?></h2>
                        <p style="font-size:20px"><?php echo $fm->textShorten($result_details['product_desc'], 1000) ?>
                        </p>
                        <div class="price">
                            <p>Gi??:
                                <span><?php echo $fm->format_currency($result_details['price']) . " " . "VN??" ?></span>
                                <del><?php echo $fm->format_currency($result_details['price']) . " " . "VN??" ?></del>
                            </p>
                            <p>Lo???i s???n ph???m:
                                <span><?php echo $result_details['catName'] ?></span>
                            </p>
                            <p>H??ng :
                                <span><?php echo $result_details['brandName'] ?></span>
                            </p>
                        </div>
                        <div class="add-cart">
                            <form action method="post">
                                <input type="number" class="buyfield" name="quantity" value="1" min="1" />
                                <input type="submit" class="buysubmit" name="submit" value="Th??m v??o gi??? h??ng" />
                            </form><?php
                                            if (isset($insertCart)) {
                                                echo $insertCart;
                                            }
                                            ?>
                        </div>
                        <div class="add-cart">
                            <div class="button_details">
                                <form action method="POST">
                                    <input type="hidden" name="productid"
                                        value="<?php echo $result_details['productId'] ?>" /><?php

                                                                                                                                        $login_check = Session::get('customer_login');
                                                                                                                                        if ($login_check) {
                                                                                                                                            echo '<input type="submit" class="buysubmit" name="compare" value="Th??m v??o so s??nh"/>' . '  ';
                                                                                                                                        } else {
                                                                                                                                            echo '';
                                                                                                                                        }

                                                                                                                                        ?>
                                </form>
                                <form action method="POST">
                                    <input type="hidden" name="productid"
                                        value="<?php echo $result_details['productId'] ?>" /><?php

                                                                                                                                        $login_check = Session::get('customer_login');
                                                                                                                                        if ($login_check) {

                                                                                                                                            echo '<input type="submit" class="buysubmit" name="wishlist" value="Th??m v??o y??u th??ch">';
                                                                                                                                        } else {
                                                                                                                                            echo '';
                                                                                                                                        }

                                                                                                                                        ?>
                                </form>
                            </div>
                            <div class="clear"></div>
                            <p><?php
                                        if (isset($insertCompare)) {
                                            echo $insertCompare;
                                        }
                                        ?><?php
                                            if (isset($insertWishlist)) {
                                                echo $insertWishlist;
                                            }
                                            ?></p>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <h3>N???i dung s???n ph???m</h3>
                    <div id="content">
                        <div class="dt_thongtin_construction">
                            <div class="dt_construction_text">
                                <h3 style="margin-bottom: 20px;font-size: 36px;">iPhone 12 mini 64 GB tuy l?? phi??n b???n
                                    th???p nh???t trong b??? 4
                                    iPhone 12 series,
                                    nh??ng v???n s??? h???u nh???ng ??u ??i???m v?????t tr???i v??? k??ch th?????c nh??? g???n,
                                    ti???n l???i, hi???u n??ng ?????nh cao, t??nh n??ng s???c nhanh c??ng b??? camera ch???t l?????ng cao.
                                </h3>
                                <h3 style="margin-bottom: 20px;font-size: 24px;">??i???n tho???i s??? h???u thi???t k??? ?????ng c???p,
                                    sang tr???ng</h3>
                                <p class="text_dt_p">??i???n tho???i iPhone 12 Mini 64GB ????? kh??ng c??n ???????c thi???t k??? vi???n m??y
                                    bo cong ??? c??c c???nh
                                    nh?? ??? c??c d??ng m??y tr?????c m?? ???????c thay th??? b???ng ph???n c???nh m??y ???????c v??t ph???ng t???o n??n
                                    s??? m???nh m??? v?? c?? t??nh
                                    cho ng?????i d??ng.
                                    B??n c???nh ????, m??y c??n ???????c l??m b???ng khung nh??m cao c???p trong ng??nh h??ng kh??ng v?? tr???
                                    mang ?????n thi???t k??? c???ng
                                    c??p v?? v?? c??ng b???n b???.
                                    ?????c bi???t, m??y n???i b???t v???i h??? th???ng camera h??nh vu??ng v?? c??ng ?????c ????o k???t h???p v???i m???t
                                    l??ng b???ng k??nh mang
                                    ?????n c???m gi??c c???m n???m v?? c??ng th??ch.
                                </p>
                                <div class="detail-content-image">
                                    <figure class="image-content image-auto">
                                        <img style="width: 100%;"
                                            src="https://cdn.nguyenkimmall.com/images/companies/_1/vien-thong/iphone/iphone-12-mini/iphone-12-mini/dien-thoai-iphone-12-mini-64gb-do-thiet-ke-dang-cap-sang-trong.jpg"
                                            alt="">
                                        <div class="text_i">
                                            <i>Thi???t k??? c???a iPhone 12 mini 64 GB </i>
                                        </div>

                                    </figure>
                                </div>
                                <h2 style="margin-bottom: 20px;">M??n h??nh si??u s???c n??t nh??? c??ng ngh??? OLED Super Retina
                                    XDR</h2>
                                <p class="text_dt_p">??i???n tho???i iPhone 12 Mini 64GB ????? ???????c thi???t k??? v???i m??n h??nh ki???u
                                    d??ng tai th??? v?? c??ng
                                    quen thu???c nh??ng ph???n vi???n m??n h??nh l???i g???n h??n n??n mang ?????n c???m gi??c m??n h??nh l???n
                                    m???c d?? k??ch th?????c m??n
                                    h??nh c???a ??i???n tho???i th??ng minh n??y ch??? 5.4 inch. Ch??nh v?? k??ch th?????c nh??? n??n b???n c??
                                    th??? d??? d??ng mang theo
                                    b??n m??nh v?? ????? v??o t??i ??o, qu???n 1 c??ch d??? d??ng h??n so v???i c??c d??ng ??i???n tho???i tr?????c.
                                    T???m OLED Super Retina ???????c trang b??? cho chi???c ??i???n tho???i n??y mang ?????n nh???ng h??nh ???nh
                                    c?? m??u s???c s???ng ?????ng
                                    v?? ch??n th???c ?????n t???ng chi ti???t, kh??ng x???y ra t??nh tr???ng b??? nh???e m??u s???c.</p>
                                <div class="">
                                    <img style="width: 100%;"
                                        src="https://cdn.nguyenkimmall.com/images/companies/_1/vien-thong/iphone/iphone-12-mini/iphone-12-mini/dien-thoai-iphone-12-mini-64gb-do-man-hinh-sieu-sac-net.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="show-more" onclick="mysline()">?????c th??m</button>
                    <script>
                    var content = document.getElementById("content");
                    var button = document.getElementById("show-more");
                    button.onclick = function() {
                        console.log("Show more clicked!!!");
                        if (content.className == "open") {
                            content.className = "";
                            button.innerHTML = "?????c th??m";
                        } else {
                            content.className = "open";
                            button.innerHTML = "????ng";
                        }
                    };
                    </script>


                </div>
                <?php
                                    $get_product_details = $product->get_details($id);
                                    if ($get_product_details) {
                                        while ($result_details = $get_product_details->fetch_assoc()) {
                        ?>
                <div class="cauhinh">
                    <h2>C???u h??nh <?php echo $result_details['productName'] ?></h2>
                    <div class="parameter">
                        <ul>
                            <li>
                                <p class="lileft">M??n h??nh :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Manhinh'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">H??? ??i???u h??nh:</p>
                                <div class="liright">
                                    <span><?php echo $result_details['HDH'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Camera sau:</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Camerasau'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Camera tr?????c :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Cameratruoc'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Chip :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Chip'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Ram :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Ram'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Rom :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Rom'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Sim :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Sim'] ?></span>
                                </div>
                            </li>
                            <li>
                                <p class="lileft">Pin,s???c :</p>
                                <div class="liright">
                                    <span><?php echo $result_details['Pin'] ?>,<?php echo $result_details['Sac'] ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                                        }
                                    }
                        ?>
            </div>
        </div>
        <style>
        p {
            color: #000;
        }
        </style>
        <div class="content_bottom">
            <div class="heading">
                <h3>S???n ph???m c?? li??n quan</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
                                    $product_new = $product->getproduct_new();
                                    if ($product_new) {
                                        while ($result_new = $product_new->fetch_assoc()) { ?>
            <div class="box">
                <div class="product-top">
                    <span class="top_left">Tr??? g??p 0%</span>
                    <span class="top_right">-15%</span>
                </div>
                <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><img class="image"
                        src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
                <h3 class="product-name">
                    <ins style="font-size: 20px; margin-right: 20px;">VIVO</ins>
                    <a
                        href="details.php?proid=<?php echo $result_new['productId'] ?>"><?php echo $result_new['productName'] ?></a>
                </h3>
                <div class="product-price vat">
                    <span>
                        <del
                            style="margin-left: 20px;"><?php echo $fm->format_currency($result_new['price_promotion']) . " " . "VN??" ?></del>
                        <?php echo $fm->format_currency($result_new['price']) . " " . "VN??" ?>
                    </span>
                </div>
                <span class="start-result-count" style="float: right; margin-right: 5px;">0 ????nh gi??</span>
                <div class="text_none">
                    <div class="sort">
                        <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><span>Mua ngay </span></a>
                    </div>
                    <?php $productphone = $product->getPhone($result_new['productId']);
                                            if ($productphone) {
                                                while ($resultphone = $productphone->fetch_assoc()) { ?>
                    <div class="text_cauhinh">
                        <div class="text_p_c">
                            <p>M??n h??nh :<?php echo $resultphone['Manhinh'] ?></p>
                            <p>Ch??p :<?php echo $resultphone['Chip'] ?></p>
                        </div>
                        <div class="text_p_c">
                            <p>Ram : <?php echo $resultphone['Ram'] ?></p>
                            <p>Rom : <?php echo $resultphone['Rom'] ?></p>
                        </div>

                    </div>
                    <?php
                                                }
                                            } ?>
                </div>
            </div>
            <?php
                                        }
                                    }

                    ?>
        </div>

        <div class="comment_cus" style="width: 59.13%;">
            <div class="binhluan">
                <div class="row" style="margin:0px;">
                    <div class="col-comment">
                        <h5>B??nh lu???n s???n ph???m</h5><?php
                                                            if (isset($insertBinhluan)) {
                                                                echo $insertBinhluan;
                                                            }
                                                            $timestamp = time();
                                                            ?>
                        <form action method="POST">
                            <input type="hidden" name="productid" value="<?php echo $id ?>" />
                            <input type="hidden" name="time" value="<?php echo $timestamp ?>" />
                            <textarea rows="5" style="resize: none;" placeholder="B??nh lu???n...." class="form-control"
                                name="binhluansp"></textarea>
                            <?php $login_check = Session::get('customer_login');
                                    if ($login_check) {
                                        echo '<input type="submit" name="binhluansanpham" class="btn btn-success" value="G???i b??nh lu???n"/>';
                                    } else {
                                        echo '<a href="login.php"><h4>M???i ????ng nh???p h??? th???ng</h4></a>';
                                    }
                                    ?>
                        </form>

                    </div>
                    <?php
                                }
                            }
                    ?>
                    <!-- <?php
                            $product_new = $cs->show_comment($id);
                            if ($product_new) {
                                while ($result_new = $product_new->fetch_assoc()) { ?>
              <span>T???ng s??? b??nh lu???n <?php $result_new['tong'] ?></span>
              <?php }
                            } ?> -->
                    <style>
                    .media-list .media img {
                        width: 64px;
                        height: 64px;
                        border: 2px solid #e5e7e8;
                    }

                    .media {
                        line-height: 38px;
                    }

                    .media-body {
                        margin-left: 20px;
                    }

                    .media-list {
                        width: 100%;

                    }

                    li.media.adm {
                        margin-left: 80px;
                    }
                    </style>
                    <?php
                    function tinhtime($timebl)
                    {
                        $phut = round($timebl / 60);
                        $gio = round($phut / 60);
                        $ngay = round($gio / 24);
                        $thang = round($ngay / 30);
                        $nam = round($ngay / 365);
                        if ($timebl > 0 && $timebl < 60) {
                            return $timebl . 'Gi??y tr?????c';
                        } elseif ($timebl > 60 && $timebl < 3600) {
                            return $phut . ' Ph??t tr?????c';
                        } else if ($phut >= 60 && $phut < 1440) {
                            return $gio . ' Gi??? tr?????c';
                        } else if ($gio >= 24 && $gio <= 720) {
                            return $ngay . ' Ng??y tr?????c';
                        } else if ($ngay > 30 && $ngay < 365) {
                            return $thang . ' Th??ng tr?????c';
                        } else {
                            return $nam . 'N??m tr?????c';
                        }
                    }
                    $i = 0;
                    $product_new = $cs->show_comment($id);
                    $date = getdate();
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $timestamp = time();
                    if ($product_new) {
                        while ($result_new = $product_new->fetch_assoc()) {
                            $i++;
                            if ($result_new['tgbinhluan'] == 0) {
                            } else {
                                $thoigian = $timestamp - $result_new['tgbinhluan'];
                                $time1 = tinhtime($thoigian);
                    ?>
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo $time1 ?></small>
                                </span>
                                <strong class="text-success"><?php echo $result_new['Tenkhachhang'] ?></strong>
                                <p class="textdemo"><?php echo $result_new['binhluan'] ?></p>
                            </div>
                        </li>
                        <?php
                                    if ($result_new['binhluan_admin'] == "") {
                                    } else {
                                    ?>
                        <li class="media adm">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"></small>
                                </span>
                                <strong class="text-success">C???a h??ng PSD</strong>
                                <p class="textdemo"><?php echo $result_new['binhluan_admin'] ?></p>
                            </div>
                        </li>
                    </ul>
                    <?php }
                                }
                            }
                        } ?>
                    <div class="number">
                        <p><?php echo 'T???ng s??? b??nh lu???n' . ' :' . $i;
                        ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><?php
        include 'inc/footer.php';
        ob_flush();
        ?>