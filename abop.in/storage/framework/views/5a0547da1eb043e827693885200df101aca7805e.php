<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="" dir="<?php echo e(Helper::getTextDirection()); ?>">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if(trim($__env->yieldContent('title'))): ?>
		<title><?php echo $__env->yieldContent('title'); ?></title>
	<?php else: ?> 
		<title><?php echo e(config('app.name')); ?></title>
	<?php endif; ?>
	<meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="<?php echo e(asset(Helper::getSiteFavicon())); ?>" type="image/x-icon">
	<?php echo $__env->yieldPushContent('PackageStyle'); ?>
	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/normalize-min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/scrollbar-min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/fontawesome/fontawesome-all.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/themify-icons.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/jquery-ui-min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/linearicons.css')); ?>" rel="stylesheet">
	<?php echo $__env->yieldPushContent('sliderStyle'); ?>
	<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
	<?php if(Helper::getTextDirection() == 'rtl'): ?>
		<link href="<?php echo e(asset('css/rtl.css')); ?>" rel="stylesheet">
	<?php endif; ?>
	<link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet">

	<link href="<?php echo e(asset('css/color.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/maintwo.css')); ?>" rel="stylesheet">
	<?php echo \App\Typo::setSiteStyling(); ?>
    <link href="<?php echo e(asset('css/transitions.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/customAbop.css')); ?>" rel="stylesheet">
	<?php echo $__env->yieldPushContent('stylesheets'); ?>
	<script type="text/javascript">
		var APP_URL = <?php echo json_encode(url('/')); ?>

		var readmore_trans = <?php echo json_encode(trans('lang.read_more')); ?>

		var less_trans = <?php echo json_encode(trans('lang.less')); ?>

		var Map_key = <?php echo json_encode(Helper::getGoogleMapApiKey()); ?>

		var APP_DIRECTION = <?php echo json_encode(Helper::getTextDirection()); ?>

	</script>
	<?php if(Auth::user()): ?>
		<script type="text/javascript">
			var USERID = <?php echo json_encode(Auth::user()->id); ?>

			window.Laravel = <?php echo json_encode([
			'csrfToken'=> csrf_token(),
			'user'=> [
				'authenticated' => auth()->check(),
				'id' => auth()->check() ? auth()->user()->id : null,
				'name' => auth()->check() ? auth()->user()->first_name : null,
				'image' => !empty(auth()->user()->profile->avater) ? asset('uploads/users/'.auth()->user()->id .'/'.auth()->user()->profile->avater) : asset('images/user-login.png'),
				'image_name' => !empty(auth()->user()->profile->avater) ? auth()->user()->profile->avater : '',
				]
				]); ?>;
		</script>
	<?php endif; ?>
	<script>
		window.trans = <?php
		$lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
		$trans = [];
		foreach ($lang_files as $f) {
			$filename = pathinfo($f)['filename'];
			$trans[$filename] = trans($filename);
		}
		echo json_encode($trans);
		?>;
	</script>
	<style type="text/css">
    .help-block{
      color: red;
    }
		.hide{
        display: none;
    }
	</style>
  <?php if(auth()->guard()->guest()): ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" integrity="sha512-YDChav1pUAodyH1Ja7PIpEDUOoFROpZi5Lb7pY8+9+kU8UTr3J8SI8QO7SRuf4qdDKb5OI0xSt4Vk1wiYjBXgw==" crossorigin="anonymous" />
  <?php endif; ?>
</head>

<body class="wt-login <?php echo e(Helper::getBodyLangClass()); ?> <?php echo e(Helper::getTextDirection()); ?> <?php echo e(empty(Request::segment(1)) ? 'home-wrapper' : ''); ?>">
<!-- Facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=921171148289252&autoLogAppEvents=1" nonce="HG0ASjm3"></script>
<!-- Facebook -->
<script omitscript="true" src="https://www.instagram.com/static/bundles/metro/EmbedSDK.js/33cd2c5d5d59.js?fbclid=IwAR3dd3O3rJX4Lk44ZchfR2QjYNTEMOzINICxWshUzTnxQsq6FQH0CF8jFMA"></script>
	<div id="sign-in-button"></div>
	<?php echo e(\App::setLocale(env('APP_LANG'))); ?>

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<?php
		$general_settings = !empty(App\SiteManagement::getMetaValue('settings')) ? App\SiteManagement::getMetaValue('settings') : array();
		$enable_loader = !empty($general_settings) && !empty($general_settings[0]['enable_loader']) ? $general_settings[0]['enable_loader'] : true;
	?>
	<?php if(!empty($enable_loader) && ($enable_loader === true || $enable_loader === 'true')): ?>
		<div class="preloader-outer">
			<div class="preloader-holder">
				<div class="loader"></div>
			</div>
		</div>
	<?php endif; ?>
	<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
		<div class="wt-contentwrapper">
			<?php echo $__env->yieldContent('header'); ?>
			<?php echo $__env->yieldContent('slider'); ?>
			<?php echo $__env->yieldContent('main'); ?>
			<?php echo $__env->yieldContent('footer'); ?>

