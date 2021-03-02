
<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/lc_lightbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/skins/dark.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/skins/light.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/skins/minimal.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?><?php echo e($user_name); ?> | <?php echo e($tagline); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', "$desc"); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .diplayLarge{
        cursor: pointer;
    }
</style>
    <div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo" style="background-image: url(<?php echo e(asset(Helper::getUserProfileBanner($user->id))); ?>);">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                </div>
            </div>
        </div>
    </div>
    <div class="wt-main-section wt-paddingtopnull wt-haslayout la-profile-holder" id="user_profile">
        <div class="preloader-section" v-if="loading" v-cloak>
            <div class="preloader-holder">
                <div class="loader"></div>
            </div>
        </div>
        <?php if($display_chat == 'true'): ?>
            <?php if(Auth::user()): ?>
                <?php if($profile->user_id != Auth::user()->id): ?>
                    <chat :trans_image_alt="'<?php echo e(trans('lang.img')); ?>'" :ph_new_msg="'<?php echo e(trans('lang.ph_new_msg')); ?>'" :trans_placeholder="'<?php echo e(trans('lang.ph_type_msg')); ?>'" :receiver_id="'<?php echo e($profile->user_id); ?>'" :receiver_profile_image="'<?php echo e(asset($avatar)); ?>'"></chat>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-userprofileholder">
                        <?php if(!empty($badge) && !empty($enable_package) && $enable_package === 'true'): ?>
                            <span class="wt-featuredtag" style="border-top: 40px solid <?php echo e($badge_color); ?>;">
                                <img src="<?php echo e(asset(Helper::getBadgeImage($badge_img))); ?>" alt="<?php echo e(trans('lang.is_featured')); ?>" data-tipso="Plus Member" class="template-content tipso_style">
                            </span>
                        <?php endif; ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
                            <div class="row">
                                <div class="wt-userprofile">
                                    <?php if(!empty($avatar)): ?>
                                        
                                        <figure><img src="<?php echo e(asset(Helper::getImage('uploads/users/' . $profile->user_id,$profile->avater, '' , 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.user_avatar')); ?>"></figure>
                                    <?php endif; ?>
                                    <div class="wt-title">
                                        <?php if(!empty($user_name)): ?>
                                            <h3><?php if($user->user_verified === 1): ?><i class="fa fa-check-circle"></i> <?php endif; ?> <?php echo e($user_name); ?></h3>
                                        <?php endif; ?>
                                        <span>
                                            <div class="wt-proposalfeedback"><span class="wt-starcontent"> <?php echo e(round($average_rating_count)); ?>/<i>5</i>&nbsp;<em>(<?php echo e($reviews->count()); ?> <?php echo e(trans('lang.feedbacks')); ?>)</em></span></div>
                                            <?php if(!empty($joining_date)): ?>
                                                <?php echo e(trans('lang.member_since')); ?>&nbsp;<?php echo e($joining_date); ?>

                                            <?php endif; ?>
                                            <br>
                                            <a href="<?php echo e(url('profile/'.$user->slug)); ?>"><?php echo e('@'); ?><?php echo e($user->slug); ?></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
                            <div class="row">
                                <div class="wt-proposalhead wt-userdetails">
                                    <?php if(!empty($profile->tagline)): ?>
                                        <h2><?php echo e($profile->tagline); ?></h2>
                                    <?php endif; ?>
                                    <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                        <?php if(!empty($profile->hourly_rate)): ?>
                                            <li><span><i class="far fa-money-bill-alt"></i> <?php echo e($symbol); ?><?php echo e($profile->hourly_rate); ?> <?php echo e(trans('lang.per_hour')); ?></span></li>
                                        <?php endif; ?>
                                        <?php if(!empty($user->location->title)): ?>
                                            <li>
                                                <span>
                                                    <img src="<?php echo e(asset(Helper::getLocationFlag($user->location->flag))); ?>" alt="<?php echo e(trans('lang.flag_img')); ?>"> <?php echo e($user->location->title); ?>

                                                </span>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(in_array($profile->id, $save_freelancer)): ?>
                                            <li class="wt-btndisbaled">
                                                <a href="javascrip:void(0);" class="wt-clicksave wt-clicksave">
                                                    <i class="fa fa-heart"></i>
                                                    <?php echo e(trans('lang.saved')); ?>

                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li v-bind:class="disable_btn" v-cloak>
                                                <a href="javascrip:void(0);" v-bind:class="click_to_save" id="freelancer-<?php echo e($profile->id); ?>" @click.prevent="add_wishlist('freelancer'-<?php echo e($profile->id); ?>, <?php echo e($profile->id); ?>, 'saved_freelancer', '<?php echo e(trans("lang.saved")); ?>')" v-cloak>
                                                    <i v-bind:class="saved_class"></i>
                                                    {{ text }}
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if(!empty($profile->description)): ?>
                                        <div class="wt-description">
                                            <p><?php echo e($profile->description); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div id="wt-statistics" class="wt-statistics wt-profilecounter">
                                    <div class="wt-statisticcontent wt-countercolor1">
                                        <h3 data-from="0" data-to="<?php echo e(Helper::getProposals($user->id, 'hired')->count()); ?>" data-speed="800" data-refresh-interval="03"><?php echo e(Helper::getProposals($user->id, 'hired')->count()); ?></h3>
                                        <h4><?php echo e(trans('lang.ongoing_project')); ?></h4>
                                    </div>
                                    <div class="wt-statisticcontent wt-countercolor2">
                                        <h3 data-from="0" data-to="<?php echo e(Helper::getProposals($user->id, 'completed')->count()); ?>" data-speed="8000" data-refresh-interval="100"><?php echo e(Helper::getProposals($user->id, 'completed')->count()); ?></h3>
                                        <h4><?php echo e(trans('lang.completed_projects')); ?></h4>
                                    </div>
                                    <div class="wt-statisticcontent wt-countercolor4" <?php echo e(!empty($show_earnings) && ($show_earnings !== true && $show_earnings !== 'true') ? 'style=width:100%' : ''); ?>>
                                        <h3 data-from="0" data-to="<?php echo e(Helper::getProposals($user->id, 'cancelled')->count()); ?>" data-speed="800" data-refresh-interval="02"><?php echo e(Helper::getProposals($user->id, 'cancelled')->count()); ?></h3>
                                        <h4><?php echo e(trans('lang.cancelled_projects')); ?></h4>
                                    </div>
                                    <?php if(!empty($show_earnings) && ($show_earnings === true || $show_earnings === 'true')): ?>
                                        <div class="wt-statisticcontent wt-countercolor3">
                                            <h3 data-from="0" data-to="<?php echo e($amount); ?>" data-speed="8000" data-refresh-interval="100"><?php echo e(empty($amount) ? $symbol.'0.00' : $symbol."".$amount); ?></h3>
                                            <h4><?php echo e(trans('lang.total_earnings')); ?></h4>
                                        </div>
                                    <?php endif; ?>
                                    <div class="wt-description">
                                        <p><?php echo e(trans('lang.send_offer_note')); ?></p>
                                        <a href="javascript:void(0);" @click.prevent='sendOffer("<?php echo e($auth_user); ?>")' class="wt-btn"><?php echo e(trans('lang.btn_send_offer')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services'): ?>
            <?php if(!empty($services) && $services->count() > 0): ?>
                <div class="container">
                    <div class="row">	
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                            <div class="wt-services-holder">
                                <div class="wt-title">
                                    <h2><?php echo e(trans('lang.services')); ?></h2>
                                </div>
                                <div class="wt-services-content">
                                    <div class="row">
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                                $service_reviews = Helper::getServiceReviews($user->id, $service->id); 
                                                $service_rating  = $service_reviews->sum('avg_rating') != 0 ? round($service_reviews->sum('avg_rating') / $service_reviews->count()) : 0;
                                                $attachments = Helper::getUnserializeData($service->attachments);
                                                $no_attachments = empty($attachments) ? 'la-service-info' : '';
                                                $total_orders = Helper::getServiceCount($service->id, 'hired');
                                            ?>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                                                <div class="wt-freelancers-info <?php echo e($no_attachments); ?>">
                                                    <?php if(!empty($attachments)): ?>
                                                        <?php $enable_slider = count($attachments) > 1 ? 'wt-freelancerslider owl-carousel' : ' '; ?>
                                                        <div class="wt-freelancers <?php echo e($enable_slider); ?>">
                                                            <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <figure class="item">
                                                                    <a href="<?php echo e(url('profile/'.$user->slug)); ?>"><img src="<?php echo e(asset(Helper::getImageWithSize('uploads/services/'.$user->id, $attachment, 'medium'))); ?>" alt="img description" class="item"></a>
                                                                </figure>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($service->is_featured == 'true'): ?>
                                                        <span class="wt-featuredtagvtwo"><?php echo e(trans('lang.featured')); ?></span>
                                                    <?php endif; ?>
                                                    <div class="wt-freelancers-details">
                                                        <figure class="wt-freelancers-img">
                                                            <img src="<?php echo e(asset(Helper::getProfileImage($user->id))); ?>" alt="img description">
                                                        </figure>
                                                        <div class="wt-freelancers-content">
                                                            <div class="dc-title">
                                                                <a href="<?php echo e(url('profile/'.$user->slug)); ?>"><i class="fa fa-check-circle"></i> <?php echo e(Helper::getUserName($user->id)); ?></a>
                                                                <a href="<?php echo e(url('service/'.$service->slug)); ?>"><h3><?php echo e($service->title); ?></h3></a>
                                                                <span><strong><?php echo e($symbol); ?><?php echo e($service->price); ?></strong> <?php echo e(trans('lang.starting_from')); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="wt-freelancers-rating">
                                                            <ul>
                                                                <li><span><i class="fa fa-star"></i><?php echo e($service_rating); ?>/<i>5</i> (<?php echo e($service_reviews->count()); ?>)</span></li>
                                                                <li>
                                                                    <?php if($total_orders > 0): ?>
                                                                        <i class="fa fa-spinner fa-spin"></i>
                                                                    <?php endif; ?>
                                                                    <?php echo e($total_orders); ?> <?php echo e(trans('lang.in_queue')); ?>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
                        <div class="wt-usersingle">
                            <div class="wt-craftedprojects">
                                <div class="wt-usertitle">
                                    <h2><?php echo e(trans('lang.crafted_projects')); ?></h2>
                                </div>
                                <?php if(!empty($projects)): ?>
                                    <crafted_project :no_of_post="3" :project="'<?php echo e(json_encode($projects)); ?>'" :freelancer_id="'<?php echo e($profile->user_id); ?>'" :img="'<?php echo e(trans('lang.img')); ?>'"></crafted_project>
                                <?php else: ?>
                                    <div class="wt-userprofile">
                                        <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                            <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?> 
                                            <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="wt-clientfeedback la-no-record">
                                <div class="wt-usertitle wt-titlewithselect">
                                    <h2><?php echo e(trans('lang.client_feedback')); ?></h2>
                                </div>
                                <?php if(!empty($reviews) && $reviews->count() > 0): ?>
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $user = App\User::find($review->user_id);
                                            $stars  = $review->avg_rating != 0 ? $review->avg_rating/5*100 : 0;
                                        ?>
                                        <?php if($review->project_type == 'job'): ?>
                                            <?php $job = \App\Job::where('id', $review->job_id)->first(); ?>
                                            <?php if(!empty($job->employer) && $job->employer->count() > 0): ?>
                                                <div class="wt-userlistinghold wt-userlistingsingle">
                                                    <figure class="wt-userlistingimg">
                                                        <img src="<?php echo e(asset(Helper::getProfileImage($review->user_id))); ?>" alt="<?php echo e(trans('Employer')); ?>">
                                                    </figure>
                                                    <div class="wt-userlistingcontent">
                                                        <div class="wt-contenthead">
                                                            <div class="wt-title">
                                                                <a href="<?php echo e(url('profile/'.$job->employer->slug)); ?>"><?php if($user->user_verified === 1): ?><i class="fa fa-check-circle"></i><?php endif; ?> <?php echo e(Helper::getUserName($review->user_id)); ?></a>
                                                                <h3><?php echo e($job->title); ?></h3>
                                                            </div>
                                                            <ul class="wt-userlisting-breadcrumb">
                                                                <li><span><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i> <?php echo e(\App\Helper::getProjectLevel($job->project_level)); ?></span></li>
                                                                <?php if(!empty($job->location) && $job->location->count() > 0): ?>
                                                                    <li>
                                                                        <span>
                                                                            <img src="<?php echo e(asset(App\Helper::getLocationFlag($job->location->flag))); ?>" alt="<?php echo e(trans('lang.flag_img')); ?>"> <?php echo e($job->location->title); ?>

                                                                        </span>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <li><span><i class="far fa-calendar"></i> <?php echo e(Carbon\Carbon::parse($job->created_at)->format('M Y')); ?> - <?php echo e(Carbon\Carbon::parse($job->updated_at)->format('M Y')); ?></span></li>
                                                                <li>
                                                                    <span class="wt-stars"><span style="width: <?php echo e($stars); ?>%;"></span></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="wt-description">
                                                        <?php if(!empty($review->feedback)): ?>
                                                            <p>“ <?php echo e($review->feedback); ?> ”</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services'): ?>
                                                <?php $service = \App\Service::where('id', $review->service_id)->first(); ?>    
                                                <?php if(!empty($service)): ?>
                                                    <div class="wt-userlistinghold wt-userlistingsingle">
                                                        <figure class="wt-userlistingimg">
                                                            <img src="<?php echo e(asset(Helper::getProfileImage($review->user_id))); ?>" alt="<?php echo e(trans('Employer')); ?>">
                                                        </figure>
                                                        <div class="wt-userlistingcontent">
                                                            <div class="wt-contenthead">
                                                                <div class="wt-title">
                                                                    <a href="<?php echo e(url('profile/'.$user->slug)); ?>"><?php if($user->user_verified == 1): ?><i class="fa fa-check-circle"></i><?php endif; ?> <?php echo e(Helper::getUserName($review->user_id)); ?></a>
                                                                    <h3><?php echo e($service->title); ?></h3>
                                                                </div>
                                                                <ul class="wt-userlisting-breadcrumb">
                                                                    <?php if(!empty($service->location)): ?>
                                                                        <li>
                                                                            <span>
                                                                                <img src="<?php echo e(asset(Helper::getLocationFlag($service->location->flag))); ?>" alt="<?php echo e(trans('lang.flag_img')); ?>"> <?php echo e($service->location->title); ?>

                                                                            </span>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <li><span><i class="far fa-calendar"></i> <?php echo e(Carbon\Carbon::parse($service->created_at)->format('M Y')); ?> - <?php echo e(Carbon\Carbon::parse($service->updated_at)->format('M Y')); ?></span></li>
                                                                    <li>
                                                                        <span class="wt-stars"><span style="width: <?php echo e($stars); ?>%;"></span></span>
                                                                    </li> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="wt-description">
                                                            <?php if(!empty($review->feedback)): ?>
                                                                <p>“ <?php echo e($review->feedback); ?> ”</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="wt-userprofile">
                                        <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                            <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?> 
                                            <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            

                            <?php if(!empty($user->instagram_username)): ?>
                                <div class="wt-videos">
                                    <div class="wt-usertitle">
                                        <h2>Instagram Updates</h2>
                                    </div>
                                    <div class="wt-user-videos wt-user-instagram container">
                                        <div id="instagram-feed1" class="instagram_feed"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($videos)): ?>
                                <div class="wt-videos">
                                    <div class="wt-usertitle">
                                        <h2><?php echo e(trans('lang.videos')); ?></h2>
                                    </div>
                                    <div class="wt-user-videos">
                                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                                $width 	= 367;
                                                $height = 206;
                                                $url = parse_url($video['url']);
                                            ?>
                                            <?php if(!empty($url) && !empty($url['query'])): ?>
                                                <figure>
                                                    <?php
                                                        if ( isset( $url['host'] ) && ( $url['host'] == 'vimeo.com' || $url['host'] == 'player.vimeo.com' ) ) {
                                                            $content_exp = explode("/", $media);
                                                            $content_vimo = array_pop($content_exp);
                                                            echo '<iframe width="' . intval($width) . '" height="' . intval($height) . '" src="https://player.vimeo.com/video/' . $content_vimo . '" 
                                                    ></iframe>';
                                                        } elseif ( isset( $url['host'] ) && $url['host'] == 'soundcloud.com') {
                                                            $video = wp_oembed_get($media, array('height' => intval($height)));
                                                            $search = array('webkitallowfullscreen', 'mozallowfullscreen', 'frameborder="no"', 'scrolling="no"');
                                                            $video = str_replace($search, '', $video);
                                                            echo str_replace('&', '&amp;', $video);
                                                        } else {
                                                            echo '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.str_replace("v=", '', $url['query']).'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                        }
                                                    ?>
                                                
                                                </figure>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($experiences)): ?>
                            <div class="wt-experience">
                                <div class="wt-usertitle">
                                    <h2><?php echo e(trans('lang.experience')); ?></h2>
                                </div>
                                <?php if(!empty($experiences)): ?>
                                    <div class="wt-experiencelisting-hold">
                                        <experience :freelancer_id="'<?php echo e($profile->user_id); ?>'" :no_of_post="2"></experience>
                                    </div>
                                <?php else: ?>
                                    <div class="wt-userprofile">
                                        <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                            <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?> 
                                            <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($education)): ?>
                            <div class="wt-experience wt-education">
                                <div class="wt-usertitle">
                                    <h2><?php echo e(trans('lang.education')); ?></h2>
                                </div>
                                <?php if(!empty($education)): ?>
                                    <education :freelancer_id="'<?php echo e($profile->user_id); ?>'" :no_of_post="1"></education>
                                <?php else: ?>
                                    <div class="wt-userprofile">
                                        <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                            <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?> 
                                            <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 float-left">
                        <aside id="wt-sidebar" class="wt-sidebar">
                            <div id="wt-ourskill" class="wt-widget">
                                <div class="wt-widgettitle">
                                    <h2><?php echo e(trans('lang.my_skills')); ?></h2>
                                </div>
                                <?php if(!empty($skills) && $skills->count() > 0): ?>
                                    <div class="wt-widgetcontent wt-skillscontent">
                                        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="wt-skillholder" data-percent="<?php echo e($skill->pivot->skill_rating); ?>%">
                                                <span><?php echo e($skill->title); ?> <em><?php echo e($skill->pivot->skill_rating); ?>%</em></span>
                                                <div class="wt-skillbarholder"><div class="wt-skillbar"></div></div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php else: ?>
                                    <p><?php echo e(trans('lang.no_skills')); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="wt-widget wt-sharejob">
                                <div class="wt-widgettitle">
                                    <h2><?php echo e(trans('lang.share_freelancer')); ?></h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    <ul class="wt-socialiconssimple">
                                        <li class="wt-facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                                            <i class="fa fa fa-facebook-f"></i><?php echo e(trans('lang.share_fb')); ?></a>
                                        </li>
                                        <li class="wt-twitter">
                                            <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                                            <i class="fa fab fa-twitter"></i><?php echo e(trans('lang.share_twitter')); ?></a>
                                        </li>
                                        <li class="wt-pinterest">
                                            <a href="//pinterest.com/pin/create/button/?url=<?php echo e(urlencode(Request::fullUrl())); ?>"
                                            onclick="window.open(this.href, \'post-share\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
                                            <i class="fa fab fa-pinterest-p"></i><?php echo e(trans('lang.share_pinterest')); ?></a>
                                        </li>
                                        <li class="wt-googleplus">
                                            <a href="https://plus.google.com/share?url=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                                            <i class="fa fab fa-google-plus-g"></i><?php echo e(trans('lang.share_google')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wt-proposalsr">
                                <div class="tg-authorcodescan tg-authorcodescanvtwo">
                                    <figure class="tg-qrcodeimg">
                                        <?php echo QrCode::size(100)->generate(Request::url('profile/'.$user->slug));; ?>

                                    </figure>
                                    <div class="tg-qrcodedetail">
                                        <span class="lnr lnr-laptop-phone"></span>
                                        <div class="tg-qrcodefeat">
                                            <h3><?php echo e(trans('lang.scan_with_smartphone')); ?> <span><?php echo e(trans('lang.smartphone')); ?> </span> <?php echo e(trans('lang.get_handy')); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(!empty($user->facebook_pageName)): ?>
                            <div class="wt-proposalsr">                                       
                                <div class="fb-page"
                                data-tabs="timeline,events,messages"
                                data-href="https://www.facebook.com/<?php echo e($user->facebook_pageName); ?>"
                                data-width="380" 
                                data-hide-cover="false"></div>

                            </div> 
                            <?php endif; ?>
                            <div class="wt-widget wt-reportjob">
                                <div class="wt-widgettitle">
                                    <h2><?php echo e(trans('lang.report_user')); ?></h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-formreport', 'id' => 'submit-report',  '@submit.prevent'=>'submitReport("'.$profile->user_id.'","freelancer-report")']); ?>

                                        <fieldset>
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <?php echo Form::select('reason', \Illuminate\Support\Arr::pluck($reasons, 'title'), null ,array('class' => '', 'placeholder' => trans('lang.select_reason'), 'v-model' => 'report.reason')); ?>

                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <?php echo Form::textarea( 'description', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc'), 'v-model' => 'report.description'] ); ?>

                                            </div>
                                            <div class="form-group wt-btnarea">
                                                <?php echo Form::submit(trans('lang.btn_submit'), ['class' => 'wt-btn']); ?>

                                            </div>
                                        </fieldset>
                                    <?php echo form::close();; ?>

                                </div>
                            </div>
                            <?php if(!empty($awards)): ?>
                                <div class="wt-widget wt-widgetarticlesholder wt-articlesuser">
                                    <div class="wt-widgettitle">
                                        <h2><?php echo e(trans('lang.awards_certifications')); ?></h2>
                                    </div>
                                    <div class="wt-widgetcontent wt-verticalscrollbar">
                                        <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="wt-particlehold">
                                                <?php if(!empty($award['award_hidden_image'])): ?>
                                                    <figure>
                                                        <img src="<?php echo e(asset('uploads/users/'.$profile->user_id.'/awards/'.$award['award_hidden_image'])); ?>" alt="<?php echo e(trans('lang.img')); ?>">
                                                    </figure>
                                                <?php endif; ?>
                                                <?php if(!empty($award['award_title'])): ?>
                                                    <div class="wt-particlecontent">
                                                        <h3><a href="javascrip:void(0);"><?php echo e($award['award_title']); ?></a></h3>
                                                        <span><i class="lnr lnr-calendar"></i> <?php echo e($joining_date); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        </aside>
                    </div>
                </div>
            </div>
        </div>
		<b-modal ref="myModalRef" hide-footer title="Project Status">
            <div class="d-block text-center">
                <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'send-offer-form', '@submit.prevent'=>'submitProjectOffer("'.$profile->user_id.'")']); ?>

                    <div class="wt-projectdropdown-hold">
                        <div class="wt-projectdropdown">
                            <span class="wt-select">
                                <?php echo e(Form::select('projects', $employer_projects, null, array('class' => 'form-control', 'placeholder' => trans('lang.ph_select_projects')))); ?>

                            </span>
                        </div>
                    </div>
                    <div class="wt-formtheme wt-formpopup">
                        <fieldset>
                            <div class="form-group">
                                <?php echo e(Form::textarea('desc', null, array('placeholder' => trans('lang.ph_add_desc')))); ?>

                            </div>
                            <div class="form-group wt-btnarea">
                                <?php echo Form::submit(trans('lang.btn_send_offer'), ['class' => 'wt-btn']); ?>

                            </div>
                        </fieldset>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </b-modal>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/readmore.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/countTo.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/appear.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lc_lightbox.lite.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lalloy_finger.min.js')); ?>"></script>
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<script type="text/javascript">
(function ($) {
    var defaults = {
        'host': "https://www.instagram.com/",
        'username': '',
        'tag': '',
        'container': '',
        'display_profile': true,
        'display_biography': true,
        'display_gallery': true,
        'display_captions': false,
        'display_igtv': false,
        'callback': null,
        'styling': true,
        'items': 8,
        'items_per_row': 4,
        'margin': 0.5,
        'image_size': 640,
        'lazy_load': false,
        'on_error': console.error
    };
    var image_sizes = {
        "150": 0,
        "240": 1,
        "320": 2,
        "480": 3,
        "640": 4
    };
    var escape_map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;',
        '/': '&#x2F;',
        '`': '&#x60;',
        '=': '&#x3D;'
    };
    function escape_string(str) {
        return str.replace(/[&<>"'`=\/]/g, function (char) {
            return escape_map[char];
        });
    }
    function parse_caption(igobj, data){
        if (
            typeof igobj.node.edge_media_to_caption.edges[0] !== "undefined" && 
            typeof igobj.node.edge_media_to_caption.edges[0].node !== "undefined" && 
            typeof igobj.node.edge_media_to_caption.edges[0].node.text !== "undefined" && 
            igobj.node.edge_media_to_caption.edges[0].node.text !== null
        ) {
            return igobj.node.edge_media_to_caption.edges[0].node.text;
        }
        if (
            typeof igobj.node.title !== "undefined" &&
            igobj.node.title !== null &&
            igobj.node.title.length != 0
        ) {
            return igobj.node.title;
        }
        if (
            typeof igobj.node.accessibility_caption !== "undefined" &&
            igobj.node.accessibility_caption !== null &&
            igobj.node.accessibility_caption.length != 0
        ) {
            return igobj.node.accessibility_caption;
        }
        return (this.is_tag ? data.name : data.username) + " image ";
    }

    $.instagramFeed = function (opts) {
        var options = $.fn.extend({}, defaults, opts);
        if (options.username == "" && options.tag == "") {
            options.on_error("Instagram Feed: Error, no username nor tag defined.", 1);
            return false;
        }
        if (typeof options.get_data !== "undefined") {
            console.warn("Instagram Feed: options.get_data is deprecated, options.callback is always called if defined");
        }
        if (options.callback == null && options.container == "") {
            options.on_error("Instagram Feed: Error, neither container found nor callback defined.", 2);
            return false;
        }

        var is_tag = options.username == "",
            url = is_tag ? options.host + "explore/tags/" + options.tag + "/" : options.host + options.username + "/";

        $.get(url, function (data) {
            try {
                data = data.split("window._sharedData = ")[1].split("<\/script>")[0];
            } catch (e) {
                options.on_error("Instagram Feed: It looks like the profile you are trying to fetch is age restricted.", 3);
                return;
            }
            data = JSON.parse(data.substr(0, data.length - 1));
            data = data.entry_data.ProfilePage || data.entry_data.TagPage;
            if (typeof data === "undefined") {
                options.on_error("Instagram Feed: It looks like YOUR network has been temporary banned because of too many requests.", 4);
                return;
            }
            data = data[0].graphql.user || data[0].graphql.hashtag;

            if (options.container != "") {
                var html = "",
                    styles;

                // Setting styles
                if (options.styling) {
                    var width = (100 - options.margin * 2 * options.items_per_row) / options.items_per_row;
                    styles = {
                        profile_container: ' style="text-align:center;"',
                        profile_image: ' style="border-radius:10em;width:15%;max-width:125px;min-width:50px;"',
                        profile_name: ' style="font-size:1.2em;"',
                        profile_biography: ' style="font-size:1em;"',
                        gallery_image: ' style="width:100%;"',
                        gallery_image_link: ' style="width:' + width + '%; margin:' + options.margin + '%;position:relative; display: inline-block; height: 100%;"'
                    };
                    
                    if(options.display_captions){
                        html += "<style>\
                            a[data-caption]:hover::after {\
                                content: attr(data-caption);\
                                text-align: center;\
                                font-size: 0.8rem;\
                                color: black;\
                                position: absolute;\
                                left: 0;\
                                right: 0;\
                                bottom: 0;\
                                padding: 1%;\
                                max-height: 100%;\
                                overflow-y: auto;\
                                overflow-x: hidden;\
                                background-color: hsla(0, 100%, 100%, 0.8);\
                            }\
                        </style>";
                    }
                }else{
                    styles = {
                        profile_container: "",
                        profile_image: "",
                        profile_name: "",
                        profile_biography: "",
                        gallery_image: "",
                        gallery_image_link: ""
                    };
                }

                //Displaying profile
                if (options.display_profile) {
                    html += '<div class="instagram_profile"' + styles.profile_container + '>';
                    html += '<img class="instagram_profile_image" src="' + data.profile_pic_url  + '" alt="'+ (is_tag ? data.name + ' tag pic' : data.username + ' profile pic') + '"' + styles.profile_image + (options.lazy_load ? ' loading="lazy"' : '') + ' />';
                    if (is_tag)
                        html += '<p class="instagram_tag"' + styles.profile_name + '><a href="https://www.instagram.com/explore/tags/' + options.tag + '" rel="noopener" target="_blank">#' + options.tag + '</a></p>';
                    else
                        html += "<p class='instagram_username'" + styles.profile_name + ">@" + data.full_name + " (<a href='https://www.instagram.com/" + options.username + "' rel='noopener' target='_blank'>@" + options.username + "</a>)</p>";

                    if (!is_tag && options.display_biography)
                        html += "<p class='instagram_biography'" + styles.profile_biography + ">" + data.biography + "</p>";

                    html += "</div>";
                }

                //image size
                var image_index = typeof image_sizes[options.image_size] !== "undefined" ? image_sizes[options.image_size] : image_sizes[640];

                if (options.display_gallery) {
                    if (typeof data.is_private !== "undefined" && data.is_private === true) {
                        html += '<p class="instagram_private"><strong>This profile is private</strong></p>';
                    } else {
                        var imgs = (data.edge_owner_to_timeline_media || data.edge_hashtag_to_media).edges;
                        max = (imgs.length > options.items) ? options.items : imgs.length;

                        html += "<div class='instagram_gallery'>";
                        for (var i = 0; i < max; i++) {
                            var url = "https://www.instagram.com/p/" + imgs[i].node.shortcode,
                                image, type_resource, 
                                caption = escape_string(parse_caption(imgs[i], data));

                            switch (imgs[i].node.__typename) {
                                case "GraphSidecar":
                                    type_resource = "sidecar"
                                    image = imgs[i].node.thumbnail_resources[image_index].src;
                                    break;
                                case "GraphVideo":
                                    type_resource = "video";
                                    image = imgs[i].node.thumbnail_src
                                    break;
                                default:
                                    type_resource = "image";
                                    image = imgs[i].node.thumbnail_resources[image_index].src;
                            }

                            html += '<a data-lcl-author="'+data.full_name+'"  data-lcl-txt="'+(options.display_captions ? '' + caption + '"' : '')+'" href="'+imgs[i].node.display_url+'" data-lcl-thumb="'+imgs[i].node.display_url+'"' + (options.display_captions ? ' data-caption="' + caption + '"' : '') + ' class="elem diplayLarge instagram-' + type_resource + '" rel="noopener" target="_blank"' + styles.gallery_image_link + '>';
                            html += '<img' + (options.lazy_load ? ' loading="lazy"' : '') + ' src="' + image + '" alt="' + caption + '"' + styles.gallery_image + ' />';
                            html += '</a>';
                        }
                        html += '</div>';
                    }
                }

                if (options.display_igtv && typeof data.edge_felix_video_timeline !== "undefined") {
                    var igtv = data.edge_felix_video_timeline.edges,
                        max = (igtv.length > options.items) ? options.items : igtv.length
                    if (igtv.length > 0) {
                        html += '<div class="instagram_igtv">';
                        for (var i = 0; i < max; i++) {
                            var url = 'https://www.instagram.com/p/' + igtv[i].node.shortcode,
                                caption = escape_string(parse_caption(igtv[i], data));

                            html += '<a href="' + url + '"' + (options.display_captions ? ' data-caption="' + caption + '"' : '') + ' rel="noopener" target="_blank"' + styles.gallery_image_link + '>';
                            html += '<img' + (options.lazy_load ? ' loading="lazy"' : '') + ' src="' + igtv[i].node.thumbnail_src + '" alt="' + caption + '"' + styles.gallery_image + ' />';
                            html += '</a>';
                        }
                        html += '</div>';
                    }
                }

                $(options.container).html(html);
            }

            if (options.callback != null) {
                options.callback(data);
            }

        }).fail(function (e) {
            options.on_error("Instagram Feed: Unable to fetch the given user/tag. Instagram responded with the status code: " + e.status, 5);
        });

        return true;
    };

})(jQuery);
</script>
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->
<!-- INstagram feed script fixed dont change inside this script -->

