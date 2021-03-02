@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
@php
    $employees      = Helper::getEmployeesList();
    $departments    = App\Department::all();
    $locations      = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles          = Spatie\Permission\Models\Role::all()->toArray();
    $register_form = App\SiteManagement::getMetaValue('reg_form_settings');
    $reg_one_title = !empty($register_form) && !empty($register_form[0]['step1-title']) ? $register_form[0]['step1-title'] : trans('lang.join_for_good');
    $reg_one_subtitle = !empty($register_form) && !empty($register_form[0]['step1-subtitle']) ? $register_form[0]['step1-subtitle'] : trans('lang.join_for_good_reason');
    $reg_two_title = !empty($register_form) && !empty($register_form[0]['step2-title']) ? $register_form[0]['step2-title'] : trans('lang.pro_info');
    $reg_two_subtitle = !empty($register_form) && !empty($register_form[0]['step2-subtitle']) ? $register_form[0]['step2-subtitle'] : '';
    $term_note = !empty($register_form) && !empty($register_form[0]['step2-term-note']) ? $register_form[0]['step2-term-note'] : trans('lang.agree_terms');
    $reg_three_title = !empty($register_form) && !empty($register_form[0]['step3-title']) ? $register_form[0]['step3-title'] : trans('lang.almost_there');
    $reg_three_subtitle = !empty($register_form) && !empty($register_form[0]['step3-subtitle']) ? $register_form[0]['step3-subtitle'] : trans('lang.acc_almost_created_note');
    $register_image = !empty($register_form) && !empty($register_form[0]['register_image']) ? '/uploads/settings/home/'.$register_form[0]['register_image'] : 'images/work.jpg';
    $reg_page = !empty($register_form) && !empty($register_form[0]['step3-page']) ? $register_form[0]['step3-page'] : '';
    $reg_four_title = !empty($register_form) && !empty($register_form[0]['step4-title']) ? $register_form[0]['step4-title'] : trans('lang.congrats');
    $reg_four_subtitle = !empty($register_form) && !empty($register_form[0]['step4-subtitle']) ? $register_form[0]['step4-subtitle'] : trans('lang.acc_creation_note');
    $show_emplyr_inn_sec = !empty($register_form) && !empty($register_form[0]['show_emplyr_inn_sec']) ? $register_form[0]['show_emplyr_inn_sec'] : 'true';
    $show_reg_form_banner = !empty($register_form) && !empty($register_form[0]['show_reg_form_banner']) ? $register_form[0]['show_reg_form_banner'] : 'true';
    $reg_form_banner = !empty($register_form) && !empty($register_form[0]['reg_form_banner']) ? $register_form[0]['reg_form_banner'] : null;
    $selected_registration_type = !empty($register_form) && !empty($register_form[0]['registration_type']) ? $register_form[0]['registration_type'] : 'multiple';
    $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
    $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
@endphp
@php $breadcrumbs = Breadcrumbs::generate('registerPage'); @endphp
<style type="text/css">
	.help-block > strong{
		color: red;
	}