<?php

$categories2 = \App\Category::pluck('title', 'id');
$job_duration = \App\Helper::getJobDurationList(); 
?>
<!-- Post request modal starts -->
<div class="modal fade bd-request-modal-lg" id="bd-request-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div style="padding: 2pc;" class="modal-content formData ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Post a Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" autocomplete="off" id="postRequest" class="postRequest" action="javascript:void(0)" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
            <!-- <fieldset class="wt-registerformgroup"> -->
                <div class="wt-haslayout reqlq2 hide">
                  <div class="wt-registerhead">
                        <div class="wt-title">
                            <h3>Join For a Good Start</h3>
                        </div>
                        <div class="wt-description">
                            <p>Confirm your mobile number with entering the secret code from message.</p>
                        </div>

                        <div class="form-group ">
                          <input type="text" name="otpFormPost" id="otpFormPost" class="otpFormPost form-control" required="required" autofocus="autofocus" placeholder="Enter Otp">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="wt-btn ">Confirm & Post Job</button>
                            <button class="wt-btn changeNumberWhilePost">Change Number</button>
                        </div>
                    </div>
                </div>
                <div class="wt-haslayout reqlq1">
                    <?php if(!\Auth::check()): ?>
                    <div class="form-group ">
                          <input type="text" name="phoneNumberPost" id="phoneNumberPost" class="phoneNumberPost form-control" required="required" autofocus="autofocus" placeholder="ENTER MOBILE NUMBER WITH COUNTRY CODE 919876543210">
                    </div>
                    <div class="form-group ">
                          <input type="text" name="address" id="address" class="address form-control" required="required" autofocus="autofocus" placeholder="ENTER FULL ADDRESS">
                    </div>
                    <?php endif; ?>
                    <div class="form-group form-group-half">
                        <input type="text" name="title" required="required" autocomplete="off" id="title" class="form-control" placeholder="ENTER TITLE">
                    </div>
                    <div class="form-group form-group-half">
                        <input type="number" name="price" required="required" autocomplete="off" id="price" class="form-control" placeholder="ENTER PRICE">
                    </div>
                    <div class="form-group form-group-half wt-formwithlabel">
                      <span class="wt-select">
                        <?php echo Form::select('job_duration', $job_duration, null, array('class' => 'form-control', 'placeholder' => trans('lang.select_job_duration'))); ?>

                      </span>
                    </div>
                    <div class="form-group form-group-half wt-formwithlabel">
                      <span class="wt-select">
                        <?php echo Form::select('categories[]', $categories2, array('class' => 'form-control', 'placeholder' => trans('lang.select_job_cats'))); ?>

                      </span>
                    </div>
                    <div class="form-group wt-jobdetails wt-tabsinfo">
                        <div class="wt-tabscontenttitle">
                            <h4>Details</h4>
                        </div>
                        <div class="wt-formtheme wt-userform wt-userformvtwo">
                            <?php echo Form::textarea('description', null, ['class' => 'form-control wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_dtl_note')]); ?>

                        </div>
                    </div>
                    <!-- <div class="wt-attachmentsholder">
                        <div class="lara-attachment-files">
                            <div class="wt-tabscontenttitle">
                                <h2><?php echo e(trans('lang.attachments')); ?></h2>
                            </div>
                            <div class="form-group input-preview">
                                <ul class="wt-attachfile dropzone-previews">

                                </ul>
                            </div>
                        </div>
                        <div class="multile-file-attachments wt-haslayout">
                          <div id="upload" class="vue-dropzone dropzone dz-clickable">
                            <div class="dz-message">
                              <div class="form-group form-group-label">
                                <div class="wt-labelgroup">
                                  <label  for="file">
                                    <span  class="wt-btn">Select Files</span>
                                  </label> 
                                  <span >Drop files here to upload</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div> -->
                    <div class="wt-checkboxholder">
                        <span class="wt-checkbox">
                            <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                            <label for="termsconditions"><span>Terms & Conditions</span></label>
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="wt-btn submitRegisterButton">Submit</button>
                    </div>
                </div>
            <!-- </fieldset> -->
            </form>
        </div>
    </div>
  </div>
