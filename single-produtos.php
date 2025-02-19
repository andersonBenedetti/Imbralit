<?php get_header(); ?>

<main id="single-products">
    <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>

    <section class="intro">
        <div class="container">
            <div class="content">
                <h3>Página inicial > Produtos > telhas > <span><?php the_title(); ?></span></h3>
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

    <section class="video-product">
        <a class="video-link fancybox" href="<?php echo get_post_meta(get_the_ID(), 'link_do_video', true); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play-video.svg" alt="Play Video">
            <p>Assista ao vídeo do produto</p>
        </a>
    </section>

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
                    <?php echo get_post_meta(get_the_ID(), 'especificacoes_tecnicas', true); ?>
                </div>
                <div v-if="activeTab === 'downloads'">
                    <h3>Downloads</h3>
                    <div><?php echo get_post_meta(get_the_ID(), 'avaliacoes', true); ?></div>
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