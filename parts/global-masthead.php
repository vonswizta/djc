<header class="masthead bg dark" itemscope itemtype="http://schema.org/WPHeader">
    <?php get_template_part('parts/global', 'offer'); ?>
    <div class="container-fluid">
        <div class="inner elements">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto sizer" itemscope itemtype="https://schema.org/Organization">
                    <?php get_template_part('parts/global', 'logo'); ?>
                </div>
                <div class="col nav-menu">
                    <div class="row align-items-center justify-content-end g-1">
                        <div class="col-auto">
                            <div class="row align-items-center g-1">
                                <div class="col-auto">
                                    <?php get_template_part('parts/global', 'language'); ?>
                                </div>
                                <div class="col-auto d-none d-xl-block">
                                    <div class="row align-items-center g-1">
                                        <div class="col-auto menu-header primary">
                                            <?php menu_header_primary(); ?>
                                        </div>
                                        <div class="col-auto menu-header secondary">
                                            <?php menu_header_secondary(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto d-xl-none">
                                    <button type="button" class="trigger menu-trigger open" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas-menu"
                                            aria-controls="offcanvas-menu">
                                        <span class="visually-hidden">Open menu</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php get_template_part('parts/menu', 'mobile'); ?>
