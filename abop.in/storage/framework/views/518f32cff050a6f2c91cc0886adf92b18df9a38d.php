
<?php $__env->startPush('sliderStyle'); ?>
    <link href="<?php echo e(asset('css/antd.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="pages-listing wt-page-builder" id="pages-list">
        <section class="wt-haslayout wt-dbsectionspace">
            <create-new-page
                :parent_pages="'<?php echo e(json_encode($parent_page)); ?>'"
                :section_list="'<?php echo e(json_encode($sections)); ?>'"
                :app_styles = "'<?php echo e(json_encode($app_style_list)); ?>'"
                :access_type="'<?php echo e($access_type); ?>'"
                :slider_styles="'<?php echo e(json_encode($slider_style_list)); ?>'"
            >
            </create-new-page>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>