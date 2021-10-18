<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/down/admin_style1.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/down/style.css" media="screen" />

<body>

</body>

</html>
<?php
if (!empty($_SESSION['current_user'])) {
    ?>
<div class="main-content">
    <form id="editing-form" method="POST"
        action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&productid=" . $_GET['productid'] : "?action=add" ?>"
        enctype="multipart/form-data">
        <input type="submit" title="Lưu sản phẩm" value="" />
        <div class="clear-both"></div>
        <div class="wrap-field">
            <label>Tên sản phẩm: </label>
            <input type="text" name="name" value="<?= (!empty($product) ? $product['productName'] : "") ?>" />
            <div class="clear-both"></div>
        </div>
        <div class="wrap-field">
            <label>Giá sản phẩm: </label>
            <input type="text" name="price"
                value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" />
            <div class="clear-both"></div>
        </div>
        <div class="wrap-field">
            <label>Ảnh đại diện: </label>
            <div class="right-wrap-field">
                <?php if (!empty($product['image'])) { ?>
                <img src="../<?= $product['image'] ?>" /><br />
                <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                <?php } ?>
                <input type="file" name="image" />
            </div>
            <div class="clear-both"></div>
        </div>
        <div class="wrap-field">
            <label>Thư viện ảnh: </label>
            <div class="right-wrap-field">
                <?php if (!empty($product['gallery'])) { ?>
                <ul>
                    <?php foreach ($product['gallery'] as $image) { ?>
                    <li>
                        <img src="../<?= $image['path'] ?>" />
                        <a href="gallery_delete?id=<?= $image['id'] ?>">Xóa</a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                <?php foreach ($product['gallery'] as $image) { ?>
                <input type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                <?php } ?>
                <?php } ?>
                <input multiple="" type="file" name="gallery[]" />
            </div>
            <div class="clear-both"></div>
        </div>
        <div class="wrap-field">
            <label>Nội dung: </label>
            <textarea name="content"
                id="product-content"><?= (!empty($product) ? $product['content'] : "") ?></textarea>
            <div class="clear-both"></div>
        </div>
    </form>
    <div class="clear-both"></div>
    <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('product-content');
    </script>
    <?php } ?>
</div>
</div>

<?php include 'inc/footer.html';?>