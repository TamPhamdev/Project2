<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <div class="item-cart d-flex justify-content-between align-items-center">
                
                <div class="cart-img">
                    <img class="img-thumbnail img-fluid border-0 no-gutters " src="'.$values["item_img"].'" alt="">
                 </div>
                <div class="cart-detail">
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="text-card-item">
                            <p class="item-text">'.$values["item_title"].'</p>
                            <p class="item-text item-text-light">'.$values["item_cate"].'</p>
                        </div>
                        
                        <div class="amount">
                            
                            <span class="amount-num">'.$values["item_amount"].'</span>
                            
                        </div>
                           
                    </div>
                    
                    <div style="display:flex; justify-content: space-between;">
                        <a href="index.php" class="product-item d-block">
                          <div class="price-item">
                            <span class="price">$'.$values["item_price"].'</span>
                          </div>
                        </a>
                    </div>
                    
                    <input type="hidden" name="hidden_id" value="'.$values["item_price"].'" />
                </div>         
            </div>';
    if (is_numeric($values['item_amount']) && is_numeric($values['item_price'])) {
        $total_price = $total_price + ($values["item_amount"] * $values["item_price"]);
    }
  
    $total_item = $total_item + 1;
 }
 
 $output .= '<div class="last-cart">
                        <div class="total-cart">'.number_format($total_price).'$</div>
                        <div class="group-button">
                            <a href="javascript:void(0);" class="clear-btn btn-order">Clear cart</a>
                            <a href="checkout.php" class="btn-order">Check out</a>
                        </div>
                       
                    </div>';
}
else
{
 $output .= '
    
      Your Cart is Empty!
     
    ';
}

$data = array(
 'cart_details'		=>	$output,
	'total_price'		=>	'$' . number_format($total_price, 2),
	'total_item'		=>	$total_item
); 

echo json_encode($data);
            
?>