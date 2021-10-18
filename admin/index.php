<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
        <h2> Admin</h2>
        <div class="block">
            <div class="row_table">
                <div class="col-6_demo">
                    <div class="img_icon">
                        <img src="img/pngegg (6).png" alt="">
                    </div>
                    <div class="text_dv">
                        <span>Chiết khấu</span>
                        <p>100000vnd</p>
                    </div>

                </div>
                <div class="col-6_demo">
                    <div class="img_icon">
                        <img src="img/pngegg (2).png" alt="">
                    </div>
                    <div class="text_dv">
                        <span>Tổng doanh thu</span>
                        <p>100000vnd</p>
                    </div>

                </div>
                <div class="col-6_demo">
                    <div class="img_icon">
                        <img src="img/pngegg (3).png" alt="">
                    </div>
                    <div class="text_dv">
                        <span>Tổng tiền vốn</span>
                        <p>100000vnd</p>
                    </div>

                </div>
                <div class="col-6_demo">
                    <div class="img_icon">
                        <img src="img/pngegg (7).png" alt="">
                    </div>
                    <div class="text_dv">
                        <span>Lợi nhuận </span>
                        <p>100000vnd</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.html';?>