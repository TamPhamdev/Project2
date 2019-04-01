<?php

include_once '../common/connect.php';



if(isset($_POST["action"]))
{


error_reporting(E_ALL & ~E_NOTICE & ~8192);  
 $record_per_page = 6;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
// $query = "SELECT PRO_ID, PRO_IMG, PRO_NAME, PRO_PRICE, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
//                . " FROM product"
//                . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active'"
//                . " ORDER BY PRO_ID  DESC $start_from, $record_per_page"; 
 $query = "SELECT *"
                . " FROM product, category"
                . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS  = 'Active' AND CATE_STATUS = 'Active'";
                     
    
if(isset($_POST["search_text"]))
{
    $query = "SELECT *"
                . " FROM product, category"
                . " WHERE PRO_NAME  LIKE '%".$_POST["search_text"]."%' "
            . "AND product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active' AND CATE_STATUS = 'Active'";
}    
//echo $query;
 // filter price
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND PRO_PRICE BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
  ";
 }
 // filter category
 if(isset($_POST["category"]))
 {
  $cate_filter = implode("','", $_POST["category"]);
  $query .= "
   AND CATE_NAME IN('".$cate_filter."') 
  ";
 }
  if(isset($_POST["season"]))
 {
  $season_filter = implode("','", $_POST["season"]);
  $query .= "
   AND PRO_SEASON IN('".$season_filter."') 
  ";
 }
  if(isset($_POST["gender"]))
 {
  $gender_filter = implode("','", $_POST["gender"]);
  $query .= "
   AND PRO_GENDER IN('".$gender_filter."') 
  ";
 }
 // order price
 if(isset($_POST["hight_price"]))
 {
     $query .= "ORDER BY PRO_PRICE DESC";
 }
  if(isset($_POST["low_price"]))
 {
     $query .= "ORDER BY PRO_PRICE ASC";
 }
 if(isset($_POST["a_z"]))
 {
     $query .= "ORDER BY PRO_NAME ASC";
 }
  if(isset($_POST["z_a"]))
 {
     $query .= "ORDER BY PRO_NAME DESC";
 }  
 $query .= " LIMIT $start_from, $record_per_page"; 
//$query .= " ORDER BY PRO_ID DESC";
 $statement = $connect ->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
// $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
    <a href="product-detail.php?id='.$row["PRO_ID"].'" class="product-item">
                <div class="col-md-4 col-xs-6 product">
                  <img class="img-thumbnail img-fluid border-0 no-gutters" src=' . $row["PRO_IMG"] . ' alt="">
                  <div class="text-card-item">
                    <p class="item-text">'.$row["PRO_NAME"].'</p>
                    <p class="item-text item-text-light">'.$row["CATE_NAME"].'</p>
                  </div>
                  <div style="display:flex; justify-content: space-between;">
                    <div class="price-item">
                        <span class="price">'.$row["PRO_GENDER"].'</span>
                      <span class="price">$'.$row["PRO_PRICE"].'</span>
                    </div>
                    <a href="product-detail.php?id='.$row["PRO_ID"].'"><i class="fas fa-shopping-cart cart-icon"></i></a>
                  </div>
                </div>
              </a>
   ';
  }
 $output .= '<br /><div style="position:absoulute; bottom:0px; left:0px; display:flex;">';  
 $page_query = "SELECT PRO_ID, PRO_IMG, PRO_NAME, PRO_PRICE, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
                . " FROM product, category"
                . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active' AND CATE_STATUS = 'Active'";
          //      . " ORDER BY PRO_ID  DESC ";  
 //echo $page_query;
 
 //$page_result = mysqli_query($connect , $page_query);  
 $statement = $connect ->prepare($page_query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_rows = $statement->rowCount();
 $total_pages = ceil($total_rows/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
     $output .="<ul class='pagination'>
                    <li class='page-item'><a class='page-link pagination_link active' id='".$i."'>".$i."</a></li>
                </ul>";
//      $output .= "<span class='pagination_link' style='cursor:pointer;padding:10px; border:1px solid #ccc;"
//              . "border-radius:50%; background-color: #252525;color: #fff;'"
//              . " id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
