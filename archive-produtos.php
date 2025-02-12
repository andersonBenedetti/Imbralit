<?php get_header(); ?>

<main id="pg-products">

  <section class="intro">
    <div class="container">
      <div class="content">
        <div>
          <p>linha de produtos Imbralit</p>
          <h1>
            <?php
            if (isset($_GET['produto_categoria']) && !empty($_GET['produto_categoria'])) {
              // Obter a categoria baseada no parâmetro da URL
              $category = get_term_by('slug', $_GET['produto_categoria'], 'produto_categoria');

              if ($category) {
                // Buscar e exibir o campo customizado da categoria usando ACF
                $texto_categoria = get_field('texto_da_categoria', 'produto_categoria_' . $category->term_id);
                if ($texto_categoria) {
                  echo '<p>' . esc_html($texto_categoria) . '</p>';
                }
              }
            } else {
              // Se nenhuma categoria estiver selecionada, exibe o título do arquivo
              post_type_archive_title();
            }
            ?>
          </h1>
          <form method="GET" action="<?php echo esc_url(home_url('/produtos/')); ?>">
            <select name="produto_categoria" onchange="this.form.submit()">
              <option value="">Selecione uma Categoria</option>
              <?php
              $args = array(
                'taxonomy' => 'produto_categoria',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => true,
              );
              $categories = get_terms($args);
              foreach ($categories as $category) {
                echo '<option value="' . esc_attr($category->slug) . '" ' . selected(get_query_var('produto_categoria'), $category->slug, false) . '>' . esc_html($category->name) . '</option>';
              }
              ?>
            </select>
          </form>

        </div>
      </div>
    </div>
  </section>

  <div class="container">

    <?php
    $args = array(
      'post_type' => 'produtos',
      'posts_per_page' => -1,
    );

    if (isset($_GET['produto_categoria']) && !empty($_GET['produto_categoria'])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'produto_categoria',
          'field' => 'slug',
          'terms' => $_GET['produto_categoria'],
          'operator' => 'IN',
        ),
      );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
      ?>
      <div class="list-products">
        <?php while ($query->have_posts()):
          $query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="item-product">
            <div class="img">
              <?php if (has_post_thumbnail()): ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
              <?php endif; ?>
            </div>
            <h3><?php the_title(); ?></h3>
            <span class="btn tertiary">ver mais</span>
          </a>
        <?php endwhile; ?>
      </div>

      <div class="paginacao">
        <?php
        echo paginate_links(array(
          'total' => $query->max_num_pages,
        ));
        ?>
      </div>
    <?php else: ?>
      <p>Nenhum produto encontrado.</p>
    <?php endif;
    wp_reset_postdata(); ?>

  </div>
</main>

<?php get_footer(); ?>