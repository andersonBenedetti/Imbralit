<?php // Template Name: SAC ?>

<?php get_header(); ?>

<?php
$faqs = [
    [
        'question' => 'Como faço um Pedido?',
        'answer' => 'Para fazer um pedido, você pode clicar no botão Compre Aqui, disponível no menu superior do site. Também é possível entrar em contato diretamente com nossos executivos de vendas na página Entre em Contato ou, se preferir, acessar a página Onde Encontrar no menu superior do site para localizar o revendedor mais próximo.'
    ],
    [
        'question' => 'Quais são os métodos de pagamento?',
        'answer' => 'Aceitamos pagamento via boleto bancário ou Pix.'
    ],
    [
        'question' => 'Qual é o prazo de entrega?',
        'answer' => 'O prazo de entrega pode variar conforme a sua localização. Em caso de dúvidas ou para prazos mais específicos, entre em contato conosco através da página Entre em Contato.'
    ],
    [
        'question' => 'Como devo carregar as telhas?',
        'answer' => 'Carregue as telhas sempre na posição horizontal, uma sobre a outra, em pilhas organizadas. Utilize suportes de madeira ou espuma entre as camadas para evitar atrito e danos.
O manuseio deve ser cuidadoso, especialmente nas bordas.'
    ],
    [
        'question' => 'Qual é a melhor forma de movimentar telhas de fibrocimento?',
        'answer' => 'O ideal é utilizar equipamentos adequados, como empilhadeiras ou carrinhos com superfície lisa. Quando o manuseio for manual, é necessário contar com duas pessoas por telha, segurando sempre pelas extremidades para evitar quebras.',
        'img' => get_stylesheet_directory_uri() . '/img/imbralit-faq-item.webp'
    ],
    [
        'question' => 'Posso arrastar as telhas para movimentá-las?',
        'answer' => 'Não. O ideal é utilizar equipamentos adequados, como empilhadeiras ou carrinhos com superfície lisa. Arrastar as telhas pode causar arranhões, trincas ou quebras.
O transporte deve ser feito com duas pessoas segurando pelas extremidades.',
        'img' => get_stylesheet_directory_uri() . '/img/imbralit-faq-item.webp'
    ],
    [
        'question' => 'Como armazenar as telhas de fibrocimento corretamente?',
        'answer' => 'Armazene as telhas em local seco, coberto e plano. Utilize apoios nivelados e mantenha as telhas elevadas do solo para evitar contato com a umidade. Respeite sempre o limite de empilhamento recomendado conforme o modelo da telha.'
    ],
    [
        'question' => 'Qual o peso máximo recomendado para empilhamento de telhas?',
        'answer' => 'O limite depende do modelo das telhas, consulte as informações da sua telha na página de produtos para evitar deformações nas camadas inferiores.'
    ],
    [
        'question' => 'Como posicionar as telhas para transporte em caminhões?',
        'answer' => 'As telhas devem ser transportadas horizontalmente, amarradas com cintas firmes e protegidas por lonas. Isso evita deslizamentos e danos durante o trajeto.'
    ],
    [
        'question' => 'É necessário usar EPIs para manusear telhas?',
        'answer' => 'Sim. Para garantir sua segurança, utilize luvas de proteção, capacete (em áreas de instalação), botas com solado antiderrapante e, em casos de trabalho em altura, utilize cinturão de segurança com talabarte e ancoragem adequada, conforme estabelece a NR 35'
    ],
    [
        'question' => 'É possível cortar as telhas no local de instalação?',
        'answer' => 'Sim, é possível, desde que sejam utilizadas ferramentas adequadas, como serras manuais ou elétricas com disco diamantado. Sempre que possível, recomenda-se realizar o corte das telhas no chão, em local plano e seguro, para evitar riscos de acidentes e garantir maior precisão. Utilize obrigatoriamente os EPIs adequados, como máscara para poeira, óculos de proteção, luvas e protetor auricular.'
    ],
    [
        'question' => 'O que fazer em caso de trincas ou quebras no manuseio?',
        'answer' => 'Se houver danos no recebimento ou descarregamento, entre em contato com o SAC da Imbralit pelo telefone (48) 3461-9500 e informe o ocorrido.
Também recomendamos consultar o guia de instalação disponível em: https://www.imbralit.com.br/materiais'
    ],
    [
        'question' => 'O que são peças complementares?',
        'answer' => 'São acessórios essenciais para o acabamento e a proteção do telhado, como cumeeiras, espigões, domos e outras peças que fazem a ligação entre as águas do telhado ou contribuem com iluminação e ventilação.'
    ],
    [
        'question' => 'Qual a importância de escolher peças complementares da mesma marca das telhas?',
        'answer' => 'Escolher peças da mesma marca garante encaixe perfeito, padrão de qualidade compatível e vedação adequada. Isso evita folgas, infiltrações e problemas na estrutura do telhado.'
    ],
    [
        'question' => 'As peças complementares ajudam na vedação e proteção? Como?',
        'answer' => 'Sim. Cumeeiras, espigões e similares cobrem as emendas entre as telhas, protegendo contra chuva, poeira e pequenos animais. Também direcionam o escoamento da água corretamente.'
    ],
    [
        'question' => 'Quais problemas podem surgir sem as peças complementares adequadas?',
        'answer' => 'A ausência dessas peças pode deixar o telhado exposto, favorecendo infiltrações, goteiras e entrada de ventos que podem deslocar as telhas. Com o tempo, isso compromete a estrutura e aumenta os custos de manutenção.'
    ],
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

    <section class="section-faq section-aba">
        <div class="content">
            <h3>FAQ</h3>
            <h2>Perguntas frequentes</h2>
            <div class="container-faq">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="faq-item">
                        <button class="faq-question" data-index="<?php echo $index; ?>">
                            <?php echo esc_html($faq['question']); ?>
                            <img class="arrow-icon"
                                src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-up.svg"
                                alt="Seta para expandir">
                        </button>
                        <div class="faq-answer">
                            <p><?php echo nl2br(esc_html($faq['answer'])); ?></p>
                            <?php if (!empty($faq['img'])): ?>
                                <img class="faq-img" src="<?php echo esc_url($faq['img']); ?>" alt="Imagem explicativa"
                                    style="margin-top: 20px;">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section-downloads" id="materiais">
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