<section class="filter category-select">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-6 col-xl-4">
                <label for="filter-category" class="visually-hidden">Filter by category</label>
                <?php
                $args = array(
                    'show_option_all' => 'All topics',
                    'value_field' => 'slug',
                    'id' => 'filter-category',
                    'show_count' => 1
                );
                wp_dropdown_categories($args);
                ?>
            </div>
        </div>
    </div>
</section>