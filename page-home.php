<?php // Template Name: Home ?>

<?php get_header(); ?>

<?php
$catalogCat = [
    ['link' => '/produtos/?produto_categoria=telhas&s=', 'img' => 'telhas.webp', 'title' => 'Telhas'],
    ['link' => '/produtos/?produto_categoria=pecas-complementares&s=', 'img' => 'pecas-complementares.webp', 'title' => 'Peças Complementares'],
    ['link' => '/produtos/?produto_categoria=chapa-cimenticia&s=', 'img' => 'chapa-cimenticia.webp', 'title' => 'Chapa Cimentícia'],
    ['link' => '/produtos/?produto_categoria=acessorios-de-fixacao-e-vedacao&s=', 'img' => 'acessorios.webp', 'title' => 'Acessórios de fixação e vedação'],
];
?>

<main id="pg-home">

    <section class="intro section-aba">
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
            <div class="slick-counter">1/
                <?= $total_slides; ?>
            </div>

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
                        <a href="/produtos" class="btn">nossos produtos</a>
                    </div>
                </div>
                <div class="column-two">
                    <div>
                        <h3>Calculadora de coberturas</h3>
                        <p>Descubra quantas telhas são necessárias para a sua obra!</p>
                        <a href="/calculadora" class="btn tertiary">Quero calcular</a>
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
                        <a href="quero-encontrar" class="btn tertiary">Quero encontrar</a>
                    </div>
                </div>
                <div class="column-four">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/seu-jorge.webp" alt="Seu Jorge">
                </div>
                <div class="column-five">
                    <div>
                        <h3>guia de instalação</h3>
                        <p>Guia rápido de instalação de telhas Imbralit</p>
                        <?php
                        $guide_file = '/wp-content/uploads/2025/04/guia-rapido-de-instalacao-doc-4.pdf';
                        $guide_url = esc_url(home_url($guide_file));
                        ?>

                        <a href="<?php echo $guide_url; ?>" class="btn" download type="application/pdf">
                            Baixar guia
                        </a>
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/guia.webp" alt="Ferramentas">
                </div>
            </div>
        </div>
    </section>

    <section class="intro-about section-aba">
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
                    <a href="/nossa-historia" class="btn tertiary">conheça a imbralit</a>
                    <a href="https://www.youtube.com/watch?v=aXkfX9Cw1FE" class="video-link" rel="wp-video-lightbox">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play-video.svg"
                            alt="Play Video">
                        <p>Assista ao nosso vídeo institucional</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="products-catalog section-aba">
        <div class="container">
            <span class="subtitle">linha de produtos</span>
            <h2>a telha que cobre o brasil</h2>
            <div class="list-products">
                <?php foreach ($catalogCat as $cat): ?>
                    <a href="<?= esc_url($cat['link']); ?>" class="item-product">
                        <div class="img">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/img/<?= esc_attr($cat['img']); ?>"
                                alt="<?= esc_attr($cat['title']); ?>">
                        </div>
                        <h3><?= esc_html($cat['title']); ?></h3>
                        <span class="btn tertiary">ver todas</span>
                    </a>
                <?php endforeach; ?>
            </div>
            <a href="/produtos" class="btn list-btn">conheça a linha completa</a>
        </div>
    </section>

    <section class="section-blog">
        <div class="container">
            <div class="top">
                <div>
                    <span class="subtitle">Blog Imbralit</span>
                    <h2>Confira as últimas notícias</h2>
                </div>
                <a href="/blog" class="btn">ver todas as notícias</a>
            </div>
            <div class="carousel-blog">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'status' => 'publish',
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()):
                        $the_query->the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="item-blog">
                            <div class="img">
                                <img class="dkp" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="bottom">
                                <h3><?php the_title(); ?></h3>
                                <span class="btn-blog">+</span>
                            </div>
                        </a>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p><?php _e('Desculpe, nenhum post encontrado.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="social section-aba">
        <div class="container">
            <div class="content">
                <span class="subtitle">@imbralit</span>
                <h2>Acompanhe no instagram</h2>
                <a href="https://www.instagram.com/imbralit/" target="_blank" class="btn">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram-icon.svg"
                        alt="Instagram">
                    Siga-nos
                </a>
            </div>
        </div>
    </section>

    <section class="social-action">
        <div class="container">
            <div class="content">
                <div class="text">
                    <h2>Compromisso social</h2>
                    <p>Nosso compromisso social transcende a responsabilidade corporativa, materializando-se em ações
                        que geram impactos positivos na comunidade onde atuamos.</p>
                    <a href="/politica-integrada" class="btn">saiba mais</a>
                </div>
                <div class="carousel-social">
                    <?php
                    $args = array(
                        'post_type' => 'compromisso_social',
                        'status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args); ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>

                            <div class="item">
                                <div class="img">
                                    <img class="dkp" src="<?php the_post_thumbnail_url('large'); ?>"
                                        alt="<?php the_title(); ?>">
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>