<?php // Template Name: Trabalhe conosco ?>

<?php get_header(); ?>

<?php
$beneficios = [
    [
        "icone" => "saude.svg",
        "texto" => "Plano de saúde*"
    ],
    [
        "icone" => "odontologico.svg",
        "texto" => "Plano odontológico*"
    ],
    [
        "icone" => "restaurante.svg",
        "texto" => "Restaurante Interno"
    ],
    [
        "icone" => "gratificacao.svg",
        "texto" => "Gratificação por Resultados (PPR)"
    ],
    [
        "icone" => "desconto.svg",
        "texto" => "Desconto em produtos Imbralit"
    ],
    [
        "icone" => "cesta.svg",
        "texto" => "Cesta básica"
    ],
];

$itens = [
    ["icone" => "associacao.svg", "texto" => "Associação de eventos completa"],
    ["icone" => "lanchonete.svg", "texto" => "Lanchonete Interna"],
    ["icone" => "parcerias.svg", "texto" => "Parcerias com Instituições de Ensino e Academias"]
];
?>

<main id="pg-vacancies">

    <section class="intro section-aba">
        <div class="container">
            <h1>Trabalhe conosco</h1>
            <p>Por gentileza, selecione o departamento e diga-nos como podemos ajudar você:</p>
        </div>
    </section>

    <section class="section-content section-aba">
        <img class="img-content" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trabalhe-conosco.webp"
            alt="Trabalhe conosco">

        <div class="content">
            <h2>Venha ser Imbralit</h2>
            <p class="text">Confira os principais benefícios que oferecemos para nossos colaboradores:</p>

            <ul class="list-content">
                <?php foreach ($beneficios as $beneficio): ?>
                    <li class="item-content">
                        <img class="icon-content"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/<?php echo $beneficio['icone']; ?>"
                            alt="Icon">
                        <p><?php echo $beneficio['texto']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="#diferencias" class="arrow-content">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-down-azul.svg" alt="arrow ancora">
        </a>
    </section>

    <section class="section-infos section-aba" id="diferencias">
        <div class="container">
            <div class="top">
                <h3>Diferenciais</h3>
                <ul class="list-infos">
                    <?php foreach ($itens as $item): ?>
                        <li class="item-infos">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/<?php echo $item['icone']; ?>"
                                alt="<?php echo htmlspecialchars($item['texto']); ?>">
                            <p><?php echo htmlspecialchars($item['texto']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="bottom">
                <h4>Trabalhe conosco</h4>
                <h2>Vagas abertas</h2>

                <ul class="list-vacancies">
                    <?php
                    $args = array(
                        'post_type' => 'vagas',
                        'status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args); ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>

                            <li class="item-vacancies">
                                <p><?php the_title(); ?></p>
                                <a href="<?php the_permalink(); ?>">
                                    Ver descrição da vaga
                                </a>
                            </li>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p><?php _e('Desculpe, nenhuma vaga encontrada.'); ?></p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="section-contact">
        <div class="container">
            <div class="content">
                <div class="infos">
                    <h2>Fale com nosso equipe de contratação</h2>
                    <div class="contact-infos">
                        <?php include(TEMPLATEPATH . '/inc/OurContact.php'); ?>
                    </div>
                </div>

                <img class="img-contact" src="<?php echo get_stylesheet_directory_uri(); ?>/img/nossa-equipe.webp"
                    alt="Fale com nosso equipe de contratação">
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>