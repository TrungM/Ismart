<?php get_header()?>
<style>
    .error{
        color:red;
    }
</style>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản quản lý </h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=manager&controller=index&action=changePass" title="">Đổi mật khẩu</a>
                </li>
                <?php  
                if(!isset($_SESSION["manager"])){
                    ?>
                  <li>
                    <a href="?mod=manager&controller=index&action=index" title="">Thêm người quản lý </a>
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
                  <span style="color:green"><?php echo congratulation("upadate_infor_manager")?></span>  
                    <form action="" method="POST">
                        <?php
                        if(!empty($infor_manager)){

                            foreach($infor_manager as $item){


                        
                            ?> 
                            <label for="display-name">Tên hiển thị</label>
                            <input type="text" name="fullname" id="display-name" value="<?php echo $item["fullname"]?>">
                            <span class="error"> <?php echo error_fn("fullname") ?></span>
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username"   value="<?php echo $item["username"]?>" readonly>
                            <span class="error"> <?php echo error_fn("username") ?></span>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"   value="<?php echo $item["email"]?>">
                            <span class="error"> <?php echo error_fn("email") ?></span>
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" name="phone" id="tel"   value="<?php echo $item["phone"]?>">
                            <span class="error"> <?php echo error_fn("phone") ?></span>
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address"   ><?php echo $item["address"]?></textarea>
                            <span class="error"> <?php echo error_fn("address") ?></span>

                            <?php
                          }

                            
                        }else{
                            ?>
                             <label for="display-name">Tên hiển thị</label>
                            <input type="text" name="fullname" id="display-name" >
                            <span class="error"> <?php echo error_fn("fullname") ?></span>
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username"  readonly>
                            <span class="error"> <?php echo error_fn("username") ?></span>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"  >
                            <span class="error"> <?php echo error_fn("email") ?></span>
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" name="tel" id="tel"  >
                            <span class="error"> <?php echo error_fn("phone") ?></span>
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address"></textarea>
                            <span class="error"> <?php echo error_fn("address") ?></span>

                            <?php

                        }
                        
                        ?>
                      
                        <button type="submit" name="btn-update_infor_manager" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>