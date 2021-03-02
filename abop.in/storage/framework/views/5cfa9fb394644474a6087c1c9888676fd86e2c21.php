
<nav id="wt-nav" class="wt-nav navbar-expand-lg">
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lnr lnr-menu"></i>
    </button> -->
    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
        <ul class="navbar-nav">
            <?php if(!empty($pages) || Schema::hasTable('pages')): ?>
                <?php $order=''; $page_order=''; ?>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $page_order = DB::table('metas')
                                        ->select('meta_value')
                                        ->where('meta_key', 'page_order')
                                        ->where('metable_type', 'App\Page')
                                        ->where('metable_id', $page->id)->first();
                        $order = !empty($page_order->meta_value) ? $page_order->meta_value : '';
                        $page_has_child = App\Page::pageHasChild($page->id); $pageID = Request::segment(2);
                        $show_page = \App\SiteManagement::where('meta_key', 'show-page-'.$page->id)->select('meta_value')->pluck('meta_value')->first();
                    ?>
                    <?php if($page->relation_type == 0 && ($show_page == 'true' || $show_page == true)): ?>
                     
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php
                $inner_page  = App\SiteManagement::getMetaValue('inner_page_data');
                $add_f_navbar = !empty($inner_page) && !empty($inner_page[0]['add_f_navbar']) ? $inner_page[0]['add_f_navbar'] : '';
                $add_emp_navbar = !empty($inner_page) && !empty($inner_page[0]['add_emp_navbar']) ? $inner_page[0]['add_emp_navbar'] : '';
                $add_job_navbar = !empty($inner_page) && !empty($inner_page[0]['add_job_navbar']) ? $inner_page[0]['add_job_navbar'] : '';
                $add_service_navbar = !empty($inner_page) && !empty($inner_page[0]['add_service_navbar']) ? $inner_page[0]['add_service_navbar'] : '';
                $add_article_navbar = !empty($inner_page) && !empty($inner_page[0]['add_article_navbar']) ? $inner_page[0]['add_article_navbar'] : '';
                $menu_settings  = App\SiteManagement::getMetaValue('menu_settings');
                $freelancer_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'freelancers') : ""; 
                $employer_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'employers') : ''; 
                $job_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'jobs') : ''; 
                $service_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'services') : ''; 
                $article_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'articles') : ''; 
            ?>
            
            <?php 
                $order=''; $page_order=''; 
                $custom_menus = !empty($menu_settings['custom_links']) ? $menu_settings['custom_links'] : '';
                // dd($custom_menus);
            ?>
            <?php if(!empty($custom_menus)): ?>
                <?php $__currentLoopData = $custom_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_key => $custom_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($custom_value['relation_type'] == 'parent'): ?>
                        <?php 
                            $order = Helper::getCustomMenuPageOrder($custom_value['custom_slug']);
                        ?>
                        <li style="<?php echo e(!empty($order) ? 'order:'.$order : 'order:99'); ?>">
                            <a href="<?php echo e(empty($custom_value['custom_link']) || $custom_value['custom_link'] == '#' ? 'javascript:void(0)' : $custom_value['custom_link']); ?>">
                                <?php echo e($custom_value['custom_title']); ?>

                            </a>
                            <?php 
                            $custom_menu_child = Helper::getCustomMenuChild($custom_value['custom_slug']);
                            ?>
                            <?php if(!empty($custom_menu_child)): ?>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = $custom_menu_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($custom_child) && !empty($custom_child['type']) && $custom_child['type'] == 'custom_menu'): ?>
                                            <li>
                                                <a href="<?php echo e(empty($custom_child['link']) || $custom_child['link'] == '#' ? 'javascript:void(0)' : $custom_child['link']); ?>">
                                                    <?php echo e($custom_child['title']); ?>

                                                </a>
                                            </li>
                                        <?php elseif(!empty($custom_child)): ?> 
                                            <li class="<?php if($pageID == $custom_child['slug'] ): ?> current-menu-item <?php endif; ?>">
                                                <a href="<?php echo e(url('page/'.$custom_child['slug'].'/')); ?>">
                                                    <?php echo e($custom_child['title']); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</nav>