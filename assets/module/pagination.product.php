 <?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "ahihishop");  
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
 $query = "SELECT * FROM product WHERE PRO_STATUS = 'Active'"
                . " ORDER BY PRO_ID  DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect , $query);  
 
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
           <a href="index.html" class="product-item">
                <div class="col-md-4 col-xs-6 product">
                  <img class="img-thumbnail img-fluid border-0 no-gutters" src=' . $row["PRO_IMG"] . ' alt="">
                  <div class="text-card-item">
                    <p class="item-text">'.$row["PRO_NAME"].'</p>
                    <p class="item-text item-text-light">'.$row["CATE_NAME"].'</p>
                  </div>
                  <div style="display:flex; justify-content: space-between;">
                    <div class="price-item">
                      <span class="price">'.$row["PRO_PRICE"].'</span>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart-icon"></i></a>
                  </div>
                </div>
              </a>
      ';  
 }  
 $output .= '<br /><div style="position: absolute; bottom:0px; left:0px;">';  
 $page_query = "SELECT PRO_ID, PRO_IMG, PRO_NAME, PRO_PRICE, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
                . " FROM product, category"
                . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active'"
                . " ORDER BY PRO_ID  DESC ";  
 $page_result = mysqli_query($connect , $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  