</div>
<!-- Post request modal ends -->


<?php if(auth()->guard()->guest()): ?>
<div class="modal fade bd-register-modal-lg" id="bd-register-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div style="padding: 2pc;" class="modal-content formData ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register Yourself as a Client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" autocomplete="off" id="registeryourself" class="registeryourself" action="javascript:void(0)" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
            <!-- <fieldset class="wt-registerformgroup"> -->
                <div class="wt-haslayout layout2forreg hide" >
                  <div class="wt-registerhead">
                        <div class="wt-title">
                            <h3>Join For a Good Start</h3>
                        </div>
                        <div class="wt-description">
                            <p>Confirm your mobile number with entering the secret code from message.</p>
                        </div>

                        <div class="form-group ">
                          <input type="text" name="confirmOtpwhileReg" id="confirmOtpwhileReg" class="confirmOtpwhileReg form-control" required="required" autofocus="autofocus" placeholder="Enter Otp">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="wt-btn ">Confirm & Register</button>
                            <button class="wt-btn changeNumberWhileReg">Change Number</button>
                        </div>
                    </div>
                </div>
                <div class="wt-haslayout layout1forreg">
                    <div class="wt-registerhead">
                        <div class="wt-title">
                            <h3>Join For a Good Start</h3>
                        </div>
                        <div class="wt-description">
                            <p>Join as a Client</p>
                        </div>
                    </div>
                    <div class="form-group form-group-half">
                        <input type="text" name="first_name" required="required" autocomplete="off" id="regfirst_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_first_name')); ?>">
                    </div>
                    <div class="form-group form-group-half">
                        <input type="text" name="last_name" autocomplete="off" id="reglast_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_last_name')); ?>">
                    </div>
                    <div class="form-group ">
                        <input id="reguser_email" type="email" autocomplete="off" class="form-control" name="email" placeholder="<?php echo e(trans('lang.ph_email')); ?> (optional)" value="<?php echo e(old('email')); ?>">
                    </div>

                    <div class="form-group ">
                        <input id="regmobile_number" type="text" autocomplete="off" class="form-control modalPhoneNumber" name="mobile_number" placeholder="919876543210" value="91" data-filter='(\+|(\+[1-9])?[0-9]*)'>
                    </div>

                    <div class="form-group form-group-half">
	                    <input id="password" type="password" autocomplete="off" class="form-control" name="password" placeholder="<?php echo e(trans('lang.ph_pass')); ?>">
	                </div>
	                <div class="form-group form-group-half">
	                    <input id="password-confirm" type="password" autocomplete="off" class="form-control" name="confirmPassword" placeholder="<?php echo e(trans('lang.ph_retry_pass')); ?>" >
	                </div>

                    <div class="wt-checkboxholder">
                        <span class="wt-checkbox">
                            <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                            <label for="termsconditions"><span>Terms & Conditions</span></label>
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="wt-btn submitRegisterButton"><?php echo e(trans('lang.btn_startnow')); ?></button>
                    </div>
                </div>
            <!-- </fieldset> -->
            </form>
        </div>
    </div>
  </div>
</div>

<?php endif; ?>


		</div>
	</div>
	<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
	<script type="text/javascript">
		var role = '<?php @$user = auth()->user(); print_r(@$user["roles"][0]["name"]); ?>';
		if(role == 'admin')
        {
          var varFreelancerUrl = '/admin/upload-temp-image';
        }
        else
        {
          var varFreelancerUrl = '/boutique/upload-temp-image';
        }
	</script>

<?php if(isset($id) && !empty($id)): ?>
<script type="text/javascript">
	var editUserId = "<?php echo e($id); ?>";
