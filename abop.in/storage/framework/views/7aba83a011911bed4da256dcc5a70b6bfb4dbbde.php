<freelancer_education
    :ph_job_title="'<?php echo e(trans('lang.ph_job_title')); ?>'"
    :ph_institute_title="'<?php echo e(trans('lang.ph_institute_title')); ?>'"
    :ph_desc="'<?php echo e(trans('lang.ph_desc')); ?>'"
    :ph_degree_title="'<?php echo e(trans('lang.ph_degree_title')); ?>'"
    :ph_start_date="'<?php echo e(trans('lang.ph_start_date')); ?>'"
    :ph_end_date="'<?php echo e(trans('lang.ph_end_date')); ?>'"
    :weekdays="'<?php echo e(json_encode($weekdays)); ?>'"
    :months="'<?php echo e(json_encode($months)); ?>'">
</freelancer_education>