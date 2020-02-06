@extends('teacher.layout.dashboard')

        @section('pageTitle') Course Content | Gyan School @endsection

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
                            <span>{{ $course->name }}</span>
                        </li>
                    </ul>
                    <div class="page-toolbar">
                        <div class="btn-group pull-right">
                            <a type="button" href="#createChapter" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="modal"> New Chapter &nbsp;
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <div class="row right-content-wrapper" id="courseContentBody">
                    {{--<a href="courseLesson.html">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="portlet light">--}}
                                {{--<div class="chapter-title pull-left">--}}
                                    {{--<h2>Introduction To Computer Science</h2>--}}
                                {{--</div>--}}
                                {{--<div class="chapter-lesson pull-right">--}}
                                    {{--<h4>--}}
                                        {{--<i class="icon-book-open"></i>--}}
                                        {{--&nbsp; 10 Lessons &nbsp; &nbsp;--}}
                                        {{--<a class="deleteChapter" data-toggle="modal">--}}
                                            {{--<i class="icon-close"></i>--}}
                                        {{--</a>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    @if(!count($course->chapters))
                        <h1 style="text-align:center; opacity: 0.4; margin-top: 100px " id="null">NO CHAPTERS YET !</h1>
                    @endif
                    @foreach($course->chapters as $chapter)
                        <a href="{{ route('content.lesson',['courseId' => $course->id, 'chapterId' => $chapter->id]) }}">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="chapter-title pull-left" id="{{ $chapter->id }}">
                                        <h2>{{ $chapter->chapterName }}</h2>
                                        <input type="hidden" id="chapter-id" value="{{ $chapter->id }}">
                                    </div>
                                    <div class="chapter-lesson pull-right">
                                        <h4>
                                            <i class="icon-book-open"></i>
                                            &nbsp; {{ count($chapter->lessons) }} Lessons &nbsp; &nbsp;
                                            <a class="editChapter" data-toggle="modal" style="margin-right: 10px">
                                                <i class="icon-note"></i>
                                            </a>
                                            <a class="deleteChapter" data-toggle="modal">
                                                <i class="icon-close"></i>
                                            </a>
                                        </h4>
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
                <div class="modal fade" id="createChapter" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Create New Chapter</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="createChapterForm">
                                    <div class="form-group">
                                        <label for="">
                                            <h3>Chapter Name</h3></label>
                                        <input type="text" class="form-control input-lg" id="chapter-name" name="chapterName" placeholder="" required>
                                        <input type="hidden" name="courseId" value="{{ $course->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn green" data-dismiss="modal" id="add-chapter">ADD CHAPTER</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="modal fade" id="deleteChapterModal" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Delete Chapter</h4>
                            </div>
                            <div class="modal-body">
                                <h3></h3>
                                <form id="deleteChapterForm">
                                <input type="hidden" name="deleteChapterId" id="deleteChapterId" value="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn green" data-dismiss="modal">NO</button>
                                <button type="button" class="btn green" data-dismiss="modal" id="confirm-delete">YES</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="modal fade" id="editChapter" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit Chapter</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="editChapterForm">
                                    <div class="form-group">
                                        <label for="">
                                            <h3>Chapter Name</h3></label>
                                        <input type="text" class="form-control input-lg" id="edit-chapter" name="chapterName" placeholder="" required>
                                        <input type="hidden" name="chapterId" id="chapterId" value="">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn green" data-dismiss="modal" id="edit-chapter-button">EDIT CHAPTER</button>
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

    @section('customVar')
        <script>
            var url = '{{ route('create.chapter') }}';
            var editURL = '{{ route('chapter.update') }}';
            var deleteURL = '{{ route('chapter.delete') }}';
        </script>

    @section('customJs')
        <script src="{{ asset('mentor/js/customChapter.js') }}" type="text/javascript"></script>
    @endsection