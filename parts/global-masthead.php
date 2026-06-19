<header id="header" class="bg-charcoal-grey text-ivory-white py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between">
            <?php get_template_part('parts/global', 'logo'); ?>
            <div class="max-lg:hidden">
                <div class="header-nav">
                    <?php menu_header(); ?>
                </div>
            </div>
            <div class="max-lg:hidden">
                <div class="flex flex-wrap items-center gap-3">
                    <?php get_template_part('parts/global', 'buttons'); ?>
                </div>
            </div>
            <div class="lg:hidden">
                <button
                        class="menu-toggle"
                        aria-controls="mobile-menu"
                        aria-expanded="false">
                    <span class="menu-toggle-text sr-only">Menu</span>
                </button>
            </div>
        </div>
    </div>
</header>
<div class="lg:hidden">
    <div class="mobile-nav">
        <div id="mobile-menu"
             class="mobile-menu py-4 text-ivory-white hidden"
             aria-hidden="true">
            <div class="container mx-auto px-4 space-y-3">
                <?php menu_header(); ?>
                <div class="space-y-3">
                    <?php get_template_part('parts/global', 'buttons'); ?>
                </div>
            </div>
        </div>
    </div>
</div>