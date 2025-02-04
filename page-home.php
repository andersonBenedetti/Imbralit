<?php
// Template Name: Home
?>

<?php get_header(); ?>

<?php
$items = [
  ['icon' => 'item-1.svg', 'text' => 'Elimina da madeira qualquer tipo de praga quarentenária.'],
  [
    'icon' => 'item-2.svg',
    'text' => 'É um processo não poluente, de eficiência
comprovada.'
  ],
  ['icon' => 'item-3.svg', 'text' => 'Método muito mais rápido que a fumigação usual.'],
  ['icon' => 'item-4.svg', 'text' => 'Equipe qualificada e pronta para atender sua empresa'],
  ['icon' => 'item-5.svg', 'text' => 'Elevação gradual da temperatura, sem danificar a madeira.'],
];

$products = [
  ['img' => 'paletes.webp', 'title' => 'Paletes', 'link' => '#'],
  ['img' => 'caixas.webp', 'title' => 'Caixas', 'link' => '#'],
  ['img' => 'barrotes-madeiras.webp', 'title' => 'Barrotes e Madeira de Peação', 'link' => '#'],
];
?>

<main id="pg-home">

    <section class="intro-banner">
        <div class="banner">
            <div class="content">
                <h2>mais segurança no seu transporte </h2>
                <h1>Linha completa de paletes fumigados</h1>
                <p class="text">Confira nossa linha completa de produtos para um transporte adequado e seguro.</p>
                <a href="#" class="btn secondary">Conheça nossa linha</a>
                <a href="#" class="link">
                    <?php include get_stylesheet_directory() . '/img/icons/arrow-intro.svg'; ?>
                </a>
            </div>
        </div>
    </section>

    <section class="pallets">
        <div class="container">
            <div class="content">
                <span>Fumigação de paletes para exportação</span>
                <h2>Tratamento HT móvel</h2>
                <p>Nosso tratamento térmico por ar quente forçado para controle de pragas, possui inúmeros benefícios
                    para o seu negócio. Confira!</p>
                <a href="#" class="btn">Entre em contato</a>
            </div>

            <div class="items">
                <?php foreach ($items as $item): ?>
                <div class="item">
                    <div class="icon">
                        <?php include get_stylesheet_directory() . '/img/icons/' . esc_attr($item['icon']); ?>
                    </div>
                    <p><?php echo esc_html($item['text']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="products container">
        <h2>Veja nossos produtos</h2>
        <div class="items">
            <?php foreach ($products as $product): ?>
            <a href="<?php echo esc_url($product['link']); ?>" class="item">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/' . $product['img']); ?>"
                    alt="<?php echo esc_html($product['title']); ?>">
                <div class="content">
                    <h3><?php echo esc_html($product['title']); ?></h3>
                    <span>Saiba mais</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="blog-posts">
        <div class="container">
            <p class="subtitle">pra você ficar por dentro</p>
            <h2>Últimas notícias</h2>
            <div class="cards-blog">
                <?php
        $args = [
          'post_type' => 'post',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'DESC',
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            ?>
                <a href="<?php the_permalink(); ?>" class="card">
                    <?php if (has_post_thumbnail()): ?>
                    <div class="thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="content">
                        <h3><?php the_title(); ?></h3>
                        <p class="description"><?php the_field('description_post'); ?></p>
                        <div class="bottom">
                            <span class="read-more">Continue lendo</span>
                            <span class="date-post"><?php the_field('date_post'); ?></span>
                        </div>
                    </div>
                </a>
                <?php
          endwhile;
        else:
          echo '<p>Nenhum post encontrado.</p>';
        endif;

        wp_reset_postdata();
        ?>
            </div>
            <a href="#" class="btn">Ver mais notícias</a>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <img class="img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about.webp" alt="Quem somos">
            <div class="content">
                <p class="subtitle">Quem somos</p>
                <h2>Conheça a Mundial</h2>
                <p class="text">A Mundial Tratamentos Fitossanitários iniciou as suas atividades em 2015 e tem como
                    objetivo a prestação de serviços de tratamento fitossanitários em embalagens de madeira.</p>
                <a href="#" class="btn">Leia mais</a>
            </div>
        </div>
    </section>

    <section class="contact">
        <h2>Entre em contato conosco!</h2>
        <?php carregar_formulario('home'); ?>
    </section>

</main>

<?php get_footer(); ?>