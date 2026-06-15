<?php
$blog_image = get_field('blog_image', 'option');
?>

<?php get_header(); ?>
    <section class="hero layers bg dark">
        <div class="layer content elements">
            <div class="inner text-center tall">
                <div class="container tall">
                    <div class="detail tall hero-gap">
                        <div class="hero-header group-gap standard">
                            <h1>Sorry</h1>
                            <p>The page you’re looking for can’t be found.</p>
                            <a class="button" href="<?php echo home_url(); ?>">Get back on track</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layer graphic">
            <figure class="media banner overlay tall">
                <?php if ($blog_image) { ?>
                    <?php
                    $imageID = $blog_image['ID'];
                    echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager'));
                    ?>
                <?php } ?>
            </figure>
        </div>
    </section>
<?php get_footer(); ?>