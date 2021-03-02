
<?php $__env->startSection('content'); ?>
    <div class="cats-listing" id="badge-list">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <section class="wt-haslayout wt-dbsectionspace la-admin-badges">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 float-left">
                    <div class="wt-dashboardbox  la-color-picker-form-wrapper">
                        <div class="wt-dashboardboxtitle">
                            <h2><?php echo e(trans('lang.add_badge')); ?></h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <?php echo Form::open([ 'url' => url('admin/store-badge'), 'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory','id'=> 'categories']); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <?php echo Form::text( 'badge_title', null, ['class' =>'form-control'.($errors->has('badge_title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_badge_title')] ); ?>

                                        <span class="form-group-description"><?php echo e(trans('lang.desc')); ?></span>
                                        <?php if($errors->has('badge_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('badge_title')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="wt-settingscontent">
                                        <div class = "wt-formtheme wt-userform la-form-error <?php echo e($errors->has('uploaded_image') ? ' is-invalid' : ''); ?>">
                                            <upload-image
                                                :id="'badge_image'"
                                                :img_ref="'badge_ref'"
                                                :url="'<?php echo e(url('admin/badges/upload-temp-image')); ?>'"
                                                :name="'uploaded_image'"
                                                >
                                            </upload-image>
                                            <?php echo Form::hidden( 'uploaded_image', '', ['id'=>'hidden_img'] ); ?>

                                            <?php if($errors->has('uploaded_image')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('uploaded_image')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group la-color-picker wt-la-color-picker">
                                        <verte v-model="color" model="hex"></verte>
                                        <input type="hidden" name="color" :value="color">
                                    </div>
                                    <div class="form-group wt-btnarea">
                                        <?php echo Form::submit(trans('lang.add_badge'), ['class' => 'wt-btn']); ?>

                                    </div>
                                </fieldset>
                            <?php echo Form::close();; ?>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8 float-right">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle wt-titlewithsearch">
                            <h2><?php echo e(trans('lang.badges')); ?></h2>
                            <?php echo Form::open(['url' => url('admin/badges/search'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <input type="search" name="s" value="<?php echo e(!empty($_GET['s']) ? $_GET['s'] : ''); ?>" class="form-control" placeholder="<?php echo e(trans('lang.ph_search_badges')); ?>">
                                        <button type="submit" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                                    </div>
                                </fieldset>
                            <?php echo Form::close(); ?>

                            <a href="javascript:void(0);" v-if="this.is_show" @click="deleteChecked('<?php echo e(trans('lang.ph_delete_confirm_title')); ?>', '<?php echo e(trans('lang.ph_badge_delete_message')); ?>')" class="wt-skilldel">
                                <i class="lnr lnr-trash"></i>
                                <span><?php echo e(trans('lang.del_select_rec')); ?></span>
                            </a>
                        </div>
                        <?php if($badges->count() > 0): ?>
                            <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                                <table class="wt-tablecategories la-badges" id="checked-val">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="wt-checkbox">
                                                    <input name="badges[]" id="wt-badges" @click="selectAll" type="checkbox" name="head">
                                                    <label for="wt-badges"></label>
                                                </span>
                                            </th>
                                            <th><?php echo e(trans('lang.badge_icon')); ?></th>
                                            <th><?php echo e(trans('lang.name')); ?></th>
                                            <th><?php echo e(trans('lang.slug')); ?></th>
                                            <th><?php echo e(trans('lang.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="del-<?php echo e($badge->id); ?>">
                                                <td>
                                                    <span class="wt-checkbox">
                                                        <input name="badges[]" @click="selectRecord" value="<?php echo e($badge->id); ?>" id="wt-check-<?php echo e($counter); ?>" type="checkbox" name="head">
                                                        <label for="wt-check-<?php echo e($counter); ?>"></label>
                                                    </span>
                                                </td>
                                                <td data-th="Icon"><span class="bt-content"><figure style="background-color:<?php echo e($badge->color); ?>"><img src="<?php echo e(asset(Helper::getBadgeImage($badge->image))); ?>" alt="<?php echo e($badge->title); ?>"></figure></span></td>
                                                <td><?php echo e($badge->title); ?></td>
                                                <td><?php echo e($badge->slug); ?></td>
                                                <td>
                                                    <div class="wt-actionbtn">
                                                        <a href="<?php echo e(url('admin/badges/edit-badges')); ?>/<?php echo e($badge->id); ?>" class="wt-addinfo wt-skillsaddinfo">
                                                            <i class="lnr lnr-pencil"></i>
                                                        </a>
                                                        <delete :title="'<?php echo e(trans("lang.ph_delete_confirm_title")); ?>'" :id="'<?php echo e($badge->id); ?>'" :message="'<?php echo e(trans("lang.ph_badge_delete_message")); ?>'" :url="'<?php echo e(url('admin/badges/delete-badges')); ?>'"></delete>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php if( method_exists($badges,'links') ): ?>
                                    <?php echo e($badges->links('pagination.custom')); ?>

                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php else: ?> 
                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>