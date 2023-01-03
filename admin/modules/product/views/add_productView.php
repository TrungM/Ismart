<?php get_header();
global $upload,$img_name;
?>
<style>

    .error{
        color:red;
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar()?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <span style="color:green"><?php echo congratulation("add_product")?></span>  
                    <form method="POST"  enctype="multipart/form-data" >
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo set_value("product_name")?>">
                        <span class="error"> <?php echo error_fn("product_name") ?></span>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo set_value("product_code")?>">
                        <span class="error"> <?php echo error_fn("product_code") ?></span>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value("price")?>">
                        <span class="error"> <?php echo error_fn("price") ?></span>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_title" id="desc"  class="ckeditor"><?php echo set_value("product_title")?></textarea>
                        <span class="error"> <?php echo error_fn("product_title") ?></span>
                        <label for="desc">Chi tiết</label>
                        <textarea name="desc" id="desc" class="ckeditor" value=""><?php echo set_value("desc")?></textarea>
                        <span class="error"> <?php echo error_fn("desc") ?></span>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <input type="hidden" name="product_img" value="<?php echo $img_name?>">
                            <img src="<?php echo $upload?>">
                            <span class="error"> <?php echo error_fn("product_img") ?></span>

                        </div>
                        <label>Danh mục chính sản phẩm</label>
                        <select name="cat_title" id="main_title">
                        <option value="">-- Chọn danh mục --</option>

                            <?php
                            foreach($list_cat as $item){
                                ?>
                            <option value="<?php echo  $item["cat_title"]?>"><?php echo  $item["cat_title"]?>

                        </option>
                                <?php
                            }
                            ?>
                        </select>
                        <span class="error"> <?php echo error_fn("cat_title") ?></span>
                        <label>Danh mục con sản phẩm</label>
                        <select name="cat_title_child" id="cat_title_child">
                            <option value="0">-- Chọn danh mục --</option>
                        </select>
                        <!-- <span class="error"> <?php echo error_fn("cat_title_child") ?></span> -->

                        <button type="submit" name="btn_add_product" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {

    $("#main_title").change(function (e) {
var main_title=  $("#main_title").val();
var data_main_title={main_title:main_title};

$.ajax({
    url: "?mod=product&controller=index&action=select_cat_title",
    method: "POST",
    data: data_main_title,
    dataType: "text",
    success: function (data) {
        $("#cat_title_child").html(data);
    },
    
});

      })

  
})
</script>
<?php get_footer()?>