var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function (html) {
    var switchery = new Switchery(html, {
        size: 'small',
        color: '#3598dc'
    });
});

$(document).ready(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.video-thumbnail').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $('.video-thumbnail').css("width","100%");
            $('.video-thumbnail').attr("controls",true);
        }
    }

    $("#video-uploader").change(function (e) {
        if($('#title').val() === ''){
            alert('Please Enter a Title First');
            $("#video-uploader").val('');
            return;
        }
        readURL(this);
        var ext = e.target.files[0].name.split('.').pop();
        var form = new FormData($('#courseCreateForm')[0]);
        $('#createCourseButton').attr('disabled','disabled');
        $('iframe').hide();
        $.ajax({
            url: url,
            type: 'POST',
            data: form,
            contentType: false,
            processData: false,
            dataType: 'html',
            before: function () {

            },
            success: function (data) {
                console.log(data);
                $('#videoId').val(data);
            },
            complete: function (XMLHttpRequest,status) {
                window.setTimeout(function(){
                    App.unblockUI('#video-upload-portlet');
                },2e3);
                $('#createCourseButton').removeAttr('disabled');
                $('#createLesson').removeAttr('disabled');
            },
            error: function (XMLHttpRequest,status,error) {
                console.log('error: ' + error);
            }
        });
    });

    function readURLimage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-thumbnail').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image-uploader").change(function () {
        readURLimage(this);
    });

    $("#free-switch").change(function () {
        if($(this).is(":checked")){
            $('#cost').attr('disabled',true);
            $('#cost').removeAttr('required');
            $('#cost').val(0);
        }
        else {
            $('#cost').attr('disabled',false);
            $('#cost').attr('required',true);
            $('#cost').val('');
        }
    });

    $("#sale-switch").change(function () {
        if($(this).is(":checked")){
            $('#saleCost').attr('disabled',false);
            $('#saleCost').attr('required',true);
            $('#saleCost').val('');
        }
        else {
            $('#saleCost').attr('disabled',true);
            $('#saleCost').removeAttr('required');
            $('#saleCost').val(0);
        }
    });
    
    $('#category').change(function () {
        var value = $(this).val();
        $.ajax({
            url : categoryUrl,
            type: 'POST',
            data: {
                'category' : value,
                '_token' : csrf
            },
            dataType: 'html',
            success: function (data) {
                $('#subcategory').html(data);
            }
        });
    });
});

