@extends('master')
@push('stylesheets')

@endpush

@push('PackageStyle')
    <link href="{{ asset('css/dd.css') }}" rel="stylesheet">
@endpush

@section('header')
		@include('includes.header')
@endsection

@section('slider')
	@yield('homeSlider')
@endsection

@section('main')
@stack('stylesheets')
<main id="wt-main" class="wt-main  wt-haslayout {{ !empty($body_class) ? $body_class : '' }}">
	<!-- @if (isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com')
		<div id="wt-demo-sidebar" class="wt-demo-sidebar">
			<div id="wt-btndemotoggle" class="wt-btndemotoggle">
				<span class="menu-icon">
					<i class="lnr lnr-layers"></i>
				</span>
			</div>
			<div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
				<div class="wt-demo-holder">
					<a href="{{url('page/home-page-four')}}">
						<figure class="wt-demo-img">
							<img src="{{url('images/demo-img/img-06.jpg')}}" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-new">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
					<a href="{{url('page/home-page-five')}}">
						<figure class="wt-demo-img">
							<img src="{{url('images/demo-img/img-07.jpg')}}" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-new">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
					<a href="{{url('/')}}">
						<figure class="wt-demo-img">
							<img src="{{url('images/demo-img/img-01.jpg')}}" alt="img">
						</figure>
					</a>
					<a href="{{url('page/home-page-two')}}">
						<figure class="wt-demo-img">
							<img src="{{url('images/demo-img/img-02.jpg')}}" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-new">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
					<a href="{{url('page/home-page-three')}}">
						<figure class="wt-demo-img">
							<img src="{{url('images/demo-img/img-03.jpg')}}" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-populor">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="wt-demo-content">
				<div class="wt-demo-heading">
					<h4>Outstanding Demos</h4>
					<p>With easy<em> ONE CLICK INSTALL</em> and fully customizable options, our demos are the best start you'll ever get!!</p>
					<div class="wt-demo-btns">
						<a href="https://codecanyon.net/item/worketic-market-place-for-freelancers/23712284" target="blank" class="wt-demo-btn">Click To LAUNCH</a>
					</div>
				</div>
			</div>
		</div>
	@endif -->
	@yield('content')
</main>
@endsection

@section('footer')
		@include('front-end.includes.footer')
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.dd.min.js') }}"></script>	
<script>
	jQuery('.wt-btndemotoggle').on('click', function() {
		var _this = jQuery(this);
		_this.parents('.wt-demo-sidebar').toggleClass('wt-demoshow');
	});
	jQuery(document).ready(function(e) {
		$('#wt-main').css('margin-top','unset');
		try {
			jQuery("body select.locations").msDropDown();
		} catch(e) {
			alert(e.message);
		}
	});
</script>
@stack('scripts')
@endpush
