
<?php
$dataBois = get_fields();
 get_header(); ?>

<div class="content">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail(''); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>