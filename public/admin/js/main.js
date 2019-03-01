
var height = $('.aside').height();

$('.addHeight').css('height', height);

$(".alert").delay(4000).slideUp(200, function () {
    $(this).alert('close');
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        trigger: "hover"
    })
})

$('#checkAll').click(function () {
    $(':checkbox.checkItem').prop('checked', this.checked);
});

$('.eSave').click(function () {
    $('#frmSubmit').submit();
});


function slug(value, key) {

    var str = $("#" + value).val();

    str = str.toLowerCase();

    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    str = str.replace(/([^0-9a-z-\s])/g, '');

    str = str.replace(/(\s+)/g, '-');

    str = str.replace(/^-+/g, '');

    str = str.replace(/-+$/g, '');

    str = str.replace(/---/g, '-');

    $("#" + key).val(str);
}

function action_item(id, key, url) {

    $.ajax({
        url: url,
        type: 'POST',
        data: {id: id, key: key},
        dataType: 'JSON',
        success: function (data) {
            $('.messages').html('<div class="alert alert-success" role="alert">' + data.msg + '</div>');
            if (data.success) {
                $('#status_' + id).html('<img src="' + base + 'public/admin/img/icon/action_' + data.status + '.png" alt="Xóa"/>');
            }
        }

    })
}




function action_item_all(key, url) {
    var ids = new Array();
    $('[name="id[]"]:checked').each(function ()
    {
        ids.push($(this).val());
    });

    if (!ids.length)
        return false;
    //ajax để xóa
    $.ajax({
        url: url,
        type: 'POST',
        data: {'ids': ids, key: key},
        dataType: 'JSON',
        success: function (data) {   
            $('.messages').html('<div class="alert alert-success" role="alert">' + data.msg + '</div>');
            if (data.success) {
                $(ids).each(function (id, val) {
                    $('#status_' + val).html('<img src="' + base + 'public/admin/img/icon/action_' + data.status + '.png" alt="Xóa"/>');
                });
            }
        }

    })
    return false;
}


if ($('#editor').length) {
    editors = CKEDITOR.replace("editor", {
        height: '350', language: 'vi',
    });
    CKFinder.setupCKEditor(editors, base + 'public/admin/ckeditor/ckfinder/');
}

if ($('#editor1').length) {
    editors = CKEDITOR.replace("editor1", {
        height: '350', language: 'vi',
    });
    CKFinder.setupCKEditor(editors, base + 'public/admin/ckeditor/ckfinder/');
}

if ($('#sapo').length) {
    editors = CKEDITOR.replace("sapo", {height: '200', language: 'vi'});
    CKFinder.setupCKEditor(editors, base + 'public/admin/ckeditor/ckfinder/');
}




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
$("#customFile").change(function () {
    readURL(this);
});


//Choose file show mutil

$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#files').on('change', function () {

        $('#multiImg').remove();

        imagesPreview(this, '#showMulti');
    });
});

//Number format nummber 
$('.format_number').number(true);

//Select2 
$(document).ready(function () {
    $("#select").select2();
});

$(document).ready(function () {
    $("#select1").select2();
});

$(document).ready(function () {
    $(".lightbox").colorbox({width: "40%", height: "50%"});

});


function position(id, position, url) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {id: id, position: position},
        dataType: 'JSON',
        success: function (data) {
            $('.messages').html('<div class="alert alert-success" role="alert">' + data.msg + '</div>');
        }
    });
}

function getInfo(data, id = '', title = '', active = '') {
    $.ajax({
        url: url + 'admincp/tournament/fixture/getInfo',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        success: function (result) {
        	var str = '<option value="">' + title + '</option>';
        	if(result != 0){
        		$.each(result, function(i, value){
        			if(active == value.id ) {
        				str += '<option selected value="'+ value.id +'">'  + ' ' + value.vn_name + '</option>';
        			}else {
        				str += '<option value="'+ value.id +'">'  + ' ' + value.vn_name + '</option>';
        			}
        		});
        	}
        	$(id).html(str);
        }
    });
}

function formatState (state) {
	  if (!state.id) {
	    return state.text;
	  }
	  var str = state.organization != ' ' ? ' - ' + state.organization : ''
	  var $state = $(
	    '<span><img style="width:40px!important; height:40px!important" src="' + state.url + '" /> ' + state.text + '</span>'
	 );
	 return $state;
}


