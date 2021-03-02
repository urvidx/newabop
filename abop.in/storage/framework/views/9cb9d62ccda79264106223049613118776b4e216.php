<freelancer_experience 
    :server_errors="'invalid fields data'" 
    :ph_job_title="'<?php echo e(trans('lang.ph_job_title')); ?>'" 
    :ph_company_title="'<?php echo e(trans('lang.ph_company_title')); ?>'"
    :ph_job_desc="'<?php echo e(trans('lang.ph_job_desc')); ?>'"
    :ph_start_date="'<?php echo e(trans('lang.ph_start_date')); ?>'"
    :ph_end_date="'<?php echo e(trans('lang.ph_end_date')); ?>'"
    :weekdays="'<?php echo e(json_encode($weekdays)); ?>'"
    :months="'<?php echo e(json_encode($months)); ?>'">
</freelancer_experience>