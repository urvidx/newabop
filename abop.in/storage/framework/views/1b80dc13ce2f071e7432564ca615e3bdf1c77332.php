<div class="wt-tabscontenttitle">
    <h2><?php echo e(trans('lang.your_loc')); ?></h2>
</div>
<div class="wt-formtheme">
    <fieldset>
        <div class="form-group form-group-half">
            <span class="wt-select">
                <?php echo Form::select('location', $locations, $userDetails->location_id ,array('class' => '', 'placeholder' => trans('lang.ph_select_location'))); ?>

            </span>
        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'address', e($address), ['id'=>"pac-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_your_address')] ); ?>

        </div>
        <div class="form-group wt-formmap">
            <?php echo $__env->make('includes.map', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'longitude', e($longitude), ['id'=>"lng-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_enter_logitude')]); ?>

        </div>
        <div class="form-group form-group-half">
            <?php echo Form::text( 'latitude', e($latitude), ['id'=>"lat-input", 'class' =>'form-control', 'placeholder' => trans('lang.ph_enter_latitude')]); ?>

        </div>
    </fieldset>
</div>