$(document).ready(function () {
	// Lọc các giải đấu (danh sách các cặp đấu)
	var tournament_type = $("#tournament_type option:selected").val();
	var tournament = '';
	var noi_dung = '';
	var activeTournament = $("#tournament").attr('tournament');
	var activeNoiDung = $("#noi_dung").attr('noi_dung');
	var activeRound = $("#round").attr('round');
	if(tournament_type != 0 && tournament_type != undefined) {
		getInfo({tournament_type: tournament_type, type: 'tournament_type'}, '#tournament', 'Chọn giải đấu', activeTournament);
		tournament = $("#tournament option:selected").val();
	}
	
	if(activeTournament != 0 && activeTournament != undefined) {
		getInfo({tournament: activeTournament, type: 'tournament'}, '#noi_dung', 'Chọn nội dung', activeNoiDung);
		$.ajax({
		        url: url + 'admincp/tournament/fixture/getInfo',
		        type: 'POST',
		        data: {noi_dung: activeNoiDung, type: 'noi_dung', active: activeRound},
		        dataType: 'JSON',
		        success: function (result) {
		        	$('#round').html(result.content);
		        }
		 });
	}

	
    $("#tournament_type").change(function(){
    	tournament_type = $("#tournament_type option:selected").val();
    	if(tournament_type != 0) {
    		var data = {tournament_type: tournament_type, type: 'tournament_type'};
    		getInfo(data, '#tournament', 'Chọn giải đấu');
    	}else {
    		$("#tournament").html('<option value="0">Chọn giải đấu</option>');
    		$("#noi_dung").html('<option value="">Chọn nội dung</option>');
    		$("#round").html('<option value="0">Chọn vòng đấu</option>');
    	}
    });
    
    $("#tournament").change(function(){
    	tournament = $("#tournament option:selected").val();
    	if(tournament != 0) {
    		var data = {tournament: tournament, type: 'tournament'};
    		getInfo(data, '#noi_dung', 'Chọn nội dung');
    	}else {
    		$("#noi_dung").html('<option value="">Chọn nội dung</option>');
    		$("#round").html('<option value="0">Chọn vòng đấu</option>');
    	}
    });
    
    $("#noi_dung").change(function(){
    	noi_dung = $("#noi_dung option:selected").val();
    	if(noi_dung != 0) {
    		var data = {noi_dung: noi_dung, type: 'noi_dung'};
    		 $.ajax({
    		        url: url + 'admincp/tournament/fixture/getInfo',
    		        type: 'POST',
    		        data: data,
    		        dataType: 'JSON',
    		        success: function (result) {
    		        	$('#round').html(result.content);
    		        	if(result.type) {
    		        		var listSelect = $('#user .col-sm-6 select');
    		        		$.each(listSelect, function(i, val){
    		        			if(i % 2 != 0) {
    		        				if(result.type == 1) {
    		        					$(this).attr('disabled', 'disabled');
    		        				}
    		        				
    		        				if(result.type == 2) {
    		        					$(this).removeAttr('disabled');
    		        				}
    		        			}
    		        		});
    		        	}
    		        }
    		    });
    	}else {
    		$("#round").html('<option value="0">Chọn vòng đấu</option>');
    	}
    });

// chọn người chơi (thêm cặp đấu mới)	 
      var valUser1 = $("#user1 option:selected").val();
      var valUser2 = $("#user2 option:selected").val();
      var valUser3 = $("#user3 option:selected").val();
      var valUser4 = $("#user4 option:selected").val();

	  $("#user1").on("click change", function(){
		  valUser1 = $("#user2 option:selected").val();
	      valUser2 = $("#user2 option:selected").val();
	      valUser3 = $("#user3 option:selected").val();
	      valUser4 = $("#user4 option:selected").val();
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?&valUser2=' + valUser2 + '&valUser3='+ valUser3 +'&valUser4='+ valUser4, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user1").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
					  }); 

			  }
		  });
	  });
	  
	  $("#user2").on("click change", function(){
	      valUser1 = $("#user1 option:selected").val();
	      valUser3 = $("#user3 option:selected").val();
	      valUser4 = $("#user4 option:selected").val();
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?valUser1=' + valUser1 + '&valUser3='+ valUser3 +'&valUser4='+ valUser4, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user2").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
					  }); 

			  }
		  });
	  });
	  
	  $("#user3").on("click change", function(){
	      valUser1 = $("#user1 option:selected").val();
	      valUser2 = $("#user2 option:selected").val();
	      valUser4 = $("#user4 option:selected").val();
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?valUser1=' + valUser1 +'&valUser2=' + valUser2 + '&valUser4='+ valUser4, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user3").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
					  }); 

			  }
		  });
	  });
	  
	  $("#user4").on("click change", function(){
	      valUser1 = $("#user1 option:selected").val();
	      valUser2 = $("#user2 option:selected").val();
	      valUser3 = $("#user3 option:selected").val();
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?valUser1=' + valUser1 +'&valUser2=' + valUser2 + '&valUser3='+ valUser3, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user4").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
					  }); 

			  }
		  });
	  });;
	  // selected edit cặp đấu
	  var idUser1 =  $("#user1").attr('id-selected');
	  var idUser2 =  $("#user2").attr('id-selected');
	  var idUser3 =  $("#user3").attr('id-selected');
	  var idUser4 =  $("#user4").attr('id-selected');
	  
	  if(parseInt(idUser1) > 0) {
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?&idSelected=' + idUser1, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user1").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
				 }); 

			  }
		  });
	  }
	  
	  if(parseInt(idUser2) > 0) {
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?&idSelected=' + idUser2, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user2").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
				 }); 

			  }
		  });
	  }
	  
	  if(parseInt(idUser3) > 0) {
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?&idSelected=' + idUser3, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user3").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
				 }); 

			  }
		  });
	  }
	  
	  if(parseInt(idUser4) > 0) {
		  $.ajax({
			  url: url + 'admincp/tournament/fixture/getInfoUsers?&idSelected=' + idUser4, 
			  type: 'GET',
			  dataType: "json",
			  success: function(result){
				  $("#user4").select2({
					    //placeholder: "Select a Review",
					    minimumInputLength: 0,
					    data: result
					    ,
					    templateResult: formatState
				 }); 

			  }
		  });
	  }
	  
	  
    $("#noi_dung").change(function(){
    	tournament_type = $("#tournament_type option:selected").val();
    	tournament = $("#tournament option:selected").val();
    	noi_dung = $("#noi_dung option:selected").val();
    	
    	//console.log(tournament_type + tournament + noi_dung);
    	if(noi_dung != 0 && tournament != 0 && tournament_type != 0 ) {
    		var data = {tournament_type: tournament_type, tournament: tournament, noi_dung: noi_dung, type: 'get-total'};
    		 $.ajax({
    		        url: url + 'admincp/tournament/fixture/ajaxTotal',
    		        type: 'POST',
    		        data: data,
    		        dataType: 'JSON',
    		        success: function (result) {
    		        	//console.log(result);
    		        	if(result) {
    		        		$("#cap-dau").hide().html('Số cặp đấu còn lại <b>'+result.conlai+'</b> cặp / Đã thêm <b>'+result.curent+'</b> cặp').fadeIn(500);
    		        		if(result.conlai == 0) {
    		        			$("#full_person").val(1);
    		        		}else {
    		        			$("#full_person").val(" ");
    		        		}
    		        	}
    		        }
    		    });
    	}else {
    		$("#round").html('<option value="0">Chọn vòng đấu</option>');
    	}
    });

	

});
// validate thêm cặp đấu mới
$(document).ready(function() {
	$.validator.addMethod("validateFullPerson", function (value, element) {
		if(value == 1) {
			return false;
		}else {
			return true;
		}
    }, "Số cặp đấu trong giải đã đủ không thể thêm cặp đấu mới");
	
	$(".eSave1").click(function(){
	    $("#frmSubmit").validate({
	    	  ignore: [],
		      rules: {
		    	  start_date: {
		    		  required: true
		    	  },
		    	  end_date: {
		    		  required: true
		    	  },
		    	  tournament_type: {
		    		  required: true
		    	  },
		    	  tournament: {
			          required: true
			      },
			      noi_dung: {
			          required: true
			        },
			     doi_choi: {
			          required: true
			        },
			     full_person: {
			    	 	validateFullPerson: true
			        },
			     user1: {
		        	required: true
			     }
		         ,
		         user2: {
		        	required: true
			     }
		         ,
		         user3: {
		        	required: true
			     }
		         ,
		         user4: {
		        	required: true
			     }
		      },
		      messages: {
		    	start_date: {
			          required: "Ngày bắt đầu trận đấu không được trống"
		        },
		        end_date: {
			          required: "Ngày kết thúc trận đấu không được trống"
		        },
		    	  tournament_type: {
			          required: "Danh mục giải đấu không được trống"
		        },
		        tournament: {
			          required: "Giải đấu không được trống"
		        },
		        noi_dung: {
			          required: "Nội dung không được trống"
		        },
		        user1: {
			          required: "Người chơi không được trống"
		        }
		        ,
		        user2: {
			          required: "Người chơi không được trống"
		        }
		        ,
		        user3: {
			          required: "Người chơi không được trống"
		        }
		        ,
		        user4: {
			          required: "Người chơi không được trống"
		        }
		      }

	    });
	});

});




























