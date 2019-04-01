<?php 

session_start();

//session_destroy();
//unset($_SESSION["action"]);
if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["shopping_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
    if($_SESSION["shopping_cart"][$keys]['item_id'] == $_POST["item_id"])
    {
     $is_available++;
     $_SESSION["shopping_cart"][$keys]['item_amount'] = $_SESSION["shopping_cart"][$keys]['item_amount'] + $_POST["item_amount"];
    }
 
   }
   if($is_available == 0)
   {
    $item_array = array(
     'item_id'               =>     $_POST["item_id"],  
     'item_title'             =>     $_POST["item_title"],  
     'item_price'            =>     $_POST["item_price"],  
     'item_amount'         =>     $_POST["item_amount"],
     'item_img'         =>     $_POST["item_img"],
     'item_cate'         =>     $_POST["item_cate"],
    );
    $_SESSION["shopping_cart"][] = $item_array;
   }
  }
  else
  {
   $item_array = array(
    'item_id'               =>     $_POST["item_id"],  
     'item_title'             =>     $_POST["item_title"],  
     'item_price'            =>     $_POST["item_price"],  
     'item_amount'         =>     $_POST["item_amount"],
     'item_img'         =>     $_POST["item_img"],
     'item_cate'         =>     $_POST["item_cate"],
   );
   $_SESSION["shopping_cart"][] = $item_array;
  }
 }
 
 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["product_id"] == $_POST["product_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
 
 
}

?>
