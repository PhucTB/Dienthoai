<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$brand = new brand();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$delbrand = $brand->del_brand($id);
}
?>
<style>
.col-6_demo {
    height: 100px;
    width: 20%;
    border: 1px solid #000;
    padding: 10px;
    margin: 20px 30px;
    display: flex;
}

.row_table {
    width: 100%;
    height: auto;
    display: flex;
}

.img_icon {
    width: 35%;
    height: auto;
    margin-left: 10px;
}

.img_icon img {
    height: 90px;
}

.text_dv {
    width: 65%;
    height: auto;
    box-sizing: border-box;
    padding: 20px;
}

.col-combo {
    height: 30px;
    width: 20%;
}

form#tbl {
    width: 100%;
    height: auto;
    display: flex;
}

select#connect {
    width: 210px;
    height: 30px;
    border: 1px solid #C7C7C7;
    padding: 0 10px;
}

.To_date {
    width: 200px;
    height: 28px;
    border: 1px solid #C7C7C7;
}

span.To_date {
    padding: 6px;
    background: #B5B5B5;
}

button.button {
    width: 100px;
    height: 30px;
    margin-left: 5px;
    margin-right: 5px;
}

.date_time {
    margin-left: 20px;
}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Doanh thu
        </h2>
        <div class="row_table">
            <form action="" method="post" id="tbl">
                <select name="" id="connect">
                    <option> <span>--Khách hàng--</span></option>
                </select>
                <select name="" id="connect">
                    <option value="">--Nhân viên--</option>
                </select>
                <select name="" id="connect">
                    <option value="">--Sản phẩm--</option>
                </select>
                <div class="date_time">
                    <input type="date" name="" id="" class="To_date">
                    <span class="To_date">To</span>
                    <input type="date" name="" id="" class="To_date">
                </div>

                <button class="button">Tuần</button>
                <button class="button">Tháng</button>
                <button class="button">Quý</button>
                <input type="submit" value="Tìm kiếm" class="button">
            </form>
        </div>
        <div class="row_table">
            <div class="col-6_demo">
                <div class="img_icon">
                    <img src="img/pngegg (8).png" alt="">
                </div>
                <div class="text_dv">
                    <span>Tiền bán hàng</span>
                    <p>100000vnd</p>
                </div>

            </div>
            <div class="col-6_demo">
                <div class="img_icon">
                    <img src="img/demo1.png" alt="">
                </div>
                <div class="text_dv">
                    <span>Tổng sản phẩm bán</span>
                    <p>12/34</p>
                </div>

            </div>
            <div class="col-6_demo">
                <div class="img_icon">
                    <img src="img/pngegg (2).png" alt="">
                </div>
                <div class="text_dv">
                    <span>Tổng số hóa đơn</span>
                    <p>12</p>
                </div>

            </div>
            <div class="col-6_demo">
                <div class="img_icon">
                    <img src="img/clipart3391268.png" alt="">
                </div>
                <div class="text_dv">
                    <span>Tỏng hoàn trả </span>
                    <p>0</p>
                </div>

            </div>
        </div>


        <div class="block">
            <?php

			if (isset($delbrand)) {
				echo $delbrand;
			}

			?>

            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày lập</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$show_brand = $brand->show_brand();
					if ($show_brand) {
						$i = 0;
						while ($result = $show_brand->fetch_assoc()) {
							$i++;

					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><a href="brandedit.php?brandid=<?php echo $result['brandId'] ?>">Sửa</a> || <a
                                onclick="return confirm('Bạn có muốn xóa không ?')"
                                href="?delid=<?php echo $result['brandId'] ?>">Xóa</a></td>
                    </tr>
                    <?php
						}
					}
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<script>
function openNav() {
    document.getElementById("myNav").style.width = "80%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
<?php include 'inc/footer.html'; ?>