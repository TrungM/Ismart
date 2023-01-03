<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
  <div class="wrap clearfix">
    <?php get_sidebar() ?>
    <div id="content" class="detail-exhibition fl-right">
      <ul class="list-item" style="padding: 5px 5px;;">
        <li>
          <h3 class="title">Mã đơn hàng</h3>
          <span class="detail" style="font-weight:900;font-size:20px;"><?php echo $order_code ?></span>
        </li>
      </ul>
      <div class="section">
        <div class="section-head">
          <h3 class="section-title">Thông tin vận chuyển</h3>
        </div>
        <div class="ul-responsive shipping">
          <ul class="shipping-header ">

            <li class="thead-text">Tên người nhận</li>
            <li class="thead-text">Email người nhận</li>
            <li class="thead-text">Ngày đặt hàng</li>
            <li class="thead-text">Địa chỉ</li>
            <li class="thead-text">Ghi chú</li>
            <li class="thead-text">Phương thức thanh toán</li>
          </ul>
          <ul class="shipping-detail ">
            <?php
            foreach ($detail_shipping as $item) {
            ?>
              <tr>
                <li class="thead-text"><?php echo $item["shipping_name"] ?></li>
                <li class="thead-text"><?php echo $item["shipping_email"] ?></li>
                <li class="thead-text"><?php echo $item["created_at"] ?></li>
                <?php
                if($item["shipping_wards"]=="Không có giá trị"){
                  ?>
                   <li class="thead-text">Không có giá trị</li>
                  <?php
                  
                }else{
                  ?>
                       <li class="thead-text"><?php echo $item["shipping_number_address"].' , '.ward($item["shipping_wards"]).' , '.district($item["shipping_district"]).' ,'. province($item["shipping_province"]) ?></li>
                  <?php
                }
                ?>
           
                <li class="thead-text"><?php echo $item["shipping_note"] ?></li>
                <li class="thead-text"><?php echo $item["shipping_payment"] ?></li>


              <?php
            } ?>

          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<?php get_footer() ?>