<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
  <div class="wrap clearfix">
    <?php get_sidebar() ?>
    <div id="content" class="detail-exhibition fl-right">
      <div class="section" id="info">
        <div class="section-head">
          <h3 class="section-title">Thông tin đơn hàng</h3>
        </div>
        <ul class="list-item">

          <li>
            <h3 class="title">Mã đơn hàng</h3>
            <span class="detail" style="font-weight:900;font-size:20px;"><?php echo $order_code ?></span>
          </li>


          <form>
            <li>
              <h3 class="title">Tình trạng đơn hàng</h3>
              <input type="hidden" name="" id="order_code" value="<?php echo $order_code ?>">
              <select name="status" id="status">

              <?php
              if ($status =="Đang xử lý") {
              ?>
                  <option value='Đang xử lý' selected>Đang xử lý</option>
                  <option value='Đang vận chuyển'>Đang vận chuyển</option>
                  <option value='Hoàn thành'> Hoàn thành</option>

              <?php
              } else if ($status == "Đang vận chuyển") {
              ?>

                  <option value='Đang xử lý'>Đang xử lý</option>
                  <option value='Đang vận chuyển' selected>Đang vận chuyển</option>
                  <option value='Hoàn thành'> Hoàn thành</option>

              <?php
              } else if ($status== "Hoàn thành") {
              ?>

                  <option value='Đang xử lý'>Đang xử lý</option>
                  <option value='Đang vận chuyển'>Đang vận chuyển</option>
                  <option value='Hoàn thành' selected> Hoàn thành</option>

              <?php
              }
              ?>
                </select>




              <input type="submit" name="sm_status" value="Cập nhật đơn hàng" id="btn_status">
            </li>
          </form>
        </ul>
      </div>
      <div class="section">
        <div class="section-head">
          <h3 class="section-title">Thông tin vận chuyển</h3>
        </div>
        <a href="?mod=order&controller=index&action=detailShipping&order_code=<?php echo $order_code ?>">Chi tiết vận chuyển </a>

      </div>
      <div class="section">
        <div class="section-head">
          <h3 class="section-title">Sản phẩm đơn hàng</h3>
        </div>
        <div class="table-responsive">
          <table class="table info-exhibition">
            <thead>
              <tr>
                <td class="thead-text">STT</td>
                <td class="thead-text">Tên sản phẩm</td>
                <td class="thead-text">Đơn giá</td>
                <td class="thead-text">Số lượng</td>
                <td class="thead-text">Thành tiền</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $stt = 0;
              foreach ($detail_order as $item) {
                $stt++;
              ?>
                <tr>
                  <td class="thead-text"><?php echo $stt;
                                          ?></td>

                  <td class="thead-text"><?php echo $item["product_name"] ?></td>
                  <td class="thead-text"><?php echo number_format($item["product_price"]) . "đ" ?></td>
                  <td class="thead-text"><?php echo $item["product_qty"] ?></td>
                  <td class="thead-text"><?php echo number_format($item["product_price"]) . "đ" ?></td>
                </tr>
              <?php
              } ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="section">
        <h3 class="section-title">Giá trị đơn hàng</h3>
        <div class="section-detail">
          <ul class="list-item clearfix">
            <li>
              <span class="total-fee">Tổng số lượng</span>
              <span class="total">Tổng đơn hàng</span>
            </li>
            <li>
              <?php
              ?>
              <span class="total-fee"><?php echo $number_order_total ?> sản phẩm</span>
              <span class="total"><?php echo number_format($list_order_total["order_total"]) . "đ" ?></span>
              <?php

              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {


    $("#btn_status").click(function(e) {
      e.preventDefault()
      var status_now = $("#status").val();
      var order_code = $("#order_code").val();
      //  alert(status_now);



      var data_main = {
        status_now: status_now,
        order_code: order_code
      };
      $.ajax({
        url: "?mod=order&controller=index&action=update_status",
        method: "POST",
        data: data_main,
        dataType: "html",

        success: function(data) {

          alert("Cập nhật tình trạng thành công");



        },


      });


    })





  })
</script>
<?php get_footer() ?>