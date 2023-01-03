<?php get_header();
          global $field;
?>
<style>
    .error{
        padding: 0px;
    font-size: 1.3rem;
    text-align: left;
    color:red;
    }
</style>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
        <a href="?mod=post&controller=list_post&action=list_post" title="" id="add-new" class="fl-left">Trang chủ </a>
            <h3 id="index" class="fl-left">Thay Đổi Mật Khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=admin&controller=index&action=index" title="">Cập nhật thông tin</a>
                </li>
                <?php  
                if(!isset($_SESSION["manager"])){
                    ?>
                      <li>
                    <a href="?mod=admin&controller=index&action=list_manager" title="">Thông tin người quản lý  </a>
                </li>
                  <li>
                    <a href="?mod=admin&controller=index&action=add_manager" title="">Thêm người quản lý </a>
                </li>
              
                    <?php
                }
                
                ?>
             
                <li>
                    <a href="?mod=post&controller=list_post&action=list_post" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                <span style="color:green"><?php echo congratulation("pass_change")?></span>  
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old" value="<?php  echo set_value("pass-old")  ?>">
                        <p class="error"> <?php echo error_fn("pass-old") ?></p>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new" value="<?php  echo set_value("pass-new")  ?>">
                        <p class="error"> <?php echo error_fn("pass-new") ?></p>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <p class="error"> <?php echo error_fn("confirm-pass") ?></p>
                        <button type="submit" name="btn_update_pass" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>
