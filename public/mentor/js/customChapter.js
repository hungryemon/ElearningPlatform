var deleteContent;
var id;
$('#add-chapter').click(function () {
    var chapterName = $('#chapter-name').val();
    if(chapterName != ''){
        $.ajax({
            url : url,
            type: 'POST',
            data : new FormData($('#createChapterForm')[0]),
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                id = data;
            },
            complete : function (XMLHttpRequest,status,data) {
                var lesson = "0";
                var chapterContent = '<a href="http://localhost:8000/mentor/content/1491832137/'+id+'/lesson"><div class="col-md-12"><div class="portlet light"><div class="chapter-title pull-left"><h2>'+chapterName+'</h2></div><div class="chapter-lesson pull-right"><h4><i class="icon-book-open"></i>&nbsp'+lesson+' Lessons &nbsp &nbsp<a href="#" class="deleteChapter"><i class="icon-close"></i></a></h4></div></div></div></a>';
                $('#courseContentBody').append(chapterContent);
                $('#chapter-name').val('');
                $('#null').hide();
                
            },
            error: function (XMLHttpRequest,status,error) {
                console.log(status+':'+error);
            }
        });
    }
});

$('#edit-chapter-button').click(function () {
    var chapterName = $('#edit-chapter').val();
    var chapterId = $('#chapterId').val();
    if(chapterName != ''){
        $.ajax({
            url : editURL,
            type: 'POST',
            data : new FormData($('#editChapterForm')[0]),
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                id = data;
            },
            complete : function (XMLHttpRequest,status,data) {
                var chapter = $('#' + chapterId);
                chapter.find('h2').text(chapterName);

            },
            error: function (XMLHttpRequest,status,error) {
                console.log(status+':'+error);
            }
        });
    }
});

$("#courseContentBody").on('click', '.deleteChapter', function (e){
    e.preventDefault();
    $('#deleteChapterModal').modal();
    deleteContent = $(this).parent().parent().parent();
    var title ='Are You Sure To Delete '+ $(this).parent().parent().parent().find('.chapter-title h2').html() +'?';
    $('#deleteChapterModal .modal-dialog .modal-content .modal-body h3').html(title);
    var chapterId = $(this).parent().parent().parent().find('#chapter-id').val();
    console.log(chapterId);
    $('#deleteChapterId').val(chapterId);
    console.log($(e.currentTarget).attr("href"));
    $('#yesButton').attr('href',$(this).attr('id'));
});

$("#courseContentBody").on('click', '.editChapter', function (e){
    e.preventDefault();
    $('#editChapter').modal();
    var chapterName = $(this).parent().parent().parent().find('.chapter-title h2').text();
    var chapterId = $(this).parent().parent().parent().find('#chapter-id').val()
    $('#edit-chapter').val(chapterName);
    $('#chapterId').val(chapterId);
    console.log(chapterId);
});

$('#confirm-delete').click(function(){
    $.ajax({
        url : deleteURL,
        type: 'POST',
        data : new FormData($('#deleteChapterForm')[0]),
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            id = data;
        },
        complete : function (XMLHttpRequest,status,data) {
            $(deleteContent).remove();
        },
        error: function (XMLHttpRequest,status,error) {
            console.log(status+':'+error);
        }
    });
});
