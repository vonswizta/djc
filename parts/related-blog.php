<?php
$related = new WP_Query(
    array(
        'category__in' => wp_get_post_categories($post->ID),
        'posts_per_page' => 4,
        'post__not_in' => array($post->ID)
    )
); ?>
<?php if ($related->have_posts()) { ?>
    <section class="block-padding bg blue-faded">
        <div class="container group-gap large">
            <header class="block-intro row justify-content-lg-center">
                <div class="col-lg-8">
                    <div class="group-gap small text-center">
                        <h2>Similar articles</h2>
                    </div>
                </div>
            </header>
            <div class="row g-2 justify-content-center">
                <?php while ($related->have_posts()) {
                    $related->the_post(); ?>
                    <?php get_template_part('parts/post', 'blog'); ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata();
} ?>
