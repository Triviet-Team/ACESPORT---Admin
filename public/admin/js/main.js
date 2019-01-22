
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