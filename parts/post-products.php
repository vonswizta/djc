<?php
$title = get_the_title($post->ID);
$content = apply_filters('the_content', get_the_content($post->ID));
$booking_widget = get_field('booking_widget', $post->ID);
$lightbox_link = get_field('lightbox_link', $post->ID);
$badges = wp_get_post_terms($post->ID, 'badges', array("fields" => "all"));
$brands = wp_get_post_terms($post->ID, 'product_brand', array("fields" => "all"));
$categories = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "all"));
$price = get_post_meta($post->ID, '_regular_price', true);
?>

<article id="post-<?php the_ID(); ?>"
         class="card-product <?php if (is_woocommerce()) { ?>col-lg-6 col-xl-4<?php } else { ?>swiper-slide<?php } ?>">
    <div class="layers">
        <?php if (has_post_thumbnail()) { ?>
            <div class="layer image">
                <div class="image-wrap">
                    <figure class="media">
                        <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('loading' => 'lazy')); ?>
                    </figure>
                </div>
            </div>
        <?php } ?>
        <div class="layer content">
            <div class="card">
                <div class="card-top">
                    <div class="inner padded group-gap">
                        <div class="title">
                            <?php if ($title) { ?>
                                <h2 class="serif"><?php echo $title; ?></h2>
                            <?php } ?>
                            <?php if ($brands) { ?>
                                <ul class="brands">
                                    <?php foreach ($brands as $brand) { ?>
                                        <li><?php echo $brand->name; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php if ($price) { ?>
                            <div class="price">
                                <p class="h3 serif">
                                    From <?php echo get_woocommerce_currency_symbol(); ?><?php echo $price ?></p>
                                <p>per day</p>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($badges) { ?>
                        <ul class="badges">
                            <?php foreach ($badges as $badge) { ?>
                                <li class="badge"><?php echo $badge->name; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="card-bottom">
                    <div class="inner padded group-gap medium">
                        <?php if ($categories) { ?>
                            <ul class="categories-stack group-gap">
                                <?php
                                foreach ($categories as $category) {
                                    $image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                    $image_url = wp_get_attachment_image($image_id, 'thumbnail', false, array('loading' => 'lazy'));
                                    ?>
                                    <li>
                                        <div class="icon">
                                            <?php echo $image_url; ?>
                                        </div>
                                        <div class="title">
                                            <?php echo $category->name; ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <div class="button-set">
                            <div class="row g-1">
                                <?php if ($lightbox_link) { ?>
                                    <div class="col-xl">
                                        <a class="button outlined no-arrow d-flex font-small"
                                           href="<?php echo $lightbox_link; ?>"
                                           data-fancybox data-type="iframe">
                                            360 tour
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="col-xl">
                                    <a class="button tertiary no-arrow d-flex font-small"
                                       href="<?php the_permalink(); ?>">More
                                        info</a>
                                </div>
                                <?php if ($booking_widget) { ?>
                                    <div class="col-xl-12">
                                        <button type="button"
                                                class="button secondary no-arrow d-flex wide font-small book-button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#booking-modal-<?php the_ID(); ?>">Book now
                                        </button>
                                        <div class="modal fade" id="booking-modal-<?php the_ID(); ?>" tabindex="-1"
                                             aria-labelledby="booking-modal-title-<?php the_ID(); ?>"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title"
                                                            id="booking-modal-title-<?php the_ID(); ?>">
                                                            <?php if ($title) { ?>
                                                                <span class="serif"><?php echo $title; ?></span>
                                                            <?php } ?>
                                                        </h2>
                                                        <button type="button"
                                                                class="trigger menu-trigger close btn-close"
                                                                data-bs-dismiss="modal">
                                                            <span class="visually-hidden">Close menu</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $booking_widget; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>