</script>
<?php else: ?>
<script type="text/javascript">
	var editUserId = "";
</script>
<?php endif; ?>
	<script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
	<?php echo $__env->yieldContent('bootstrap_script'); ?>
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('js/vendor/jquery-library.js')); ?>"></script>
	<script src="<?php echo e(asset('js/scrollbar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/particles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui-min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
      <script type="text/javascript">
    $('body').on('click','.wt-skillsaddinfo',function(e){
    //$('.wt-skillsaddinfo').on('click',function(e){
      //e.preventDefault();
      var targetToshow = $(this).attr('data-target');
      //alert(targetToshow);
      $(this).parent('.wt-rightarea').parent('.wt-accordioninnertitle').next(targetToshow).toggle();
    })
  </script>
    <script>
        jQuery(window).load(function () {
            jQuery(".preloader-outer").delay(500).fadeOut();
            jQuery(".pins").delay(500).fadeOut("slow");
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" integrity="sha512-Vp2UimVVK8kNOjXqqj/B0Fyo96SDPj9OCSm1vmYSrLYF3mwIOBXh/yRZDVKo8NemQn1GUjjK0vFJuCSCkYai/A==" crossorigin="anonymous"></script>
    <?php if(auth()->guard()->guest()): ?>

<!-- For Firebase integration and login with phone number -->
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.22.0/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/7.22.0/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.22.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.22.0/firebase-firestore.js"></script>
  <script type="text/javascript">
$(function(){      

      country_codes=['91', '44', '1'];

      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      // var firebaseConfig = {
      //   apiKey: "AIzaSyDZaGFsIwyk-li8iR7Xsjr3HMhtNN8Uhfc",
      //   authDomain: "abop-6fe47.firebaseapp.com",
      //   databaseURL: "https://abop-6fe47.firebaseio.com",
      //   projectId: "abop-6fe47",
      //   storageBucket: "abop-6fe47.appspot.com",
      //   messagingSenderId: "1057009016029",
      //   appId: "1:1057009016029:web:6f1100955cbc024a5b0f34",
      //   measurementId: "G-BFPEC2VTJJ"
      // };
      var firebaseConfig = {
        apiKey: "AIzaSyDh3bi9CV1qUHSbiXeuogMZvxG_YltoY6E",
        authDomain: "abop-293110.firebaseapp.com",
        databaseURL: "https://abop-293110.firebaseio.com",
        projectId: "abop-293110",
        storageBucket: "abop-293110.appspot.com",
        messagingSenderId: "928328661614",
        appId: "1:928328661614:web:ebcb03ed225f346db0447f"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();

      var recaptchaVerifier;
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
        'size': 'invisible',
      });
      var chkphone;
        
        $('.loginViaMobileBtn').on('click',function(e){
            e.preventDefault();
            $('.mainLoginDiv').addClass('hide');
            $('.mainphoneLoginDiv').removeClass('hide');
        })

        $('.loginViaEmailBtn').on('click',function(e){
            e.preventDefault();
            $('.mainLoginDiv').removeClass('hide');
            $('.mainphoneLoginDiv').addClass('hide');
        })

        $('.changeNumber').on('click',function(e){
            e.preventDefault();
            $('.otpDiv').addClass('hide');
            $('.mobilenumberDiv').removeClass('hide');
            $('.inputnumber').val('');
        })
        // When clicks on send otp button it send sms to user which conatins secure code
        $('.otpsendbtn').on('click',function(e){
            if ($('.inputnumber').val() != '') {
                /*var phoneavv = 1;
                var phoneAvail = $('.inputnumber').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'GET',
                    url: "<?php echo e(url('/available/phone_numer')); ?>",
                    data:{phoneAvail:phoneAvail},
                    success:function(data){
                      phoneavv = 0;
                      //console.log(data);
                      // Check if entered number is available for register or not
                      if (data.error == 'false') {
                        phoneavv = 0;
                        // Show Error when number is not available
                        alert('Mobile Number not found!')
                        return false;
                      }

                    },error: function(data){
                      phoneavv = 0;
                        alert('error in request');
                        return false;
                       //console.log(data);
                    }
                }); 

                if (phoneavv == 0) {
                  return false;
                }
  */
                var chkphone = $('.inputnumber').val();
                var phoneNumber = '+'+chkphone;

                is_valid_number = country_codes.some(elem => chkphone.match('^' + elem));

                ///console.log(is_valid_number);
                //return false;

                if (is_valid_number == true) {
                  jQuery(".preloader-outer").show();
                    //var phoneNumber = $('.inputnumber').val();
                    var appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(phoneNumber,appVerifier)
                        .then(function (confirmationResult) {
                          // SMS sent. Prompt user to type the code from the message, then sign the
                          // user in with confirmationResult.confirm(code).
                          //console.log(confirmationResult);
                          $('.mobilenumberDiv').addClass('hide');
                          $('.otpsendbtn').addClass('hide');
                          $('.otpDiv').removeClass('hide');
                          $('.otploginbtn').removeClass('hide');
                          $('.disNumber').text(phoneNumber);
                          window.confirmationResult = confirmationResult;
                          jQuery(".preloader-outer").hide();
                        }).catch(function (error) {
                            //console.log(error.code);
                            alert('Enter Valid Number!');
                            jQuery(".preloader-outer").hide();
                          // Error; SMS not sent
                          // ...
                        });
                }else{
                  alert('Enter Valid Number!');
                  jQuery(".preloader-outer").hide();
                }

            }else{
                alert('Enter Valid Number!');
                jQuery(".preloader-outer").hide();
                //return false;
            }
        })
        // When otp enters and click on confirm and login button this function runs.
        $('.otploginbtn').on('click',function(e){
            var otp = $('#otp').val();
            if (otp!='') {
            	jQuery(".preloader-outer").show();
                var code = otp;
                confirmationResult.confirm(code).then(function (result) {
                    //console.log(result);
                    //console.log(1);
                  // User signed in successfully.
                  //var user = result.user;
                  //console.log(result.user);
                  //console.log(result.user.phoneNumber);
                  var confirmedPhoneNumber = result.user.phoneNumber.replace('+', '');
                  //var confirmedPhoneNumber = chkphone;
                  //console.log(confirmedPhoneNumber);
                    $.ajaxSetup({
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'POST',
                        url: "<?php echo e(url('/phoneLogin')); ?>",
                        data:{confirmedPhoneNumber:confirmedPhoneNumber},
                        success:function(data){
                            if (data.type == 'success') {
                                
                                window.location.reload();
                            }else{

                            }
                            //console.log(data);
                            

                        },error: function(data){
                            alert('error in request');
                           //console.log(data);
                        }
                    }); 
                  //console.log(user);
                  //alert('login');
                  jQuery(".preloader-outer").hide();
                  firebase.auth().signOut();

                  //return false;
                  // ...
                }).catch(function (error) {
                    //console.log(error);
                    alert('Bad Verification Code!');
                    jQuery(".preloader-outer").hide();
                    //return false;
                  // User couldn't sign in (bad verification code?)
                  // ...
                });
            }else {

            }
        })
      })
  </script>
  <script type="text/javascript">

    // This function to check whether eneterd mobile number is available for register or not
    $('#regmobile_number').on('input',function(e){
      e.preventDefault();
      that = $(this);
      if ($(this).val() != '') {
        var phoneAvail = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET',
            url: "<?php echo e(url('/available/phone_numer')); ?>",
            data:{phoneAvail:phoneAvail},
            success:function(data){
              //console.log(data);
              // Check if entered number is available for register or not
              if (data.error == 'true') {
                
                // Show Error when number is not available
                that.next('i').next('small').show();
                that.next('i').next('small').text('This phone number is not available! Please try with another');
                $('.submitRegisterButton').attr('disabled',true);
              }else{
                // Hide error when number is available
                that.next('i').next('small').hide();
                that.next('i').next('small').text('The Mobile Number is required with country code and cannot be empty');
                $('.submitRegisterButton').attr('disabled',false);
                //console.log('yes');
              }


            },error: function(data){
                alert('error in request');
               //console.log(data);
            }
        }); 
      }
    })
  </script>

