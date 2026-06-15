<?php
$avatar_url = get_avatar_url(get_the_author_meta('ID'), array('size' => 200));
$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$author_name = '';
$author_info = get_the_author_meta('description');
$author = get_the_author();
?>

<div class="article-author group-gap mini">
    <figure class="media square profile">
        <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo $author; ?>">
    </figure>
    <div class="group-gap mini text-center">
        <p class="name serif bold">Article by <?php
            if ($fname && $lname) {
                $author_name = "{$fname} {$lname}";
            } else {
                $author_name = $author;
            }
            echo $author_name;
            ?></p>
        <p class="date serif font-medium">
            <?php the_time('F j, Y'); ?>
        </p>
    </div>
</div>