<div class="la-inner-pages wt-haslayout">
<?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'order_settings_form', '@submit.prevent'=>'submitOrderSettings']); ?>

    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2><?php echo e(trans('lang.new_order_admin_email')); ?></h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p><?php echo e(trans('lang.variables')); ?></p></div>
            <ul>
                <li>%name% => user name</li>
                <li>%order_id% => order_id</li>
                <li>%signature% => signature</li>
            </ul>
        </div>
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                <?php echo Form::text( 'admin_order[subject]', e($new_order_subject), ['class' =>'form-control', 'placeholder' => trans('lang.subject')] ); ?>

            </div>
        </div>
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                <?php echo Form::textarea('admin_order[email_content]', e($new_order_content), array('class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.add_template_content')) ); ?>

            </div>
        </div>
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2><?php echo e(trans('lang.employer_hire_email')); ?></h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p><?php echo e(trans('lang.variables')); ?></p></div>
            <ul>
                <li>%name% => user name</li>
                <li>%order_id% => order_id</li>
                <li>%signature% => signature</li>
            </ul>
        </div>
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                <?php echo Form::text( 'employer_hire[subject]', e($employer_hiring_subject), ['class' =>'form-control', 'placeholder' => trans('lang.subject')] ); ?>

            </div>
        </div>
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                <?php echo Form::textarea('employer_hire[email_content]', e($employer_hiring_content), array('class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceemployereditor', 'placeholder' => trans('lang.add_template_content')) ); ?>

            </div>
        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span><?php echo e(trans('lang.save_changes_note')); ?></span>
        <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

    </div>
<?php echo Form::close(); ?>

</div>