<script>
$(document).ready(function() {
    $('#registeryourself').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                message: 'The First Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The First Name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The First Name can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The First Name and password cannot be the same as each other'
                    }
                }
            },
            last_name: {
                message: 'The Last Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The Last Name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The Last Name can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The Last Name and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    // notEmpty: {
                    //     message: 'The email address is required and cannot be empty'
                    // },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            mobile_number: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile Number is required with country code and cannot be empty'
                    },
                    integer: {
                        message: 'The value is not an Number'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            // birthday: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The date of birth is required'
            //         },
            //         date: {
            //             format: 'YYYY/MM/DD',
            //             message: 'The date of birth is not valid'
            //         }
            //     }
            // },
            confirmOtpwhileReg: {
                validators: {
                    notEmpty: {
                        message: 'Otp is required'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
            // Prevent submit form
            e.preventDefault();

            var $form     = $(e.target),
                validator = $form.data('bootstrapValidator');
            

            // Send Otp for confirming phone number
            if($('.confirmOtpwhileReg').val() != ''){
              // Confirm otp code
              jQuery(".preloader-outer").show();
              var otp = $('.confirmOtpwhileReg').val();
              var code = otp;

              confirmationResult.confirm(code).then(function (result) {
                // User signed in successfully.
                var confirmedPhoneNumber = result.user.phoneNumber;
                //console.log(confirmedPhoneNumber);
                  e.preventDefault();
                  $.ajax({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type: 'POST',
                      url: "<?php echo e(route('registerAsClient')); ?>",
                      data: $('#registeryourself').serialize(),
                      success: function(result) {
                          console.log(result);
                          firebase.auth().signOut();
                          window.location.href = result.url;                          
                      },error: function (e){
                        firebase.auth().signOut();
                      }
                  });
 
                jQuery(".preloader-outer").hide();
                //firebase.auth().signOut();

              }).catch(function (error) {
                  //console.log(error);
                  alert('Bad Verification Code!');
                  jQuery(".preloader-outer").hide();
                  //return false;
                // User couldn't sign in (bad verification code?)
                // ...
              });

            }else{
              // If Otp feild is empty
              // Send otp and check number
              alert("Enter Otp and confirm for registration");

              var chkphone = $('.modalPhoneNumber').val();
              var phoneNumber = '+'+chkphone;

              is_valid_number = country_codes.some(elem => chkphone.match('^' + elem));

              ///console.log(is_valid_number);
              //return false;

              if (is_valid_number == true) {
                // Hide main Form and show otp field
                $('.layout1forreg').addClass('hide');
                $('.layout2forreg').removeClass('hide');
                // Send otp for verification
                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber,appVerifier)
                .then(function (confirmationResult) {

                  //grecaptcha.reset(window.recaptchaWidgetId);
                  // SMS sent. Prompt user to type the code from the message, then sign the
                  // user in with confirmationResult.confirm(code).
                  
                  window.confirmationResult = confirmationResult;

                  
                }).catch(function (error) {
                    //console.log(error.code);
                    //console.log(error);
                    alert('Enter Valid Number with country code! (919876543210).');
                    
                    $('.submitRegisterButton').attr('disabled',false);
                    
                  // Error; SMS not sent
                  // ...
                });

              }else{
                alert('Enter Valid Number with country code! (919876543210)');
                $('.submitRegisterButton').attr('disabled',false);
              }          
            }

              
        });

});
// If user wants to change number while registration
$('.changeNumberWhileReg').on('click',function(e){
  e.preventDefault();
  // Hide otp layout and show main form
  $('.layout1forreg').removeClass('hide');
  $('.layout2forreg').addClass('hide');

  $('.submitRegisterButton').attr('disabled',false);
})

