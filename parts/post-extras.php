<?php
$title = get_the_title($post->ID);
$content = wp_trim_words(get_the_content($post->ID), 20);
$extra_text = get_field('extra_text', $post->ID);
$booking_widget = get_field('booking_widget', $post->ID);
$benefits = wp_get_post_terms($post->ID, 'benefits', array("fields" => "all"));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide d-flex'); ?>>
    <div class="card link-cover">
        <div class="card-top padded text-center group-gap standard">
            <?php if (has_post_thumbnail()) { ?>
                <figure class="media landscape rounded-area">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('loading' => 'lazy')); ?>
                </figure>
            <?php } ?>
            <div class="group-gap">
                <?php if ($title) { ?>
                    <h2 class="serif font-increase">
                        <?php echo $title; ?>
                    </h2>
                <?php } ?>
                <?php if ($extra_text) { ?>
                    <h3 class="serif">
                        <?php echo $extra_text; ?>
                    </h3>
                <?php } ?>
            </div>
        </div>
        <div class="card-bottom padded d-flex flex-column justify-content-between group-gap standard">
            <?php if ($content) { ?>
                <div class="editor">
                    <p><?php echo $content; ?></p>
                </div>
            <?php } ?>
            <?php if ($benefits) { ?>
                <ul class="checklist font-small">
                    <?php
                    foreach ($benefits as $benefit) {
                        ?>
                        <li>
                            <?php echo $benefit->name; ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <?php if ($booking_widget) { ?>
                <div class="button-book">
                    <button type="button"
                            class="button secondary no-arrow d-flex wide font-small book-button"
                            data-bs-toggle="modal"
                            data-bs-target="#booking-modal-<?php the_ID(); ?>">
                        Book now
                    </button>
                    <div class="modal fade"
                         id="booking-modal-<?php the_ID(); ?>"
                         tabindex="-1"
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
</article>