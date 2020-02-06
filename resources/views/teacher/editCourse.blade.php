@extends('teacher.layout.dashboard')

    @section('pageTitle') New Course | Gyan School @endsection

    @section('pageCss')
        <link href="{{ asset('mentor/css/switchery.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('mentor/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" id="style_color" />
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
                            <a href="{{ route('mentor.dashboard') }}">Dashboard</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{ route('course.all') }}">All Courses</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Content</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="row right-content-wrapper">
                    <form role="form" action="{{ route('course.update',['courseId' => $course->id]) }}" id="courseCreateForm" method="post" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-note font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">New Course</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" name="title" id="title" value="{{ $course->name }}" placeholder="Course Title" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="desc" id="" cols="30" rows="10" style="resize:none;overflow: hidden" class="form-control input-lg" placeholder="Course Description..." required>{{ $course->courseDetails->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="outcome" id="" cols="30" rows="10" style="resize:none;overflow: hidden" class="form-control input-lg" placeholder="What people will learn from this course..." required>{{ $course->courseDetails->courseOutcome }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" name="tag" data-role="tagsinput" placeholder="Tags">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" id="createCourseButton" class="btn blue pull-right">CREATE COURSE</button>
                                </div>
                            </div>
                            
                            <div class="portlet light" id="video-upload-portlet">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-social-youtube font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Introduction VIDEO</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <video src="" class="img-responsive video-thumbnail"></video>
                                        {!! $videoURL !!}
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
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Options</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $course->category_id) selected @endif>{{ $category->categoryName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Subcategory</label>
                                            <select name="subcategory" id="subcategory" class="form-control" required>
                                                <option value="">-- Select Subcategory --</option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" @if($subcategory->id == $course->subcategory_id) selected @endif>{{ $subcategory->subcategoryName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Course Duration</label>
                                            <input type="text" class="form-control" name="duration" value="{{ $course->courseDetails->duration }}" placeholder="2 Months, 5 Hours/Week" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-wallet font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Price</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="">Cost </label>
                                            <div class="pull-right label-addition">Free
                                                <input type="checkbox" disabled class="js-switch" id="free-switch" />
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                ৳
                                            </span>
                                                <input type="number" name="cost" class="form-control" id="cost" min="0" value="0" placeholder="0" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sale </label>
                                            <div class="pull-right label-addition">
                                                <input type="checkbox" disabled class="js-switch" id="sale-switch" />
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                ৳
                                            </span>
                                                <input type="number" class="form-control" name="saleCost" min="0" id="saleCost" placeholder="Sale Price" value="0" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light" id="image-upload">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-picture font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">FEATURED Image</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <img src="{{ route('course.image',['imageName' => $course->featuredImage]) }}" class="img-responsive img-thumbnail" alt="">
                                        <div class="form-group">
                                            <div class="pull-right">
                                                <input type="file" id="image-uploader" name="image">
                                                <label for="image-uploader">Upload Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="videoId" id="videoId" value="{{ $course->courseDetails->introVideo }}">
                        <input type="hidden" name="imageName" value="{{ $course->featuredImage }}">
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
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN QUICK NAV -->
    <div class="quick-nav-overlay"></div>

    @section('customVar')
        <script>
            var uploadingImageGif = '{{ asset('mentor/images/loading-spinner-grey.gif') }}';
            var url = '{{ route('update.video',['courseId' => $course->id]) }}';
            var categoryUrl = '{{ route('generate.subcategory') }}';
            var csrf = '{{ csrf_token() }}';
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