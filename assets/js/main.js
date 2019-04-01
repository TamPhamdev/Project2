function Page(){
   var baseurl = "/Ahihi/assets/common/";
    var self = this;
    this.init = function (){
        $( "#cart" ).click(function() {
            $( ".popup-cart" ).toggleClass( "open" );            
        });
        $( ".amount a" ).click(function() {
           var that = $(this);
           var parent = that.parents(".amount");
           
           var ele_number = parent.find('.amount-num');
           var ele_number_up = parent.find('.amount-up');
           var ele_number_down = parent.find('.amount-down');
           var number = parseInt(ele_number.text());
           if (that.hasClass('amount-down')) {
                number--;
            } else {
                number++;
            }

            if (number < 1) {
                number = 1;
            } else {
                if (number == 1) {
                    ele_number_down.addClass('disable');
                } else {
                    ele_number_down.removeClass('disable');
                }
            }

            ele_number.text(number);  
        });
              
        self.load_cart_data();       
        
        $(".add-to-cart-js").click(function(){
            var that = $(this),
                pro_id = that.attr("id");
                img = $(".img-pro").attr("data-img"),
                title = $(".product-title h1").text(),
                price = parseInt($(".product-price .get-price").text()),
                amount = $(".cart-quantity").val(),
                cate = $(".category").text();
            var action = "add";
                
//                console.log(id);
                
                $.ajax({
                    url: "../common/action.php",
                    type: "post",
                    data: {
                        item_id: pro_id,
                        item_img: img,
                        item_title: title,
                        item_price: price,
                        item_amount: amount,
                        item_cate: cate,
                        action: action
                    },
                    success: function(data) {
                        self.load_cart_data();                       
                      
//                        console.log(data);
//                        $(".list-cart").html(data);
                    },
                    error: function() {
//                        alert(1111);
                    }
                });
        });
        
        $(document).on('click',".item-cart-close",function(){
            
            var that = $(this);
                _id = that.attr("id"),
                action = "remove";
                $.ajax({
                    url: baseurl + "action.php",
                    method:"POST",
                    data:{
                        item_id:_id, 
                        action:action
                    },
                    success:function()
                    {
                     self.load_cart_data(); 
                    }
                });
//                

        });
        
        $(document).on('click',".clear-btn",function(){
            
            var that = $(this);
                _id = that.attr("id"),
                action = "remove";
                $.ajax({
                    url: baseurl + "action.php",
                    method:"POST",
                    data:{
                        item_id:_id, 
                        action:action
                    },
                    success:function()
                    {
                     self.load_cart_data(); 
                    }
                });
//                

        });
        
      };
  
    this.load_cart_data = function() {
        $.ajax({
           url: baseurl + "fetch_data.php",
           method:"POST",
           dataType:"json",
           success:function(data) {
            $('.list-cart').html(data.cart_details);
            $('#cart_details').html(data.cart_details);
//                console.log(data);
           }
        });
    } 
}



var PageFunction = new Page();
$(document).ready(function (){
    PageFunction.init();
});
        
        
