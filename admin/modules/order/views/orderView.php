<?php  get_header()?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
    <?php echo get_sidebar()?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> </li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <!-- <td><span class="thead-text">Họ và tên</span></td> -->
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Hình thức nhận hàng </span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            foreach($list_order as $item){
                                ?>
                                     <tr>
                                    <td><span class="tbody-text" style="font-weight:bold;"><?php echo $item["order_code"]?></h3></span>
                                    <!-- <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["customer_id"]?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $item["delete"]?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td> -->
                                    <td><span class="tbody-text"><?php echo number_format( $item["order_total"])."đ"?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["order_status"]?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["created_at"]?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["delivery"]?></span></td>
                                    <td><a href="?mod=order&controller=index&action=detailOrder&order_code=<?php echo $item["order_code"]?> " title="" class="tbody-text">Chi tiết</a></td>
                                </tr>
                                <?php
                            } ?>
            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="tfoot-text">Mã đơn hàng</span></td>
                                    <!-- <td><span class="tfoot-text">Họ và tên</span></td> -->
                                    <td><span class="tfoot-text">Tổng giá</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Hình thức vận chuyển</span></td>
                                    <td><span class="tfoot-text">Chi tiết</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  get_footer()?>
