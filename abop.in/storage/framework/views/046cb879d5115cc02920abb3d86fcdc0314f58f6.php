
<?php $__env->startPush('stylesheets'); ?>
<style type="text/css">
    .hide{
        display: none;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wt-haslayout wt-manage-account wt-dbsectionspace la-setting-holder" id="settings">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    <div class="wt-dashboardtabs">
                        <ul class="wt-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="active" data-toggle="tab" href="#wt-banner"><?php echo e(trans('lang.banner_settings')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#wt-sections"><?php echo e(trans('lang.sections')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#wt-services-sections"><?php echo e(trans('lang.services_section')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#wt-slider">Slider Settings</a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#wt-workDetail">Work Detail Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-securityhold tab-pane active la-banner-settings" id="wt-banner">
                            <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'home-settings-form', '@submit.prevent'=>'submitHomeSettings']); ?>


                                    <?php echo $__env->make('back-end.admin.home-page-settings.banner-settings.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="wt-updatall la-updateall-holder">
                                    <i class="ti-announcement"></i>
                                    <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                                    <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

                                </div>
                                
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="wt-securityhold tab-pane la-section-settings" id="wt-sections">
                            <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'section-settings-form', '@submit.prevent'=>'submitSectionSettings']); ?>

                                    <?php echo $__env->make('back-end.admin.home-page-settings.sections.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="wt-updatall la-updateall-holder">
                                    <i class="ti-announcement"></i>
                                    <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                                    <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

                                </div>
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="wt-securityhold tab-pane la-section-settings" id="wt-services-sections">
                                <?php echo $__env->make('back-end.admin.home-page-settings.services-section', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="wt-securityhold tab-pane la-slider-settings" id="wt-slider">
                            <?php echo $__env->make('back-end.admin.home-page-settings.slider_settings', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="wt-securityhold tab-pane la-slider-settings" id="wt-workDetail">
                            <?php echo $__env->make('back-end.admin.home-page-settings.workDetail_settings', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div style="padding: 2pc;" class="modal-content formData ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Work Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" id="editWorkForm" class="editWorkForm" action="javascript:void(0)" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="wt-location wt-tabsinfo">
                <h6><?php echo e(trans('lang.title')); ?></h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                           <input type="text" class="form-control slidetitle editSlidetitle" name="title" required="required">
                           <input type="hidden" name="id" class="editWorkId">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>Description</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                            <input type="text" name="description" class="form-control slidedescription editslidedescription" required="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>Image</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control fileimage editfileimage">
                            <img src="" width="80" class="img editshowimage">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-updatall la-updateall-holder">
                <i class="ti-announcement"></i>
                <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                <button type="submit" class="wt-btn addWorkDetail">Save Changes</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

<!-- SliderModel -->
<div class="modal fade bd-slider-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div style="padding: 2pc;" class="modal-content formData ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Slide Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" id="editslideform" class="editslideform" action="javascript:void(0)" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
            <div class="wt-location wt-tabsinfo">
                <h6><?php echo e(trans('lang.title')); ?></h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                           <input type="text" class="form-control slidetitle editmainslidetitle" name="title" required="required">
                           <input type="hidden" name="id" class="editmainWorkId">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>Description</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                            <input type="text" name="description" class="form-control slidedescription editmainslidedescription" required="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-location wt-tabsinfo">
                <h6>Image</h6>
                <div class="wt-settingscontent">
                    <div class="wt-formtheme ">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control fileimage editmainfileimage" >
                            <img src="" width="80" class="img editmainshowimage">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wt-updatall la-updateall-holder">
                <i class="ti-announcement"></i>
                <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                <button type="submit" class="wt-btn addsliderImage">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    $('.addWorkSection').click(function(){
        $('.mainWorkDiv').removeClass('hide');
        $(this).addClass('hide');
    })

    $('.addSliderSection').click(function(){
        var clone = $('.mainDiv').clone().removeClass('hide').removeClass('mainDiv').addClass('FrmImgUpload').appendTo('.resultDiv');
        $('.addSliderSection').addClass('hide');
        //clone.removeClass('hide').appendTo('.resultDiv');
    })
    // $('body').on('click','.addsliderImage',function(e){
    //     e.preventDefault();
    //     var imge = new FormData($(".fileimage"));
    //     console.log(imge);return false;
    //     var title = $('.slidetitle').val();
    //     var description = $('.slidedescription').val();
    //     $.ajax({
    //         type:'get',
    //         url:"<?php echo e(route('saveSliderImage')); ?>",
    //         data:{imge:imge,title:title,description:description},
    //         success:function(res){

    //         },error:function(res){

    //         }
    //     })
    // })
$(document).ready(function () {
 
// $('#FrmImgUpload').on('submit',(function(e) {
$('body').on('submit','#FrmImgUpload',function(e){ 
$.ajaxSetup({
 
headers: {
 
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 
}
 
});
 
e.preventDefault();
 
var formData = new FormData(this);
 
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
 
   type:'POST',
 
   url: "<?php echo e(url('admin/saveSliderImage')); ?>",
 
   data:formData,
 
   cache:false,
 
   contentType: false,
 
   processData: false,
 
   success:function(data){
        
        $('.FrmImgUpload').remove();
       //$('#ImgOri').attr('src', "/profile_images/"+ data.photo_name);
        var url = "<?php echo e(url('/public/sliderImages/thumbnail/')); ?>"+'/'+data.image;
       // $('#ImgThumb').attr('src', "/profile_images/thumbnail/"+ data.photo_name);

       var htmls = '<div style="margin-bottom: inherit;" class="wt-settingscontent border"><div class="wt-formtheme "><h5>Title: '+data.title+'</h5><h4>Description: '+data.description+'</h4><img src="'+url+'"  class=""><button id="'+data.id+'" class="wt-btn removeSlide">Remove</button></div></div>';
       $('.slidesShows').append(htmls);
       //htmls.appendTo('.slidesShows');

    $('.addSliderSection').removeClass('hide');
   },
 
   error: function(data){
        alert('error in request');
       //console.log(data);
 
   }
 
});
 
 });

//}));
 

$('body').on('submit','#WorkDetailImgUpload',function(e){ 
$.ajaxSetup({
 
headers: {
 
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 
}
 
});
 
e.preventDefault();
 
var formData = new FormData(this);
 
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
 
   type:'POST',
 
   url: "<?php echo e(url('admin/saveWorkDetail')); ?>",
 
   data:formData,
 
   cache:false,
 
   contentType: false,
 
   processData: false,
 
   success:function(data){
        
        $('.mainWorkDiv').addClass('hide');
        $('#WorkDetailImgUpload').trigger("reset");
       //$('#ImgOri').attr('src', "/profile_images/"+ data.photo_name);
        var url = "<?php echo e(url('/public/uploads/workdetails/')); ?>"+'/'+data.icon;
       // $('#ImgThumb').attr('src', "/profile_images/thumbnail/"+ data.photo_name);
       deletUrl = "<?php echo e(url('admin/deleteWorkImage')); ?>"+'/'+data.id;
       var htmls = '<tr><td>'+data.id+'</td><td><img width="60" src="'+url+'" ></td><td>'+data.title+'</td><td>'+data.description+'</td><td><a class="wt-btn" href="'+deletUrl+'" >Delete</a></td></tr>';
       $('.worktbody').append(htmls);
       //$('.slidesShows').append(htmls);
       //htmls.appendTo('.slidesShows');

    $('.addWorkSection').removeClass('hide');
   },
 
   error: function(data){
        alert('error in request');
       //console.log(data);
 
   }
 
});
 
 });
});
 $('body').on('click','.removeSlide',function(e){
    e.preventDefault();
    that = $(this);
    var id = $(this).attr('id');
    if (id != '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "<?php echo e(url('admin/deleteSliderImage')); ?>",
            data:{id:id},
            success:function(res){
                that.parent('.wt-formtheme').parent('.wt-settingscontent').remove();
            },error:function(res){
                //alert('error in request');
                that.parent('.wt-formtheme').parent('.wt-settingscontent').remove();
            }
        })
    }
 })
  $('body').on('click','.deletebtnwork',function(e){
    e.preventDefault();
    that = $(this);
    var id = $(this).attr('id');
    if (id != '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "<?php echo e(url('admin/deleteWorkImage')); ?>"+'/'+id,
            data:{id:id},
            success:function(res){
                that.parent('td').parent('tr').remove();
            },error:function(res){
                //alert('error in request');
                that.parent('td').parent('tr').remove();
            }
        })
    }
 })

