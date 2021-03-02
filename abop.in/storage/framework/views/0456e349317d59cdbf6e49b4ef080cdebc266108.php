<div class="wt-tabscontenttitle">
    <h2><?php echo e(trans('lang.your_loc')); ?></h2>
</div>
<div class="wt-formtheme">
    <fieldset>
        <div class="form-group">
            <input type="text" name="full_address" class="form-control" placeholder="Enter Full Address" value="<?php echo e(@$profile->full_address); ?>">
        </div>
        <div class="form-group form-group-half">
            <span class="wt-select">
                <?php echo Form::select('location', $locations, $userDetails->location_id ,array('class' => '', 'placeholder' => trans('lang.select_location'))); ?>

            </span>
        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'address', e($address), ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.your_address')] ); ?>

        </div>
        <div class="form-group wt-formmap">
            <?php echo $__env->make('includes.map', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'longitude', e($longitude), ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')] ); ?>

        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'latitude', e($latitude), ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')] ); ?>

        </div>
    </fieldset>
</div>