
<?php $__env->startPush('sliderStyle'); ?> 
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/prettyPhoto-min.css')); ?>" rel="stylesheet">
    <style type="text/css">
    
        .bg {
  /* The image used */
  background-image: url('<?php echo e(asset('/uploads/details.png')); ?>');

  /* Full height */
  height: auto; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}.column {
  float: left;
  width: 33.33%;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
.inner{
    background-color: #274E83;
    margin: 10%;
    padding: 4%;
}
.txt{
    text-align: center;
    color: #fff;
}
.cont{
    display: flex;
    padding: 3pc;
}
.paddset{
    margin-right: 20%;
    margin-left: 20%;
    min-height: 16pc;
}
.cntr>img{
    height: 5pc;
}
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
        <?php if($home == false): ?>
            <?php echo e($page['title']); ?>

        <?php else: ?> 
            <?php echo e(config('app.name')); ?> 
        <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', "$meta_desc"); ?>




<?php $__env->startSection('content'); ?>
<div class="mainacontainDiv">
  


<?php if(!empty($slider)): ?>
    <div class="owl-carousel owl-theme">
             <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <img titl="<?php echo e($slide->title); ?>" description="<?php echo e($slide->description); ?>" src="<?php echo e(asset('public/sliderImages/'.$slide->image)); ?>" style="width:100%">
                 <!-- <div class="text"></div> -->
            </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>



</div>
<?php endif; ?>
<div id="sign-in-button"></div>

<div class="innerSearchDiv">
         <div class="container">
           <div class="row justify-content-center">
              <div class="setback col-12 col-lg-10">
                 <div class="custom-bannercontent">
                    <div class="wt-bannerhead">
                       <div class="wt-title">
                          <h1 class="colorBlue"><span style="color: #1f408e" class="imgTitle"><?php echo e(@$slider[0]->title); ?></span> </h1>
                          <h4><span style="color: #1f408e" class="spandescription"><?php echo e(@$slider[0]->description); ?></span></h4>
                       </div>
                       <div class="wt-description"></div>
                    </div>
                    <form method="GET"  action="<?php echo e(URL::to('search-results')); ?>" id="main-search-form" class="wt-formtheme wt-formbanner wt-formbannertwo">
                       <fieldset>
                          <input type="hidden" name="type" value="boutique">
                          <div class="form-group">
                             <div  class="mb-4">
                                <div class="input-group input-group-sm">
                                   <input type="search" name="s" placeholder="I am Looking for" aria-label="I am Looking for" autocomplete="off" class="form-control search-field" required="required">
                                </div>
                                <!-- <div class="list-group shadow vbt-autcomplete-list" style="display: none; width: 880px;"></div> -->
                             </div>
                             <!----> 
                             <div class="wt-formoptions"><button class="wt-searchbtn customeSearch"><i class="lnr lnr-magnifier"></i></button></div>
                             <p class="text-left"><strong>Popular Searches<br>Lehnga, Saari, Patiala Suit, Muktsari Kurta Payjama, Pakistani Lehnga & more</strong></p>
                          </div>
                       </fieldset>
                    </form>
                    <!---->
                 </div>
              </div>
           </div>
        </div>
       </div>
   </div>    
<!-- <div class="2ndContainDiv" style="padding: 0px; margin: 0px; background:url('<?php echo e(asset('/uploads/workdetail.png')); ?>');background-position: center;background-size: cover;background-repeat: no-repeat;    height: 24pc;">

</div> -->
<div class="bg">
    <div class="row cont">
        <?php $__empty_1 = true; $__currentLoopData = $workdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4">
            <div class="">
                <div class="inner paddset">
                    <div class="cntr"> <img src="<?php echo e(asset('public/uploads/workdetails/'.$work->icon)); ?>" class="mx-auto d-block"> </div>
                    <div class="txt">
                        <h3 class="text-white"><?php echo e($work->title); ?></h3>
                        <p><?php echo e($work->description); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-md-4">
            <div class="">
                <div class="inner paddset">
                    <div class="cntr"> <img src="images/shopping-cart.png" class="mx-auto d-block"> </div>
                    <div class="txt">
                        <h2>ORDER ONLINE </h2>
                        <p>eLearning design and development – Our team prides itself on designing and developing interactive eLearning content to ensure the learner is motivated to throughout the learning experience.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="">
                <div class="inner paddset">
                    <div class="cntr"> <img src="images/shopping-cart.png" class="mx-auto d-block"> </div>
                    <div class="txt">
                        <h2>ORDER ONLINE </h2>
                        <p>eLearning design and development – Our team prides itself on designing and developing interactive eLearning content to ensure the learner is motivated to throughout the learning experience.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="">
                <div class="inner paddset">
                    <div class="cntr"> <img src="images/shopping-cart.png" class="mx-auto d-block"> </div>
                    <div class="txt">
                        <h2>ORDER ONLINE </h2>
                        <p>eLearning design and development – Our team prides itself on designing and developing interactive eLearning content to ensure the learner is motivated to throughout the learning experience.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

    <?php if($home == false): ?>
        <?php $breadcrumbs = Breadcrumbs::generate('showPage',$page, $slug); ?>
        <?php if(file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php'))): ?>
            <?php echo $__env->make('extend.front-end.includes.inner-banner', 
                ['title' => $page['title'], 'inner_banner' => '', 'pageType' => 'showPage', 'show_banner' => $show_banner_image]
            , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?> 
            <?php echo $__env->make('front-end.includes.inner-banner', 
                ['title' =>  $page['title'], 'inner_banner' => '', 'pageType' => 'showPage', 'show_banner' => $show_banner_image]
            , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
    <div id="pages-list">
        <?php if(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
            <?php session()->forget('error'); ?>
        <?php endif; ?>
        <?php if($home == false): ?>
            <?php if($show_banner_image == false && !empty($page['title']) && $show_title == true): ?>
                <div class="wt-innerbannercontent wt-without-banner-title">
                    <div class="wt-title">
                        <h2><?php echo e($page['title']); ?></h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($page)): ?>
            <?php if(!empty($sections)): ?>
                <show-new-page 
                :page_id="'<?php echo e($page['id']); ?>'" 
                :access_type="'<?php echo e($type); ?>'"
                :symbol="'<?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?>'"
                :auth_role="'<?php echo e(Auth::user() ? Auth::user()->getRoleNames()[0] : 'false'); ?>'"
                :slider_style= "'<?php echo e($slider_style); ?>'"
                >
                </show-new-page>
            <?php endif; ?>
            <?php if(!empty($description && $description != 'null')): ?>
                <div class="dc-contentwrappers">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                <div class="dc-howitwork-hold dc-haslayout">
                                    <div class="dc-haslayout dc-main-section">
                                        <?php echo htmlspecialchars_decode(stripslashes($description)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <?php if(file_exists(resource_path('views/extend/errors/404.blade.php'))): ?> 
                <?php echo $__env->make('extend.errors.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('errors.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php
            $page_footer = Helper::getPageFooter($page['id']);
        ?>
        
    </div>





<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/prettyPhoto-min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <?php if($page_header == 'style5'): ?>
        <?php if(empty($slider_style)): ?>
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style5')
            </script>
        <?php elseif(!empty($slider_style) && $slider_order != 0): ?>
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style5')
            </script>
        <?php endif; ?>
    <?php elseif($page_header == 'style3'): ?>
        <?php if(empty($slider_style)): ?>
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style3')
            </script>
        <?php elseif($slider_style != 'style3'): ?> 
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style3')
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($slider_style == 'style2'): ?>
        
        <?php if(isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com'): ?>
            <script>
                jQuery('.wt-logo a img').attr('src',(APP_URL+'/images/logo-white.png'));
            </script>
        <?php endif; ?>
    <?php else: ?>
    <?php endif; ?>
    <script src="<?php echo e(asset('js/tilt.jquery.js')); ?>"></script>
<script>

$(document).ready(function(){
    
    var owl = $('.owl-carousel');
    owl.owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    autoplay:true,
    autoplayTimeout:10000,
    nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    window.setInterval(function(){ 
        var des = $('.owl-stage-outer').find('.active').children('.item').children('img').attr('description');
        var title = $('.owl-stage-outer').find('.active').children('.item').children('img').attr('titl'); 
        // Change image Title after 10 seconds
        $('.imgTitle').text(title);
        // Change image description after 10 seconds
        $('.spandescription').text(des);
    },10000);

    // owl.on('change.owl.carousel', function(event) {
        
    //  console.log(event.currentTarget);
 //        var des = $('.owl-stage-outer').find('.active').children('.item').children('img').attr('description');
 //        var title = $('.owl-stage-outer').find('.active').children('.item').children('img').attr('titl'); 
 //        $('.imgTitle').text(title);
 //        $('.spandescription').text(des);


    //  var item      = event.item.index; 
    //  var element   = event.target;         // DOM element, in this example .owl-carousel
    //  var name      = event.type;           // Name of the event, in this example dragged
    //  var namespace = event.namespace;      // Namespace of the event, in this example owl.carousel
    //  var items     = event.item.count;     // Number of items
    //  var item      = event.item.index;     // Position of the current item
    //  // Provided by the navigation plugin
    //  var pages     = event.page.count;     // Number of pages
    //  var page      = event.page.index;     // Position of the current page
    //  var size      = event.page.size; 
    //  //jo use karna hoya use karli.. :)
    //  //console.log(item);
        
 //    //console.log(title);
    // });
});

$('.customeSearch').on('click',function(){
  var $keyword = $('.search-field').val();
  if (!empty($keyword)) {
    $('.main-search-form').submit();  
  }
  
})


</script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>