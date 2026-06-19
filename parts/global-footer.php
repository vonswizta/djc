<?php

$address = get_field('address', 'option');
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');
$title_menu = get_field('title_menu', 'option');
$title_contact = get_field('title_contact', 'option');
$title_social = get_field('title_social', 'option');
$google = get_field('google', 'option');
$instagram = get_field('instagram', 'option');
$facebook = get_field('facebook', 'option');
$tiktok = get_field('tiktok', 'option');

?>

<footer id="footer" class="bg-charcoal-grey text-ivory-white border-t-4 border-t-jewel-green py-17">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-3">
                    <div class="flex flex-wrap flex-col items-start gap-5">
                        <?php get_template_part('parts/global', 'logo'); ?>
                        <p><?php bloginfo('description'); ?></p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-9">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <?php if ($title_menu) { ?>
                                <h2 class="font-merriweather text-[calc(22/16*1rem)] font-bold"><?php echo $title_menu; ?></h2>
                            <?php } ?>
                            <?php menu_footer(); ?>
                        </div>
                        <div>
                            <?php if ($title_contact) { ?>
                                <h2 class="font-merriweather text-[calc(22/16*1rem)] font-bold"><?php echo $title_contact; ?></h2>
                            <?php } ?>
                            <?php
                            if ($phone):
                                $link_url = $phone['url'];
                                $link_title = $phone['title'];
                                $link_target = $phone['target'] ? $phone['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                            <?php
                            if ($email):
                                $link_url = $email['url'];
                                $link_title = $email['title'];
                                $link_target = $email['target'] ? $email['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                            <?php if ($address) { ?>
                                <div><?php echo $address; ?></div>
                            <?php } ?>
                        </div>
                        <div>
                            <?php if ($title_social) { ?>
                                <h2 class="font-merriweather text-[calc(22/16*1rem)] font-bold"><?php echo $title_social; ?></h2>
                            <?php } ?>
                            <?php
                            if ($google):
                                $link_url = $google['url'];
                                $link_title = $google['title'];
                                $link_target = $google['target'] ? $google['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                            <?php
                            if ($instagram):
                                $link_url = $instagram['url'];
                                $link_title = $instagram['title'];
                                $link_target = $instagram['target'] ? $instagram['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                            <?php
                            if ($facebook):
                                $link_url = $facebook['url'];
                                $link_title = $facebook['title'];
                                $link_target = $facebook['target'] ? $facebook['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                            <?php
                            if ($tiktok):
                                $link_url = $tiktok['url'];
                                $link_title = $tiktok['title'];
                                $link_target = $tiktok['target'] ? $tiktok['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>