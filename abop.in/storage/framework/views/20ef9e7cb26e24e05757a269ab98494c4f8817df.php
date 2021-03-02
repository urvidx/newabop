<div class="wt-tabscontenttitle la-switch-option">
<h6>Add Slider Images</h6>
</div>
<form method="post" id="FrmImgUpload" class=" mainDiv hide" action="javascript:void(0)" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
<div class="wt-location wt-tabsinfo">
    <h6><?php echo e(trans('lang.title')); ?></h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
               <input type="text" class="form-control slidetitle" name="title" required="required">
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>Description</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
                <input type="text" name="description" class="form-control slidedescription" required="required">
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>Image</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
                <input type="file" name="image" class="form-control fileimage" required="required">
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
<div class="resultDiv">

    <button class="wt-btn addSliderSection">Add Slider Image</button>
</div>

<div class="container">
     <div class="wt-location wt-tabsinfo">
        <br>
         <h6 class="slidesShows">Slides</h6>
         <table class="table mt-2 wt-tablecategories">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                    
            </thead>
            <tbody class="worktbodymain">
                <?php $__empty_1 = true; $__currentLoopData = $sliderImgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="<?php echo e($img->id); ?>">
                    <td class="sliderdetailId"><?php echo e($img->id); ?></td>
                    <td class="sliderDetailImage"><img width="100" src="<?php echo e(url('/public/sliderImages/thumbnail/'.$img->image)); ?>"></td>
                    <td class="sliderDetailTitle"><?php echo e($img->title); ?></td>
                    <td class="sliderDetailDescription"><?php echo e($img->description); ?></td>
                    <td><button  id="<?php echo e($img->id); ?>" class="removeSlide">Remove</button>
                        <a  data-toggle="modal" data-target=".bd-slider-modal-lg" id="<?php echo e($img->id); ?>" class=" editsliderbtn" href="#" id="<?php echo e($img->id); ?>" image="<?php echo e(url('/public/sliderImages/thumbnail/'.$img->image)); ?>" workTitle="<?php echo e($img->title); ?>" descreption="<?php echo e($img->description); ?>">Edit</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr class="text-center">
                    <td colspan="5">
                        No Data Found.
                    </td>
                </tr>
                <?php endif; ?>
                
                
            </tbody>
        </table>
<!-- 
         -->
     </div>
</div>
