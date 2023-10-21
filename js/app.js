
// Example POST method implementation:
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

$(document).ready(function () {
  $.post("contr.php", {productCat: "all"}, function(json) {

  var productByCat = "";
var i = 0;
  json.forEach(e => {
    productCard = `
         <div style="height: 120px" class="d-flex mt-3 pb-3 border-bottom ">
  <img width="110px" height="100%" src="${e.product_image}" style="min-height: 93px;" class="img-fluid rounded " alt="" srcset="">
  <div class="d-flex flex-column ps-3 w-100">
              <div class="d-flex flex-column gap-0" >
              <h5 class="" style="max-width: 230px;">${e.product_name}</h5>
              <div class=" fs-5"><span>${e.product_price} </span>DHs</div>
</div>
              <div style="" class="d-flex align-items-end ">

                    <button type="submit" data-input="input${i}" data-id="${e.product_id}" mahdi="hi" id="orderProduct" class="btn btn-warning"><img width="20px" src="img/shopping-cart.png" alt="" srcset="">ajouter</button>
              </div>
  </div>

<div id="panier-utils" class="d-flex flex-column-reverse ">
  <button id="btnUtil" style="padding-left:14px;padding-right:14px;" data-input="input${i}" class="btn btn-outline-danger rounded-pill" data-op="-"  data-id="<?php echo $prod['product_id'] ?>" type="button" id="button-addon1"> -</button>
  <input  type="text" id="input${i}" value="1" name="qte" class="form-control border-0 rounded-pill p-2"style="max-width:40px;"  placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
  <button id="btnUtil" class="btn btn-outline-success rounded-pill" data-input="input${i}" data-op="+"  data-id="<?php echo $prod['product_id'] ?>" type="button" id="button-addon1">+</button>
</div>
  </div>

        `;
        productByCat += productCard;
        i++;
  });
 $("#products").html(productByCat);
}, "json");
})
$("#categories").on('click', "#catBtn", function (event) {
  var cat = event.target
  var cat_id = $(cat).data("id")
  var i = 0
$.post("contr.php", {productCat: cat_id}, function(json) {

  var productByCat = "";

  json.forEach(e => {
    productCard = `
         <div style="height: 120px" class="d-flex mt-3 pb-3 border-bottom ">
  <img width="110px" height="100%" src="${e.product_image}" style="min-height: 93px;" class="img-fluid rounded " alt="" srcset="">
  <div class="d-flex flex-column ps-3 w-100">
              <div class="d-flex flex-column gap-0" >
              <h5 class="" style="max-width: 230px;">${e.product_name}</h5>
              <div class=" fs-5"><span>${e.product_price} </span>DHs</div>
</div>
              <div style="" class="d-flex align-items-end ">

                    <button type="submit" data-input="input${i}" data-id="${e.product_id}" mahdi="hi" id="orderProduct" class="btn btn-warning"><img width="20px" src="img/shopping-cart.png" alt="" srcset="">ajouter</button>
              </div>
  </div>

<div id="panier-utils" class="d-flex flex-column-reverse ">
  <button id="btnUtil" style="padding-left:14px;padding-right:14px;" data-input="input${i}" class="btn btn-outline-danger rounded-pill" data-op="-"  data-id="<?php echo $prod['product_id'] ?>" type="button" id="button-addon1"> -</button>
  <input  type="text" id="input${i}" value="1" name="qte" class="form-control border-0 rounded-pill p-2"style="max-width:40px;"  placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
  <button id="btnUtil" class="btn btn-outline-success rounded-pill" data-input="input${i}" data-op="+"  data-id="<?php echo $prod['product_id'] ?>" type="button" id="button-addon1">+</button>
</div>
  </div>

        `;
        productByCat += productCard;
        i++;
  });
 $("#products").html(productByCat);
}, "json");
})



// for the client : the products for the client 


// end ordered products by the client 



$(document).on('click', "#orderProduct", function (event) {
  var product = event.target
  var product_id = $(product).data("id")
  var qte = $(product).data("input")
  qte = $("#"+qte).attr("value")
 console.log(qte); 
$.post("contr.php", {order_product:{id:product_id, qte: qte} }, function(json) {}).done(function() {
  
  var c = readCookie("num_product");
var num_product;

  if (c == null) {
   createCookie("num_product", qte, 10) 
  }
   else {
   
   
   num_product  = readCookie("num_product") 
   num_product = Number(num_product)  + Number(qte)

   // = num_product.toString()
   createCookie("num_product", num_product, 10) 
  }
   $("#num_product").text(readCookie("num_product"))
});
})
$(document).ready(function() {

  var c = readCookie("num_product");
  $("#num_product").text(c)
  
})
$("#confirmOrder").click(function() {
  eraseCookie("num_product");
})

$("#products").on('click', "#btnUtil",function(event){
  var btn = event.target 
  var op = $(btn).data("op")
  var val_id = "#"+$(btn).data("input")
console.log(val_id)
  var input = $(val_id);
  if(op == "+"){
    var val = input.attr("value")
    val = Number(val)
val++
    input.attr("value",val )
  }
  if(op == "-" && input.attr("value") > 1){
    var val = input.attr("value")
    val = Number(val)
val--
    input.attr("value",val )
  }
})


// for the waiter



 

  // Make the POST request every 500 milliseconds
  setInterval(function() {
    $.post("contr.php", {num_calls:"ok"},function(data) {
      // Check if the data has changed

      let currentNbCalls = data;
      if(currentNbCalls > readCookie("num_calls") ){
     
 createCookie("num_calls",currentNbCalls,5) ;
        var audio = new Audio("../nots/not-v1.wav");
        audio.play();

      }
      $('#nb_calls').html(data);
    
    });
  }, 2000);
  
// Make the POST request every 500 milliseconds