<?php if(!empty($user->instagram_username)): ?>
    <script type="text/javascript">
        (function($){
        $(window).on('load', function(){
            $.instagramFeed({
                'username': 'zara',
                'container': "#instagram-feed1",
                'display_profile': false,
                'display_gallery': true,
                'display_captions': true,
                'display_biography': false,
                'items': 100,
                'items_per_row': 4,
                'margin': 0.5
            });
        });
    })(jQuery);

    $(function(){
        lc_lightbox('.elem', {

          wrap_class:'lcl_fade_oc',

          gallery :true,

          thumb_attr:'data-lcl-thumb',

          skin:'dark',
          download    :true,
          touchswipe    :true,
          mousewheel    :true,
          progressbar   :true,
          gallery_hook  :'rel',
          live_elements :true,
          preload_all   :false,


          // more options here

        });

    })
    </script>
<?php endif; ?>

    <script>
        /* FREELANCERS SLIDER */
        var _wt_freelancerslider = jQuery('.wt-freelancerslider')
        _wt_freelancerslider.owlCarousel({
            items: 1,
            loop:true,
            rtl:true,
            nav:true,
            margin: 0,
            autoplay:false,
            navClass: ['wt-prev', 'wt-next'],
            navContainerClass: 'wt-search-slider-nav',
            navText: ['<span class="lnr lnr-chevron-left"></span>', '<span class="lnr lnr-chevron-right"></span>'],
        });

        var _readmore = jQuery('.wt-userdetails .wt-description');
        _readmore.readmore({
            speed: 500,
            collapsedHeight: 230,
            moreLink: '<a class="wt-btntext" href="#">'+readmore_trans+'</a>',
            lessLink: '<a class="wt-btntext" href="#">'+less_trans+'</a>',
        });
        $('#wt-ourskill').appear(function () {
            jQuery('.wt-skillholder').each(function () {
                jQuery(this).find('.wt-skillbar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 2500);
            });
        });
        var popupMeta = {
            width: 400,
            height: 400
        }
        $(document).on('click', '.social-share', function(event){
            event.preventDefault();

            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

            var url = $(this).attr('href');
            var popup = window.open(url, 'Social Share',
                'width='+popupMeta.width+',height='+popupMeta.height+
                ',left='+vPosition+',top='+hPosition+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                return false;
            }
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>