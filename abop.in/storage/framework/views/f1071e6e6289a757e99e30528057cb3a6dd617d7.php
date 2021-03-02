<?php if(Schema::hasTable('users')): ?>
    <?php
    $inner_header = '';
    ?>
    <?php if(Schema::hasTable('pages') || Schema::hasTable('site_managements')): ?>
        <?php
            $settings = array();
            $page_id='';
            $pages = App\Page::all();
            $setting = \App\SiteManagement::getMetaValue('settings');
            $logo = !empty($setting[0]['logo']) ? Helper::getHeaderLogo($setting[0]['logo']) : '/images/logo.png';
            $inner_header = !empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' ? 'wt-headervtwo' : '';
            $type = Helper::getAccessType();
            $default_header_styling = \App\SiteManagement::getMetaValue('menu_settings');
            $default_menu_color = !empty($default_header_styling) && !empty($default_header_styling['menu_color']) ? $default_header_styling['menu_color'] : '';
            $default_menu_hover_color = !empty($default_header_styling) && !empty($default_header_styling['menu_hover_color']) ? $default_header_styling['menu_hover_color'] : '';
            $menu_text_color = !empty($default_header_styling) && !empty($default_header_styling['color']) ? $default_header_styling['color'] : '';
            $page_order = !empty($default_header_styling) && !empty($default_header_styling['pages']) ? $default_header_styling['pages'] : array();
            if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home') {
                if (Request::segment(1) == 'page') {
                    $selected_page_data = APP\Page::getPageData(Request::segment(2));
                    $selected_page = !empty($selected_page_data) ? APP\Page::find($selected_page_data->id) : '';
                    $page_id = !empty($selected_page) ? $selected_page->id : '';
                }
            } else {
                $page_id = APP\SiteManagement::getMetaValue('homepage');
            }
            $slider = Helper::getPageSlider($page_id);
        ?>
    <?php endif; ?>
    <?php $__env->startPush('stylesheets'); ?>
        <style>
            .wt-header .wt-navigation>ul>.menu-item-has-children:after,
            .wt-header .wt-navigation > ul > li > a {
                color: <?php echo e($default_menu_color); ?>;
            }
            .wt-navigation > ul > li.current-menu-item > a,
            .wt-navigation ul li .sub-menu > li:hover > a,
            .wt-navigation > ul > li:hover > a{
                color: <?php echo e($default_menu_hover_color); ?>;
            }
            .wt-header .wt-navigationarea .wt-navigation > ul > li > a:after{
                background: <?php echo e($default_menu_hover_color); ?>;
            }
            .wt-header .wt-navigationarea .wt-userlogedin .wt-username span,
            .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {color: <?php echo e($menu_text_color); ?> };
        </style>
    <?php $__env->stopPush(); ?>
    <?php if(auth()->guard()->check()): ?>
        <?php echo e(Helper::displayVerificationWarning()); ?>

    <?php endif; ?>
        <header id="wt-header" class="wt-header wt-haslayout <?php echo e($inner_header); ?>">
            <div class="wt-navigationarea">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style= "padding-left: 130px; padding-right: 430px;">
                            <?php if(auth()->guard()->check()): ?>
                                <?php echo e(Helper::displayEmailWarning()); ?>

                            <?php endif; ?>
                            <?php if(!empty($logo) || Schema::hasTable('site_managements')): ?>
                                <strong class="wt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e(trans('Logo')); ?>"></a></strong>
                            <?php endif; ?>
                            
                            
                            <div class="wt-rightarea">
                                
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="wt-loginarea">
                                        <div class="wt-loginoption">
                                            <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                            <div class="wt-loginformhold" <?php if($errors->has('email') || $errors->has('password')): ?> style="display: block;" <?php endif; ?>>
                                                <div class="wt-loginheader">
                                                    <span><?php echo e(trans('lang.login')); ?></span>
                                                    <a href="javascript:;"><i class="fa fa-times"></i></a>
                                                </div>
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
                                                        <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('lang.create_account')); ?></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="<?php echo e(route('register')); ?>" class="wt-btn"><?php echo e(trans('lang.join_now')); ?></a>
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
                                            <?php echo $__env->make('back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    <!-- Check if user is admin or employer -->
                                    <?php $roles = Auth::user()->roles; ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($role->name == 'employer'): ?>
                                            <div class="postModalDivInner"><a href="" data-toggle="modal" data-target="#bd-request-modal-lg" class="wt-btn">Post Request</a></div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Check if user is admin or employer -->
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<?php endif; ?>