</style>
<section class="wt-haslayout wt-dbsectionspace" id="profile_settings">
        <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 float-right">
                @if (Session::has('message'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                    </div>
                @endif
                <div style="padding: 20px;" class="wt-dashboardbox">
                	<div class="wt-dashboardboxcontent wt-categoriescontentholder">
                                <form method="POST" action="{{route('users.postEditUser')}}" class="wt-formtheme wt-formregister" id="register_form">
                                    @csrf
                                    <fieldset class="wt-registerformgroup">
                                        <div class="wt-haslayout">
                                            <div class="wt-registerhead">
                                                <div class="wt-title">
                                                    <h3>Edit User</h3>
                                                </div>
                                                <div class="wt-description">
                                                    <p>{{{ $reg_one_subtitle }}}</p>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="text" name="first_name" class="form-control" placeholder="{{{ trans('lang.ph_first_name') }}}" value="{{$user->first_name}}" >
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <span class="help-block">
                                                    <strong ><?php echo @$errors->first('first_name'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input type="text" name="last_name" class="form-control" placeholder="{{{ trans('lang.ph_last_name') }}}" value="{{$user->last_name}}" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('last_name'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="user_email" type="email" class="form-control" name="email" placeholder="{{{ trans('lang.ph_email') }}}" value="{{$user->email}}{{ old('email') }}" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('email'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="mobile_number" type="number" class="form-control" name="mobile_number" placeholder="91 Enter Mobile Number with Country code" value="{{$user->mobile_number}}{{ old('mobile_number') }}" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('mobile_number'); ?></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </fieldset>
                                    {{-- <div class="wt-haslayout"> --}}
                                        <fieldset class="wt-registerformgroup">
                                            @if (!empty($locations))
                                                <div class="form-group">
                                                    <span class="wt-select">
                                                        {!! Form::select('locations', $locations, $user->location_id, array('placeholder' => trans('lang.select_locations'))) !!}
                                                        <span class="help-block" >
                                                            <strong ><?php echo @$errors->first('locations'); ?></strong>
                                                        </span>
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="form-group form-group-half">
                                                <input id="password" type="password" class="form-control" name="password" placeholder="{{{ trans('lang.ph_pass') }}}" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('password'); ?></strong>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{{ trans('lang.ph_retry_pass') }}}" >
                                                <span class="help-block" >
                                                    <strong ><?php echo @$errors->first('password_confirmation'); ?></strong>
                                                </span>
                                            </div>
                                        </fieldset>
                                        <fieldset class="wt-formregisterstart">
                                            <div class="wt-title wt-formtitle">
                                                <h4>Change Role</h4>
                                            </div>
                                            @if(!empty($roles))
                                                {{--<ul class="wt-accordionhold wt-formaccordionhold accordion">
                                                    @foreach ($roles as $key => $role)
                                                        @if (!in_array($role['id'] == 1, $roles))
                                                            <li>
                                                                <div class="wt-accordiontitle" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                                                    <span class="wt-radio">
                                                                    <input id="wt-company-{{$key}}" type="radio" name="role" value="{{{ $role['role_type'] }}}" >
                                                                    <label for="wt-company-{{$key}}">
                                                                        {{ $role['name'] === 'boutique' ? trans('lang.freelancer') : trans('lang.employer')}}
                                                                        <span> 
                                                                            ({{ $role['name'] === 'boutique' ? trans('lang.signup_as_freelancer') : trans('lang.signup_as_country')}})
                                                                        </span>
                                                                    </label>
                                                                    </span>
                                                                </div>
                                                                @if ($role['role_type'] === 'employer')
                                                                    @if ($show_emplyr_inn_sec === 'true')
                                                                        <div class="wt-accordiondetails collapse show" id="collapseOne" aria-labelledby="headingOne" >
                                                                            <div class="wt-radioboxholder">
                                                                                <div class="wt-title">
                                                                                    <h4>{{{ trans('lang.no_of_employees') }}}</h4>
                                                                                </div>
                                                                                @foreach ($employees as $key => $employee)
                                                                                    <span class="wt-radio">
                                                                                        <input id="wt-just-{{{$key}}}" type="radio" name="employees" value="{{{$employee['value']}}}" >
                                                                                        <label for="wt-just-{{{$key}}}">{{{$employee['title']}}}</label>
                                                                                    </span>
                                                                                @endforeach
                                                                            </div>
                                                                            @if ($departments->count() > 0)
                                                                                <div class="wt-radioboxholder">
                                                                                    <div class="wt-title">
                                                                                        <h4>{{{ trans('lang.your_department') }}}</h4>
                                                                                    </div>
                                                                                    @foreach ($departments as $key => $department)
                                                                                        <span class="wt-radio">
                                                                                            <input id="wt-department-{{{$department->id}}}" type="radio" name="department" value="{{{$department->id}}}" >
                                                                                            <label for="wt-department-{{{$department->id}}}">{{{$department->title}}}</label>
                                                                                        </span>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="form-group wt-othersearch d-none">
                                                                                    <input type="text" name="department_name" class="form-control" placeholder="{{{ trans('lang.enter_department') }}}">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif    
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul> --}}

                                                <ul class="wt-accordionhold wt-formaccordionhold accordion">
                                                    @foreach ($roles as $key => $role)
                                                        @if (!in_array($role['id'], [1,2,3]))
                                                            <li>
                                                                <div class="wt-accordiontitle" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                                                    <span class="wt-radio">
                                                                    <input id="wt-company-{{$key}}" type="radio" name="role" value="{{{ $role['role_type'] }}}" {{($rolea->id == $role['id'])? 'checked' : ''}} >
                                                                    <label for="wt-company-{{$key}}">
                                                                        {{$role['name']}}
                                                                        <span> 
                                                                            
                                                                        </span>
                                                                    </label>
                                                                    </span>
                                                                </div>
                                                                                                                    
                                                            </li>
                                                            
                                                        @endif
                                                    @endforeach
                                                </ul>

                                                <span class="help-block">
                                                    <strong ><?php echo @$errors->first('role'); ?></strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                        <fieldset class="wt-termsconditions">
                                            <div class="wt-checkboxholder">
                                                <!-- <span class="wt-checkbox">
                                                    <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                                                    <label for="termsconditions"><span>{{{ $term_note }}}</span></label>
                                                    <span class="help-block" v-if="form_step2.termsconditions_error">
                                                        <strong style="color: red;" v-cloak>{{trans('lang.register_termsconditions_error')}}</strong>
                                                    </span>
                                                </span> -->
                                                <button type="submit" class="wt-btn">{{{ trans('lang.submit') }}}</a>
                                            </div>
                                        </fieldset>
                                    {{-- </div> --}}
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
