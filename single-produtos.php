<?php get_header(); ?>

<main id="single-products">
    <div class="card-b2b">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/solar_user-broken.svg" alt="User">
        <p>Para ver as informações completas deste produto acesse a área de lojista.</p>
        <a href="/compre-aqui" class="btn tertiary">Compre agora!</a>
    </div>

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <section class="intro">
                <div class="container">
                    <div class="content">
                        <h3 class="breadcrumb">
                            <a href="<?php echo home_url('/'); ?>">Página inicial</a> >
                            <a href="<?php echo home_url('/produtos'); ?>">Produtos</a> >
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'produto_categoria');
                            if ($categories && !is_wp_error($categories)) {
                                $category = reset($categories); // Pega a primeira categoria
                                echo '<a href="' . esc_url(get_term_link($category)) . '">' . $category->name . '</a>';
                            }
                            ?> >
                            <span><?php the_title(); ?></span>
                        </h3>
                        <h1><?php the_title(); ?></h1>
                        <h2>Referência: <?php echo get_post_meta(get_the_ID(), 'referencia', true); ?></h2>
                    </div>
                </div>
            </section>

            <section class="product-details">
                <div class="img">
                    <?php if (has_post_thumbnail())
                        the_post_thumbnail('large'); ?>
                </div>
                <div class="bottom">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/rotacionar.svg"
                        alt="Arraste para rotacionar">
                    <h2>Arraste para rotacionar</h2>
                </div>
            </section>

            <?php
            $link_do_video = get_post_meta(get_the_ID(), 'link_do_video', true);

            if ($link_do_video): ?>
                <section class="video-product">
                    <a class="video-link fancybox" href="<?php echo esc_url($link_do_video); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play-video.svg" alt="Play Video">
                        <p>Assista ao vídeo do produto</p>
                    </a>
                </section>
            <?php endif; ?>

            <section class="tabs-section">
                <div class="container">
                    <div class="tabs">
                        <button v-for="tab in tabs" :key="tab.id" :class="{ active: activeTab === tab.id }"
                            @click="activeTab = tab.id">
                            {{ tab.label }}
                        </button>
                    </div>
                    <div class="tab-content">
                        <div v-if="activeTab === 'descricao'" class="description">
                            <?php the_content(); ?>
                        </div>
                        <div v-if="activeTab === 'especificacoes'">
                            <?php
                            $especificacoes = get_post_meta(get_the_ID(), 'especificacoes_tecnicas', true);

                            if ($especificacoes):
                                echo do_shortcode($especificacoes);
                            else:
                                echo '<p>Não há especificações técnicas disponíveis para este produto.</p>';
                            endif;
                            ?>
                        </div>
                        <div v-if="activeTab === 'downloads'">
                            <?php
                            // Verifica se o repeater 'downloads' possui valores
                            if (have_rows('downloads')): ?>
                                <div class="downloads-list">
                                    <?php
                                    // Loop através dos itens do repeater
                                    while (have_rows('downloads')):
                                        the_row();
                                        $titulo_do_arquivo = get_sub_field('titulo_do_arquivo');
                                        $upload_do_arquivo = get_sub_field('upload_do_arquivo');

                                        if ($titulo_do_arquivo && $upload_do_arquivo): ?>
                                            <a class="download-item" href="<?php echo esc_url($upload_do_arquivo); ?>" download>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/solar_download-outline.svg"
                                                    alt="Download arquivo">
                                                <p><?php echo esc_html($titulo_do_arquivo); ?></p>
                                            </a>
                                            <br>
                                        <?php endif;
                                    endwhile;
                                    ?>
                                </div>
                            <?php else: ?>
                                <p>Não há arquivos para download.</p>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </section>

            <?php
            $current_product_id = get_the_ID();

            $args = array(
                'post_type' => 'produtos',
                'posts_per_page' => 4,
                'post__not_in' => array($current_product_id),
            );

            $related_products = new WP_Query($args);
            ?>

            <section class="products-catalog">
                <div class="container">
                    <h2>Confira outros produtos</h2>
                    <div class="list-products">
                        <?php if ($related_products->have_posts()): ?>
                            <?php while ($related_products->have_posts()):
                                $related_products->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="item-product">
                                    <div class="img">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <span class="btn tertiary">ver mais</span>
                                </a>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p>Nenhum outro produto encontrado.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>