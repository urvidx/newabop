<header id="wt-header" class="wt-header wt-haslayout wt-headervtwo">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style = "padding-left:230px; padding-right:230px;">
                    @auth
                        {{ Helper::displayEmailWarning() }}
                    @endauth
                    @if (!empty($logo) || Schema::hasTable('site_managements'))
                        <strong class="wt-logo"><a href="{{{ url('/') }}}"><img src="{{{ asset($logo) }}}" alt="{{{ trans('Logo') }}}"></a></strong>
                    @endif
                    <div class="wt-rightarea">
                            @include('includes.menu')
                        @guest
                            <div class="wt-loginarea">
                                <div class="wt-loginoption">
                                    <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">{{{trans('lang.login') }}}</a>
                                    <div class="wt-loginformhold" @if ($errors->has('email') || $errors->has('password')) style="display: block;" @endif>
                                        <div class="wt-loginheader">
                                            <span style="cursor: pointer;" class="loginViaEmailBtn">{{{ trans('lang.login') }}} / </span>
                                            <span style="cursor: pointer;" class="loginViaMobileBtn"> Mobile Number</span>
                                            <a href="javascript:;"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="mainLoginDiv">
                                        <form method="POST" action="{{ route('login') }}" class="wt-formtheme wt-loginform do-login-form">
                                            @csrf
                                            <fieldset>
                                                <div class="form-group">
                                                    <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        placeholder="Email" required autofocus>
                                                    @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        placeholder="Password" required>
                                                    @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="wt-logininfo">
                                                        <button type="submit" class="wt-btn do-login-button">{{{ trans('lang.login') }}}</button>
                                                    <span class="wt-checkbox">
                                                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="remember">{{{ trans('lang.remember') }}}</label>
                                                    </span>
                                                </div>
                                            </fieldset>
                                            <div class="wt-loginfooterinfo">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="wt-forgot-password">{{{ trans('lang.forget_pass') }}}</a>
                                                @endif
                                                <a href="" data-toggle="modal" data-target="#bd-register-modal-lg">{{{ trans('lang.create_account') }}}</a>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="mainphoneLoginDiv wt-formtheme hide">
                                            <fieldset style="padding: 10px;">
                                                <div class="form-group mobilenumberDiv">
                                                    <input id="mobile-number" type="text" name="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }} inputnumber"
                                                        placeholder="919876543210" required autofocus value="91">
                                                </div>
                                                <div class="form-group otpDiv hide">
                                                    <p>Check your inbox at <span style="cursor: pointer;" class="disNumber"></span> <br> <a href="" style="cursor: pointer;" class="changeNumber">Change Number</a></p>
                                                    <input id="otp" type="text" name="otp" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        placeholder="Enter Otp" required autofocus>
                                                </div>
                                                <div class="wt-logininfo">
                                                        <button class="wt-btn do-login-button otpsendbtn">Send OTP</button>
                                                        <button class="wt-btn do-login-button otploginbtn hide">Confirm & Login</button>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <a href="" data-toggle="modal" data-target="#bd-request-modal-lg" class="wt-btn">Post Request</a>
                                <!-- <a href="{{{ route('register') }}}" class="wt-btn">{{{ trans('lang.join_now') }}}</a> -->
                                
                            </div>
                        @endguest
                        @auth
                            @php
                                $user = !empty(Auth::user()) ? Auth::user() : '';
                                $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                $profile = \App\User::find(Auth::user()->id)->profile;
                                $user_image = !empty($profile) ? $profile->avater : '';
                                $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                            @endphp
                                <div class="wt-userlogedin">
                                    <figure class="wt-userimg">
                                        <img src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">
                                    </figure>
                                    <div class="wt-username">
                                        <h3>{{{ Helper::getUserName(Auth::user()->id) }}}</h3>
                                        <span>{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</span>
                                    </div>
                                    @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))) 
                                        @include('extend.back-end.includes.profile-menu')
                                    @else 
                                        @include('back-end.includes.profile-menu')
                                    @endif
                                </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>