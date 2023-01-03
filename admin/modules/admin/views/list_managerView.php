<?php get_header();
      global $page_next,$page_prv,$num_page,$page,$number;    
 ?>
<style>
    table {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 20px;
    }
    td{
        border: 1px solid #ddd;
        text-align: center;
        padding: 5px 5px;
    }

    .thead-text {
        padding: 5px 5px;
        text-align: center;
        font-size: 12px;
        font-weight: 700;
    }

    tbody>tr> td {
        font-size: 12px;

    }
</style>
<div id="main-content-wp" class="list-manager-page">
    <div class="wrap clearfix">
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách quản lý</h3>
                    <a href="?mod=admin&controller=index&action=add_manager" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php echo $_SESSION["rows"] ?></span></a> |</li>
                            <li class="trash"> <a href="?mod=admin&controller=index&action=deleteManagerAll">Xoá tất cả </a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search_username" id="s" placeholder="Tìm kiếm tên đăng nhâp" required>
                            <input type="submit" name="btn_search_username" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                       <!--  -->
                    </div>

                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <td><span class="thead-text">Tên hiển thị</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Mật khẩu </span></td>
                                    <td><span class="thead-text">Địa chỉ </span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Ngày tạo </span></td>
                                    <td><span class="thead-text">Ngày cập nhật </span></td>
                                    <td><span class="thead-text">Xoá</span></td>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach($list_manager as $item){
                                    ?>
                                 <tr>
                                    <td><?php echo $item["fullname"] ?></td>
                                    <td><?php  echo   $item["username"]?></td>
                                    <td><?php  echo   $item["email"]?></td>
                                    <td><?php  echo   $item["password"]?></td>
                                    <td style="padding:20px 20px "><?php  echo   $item["address"]?> </td>
                                    <td><?php  echo   $item["phone"]?></td>
                                    <td><?php  echo   $item["created_at"]?></td>
                                    <td><?php  echo   $item["update_at"]?></td>
                                    <td><a href="<?php echo $item["delete"] ?><?php echo $item["user_id"] ?>"  id="delete">Delete</a></td>


                                </tr>



                                <?php

                            }
                        
                                ?>
                               
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                    if(isset($_POST["btn_search_username"])){
                        ?>
                         <ul id="list-paging" class="fl-right" style="display:none;">

                                <?php
                                if($page>1){
                                ?>
                                <li ><a href="?mod=admin&controller=index&action=list_manager&page=<?php
                                echo  $page_prv;?>">Trước </a></li>
                                <?php
                                }
                                ?>
                                <?php
                                for($i=1; $i<=$num_page;$i++){
                                $active="";

                                ?>
                                <li><a href="?mod=admin&controller=index&action=list_manager&page=<?php echo $i ?>"><?php echo $i ?><a></li>

                                <?php
                                }

                                ?>

                                <?php
                                if($page<4){
                                ?>
                                <li ><a href="?mod=admin&controller=index&action=list_manager&page=<?php
                                echo  $page_next;?>">Sau </a></li>
                                <?php
                                }
                                ?>
                                </ul>
                        <?php
                    }else{
                        ?>
                            <ul id="list-paging" class="fl-right">

                                                        <?php
                                                        if($page>1){
                                                        ?>
                                                        <li ><a href="?mod=admin&controller=index&action=list_manager&page=<?php
                                                        echo  $page_prv;?>">Trước </a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        for($i=1; $i<=$num_page;$i++){
                                                        $active="";

                                                        ?>
                                                        <li><a href="?mod=admin&controller=index&action=list_manager&page=<?php echo $i ?>"><?php echo $i ?><a></li>

                                                        <?php
                                                        }

                                                        ?>

                                                        <?php
                                                        if($page<4){
                                                        ?>
                                                        <li ><a href="?mod=admin&controller=index&action=list_manager&page=<?php
                                                        echo  $page_next;?>">Sau </a></li>
                                                        <?php
                                                        }
                                                        ?>
                              </ul>
                        <?php
                    }
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>


<script>
    // let clickDelete =document.querySelector("#delete");

    // clickDelete.addEventListener("click", function (e) {
    //     e.preventDefault();
      
    //   })
</script>