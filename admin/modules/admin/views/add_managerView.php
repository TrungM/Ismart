<?php get_header()?>
<style>
    .error{
        color:red;
    }
    #password{
        display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px
    }
</style>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
        <a href="?mod=post&controller=list_post&action=list_post" title="" id="add-new" class="fl-left">Trang chủ </a>
            <h3 id="index" class="fl-left">Thêm người quản lý</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=admin&controller=index&action=changePass" title="">Đổi mật khẩu</a>
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
                  <span style="color:green"><?php echo congratulation("add_manager")?></span>  
                    <form action="" method="POST">
                
                            <label for="display-name">Họ và tên</label>
                            <input type="text" name="fullname" id="display-name" value="<?php echo set_value("fullname")?>">
                            <span class="error"> <?php echo error_fn("fullname") ?></span>
                            <label for="username">Tên đăng nhâp </label>
                            <input type="text" name="username" id="username-add"   value="<?php echo set_value("username")?>" >
                            <span class="error"> <?php echo error_fn("username") ?></span>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"   value="<?php echo set_value("email")?>">
                            <span class="error"> <?php echo error_fn("email") ?></span>
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" name="phone" id="tel"   value="<?php echo set_value("phone")?>">
                            <span class="error"> <?php echo error_fn("phone") ?></span>
                            <label for="pass">Mật khẩu</label>
                            <input type="password" name="password" id="password" value="<?php  echo set_value("password")  ?>">
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address"   ><?php  echo set_value("address") ?></textarea>
                            <span class="error"> <?php echo error_fn("address") ?></span>
                        <button type="submit" name="btn-insert-manager" id="btn-submit">Thêm quản lý</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>