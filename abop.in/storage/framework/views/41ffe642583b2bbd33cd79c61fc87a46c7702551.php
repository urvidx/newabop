<?php $__env->startSection('content'); ?>
<?php
    $employees      = Helper::getEmployeesList();
    $departments    = App\Department::all();
    $locations      = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles          = Spatie\Permission\Models\Role::all()->toArray();
    $register_form = App\SiteManagement::getMetaValue('reg_form_settings');
    $reg_one_title = !empty($register_form) && !empty($register_form[0]['step1-title']) ? $register_form[0]['step1-title'] : trans('lang.join_for_good');
    $reg_one_subtitle = !empty($register_form) && !empty($register_form[0]['step1-subtitle']) ? $register_form[0]['step1-subtitle'] : trans('lang.join_for_good_reason');
    $reg_two_title = !empty($register_form) && !empty($register_form[0]['step2-title']) ? $register_form[0]['step2-title'] : trans('lang.pro_info');
    $reg_two_subtitle = !empty($register_form) && !empty($register_form[0]['step2-subtitle']) ? $register_form[0]['step2-subtitle'] : '';
    $term_note = !empty($register_form) && !empty($register_form[0]['step2-term-note']) ? $register_form[0]['step2-term-note'] : trans('lang.agree_terms');
    $reg_three_title = !empty($register_form) && !empty($register_form[0]['step3-title']) ? $register_form[0]['step3-title'] : trans('lang.almost_there');
    $reg_three_subtitle = !empty($register_form) && !empty($register_form[0]['step3-subtitle']) ? $register_form[0]['step3-subtitle'] : trans('lang.acc_almost_created_note');
    $register_image = !empty($register_form) && !empty($register_form[0]['register_image']) ? '/uploads/settings/home/'.$register_form[0]['register_image'] : 'images/work.jpg';
    $reg_page = !empty($register_form) && !empty($register_form[0]['step3-page']) ? $register_form[0]['step3-page'] : '';
    $reg_four_title = !empty($register_form) && !empty($register_form[0]['step4-title']) ? $register_form[0]['step4-title'] : trans('lang.congrats');
    $reg_four_subtitle = !empty($register_form) && !empty($register_form[0]['step4-subtitle']) ? $register_form[0]['step4-subtitle'] : trans('lang.acc_creation_note');
    $show_emplyr_inn_sec = !empty($register_form) && !empty($register_form[0]['show_emplyr_inn_sec']) ? $register_form[0]['show_emplyr_inn_sec'] : 'true';
    $show_reg_form_banner = !empty($register_form) && !empty($register_form[0]['show_reg_form_banner']) ? $register_form[0]['show_reg_form_banner'] : 'true';
    $reg_form_banner = !empty($register_form) && !empty($register_form[0]['reg_form_banner']) ? $register_form[0]['reg_form_banner'] : null;
    $selected_registration_type = !empty($register_form) && !empty($register_form[0]['registration_type']) ? $register_form[0]['registration_type'] : 'multiple';
    $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
    $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
?>
<?php $breadcrumbs = Breadcrumbs::generate('registerPage'); ?>
<style type="text/css">
	.help-block > strong{
		color: red;
	}
</style>
<section class="wt-haslayout wt-dbsectionspace" id="profile_settings">
        <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 float-right">
                <?php if(Session::has('message')): ?>
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
                    </div>
                <?php endif; ?>
                <div style="padding: 20px;" class="wt-dashboardbox">
                	<div class="wt-dashboardboxcontent wt-categoriescontentholder">
                                <form method="POST" action="<?php echo e(route('users.postAddUser')); ?>" class="wt-formtheme wt-formregister" id="register_form">
                                    <?php echo csrf_field(); ?>
                                    <fieldset class="wt-registerformgroup">
                                        <div class="wt-haslayout">
                                            <div class="wt-registerhead">
                                                <div class="wt-title">
                                                    <h3><?php echo e($reg_one_title); ?></h3>
                                                </div>
                                                <div class="wt-description">
                                                    <p><?php echo e($reg_one_subtitle); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="text" name="first_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_first_name')); ?>" >
                                                <span class="help-block">
                                                    <strong ><?php echo @$errors->first('first_name'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="text" name="last_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_last_name')); ?>" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('last_name'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="user_email" type="email" class="form-control" name="email" placeholder="<?php echo e(trans('lang.ph_email')); ?>" value="<?php echo e(old('email')); ?>" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('email'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="mobile_number" type="number" class="form-control" name="mobile_number" placeholder="91 Enter Mobile Number with Country code" value="<?php echo e(old('mobile_number')); ?>" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('mobile_number'); ?></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </fieldset>
                                    
                                        <fieldset class="wt-registerformgroup">
                                            <?php if(!empty($locations)): ?>
                                                <div class="form-group">
                                                    <span class="wt-select">
                                                        <?php echo Form::select('locations', $locations, null, array('placeholder' => trans('lang.select_locations'))); ?>

                                                        <span class="help-block" >
                                                            <strong ><?php echo @$errors->first('locations'); ?></strong>
                                                        </span>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group form-group-half">
                                                <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(trans('lang.ph_pass')); ?>" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('password'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(trans('lang.ph_retry_pass')); ?>" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('password_confirmation'); ?></strong>
                                                </span>
                                            </div>
                                        </fieldset>
                                        <fieldset class="wt-formregisterstart">
                                            <div class="wt-title wt-formtitle">
                                                <h4><?php echo e(trans('lang.start_as')); ?></h4>
                                            </div>
                                            <?php if(!empty($roles)): ?>
                                                

                                                <ul class="wt-accordionhold wt-formaccordionhold accordion">
                                                    <?php
                                                    $authUser = Auth::user();
                                                    ?>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($authUser->hasRole(['salesPerson'])): ?>
                                                            <?php $array = [1,2,4,5] ?>
                                                        <?php elseif($authUser->hasRole(['manager'])): ?>
                                                            <?php $array = [1,4,5] ?>
                                                        <?php else: ?>
                                                            <?php $array = [1] ?>
                                                        <?php endif; ?>
                                                        <?php if(!in_array($role['id'], $array)): ?>
                                                            <li>
                                                                <div class="wt-accordiontitle" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                                                    <span class="wt-radio">
                                                                    <input id="wt-company-<?php echo e($key); ?>" type="radio" name="role" value="<?php echo e($role['role_type']); ?>" >
                                                                    <label for="wt-company-<?php echo e($key); ?>">
                                                                        <?php echo e($role['name']); ?>

                                                                        <span> 
                                                                            
                                                                        </span>
                                                                    </label>
                                                                    </span>
                                                                </div>
                                                                                                                    
                                                            </li>
                                                            
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>

                                                <span class="help-block">
                                                    <strong ><?php echo @$errors->first('role'); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </fieldset>
                                        <fieldset class="wt-termsconditions">
                                            <div class="wt-checkboxholder">
                                                <!-- <span class="wt-checkbox">
                                                    <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                                                    <label for="termsconditions"><span><?php echo e($term_note); ?></span></label>
                                                    <span class="help-block" v-if="form_step2.termsconditions_error">
                                                        <strong style="color: red;" v-cloak><?php echo e(trans('lang.register_termsconditions_error')); ?></strong>
                                                    </span>
                                                </span> -->
                                                <button type="submit" class="wt-btn"><?php echo e(trans('lang.submit')); ?></a>
                                            </div>
                                        </fieldset>
                                    
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>