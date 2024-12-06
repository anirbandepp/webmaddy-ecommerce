@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .err {
            color: red;
        }

        .social-links a {
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
            color: #676868;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Social Links</span> - Add Social Links</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">
            <form action="{{ route('administrator.social_link.store_links') }}" method="POST"
                onsubmit="return checkSocialLink()">
                @csrf

                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">

                        <div class="form-group">
                            <label for="facebook">Facebook Link</label>
                            <input type="url" class="form-control pr-title" id="facebook" name="facebook"
                                placeholder="Enter facebook link" />
                            @error('facebook')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter Link</label>
                            <input type="url" class="form-control pr-title" id="twitter" name="twitter"
                                placeholder="Enter twitter link" />
                            @error('twitter')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="linkedin">Linkedin Link</label>
                            <input type="url" class="form-control pr-title" id="linkedin" name="linkedin"
                                placeholder="Enter linkedin link" />
                            @error('linkedin')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="instagram">Instagram Link</label>
                            <input type="url" class="form-control pr-title" id="instagram" name="instagram"
                                placeholder="Enter instagram link" />
                            @error('instagram')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="youtube">Youtube Link</label>
                            <input type="url" class="form-control pr-title" id="youtube" name="youtube"
                                placeholder="Enter youtube link" />
                            @error('youtube')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="col-md-3">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Publish
                                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body" style="display: block;">
                            <input type="submit" class="btn btn-success btn-block" value="Save Links">
                        </div>

                    </div>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Social Links<a class="heading-elements-toggle">
                                    <i class="icon-more"></i></a><a class="heading-elements-toggle">
                                    <i class="icon-more"></i></a>
                                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="pr-category-check">
                            @php
                                if (isset($socialLink)) {
                                    $facebook = $socialLink->facebook;
                                    $twitter = $socialLink->twitter;
                                    $linkedin = $socialLink->linkedin;
                                    $instagram = $socialLink->instagram;
                                    $youtube = $socialLink->youtube;

                                    echo '
                                        <div class="social-links">
                                            <a href="' .
                                        $facebook .
                                        '" target="_blank"><i class="bi bi-facebook"></i></a>
                                            <a href="' .
                                        $twitter .
                                        '" target="_blank"><i class="bi bi-twitter"></i></a>
                                            <a href="' .
                                        $linkedin .
                                        '"><i class="bi bi-linkedin"></i></a>
                                            <a href="' .
                                        $instagram .
                                        '" target="_blank"><i class="bi bi-instagram"></i></a>
                                            <a href="' .
                                        $youtube .
                                        '" target="_blank"><i class="bi bi-youtube"></i></a>
                                        </div>
                                  ';
                                }
                            @endphp

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('jsContent')
    <script>
        function checkSocialLink() {

            let facebook = document.getElementById("facebook").value;
            let twitter = document.getElementById("twitter").value;
            let linkedin = document.getElementById("linkedin").value;
            let instagram = document.getElementById("instagram").value;
            let youtube = document.getElementById("youtube").value;

            if (facebook == '' || facebook == null) {
                $.notify("Facebook url is required", "error");
                return false;
            } else if (twitter == '' || twitter == null) {
                $.notify("Twitter url is required", "error");
                return false;
            } else if (linkedin == '' || linkedin == null) {
                $.notify("Linkedin url is required", "error");
                return false;
            } else if (instagram == '' || instagram == null) {
                $.notify("Instagram url is required", "error");
                return false;
            } else if (youtube == '' || youtube == null) {
                $.notify("Youtube url is required", "error");
                return false;
            } else {
                return true;
            }
        }
    </script>
@endsection
