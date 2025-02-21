<?php // Template Name: Sobre nós ?>

<?php get_header(); ?>

<?php
$itemsStory = [
  [
    'logo' => 'logo-74.webp',
    'title' => 'A fundação',
    'date' => '1974',
    'text' => 'Fruto do espírito visionário do empresário Jorge Zanatta, que enxergou 
na escassez de telhas no mercado nacional a oportunidade de um negócio bem sucedido, nasce a primeira empresa do Grupo dedicada ao mercado de materiais de construção civil.',
    'img' => 'imbralit-74.webp'
  ],
  [
    'logo' => 'logo-82.webp',
    'title' => 'A telhinha',
    'date' => '1982',
    'text' => 'Celebrando o lançamento
da nova linha de telhas de fibrocimento com espessura 
de 4 mm, que logo foi apelidada de "telhinha" pelo mercado, assim como se adequando aos requisitos legais da gestão de marcas na época, a Imbralit adotou um novo logotipo, que permaneceria em uso por mais de uma década.',
    'img' => 'imbralit-82.webp'
  ],
  [
    'logo' => 'logo-95.webp',
    'title' => 'Expansão',
    'date' => '1995',
    'text' => 'Com a retomada do consumo brasileiro de materiais de construção civil, depois de mais de uma década de estagnação, a Imbralit entrou em um período de forte expansão de sua capacidade instalada, marcando o momento com uma versão mais moderna de seu logotipo e adotando a chamada "a marca da construção".',
    'img' => 'imbralit-95.webp'
  ],
  [
    'logo' => 'logo-19.webp',
    'title' => 'consolidação',
    'date' => '2019',
    'text' => 'Celebrando os 45 anos de fundação, o sucesso da nova tecnologia dos produtos de fibrocimento reforçados com fibras sintéticas e vegetais, assim como a consolidação dos resultados alcançados a partir da reestruturação iniciada em 2016, e empresa vem marcar essa nova etapa com um moderno logotipo e uma identidade visual totalmente renovada.',
    'img' => 'imbralit-19.webp'
  ],
  [
    'logo' => 'logo-21.webp',
    'title' => 'o futuro',
    'date' => '2021',
    'text' => 'Vislumbrando o futuro e estabelecendo um novo marco em sua história, a Imbralit inaugura sua mais nova linha de produção, que consolida sua posição no mercado com o maior e mais moderno parque fabril de fibrocimento das américas.',
    'img' => 'imbralit-21.webp'
  ],
  [
    'logo' => 'logo-23.webp',
    'title' => 'imbrafort',
    'date' => '2023',
    'text' => 'A Imbrafort nasceu da necessidade de diferenciação dos nossos produtos, criando uma nova demanda, atendendo o público que necessita de maior qualidade em projetos diferenciados e trazendo uma nova modalidade de telhas de fibrocimento de alta qualidade.',
    'img' => 'imbralit-23.webp'
  ],
  [
    'logo' => 'logo-24.webp',
    'title' => '50 anos',
    'date' => '2024',
    'text' => 'Ao longo de cinco décadas, a Imbralit se consolidou no ramo da construção civil inovando e sendo pioneira em diversas áreas do setor, resultando em sonhos arquitetados com excelência. Recordamos da nossa história com orgulho, olhamos para o futuro com esperança e, diante de toda essa narrativa, podemos afirmar, somos a telha que ',
    'img' => 'imbralit-24.webp'
  ],
];
?>

<main id="pg-about">

    <section class="intro section-aba">
        <div class="container">
            <div class="content">
                <div>
                    <h2>Sobre nós</h2>
                    <h1>Construindo nosso futuro <span>juntos!</span></h1>
                </div>
                <img class="img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sobre-nos.webp"
                    alt="Foto Sobre nós">
                <a href="#" class="btn-section">
                    <p>Conheça a imbralit</p>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-down.svg" alt="Icon arrow">
                </a>
            </div>
        </div>
    </section>

    <section class="section-infos section-aba">
        <div class="container">
            <div class="texts">
                <h2>A Imbralit ocupa um lugar de destaque entre as empresas líderes do mercado nacional.</h2>
                <p>Fundada em 1974, com sede em Criciúma e única indústria do setor do fibrocimento no Estado de Santa
                    Catarina, a Imbralit faz parte do Grupo Jorge Zanatta, um dos mais importantes grupos empresariais
                    da
                    Região Sul do Estado.</p>
                <p>Fabricando e comercializando telhas onduladas, peças complementares, placas planas de fibrocimento e
                    outros materiais de construção, a empresa atua em todo o Brasil e em diversos mercados no exterior.
                </p>
                <p>Pioneira entre as empresas do setor com capital 100% nacional a fabricar produtos de fibrocimento
                    reforçados exclusivamente com fibras sintéticas e vegetais. Pioneira nacional no setor do
                    fibrocimento a
                    conquistar as certificações ISO 9001 e 14001. Primeira empresa brasileira do setor a assegurar
                    garantia
                    de qualidade de 10 anos para os produtos de fibrocimento, e também a primeira do segmento a oferecer
                    um
                    canal de vendas online. Reconhecida como a marca de fibrocimento com presença no maior número de
                    revendas na Região Sul do Brasil, a Imbralit ocupa um lugar de destaque entre as empresas líderes do
                    mercado nacional.</p>
                <p>Imbralit, a telha que cobre o Brasil.</p>
            </div>
            <a class="video-link fancybox" href="#">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play-video.svg" alt="Play Video">
                <p>Assista ao vídeo do produto</p>
            </a>
        </div>
    </section>

    <section class="our-story">
        <div class="container">
            <div class="top">
                <h2>Nossa História</h2>
                <p>A <span>Imbralit</span> se orgulha das realizações alcançadas e com a convicção de que os próximos
                    capítulos
                    mostrarão feitos ainda maiores.</p>
            </div>
            <div class="carousel-story">
                <?php foreach ($itemsStory as $item): ?>
                <div class="item">
                    <div class="logo">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/img/<?= esc_attr($item['logo']); ?>"
                            alt="Logo Imbralit">
                    </div>
                    <p class="date"><?= esc_html($item['date']); ?></p>
                    <div class="infos">
                        <h3><?= esc_html($item['title']); ?></h3>
                        <p><?= esc_html($item['text']); ?></p>
                    </div>
                    <div class="img">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/img/<?= esc_attr($item['img']); ?>"
                            alt="<?= esc_attr($item['title']); ?>">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>