<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='EmpeditUserProfile'? 'active': '' }}}" href="{{{ route('EmpeditUserProfile',$id) }}}">{{{ trans('lang.profile_detail') }}}</a>
        </li>
    </ul>
</div>