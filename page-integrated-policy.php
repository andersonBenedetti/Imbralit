<?php // Template Name: Política Integrada ?>

<?php get_header(); ?>

<?php
$services = [
    [
        'img' => 'inclusao.webp',
        'title' => 'Inclusão Social'
    ],
    [
        'img' => 'cursos-libras.webp',
        'title' => 'Curso de Libras para Funcionários'
    ],
    [
        'img' => 'saude-seguranca.webp',
        'title' => 'Saúde e Segurança'
    ],
    [
        'img' => 'juventude.webp',
        'title' => 'Parceria em Diversas Ações no Bairro da Juventude'
    ],
    [
        'img' => 'doacao.webp',
        'title' => 'Doação de Incentivo Fiscal IRPJ'
    ],
    [
        'img' => 'gincana.webp',
        'title' => 'Gincana em Prol da ADIVISUL'
    ],
    [
        'img' => 'gestao.webp',
        'title' => 'Gestão de Resíduos Sólidos'
    ],
    [
        'img' => 'consumo.webp',
        'title' => 'Consumo de Energia de Fonte Renovável'
    ],
    [
        'img' => 'reaproveitamento.webp',
        'title' => 'Reaproveitamento de Água'
    ],
];
?>

<main id="pg-integrated">

    <section class="intro section-aba">
        <div class="container">
            <h1>Política Integrada</h1>
        </div>
    </section>

    <section class="section-infos section-aba">
        <div class="container">
            <div class="content">
                <div class="top">
                    <div class="texts">
                        <h2>Qualidade, Meio Ambiente, Segurança e Saúde Ocupacional:</h2>
                        <p>A empresa compromete-se a oferecer telhas onduladas e outros produtos de fibrocimento que
                            atendam
                            aos padrões de qualidade do mercado brasileiro.</p>
                        <p>Buscamos a melhoria contínua de processos, produtos e serviços, monitorando indicadores
                            internos
                            para garantir o atendimento aos requisitos do Sistema de Gestão Integrado, incluindo
                            Qualidade,
                            Meio Ambiente, Segurança e Saúde Ocupacional, além de cumprir a legislação e requisitos
                            aplicáveis.</p>
                        <p>Visamos a sustentabilidade econômica da empresa, focando no retorno dos investimentos e na
                            valorização do patrimônio dos acionistas.</p>
                        <p>Priorizamos a segurança e saúde de nossos profissionais, promovendo seu bem-estar e um
                            ambiente
                            de trabalho seguro, enquanto buscamos reduzir impactos ambientais, minimizar resíduos e
                            adotar
                            práticas sustentáveis.</p>
                    </div>
                    <img class="img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/meio-ambiente.webp"
                        alt="Qualidade, Meio Ambiente, Segurança e Saúde Ocupacional">
                </div>

                <div class="bottom">
                    <img class="img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ods.webp"
                        alt="Movimento Nacional">
                    <div class="texts">
                        <h3>Objetivos de Desenvolvimento Sustentável (ODS)</h3>
                        <p>Os Objetivos de Desenvolvimento Sustentável (ODS), estabelecidos pela ONU em 2015, visam
                            promover um desenvolvimento global mais justo e sustentável até 2030. São 17 metas que
                            abordam áreas como erradicação da pobreza, proteção ambiental, igualdade de gênero e ação
                            climática. Empresas, governos e indivíduos são incentivados a adotar práticas que contribuem
                            para esses objetivos, buscando equilibrar o crescimento econômico com o respeito ao meio
                            ambiente e ao bem-estar das pessoas.</p>
                        <p>A Imbralit, empresa comprometida com a sustentabilidade, possui o Selo ODS, um reconhecimento
                            da sua atuação em alinhamento com essas metas globais. Com iniciativas focadas na eficiência
                            energética, redução de impactos ambientais e promoção de um ambiente de trabalho inclusivo,
                            a Imbralit reafirma seu compromisso com um futuro mais sustentável, reforçando sua
                            responsabilidade social e ambiental em suas operações.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-content">
        <div class="container">
            <div class="top">
                <h2>SOMOS SIGNATÁRIOS ODS</h2>
                <h3>Objetivos de Desenvolvimento Sustentável da ONU</h3>
                <p>Reconhecido internacionalmente, o Selo ODS atesta que uma organização está alinhada com a Agenda
                    2030, contribuindo para a construção de um mundo mais sustentável.</p>
            </div>

            <div class="services-container">
                <?php foreach ($services as $service): ?>
                    <div class="service-item">
                        <img class="service-image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo $service['img']; ?>"
                            alt="<?php echo $service['title']; ?>">
                        <p class="service-title"><?php echo $service['title']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>