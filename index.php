<?php get_header(); ?>
<?php get_template_part('parts/post', 'banner'); ?>
    <section class="block-padding bg blue-washed group-gap medium">
        <?php if (have_posts()) : ?>
            <?php get_template_part('parts/post', 'filter'); ?>
            <?php get_template_part('parts/post', 'listing'); ?>
        <?php else : ?>
            <?php get_template_part('parts/global', 'nothing'); ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>