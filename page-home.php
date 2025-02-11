<?php // Template Name: Home ?>

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

    <section class="featured-grid">
        <div class="container">
            <div class="content">
                <div class="column-one">
                    <div class="imgs">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linha-produtos.webp"
                            alt="Linha de produtos">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linha-produtos-2.webp"
                            alt="Linha de produtos">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linha-produtos-3.webp"
                            alt="Linha de produtos">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linha-produtos-4.webp"
                            alt="Linha de produtos">
                    </div>
                    <div>
                        <h3>Linha de </br>produtos</h3>
                        <p>Confira nossa linha completa de produtos em fibrocimento.</p>
                        <a href="#" class="btn">nossos produtos</a>
                    </div>
                </div>
                <div class="column-two">
                    <div>
                        <h3>Calculadora de coberturas</h3>
                        <p>Descubra quantas telhas são necessárias para a sua obra!</p>
                        <a href="#" class="btn tertiary">Quero calcular</a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/calculadora-coberturas.webp"
                        alt="Calculadora de coberturas">
                </div>
                <div class="column-three">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/onde-encontrar.webp"
                        alt="Onde encontrar">
                    <div>
                        <h3>Onde encontrar</h3>
                        <p>Encontre os fornecedores mais próximos a você </p>
                        <a href="#" class="btn tertiary">Quero encontrar</a>
                    </div>
                </div>
                <div class="column-four">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/seu-jorge.webp" alt="Seu Jorge">
                </div>
                <div class="column-five">
                    <div>
                        <h3>guia de instalação</h3>
                        <p>Guia rápido de instalação de telhas Imbralit</p>
                        <a href="#" class="btn">baixar guia</a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/guia.webp" alt="Ferramentas">
                </div>
            </div>
        </div>
    </section>

    <section class="intro-about">
        <div class="container">
            <div class="about-container">
                <div class="img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-home.webp" alt="Sobre nós">
                </div>
                <div class="content">
                    <span>sobre nós</span>
                    <h2>Desde 1974, fibrocimento é aqui.</h2>
                    <p>A Imbralit faz parte do Grupo Empresarial Jorge Zanatta. Produzindo telhas onduladas de
                        fibrocimento,
                        peças complementares e placas planas de fibrocimento, atuamos em todo o Brasil.</p>
                    <a href="#" class="btn tertiary">conheça a imbralit</a>
                    <a href="#" class="video-link">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play-video.svg"
                            alt="Play Video">
                        <p>Assista ao nosso vídeo institucional</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="products-catalog">
        <div class="container">
            <span class="subtitle">linha de produtos</span>
            <h2>a telha que cobre o brasil</h2>

            <div class="list-products">
                <?php
                $args = array(
                    'post_type' => 'produtos',
                    'status' => 'publish',
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()):
                        $the_query->the_post(); ?>

                <a href="<?php the_permalink(); ?>" class="item-product">
                    <div class="img">
                        <img class="dkp" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <span class="btn tertiary">ver todas</span>
                </a>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
                <?php endif; ?>
            </div>
            <a href="#" class="btn list-btn">conheça a linha completa</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>