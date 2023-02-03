<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meena Media Award - 2019</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--// Google Fonts Stylesheet //-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--// Google Fonts Stylesheet //-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <!--// Bootstrap Stylesheet //-->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <!--// Default Stylesheet //-->
    <link rel="stylesheet" href="http://award.abcdgamepanel.com/assets/user/css/style.css">
    <link rel="icon" href="http://award.abcdgamepanel.com/assets/user/img/favicon.ico" type="image/gif" sizes="16x16">
    <!--// Default Stylesheet //-->
    <link rel="stylesheet" href="http://award.abcdgamepanel.com/assets/user/css/sweetalert2.min.css">

    <style>
        .image-upload-box {
            min-width: 100%;
            height: 230px;
            background: url(http://award.abcdgamepanel.com/assets/user/img/placeholder.png);
            background-position: center center;
            background-size: cover;
            cursor: pointer;
            text-transform: none !important;
        }
        .image-upload-box .btn {
            text-transform: none !important;
        }
        .file-upload-label {
            margin-top: 180px;
        }

        .remove-media-form {
            cursor: pointer;
            right: 10px;
            position: absolute;
            padding: 6px 8px;
        }

        .remove-btn-icon {
            line-height: 0.3em;
        }

        .go-back-btn {
            border: 1px solid #fff;
        }

        .go-back-btn:hover {
            background: #fff !important;
            color: #03a9f4 !important;
        }

        .form-section-header {
            text-transform: uppercase;
            font-weight: 600;
        }

        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
			background: url({{ asset('/assets/user/img/Preloader_11.gif') }}) center no-repeat #fff;
        }
        .has-error {
            background: rgba(236, 103, 103, 0.15);
            color: #f44336;

        }

        .has-error-media {
            background: rgba(236, 103, 103, 0.15);
            color: #f44336;
			margin-left: -9px;
    		margin-right: -9px;
        }

        .has-error-contact {
            background: rgba(236, 103, 103, 0.15);
            color: #f44336;
        }

        .contact-group {
            padding: 1em;
        }

        .has-error:after {
            content: "";
            display: block;
            position: absolute;
            width: 5px;
            height: 100%;
            background: #fff;
            top: 0;
            right: 0;
        }

        .has-error:before {
            content: "";
            display: block;
            position: absolute;
            width: 5px;
            height: 100%;
            background: #fff;
            top: 0;
            left: 0;

        }

        .form-group {
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .age-group {
            padding: 0;
        }

        .appl-group {
            padding: 0;
        }

        .mymedia {
            overflow: hidden;
        }
    </style>
	<script>
		function isIE() {
			ua = navigator.userAgent;
			/* MSIE used to detect old browsers and Trident used to newer ones*/
			var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

			return is_ie; 
		}
		/* Create an alert to show if the browser is IE or not */
		function IE () {
			if (isIE()){
				document.body.innerHTML = '<div style="text-align:center; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);"><h1 class="text-info mb-5" style="font-size:5em;">মীনা মিডিয়া অ্যাওয়ার্ড</h1><h1 style="font-size:3em;">Browser Not Supported!<h1><p style="font-size: 0.75em;">Please use modern browsers like Chrome, Firefox, Safari etc.</p></div>';
			}
		}
	</script>
</head>

<body onload="IE()">
    <div class="se-pre-con"></div>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- // Header Start // -->
    <div class="footer container-fluid">
		<a href="/" class="btn btn-primary text-white pl-3 font-weight-light pl-5 mt-2 go-back-btn">
			<i class="material-icons back-to-home-icon" style="line-height: 0.9em;left: 8px">keyboard_backspace</i>
			Go back to home page
		</a>


        <div class="row col-md-10 offset-md-1 justify-content-center pt-3">
            <div class="col-lg-10 mt-md-2 text-center">
                <h1>Meena Media Award 2019</h1>
                <div class="footer-separator"></div>
                <h3 class="mt-3 text-white">
                    Application form
                </h3>
                <p class="text-white mt-3 mb-3">
                    Please read the eligibility and instructions carefully before applying. If you have any questions
                    please feel free to contact us.
                </p>
                <button class="apply-btn-2 btn btn-primary mb-3" data-toggle="modal" data-target="#support-application">
                    Contact us
                </button>
            </div>
        </div>
    </div>
    <!-- // Header End // -->

    <!-- // Form Start // -->
    <div class="form container-fluid mt-5">

		@if(session()->has('errors'))

		<ul>

			@foreach($errors->all() as $error)
			<li style="padding: 0; margin: 0;">
				<p  class="alert alert-danger"> {{ $error }} </p>
			</li>
			@endforeach

		</ul>

		@endif

        <div class="row col-md-10 offset-md-1" id="media-parent">
            <div class="col-lg-12 col-xs-12">
                <form id="submit-form" class="form-horizontal" method="post" action="{{route('user.apply.submit')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- // Start of Section 1 // -->
                    <div class="form-section card mb-4">
                        <div class="card-heading">
                            <span class="text-white form-section-header">Personal information</span>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="name" class="">Applicant's full name *</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                    required="true">
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="dateofbirth" class="">Applicant's date of birth *</label>
                                <input type="date" value="" class="form-control" name="birth_date" id="dateofbirth"
                                    required="true">
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="email" class="">Applicant's email address *</label>
                                <input type="email" class="form-control" name="email" id="email" required="true">
                                <span class="bmd-help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="mobile" class="">Applicant's mobile number *</label>
                                <input type="tel" class="form-control" name="phone" id="mobile" required="true"
                                pattern="[0-9]{11,11}" title="Mobile number must be 11 characters.">
                                <span class="bmd-help">We'll never share your number with anyone else.</span>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="mobile_alt" class="">Applicant's alternative mobile
                                    number</label>
                                <input type="number" class="form-control" name="phone_alt" id="mobile_alt">
                                <span class="bmd-help">We'll never share your number with anyone else.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="address" class="">Applicant's mailing address *</label>
                                <textarea class="form-control" name="address" id="address" rows="2" required="true"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- // End of Section 1 // -->
                    <!-- // Start of Section 2 // -->
                    <div class="form-section card mb-4">
                        <div class="card-heading">
                            <span class="text-white form-section-header">Category</span>
                        </div>
                        <div class="card-body">
                            <div class="form-group row required">
								<div class="col-12">
                                <label for="category" class="">Select a category: *</label>
                                <select name="category_id" class="form-control" id="category" required>
                                    <option selected>Please choose one</option>


                                    <option value="1">Print/Online Media</option>


                                    <option value="2">Visual Media</option>


                                    <option value="3">Radio</option>


                                    <option value="4">News Photography</option>


                                </select>
								</div>
                            </div>
                            <div class="form-group row justify-content-center align-items-center age-group required" required>
                                <label for="staticEmail" class="col-lg-4 col-xs-12">
                                    Age group: *
                                </label>
                                <div class="col-lg-8 col-xs-12">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <div class="col-xs-5">
                                            <label class="form-radio btn btn-secondary">
                                                <input type="checkbox" name="age_id" id="option1" autocomplete="off"
                                                    value="1" onchange="removeCheckedBoxes('#option1', '.age-group');"> Below 18
                                            </label>
                                        </div>
                                        <div class="col-xs-5">
                                            <label class="form-radio btn btn-secondary">
                                                <input type="checkbox" name="age_id" id="option2" autocomplete="off" value="2" onchange="removeCheckedBoxes('#option2', '.age-group');"> 18 or Above
                                            </label>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12 age-error text-left d-none">

                                </div>
                            </div>

                            <div id="application_type" class="form-group row justify-content-center align-items-center appl-group required">
                                <label for="staticEmail" class="col-lg-4 col-xs-12">
                                    Application type: *
                                </label>
                                <div class="col-lg-8 col-xs-12">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <div class="col-xs-6">
                                            <label class="form-radio col-xs-6 btn btn-secondary">
                                                <input type="checkbox" name="content_type_id" id="option1" autocomplete="off"
                                                    value="1" onchange="removeCheckedBoxes('#option1', '.appl-group');"> Report
                                            </label>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="form-radio col-xs-6 btn btn-secondary">
                                                <input type="checkbox" name="content_type_id" id="option2" autocomplete="off"
                                                    value="2" onchange="removeCheckedBoxes('#option2', '.appl-group');"> Creative
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12 appl-error text-left d-none">

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- // End of Section 2 // -->
                    <!-- // Start of Section 3 // -->
                    <div class="media_form_here">

                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-raised btn-info float-right" id="addMoreSubmission2">
                                <!-- <i class="material-icons">add</i> --> Add More Submission
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-info btn-raised btn-lg submit-btn">Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
		<span class="float-right text-info mb-3 mr-1">Developed by <a href="http://riseuplabs.com" class="text-dark">Riseup Labs</a></span>
    </div>
    <!-- // Form End // -->



    <!-- // Start apication support // -->
    <div class="modal fade" id="support-application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Email us for support</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{route('user.message.submit')}}" id="contact-form">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group contact-group">
                            <label for="mobile_alt" class="">Your name *</label>
                            <input type="text" name="name" class="form-control" id="mobile_alt" required>
                            <!-- <span class="bmd-help">We'll never share your email with anyone else.</span>
                            <span class="bmd-help">And this is probably from a second plugin showing in a non-optimal way</span> -->
                        </div>
                        <div class="form-group contact-group">
                            <label for="mobile_alt" class="">Your email</label>
                            <input type="email" name="email" class="form-control" id="mobile_alt">
                            <!-- <span class="bmd-help">We'll never share your email with anyone else.</span>
                            <span class="bmd-help">And this is probably from a second plugin showing in a non-optimal way</span> -->
                        </div>
                        <div class="form-group contact-group">
                            <label for="mobile_alt" class="">Your phone number *</label>
                            <input type="text" name="mobile" class="form-control" id="mobile_alt" required>
                            <!-- <span class="bmd-help">We'll never share your email with anyone else.</span>
                            <span class="bmd-help">And this is probably from a second plugin showing in a non-optimal way</span> -->
                        </div>
                        <div class="form-group contact-group">
                            <label for="address" class="">Message *</label>
                            <textarea name="userMessage" class="form-control" id="address" rows="6" required></textarea>
                            <!-- <span class="bmd-help">We'll never share your email with anyone else.</span>
                            <span class="bmd-help">And this is probably from a second plugin showing in a non-optimal way</span> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-danger btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-info btn-primary">Send message</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- // End apication support //  -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>

    <script src="http://award.abcdgamepanel.com/assets/user/js/tilt.min.js"></script>
    <script src="http://award.abcdgamepanel.com/assets/user/js/jquery.uploadPreview.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/user/js/index.js"></script>

    <script src="http://award.abcdgamepanel.com/assets/user/js/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>

    @include("sweet::alert")

    <script type="text/javascript">
        $('.swal-button-container').click(function () {
            window.location.href = "{{route('user.index')}}";
        });
    </script>

</body>

<script>
        var category = undefined;
        var submissions = 1;
        var removed_second = false;

        $('#addMoreSubmission2').hide();



        $('#category').change(function () {

            if ($(".mediaDiv")[1]){
                swal({
                title: "Are you sure?",
                text: "Since you're changing submission category, your extra submissions will reset.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    submissions = 1;
                    category = $('#category').val();

                    if (category != undefined) {
                        $('#addMoreSubmission2').show();
                    }

                    $('.media_form_here').html(submissionDetails(parseInt(category)));
                } else {
                    $('#category').val(category);
                }
                });
            } else {
                submissions = 1;
                    category = $('#category').val();

                    if (category != undefined) {
                        $('#addMoreSubmission2').show();
                    }

                    $('.media_form_here').html(submissionDetails(parseInt(category)));
            }
        });


        $('#addMoreSubmission2').click(function () {
            submissions++;

            if (submissions == 3) {
                if (removed_second) {
                    $(submissionDetails(parseInt(category), true, 2)).insertBefore('.remove-media-form-3');
                } else {
                    $('.media_form_here').append(submissionDetails(parseInt(category), true));
                }

                $('#addMoreSubmission2').hide();
            } else {
                $('.media_form_here').append(submissionDetails(parseInt(category), true));
            }
        })

        function submissionDetails(c = 1, r = false, cs = undefined)
        {

            incr = (cs != undefined ? cs : submissions) - 1;

            print_online = `
            <!-- // Print / Online Starting // -->
            <!-- // Media Upload or Link Section // -->
            <div class="c media-link-block-`+(cs != undefined ? cs : submissions)+` form-group p-3 row mt-4 mb-4 h-100 justify-content-center align-items-center">
                <div class="col-lg-5 col-sm-12 uploadFile">
                    <div class="card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media card-body text-center">


                            <label class="image-upload-box image-upload-box-`+(cs != undefined ? cs : submissions)+`">
                                <div class="btn btn-raised btn-info btn-block file-upload-label">Upload scan copy</div>
                                <input type="file" name="filePrintOnlineMedia[]" accept=".jpg, .jpeg" id="file-upload-print-`+(cs != undefined ? cs : submissions)+`" style="display:none !important;" onchange="readURL(this, '.image-upload-box-`+submissions+`');">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12 text-center mt-3 text-muted dividerOr">
                    <h5 class="align-middle float-middle">and/or</h5>
                </div>

                <div class="col-lg-5 col-sm-12 uploadLink">
                    <div class="media-link card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="card-body">
                            <h3 class="text-muted text-center">Media file link</h3>
                            <div class="form-group bmd-form-group">
                                <label for="media_link" class="">Paste your
                                    online link (including http://)</label>
                                <input type="url" class="form-control" name="linkPrintOnlineMedia[]" id="media_link_print-`+(cs != undefined ? cs : submissions)+`">
                                <span class="bmd-help text-wrap">The link should have at least 3
                                    months of validity.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Print / Online End // -->
        `;

            visual_media = `
			<div class="card-body row">
            <div class="form-group col-lg-4 col-sm-12 lead_videographer bmd-form-group" style="">
                <label for="lead_videographer" class="">Name of lead videographer</label>
                <input type="text" class="form-control" name="name_videographer[`+incr+`]" id="lead_videographer">
            </div>
			<div class="form-group col-lg-4 col-sm-12 lead_videographer bmd-form-group" style="">
                <label for="lead_videographer" class="">Email of lead videographer</label>
                <input type="email" class="form-control" name="videographer_email[`+incr+`]" id="lead_videographer">
            </div>
			<div class="form-group col-lg-4 col-sm-12 lead_videographer bmd-form-group" style="">
                <label for="lead_videographer" class="">Mobile of lead videographer</label>
                <input type="text" class="form-control" name="videographer_phone[`+incr+`]" id="lead_videographer">
            </div>
			</div>
            <!-- // Visual Media & Radio Starting // -->
            <!-- // Media Link Section // -->
            <div class="media-link-only form-group p-3 row mt-4 mb-4 h-100 justify-content-center align-items-center">
                <div class="col-lg-12 col-sm-12 uploadLink">
                    <div class="media-link card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="card-body">
                            <h3 class="text-muted text-center">Media file link</h3>
                            <div class="form-group bmd-form-group">
                                <label for="media_link" class="">Paste your
                                    online link (including http://)</label>
                                <input type="url" class="form-control" name="linkVisualOrRadio[`+incr+`]" id="media_link" required>
                                <span class="bmd-help text-wrap">The link should have at least 3
                                    months of validity.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Visual Media & Radio End // -->
        `;

        radio = `
            <!-- // Visual Media & Radio Starting // -->
            <!-- // Media Link Section // -->
            <div class="media-link-only form-group p-3 row mt-4 mb-4 h-100 justify-content-center align-items-center">
                <div class="col-lg-12 col-sm-12 uploadLink">
                    <div class="media-link card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="card-body">
                            <h3 class="text-muted text-center">Media file link</h3>
                            <div class="form-group bmd-form-group">
                                <label for="media_link" class="">Paste your
                                    online link (including http://)</label>
                                <input type="url" class="form-control" name="linkVisualOrRadio[`+incr+`]" id="media_link" required>
                                <span class="bmd-help text-wrap">The link should have at least 3
                                    months of validity.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Visual Media & Radio End // -->
        `;

        news_photography = `
        <!-- // News Photography Starting // -->
            <!-- // News Photography Media Start // -->
            <div class="media-and-link media-link-news-block-`+(cs != undefined ? cs : submissions)+` form-group p-3 row mt-4 mb-4 h-100 justify-content-center align-items-center">
                <div class="col-lg-5 col-sm-12 uploadFile">
                    <div class="card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="holder">
                            <div class="media card-body text-center">

                                <label class="image-upload-box image-upload-box-n1-`+(cs != undefined ? cs : submissions)+`">
                                    <div class="btn btn-raised btn-info btn-block file-upload-label">Upload scan copy *</div>
                                    <input type="file" class="d-none" name="fileNewsPhotography_1[]" accept=".jpg, .jpeg" id="file-upload-news-1-`+(cs != undefined ? cs : submissions)+`" onchange="readURL(this, '.image-upload-box-n1-`+submissions+`');" required>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 text-center mt-3 text-muted dividerOr">
                    <h5 class="align-middle float-middle">and</h5>
                </div>
                <div class="col-lg-5 col-sm-12 uploadFile">
                    <div class="card">
                        <button type="button" class="close media-close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media card-body text-center">

                            <label class="image-upload-box image-upload-box-n2-`+(cs != undefined ? cs : submissions)+`">
                                <div class="btn btn-raised btn-info btn-block file-upload-label">Upload high resolution photo *</div>
                                <input type="file" name="fileNewsPhotography_2[]" accept=".jpg, .jpeg" id="file-upload-news-2-`+(cs != undefined ? cs : submissions)+`" style="display:none !important;" onchange="readURL(this, '.image-upload-box-n2-`+submissions+`');" required>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        `;

            switch (c) {
                case 1:
                media_form = print_online;
                break;

                case 2:
                media_form = visual_media;
                break;

                case 3:
                media_form = radio;
                break;

                case 4:
                media_form = news_photography;
                break;

                default:
                media_form = print_online;
            }

            remove_button = r ? `<button type="button" class="btn btn-raised btn-danger float-right remove-media-form" onclick="removeMediaForm(`+(cs != undefined ? cs : submissions)+`);">Remove Submission - `+(cs != undefined ? cs : submissions)+`</button>` : '';

            template = `
            <div class="remove-media-form-`+(cs != undefined ? cs : submissions)+`">
                <div class="form-section card mediaDiv mb-2">
                <div id="collapse-card" class="card-heading" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseOne">
                    <span class="text-white form-section-header">Submission details - `+(cs != undefined ? cs : submissions)+` `+remove_button+`</span>
                </div>
                <div class="collapse show">
                    <div class="mymedia">
                        <!-- // Form Starting // -->
                        <div class="card-body row">
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group">
                                <label for="submission_title" class="">Name of submission *</label>
                                <input type="text" class="form-control" name="title[`+incr+`]" id="submission_title" required="true">
                                <span class="bmd-help">Title of your publication</span>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group">
                                <label for="publish_media" class="">Name of
                                    published/broadcast media *</label>
                                <input type="text" class="form-control" name="publisher_name[`+incr+`]" id="publish_media" required="true">
                            </div>
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group is-filled">
                                <label for="dateofpublish" class="">Date of
                                    published/broadcast *</label>
                                <input type="date" value="" class="form-control" name="date_publishment[`+incr+`]" id="dateofpublish" required="true">
                            </div>
                            <div class="form-group col-lg-12 col-sm-12 lead_videographer bmd-form-group" style="display: none;">
                                <label for="lead_videographer" class="">Name of lead
                                    videographer</label>
                                <input type="text" class="form-control" name="name_videographer[`+incr+`]" id="lead_videographer">
                            </div>
                        </div>
                        <!-- // Form Starting End // -->
                        `+ media_form +`
                        <!-- // News Photography Media End // -->
                        <!-- // News Photography End // -->
                        <!-- // Referance Contact // -->
                        <div class="ref-contact row p-1 m-3 border border-link">
                            <h3 class="text-muted mt-1 mb-3 p-3 col-12">
                                Contact detail for certifying the validity/authenticity of the submission
                            </h3>
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group">
                                <label for="ref-name" class="">Name *</label>
                                <input type="text" class="form-control" name="representative_name[`+incr+`]" id="ref-name" required="true">
                            </div>
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group">
                                <label for="ref-designation" class="">Designation *</label>
                                <input type="text" class="form-control" name="representative_designation[`+incr+`]" id="ref-designation" required="true">
                            </div>
                            <div class="form-group col-lg-4 col-sm-12 bmd-form-group">
                                <label for="ref-organization" class="">Name of organization *</label>
                                <input type="text" class="form-control" name="representative_organization[`+incr+`]" id="ref-organization" required="true">
                            </div>
                            <div class="form-group col-lg-6 col-sm-12 bmd-form-group">
                                <label for="ref-number" class="">Mobile number</label>
                                <input type="tel" class="form-control" name="representative_phone[]" id="ref-number">
                            </div>
                            <div class="form-group col-lg-6 col-sm-12 bmd-form-group">
                                <label for="ref-email" class="">E-mail</label>
                                <input type="email" class="form-control" name="representative_email[]" id="ref-email">
                            </div>
                        </div>
                        <!-- // Referance Contact End // -->
                        <!-- // Media Types Start // -->
                        <!-- // Media Types Start // -->
                        <div class="form-group p-3 h-100 justify-content-center align-items-center checkboxes-`+submissions+` required">
                            <label class="col-lg-3 col-xs-12">
                            Type of media:
                            </label>
                            <div class="col-lg-12 col-xs-12">
                                <div class="check row p-3">

									@foreach(App\Models\MediaType::all() as $key => $mediaType)

									<div class="col-xs-12 col-lg-3">
                                        <div class="col-xs-6">
                                            <label class="form-radio col-xs-6 btn btn-secondary">
                                                <input type="checkbox" name="media_type_id[]" value="{{ $mediaType->id }}" class="checkbox-{{$key}}" onchange="removeCheckedBoxes('.checkbox-{{$key}}', '.checkboxes-`+ submissions + `');"> {{ $mediaType->name }}
                                            </label>
                                        </div>
                                    </div>

									@endforeach

								</div>
							</div>
                        </div>
                        <!-- // Media Types End // -->

                        <!-- // Media Types End // -->
                    </div>
                </div> <!-- // End of Collapse Div //-->
        </div>
        </div>
        `;

        return template;
        }

        function removeMediaForm(media) {
            if (media == 2) {
                removed_second = true;
            } else {
                removed_second = false;
            }

            $('.remove-media-form-' + media).remove();
            submissions--;
            $('#addMoreSubmission2').show();
        }

        function readURL(input, output) {
            //console.log(input.name);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    //console.log(e.target.result)
                    //$(output).attr('src', e.target.result);
                    $(output).css({
                        'background': 'url('+e.target.result+')',
                        'background-size': 'cover',
                        'background-position': 'center center'
                    });

                    //console.log($(output).parents('.form-group'));
                    if (input.name.match(/fileNewsPhotography/g)) {
                        if (input.name.match(/fileNewsPhotography_1/g)) {
                            second_id = input.id.replace('1', '2');
                            //console.log($('#' + second_id).val());
                            if ($('#' + second_id).val() != '') {
                                $(output).parents('.form-group').removeClass('has-error-media').children('.error-msg').remove();

                            }
                        } else {
                            second_id = input.id.replace('2', '1');
                            //console.log($('#' + second_id).val());
                            if ($('#' + second_id).val() != '') {
                                $(output).parents('.form-group').removeClass('has-error-media').children('.error-msg').remove();

                            }
                        }
                    } else {
                        $(output).parents('.form-group').removeClass('has-error-media').children('.error-msg').remove();

                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeCheckedBoxes(check, holder)
        {
            //console.log(holder);

            if (holder == '.age-group' || holder == '.appl-group') {
                if (holder == '.age-group') {
                    removeError('.age-group', '.age-error');
                } else {
                    removeError('.appl-group', '.appl-error');
                }
            }

            $(holder + ' input[type=checkbox]').prop('checked', false);
            $(holder + ' ' + check).prop('checked', true);
        }

        function removeError(selector, error) {
            $(error).addClass('d-none');
            $(selector).removeClass('has-error-media');
        }



        $(function () {
            $(".se-pre-con").hide();
        });

        $('.submit-btn').click(function () {
            file_upload = $("#file-upload-print-1");
            link_upload = $("#media_link_print-1");

            file_upload2 = $("#file-upload-print-2");
            link_upload2= $("#media_link_print-2");

            file_upload3 = $("#file-upload-print-3");
            link_upload3 = $("#media_link_print-3");

            file_upload_news = $("#file-upload-news-1-1");
            link_upload_news = $("#file-upload-news-2-1");

            file_upload2_news = $("#file-upload-news-1-2");
            link_upload2_news = $("#file-upload-news-2-2");

            file_upload3_news = $("#file-upload-news-1-3");
            link_upload3_news = $("#file-upload-news-2-3");

            age_checkbox1 = $(".age-group #option1");
            age_checkbox2 = $(".age-group #option2");

            if (age_checkbox1.prop('checked') === false && age_checkbox2.prop('checked') === false) {
                //alert('bla');
                $('.age-group').addClass('has-error-media');
                $('.age-error').removeClass('d-none').html('<span class="pb-2 d-block text-danger">Please select an age group!</span>');
            }

            appl_checkbox1 = $(".appl-group #option1");
            appl_checkbox2 = $(".appl-group #option2");

            if (appl_checkbox1.prop('checked') === false && appl_checkbox2.prop('checked') === false) {
                //alert('bla');
                $('.appl-group').addClass('has-error-media');
                $('.appl-error').removeClass('d-none').html('<span class="pb-2 d-block text-danger">Please select an application type!</span>');
            }

            file_upload_media_link_error = `
            <div class="col-12 mt-3 error-msg">
                <span class="text-danger">Please upload scan copy or paste your online media link!</span>
            </div>
            `;

            file_upload_media_link_error_news = `
            <div class="col-12 mt-3 error-msg">
                <span class="text-danger">Both scan copy and high resolution photo is required</span>
            </div>
            `;

            if (file_upload.val() == '' && link_upload.val() == '') {

                $('.media-link-block-1').addClass('has-error-media');

                if ($('.media-link-block-1 .error-msg').length == 0) {
                    $('.media-link-block-1').append(file_upload_media_link_error);
                }

            }

            if (file_upload2.val() == '' && link_upload2.val() == '') {
                $('.media-link-block-2').addClass('has-error-media');
                if ($('.media-link-block-2 .error-msg').length == 0) {
                    $('.media-link-block-2').append(file_upload_media_link_error);
                }
            }

            if (file_upload3.val() == '' && link_upload3.val() == '') {
                $('.media-link-block-3').addClass('has-error-media');
                if ($('.media-link-block-3 .error-msg').length == 0) {
                    $('.media-link-block-3').append(file_upload_media_link_error);
                }
            }

            if (file_upload_news.val() == '' || link_upload_news.val() == '') {

                $('.media-link-news-block-1').addClass('has-error-media');
                if ($('.media-link-news-block-1 .error-msg').length == 0) {
                    $('.media-link-news-block-1').append(file_upload_media_link_error_news);
                }
            }

            if (file_upload2_news.val() == '' || link_upload2_news.val() == '') {
                $('.media-link-news-block-2').addClass('has-error-media');
                if ($('.media-link-news-block-2 .error-msg').length == 0) {
                    $('.media-link-news-block-2').append(file_upload_media_link_error_news);
                }
            }

            if (file_upload3_news.val() == '' || link_upload3_news.val() == '') {
                $('.media-link-news-block-3').addClass('has-error-media');
                if ($('.media-link-news-block-3 .error-msg').length == 0) {
                    $('.media-link-news-block-3').append(file_upload_media_link_error_news);
                }
            }

            if (checkInputs()) {
                $(".se-pre-con").show();
            }
        });

        function checkInputs() {
        var isValid = true;
            $('#submit-form input').filter('[required]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false;
                }
            });

            return isValid;
        }

        $().ready(function() {

            $('#contact-form').validate({
                errorElement: "span",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "mt-1 d-block text-danger" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error-contact" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error-contact" );
				}
            });

            $('#submit-form').validate({
                rules : {
                    phone : {
                        required: true,
                        minlength: 11,
                        maxlength: 11,
                        number: true
                    },
					category_id : {
						required: true,
						number: true,
					}
                },
                messages : {
                    phone: 'Mobile number must be 11 characters!',
                    birth_date: 'Please input a valid date!',
					category_id : 'Please select a category!',
					'date_publishment[0]' : 'Please input a valid date!',
					'date_publishment[1]' : 'Please input a valid date!',
					'date_publishment[2]' : 'Please input a valid date!',
                },
                errorElement: "span",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "mt-1 d-block text-danger" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
                    //console.log(element.name);
                    if (element.name.match(/linkPrintOnlineMedia/g) || element.name.match(/filePrintOnlineMedia/g)) {
                        //$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );

                    } else if (element.name == 'category_id') {
						$( element ).parents( ".form-group" ).addClass( "has-error-media" ).removeClass( "has-success" );
					}
					else {

                        if (element.name.match(/linkVisualOrRadio/g)) {
                            $( element ).parents( ".media-link-only" ).addClass( "has-error" ).removeClass( "has-success" );

                        } else {
                            $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );

                        }

                    }
				},
				unhighlight: function (element, errorClass, validClass) {
                    if (element.name.match(/linkPrintOnlineMedia/g) || element.name.match(/filePrintOnlineMedia/g)) {
                        if (element.value != '') {
                            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error-media" );
                            $( element ).parents( ".form-group" ).children('.error-msg').remove();
                        }
                    } else if (element.name == 'category_id') {
						$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error-media" );
					}
					else {
                        if (element.name.match(/linkVisualOrRadio/g)) {
                            $( element ).parents( ".media-link-only" ).addClass( "has-success" ).removeClass( "has-error" );

                        } else {
                            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );

                        }

                    }
				}
            });
        });

</script>

</html>
