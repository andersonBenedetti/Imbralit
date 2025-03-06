<?php // Template Name: SAC ?>

<?php get_header(); ?>

<?php
$faqs = [
    [
        'question' => 'Como faço um pedido?',
        'answer' => 'Para fazer um pedido, basta acessar nossa loja online...'
    ],
    [
        'question' => 'Quais são os métodos de pagamento?',
        'answer' => 'Aceitamos cartões de crédito, débito e Pix.'
    ],
    [
        'question' => 'Qual é o prazo de entrega?',
        'answer' => 'O prazo de entrega varia de acordo com a sua localização.'
    ]
];
?>

<main id="pg-sac">

    <section class="intro section-aba">
        <div class="container">
            <h1>SAC</h1>
        </div>
    </section>

    <section class="section-infos section-aba">
        <div class="container">
            <div class="content">
                <div>
                    <h2>Entre em contato conosco</h2>
                    <p>Por gentileza, selecione o departamento e diga-nos como podemos ajudar você:
                    </p>
                    <div class="contact-infos">
                        <?php include(TEMPLATEPATH . '/inc/OurContact.php'); ?>
                    </div>
                </div>
                <img class="img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sac-contato.webp"
                    alt="Ícone de download">
            </div>
        </div>
    </section>

    <section class="section-faq  section-aba">
        <div class="content">
            <h3>FAQ</h3>
            <h2>Perguntas frequentes</h2>
            <div class="container-faq">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="faq-item">
                        <button class="faq-question" data-index="<?php echo $index; ?>">
                            <?php echo $faq['question']; ?>
                            <img class="arrow-icon"
                                src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-up.svg" alt="Arrow">
                        </button>
                        <p class="faq-answer">
                            <?php echo $faq['answer']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section-downloads">
        <div>
            <h3>Downloads</h3>
            <h2>Materiais</h2>
            <p class="text">Certificações, institucionais, manual de instalação, pesquise por nome ou categoria abaixo.
            </p>

            <div class="container-items">
                <div class="items-content">
                    <?php
                    $args = array(
                        'post_type' => 'downloads',
                        'status' => 'publish',
                        'posts_per_page' => 6,
                        'order' => 'DESC',
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    );
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>

                            <div class="item">
                                <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pdf.svg"
                                    alt="Baixar PDF">
                                <div>
                                    <p><?php the_title(); ?></p>
                                    <a href="<?php the_field('arquivo_para_download'); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/baixar.svg"
                                            alt="Baixar">
                                        <span>Baixar</span>
                                    </a>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p><?php _e('Desculpe, nenhum certificado encontrado.'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $the_query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => '<span class="prev-arrow"></span>',
                        'next_text' => '<span class="next-arrow"></span>',
                    ));
                    ?>
                </div>
            </div>

        </div>
    </section>


</main>

<?php get_footer(); ?>