
<?php get_header(); ?>

<div class="content">
    <h1>Revêtements</h1>
    <ul class="product-list">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <li>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail('medium'); ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">En savoir plus</a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<?php get_footer(); ?>

