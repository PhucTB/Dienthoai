<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
$admin = Session::get('adminId');
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');

?>
<?php
$ct = new cart();


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách hóa đơn
        </h2>

        <div class="block">
            <?php
            if (isset($shifted)) {
                echo $shifted;
            }
            ?>
            <?php
            if (isset($del_shifted)) {
                echo $del_shifted;
            }

            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã hóa đơn</th>
                        <th>Tên Khách hàng</th>
                        <th>Tên Người bán</th>
                        <th>Tổng</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Kiểm tra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ct = new cart();
                    $fm = new Format();
                    $get_inbox_cart = $ct->get_hoadon_list();
                    if ($get_inbox_cart) {
                        $i = 0;
                        while ($result = $get_inbox_cart->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['id_hoadon'] ?></td>
                        <td><?php echo $result['Tenkhachhang'] ?></td>
                        <td><?php echo $result['adminName'] ?></td>
                        <td><?php echo $result['Tong'] ?></td>
                        <td><?php echo $fm->formatDate($result['Date']) ?></td>
                        <td>
                            <?php
                                    if ($result['check_hd'] == 1) {
                                    ?>
                            <a class="custom-btn btn-3" style="width: 200px;"
                                href="Hoadon1.php?customerid=<?php echo $result['customer_id'] ?>&&id_hoadon=<?php echo $result['id_hoadon'] ?>&&admin=<?php echo $admin ?> ">Hóa
                                đơn đã được tạo</a>
                            <?php
                                    } elseif ($result['check_hd'] == 0) {
                                    ?>
                            <a class="custom-btn btn-4" style="width: 200px;"
                                href="Hoadon1.php?customerid=<?php echo $result['customer_id'] ?>&&id_hoadon=<?php echo $result['id_hoadon'] ?>&&admin=<?php echo $admin ?> ">Tạo
                                hóa đơn</a>
                            <?php
                                    }
                                    ?>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <style>
            .form_hoadon {
                display: flex;
            }

            .p_hd {
                margin-top: 10px;
                margin-right: 20px;
            }

            select.sp_chon {
                width: 200px;
            }
            </style>
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
<?php include 'inc/footer.html'; ?>