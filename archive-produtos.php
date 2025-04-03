<?php get_header(); ?>

<main id="pg-products">
    <section class="intro">
        <div class="container">
            <div class="content">
                <div>
                    <h2>linha de produtos Imbralit</h2>
                    <h1>
                        <?php
            if (isset($_GET['produto_categoria']) && !empty($_GET['produto_categoria'])) {
              $category = get_term_by('slug', $_GET['produto_categoria'], 'produto_categoria');
              if ($category) {
                $texto_categoria = get_field('texto_da_categoria', 'produto_categoria_' . $category->term_id);
                if ($texto_categoria) {
                  echo '<p>' . esc_html($texto_categoria) . '</p>';
                }
              }
            } else {
              post_type_archive_title();
            }
            ?>
                    </h1>
                </div>

                <form method="GET" action="<?php echo esc_url(home_url('/produtos/')); ?>">
                    <p class="title-filter">Filtre por categoria</p>
                    <div class="filters">
                        <select name="produto_categoria" onchange="this.form.submit()">
                            <option value="">Todos os produtos</option>
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
                        <div class="search-box">
                            <input type="text" name="s" placeholder="Buscar produtos..."
                                value="<?php echo get_search_query(); ?>">
                            <button type="submit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/search-icon.svg"
                                    alt="Lupa">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    if (isset($_GET['produto_categoria']) && !empty($_GET['produto_categoria'])) {
      $category = get_term_by('slug', $_GET['produto_categoria'], 'produto_categoria');
      if ($category) {
        $imagem_categoria = get_field('imagem_da_categoria', 'produto_categoria_' . $category->term_id);
        if ($imagem_categoria) {
          echo '<img class="img-intro" src="' . esc_url($imagem_categoria) . '" alt="' . esc_attr($category->name) . '" class="categoria-imagem">';
        }
      }
    }
    ?>
    </section>

    <div class="container">
        <?php
    $args = array(
      'post_type' => 'produtos',
      'posts_per_page' => -1,
      's' => isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '',
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
            <a href="<?php the_permalink(); ?>" class="item-product product-element">
                <div class="img">
                    <?php if (has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <h3><?php the_title(); ?></h3>
                <span class="btn tertiary">mais informações</span>
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