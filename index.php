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

    <section class="content-blog">
        <div class="container">
            <div class="top">
                <h2>
                    <?php echo isset($_GET['s']) ? 'Resultados da pesquisa para: "' . esc_html($_GET['s']) . '"' : 'Todas as notícias'; ?>
                </h2>
                <div class="search-box">
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" name="s" placeholder="O que você está procurando..."
                            value="<?php echo get_search_query(); ?>">
                        <button type="submit">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/search-icon.svg"
                                alt="Lupa">
                        </button>
                    </form>
                </div>
            </div>

            <div class="list-blog">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'status' => 'publish',
                    'posts_per_page' => 8,
                    'order' => 'DESC',
                    'paged' => $paged,
                    's' => get_search_query(),
                );
                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()):
                        $the_query->the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="item-post">
                            <div class="img">
                                <img class="dkp" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <span class="btn-blog">ler mais</span>
                        </a>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p><?php _e('Desculpe, nenhum resultado encontrado para sua busca.'); ?></p>
                <?php endif; ?>
            </div>

            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $the_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<span class="prev-arrow"></span>',
                    'next_text' => '<span class="next-arrow"></span>',
                ));
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>