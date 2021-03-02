@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
<style type="text/css">
    .skill-dynamic-field input{
        background: unset; 
    border: 1px solid;
    }
    .afterDiv{
        display: none;
    }
    .btn{
        width: unset !important;
        height: unset !important;
    }
</style>
    <div class="wt-dbsectionspace wt-haslayout la-ps-freelancer">
        <div class="freelancer-profile" id="user_profile">
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                            @include('back-end.admin.users.profile-settings.tabs')
                        <div class="wt-tabscontent tab-content">
                            @if (Session::has('message'))
                                <div class="flash_msg">
                                    <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                                </div>
                            @endif
                            @if ($errors->any())
                                <ul class="wt-jobalerts">
                                    @foreach ($errors->all() as $error)
                                        <div class="flash_msg">
                                            <flash_messages :message_class="'danger'" :time ='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                                        </div>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                                {!! Form::open(['url' => route('storeProfileSettingsFreelancer',$userDetails->id), 'class' =>'wt-userform', 'id' => 'freelancer_profile']) !!}
                                @csrf
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        @include('back-end.admin.users.profile-settings.personal-detail.detail')
                                    </div>
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        <div class="wt-tabscontenttitle">
                                            <h2>Social Details</h2>
                                        </div>
                                        <div class="wt-formtheme">
                                            <fieldset>
                                                <h5 class="text-danger">Facebook Page Name <br><small>Please enter your page name from the url of Facebook. <br> <strong>Eg: https://www.facebook.com/WomansDayAUS </strong> You have to take only page name from the url. In this example you have to copy <strong>WomansDayAUS</strong> from the url & enter in this field.</small></h5>
                                                <div class="form-group">
                                                    <input type="text" name="facebook_pageName" class="form-control" placeholder="WomansDayAUS" value="{{@$userDetails->facebook_pageName}}">
                                                </div>
                                                <h5 class="text-danger">Instagram User Name <br><small>Please enter your Instagram Username to get latest feed on your profile</small></h5>
                                                <div class="form-group">
                                                    <input type="text" name="instagram_username" class="form-control" placeholder="instagram" value="{{@$userDetails->instagram_username}}">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="wt-profilephoto wt-tabsinfo">
                                            @include('back-end.admin.users.profile-settings.personal-detail.profile_photo') 
                                    </div>
                                    @if (!empty($options) && $options['banner_option'] === 'true')
                                        <div class="wt-bannerphoto wt-tabsinfo">
                                                @include('back-end.admin.users.profile-settings.personal-detail.profile_banner')
                                        </div>
                                    @endif
                                    <div class="wt-location wt-tabsinfo">
                                            @include('back-end.admin.users.profile-settings.personal-detail.location')
                                    </div>
                                    <div class="wt-skills la-skills-holder wt-tabsinfo">
                                            @include('back-end.admin.users.profile-settings.personal-detail.skill')   
                                    </div>
                                    <div class="wt-videos-holder wt-tabsinfo la-footer-setting">
                                            @include('back-end.admin.users.profile-settings.personal-detail.videos')   
                                    </div>
                                    <div class="wt-updatall">
                                        <i class="ti-announcement"></i>
                                        <span>{{{ trans('lang.save_changes_note') }}}</span>
                                        {!! Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn', 'id'=>'submit-profile']) !!}
                                    </div>
                                {!! form::close(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('body').on('click','.addSkill',function(e){
        e.preventDefault();
        skillId = $('.freelancer_skill').val();
        text = $( ".freelancer_skill option:selected" ).text();
        userId = "{{$userDetails->id}}";
        selected_rating_value = $('.selected_rating_value').val();
        status = 'add';
        $.ajax({
            type:'get',
            data:{skillId:skillId,userId:userId,selected_rating_value:selected_rating_value,status:status},
            url:"{{route('freelancerUpdateSkills')}}",
            success:function(res){
                // location.reload();
                html = '<li class="skill-element"><div class="wt-dragdroptool"><a href="javascript:void(0)" class="lnr lnr-menu"></a></div><span class="skill-dynamic-html">'+text+' (<em class="skill-val">'+selected_rating_value+'</em>%)</span> <span class="skill-dynamic-field sss"><input value="'+selected_rating_value+'" class="valueField" type="number"></span> <div class="wt-rightarea afterDiv"><a href="javascript:void(0);" skillId="'+res.skillId+'" class="btn btn-sm btn-primary saveEdit">Save</a> <a href="javascript:void(0);" class="btn btn-sm btn-primary cancelEdit">Cancel</a></div><div class="wt-rightarea beforeDiv"><a href="javascript:void(0);" class="wt-addinfo"><i skillId="'+res.skillId+'" class="lnr lnr-pencil editSkill"></i></a> <a href="javascript:void(0);" class="wt-deleteinfo delete-skill"><i skillId="'+res.skillId+'" class="lnr lnr-trash deleteSkill"></i></a></div></li>';
                $('#skill_list').append(html);
            },
            error:function(res){
                alert('Error in Request!');
            }
        })
    })
    $('body').on('click','.deleteSkill',function(e){
        e.preventDefault();
        skillId = $(this).attr('skillId');
        userId = "{{$userDetails->id}}";
        status = 'delete';
        that = $(this);
        $.ajax({
            type:'get',
            data:{skillId:skillId,userId:userId,status:status},
            url:"{{route('freelancerUpdateSkills')}}",
            success:function(res){
                // location.reload();
                $(this).parent('a').parent('div').parent('li').remove();
            },
            error:function(res){
                alert('Error in Request!');
            }
        })
    })

    $('body').on('click','.editSkill',function(e){
        e.preventDefault();
        $(this).parent('a').parent('div').parent('li').find('.skill-dynamic-html').hide();
        $(this).parent('a').parent('div').parent('li').find('.skill-dynamic-field').show();
        $(this).parent('a').parent('div').parent('li').find('.beforeDiv').hide();
        $(this).parent('a').parent('div').parent('li').find('.afterDiv').show();
    });
    $('body').on('click','.cancelEdit',function(e){
        e.preventDefault();
        $(this).parent('div').parent('li').find('.skill-dynamic-html').show();
        $(this).parent('div').parent('li').find('.skill-dynamic-field').hide();
        $(this).parent('div').parent('li').find('.beforeDiv').show();
        $(this).parent('div').parent('li').find('.afterDiv').hide();
    })
    $('body').on('click','.saveEdit',function(e){
        e.preventDefault();
        skillId = $(this).attr('skillId');
        userId = "{{$userDetails->id}}";
        selected_rating_value = $(this).parent('div').parent('li').find('.valueField').val();
        status = 'add';
        that = $(this);
        $.ajax({
            type:'get',
            data:{skillId:skillId,userId:userId,selected_rating_value:selected_rating_value,status:status},
            url:"{{route('freelancerUpdateSkills')}}",
            success:function(res){
                //location.reload();
                that.parent('div').hide();
                that.parent('div').parent('li').find('.sss').hide();
                that.parent('div').parent('li').find('.skill-dynamic-html').show();
                that.parent('div').parent('li').find('.beforeDiv').show();
                that.parent('div').parent('li').find('.skill-val').text(selected_rating_value);
                //console.log(res);   
            },
            error:function(res){
                alert('Error in Request!');
            }
        })
    })
</script>
@endpush