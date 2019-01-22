
function contact(url){
    //console.log(url);
    var name = $("input[name='name']").val();
    var email = $("input[name='email']").val();
    var phone = $("input[name='phone']").val();
    var title = $("input[name='title']").val();
    var content = $("textarea[name='content']").val();
    //console.log(content);
    $.ajax({
        url: url, 
        type: 'POST',
        dataType: 'json',
        data:{name: name, email: email, phone: phone, title: title, content: content},
        success: function(msg){
            var str = '';
            if(msg.error){
                str += '<div style="background: #d6c9be; padding: 15px; color:red; margin-bottom: 15px;">';
                for(i = 0; i < msg.error.length; i++ ){
                    str += '<i style="display: block;" >' + msg.error[i] + '</i>';
                }
                str += '</div>';
                $('.messages').html(str);
            }else{
                //console.log(msg.success);
                $('.messages').html('<div style="background: #d6c9be; padding: 15px; color:#028cf1; margin-bottom: 15px;"><i style="display: block;" >' + msg.success + '</i></div>');
            }
        }
});
}
function addtocart(id, opption = '') {
    var qty = '';
    var require = false;
    
    if(opption == 'detail'){
      qty = $('#qty-detail').val();
      console.log(qty + 'qty-detail');
    }
    
    if(opption == 'watch-faster'){
      qty = $('#qty-faster').val();
      console.log(qty + 'qty-faster');
    }
    //jQuery('html, body').animate({scrollTop: 0}, 1000);
    $.ajax({
        url: base_url + 'cart/add',
        type: 'POST',
        data: {id: id, qty: qty},
        success: function (data) {
        	console.log(data + 'data');
	        if(data != 0){
		        $("#items").hide().html(data).fadeIn(1000);
	           	 if(opption == 'watch-faster'){
	           	     $(".add-success").hide().html('Thêm vào giỏ hàng thành công.').fadeIn(500);
	           	 }else if(opption == 'detail'){
	           	      $("#add-success").hide().html('Thêm vào giỏ hàng thành công.').fadeIn(500);
	           	 }else{
	         	    Swal({
	        	        title: 'Thông báo',
	        	        type: 'success',
	        	        html: 'Bạn đã thêm vào giỏ thành công',
	        	        showCloseButton: true,
	        	        showCancelButton: true,
	        	        focusConfirm: false,
	        	        confirmButtonText:
	        	          '<a href="'+base_url + 'cart' +'">Vào giỏ hàng</a>',
	        	        cancelButtonText:
	        	          'Tiếp tục mua sắm',
	        	      }) 
	           	 }
        	}else{
        	    Swal({
        	        title: 'Thông báo',
        	        //type: 'unsuccess',
        	        html: 'Thêm vào giỏ hàng không thành công',
        	        showCloseButton: true,
        	        showCancelButton: true,
        	        focusConfirm: false,
        	        confirmButtonText:
        	          '<a href="cart.php">Vào giỏ hàng</a>',
        	        cancelButtonText:
        	          'Tiếp tục mua sắm',
        	      })
        	}
        }
    });

}
// xem nhanh
function watch(id) {		
//    jQuery('html, body').animate({scrollTop: 0}, 1000);
    $.ajax({
        url: base_url + 'product/watch',
        type: 'POST',
        data: {id: id},
        success: function (data) {
        	//console.log(data);
        	$("#watch").delay(300).html(data);        	 
        }
    });

}

function watchCart(id = 0) {		
//  jQuery('html, body').animate({scrollTop: 0}, 1000);
	
  $.ajax({
      url: base_url + 'cart/watch_cart/' + id,
      type: 'POST',
      datatype:'json',
      success: function (data) {    	  
    	  var myObj 	= JSON.parse(data);
    	  var number 	= myObj.number;
      	 $("#watch-cart").html(myObj.xhtml);
      	 $("#items").html(number);
      }
  });

}


function loadItem(id = '', number = 1, idLoad = '', $opption = null) {
	if($opption == null){
		 //$("#" + idLoad).delay(2000).load(base_url + 'product/list_product', {id: id, limit: number},function(data){});
		 $.ajax({
		      url: base_url + 'product/list_product',
		      type: 'POST',
		      data: {id: id, limit: number},
		      //datatype:'json',
		      success: function (data) {    	  
		    	 //console.log(data);
		    	 if(data){
		    		 $("#" + idLoad).delay(2000).html(data); 
		    	 }
		      }
		  });
	}	  
}
$(document).ready(function() {
	//sort
	$("#sort").change(function(){
		$("#form-sort").submit();
	});

	
	
});


