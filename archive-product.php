<?php
$shop_page = get_post(wc_get_page_id('shop'));
$content_post = get_post($shop_page);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);

$heading = get_field('heading', $shop_page);
$subheading = get_field('subheading', $shop_page);
$text = get_field('text', $shop_page);

$booking_widget_full_availability = get_field('booking_widget_full_availability', 'option');
$booking_widget_full_button_text = get_field('booking_widget_full_button_text', 'option');
$booking_widget_full_button_text_fallback = "Availability for all vans";
?>

<?php get_header(); ?>
<section id="shop" class="block-padding-small bg grey-washed group-gap large">
    <?php if ($heading) { ?>
        <header class="block-intro">
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <div class="group-gap small text-center">
                            <?php if ($subheading) { ?>
                                <p><?php echo $subheading; ?></p>
                            <?php } ?>
                            <h1 class="h2"><?php echo $heading; ?></h1>
                            <?php if (!is_shop()) { ?>
                                <h2 class="h3"><?php woocommerce_page_title(); ?></h2>
                            <?php } ?>
                            <?php if ($text) { ?>
                                <div class="editor">
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                            <?php if ($booking_widget_full_availability) { ?>
                                <div class="booking-availability">
                                    <button type="button"
                                            class="button secondary book-button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#booking-modal-<?php get_the_ID(); ?>">
                                        <?php if ($booking_widget_full_button_text) { ?>
                                            <?php echo $booking_widget_full_button_text; ?>
                                        <?php } else { ?>
                                            <?php echo $booking_widget_full_button_text_fallback; ?>
                                        <?php } ?>
                                    </button>
                                    <div class="modal fade" id="booking-modal-<?php get_the_ID(); ?>" tabindex="-1"
                                         aria-labelledby="booking-modal-title-<?php get_the_ID(); ?>"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title"
                                                        id="booking-modal-title-<?php get_the_ID(); ?>">
                                                            <span class="serif">
                                                                <?php if ($booking_widget_full_button_text) { ?>
                                                                    <?php echo $booking_widget_full_button_text; ?>
                                                                <?php } else { ?>
                                                                    <?php echo $booking_widget_full_button_text_fallback; ?>
                                                                <?php } ?>
                                                            </span>
                                                    </h2>
                                                    <button type="button"
                                                            class="trigger menu-trigger close btn-close"
                                                            data-bs-dismiss="modal">
                                                        <span class="visually-hidden">Close menu</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $booking_widget_full_availability; ?>
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
        </header>
    <?php } ?>

    <?php
    $per_page = -1;
    if (get_query_var('taxonomy')) {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $per_page,
            'paged' => get_query_var('paged'),
            'tax_query' => array(
                array(
                    'taxonomy' => get_query_var('taxonomy'),
                    'field' => 'slug',
                    'terms' => get_query_var('term'),
                ),
            ),
        );
    } else {
        $args = array(
            'post_type' => 'product',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $per_page,
            'paged' => get_query_var('paged'),
        );
    }
    $products = new WP_Query($args);
    if ($products->have_posts()) : ?>
        <div class="product-listing">
            <div class="container">
                <div class="row gx-2 gy-4 justify-content-center">
                    <?php while ($products->have_posts()) : $products->the_post();
                        ?>
                        <?php get_template_part('parts/post', 'products'); ?>
                    <?php
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php if ($content) { ?>
    <div class="blocks">
        <?php echo $content; ?>
    </div>
<?php } ?>
<?php get_footer(); ?>
