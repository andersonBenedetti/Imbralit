<?php // Template Name: Imbrafort ?>

<?php get_header(); ?>

<?php
$cardsAbout = [
  [
    'img' => 'garantia.webp',
    'alt' => 'Ícone - 12 anos de garantia',
    'title' => '12 anos de garantia',
    'content' => 'Através de seus <strong>diferenciais técnicos</strong> e baseado no histórico da Assistência
            Técnica, a linha <strong>Imbrafort</strong> oferece ao mercado a <strong>maior garantia</strong> da categoria de
            fibrocimento.'
  ],
  [
    'img' => 'hidrorrepelencia.webp',
    'alt' => 'Ícone - Hidrorrepelência',
    'title' => 'Hidrorrepelência',
    'content' => 'Inovador processo produtivo que concede as telhas o efeito de hidrorrepelência não somente em sua
            superfície como, também, impermeabilização intercamadas.'
  ],
  [
    'img' => 'resistencia.webp',
    'alt' => 'Ícone - Resistência Superior',
    'title' => 'Resistência Superior',
    'content' => 'Através de suas características técnicas elevadas, a <strong>Imbrafort</strong> oferece um ganho
            de resistência de 20%, comparada a linha tradicional.'
  ],
  [
    'img' => 'espessura.webp',
    'alt' => 'Ícone - Maior Espessura',
    'title' => 'Maior Espessura',
    'content' => 'Produtos com o <strong>Selo Imbrafort</strong> contam com espessuras de 6,5 mm, fator que eleva
            os atributos técnicos de toda a linha.'
  ],
  [
    'img' => 'durabilidade.webp',
    'alt' => 'Ícone - Maior Durabilidade',
    'title' => 'Maior Durabilidade',
    'content' => 'A utilização de <strong>nanopartículas pozolânicas</strong> conferem a linha Imbrafort maior
            durabilidade, evidenciada na maior garantia do mercado de fibrocimento.'
  ]
];
?>

<main id="pg-imbra">

  <section class="intro section-aba"></section>

  <section class="section-video section-aba">
    <iframe width="700" height="400" src="https://www.youtube.com/embed/doyOSEyzhTY?si=Lmydbh08tpg75tG9"
      title="YouTube video player" frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </section>

  <section class="section-about section-aba">
    <div class="container">
      <div class="content-about">
        <h2>SOBRE A IMBRAFORT</h2>
        <p>A <strong>Imbrafort</strong> nasceu da necessidade de diferenciação dos nossos produtos, criando uma
          nova demanda,
          atendendo o público que necessita de maior qualidade em projetos diferenciados e trazendo uma nova
          modalidade de telhas de fibrocimento de alta qualidade.</p>
        <p>A <strong>super telha da Imbralit</strong> se destaca por suas características técnicas diferenciadas
          que a tornam
          mais
          resistente, tornando-a assim uma telha com maior durabilidade.</p>
        <p>O destaque está na utilização de nanopartículas pozolânicas e em sua eficaz tecnologia de
          hidrorrepelência que garante total proteção do seu telhado.
          Além disso, a <strong>Imbrafort</strong> conta com um canal exclusivo de atendimento que busca
          oferecer suporte
          diferenciado, desde a concepção do sistema de coberturas, até sua efetiva instalação e é a única do
          mercado com 12 anos de garantia.</p>
      </div>

      <div class="cards-about">
        <?php foreach ($cardsAbout as $card): ?>
          <div class="item-about">
            <img class="img" src="<?= get_stylesheet_directory_uri(); ?>/img/<?= esc_attr($card['img']); ?>"
              alt="<?= esc_attr($card['alt']); ?>">
            <h3><?= esc_html($card['title']); ?></h3>
            <p><?= $card['content']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>