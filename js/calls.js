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
var latestNbCalls = 0;
  
  // Make the POST request every 500 milliseconds
  setInterval(function() {
    $.post("contr.php", {call:"ok"},function(data) {
      // Check if the data has changed
      let call = "";
      let allCalls = "";
      data = JSON.parse(data);
      console.log(data.length)
      let currentNbCalls = data.length;
      if(currentNbCalls > latestNbCalls ){
     
        latestNbCalls = currentNbCalls;
        

      }
      Array.prototype.forEach.call(data, e=>{

  
 call = `<div style="width:100%;" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>${e.coordination}</strong> <br>${e.message}
  <button type="button" class="btn-close" data-bs-dismiss="alert" data-id="${e.call_id}" id="confirm_call" aria-label="Close"></button>
</div>`;
allCalls += call;
});
      $('#callHolder').html(allCalls);

    });
  }, 1000);
  setInterval(function() {
    $.post("contr.php", {num_calls:"ok"}, function(data) {
      // Check if the data has changed

      console.log(data)
      let currentNbCalls = data;
      console.log( "cookies from calls.js : "+  readCookie("num_calls"))
      if(currentNbCalls > readCookie("num_calls") ){
     
 createCookie("num_calls",currentNbCalls,5) ;

      }
     
      $('#nb_calls').html(data);
   
    });
  }, 1000);
  $("#products").on('click', "#orderProduct", function (event) {
    var product = event.target
    var product_id = $(product).data("id")
    var qte = $(product).data("input")
    qte = $("#"+qte).attr("value")
    console.log(qte)
    
  console.log(product_id)
  $.post("contr.php", {order_product:{id:product_id, qte: qte} }, function(json) {}).done(function() {
    console.log("done")
    
    var c = readCookie("num_product");
  var num_product;
  console.log(qte)
    if (c == null) {
     createCookie("num_product", qte, 10) 
    }
     else {
     
      
     num_product  = readCookie("num_product") 
     num_product = Number(num_product)  + Number(qte)
     num_product = num_product.toString()
     createCookie("num_product", num_product, 10) 
    }
     $("#num_product").text(readCookie("num_product"))
  });
  }) 




$(document).on('click','#confirm_call', function() {
let currentNbCalls = 0;

 currentNbCalls =  readCookie("num_calls") ;

 var call_id = $(this).data("id");

 console.log("          call idj         "+call_id);

$.post("contr.php", {confirm_call:call_id}, function() {
      // Check if the data has changed
    currentNbCalls--; 
    console.log( "          current callsj               "+currentNbCalls);
 createCookie("num_calls",currentNbCalls,5) ;


      }
          );
 
          $('#nb_calls').html(currentNbCalls)
})