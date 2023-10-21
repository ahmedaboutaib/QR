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

                    
              </div>
  </div>


  </div>

        `;
        productByCat += productCard;
        i++;
  });
 $("#client-side-products").html(productByCat);
}, "json");
})

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

                    
              </div>
  </div>


  </div>

        `;
        productByCat += productCard;
        i++;
  });
 $("#client-side-products").html(productByCat);
}, "json");
})



$(document).ready(function() {
  setTimeout(function() {
    $(".alert").fadeOut();
  }, 4000);
});