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


      .main_option{
        color:brown;
        font-weight: 500;
      }

</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar()?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                 <p style="color:green"><?php echo  congratulation("update_cat_child")?></p>   
                 <p style="color:green"> <?php echo    congratulation("update_cat_main")?></p>   
                 <span class="error"> <?php echo error_fn("check_cat_title") ?></span>
                 <?php
                        foreach( $list_cat_by_id as $a){
                            ?>

                        <form method="POST">
                    
                    <label for="">Tên danh mục</label>
                    <input type="text" name="cat_title" id="" value="<?php echo $a["cat_title"]?>">
                    <span class="error"> <?php echo error_fn("cat_title") ?></span>
                    <span></span>
                    <label for="">Người cập nhật</label>
                    <input type="text" name="creater" id="" value="<?php echo $_SESSION["username_admin"]?>" readonly style="cursor:not-allowed;  background: #f3f3f3;">
                    <span class="error"> <?php echo error_fn("creater") ?></span></br>
                    <label for="">Hình thức hoạt động</label>

                    <?php
                    
                    if($a["active"]=="0"){
                        ?>
                    <div id="radio_btn">
                    <input type="radio" name="cat_value" class="cat_value_main" value="0" checked>Danh mục chính 
                    <input type="radio" name="cat_value" class="cat_value_child" value=" " data-exitst="child_cat" >Danh mục con
                    </div>
                    <span class="error"> <?php echo error_fn("cat_value") ?></span></br>


                        <?php
                    }else{
                        ?>
                         <div id="radio_btn">
                    <input type="radio" name="cat_value" class="cat_value_main_active" value="0" >Danh mục chính 
                    <input type="radio" name="cat_value" class="cat_value_child_active" value=" " data-exitst="child_cat"  checked>Danh mục con
                    </div>
                    <span class="error"> <?php echo error_fn("cat_value") ?></span></br>
                        <?php


                    }
                    ?>
                  

            
                          <select name="actions" id="cat_features" style="display: none;">
                          <!-- <option value="">--Lựa chọn danh mục chính--</option> -->
                            <?php
                            if($a["active"]==0){
                                ?>
                            <option value="0">--Lựa chọn danh mục chính--</option>

                                <?php
                            }else{

                                
                                ?>
                                         <option value="<?php echo  $a["active"]?>" class="main_option"><?php echo  $a["active"]?></option>
                                         

                                <?php
                            }
                            
                            ?>

                          <?php
                          if(isset($list_cat_update)){
                                    foreach($list_cat_update as $item){
                                        


                                    ?>
                                         <option value="<?php echo  $item["cat_title"]?>"><?php echo  $item["cat_title"]?></option>
                                         
                
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


             
                
                    <button type="submit" name="btn-update-cat" id="btn-submit">Cập nhật</button>

                  
                </form>

                   
                            <?php
                        }
                        ?>
              
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready(function(){

$(".cat_value_child").click(function(){
          $("#cat_features").show();

})
$(".cat_value_main").click(function(){
          $("#cat_features").hide();
          


})

$(".cat_value_child_active:checked").wrap(function(){
          $("#cat_features").show();

})

$(".cat_value_main_active").click(function(){
          $("#cat_features").hide();
          


})

$(".cat_value_child_active").click(function(){
    $("#cat_features").show();
          


})

});
</script>

<?php get_footer()?>