
<?php $__env->startSection('content'); ?>
    <div class="wt-dbsectionspace wt-haslayout la-ps-freelancer">
        <div class="freelancer-profile" id="user_profile">
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                            <?php echo $__env->make('back-end.freelancer.profile-settings.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="wt-tabscontent tab-content">
                            <?php if(Session::has('message')): ?>
                                <div class="flash_msg">
                                    <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
                                </div>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
                                <ul class="wt-jobalerts">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flash_msg">
                                            <flash_messages :message_class="'danger'" :time ='10' :message="'<?php echo e($error); ?>'" v-cloak></flash_messages>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                            <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                                <?php echo Form::open(['url' => '', 'class' =>'wt-userform', 'id' => 'freelancer_profile', '@submit.prevent'=>'submitFreelancerProfile']); ?>

                                    <div class="wt-yourdetails wt-tabsinfo">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.detail', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        <div class="wt-tabscontenttitle">
                                            <h2>Social Details</h2>
                                        </div>
                                        <div class="wt-formtheme">
                                            <fieldset>
                                                <h5 class="text-danger">Facebook Page Name <br><small>Please enter your page name from the url of Facebook. <br> <strong>Eg: https://www.facebook.com/WomansDayAUS </strong> You have to take only page name from the url. In this example you have to copy <strong>WomansDayAUS</strong> from the url & enter in this field.</small></h5>
                                                <div class="form-group">
                                                    <input type="text" name="facebook_pageName" class="form-control" placeholder="WomansDayAUS" value="<?php echo e(e(Auth::user()->facebook_pageName)); ?>">
                                                </div>
                                                <h5 class="text-danger">Instagram User Name <br><small>Please enter your Instagram Username to get latest feed on your profile</small></h5>
                                                <div class="form-group">
                                                    <input type="text" name="instagram_username" class="form-control" placeholder="instagram" value="<?php echo e(e(Auth::user()->instagram_username)); ?>">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="wt-profilephoto wt-tabsinfo">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.profile_photo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                                    </div>
                                    <?php if(!empty($options) && $options['banner_option'] === 'true'): ?>
                                        <div class="wt-bannerphoto wt-tabsinfo">
                                                <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.profile_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="wt-location wt-tabsinfo">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.location', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="wt-skills la-skills-holder wt-tabsinfo">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.skill', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
                                    </div>
                                    <div class="wt-videos-holder wt-tabsinfo la-footer-setting">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.personal-detail.videos', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
                                    </div>
                                    <div class="wt-updatall">
                                        <i class="ti-announcement"></i>
                                        <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                                        <?php echo Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn', 'id'=>'submit-profile']); ?>

                                    </div>
                                <?php echo form::close();; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>