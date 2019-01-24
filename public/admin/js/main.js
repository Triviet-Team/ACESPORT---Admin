
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
            console.log(data);
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
        	var str = '<option value="0">' + title + '</option>';
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

// Lọc các giải đấu
$(document).ready(function () {
	var tournament_type = $("#tournament_type option:selected").val();
	var tournament = '';
	var noi_dung = '';
	var activeTournament = $("#tournament").attr('tournament');
	var activeNoiDung = $("#noi_dung").attr('noi_dung');
	var activeRound = $("#round").attr('round');
	
	if(tournament_type != 0) {
		getInfo({tournament_type: tournament_type, type: 'tournament_type'}, '#tournament', 'Chọn giải đấu', activeTournament);
		tournament = $("#tournament option:selected").val();
	}
	
	if(activeTournament != 0) {
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
    		$("#noi_dung").html('<option value="0">Chọn nội dung</option>');
    		$("#round").html('<option value="0">Chọn vòng đấu</option>');
    	}
    });
    
    $("#tournament").change(function(){
    	tournament = $("#tournament option:selected").val();
    	if(tournament != 0) {
    		var data = {tournament: tournament, type: 'tournament'};
    		getInfo(data, '#noi_dung', 'Chọn nội dung');
    	}else {
    		$("#noi_dung").html('<option value="0">Chọn nội dung</option>');
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
    		        		var listSelect = $('#user .col-sm-5 select');
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
//    function formatState (state) {
//    	  if (!state.id) {
//    	    return state.text;
//    	  }
//    	  var baseUrl = "/user/pages/images/flags";
//    	  var $state = $(
//    	    '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
//    	  );
//    	  return $state;
//    	  console.log(state);
//    	};
//
//    $('.tour-select').select2({
//    	templateSelection: formatState,
//        ajax: {
//          url: 'http://5c497fe094e8a70014b331f3.mockapi.io/ajax',
//          dataType: 'json',
//          delay: 360,
//          
//          data: function (params) {	
//            
//            var query = {
//              search: params.term,
//              page: params.page || 1
//            }
//
//            // Query parameters will be ?search=[term]&type=public
//            return query;
//
//          },
//          processResults: function (data) {
//
//            let dataValue = [];
//            
//            for (let value of data) {
//              let newObj = {
//                id: value.id,
//                text: value.name,
//                avt: value.avatar
//              }
//              dataValue.push(newObj);
//              
//              for(let obj of dataValue) {
//
//              }
////              console.log(dataValue);
//            }
//
//            return {
//              results: dataValue,
//              pagination: {
//                more: true,
//              },
//            };
//            
//          }
//        }
//      });
//    

    $(".js-example-data-ajax").select2({
    	  ajax: {
    		url: 'http://localhost/project-hao/tenis/tennis/admincp/tournament/fixture/getInfoUsers',
    	    dataType: 'json',
    	    delay: 250,
    	    data: function (params) {
    	      return {
    	        q: params.term// search term
    	      };
    	    }
    	  },
    	  placeholder: 'Search for a repository',
    	  minimumInputLength: 1
    	});

});



























