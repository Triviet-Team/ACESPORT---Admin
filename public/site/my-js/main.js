

$(document).ready(function() {
	//check login
	var options = { 
		    //target:     '#divToUpdate', 
		    url:        base_url + 'login.html', 
		    type: 'POST',
		    dataType: 'JSON',
		    success:    function(data) { 
		    	console.log(data);
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
	        //dataType: 'JSON',
	        success: function (data) {
	        	console.log(data);
	        	if(data.success == 0) {
	                $('.box-login').toggleClass('box-login-show');
	                $('.login-btn span i').toggleClass('mdi-chevron-down mdi-chevron-up');
	                $('.overlay').toggleClass('overlay-in');
	                $("#divToUpdate").delay(500).html('Vui lòng đăng nhập để gửi bình luận');
	        	}
	        	if(data.content == 0) {
	        	    Swal({
	        	      text: "Vui lòng nhập nội dung tin nhắn!",
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
		var contentMessageReply = $('.comment-reply-' + commentId + ' .nicEdit-main').html();
		var dataAdd = {content: contentMessageReply, id_tournament: idTournament, id_comment: commentId, option: 'add-message-reply'};
		ajaxComment(dataAdd, 'comment/ajax_message', 'add-message');
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
//    			var html = '<div unselectable="on" style="width: 745px;"><div class=" nicEdit-panelContain" unselectable="on" style="overflow: hidden; width: 100%; border: 1px solid rgb(204, 204, 204); background-color: rgb(239, 239, 239);"><div class=" nicEdit-panel" unselectable="on" style="margin: 0px 2px 2px; zoom: 1; overflow: hidden;"><div style="float: left; margin-top: 2px; display: none;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -432px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -54px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -126px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -342px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -162px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -72px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -234px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -144px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -180px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -324px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 1;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Size...</div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 1;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Family...</div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 1;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Format...</div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -108px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" unselectable="on" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -198px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -360px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -468px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -378px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -396px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -36px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain nicEdit-buttonEnabled" style="width: 20px; height: 20px; opacity: 1;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://localhost/project-hao/tenis/tennis/nicEditorIcons.gif&quot;); background-position: -18px 0px;"></div></div></div></div></div></div></div>';
//    				html += '<div style="width: 431px; border-width: 0px 1px 1px; border-top-style: initial; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: initial; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); border-left-color: rgb(204, 204, 204); border-image: initial; overflow: hidden auto;"><div class=" nicEdit-main " contenteditable="true" style="width: 423px; margin: 4px; min-height: 78px; overflow: hidden;"><br></div></div>';
//    				console.log(html);
//    			$('.comment-reply-' + data.comment_id).prepend(html);
    		}
    	}
    });
    var channelReply = pusher.subscribe('result-reply');
    channelReply.bind('event-reply', function(data) {
    	if(data.content != '') {
    		var objCommentArea = $('.comment-area-' + data.tournament_id + ' .sub-comment-' + data.comment_id);
    		if(objCommentArea.length > 0) {    			
    			objCommentArea.delay(300).prepend(data.content);
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
    				$('.thong-bao-dkm').html(val.total);
    			}
    		}
    	}    	
    });

    // đăng ký editor nic
   new nicEditor({fullPanel : true}).panelInstance('add-mesage');
    //new nicEditor({fullPanel : true}).panelInstance('add-mesage-1');
    //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });

	$('body').on('click', '.delete-comment', function() {
		var idTournament = $("#btn-send").attr('id-tournament');
		var commentId = $(this).attr('comment-id');
		var dataAdd = {id_tournament: idTournament, id_comment: commentId, option: 'del-message'};
		ajaxComment(dataAdd, 'comment/del_message', 'del-message', this);
	});
	


});










