$(document).ready(function() {
	//check login
	var options = { 
		    //target:     '#divToUpdate', 
		    url:        base_url + 'login.html', 
		    type: 'POST',
		    dataType: 'JSON',
		    success:    function(data) { 
		    	//console.log(data);
		        if(data.username) {
		        	$("#error-username").html('Email hoặc tên đăng nhập không được rỗng');
		        	$("#divToUpdate").html('');
		        }else {
		        	$("#error-username").html('');
		        }
		        
		        if(data.password) {
		        	if(data.password != '') $("#error-password").html(data.password);
		        	$("#divToUpdate").html('');
		        }else {
		        	$("#error-password").html('');
		        }
		        
		        if(data.success == 0) {
		        	$("#divToUpdate").delay(500).html('Tên đăng nhập hoặc mật khẩu không đúng');
		        }else if(data.success == 1) {
		        	location.reload();
		        }
		        
		    } 
		}; 
    $('#signin-form').ajaxForm(options); 

	
	
});

//Choose file show one

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
	$("#avatar-file").change(function () {
	    readURL(this);
	});
});

function ajaxComment(data, url, option, obj = '') {
	if(option == 'add-message') {
	    $.ajax({	    	
	        url: base_url + url,
	        type: 'POST',
	        data: data,
	        dataType: 'JSON',
	        success: function (result) {
	        	//console.log(result);
	        	if(result.success == 0) {
	                $('.box-login').toggleClass('box-login-show');
	                $('.login-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
	                $('.overlay').toggleClass('overlay-in');
	                $("#divToUpdate").delay(500).html('Vui lòng đăng nhập để gửi bình luận');
	        	}
	        	
	        	if(result.content == 1) {
	        		$(".comment-first .nicEdit-main").html('');
	        		$('.comment-reply-' + data.id_parent_comment + ' textarea').val(' ');
	        	}
	        	
	        	if(result.content == 0) {
	        	    Swal({
	        	      text: "Vui lòng nhập nội dung tin nhắn!",
	        	    })
	        	}
	        	
	        	if(result.active == 0) {
	        	    Swal({
	        	      text: "Tài khoản tạm khóa, vui lòng liên hệ để được hỗ trợ",
	        	    })
	        	}
	        }
	    });
	}
	if(option == 'del-message') {
	    $.ajax({	    	
	        url: base_url + url,
	        type: 'POST',
	        data: data,
	        dataType: 'JSON',
	        success: function (result) {
	        	if(result.del == 1) {
	        		$('.box-comment-' + data.id_comment).fadeOut(300, function(){ $(this).remove();});
	        	}
	        	if(result.del == 0) {
	        	    Swal({
		        	      text: "Bạn không có quyền thực hiện hành động này",
		        	    })
	        	}
	        }
	    });
	}
}

// Comment
$(document).ready(function() {
	// Send message cha
	$("#btn-send").delay(3000).click(function () {
		var contentMessage = $(".comment-first .nicEdit-main").html();
		var idTournament = $("#btn-send").attr('id-tournament');		
		var dataAdd = {content: contentMessage, id_tournament: idTournament, option: 'add-message'};
		ajaxComment(dataAdd, 'comment/ajax_message', 'add-message');	
	});	
	
	$('body').on('click', '.btn-send-reply', function() {
		var idTournament = $("#btn-send").attr('id-tournament');
		var commentId = $(this).attr('comment-id');
		var contentMessageReply = $('.comment-reply-' + commentId + ' textarea').val();
		var dataAdd = {content: contentMessageReply, id_tournament: idTournament, id_parent_comment: commentId, option: 'add-message-reply'};
		ajaxComment(dataAdd, 'comment/ajax_message', 'add-message');
	});
	
	// watch notification
	$('body').on('click', '.noti', function() {
		 $.ajax({	    	
		        url: base_url + 'xem-thong-bao.html',
		        type: 'POST',
		        //data: data,
		        dataType: 'JSON',
		        success: function (result) {
		        	if(result.notification == 1) {
		        		$('.box-thong-bao-dkm').html('');
		        	}
		        	if(result.xhtml != '') {
		        		$('.noti-tab').html(result.xhtml);
		        	}
		        }
		    });
	});
	// get info btn-rely
	$('body').on('click', '.click-btn-reply', function() {
		var commentId = $(this).attr('id-parent-comment');
		var idTournament = $("#btn-send").attr('id-tournament');
		commentId = parseInt(commentId);
		if(commentId > 0) {
			console.log(typeof commentId);
			 $.ajax({	    	
			        url: base_url + 'info-message-reply',
			        type: 'POST',
			        data: {id_comment: commentId,  id_tournament: idTournament},
			        //dataType: 'JSON',
			        success: function (result) {
			        	console.log(result);
			        	if(result != '') {
			        		$('.add-box-reply-' + commentId).html(result);
			        	}else {
			                $('.box-login').toggleClass('box-login-show');
			                $('.login-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
			                $('.overlay').toggleClass('overlay-in');
			                $("#divToUpdate").delay(500).html('Vui lòng đăng nhập để gửi bình luận');
			        	}
			        }
			    });
		}
	});
    // Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;
    
    var pusher = new Pusher('9665dd394af39ba953c4', {
        cluster: 'ap1',
        forceTLS: true
      });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    	if(data.content != '') {
    		var objCommentArea = $('.comment-area-' + data.tournament_id);
    		if(objCommentArea.length > 0) {
    			objCommentArea.delay(300).prepend(data.content);
    		}
    	}
    });
    var channelReply = pusher.subscribe('result-reply');
    channelReply.bind('event-reply', function(data) {
    	if(data.content != '') {
    		console.log(data);
    		var objCommentArea = $('.comment-area-' + data.tournament_id + ' .sub-comment-' + data.comment_id);
    		if(objCommentArea.length > 0) {    			
    			objCommentArea.delay(300).append(data.content);
    		}
    	}
    });
	
	//send notification
    var sendNotification = pusher.subscribe('notification');
    sendNotification.bind('event-send-notification', function(data) {
    	if(JSON.parse(data.content).length > 0) {
    		var idUser = $('body').attr('id-user');
    		idUser = parseInt(idUser);
    		var arrId = JSON.parse(data.content);
    		for (var val of arrId) {
    			if(parseInt(val.id) == idUser) {
    				$('.box-thong-bao-dkm').html('<span class="thong-bao-dkm">' + val.total + '</span>');
    			}
    		}
    	}    	
    });
	//del message
    var delMessage = pusher.subscribe('del-message');
    delMessage.bind('event-del-message', function(data) {
    	if(data.comment_id > 0) {
    		var objCommentArea = $('.box-comment-' + data.comment_id);
    		if(objCommentArea.length > 0) {    			
    			$('.box-comment-' + data.comment_id).fadeOut(300, function(){ $(this).remove();});
    		}
    	}    	
    });
    // đăng ký editor nic
   new nicEditor({fullPanel : true}).panelInstance('add-mesage');

	$('body').on('click', '.delete-comment', function() {
		var idTournament = $("#btn-send").attr('id-tournament');
		var commentId = $(this).attr('comment-id');
		var dataAdd = {id_tournament: idTournament, id_comment: commentId, option: 'del-message'};
		ajaxComment(dataAdd, 'comment/del_message', 'del-message', this);
	});
	


});










