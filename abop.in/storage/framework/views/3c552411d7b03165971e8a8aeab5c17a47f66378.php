<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="<?php echo e(\Request::route()->getName()==='EmpeditUserProfile'? 'active': ''); ?>" href="<?php echo e(route('EmpeditUserProfile',$id)); ?>"><?php echo e(trans('lang.profile_detail')); ?></a>
        </li>
    </ul>
</div>