$(document).ready(function() {
	// ajax address
//	$("#province").focus(function(){
//	    $.ajax({
//	        url: base_url + 'cart/address',
//	        type: 'POST',
//	        data: {type: 'province'},
//	        success: function (data) {
//	        	$("#province").html(data);
//	        }
//	    });
//	});
	// ajax select districts
	$("#province").change(function(){
		var province_id = $("#province option:selected").val();
		if(province_id > 0){
		    $.ajax({	    	
		        url: base_url + 'cart/address',
		        type: 'POST',
		        data: {type: 'district', province: province_id},
		        dataType: 'JSON',
		        success: function (data) {
		        	var strDistrict = '<option value="0">Chọn Quận/Huyện</option>';
		        	if(data){
		        		$.each(data, function(i, value){
		        			strDistrict += '<option value="'+ value.id +'">'  + ' ' + value.name + '</option>';
		        		});
		        		$('#district').html(strDistrict);
		        	}
		        }
		    });
		}else{
			$('#district').html('<option value="0">Chọn Quận/Huyện</option>');
			$('#ward').html('<option value="0">Chọn Xã/Phường</option>');
		}
	});
	// ajax select ward
	$("#district").change(function(){
		var district_id = $("#district option:selected").val();
		//console.log(district_id);
		if(district_id > 0){
		    $.ajax({	    	
		        url: base_url + 'cart/address',
		        type: 'POST',
		        data: {type: 'ward', district : district_id},
		        dataType: 'JSON',
		        success: function (data) {
		        	//console.log(data);
		        	var strWard = '<option value="0">Chọn Xã/Phường</option>';
		        	if(data){
		        		$.each(data, function(i, value){
		        			strWard += '<option value="'+ value.id +'">'  + ' ' + value.name + '</option>';
		        		});
		        		$('#ward').html(strWard);
		        	}
		        }
		    });
		}else{
			$('#ward').html('<option value="0">Chọn Xã/Phường</option>');
		}
	});
});

$(document).ready(function() {
    $("#myform").validate({
	      rules: {
	    	  user_name: {
	          required: true,
	          minlength: 5
	    	  },
	          user_email: {
		          required: true,
		          email: true
		        },
		      user_phone: {
		          required: true,
		          minlength: 10
		        },
		      province: {
		          required: true
		        },
		      district: {
		          required: true
		        },
		      ward: {
		          required: true
		        }
		        ,
		      user_address: {
		          required: true
		        }
	        
	    
	      },
	      messages: {
	    	  user_name: {
		          required: "Họ tên không được trống",
		          minlength: "Họ tên có ít nhất có 5 ký tự"
	        },
	          user_email: {
		          required: "Email không được trống",
		          email	  : "Vui lòng nhập email đúng"
	        },
	        user_phone: {
		          required: "Điện thoại không được trống",
		          minlength: "Điện thoại có ít nhất có 10 số"
	        },
	        province: {
		          required: "Tỉnh/Thành phố không được trống"
	        },
	        district: {
		          required: "Quận/Huyện không được trống"
	        },
	        ward: {
		          required: "Xã/Phường không được trống"
	        }
	        ,
	        user_address: {
		          required: "Địa chỉ không được trống"
	        }
	      }

    });
    
    // xử lý form tìm kiếm
//    $('.search-btn').click(function() {
//    	var str = '';
//    	if(dataSeach){
//    		$.each(dataSeach, function(index, vale){
//    			str += '<option value="'+vale.id+'">'+vale.vn_name+'</option>';
//    			var categorys = vale.categorys;
//    			if($(categorys).length > 0){
//    				$.each(categorys, function(i, val){
//    					str += '<option value="'+val.id+'">&nbsp;&nbsp;&nbsp;'+val.vn_name+'</option>';
//    				});
//    			}
//    		});
//    		
//            Swal({
//                title: 'Tìm kiếm',
//                type: 'question',
//                html: '<form id="form-seach" method="post" action="'+base_url + 'tim-kiem.html'+'">' +
//                  '<input class="form-control mb-1" type="text" name="search" id="search-form" placeholder="Nhập từ khóa">' +
//                  '<select name="cid" class="form-control">' +
//                    '<option value="">Chọn danh mục</option>' +
//                    str +
//                  '</select>' +
//                  '</form>',
//                showCloseButton: true,
//                showCancelButton: true,
//                focusConfirm: false,
//                confirmButtonText:
//                  '<a id="submitSearch">Tìm kiếm</a>',
//                cancelButtonText:
//                  'Trở về',
//              })
//    	}
//
//   });
    
	$("#submitSearch").click(function(){
		$("#form-seach").submit();
	});

});






