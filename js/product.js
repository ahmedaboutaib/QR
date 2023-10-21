$(document).ready(function () {
    $.post("contr.php", {productCat: "all"}, function(json) {
  
    var productByCat = "";
    json.forEach(e => {
      productCard = `
           <div style="height: 120px" class="d-flex mt-3 pb-3 border-bottom ">
    <img width="110px" height="100%" src="${e.product_image}" style="min-height: 93px;" class="img-fluid rounded " alt="" srcset="">
    <div class="d-flex flex-column ps-3 w-100">
                <div class="d-flex flex-column gap-0" >
                <h5 class="d-inline-block text-truncate" style="max-width: 230px;">${e.product_name}</h5>
                <div class=" fs-5"><span>${e.product_price} </span>DHs</div>
  </div>

 <div class="btn btn-danger" style="max-width: 160px;" id="remove_product" data-image="${e.product_image}" data-id="${e.product_id}" data-name="${e.product_name}" > supprimer </div>
    </div>
  
    </div>
  
          `;
         
      productByCat += productCard;
    });
   $("#products").html(productByCat);
  }, "json");
  })
  
  
  $("#categories").on('click', "#catBtn", function (event) {
    var cat = event.target
    var cat_id = $(cat).data("id")
  $.post("contr.php", {productCat: cat_id}, function(json) {
  
    var productByCat = "";
 console.log(json[0].product_id) 
    json.forEach(e => {
      productCard = `
      <div style="height: 120px" class="d-flex mt-3 pb-3 border-bottom ">
      <img width="110px" height="100%" src="${e.product_image}" style="min-height: 93px;" class="img-fluid rounded " alt="" srcset="">
      <div class="d-flex flex-column ps-3 w-100">
          <div class="d-flex flex-column gap-0">
              <h5 class="d-inline-block text-truncate" style="max-width: 230px;">${e.product_name}</h5>
              <div class=" fs-5"><span>${e.product_price} </span>DHs</div>
          </div>
  
          <div class="btn btn-danger" style="max-width: 160px;" id="remove_product" data-id="${e.product_id}" data-name="${e.product_name}" data-image="${e.product_image}"> supprimer </div>
  
      </div>
  
  </div>
          `;
         
      productByCat += productCard;
    });
   $("#products").html(productByCat);
  }, "json");
  })
  
$("#products").on('click', "#remove_product", function (event) {
    var product = event.target
    var product_id = $(product).data("id")
    var product_name = $(product).data("name")
    var product_image = $(product).data("image")
   console.log(product_image) 
  $.post("contr.php", {remove_product:product_id,product_name:product_image,product_image}, function() {}).done(function () {
    console.log("done ! product deleted")
    window.location = "product.php";
    
  })
  })