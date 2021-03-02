
<?php $__env->startSection('content'); ?>
	<?php if(session()->has('project_type')): ?>
		<?php session()->forget('project_type'); ?>
	<?php endif; ?>
	<div class="wt-haslayout wt-dbsectionspace la-manage-jobs-holder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right" id="services">
				<div class="preloader-section" v-if="loading" v-cloak>
					<div class="preloader-holder">
						<div class="loader"></div>
					</div>
				</div>
				<div class="wt-dashboardbox wt-dashboardservcies">
					<div class="wt-dashboardboxtitle wt-titlewithsearch">
						<h2><?php echo e(trans('lang.ongoing_services')); ?></h2>
					</div>
					<div class="wt-dashboardboxcontent wt-categoriescontentholder">
						<?php if($services->count() > 0): ?>
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th><?php echo e(trans('lang.service_title')); ?></th>
										<th><?php echo e(trans('lang.offered_by')); ?></th>
										<th><?php echo e(trans('lang.action')); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php 
											$seller = Helper::getServiceSeller($service->id);
											$freelancer = App\User::find($seller->user_id);
											$attachment = Helper::getUnserializeData($service->attachments); 
										?>
										<tr class="del-<?php echo e($service->status); ?>">
											<td data-th="Service Title">
												<span class="bt-content">
													<div class="wt-service-tabel">
														<?php if(!empty($attachment)): ?>
															<figure class="service-feature-image"><img src="<?php echo e(asset('/uploads/services/'.$freelancer->id.'/'.$attachment[0])); ?>" alt="<?php echo e($service->title); ?>"></figure>
														<?php endif; ?>
														<div class="wt-freelancers-content">
															<div class="dc-title">
																<?php if($service->is_featured == 'true'): ?>
																	<span class="wt-featuredtagvtwo"><?php echo e(trans('lang.featured')); ?></span>
																<?php endif; ?>
																<h3><?php echo e($service->title); ?></h3>
																<span><strong><?php echo e(!empty($symbol) ? $symbol['symbol'] : '$'); ?> <?php echo e($service->price); ?></strong> <?php echo e(trans('lang.starting_from')); ?></span>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td>
												<span class="bt-content">
													<div class="wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="<?php echo e(asset(Helper::getProfileImage($freelancer->id))); ?>" alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
															<div class="wt-title">
																<a href="<?php echo e(url('profile/'.$freelancer->slug)); ?>">
																	<?php if($freelancer->user_verified): ?>
																		<i class="fa fa-check-circle"></i> <?php echo e(Helper::getUserName($freelancer->id)); ?>

																	<?php endif; ?>
																</a>
																<h3><?php echo e($freelancer->profile->tagline); ?></h3>
															</div>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td data-th="Action">
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="<?php echo e(url('freelancer/service/'.$service->pivot_id.'/hired')); ?>" class="wt-viewinfo wt-btnhistory"><?php echo e(trans('lang.view')); ?></a>
													</div>
												</span>
											</td>
										</tr>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						<?php else: ?>
							<?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
								<?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php else: ?> 
								<?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>