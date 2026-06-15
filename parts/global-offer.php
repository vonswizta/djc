<?php
$link = get_field('offer_link', 'option');
$offer_display = get_field('offer_display', 'option');
$offer_code = get_field('offer_code', 'option');
?>

<?php if ($link) { ?>
    <div class="offer-promo link-target-area <?php if ($offer_display) { ?><?php if (!is_front_page()) { ?>offer-hidden d-none<?php } ?><?php } ?>">
        <div class="inside">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10 font-medium offer-items">
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="editor">
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ($offer_code) { ?>
                            <div class="offer-code">
                                <?php echo $offer_code; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>