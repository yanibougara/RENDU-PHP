<?php
$dataRevetements = get_fields();
 get_header(); 
?>

<div class="content">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail(''); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    
    
    <section>
        <h2>Informations revêtements</h2>
        <p>La rapidité : <?= $dataRevetements['rapidité'] ?></p>
        <p>Le contrôle : <?= $dataRevetements['controle'] ?></p>
        <p>L'adhérence : <?= $dataRevetements['adherence'] ?></p>
        <p>L'épaisseur : <?= $dataRevetements['epaisseur'] ?></p>
    </section>


</div>

<?php get_footer(); ?>
