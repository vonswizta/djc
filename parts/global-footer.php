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

<footer id="footer" class="bg-charcoal-grey text-ivory-white border-t-4 border-t-jewel-green max-lg:py-6 py-17">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 max-lg:gap-6 gap-4">
            <div class="col-span-12 lg:col-span-3">
                <div class="flex flex-wrap flex-col items-start max-lg:gap-3 gap-5">
                    <?php get_template_part('parts/global', 'logo'); ?>
                    <p class="text-sm"><?php bloginfo('description'); ?></p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9">
                <div class="grid lg:grid-cols-3 max-lg:gap-6 gap-4">
                    <div class="max-lg:space-y-2 space-y-4">
                        <?php if ($title_menu) { ?>
                            <h2 class="font-merriweather max-lg:text-[calc(20/16*1rem)] text-[calc(22/16*1rem)] font-bold"><?php echo $title_menu; ?></h2>
                        <?php } ?>
                        <div class="footer-nav">
                            <?php menu_footer(); ?>
                        </div>
                    </div>
                    <div class="max-lg:space-y-2 space-y-4">
                        <?php if ($title_contact) { ?>
                            <h2 class="font-merriweather max-lg:text-[calc(20/16*1rem)] text-[calc(22/16*1rem)] font-bold"><?php echo $title_contact; ?></h2>
                        <?php } ?>
                        <ul class="footer-nav">
                            <?php
                            if ($phone):
                                $link_url = $phone['url'];
                                $link_title = $phone['title'];
                                $link_target = $phone['target'] ? $phone['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center gap-2 before:content-[''] before:flex-none before:aspect-square before:w-5 before:bg-ivory-white before:[mask:url('../images/call.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php
                            if ($email):
                                $link_url = $email['url'];
                                $link_title = $email['title'];
                                $link_target = $email['target'] ? $email['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center gap-2 before:content-[''] before:flex-none before:aspect-square before:w-5 before:bg-ivory-white before:[mask:url('../images/mail.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($address) { ?>
                                <li>
                                    <address
                                            class="not-italic flex items-center gap-2 before:content-[''] before:flex-none before:aspect-square before:w-5 before:bg-ivory-white before:[mask:url('../images/location.svg')_center/contain_no-repeat]"><?php echo $address; ?></address>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="max-lg:space-y-2 space-y-4">
                        <?php if ($title_social) { ?>
                            <h2 class="font-merriweather max-lg:text-[calc(20/16*1rem)] text-[calc(22/16*1rem)] font-bold"><?php echo $title_social; ?></h2>
                        <?php } ?>
                        <ul class="flex items-center gap-5">
                            <?php
                            if ($google):
                                $link_url = $google['url'];
                                $link_title = $google['title'];
                                $link_target = $google['target'] ? $google['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center justify-center before:content-[''] before:flex-none before:aspect-square before:w-6 before:bg-ivory-white before:[mask:url('../images/google.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><span
                                                class="sr-only"><?php echo esc_html($link_title); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php
                            if ($instagram):
                                $link_url = $instagram['url'];
                                $link_title = $instagram['title'];
                                $link_target = $instagram['target'] ? $instagram['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center justify-center before:content-[''] before:flex-none before:aspect-square before:w-6 before:bg-ivory-white before:[mask:url('../images/instagram.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><span
                                                class="sr-only"><?php echo esc_html($link_title); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php
                            if ($facebook):
                                $link_url = $facebook['url'];
                                $link_title = $facebook['title'];
                                $link_target = $facebook['target'] ? $facebook['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center justify-center before:content-[''] before:flex-none before:aspect-square before:w-6 before:bg-ivory-white before:[mask:url('../images/facebook.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><span
                                                class="sr-only"><?php echo esc_html($link_title); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php
                            if ($tiktok):
                                $link_url = $tiktok['url'];
                                $link_title = $tiktok['title'];
                                $link_target = $tiktok['target'] ? $tiktok['target'] : '_self';
                                ?>
                                <li>
                                    <a class="flex items-center justify-center before:content-[''] before:flex-none before:aspect-square before:w-6 before:bg-ivory-white before:[mask:url('../images/tiktok.svg')_center/contain_no-repeat]"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><span
                                                class="sr-only"><?php echo esc_html($link_title); ?></span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>