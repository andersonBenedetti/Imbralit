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
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/rotacionar.svg" alt="Arraste para rotacionar">
          <h2>Arraste para rotacionar</h2>
        </div>
      </section>

      <section class="tabs-section">
        <div class="container">
          <div class="tabs">
            <button v-for="tab in tabs" :key="tab.id" :class="{ active: activeTab === tab.id }" @click="activeTab = tab.id">
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

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>