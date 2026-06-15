<?php

$blog_image = get_field('blog_image', 'option');
$blog_heading = get_field('blog_heading', 'option');

?>

<section class="hero layers bg dark <?php if (is_single()) { ?>hero-single<?php } ?>">
    <div class="layer content elements">
        <div class="inner text-center tall">
            <div class="container tall">
                <div class="detail tall hero-gap">
                    <div class="hero-header">
                        <h1>
                            <?php if (is_home()) { ?>
                                <?php if ($blog_heading) { ?>
                                    <?php echo $blog_heading; ?>
                                <?php } else { ?>
                                    <?php single_post_title(); ?>
                                <?php } ?>
                            <?php } elseif (is_single()) { ?>
                                <?php the_title(); ?>
                            <?php } else { ?>
                                <?php the_archive_title(); ?>
                            <?php } ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layer graphic">
        <figure class="media banner overlay tall">
            <?php if (is_single()) { ?>
                <?php if (has_post_thumbnail()) { ?>
                    <?php echo get_the_post_thumbnail($post->ID, 'huge', array('loading' => 'eager')); ?>
                <?php } ?>
            <?php } else { ?>
                <?php if ($blog_image) { ?>
                    <?php
                    $imageID = $blog_image['ID'];
                    echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager'));
                    ?>
                <?php } ?>
            <?php } ?>
        </figure>
    </div>
</section>