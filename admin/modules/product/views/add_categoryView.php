<?php get_header();?>
<style>
          #radio_btn{
                    display: flex;

                    justify-content: space-between;
                    width: 250px;
                    margin-bottom: 10px;
          }

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
                    <h3 id="index" class="fl-left">Thêm danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                 <p style="color:green"><?php echo  congratulation("add_cat_child")?></p>   
                 <p style="color:green"> <?php echo    congratulation("add_cat_main")?></p>   
                    <form method="POST">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cat_title" id="">
                        <span class="error"> <?php echo error_fn("cat_title") ?></span>
                        <span></span>
                        <label for="">Người tạo</label>
                        <input type="text" name="creater" id="" value="<?php echo $_SESSION["username_admin"]?>" readonly style="cursor:not-allowed;  background: #f3f3f3;">
                        <span class="error"> <?php echo error_fn("creater") ?></span></br>
                        <label for="">Hình thức hoạt động</label>
                        <div id="radio_btn">
                        <input type="radio" name="cat_value" id="cat_value_main" value="0">Danh mục chính 
                        <input type="radio" name="cat_value" id="cat_value_child" value=" " data-exitst="child_cat" >Danh mục con
                        </div>
                        <span class="error"> <?php echo error_fn("cat_value") ?></span></br>

                
                              <select name="actions" id="cat_features" style="display: none;">
                              <option value="">--Lựa chọn danh mục chính--</option>
                              <?php
                              if(isset($list_cat)){
                                        foreach($list_cat as $item){


                                        ?>
                                             <option value="<?php echo  $item["cat_title"]?>"><?php echo  $item["cat_title"]?>
                                            </option>
                    
                                        <?php
                              }
                    }else
                    {
                              ?>
                     <span class="error">Không tồn tại danh sách</span>

                              <?php
                    }

                              ?>
                           
                            </select>
                            <span class="error"> <?php echo error_fn("actions") ?></span>


                 
                    
                        <button type="submit" name="btn-add-cat" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready(function(){
var cat_value_child=$("#cat_value_child");

cat_value_child.click(function(){
          $("#cat_features").show();

})
$("#cat_value_main").click(function(){
          $("#cat_features").hide();
          


})
});



</script>

<?php get_footer()?>