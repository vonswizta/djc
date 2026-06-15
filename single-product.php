<?php
$title = get_the_title($post->ID);
$content = apply_filters('the_content', get_the_content($post->ID));
$product_image = get_field('product_image', 'option');
$booking_widget = get_field('booking_widget', $post->ID);
$lightbox_link = get_field('lightbox_link', $post->ID);
$heading = get_field('heading', $post->ID);
$badges = wp_get_post_terms($post->ID, 'badges', array("fields" => "all"));
$brands = wp_get_post_terms($post->ID, 'product_brand', array("fields" => "all"));
$categories = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "all"));
$tags = wp_get_post_terms($post->ID, 'product_tag', array("fields" => "all"));
$price = get_post_meta($post->ID, '_regular_price', true);
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section id="product-detail" class="layers bg blue-fill block-padding-bottom">
        <div class="layer content">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-8 product-detail-main group-gap large">
                        <?php
                        global $product;
                        $attachment_ids = $product->get_gallery_image_ids();
                        ?>
                        <?php if ($attachment_ids) { ?>
                            <div class="product-gallery group-gap small">
                                <div class="swiper swiper-gallery gallery-main">
                                    <div class="swiper-wrapper">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="swiper-slide">
                                                <figure class="media gallery-large">
                                                    <?php echo get_the_post_thumbnail($post->ID, 'large', array('loading' => 'eager')); ?>
                                                </figure>
                                            </div>
                                        <?php } ?>
                                        <?php foreach ($attachment_ids as $attachment_id) { ?>
                                            <div class="swiper-slide">
                                                <figure class="media gallery-large">
                                                    <?php echo wp_get_attachment_image($attachment_id, 'large', false, array('loading' => 'eager')); ?>
                                                </figure>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="thumbs-wrap">
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper swiper-gallery gallery-thumbs">
                                        <div class="swiper-wrapper">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="swiper-slide">
                                                    <figure class="media gallery-small">
                                                        <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('loading' => 'lazy')); ?>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                            <?php foreach ($attachment_ids as $attachment_id) { ?>
                                                <div class="swiper-slide">
                                                    <figure class="media gallery-small">
                                                        <?php echo wp_get_attachment_image($attachment_id, 'thumbnail', false, array('loading' => 'lazy')); ?>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($heading) { ?>
                            <h2 class="text-center font-huge"><?php echo $heading; ?></h2>
                        <?php } ?>
                        <?php if ($categories) { ?>
                            <div class="feature-area">
                                <ul class="categories-stack highlighted">
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
                            </div>
                        <?php } ?>
                        <?php if ($content) { ?>
                            <div class="blocks block-group">
                                <?php echo $content; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 product-detail-aside">
                        <aside class="product-overview">
                            <div class="overview-section top text-center group-gap mini">
                                <div class="group-gap tiny">
                                    <?php if ($title) { ?>
                                        <h1 class="font-extra serif"><?php echo $title; ?></h1>
                                    <?php } ?>
                                    <?php if ($brands) { ?>
                                        <ul class="brands">
                                            <?php foreach ($brands as $brand) { ?>
                                                <li><?php echo $brand->name; ?></li>
                                            <?php } ?>
                                        </ul>
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
                            <div class="overview-section midway group-gap standard">
                                <?php if ($tags) { ?>
                                    <ul class="tags">
                                        <?php foreach ($tags as $tag) { ?>
                                            <li>
                                                <?php echo $tag->name; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <?php if ($lightbox_link) { ?>
                                    <a class="button outlined no-arrow d-flex tour" href="<?php echo $lightbox_link; ?>"
                                       data-fancybox data-type="iframe">
                                        <span>Explore 360 tour</span>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="overview-section bottom text-center group-gap mini">
                                <?php if ($price) { ?>
                                    <div class="price">
                                        <p class="font-large serif">
                                            From <?php echo get_woocommerce_currency_symbol(); ?><?php echo $price ?></p>
                                        <p>per day</p>
                                    </div>
                                <?php } ?>
                                <?php if ($booking_widget) { ?>
                                    <button type="button"
                                            class="button d-flex wide"
                                            data-bs-toggle="modal"
                                            data-bs-target="#booking-modal-<?php the_ID(); ?>">Book now
                                    </button>
                                    <div class="modal fade" id="booking-modal-<?php the_ID(); ?>" tabindex="-1"
                                         aria-labelledby="booking-modal-title-<?php the_ID(); ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="booking-modal-title-<?php the_ID(); ?>">
                                                        <?php if ($title) { ?>
                                                            <span class="serif"><?php echo $title; ?></span>
                                                        <?php } ?>
                                                    </h2>
                                                    <button type="button" class="trigger menu-trigger close btn-close"
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
                                <?php } ?>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($product_image) { ?>
            <div class="layer graphic">
                <figure class="media banner smaller overlay">
                    <?php
                    $imageID = $product_image['ID'];
                    echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'eager'));
                    ?>
                </figure>
            </div>
        <?php } ?>
    </section>
    <!--extra content-->
    <?php if (have_rows('extra_content')): ?>
        <?php while (have_rows('extra_content')): the_row(); ?>
            <!--panel-->
            <?php if (get_row_layout() == 'panel'): ?>
                <?php
                $background_colour = get_sub_field('background_colour');
                $heading = get_sub_field('heading');
                $subheading = get_sub_field('subheading');
                $text = get_sub_field('text');
                $link = get_sub_field('link');
                $image = get_sub_field('image');
                $image_gap = get_sub_field('image_gap');
                $switch = get_sub_field('switch');
                ?>
                <section
                        class="layers stack <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
                    <div class="layer content">
                        <div class="container">
                            <div class="row gx-lg-6 <?php if ($switch) { ?>justify-content-lg-end<?php } ?>">
                                <div class="col-lg-6 elements">
                                    <div class="block-padding group-gap small">
                                        <?php if ($subheading) { ?>
                                            <p><?php echo $subheading; ?></p>
                                        <?php } ?>
                                        <?php if ($heading) { ?>
                                            <h2><?php echo $heading; ?></h2>
                                        <?php } ?>
                                        <?php if ($text) { ?>
                                            <div class="editor">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if ($link):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a class="button tertiary" href="<?php echo esc_url($link_url); ?>"
                                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layer image <?php if ($image_gap) { ?>image-gap<?php } ?>">
                        <div class="row g-0 tall <?php if (!$switch) { ?>justify-content-lg-end<?php } ?>">
                            <div class="col-lg-6 tall">
                                <div class="layers tall overflow">
                                    <?php if (have_rows('offers')): ?>
                                        <div class="layer content inner-layer">
                                            <div class="offers">
                                                <?php while (have_rows('offers')): the_row();
                                                    $heading = get_sub_field('heading');
                                                    $text = get_sub_field('text');
                                                    $value = get_sub_field('value');
                                                    ?>
                                                    <div class="offer">
                                                        <div class="detail">
                                                            <div class="info">
                                                                <?php if ($heading) { ?>
                                                                    <h2 class="font-medium">
                                                                        <?php echo $heading; ?>
                                                                    </h2>
                                                                <?php } ?>
                                                                <?php if ($text) { ?>
                                                                    <p class="font-tiny">
                                                                        <?php echo $text; ?>
                                                                    </p>
                                                                <?php } ?>
                                                            </div>
                                                            <?php if ($value) { ?>
                                                                <p class="h2 bold">
                                                                    <?php echo $value; ?>
                                                                </p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="layer graphic">
                                        <figure class="media tile tall">
                                            <?php if ($image) { ?>
                                                <?php
                                                $imageID = $image['ID'];
                                                echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'lazy'));
                                                ?>
                                            <?php } ?>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--panel-->
        <?php endwhile; ?>
    <?php endif; ?>
    <!--extra content-->
<?php endwhile; endif; ?>
<?php get_footer(); ?>
