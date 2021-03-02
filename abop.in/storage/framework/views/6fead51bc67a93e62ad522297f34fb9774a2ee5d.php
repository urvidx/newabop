<div class="wt-tabscontenttitle">
    <h2>User Skills</h2>
</div>
<!-- <user_skills :ph_rate_skills="'<?php echo e(trans('lang.ph_rate_skills')); ?>'"></user_skills> -->
<div>
   <div class="wt-formtheme wt-skillsform">
      <!----> 
      <fieldset>
         <div class="form-group">
            <div class="form-group-holder">
               <span class="wt-select">
                  <select id="freelancer_skill" class="freelancer_skill">
                     <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->title); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                     <?php endif; ?>
                  </select>
               </span>
               <input type="number" placeholder="Rate Your Skill (0% to 100%)" id="selected_rating_value" class="form-control selected_rating_value">
            </div>
         </div>
         <div class="form-group wt-btnarea"><a href="javascript:void(0);" class="wt-btn addSkill">Add Skills</a></div>
      </fieldset>
   </div>
   <div class="wt-myskills">
      <ul id="skill_list" class="sortable list">
      	<?php $__empty_1 = true; $__currentLoopData = $freelancer_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fsk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      	<?php
      	$skillName = DB::table('skills')
                ->where(['id'=>$fsk])->pluck('title');
                //echo'<pre>';print_r($skillName[0]);
      	$skillUser = DB::table('skill_user')
                ->where(['user_id'=>$userDetails->id,'skill_id'=>$fsk])->first();
      	?>
      	<li class="skill-element">
	        <div class="wt-dragdroptool"><a href="javascript:void(0)" class="lnr lnr-menu"></a></div>
	        <span class="skill-dynamic-html">
	        <?php echo e(@$skillName[0]); ?> (<em class="skill-val"><?php echo e($skillUser->skill_rating ?? 0); ?></em>%)</span> 
	        <span class="skill-dynamic-field sss">
	        	<input value="<?php echo e($skillUser->skill_rating ?? 0); ?>" class="valueField" type="number">
	        </span> 
	        <div class="wt-rightarea afterDiv">
	        	<a href="javascript:void(0);" skillId="<?php echo e($fsk); ?>" class="btn btn-sm btn-primary saveEdit">Save</a> 
	        	<a href="javascript:void(0);" class="btn btn-sm btn-primary cancelEdit">Cancel</a>
	        </div>
	        <div class="wt-rightarea beforeDiv">
	        	<a href="javascript:void(0);" class="wt-addinfo"><i skillId="<?php echo e($fsk); ?>" class="lnr lnr-pencil editSkill"></i></a> 
	        	<a href="javascript:void(0);" class="wt-deleteinfo delete-skill"><i skillId="<?php echo e($fsk); ?>" class="lnr lnr-trash deleteSkill"></i></a>
	        </div>
	      </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <?php endif; ?>
      </ul>
   </div>
</div>