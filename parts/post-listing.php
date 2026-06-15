<section class="posts">
    <div class="container group-gap extra-large">
        <div class="row gx-2 gy-5">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('parts/post', 'blog'); ?>
            <?php endwhile; ?>
        </div>
        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
    </div>
</section>
