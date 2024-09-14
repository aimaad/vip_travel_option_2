<div class="g-header" style="margin-top: 40px ;">
    <div class="left">
        <h1><?php echo e($translation->title); ?></h1>
        <?php if($translation->address): ?>
            <p class="address"><i class="fa fa-map-marker"></i>
                <?php echo e($translation->address); ?>

            </p>
        <?php endif; ?>
    </div>
    <div class="right">
        <?php if(setting_item('tour_enable_review') and $review_score): ?>
            <div class="review-score">
                <div class="head">
                    <div class="left">
                        <span class="head-rating"><?php echo e($review_score['score_text']); ?></span>
                        <span class="text-rating"><?php echo e(__("from :number reviews",['number'=>$review_score['total_review']])); ?></span>
                    </div>
                    <div class="score">
                        <?php echo e($review_score['score_total']); ?><span>/5</span>
                    </div>
                </div>
                <div class="foot">
                    <?php echo e(__(":number% of guests recommend",['number'=>$row->recommend_percent])); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name)): ?>
    <div class="g-tour-feature">
    <div class="row">
        <?php if($row->duration): ?>
        <div class="col-xs-6 col-lg-3 col-md-6">
            <div class="item">
                <div class="icon">
                    <i class="icofont-wall-clock"></i>
                </div>
                <div class="info">
                    <h4 class="name"><?php echo e(__("Duration")); ?></h4>
                    <p class="value">
                        <?php echo e($row->duration); ?> <?php echo e(__("days")); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
        <?php if(!empty($row->category_tour->name)): ?>
            <?php $cat =  $row->category_tour->translate() ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-beach"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Tour Type")); ?></h4>
                        <p class="value">
                            <?php echo e($cat->name ?? ''); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($row->max_people): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-travelling"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Group Size")); ?></h4>
                        <p class="value">
                            <?php if($row->max_people > 1): ?>
                                <?php echo e(__(":number persons",array('number'=>$row->max_people))); ?>

                            <?php else: ?>
                                <?php echo e(__(":number person",array('number'=>$row->max_people))); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($row->location->name)): ?>
                <?php $location =  $row->location->translate() ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Location")); ?></h4>
                        <p class="value">
                            <?php echo e($location->name ?? ''); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php echo $__env->make('Layout::global.details.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($translation->content): ?>
    <div class="g-overview">
        <h3><?php echo e(__("Overview")); ?></h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-include-exclude', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-itinerary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Tour::frontend.layouts.details.tour-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($row->map_lat && $row->map_lng): ?>
<div class="g-location">
    <div class="location-title">
        <h3><?php echo e(__("Tour Location")); ?></h3>
        <?php if($translation->address): ?>
            <div class="address">
                <i class="icofont-location-arrow"></i>
                <?php echo e($translation->address); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\Users\dell\Desktop\Vip_travel\Vip_Travel_Project\themes/BC/Tour/Views/frontend/layouts/details/tour-detail.blade.php ENDPATH**/ ?>