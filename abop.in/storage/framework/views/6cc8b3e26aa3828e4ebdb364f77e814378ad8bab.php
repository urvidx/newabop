<header id="wt-header" class="wt-header wt-haslayout wt-headervtwo">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if(auth()->guard()->check()): ?>
                        <?php echo e(Helper::displayEmailWarning()); ?>

                    <?php endif; ?>
                    <?php if(!empty($logo) || Schema::hasTable('site_managements')): ?>
                        <strong class="wt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e(trans('Logo')); ?>"></a></strong>
                    <?php endif; ?>
                    <div class="wt-rightarea">
                            <?php echo $__env->make('includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <div class="wt-loginarea">
                                <div class="wt-loginoption">
                                    <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                    <div class="wt-loginformhold" <?php if($errors->has('email') || $errors->has('password')): ?> style="display: block;" <?php endif; ?>>
                                        <div class="wt-loginheader">
                                            <span style="cursor: pointer;" class="loginViaEmailBtn"><?php echo e(trans('lang.login')); ?> / </span>
                                            <span style="cursor: pointer;" class="loginViaMobileBtn"> Mobile Number</span>
                                            <a href="javascript:;"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="mainLoginDiv">
                                        <form method="POST" action="<?php echo e(route('login')); ?>" class="wt-formtheme wt-loginform do-login-form">
                                            <?php echo csrf_field(); ?>
                                            <fieldset>
                                                <div class="form-group">
                                                    <input id="email" type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                        placeholder="Email" required autofocus>
                                                    <?php if($errors->has('email')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input id="password" type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                        placeholder="Password" required>
                                                    <?php if($errors->has('password')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="wt-logininfo">
                                                        <button type="submit" class="wt-btn do-login-button"><?php echo e(trans('lang.login')); ?></button>
                                                    <span class="wt-checkbox">
                                                        <input id="remember" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                        <label for="remember"><?php echo e(trans('lang.remember')); ?></label>
                                                    </span>
                                                </div>
                                            </fieldset>
                                            <div class="wt-loginfooterinfo">
                                                <?php if(Route::has('password.request')): ?>
                                                    <a href="<?php echo e(route('password.request')); ?>" class="wt-forgot-password"><?php echo e(trans('lang.forget_pass')); ?></a>
                                                <?php endif; ?>
                                                <a href="" data-toggle="modal" data-target="#bd-register-modal-lg"><?php echo e(trans('lang.create_account')); ?></a>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="mainphoneLoginDiv wt-formtheme hide">
                                            <fieldset style="padding: 10px;">
                                                <div class="form-group mobilenumberDiv">
                                                    <input id="mobile-number" type="text" name="number" class="form-control<?php echo e($errors->has('number') ? ' is-invalid' : ''); ?> inputnumber"
                                                        placeholder="919876543210" required autofocus value="91">
                                                </div>
                                                <div class="form-group otpDiv hide">
                                                    <p>Check your inbox at <span style="cursor: pointer;" class="disNumber"></span> <br> <a href="" style="cursor: pointer;" class="changeNumber">Change Number</a></p>
                                                    <input id="otp" type="text" name="otp" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
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
                                <!-- <a href="<?php echo e(route('register')); ?>" class="wt-btn"><?php echo e(trans('lang.join_now')); ?></a> -->
                                
                            </div>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <?php
                                $user = !empty(Auth::user()) ? Auth::user() : '';
                                $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                $profile = \App\User::find(Auth::user()->id)->profile;
                                $user_image = !empty($profile) ? $profile->avater : '';
                                $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                            ?>
                                <div class="wt-userlogedin">
                                    <figure class="wt-userimg">
                                        <img src="<?php echo e(asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.user_avatar')); ?>">
                                    </figure>
                                    <div class="wt-username">
                                        <h3><?php echo e(Helper::getUserName(Auth::user()->id)); ?></h3>
                                        <span><?php echo e(!empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName()); ?></span>
                                    </div>
                                    <?php if(file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))): ?> 
                                        <?php echo $__env->make('extend.back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php else: ?> 
                                        <?php echo $__env->make('back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endif; ?>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>