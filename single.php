<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php get_template_part('parts/post', 'banner'); ?>
    <section class="post-detail block-padding-bottom">
        <div class="container group-gap middle">
            <?php get_template_part('parts/blog', 'author'); ?>
            <div class="row justify-content-lg-center article-content">
                <div class="col-lg-8">
                    <article class="editor">
                        <?php the_content(); ?>
                    </article>
                    <div class="visually-hidden">
                        <?php if (has_tag()) { ?>
                            <?php
                            the_tags(
                                '<div class="tags">',
                                ', ',
                                '</div>'
                            );
                            ?>
                        <?php } ?>
                        <?php share_buttons(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_template_part('parts/related', 'blog'); ?>
<?php get_footer(); ?>