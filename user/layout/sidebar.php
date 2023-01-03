<?php
function list_cat_all(){
      $sql=db_fetch_array("SELECT  * FROM `tb_category`  ");

      return $sql;

}


function array_active(){
      $result=[];

      $sql=db_fetch_array("SELECT *FROM `tb_category`  WHERE NOT `active`='0' ");

      foreach( $sql as $item){
            $result[] =$item["active"];

      }

      
      return $result;
}

function list_cat($data,$parent){

          $result=[];

          $html="";
  
            foreach( $data as $item){

                    if($item["active"]=="$parent" ){

                        $result[]=$item;
                             // đi tìm những thằng là con của $item["cat_tile"];
                        // $child=list_cat($data,$item["cat_title"]);
                        // $result=array_merge($result,$child);
                  //sub-menu
                    };                  
          };

      
          $html.="<ul class='list-item'>";
          foreach( $result as $a){
        $html.="<li><a href='?mod=category&controller=index&action=index&title=$a[cat_title]' title=''> ".$a['cat_title']."</a>" ;

          if( !in_array($a['cat_title'],array_active())){
            $html.=" ";
          }else{
            $html.=list_cat_level($data,$a["cat_title"]) ;

          }
          $html.="</li>";
    }

          $html.="</ul>";
  



return  $html;
    };


    function list_cat_level($data,$parent){

      $result=[];

      $html="";

        foreach( $data as $item){

                if($item["active"]=="$parent"){

                    $result[]=$item;
                   
                };                
      };


            $html.="<ul class='sub-menu'>";
            foreach( $result as $a){
                        $html.="<li><a href='?mod=category&controller=index&action=index&title=$a[cat_title]' title=''> ".$a['cat_title']."</a>" ;
                        $html.="</li>";
      }

      $html.="</ul>";




return  $html;

};


echo   $list_cat=list_cat(list_cat_all(),"0");

?>


