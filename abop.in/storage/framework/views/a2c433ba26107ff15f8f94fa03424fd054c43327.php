
<?php $__env->startSection('content'); ?>
    <div class="wt-dbsectionspace wt-haslayout la-ed-freelancer">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="freelancer-profile" id="user_profile">
                    <div class="preloader-section" v-if="loading" v-cloak>
                        <div class="preloader-holder">
                            <div class="loader"></div>
                        </div>
                    </div>
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
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                            <?php echo $__env->make('back-end.admin.users.profile-settings.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="wt-tabscontent tab-content">
                            <div class="wt-educationholder" id="wt-education">
                                <?php echo e(auth()->user()->role); ?>

                                <?php echo Form::open(['url' => url('freelancer/store-experience-settings'), 'class' =>'wt-formtheme wt-userform', 'id' => 'experience_form', '@submit.prevent'=>'submitExperienceEduction']); ?>

                                    <div class="wt-userexperience wt-tabsinfo">
                                            <?php echo $__env->make('back-end.freelancer.profile-settings.experience-education.experience', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="wt-userexperience wt-tabsinfo">
                                            <?php echo $__env->make('back-end.admin.users.profile-settings.experience-education.education', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php $__env->startSection('bootstrap_script'); ?>
    <script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>