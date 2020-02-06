@extends('teacher.layout.dashboard')

        @section('pageTitle') Edit {{ $lesson->name }} @endsection

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
                            <a href="{{ route('content.chapter',['courseId' => $lesson->chapter->course->id]) }}">{{ $lesson->chapter->course->name }}</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('content.lesson',['courseId' => $lesson->chapter->course->id, 'chapterId' => $lesson->chapter->id ]) }}">{{ $lesson->chapter->chapterName }}</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>{{ $lesson->name }}</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="row right-content-wrapper">
                    <form role="form" action="{{ route('lesson.update') }}" method="POST" id="courseCreateForm" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-note font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Edit Lesson</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" name="title" id="title" placeholder="Lesson Title" value="{{ $lesson->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="details" id="" cols="30" rows="10" style="resize:none;overflow: hidden" class="form-control input-lg" placeholder="Lesson Details..." required>{{ $lesson->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" id="createLesson" class="btn blue pull-right">EDIT LESSON</button>
                                </div>
                            </div>


                            <div class="portlet light" id="video-upload-portlet">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-social-youtube font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Lesson VIDEO</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        {!! $videoURL !!}
                                        <video src="" class="img-responsive video-thumbnail"></video>
                                        <div class="form-group">
                                            <div class="upload-video pull-right">
                                                <input type="file" name="video" accept="video/mp4" id="video-uploader">
                                                <label for="video-uploader">Upload Video</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="portlet light" id="zip-upload">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-folder-alt font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Upload Source File</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="pull-right">
                                                <input type="file" accept="application/zip" name="sourceFiles" id="zip-uploader">
                                                <label for="zip-uploader">
                                                    <img src="{{ asset('mentor/images/placeholder.png') }}" class="img-responsive img-thumbnail" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sourceFileName" value="{{ $lesson->urlSourceFiles }}">
                        <input type="hidden" name="videoId" value="{{ $lesson->urlVideo }}">
                        <input type="hidden" name="lessonId" value="{{ $lesson->id }}">
                    </form>
                </div>
                <!-- BEGIN FOOTER -->
                <div class="page-footer">
                    <div class="page-footer-inner"> 2017 &copy; All Right Reserved
                        <a target="_blank" href="#">Gyaniscool.com</a>
                    </div>
                </div>
                <!-- END FOOTER -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        @endsection

        @section('customVar')
            <script>
                var uploadingImageGif = '{{ asset('mentor/images/loading-spinner-grey.gif') }}';
                var url = '{{ route('update.lesson.video',['lessonId' => $lesson->id]) }}';
            </script>
        @endsection
        @section('pageJs')
            <script src="{{ asset('mentor/js/jquery.blockui.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('mentor/js/blockui.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('mentor/js/switchery.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('mentor/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
        @endsection

    @section('customJs')
        <script src="{{ asset('mentor/js/customCreateCourse.js') }}" type="text/javascript"></script>
    @endsection