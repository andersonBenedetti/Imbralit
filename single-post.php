<?php get_header(); ?>

<main id="pg-post">

    <section class="intro">
        <div class="container">
            <div class="infos">
                <a href="/">
                    Home
                    <span>></span>
                </a>
                <a href="/blog">
                    Blog
                    <span>></span>
                </a>
            </div>
        </div>
    </section>

    <section class="content-post">
        <div class="container">
            <div class="infos-post">
                <div class="main-post">
                    <h1><?php the_title(); ?></h1>
                    <h2 class="date">
                        <?php
                        $data_do_post = get_post_meta(get_the_ID(), 'data_do_post', true);

                        if ($data_do_post) {
                            $data_formatada = DateTime::createFromFormat('Ymd', $data_do_post);

                            if ($data_formatada) {
                                setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'portuguese');

                                echo strftime('%d %b %Y', $data_formatada->getTimestamp());
                            } else {
                                echo "Data inválida";
                            }
                        } else {
                            echo "Data não definida";
                        }
                        ?>
                    </h2>
                    <div class="img-post">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="btns-post">
                        <div>
                            <p>Compartilhe:</p>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                                    target="_blank" aria-label="Compartilhar no Facebook">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/face-quadrado.svg"
                                        alt="Facebook">
                                </a>
                                <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank"
                                    aria-label="Compartilhar no WhatsApp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/whats-quadrado.svg"
                                        alt="WhatsApp">
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"
                                    target="_blank" aria-label="Compartilhar no LinkedIn">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/linkedin-quadrado.svg"
                                        alt="LinkedIn">
                                </a>
                            </div>
                        </div>

                        <a href="#" class="btn">Voltar ao blog</a>
                    </div>
                </div>

                <aside class="main-aside">
                    <div class="top">
                        <p class="title">O que você quer ler?</p>
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
                    <div class="list-post">
                        <p class="title">mais lidas</p>
                        <div>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'status' => 'publish',
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                            );
                            $the_query = new WP_Query($args); ?>

                            <?php if ($the_query->have_posts()): ?>
                                <?php while ($the_query->have_posts()):
                                    $the_query->the_post(); ?>

                                    <a href="<?php the_permalink(); ?>" class="item">
                                        <div class="img">
                                            <img class="dkp" src="<?php the_post_thumbnail_url('large'); ?>"
                                                alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="infos">
                                            <h3><?php the_title(); ?></h3>
                                            <p class="btn-item">
                                                Ler
                                                <span>></span>
                                            </p>
                                        </div>
                                    </a>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else: ?>
                                <p><?php _e('Desculpe, nenhum post encontrado.'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="social">
                        <p class="title">Siga-nos nas redes sociais:</p>
                        <div>
                            <a href="#" target="_blank" aria-label="Acessar LinkedIn">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/hugeicons_instagram.svg"
                                    alt="Instagram">
                            </a>
                            <a href="#" target="_blank" aria-label="Acessar Facebook">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/iconoir_facebook.svg"
                                    alt="Facebook">
                            </a>
                            <a href="#" target="_blank" aria-label="Acessar LinkedIn">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/basil_linkedin-outline.svg"
                                    alt="LinkedIn">
                            </a>
                            <a href="#" target="_blank" aria-label="Acessar TikTok">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/proicons_tiktok.svg"
                                    alt="TikTok">
                            </a>
                            <a href="#" target="_blank" aria-label="Acessar YouTube">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/hugeicons_youtube.svg"
                                    alt="YouTube">
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

</main><?php get_footer(); ?>