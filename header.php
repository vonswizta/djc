<?php
$head_code = get_field('head_code', 'option');
?>
<!doctype html>
<html <?php language_attributes(); ?> id="master" class="no-js">
<head itemscope itemtype="http://schema.org/WebSite">
    <?php if ($head_code) { ?>
        <?php echo $head_code; ?>
    <?php } ?>
    <style>
        html {
            display: none;
        }
    </style>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta itemprop="name" content="<?php bloginfo('name'); ?>">
    <meta itemprop="url" content="<?php echo site_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png"
          href="<?php echo get_template_directory_uri(); ?>/build/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/build/favicons/favicon.svg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/build/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/build/favicons/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Compass Campers">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/build/favicons/site.webmanifest.json">

    <link rel="preload"
          href="<?php echo get_template_directory_uri(); ?>/build/fonts/CenturyGothicPaneuropean-Bold.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload"
          href="<?php echo get_template_directory_uri(); ?>/build/fonts/CenturyGothicPaneuropean-BoldItalic.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/build/fonts/CenturyGothicPaneuropean.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload"
          href="<?php echo get_template_directory_uri(); ?>/build/fonts/CenturyGothicPaneuropean-Italic.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/build/fonts/EBGaramond-Bold.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/build/fonts/EBGaramond-BoldItalic.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/build/fonts/EBGaramond-Regular.woff2"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/build/fonts/EBGaramond-Italic.woff2"
          as="font" type="font/woff2" crossorigin>

    <link href="<?php echo get_template_directory_uri(); ?>/build/css/global.css?v=<?php echo time(); ?>" rel="preload"
          as="style" onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/build/css/global.css">
    </noscript>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" role="region">
    <a class="visually-hidden-focusable" href="#main">Skip to main content</a>
    <?php get_template_part('parts/global', 'masthead'); ?>
    <main id="main" itemscope itemprop="mainEntity">
