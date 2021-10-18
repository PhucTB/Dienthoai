<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php
$pd = new product();
$fm = new Format();
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $delpro = $pd->del_product($id);
}
?>
<style>
button.classdmo {
    position: absolute;
    top: 16.2%;
    right: 1%;
    background-color: rgba(2, 126, 251, 1);
    padding: 10px;
}
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <button class="classdmo"><a href="productadd.php">Thêm
                sản
                phẩm</a></button>
        <div class="block">
            <?php
            if (isset($delpro)) {
                echo $delpro;
            }
            ?>

            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Hãng</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá bán</th>
                        <th>Giá Giảm</th>
                        <th>Đánh giá</th>
                        <th>Loại</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $pdlist = $pd->show_product();
                    if ($pdlist) {
                        $i = 0;
                        while ($result = $pdlist->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['catName'] ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                        <td><?php echo $result['price'] ?></td>
                        <td><?php echo $result['price_promotion'] ?></td>
                        <td><?php
                                    echo $result['content'];
                                    ?></td>
                        <td><?php
                                    if ($result['type'] == 0) {
                                        echo 'Feathered';
                                    } else {
                                        echo 'Non-Feathered';
                                    }
                                    ?></td>
                        <td><button class="custom-btn btn-4"
                                href="productedit.php?productid=<?php echo $result['productId'] ?>">Update</button>
                            <button class="custom-btn btn-5"
                                href="?productid=<?php echo $result['productId'] ?>">Delete</button>
                        </td>
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
<?php include 'inc/footer.html'; ?>