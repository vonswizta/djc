<header aria-labelledby="post-title" class="bg-charcoal-grey text-ivory-white">
    <div class="grid">
        <div class="col-start-1 lg:row-start-1 z-10">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-12 lg:gap-25">
                    <div class="max-lg:col-span-12 max-lg:space-y-4 lg:space-y-7 max-lg:py-7 lg:py-20 lg:col-span-6">
                        <h1 id="post-title" class="font-merriweather max-lg:text-[calc(30/16*1rem)] lg:text-[calc(60/16*1rem)] leading-[1] font-bold"><?php the_title(); ?></h1>
                        <?php
                        $excerpt = get_the_excerpt($post->ID);
                        if (!empty(trim($excerpt))) :
                            ?>
                            <p class="text-lg"><?php echo esc_html($excerpt); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-start-1 lg:row-start-1">
            <div class="grid grid-cols-12 h-full">
                <div class="max-lg:col-span-12 relative lg:col-span-6 lg:col-start-7">
                    <div class="max-lg:aspect-21/9 lg:absolute lg:inset-0">
                        <?php if (has_post_thumbnail()) { ?>
                            <?php echo get_the_post_thumbnail($post->ID, 'huge', array('loading' => 'eager', 'class' => 'w-full h-full object-cover')); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>