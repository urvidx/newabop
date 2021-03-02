<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='editUserProfile'? 'active': '' }}}" href="{{{ route('editUserProfile',$id) }}}">{{{ trans('lang.personal_detail') }}}</a>
        </li>
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='userfree.experienceEducation'? 'active': '' }}}" href="{{{ route('userfree.experienceEducation',$id) }}}">{{{ trans('lang.experience_education') }}}</a>
        </li>
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='userfree.projectAwards'? 'active': '' }}}" href="{{{ route('userfree.projectAwards',$id) }}}">{{{ trans('lang.project_awards') }}}</a>
        </li>
        <li class="nav-item">
            <a class="" href="{{{ route('userListing') }}}">Back to Users</a>
        </li>
    </ul>
</div>
