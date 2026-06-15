<div class="post-meta visually-hidden">
    <div class="date">
        <?php $archive_year = get_the_time('Y'); ?>
        <?php $archive_month = get_the_time('m'); ?>
        <a href="<?php echo get_month_link($archive_year, $archive_month); ?>"><?php the_time('d.m.y'); ?></a>
    </div>
    <?php if (has_category()) { ?>
        <div class="category">
            <?php the_category(', '); ?>
        </div>
    <?php } ?>
</div>