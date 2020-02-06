@extends('teacher.layout.dashboard')

        @section('pageTitle') Course Lessons | Gyan School @endsection

        @section('main-content')
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <h1 class="page-title">
                        <small></small>
                    </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{ route('mentor.dashboard') }}">Dashboard</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('content') }}">Content</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('content.chapter',['courseId' => $chapter->course->id]) }}">{{ $chapter->course->name }}</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>{{ $chapter->chapterName }}</span>
                        </li>
                    </ul>
                    <div class="page-toolbar">
                        <div class="btn-group pull-right">
                            <a type="button" href="{{ route('content.new',['courseId' => $chapter->course->id, 'chapterId' => $chapter->id]) }}" class="btn btn-fit-height grey-salt"> New Lesson &nbsp;
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <div class="row right-content-wrapper" id="courseContentBody">
                    @if(!count($lessons))
                        <h1 style="text-align:center; opacity: 0.4; margin-top: 100px " id="null">NO LESSONS YET !</h1>
                    @endif
                    @foreach($lessons as $lesson)
                        <a href="{{ route('lesson.edit',['courseId' => $chapter->course->id, 'lessonId' => $lesson->id]) }}">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="chapter-title pull-left">
                                        <h2>{{ $lesson->name }}</h2>
                                    </div>
                                    <div class="chapter-lesson courseLesson pull-right">
                                        <h3>
                                           <a href="">
                                               <i class="icon-eye"></i>
                                           </a>
                                           <a href="{{ route('lesson.edit',['courseId' => $chapter->course->id, 'lessonId' => $lesson->id]) }}">
                                               <i class="icon-note"></i>
                                           </a>
                                            <a href="{{ route('lesson.delete',['lessonId' => $lesson->id]) }}" data-toggle="modal">
                                                <i class="icon-close"></i>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                    </a>
                    @endforeach
                </div>
                <!-- BEGIN FOOTER -->
                <div class="page-footer">
                    <div class="page-footer-inner"> 2017 &copy; All Right Reserved
                        <a target="_blank" href="#">Gyaniscool.com</a>
                    </div>
                </div>
                <!-- END FOOTER -->
                <div class="modal fade" id="deleteChapterModal" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Delete Lesson</h4>
                            </div>
                            <div class="modal-body">
                                <h3></h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn green" data-dismiss="modal">NO</button>
                                <a href="" type="button" class="btn green" id="yesButton" data-dismiss="modal">YES</a>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

       @endsection

    @section('customJs')
    <script>
        var deleteContent;
        $('#add-chapter').click(function () {
            var chapterName = $('#chapter-name').val();
            var lesson = "0";
            var chapterContent = '<a href=""><div class="col-md-12"><div class="portlet light"><div class="chapter-title pull-left"><h2>'+chapterName+'</h2></div><div class="chapter-lesson pull-right"><h4><i class="icon-book-open"></i>&nbsp'+lesson+' Lessons &nbsp &nbsp<a href="#" class="deleteChapter"><i class="icon-close"></i></a></h4></div></div></div></a>';
            
            $('#courseContentBody').append(chapterContent);
             
        });
        
        $("#courseContentBody").on('click', '.deleteChapter', function (e){
            e.preventDefault();
            $('#deleteChapterModal').modal();
            deleteContent = $(this).parent().parent().parent();
            var title ='Are You Sure To Delete '+ $(this).parent().parent().parent().find('.chapter-title h2').html() +'?';
            $('#deleteChapterModal .modal-dialog .modal-content .modal-body h3').html(title);
        });
        
        $('#confirm-delete').click(function(){
            $(deleteContent).remove();
        });
    </script>
    @endsection