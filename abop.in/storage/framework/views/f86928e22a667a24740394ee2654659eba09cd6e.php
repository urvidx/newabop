<div class="wt-tabscontenttitle la-switch-option">
	<h6>Work Detail Setting</h6>
</div>
<form method="post" id="WorkDetailImgUpload" class=" mainWorkDiv hide" action="javascript:void(0)" enctype="multipart/form-data">
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
    <button type="submit" class="wt-btn addWorkDetail">Save Changes</button>
</div>
</form>
<div class="resultDiv">
    <button class="wt-btn addWorkSection">Add</button>
</div>
<table class="table mt-2 wt-tablecategories">
	<thead>
		<tr>
			<th>Sr. No.</th>
			<th>Icon</th>
			<th>Title</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
			
	</thead>
	<tbody class="worktbody">
		<?php $__empty_1 = true; $__currentLoopData = $workdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr class="<?php echo e($workdetail->id); ?>">
			<td class="workdetailId"><?php echo e($workdetail->id); ?></td>
			<td class="workDetailImage"><img width="60" src="<?php echo e(asset('public/uploads/workdetails/'.$workdetail->icon)); ?>"></td>
			<td class="workDetailTitle"><?php echo e($workdetail->title); ?></td>
			<td class="WorkDetailDescription"><?php echo e($workdetail->description); ?></td>
			<td><a style="margin: 5px;" id="<?php echo e($workdetail->id); ?>" class="wt-btn deletebtnwork" href="#">Delete</a>
				<a style="margin: 5px;" data-toggle="modal" data-target=".bd-example-modal-lg" id="<?php echo e($workdetail->id); ?>" class="wt-btn editbtnwork" href="#" id="<?php echo e($workdetail->id); ?>" image="<?php echo e(asset('public/uploads/workdetails/'.$workdetail->icon)); ?>" workTitle="<?php echo e($workdetail->title); ?>" descreption="<?php echo e($workdetail->description); ?>">Edit</a></td>
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