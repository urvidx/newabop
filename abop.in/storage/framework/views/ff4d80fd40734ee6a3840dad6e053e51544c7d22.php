<freelancer_award 
    :server_errors="'<?php echo e(trans('lang.all_required')); ?>'"
    :ph_award_title = "'<?php echo e(trans('lang.ph_award_title')); ?>'"
    :ph_select_award_date = "'<?php echo e(trans('lang.select_award_date')); ?>'"
    :weekdays="'<?php echo e(json_encode($weekdays)); ?>'"
    :months="'<?php echo e(json_encode($months)); ?>'">
</freelancer_award>