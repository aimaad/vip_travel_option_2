<div class="sidebar-widget widget_search">
    <form method="get" class="search" action="<?php echo e(url(app_get_locale(false,false,'/').config('news.news_route_prefix'))); ?>">
        <input type="text" class="form-control" value="<?php echo e(Request::query("s")); ?>" name="s" placeholder="<?php echo e(__("Search ...")); ?>">
        <button type="submit" class="icon_search"></button>
    </form>
</div><?php /**PATH C:\Users\dell\Downloads\-booking-core-v3.6.1\BookingCore.3.6.1\themes/BC/News/Views/frontend/layouts/sidebars/search_form.blade.php ENDPATH**/ ?>