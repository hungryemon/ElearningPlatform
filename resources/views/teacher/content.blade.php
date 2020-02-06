@extends('teacher.layout.dashboard')

    @section('pageTitle') Course Content | Gyan School @endsection
    @section('pageCss')
        <link href="{{ asset('mentor/css/blog.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection

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
                            <a href="index-2.html">Dashboard</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Content</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="blog-page blog-content-1">
                    <div class="row right-content-wrapper">

                        @foreach($courses as $course)
                            <div class="col-sm-4">
                                <div class="blog-post-sm bordered blog-container">
                                    <div class="blog-img-thumb">
                                        <a href="{{ route('content.chapter',['courseId' => $course->id]) }}">
                                            <img src="{{ route('course.image',['imageName' => $course->featuredImage]) }}">
                                        </a>
                                    </div>
                                    <div class="blog-post-content">
                                        <h2 class="blog-title blog-post-title">
                                            <a href="{{ route('content.chapter',['courseId' => $course->id]) }}">{{ $course->name }}</a>
                                        </h2>
                                        <p class="blog-post-desc"> {{ str_limit($course->courseDetails->description,80,' ...') }} </p>
                                        <div class="blog-post-foot">
                                            <div class="blog-post-meta">
                                                <i class="icon-calendar font-blue"></i>
                                                <a href="javascript:;">{{ $course->created_at->format('d M, Y') }}</a>
                                            </div>
                                            <div class="blog-post-meta">
                                                <i class="icon-users font-blue"></i>
                                                <a href="javascript:;">14 Enrolled</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
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
