<?php get_header(); ?>

<?php
// Dados estruturados
$post_data = [
    'breadcrumb' => [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Blog', 'url' => '/blog']
    ],

    'share_buttons' => [
        [
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink(),
            'icon' => 'face-quadrado.svg',
            'label' => 'Compartilhar no Facebook'
        ],
        [
            'url' => 'https://wa.me/?text=' . get_permalink(),
            'icon' => 'whats-quadrado.svg',
            'label' => 'Compartilhar no WhatsApp'
        ],
        [
            'url' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink(),
            'icon' => 'linkedin-quadrado.svg',
            'label' => 'Compartilhar no LinkedIn'
        ]
    ],

    'social_media' => [
        [
            'url' => 'https://www.instagram.com/imbralit/',
            'icon' => 'hugeicons_instagram.svg',
            'label' => 'Acessar Instagram'
        ],
        [
            'url' => 'https://www.facebook.com/imbralit/?locale=pt_BR',
            'icon' => 'iconoir_facebook.svg',
            'label' => 'Acessar Facebook'
        ],
        [
            'url' => 'https://www.linkedin.com/company/imbralit-ltda/posts/?feedView=all',
            'icon' => 'basil_linkedin-outline.svg',
            'label' => 'Acessar LinkedIn'
        ],
        [
            'url' => 'https://www.tiktok.com/@imbralit',
            'icon' => 'proicons_tiktok.svg',
            'label' => 'Acessar TikTok'
        ],
        [
            'url' => 'https://www.youtube.com/@imbralit_br',
            'icon' => 'hugeicons_youtube.svg',
            'label' => 'Acessar YouTube'
        ]
    ],

    'query_args' => [
        'main' => [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'post__not_in' => [get_the_ID()]
        ],
        'carousel' => [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'order' => 'DESC',
            'post__not_in' => [get_the_ID()]
        ]
    ]
];
?>

<main id="pg-post">
    <section class="intro">
        <div class="container">
            <div class="infos">
                <?php foreach ($post_data['breadcrumb'] as $item): ?>
                    <a href="<?php echo esc_url(home_url($item['url'])); ?>">
                        <?php echo esc_html($item['label']); ?>
                        <span>></span>
                    </a>
                <?php endforeach; ?>
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
                                <?php foreach ($post_data['share_buttons'] as $button): ?>
                                    <a href="<?php echo esc_url($button['url']); ?>" target="_blank"
                                        aria-label="<?php echo esc_attr($button['label']); ?>">
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/icons/' . $button['icon']); ?>"
                                            alt="<?php echo esc_attr(str_replace('Compartilhar no ', '', $button['label'])); ?>">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn">Voltar ao blog</a>
                    </div>
                </div>

                <aside class="main-aside">
                    <div class="top">
                        <p class="title">O que você quer ler?</p>
                        <div class="search-box">
                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" name="s" placeholder="O que você está procurando..."
                                    value="<?php echo esc_attr(get_search_query()); ?>">
                                <button type="submit">
                                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/icons/search-icon.svg'); ?>"
                                        alt="Lupa">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="list-post">
                        <p class="title">mais lidas</p>
                        <div>
                            <?php $the_query = new WP_Query($post_data['query_args']['main']); ?>
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
                            <?php foreach ($post_data['social_media'] as $social): ?>
                                <a href="<?php echo esc_url($social['url']); ?>" target="_blank"
                                    aria-label="<?php echo esc_attr($social['label']); ?>">
                                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/icons/' . $social['icon']); ?>"
                                        alt="<?php echo esc_attr(str_replace('Acessar ', '', $social['label'])); ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="section-blog">
        <div class="container">
            <h2>Mais notícias</h2>
            <div class="carousel-blog">
                <?php $the_query = new WP_Query($post_data['query_args']['carousel']); ?>
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
</main>

<?php get_footer(); ?>