</script>

<script type="text/javascript">
  var logcheck = 0;
</script>
<?php if(Auth::check()): ?>
<script type="text/javascript">
  var logcheck = 1;
</script>   
<?php endif; ?>
<script type="text/javascript">
  $(function(){
    //console.log(logcheck);

    $('#postRequest').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {                        
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
            job_duration: {
                validators: {
                    notEmpty: {
                        message: 'Duration is required'
                    }
                }
            },
            categories: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Details are required'
                    }
                }
            },
            price: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    }
                }
            },
            phoneNumberPost: {
                validators: {
                    notEmpty: {
                        message: 'Phone Number is required with country code'
                    },
                    integer: {
                        message: 'The value is not an Number'
                    }
                }
            },
            otpFormPost: {
                validators: {
                    notEmpty: {
                        message: 'Otp is required'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Address is required with zipcode'
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {
            // Prevent submit form
            e.preventDefault();
            var $form     = $(e.target),
                validator = $form.data('bootstrapValidator');
            if (logcheck == 1) {
              
            }else if(logcheck == 2){
              alert('You must be a client to request a job.');
              return false;
            }else{


              // Send Otp for confirming phone number
            if($('.otpFormPost').val() != ''){
              // Confirm otp code
              jQuery(".preloader-outer").show();
              var otp = $('.otpFormPost').val();
              var code = otp;

              confirmationResult.confirm(code).then(function (result) {
                // User signed in successfully.
                var confirmedPhoneNumber = result.user.phoneNumber;
                //console.log(confirmedPhoneNumber);
                  e.preventDefault();
                  $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "<?php echo e(route('postJobFromHome')); ?>",
                    data: $('#postRequest').serialize(),
                    success: function(result) {
                        console.log(result);
                        alert('Request posted successfully');
                        window.location.href = 'https://www.abop.in/employer/dashboard/manage-jobs';
                    },error: function (e){
                      
                    }
                });
 
                jQuery(".preloader-outer").hide();
                //firebase.auth().signOut();

              }).catch(function (error) {
                  //console.log(error);
                  alert('Bad Verification Code!');
                  jQuery(".preloader-outer").hide();
                  //return false;
                // User couldn't sign in (bad verification code?)
                // ...
              });

            }else{
              // If Otp feild is empty
              // Send otp and check number
              alert("Enter Otp and confirm for Posting Job");

              var chkphone = $('.phoneNumberPost').val();
              var phoneNumber = '+'+chkphone;

              is_valid_number = country_codes.some(elem => chkphone.match('^' + elem));

              ///console.log(is_valid_number);
              //return false;

              if (is_valid_number == true) {
                // Hide main Form and show otp field
                $('.reqlq1').addClass('hide');
                $('.reqlq2').removeClass('hide');
                // Send otp for verification
                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber,appVerifier)
                .then(function (confirmationResult) {

                  //grecaptcha.reset(window.recaptchaWidgetId);
                  // SMS sent. Prompt user to type the code from the message, then sign the
                  // user in with confirmationResult.confirm(code).
                  
                  window.confirmationResult = confirmationResult;

                  
                }).catch(function (error) {
                    //console.log(error.code);
                    //console.log(error);
                    alert('Enter Valid Number with country code! (919876543210).');
                    
                    $('.submitRegisterButton').attr('disabled',false);
                    
                  // Error; SMS not sent
                  // ...
                });

              }else{
                alert('Enter Valid Number with country code! (919876543210)');
                $('.submitRegisterButton').attr('disabled',false);
              }          
            }


              

            }

      });

    $('.changeNumberWhilePost').on('click',function(e){
      e.preventDefault();
      $('.reqlq1').removeClass('hide');
      $('.reqlq2').addClass('hide');
      $('.submitRegisterButton').attr('disabled',false);
    })
  })
