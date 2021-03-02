@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master')
@push('sliderStyle') 
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endpush
@push('stylesheets')
    <link href="{{ asset('css/prettyPhoto-min.css') }}" rel="stylesheet">
    <style type="text/css">
    
        .bg {
  /* The image used */
  background-image: url('{{asset('/uploads/details.png')}}');

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
@endpush
@section('title')
        @if ($home == false)
            {{ $page['title'] }}
        @else 
            {{ config('app.name') }} 
        @endif
    @stop
@section('description', "$meta_desc")




@section('content')
<div class="mainacontainDiv">
  


@if(!empty($slider))
    <div class="owl-carousel owl-theme">
             @foreach($slider as $slide)
            <div class="item">
                <img titl="{{$slide->title}}" description="{{$slide->description}}" src="{{asset('public/sliderImages/'.$slide->image)}}" style="width:100%">
                 <!-- <div class="text"></div> -->
            </div>
             @endforeach
    </div>
@else

{{-- <div class="slideshow-container">
<div class="mySlides fadee">
  <img src="{{asset('public/sliderImages/slides/1.jpg')}}" style="width:100%">
  <!-- <div class="text">Caption Text</div> -->
</div>

<div class="mySlides fadee">
  <img src="{{asset('public/sliderImages/slides/2.jpg')}}" style="width:100%">
  <!-- <div class="text">Caption Two</div> -->
</div>

<div class="mySlides fadee">
  <img src="{{asset('public/sliderImages/slides/3.jpg')}}" style="width:100%">
  <!-- <div class="text">Caption Three</div> -->
</div>
--}}

</div>
@endif
<div id="sign-in-button"></div>

<div class="innerSearchDiv">
         <div class="container">
           <div class="row justify-content-center">
              <div class="setback col-12 col-lg-10">
                 <div class="custom-bannercontent">
                    <div class="wt-bannerhead">
                       <div class="wt-title">
                          <h1 class="colorBlue"><span style="color: #1f408e" class="imgTitle">{{@$slider[0]->title}}</span> </h1>
                          <h4><span style="color: #1f408e" class="spandescription">{{@$slider[0]->description}}</span></h4>
                       </div>
                       <div class="wt-description"></div>
                    </div>
                    <form method="GET"  action="{{ URL::to('search-results') }}" id="main-search-form" class="wt-formtheme wt-formbanner wt-formbannertwo">
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
<!-- <div class="2ndContainDiv" style="padding: 0px; margin: 0px; background:url('{{asset('/uploads/workdetail.png')}}');background-position: center;background-size: cover;background-repeat: no-repeat;    height: 24pc;">

</div> -->
<div class="bg">
    <div class="row cont">
        @forelse($workdetails as $work)
        <div class="col-md-4">
            <div class="">
                <div class="inner paddset">
                    <div class="cntr"> <img src="{{asset('public/uploads/workdetails/'.$work->icon)}}" class="mx-auto d-block"> </div>
                    <div class="txt">
                        <h3 class="text-white">{{$work->title}}</h3>
                        <p>{{$work->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
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
        @endforelse
    </div>
</div>

    @if ($home == false)
        @php $breadcrumbs = Breadcrumbs::generate('showPage',$page, $slug); @endphp
        @if (file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php')))
            @include('extend.front-end.includes.inner-banner', 
                ['title' => $page['title'], 'inner_banner' => '', 'pageType' => 'showPage', 'show_banner' => $show_banner_image]
            )
        @else 
            @include('front-end.includes.inner-banner', 
                ['title' =>  $page['title'], 'inner_banner' => '', 'pageType' => 'showPage', 'show_banner' => $show_banner_image]
            )
        @endif
    @endif
    <div id="pages-list">
        @if (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
            @php session()->forget('error'); @endphp
        @endif
        @if ($home == false)
            @if ($show_banner_image == false && !empty($page['title']) && $show_title == true)
                <div class="wt-innerbannercontent wt-without-banner-title">
                    <div class="wt-title">
                        <h2>{{{ $page['title'] }}}</h2>
                    </div>
                </div>
            @endif
        @endif
        @if (!empty($page))
            @if (!empty($sections))
                <show-new-page 
                :page_id="'{{$page['id']}}'" 
                :access_type="'{{$type}}'"
                :symbol="'{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}'"
                :auth_role="'{{Auth::user() ? Auth::user()->getRoleNames()[0] : 'false'}}'"
                :slider_style= "'{{$slider_style}}'"
                >
                </show-new-page>
            @endif
            @if (!empty($description && $description != 'null'))
                <div class="dc-contentwrappers">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                <div class="dc-howitwork-hold dc-haslayout">
                                    <div class="dc-haslayout dc-main-section">
                                        @php echo htmlspecialchars_decode(stripslashes($description)); @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            @if (file_exists(resource_path('views/extend/errors/404.blade.php'))) 
                @include('extend.errors.404')
            @else 
                @include('errors.404')
            @endif
        @endif
        @php
            $page_footer = Helper::getPageFooter($page['id']);
        @endphp
        {{-- @if (!empty($page_footer) && $page_footer !== 'style2' && $page_footer !== 'style3')
            @if (!empty($skills)
                || !empty($categories)
                || !empty($locations)
                || !empty($languages))
                <section class="wt-haslayaout wt-main-section wt-footeraboutus">
                    <div class="container">
                        <div class="row">
                            @if (Helper::getAccessType() != 'services')
                                @if ($skills->count() > 0)
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="wt-widgetskills">
                                            <div class="wt-fwidgettitle">
                                                <h3>{{ trans('lang.by_skills') }}</h3>
                                            </div>
                                            @if (!empty($skills))
                                                <ul class="wt-fwidgetcontent">
                                                    @foreach ($skills as $skill)
                                                        <li><a href="{{{url('search-results?type=job&skills%5B%5D='.$skill->slug)}}}">{{{ $skill->title }}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if ($categories->count() > 0)
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="wt-footercol wt-widgetcategories">
                                        <div class="wt-fwidgettitle">
                                            <h3>{{ trans('lang.by_cats') }}</h3>
                                        </div>
                                        @if (!empty($categories))
                                            <ul class="wt-fwidgetcontent">
                                                @foreach ($categories as $category)
                                                    <li><a href="{{{url('search-results?type='.$type.'&category%5B%5D='.$category->slug)}}}">{{{ $category->title }}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($locations->count() > 0)
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="wt-widgetbylocation">
                                        <div class="wt-fwidgettitle">
                                            <h3>{{ trans('lang.by_locs') }}</h3>
                                        </div>
                                        @if (!empty($locations))
                                            <ul class="wt-fwidgetcontent">
                                                @foreach ($locations as $location)
                                                    <li><a href="{{{url('search-results?type='.$type.'&locations%5B%5D='.$location->slug)}}}">{{{ $location->title }}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($languages->count() > 0)
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="wt-widgetbylocation">
                                        <div class="wt-fwidgettitle">
                                            <h3>{{ trans('lang.by_lang') }}</h3>
                                        </div>
                                        @if (!empty($languages))
                                            <ul class="wt-fwidgetcontent">
                                                @foreach ($languages as $language)
                                                    <li><a href="{{{url('search-results?type='.$type.'&languages%5B%5D='.$language->slug)}}}">{{{ $language->title }}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
        @endif --}}
    </div>





@endsection
@push('scripts')
    <script src="{{ asset('js/prettyPhoto-min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @if ($page_header == 'style5')
        @if (empty($slider_style))
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style5')
            </script>
        @elseif (!empty($slider_style) && $slider_order != 0)
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style5')
            </script>
        @endif
    @elseif ($page_header == 'style3')
        @if (empty($slider_style))
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style3')
            </script>
        @elseif ($slider_style != 'style3') 
            <script>
                jQuery('.wt-contentwrapper').addClass('inner-header-style3')
            </script>
        @endif
    @endif
    @if ($slider_style == 'style2')
        {{-- <script>
            jQuery('#wt-header').addClass('wt-headervthhree')
            jQuery('#wt-header').removeClass('wt-headervtwo')
            jQuery('.wt-formtheme.wt-formbanner.wt-formbannervtwo').remove()
        </script> --}}
        @if (isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com')
            <script>
                jQuery('.wt-logo a img').attr('src',(APP_URL+'/images/logo-white.png'));
            </script>
        @endif
    @else
    @endif
    <script src="{{ asset('js/tilt.jquery.js') }}"></script>
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



@endpush
