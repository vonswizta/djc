<?php
$menu_mobile_title = get_field('menu_mobile_title', 'option');
?>

<section class="d-xl-none">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvas-menu-title">
        <div class="offcanvas-top">
            <div class="row justify-content-between align-items-center">
                <?php if ($menu_mobile_title) { ?>
                    <div class="col-auto">
                        <h2 class="font-body bold" id="offcanvas-menu-title"><?php echo $menu_mobile_title; ?></h2>
                    </div>
                <?php } ?>
                <div class="col-auto">
                    <button type="button" class="trigger menu-trigger close" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                        <span class="visually-hidden">Close menu</span>
                    </button>
                </div>
            </div>
        </div>
        <?php menu_header_primary(); ?>
        <?php menu_header_secondary(); ?>
    </div>
</section>