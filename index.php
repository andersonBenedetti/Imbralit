<?php get_header(); ?>

<main id="pg-blog">

    <section class="intro">
        <div class="container">
            <div class="top">
                <a href="/">
                    Home
                    <span>></span>
                </a>
                <h1>Blog Imbralit</h1>
                <h2>Confira as últimas notícias</h2>
            </div>

            <div class="posts">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'status' => 'publish',
                    'posts_per_page' => 1,
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

    <section class="content-blog" id="content-blog">
        <div class="container">
            <div class="top">
                <h2>
                    <?php
                    $search_term = isset($_GET['s']) ? esc_html($_GET['s']) : '';
                    $category_slug = isset($_GET['category_name']) ? $_GET['category_name'] : '';

                    if ($search_term && $category_slug) {
                        $category = get_term_by('slug', $category_slug, 'category');
                        $category_name = $category ? $category->name : '';
                        echo 'Resultados para "' . $search_term . '" na categoria: ' . esc_html($category_name);
                    } elseif ($search_term) {
                        echo 'Resultados da pesquisa para: "' . $search_term . '"';
                    } elseif ($category_slug) {
                        $category = get_term_by('slug', $category_slug, 'category');
                        echo 'Categoria: ' . ($category ? esc_html($category->name) : '');
                    } else {
                        echo 'Todas as notícias';
                    }
                    ?>
                </h2>
                <div class="filters-blog">
                    <form method="GET" action="<?php echo esc_url(home_url('/#content-blog')); ?>">
                        <select name="category_name" onchange="this.form.submit()">
                            <option value="">Todos os artigos</option>
                            <?php
                            $args = array(
                                'taxonomy' => 'category',
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => true,
                                'exclude' => array(1),
                            );
                            $categories = get_terms($args);
                            foreach ($categories as $category) {
                                echo '<option value="' . esc_attr($category->slug) . '" ' . selected(isset($_GET['category_name']) ? $_GET['category_name'] : '', $category->slug, false) . '>' . esc_html($category->name) . '</option>';
                            }
                            ?>
                        </select>
                        <div class="search-box">
                            <input type="text" name="s" placeholder="Buscar artigos..."
                                value="<?php echo get_search_query(); ?>">
                            <button type="submit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/search-icon.svg"
                                    alt="Lupa">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'paged' => $paged,
                's' => isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '',
            );

            if (isset($_GET['category_name']) && !empty($_GET['category_name'])) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $_GET['category_name'],
                        'operator' => 'IN',
                    ),
                );
            }

            $query = new WP_Query($args);

            if ($query->have_posts()):
                ?>
                <div class="list-blog">
                    <?php while ($query->have_posts()):
                        $query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="item-post">
                            <div class="img">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php endif; ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <span class="btn-blog">ler mais</span>
                        </a>
                    <?php endwhile; ?>
                </div>

                <div class="paginacao">
                    <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('« Anterior'),
                        'next_text' => __('Próxima »'),
                    ));
                    ?>
                </div>
            <?php else: ?>
                <p class="no-results">Nenhum artigo encontrado.</p>
            <?php endif;
            wp_reset_postdata(); ?>
    </section>

</main>

<?php get_footer(); ?>