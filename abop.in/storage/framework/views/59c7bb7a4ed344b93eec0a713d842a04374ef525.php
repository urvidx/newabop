<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="<?php echo e(\Request::route()->getName()==='editUserProfile'? 'active': ''); ?>" href="<?php echo e(route('editUserProfile',$id)); ?>"><?php echo e(trans('lang.personal_detail')); ?></a>
        </li>
        <li class="nav-item">
            <a class="<?php echo e(\Request::route()->getName()==='userfree.experienceEducation'? 'active': ''); ?>" href="<?php echo e(route('userfree.experienceEducation',$id)); ?>"><?php echo e(trans('lang.experience_education')); ?></a>
        </li>
        <li class="nav-item">
            <a class="<?php echo e(\Request::route()->getName()==='userfree.projectAwards'? 'active': ''); ?>" href="<?php echo e(route('userfree.projectAwards',$id)); ?>"><?php echo e(trans('lang.project_awards')); ?></a>
        </li>
        <li class="nav-item">
            <a class="" href="<?php echo e(route('userListing')); ?>">Back to Users</a>
        </li>
    </ul>
</div>
