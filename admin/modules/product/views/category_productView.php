<?php get_header();
  global $error;
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&controller=index&action=add_category" title="" id="add-new" class="fl-left">Thêm mới danh mục</a>
                </div>
            </div>
            <span style="color:red"><?php echo  error_fn("delete_category")?></span>  
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục chính</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                    <td><span class="thead-text">Người cập nhật</span></td>
                                    <td><span class="thead-text">Thời gian cập nhật</span></td>

                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $stt=0;
                              if(isset($list_cat_all)){
                                        foreach($list_cat_all as $item) 


                              {
                                        $stt++
                                        ?>

                               <tr>
                                    <td><span class="tbody-text"><?php echo $stt?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["cat_title"]?></a>
                                        </div> 
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=product&controller=index&action=update_category&id=<?php echo $item["cat_id"]?>&title=<?php echo $item["cat_title"]?>" title="Chi tiết" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=product&controller=index&action=delete_category&title=<?php echo $item["cat_title"]?>" title="Xóa" class="delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                   
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php  if  ($item["active"]==0){echo "<span style='color:green;'>Danh mục chính</span>";
                                        }else{  echo $item["active"];}?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["creater"]?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["created_at"]?></span></td>
                                    <td><?php echo $item["creater_update"]?></td>
                                    <td><?php echo $item["update_at"]?></td>
                          
                                </tr>

                                        <?php
                              }
                    }else{
                              ?>
                               <span class="error" style="color:red;">Không tồn tại danh sách</span>

                              <?php


                    }

                              ?>

                          
                     
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="thead-text">Người cập nhật</span></td>
                                    <td><span class="thead-text">Thời gian cập nhật</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer()?>