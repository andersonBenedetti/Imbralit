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
?>

<main id="pg-contact">

    <section class="intro section-aba">
        <div class="container">
            <h1>Trabalhe conosco</h1>
            <p>Por gentileza, selecione o departamento e diga-nos como podemos ajudar você:</p>
        </div>
    </section>

    <section class="section-content">
        <img class="img-content" src="<?php echo get_stylesheet_directory_uri(); ?>/img/trabalhe-conosco.webp"
            alt="Trabalhe conosco">

        <div class="content">
            <h2>Venha ser Imbralit</h2>
            <p>Confira os principais benefícios que oferecemos para nossos colaboradores:</p>

            <ul class="list-content">
                <?php foreach ($beneficios as $beneficio): ?>
                    <li>
                        <img class="img-content"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/<?php echo $beneficio['icone']; ?>"
                            alt="Icon">
                        <p><?php echo $beneficio['texto']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

</main>

<?php get_footer(); ?>