<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meena Media Award - 2019</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--// Google Fonts Stylesheet //-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <!--// Bootstrap Stylesheet //-->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
        <!--// Default Stylesheet //-->
        <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
        <link rel="icon" href="{{asset('assets/user/img/favicon.ico')}}" type="image/gif" sizes="16x16">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- // Header // -->
        <div class="container-fluid header">
            <div class="row">
                <div class="nav nav-pills col-md-10 offset-md-1">
                    <div class="nav-item col-lg-2 col-md-5">
                      <a class="nav-link active" href="{{route('user.index')}}">
                          <img src="{{asset('assets/user/img/logo.png')}}" class="logo"/>
                      </a>
                    </div>
                    <div class="col-lg-7 col-md-2"></div>
                    <div class="nav-item col-lg-3 col-md-5">
                      <a class="nav-link disabled" href="{{route('user.index')}}">
                          <img src="{{asset('assets/user/img/logo-unicef.png')}}" class="unicef-logo"/>
                      </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- // Banner // -->
        <div class="container-fluid banner">
            <div class="row col-md-10 offset-md-1">
                <div class="col-lg-4">
                    <h1>মীনা</h1>
                    <h2>মিডিয়া অ্যাওয়ার্ড - ২০১৯</h2>
                    <div class="separator-red"></div>
                    <div class="separator-white"></div>

                    @if(date("m/d/Y") < $currentAwardSettings->submission_deadline)
                        <button class="apply-btn btn btn-primary" data-toggle="modal" data-target="#before-application">
                            আবেদন করুন
                        </button>

                    @else
                        <button class="apply-btn btn btn-primary disabled" data-toggle="modal" data-target="#expired-application">
                            আবেদন করুন
                        </button>

                    @endif

                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-6">
                    <img data-tilt src="{{asset('assets/user/img/flar.png')}}" class="award-vector d-md-none d-sm-none d-xs-none d-lg-block"/>
                </div>
            </div>
        </div>

        <!-- // Text below Banner // -->
        <div class="container-fluid">
            <div class="row col-md-10 offset-md-1">
                <div class="col-lg-12 col-xs-12">
                    <p class="text-justify text mt-3">
                        ২০০৫ সালে যাত্রা শুরু করে মীনা মিডিয়া এ্যাওয়ার্ড ২০১৯-এ পঞ্চদশ বর্ষে পদার্পণ করলো। এই পুরস্কার গণমাধ্যমে শিশুদের বিষয়সমূহ তুলে ধরারার ক্ষেত্রে উৎকর্ষতাকে স্বীকৃতি দিয়ে থাকে। প্রিন্ট, রেডিও বা টেলিভিশন মাধ্যমের সাথে যুক্ত ১৮ বছরের নিচে এবং ১৮ বছর বা তার বেশি বয়সের বাংলাদেশী নাগরিকদের কাছ থেকে বাংলাদেশে প্রকাশিত/প্রচারিত, শিশুদের নিয়ে বা শিশুদের জন্য নির্মিত বিনোদনমূলক, সংবাদভিত্তিক বা জীবনধর্মী প্রকাশনা/অনুষ্ঠান/স্থিরচিত্র নিচের ৭টি বিভাগে জমা দেওয়ার জন্যে আহ্বান জানানো যাচ্ছে।
                    </p>
                </div>
            </div>
        </div>

        <!-- // Category // -->
        <div class="container-fluid category" id="category">
                <div class="row col-md-10 offset-md-1">
                    <div class="col-lg-3 col-md-3">
                        <img data-tilt src="{{asset('assets/user/img/meena.png')}}" class="meena"/>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <h2>অ্যাওয়ার্ড ক্যাটাগরি</h2>
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/report-icon.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/report-icon-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>প্রতিবেদন</h5>
                                            <p>সংবাদ প্রতিবেদন, অনুসন্ধানী প্রতিবেদন, উপসম্পাদকীয়</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        প্রিন্ট/অনলাইন মাধ্যম
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/report-online.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/report-online-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>সৃজনশীল</h5>
                                            <p>নিবন্ধ,  ফিচার, গল্প, কবিতা</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        প্রিন্ট/অনলাইন মাধ্যম
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/report-visual-media.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/report-visual-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>প্রতিবেদন</h5>
                                            <p>সংবাদ প্রতিবেদন, অনুসন্ধানী প্রতিবেদন</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        ভিজ্যুয়াল মাধ্যম
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/creative.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/creative-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>সৃজনশীল</h5>
                                            <p>ফিচার, প্রামাণ্য চিত্র, তথ্যচিত্র, আ্যানিমেশন, নাটক, সংগীত</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        ভিজ্যুয়াল মাধ্যম
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/radio-news.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/radio-news-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>প্রতিবেদন</h5>
                                            <p>সংবাদ প্রতিবেদন, অনুসন্ধানী প্রতিবেদন</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        রেডিও
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/radio-song.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/radio-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>সৃজনশীল</h5>
                                            <p>রেডিও ফিচার/অনুষ্ঠান, প্রামাণ্য প্রতিবেদন, নাটক, সংগীত</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        রেডিও
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="category-item card">
                                    <div class="card-body">
                                        <img src="{{asset('assets/user/img/camera.png')}}" class="cat-image">
                                        <img src="{{asset('assets/user/img/camera-hover.png')}}" class="cat-image-hover">
                                        <div class="cat-info">
                                            <h5>নিউজ ফটোগ্রাফী</h5>
                                            <p>অনলাইন/প্রিন্ট মাধ্যম</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        নিউজ ফটোগ্রাফী
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="">
                                        <img src="{{asset('assets/user/img/award-icon.png')}}" class="mt-3 d-none d-sm-block" style="position: absolute; bottom: -10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // End of Category List // -->
            <!-- // Prize List Start // -->
            <div class="container-fluid">
                <div class="prize row col-md-10 offset-md-1">
                    <div class="prize-item col-lg-4 col-xs-12">
                        <h5>প্রথম পুরস্কার</h5>
                        <h1>৫০,০০০ (পঞ্চাশ হাজার) টাকা</h1>
                        <h6>একটি ক্রেস্ট, সনদপত্র</h6>
                        <img src="{{asset('assets/user/img/award-icon.png')}}" />
                    </div>
                    <div class="prize-item col-lg-4 col-xs-12">
                        <h5>দ্বিতীয় পুরস্কার</h5>
                        <h1>২৫,০০০ (পঁচিশ হাজার) টাকা</h1>
                        <h6>একটি ক্রেস্ট, সনদপত্র</h6>
                        <img src="{{asset('assets/user/img/award-icon.png')}}" />
                    </div>
                    <div class="prize-item col-lg-4 col-xs-12">
                        <h5>তৃতীয় পুরস্কার</h5>
                        <h1>১৫,০০০ (পনের হাজার) টাকা</h1>
                        <h6>একটি ক্রেস্ট, সনদপত্র</h6>
                        <img src="{{asset('assets/user/img/award-icon.png')}}" />
                    </div>
                </div>
            </div>
            <!-- // Prize List End // -->
            <!-- // Photo Gallery Start // -->
			@if(App\Models\Photo::count())
            <h2 class="gallery-title text-center">ফটো গ্যালারি</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
					
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					
					@php
						$numberOfPageList = App\Models\Photo::count() / 7 ;
					@endphp
					
					@for($i=0; $i < $numberOfPageList-1; $i++)
														
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    
					@endfor
                </ol>
            <div class="gallery-inner col-md-10 offset-md-1 carousel-inner">
				
				<div class="carousel-item active">
                    <div class="gallery row justify-content-center">
						
						@foreach(App\Models\Photo::all() as $key => $photo)
							@if( $key < 7)
							<div class="col-lg-3">

								<div class="gallery-image card">
									@foreach($photo->photoFiles as $photoFile)
									<img class="card-img-top" src="{{asset('assets/user/media/'.$photoFile->photo_path)}}" alt="Card image cap">
									@endforeach
									<span class="plus-minus">☼</span>
									<div class="card-footer text-muted text-center">
										{{ $photo->title }}
									</div>
								</div>

							</div>
							@endif
                        @endforeach
						
                    </div>
                </div>
			
                @for($i=1; $i < $numberOfPageList; $i++)
				<div class="carousel-item">
                    <div class="gallery row justify-content-center">
						
						@foreach(App\Models\Photo::all() as $key => $photo)
							@if( $key > 6*$i && $key < 6*$i + 8 )
							<div class="col-lg-3">

								<div class="gallery-image card">
									@foreach($photo->photoFiles as $photoFile)
									<img class="card-img-top" src="{{asset('assets/user/media/'.$photoFile->photo_path)}}" alt="Card image cap">
									@endforeach
									<span class="plus-minus">☼</span>
									<div class="card-footer text-muted text-center">
										{{ $photo->title }}
									</div>
								</div>

							</div>
							@endif
                        @endforeach
						
                    </div>
                </div>
				@endfor
                
            </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> 
            </div>
			@endif
            <!--<div class="row justify-content-center mb-3">
                <button class="apply-btn-3 btn btn-primary" data-toggle="modal" data-target="#before-application">
                    এক পলকে
                </button>
            </div>-->
            <!-- // Photo Gallery End // --> 
            <!-- // Deadline Start // -->
            <div class="deadline container-fluid">
                <div class="row col-md-10 offset-md-1">
                    <div class="col-lg-8 col-xs-12">
                        <p>জমাদানের সর্বশেষ সময়সীমা : ০২/০৬/২০১৯</p>
                    </div>
                    <div class="col-lg-4 col-xs-12 d-flex justify-content-end">

                        @if(date("m/d/Y") < $currentAwardSettings->submission_deadline)
                            <button class="apply-btn-2 btn btn-primary" data-toggle="modal" data-target="#before-application">
                                আবেদন করুন
                            </button>

                        @else
                            <button class="apply-btn btn btn-primary disabled" data-toggle="modal" data-target="#expired-application">
                                আবেদন করুন
                            </button>

                        @endif

                    </div>
                </div>
            </div>
            <!-- // Deadline End // -->
            <!-- // Eligibility Start // -->
            <div class="eligibility container-fluid mt-5">
                <div class="row col-md-10 offset-md-1">
                    <div class="col-sm-12">
                        <h1>প্রতিযোগিতায় অংশগ্রহণের জন্য প্রযোজ্য শর্ত ও নির্দেনাবলী:</h1>
                        <ul class="text-justify text-muted">
                            <li>
                                    জমা দেওয়া বিষয়গুলো ২০১৮-এর ০১ মে থেকে ২০১৯-এর ৩০ এপ্রিল সময়কালের মধ্যে প্রকাশিত/প্রচারিত হতে হবে।
                            </li>
                            <li>
                                    প্রিন্ট/অনলাইন মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল লেখাটি যেভাবে প্রকাশিত হয়েছে ঠিক সেটির স্ক্যান কপি এবং যে মিডিয়াতে প্রকাশিত হয়েছে তার নামসহ আপলড করতে হবে অথবা অনলাইনের লিংকটি দিতে হবে।
                            </li>
                            <li>
                                    ভিজ্যুয়াল মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল অনুষ্ঠানটি যেভাবে প্রচারিত হয়েছে ঠিক সেভাবেই ভিডিওটি MPEG4/MP4 ফরমেটে গুগুল ড্রাইভ, ওয়ান ড্রাইভ, ড্রপবক্স, ইউটিউব অথবা যে কোন অনলাইন মাধ্যমে-এ আপলড করে লিংকটি শেয়ার করতে হবে। তবে এই লিংকটি অবশ্যই আগামী ৩০ সেপ্টেমবর ২০১৯ পর্যন্ত কার্যকর থাকতে হবে।
                            </li>
                            <li>
                                    রেডিও মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল অনুষ্ঠানটি যেভাবে প্রচারিত হয়েছে ঠিক সেভাবেই অডিওটি MP3 ফরমেটে গুগুল ড্রাইভ, ওয়ান ড্রাইভ, ড্রপবক্স, ইউটিউব অথবা যে কোন অনলাইন মাধ্যমে-এ আপলড করে লিংকটি শেয়ার করতে হবে। তবে এই লিংকটি অবশ্যই আগামী আগামী ৩০ সেপ্টেমবর ২০১৯ পর্যন্ত কার্যকর থাকতে হবে।
                            </li>
                            <li>
                                    নিউজ ফটোগ্রাফী-তে আবেদনের ক্ষেত্রে আপনার ছবিটি যেভাবে প্রকাশিত হয়েছে ঠিক সেভাবেই স্ক্যান কপি এবং যে মিডিয়াতে প্রকাশিত হয়েছে তার নামসহ আপলড করতে হবে। সাথে মূল ছবিটিও JPG ফরমেটে আপলড করতে হবে।
                            </li>
                            <li>
                                    আবেদনপত্রটি অসম্পূর্ণ হলে অংশগ্রহণের অযোগ্যতা বিবেচিত/বাতিল হয়ে যেতে পারে।
                            </li>
                            <li>
                                    কেবলমাত্র চূড়ান্তভাবে মনোনীতদের সঙ্গেই যোগাযোগ করা হবে। অযাচিত যোগযোগ গ্রহণযোগ্য হবে না, বরং এতে অংশগ্রহণের অযোগ্যতা বিবেচিত/বাতিল হয়ে যেতে পারে।
                            </li>
                            <li>
                                    অংশগ্রহণকারী এক ক্যাটাগরিতে তার প্রকাশিত/প্রচারিত সর্বোচ্চ তিনটি প্রতিবেদন অথবা সৃজনশীল অনুষ্ঠান/লেখা অথবা ছবি জমা দিতে পারবেন। তবে, পুরস্কারের জন্য একটিই বিবেচিত হবে।
                            </li>
                            <li>
                                    এই পুরস্কার প্রদানের সকল স্তরে সব ধরনের সিদ্ধান্ত গ্রহণের অধিকার ইউনিসেফের।
                            </li>
                            <li>
                                    আবেদন সংক্রান্ত বিষয়ে যোগাযোগ করতে পারেন infobangladesh@unicef.org
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // Eligibility End // -->
            <!-- // Footer Start // -->
            <div class="footer container-fluid mt-5">
                <div class="row col-md-10 offset-md-1 justify-content-center">
                    <div class="col-lg-10 mt-md-5 text-center">
                        <h1>মীনা মিডিয়া অ্যাওয়ার্ড - ২০১৯</h1>
                        <div class="footer-separator"></div>
                        <p class="mt-3 text-white">
                            ইউনিসেফ বাংলাদেশ বিএসএল অফিস কমপ্লেক্স ১ মিন্টো রোড, 
                        </p>
                        <p class="text-white">
                            রমনা, ঢাকা ১০০০ বাংলাদেশ
                        </p>
                    </div>
                </div>
            </div>
            <!-- // Footer End // -->
        
        
        
        
        
        
        <!-- // Start apication instructions // -->
        <div class="modal fade" id="before-application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">প্রতিযোগিতায় অংশগ্রহণের জন্য প্রযোজ্য শর্ত ও নির্দেনাবলী:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <ul class="text-justify text-muted">
                            <li>
                                    জমা দেওয়া বিষয়গুলো ২০১৮-এর ০১ মে থেকে ২০১৯-এর ৩০ এপ্রিল সময়কালের মধ্যে প্রকাশিত/প্রচারিত হতে হবে।
                            </li>
                            <li>
                                    প্রিন্ট/অনলাইন মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল লেখাটি যেভাবে প্রকাশিত হয়েছে ঠিক সেটির স্ক্যান কপি এবং যে মিডিয়াতে প্রকাশিত হয়েছে তার নামসহ আপলড করতে হবে অথবা অনলাইনের লিংকটি দিতে হবে।
                            </li>
                            <li>
                                    ভিজ্যুয়াল মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল অনুষ্ঠানটি যেভাবে প্রচারিত হয়েছে ঠিক সেভাবেই ভিডিওটি MPEG4/MP4 ফরমেটে গুগুল ড্রাইভ, ওয়ান ড্রাইভ, ড্রপবক্স, ইউটিউব অথবা যে কোন অনলাইন মাধ্যমে-এ আপলড করে লিংকটি শেয়ার করতে হবে। তবে এই লিংকটি অবশ্যই আগামী ৩০ সেপ্টেমবর ২০১৯ পর্যন্ত কার্যকর থাকতে হবে।
                            </li>
                            <li>
                                    রেডিও মাধ্যম-এ আবেদনের ক্ষেত্রে আপনার প্রতিবেদন বা সৃজনশীল অনুষ্ঠানটি যেভাবে প্রচারিত হয়েছে ঠিক সেভাবেই অডিওটি MP3 ফরমেটে গুগুল ড্রাইভ, ওয়ান ড্রাইভ, ড্রপবক্স, ইউটিউব অথবা যে কোন অনলাইন মাধ্যমে-এ আপলড করে লিংকটি শেয়ার করতে হবে। তবে এই লিংকটি অবশ্যই আগামী আগামী ৩০ সেপ্টেমবর ২০১৯ পর্যন্ত কার্যকর থাকতে হবে।
                            </li>
                            <li>
                                    নিউজ ফটোগ্রাফী-তে আবেদনের ক্ষেত্রে আপনার ছবিটি যেভাবে প্রকাশিত হয়েছে ঠিক সেভাবেই স্ক্যান কপি এবং যে মিডিয়াতে প্রকাশিত হয়েছে তার নামসহ আপলড করতে হবে। সাথে মূল ছবিটিও JPG ফরমেটে আপলড করতে হবে।
                            </li>
                            <li>
                                    আবেদনপত্রটি অসম্পূর্ণ হলে অংশগ্রহণের অযোগ্যতা বিবেচিত/বাতিল হয়ে যেতে পারে।
                            </li>
                            <li>
                                    কেবলমাত্র চূড়ান্তভাবে মনোনীতদের সঙ্গেই যোগাযোগ করা হবে। অযাচিত যোগযোগ গ্রহণযোগ্য হবে না, বরং এতে অংশগ্রহণের অযোগ্যতা বিবেচিত/বাতিল হয়ে যেতে পারে।
                            </li>
                            <li>
                                    অংশগ্রহণকারী এক ক্যাটাগরিতে তার প্রকাশিত/প্রচারিত সর্বোচ্চ তিনটি প্রতিবেদন অথবা সৃজনশীল অনুষ্ঠান/লেখা অথবা ছবি জমা দিতে পারবেন। তবে, পুরস্কারের জন্য একটিই বিবেচিত হবে।
                            </li>
                            <li>
                                    এই পুরস্কার প্রদানের সকল স্তরে সব ধরনের সিদ্ধান্ত গ্রহণের অধিকার ইউনিসেফের।
                            </li>
                            <li>
                                    আবেদন সংক্রান্ত বিষয়ে যোগাযোগ করতে পারেন infobangladesh@unicef.org
                            </li>
                        </ul>
                </div>
                <div class="modal-footer">

                    @if(date("m/d/Y") < $currentAwardSettings->submission_deadline)

                        <a href="{{ route('user.apply.show') }}" class="btn text-info btn-secondary">
                            আবেদন করুন
                        </a>

                    @else
                        <button class="apply-btn btn btn-primary disabled" data-toggle="modal" data-target="#expired-application">
                            আবেদন করুন
                        </button>

                    @endif

                </div>
            </div>
            </div>
        </div>


        <!-- // Start apication instructions // -->
        <div class="modal fade" id="expired-application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Instructions for Next Schedule)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    <p class="text-justify">
                        {{ $currentAwardSettings->delay_submission_message }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-danger btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>


        <!-- // End apication instructions //  -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>
        <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
        <script src="{{asset('assets/user/js/tilt.min.js')}}"></script>
    </body>
</html>