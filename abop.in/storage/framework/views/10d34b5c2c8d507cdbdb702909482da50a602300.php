
<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>    
    <?php if(file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php'))): ?>
        <?php echo $__env->make('extend.front-end.includes.inner-banner', 
            ['title' => trans('lang.article_detail'), 'inner_banner' => $article_inner_banner , 'show_banner' => $show_article_banner]
        , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?> 
        <?php echo $__env->make('front-end.includes.inner-banner', 
            ['title' =>  trans('lang.article_detail'), 'inner_banner' => $article_inner_banner, 'show_banner' => $show_article_banner ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-articlesingle-holder wt-bgwhite">
                        <div class="wt-articlesingle-content">
                            <figure class="wt-singleimg-one">
                                <img src="<?php echo e(asset(Helper::getImage('uploads/articles', $article->banner, 'large-', 'large-default-article.png'))); ?>" alt="<?php echo e($article->title); ?>">
                            </figure>
                            <div class="wt-title">
                                <h2><?php echo e($article->title); ?></h2>
                            </div>
                            <ul class="wt-postarticlemeta">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <span><?php echo e(\Carbon\Carbon::parse($article->updated_at)->format('M d, Y')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-user"></i>
                                        <span><?php echo e(\App\Helper::getUserName($article->user_id)); ?></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="wt-description">
                                <?php echo htmlspecialchars_decode(stripslashes($article->description)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script>
            if (APP_DIRECTION == 'rtl') {
                var direction = true;
            } else {
                var direction = false;
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>