$('body').on('click','.editbtnwork',function(e){
    e.preventDefault();
    that = $(this);
    id = that.attr('id');
    $('.editWorkId').val(id);
    image = that.attr('image');
    $('.editshowimage').attr('src',image);
    workTitle = that.attr('workTitle');
    $('.editSlidetitle').val(workTitle);
    descreption = that.attr('descreption');
    $('.editslidedescription').val(descreption);
    $('.editfileimage').val('');

})

$('body').on('submit','#editWorkForm',function(e){ 
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url: "<?php echo e(url('admin/updateWorkDetail')); ?>",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            //console.log(data);
            var url = "<?php echo e(url('/public/uploads/workdetails/')); ?>"+'/'+data.icon;
            var mainss = $('.worktbody').find('.'+data.id+'');
            //alert($('.worktbody').find('.'+data.id+'').class());
            mainss.find('.workDetailTitle').text(data.title);
            mainss.find('.WorkDetailDescription').text(data.description);
            mainss.find('.workDetailImage').children('img').attr('src',url);
            //$('.bd-example-modal-lg').modal('hide');
            $('.close').click();
        },error: function(data){
            alert('error in request');
           //console.log(data);
        }
    }); 
});

$('body').on('click','.editsliderbtn',function(e){
    e.preventDefault();
    that = $(this);
    id = that.attr('id');
    $('.editmainWorkId').val(id);
    image = that.attr('image');
    $('.editmainshowimage').attr('src',image);
    workTitle = that.attr('workTitle');
    $('.editmainslidetitle').val(workTitle);
    descreption = that.attr('descreption');
    $('.editmainslidedescription').val(descreption);
    $('.editmainfileimage').val('');

})


$('body').on('submit','#editslideform',function(e){ 
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url: "<?php echo e(url('admin/editSliderImage')); ?>",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            //console.log(data);
            var url = "<?php echo e(url('/public/sliderImages/thumbnail/')); ?>"+'/'+data.image;
            var mainsss = $('.worktbodymain').find('.'+data.id+'');
            // //alert($('.worktbody').find('.'+data.id+'').class());
             mainsss.find('.sliderDetailTitle').text(data.title);
             mainsss.find('.sliderDetailDescription').text(data.description);
             mainsss.find('.sliderDetailImage').children('img').attr('src',url);
             //$('.bd-slider-modal-lg').modal('hide');
             //$('.bd-slider-modal-lg').modal().hide();
             $('.close').click();

        },error: function(data){
            alert('error in request');
           //console.log(data);
        }
    }); 
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>