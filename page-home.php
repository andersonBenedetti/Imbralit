<?php
// Template Name: Home
?>

<?php get_header(); ?>

<main id="pg-home">

    <section class="intro">
        <?php
        $args = array(
            'post_type' => 'carrossel',
            'status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DESC',
        );
        $the_query = new WP_Query($args);
        $total_slides = $the_query->found_posts;
        ?>

        <?php if ($the_query->have_posts()): ?>
        <div class="slick-counter">1/<?= $total_slides; ?></div>

        <section class="carousel-banner">
            <?php while ($the_query->have_posts()):
                    $the_query->the_post(); ?>

            <a href="<?php the_field('link_img'); ?>">
                <img class="dkp" src="<?php the_field('img_desktop'); ?>" alt="<?php the_title(); ?>">
                <img class="mbl" src="<?php the_field('img_mobile'); ?>" alt="<?php the_title(); ?>">
            </a>

            <?php endwhile; ?>
        </section>

        <?php wp_reset_postdata(); ?>
        <?php else: ?>
        <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
        <?php endif; ?>
    </section>

</main>

<?php get_footer(); ?>