</script>

<?php else: ?>
<script type="text/javascript">
    $(function(){
    //console.log(logcheck);

    $('#postRequest').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {                        
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },
            job_duration: {
                validators: {
                    notEmpty: {
                        message: 'Duration is required'
                    }
                }
            },
            categories: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Details are required'
                    }
                }
            },
            price: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    }
                }
            },
            phoneNumberPost: {
                validators: {
                    notEmpty: {
                        message: 'Phone Number is required with country code'
                    },
                    integer: {
                        message: 'The value is not an Number'
                    }
                }
            },
            otpFormPost: {
                validators: {
                    notEmpty: {
                        message: 'Otp is required'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Address is required with zipcode'
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {
            // Prevent submit form
            e.preventDefault();
            var $form     = $(e.target),
                validator = $form.data('bootstrapValidator');

              // Confirm otp code
              jQuery(".preloader-outer").show();
                  e.preventDefault();
                  $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "<?php echo e(route('postJobFromHome')); ?>",
                    data: $('#postRequest').serialize(),
                    success: function(result) {
                        console.log(result);
                        alert('Request posted successfully');
                        window.location.href = 'https://www.abop.in/employer/dashboard/manage-jobs';
                    },error: function (e){
                      
                    }
                });
 
                jQuery(".preloader-outer").hide();

      });

  })
</script>
<?php endif; ?>
</body>
</html>
