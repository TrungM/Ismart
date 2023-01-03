<?php get_header()?>
<style>
</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&controller=index&action=add_product" title="" id="add-new" class="fl-left">Thêm mới sản phẩm</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php echo $count_product?></span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <div class="form-s fl-right">
                            <input type="text" name="search" id="search_product" placeholder="Tìm kiếm mã sản phẩm" required>
                            </div>
                    </div>
                    <div class="actions">
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody id="show_search">
                                <tr>
                                    
                                </tr>
                                <?php
                                foreach($list_product as $item){
                                    ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $item["product_code"]?></h3></span></td>
                                    <td>
                                        <div class="tbody-thumb">
                                            <!-- <img src="public/images/<?php echo $item["product_img"]?>" alt=""> -->
                                            <img src="../public/images/<?php echo $item["product_img"]?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="<?php echo $item["product_name"]?>" alt=""><?php echo $item["product_name"]?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo   $item["detail"] ?><?php echo   $item["product_id"] ?>" title="Chi tiết" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php   echo $item["delete"]?><?php echo $item['product_id']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo number_format( $item["product_price"])."đ"?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["cat_title_main"]?></span></td>
                                    <td><span class="tbody-text">Hoạt động</span></td>
                                    <td><span class="tbody-text"><?php echo $item["created_at"]?></span></td>
                                </tr>

                                    <?php
                                }
                                ?>
                       
                      
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                    <td><span class="tfoot-text">Hình ảnh</span></td>
                                    <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                    <td><span class="tfoot-text">Giá</span></td>
                                    <td><span class="tfoot-text">Danh mục</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
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


<script>
    $(document).ready(function () {

$("#search_product").on("keyup",function (e) {
var name_search= $("#search_product").val();
// alert(name_search);
var data_main_title={name_search:name_search};

$.ajax({
url: "?mod=product&controller=index&action=search_product",
method: "get",
data: data_main_title,
dataType: "html",
success: function (data) {
    $("#show_search").html(data);
},

});

  })


})
</script>
<?php get_footer()?>