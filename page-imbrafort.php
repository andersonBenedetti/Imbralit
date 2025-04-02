<?php // Template Name: Imbrafort ?>

<?php get_header(); ?>

<?php $cardsAbout = [
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

$items = [
  [
    'icon' => 'formulacao.svg',
    'alt' => 'Icone - Formulação diferenciada',
    'title' => 'Formulação</br> diferenciada'
  ],
  [
    'icon' => 'nanotecnologia.svg',
    'alt' => 'Icone - Nanotecnologia na composição',
    'title' => 'Nanotecnologia</br> na composição'
  ],
  [
    'icon' => 'impermeabilidade.svg',
    'alt' => 'Icone - Impermeabilidade aprimorada intercamadas',
    'title' => 'Impermeabilidade</br> aprimorada intercamadas'
  ],
  [
    'icon' => 'tempo-cura.svg',
    'alt' => 'Icone - Maior tempo de cura',
    'title' => 'Maior tempo</br> de cura'
  ],
  [
    'icon' => 'patente.svg',
    'alt' => 'Icone - Patente requerida',
    'title' => 'Patente requerida'
  ],
  [
    'icon' => 'requisitos.svg',
    'alt' => 'Icone - Requisitos acima dos exigidos pela NBR 15210',
    'title' => 'Requisitos acima dos</br> exigidos pela NBR 15210'
  ]
];

$services = [
  [
    'img' => 'canal-exclusivo.webp',
    'title' => 'CANAL EXCLUSIVO DO SAC',
    'text' => 'Suporte especializado e dedicado ao revendedor e consumidor final para cálculo de cobertura, treinamento
    técnico, projeto de execução do telhado e procedimento para instalação das telhas.'
  ],
  [
    'img' => 'controle-rastreio.webp',
    'title' => 'CONTROLE E RASTREIO',
    'text' => 'Através de tecnologia <strong>QR Code</strong> o controle de qualidade e rastreio de todos os lotes é
    eficaz e acessível de qualquer dispositivo móvel.'
  ],
  [
    'img' => 'embalagem.webp',
    'title' => 'EMBALAGEM ESPECIAL',
    'text' => 'Para melhor acomodação e maior segurança no transporte, os paletes da linha <strong>Imbrafort</strong>
    contam com 40 telhas, além de cantoneiras e stretch azul.'
  ],
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
        <p>A <strong>Imbrafort</strong> nasceu da necessidade de diferenciação dos nossos produtos, criando
          uma
          nova demanda,
          atendendo o público que necessita de maior qualidade em projetos diferenciados e trazendo uma
          nova
          modalidade de telhas de fibrocimento de alta qualidade.</p>
        <p>A <strong>super telha da Imbralit</strong> se destaca por suas características técnicas
          diferenciadas
          que a tornam
          mais
          resistente, tornando-a assim uma telha com maior durabilidade.</p>
        <p>O destaque está na utilização de nanopartículas pozolânicas e em sua eficaz tecnologia de
          hidrorrepelência que garante total proteção do seu telhado.
          Além disso, a <strong>Imbrafort</strong> conta com um canal exclusivo de atendimento que busca
          oferecer suporte
          diferenciado, desde a concepção do sistema de coberturas, até sua efetiva instalação e é a única
          do
          mercado com 12 anos de garantia.</p>
      </div>

      <div class="cards-about">
        <?php foreach ($cardsAbout as $card): ?>
          <div class="item-about">
            <img class="icon-about" src="<?= get_stylesheet_directory_uri(); ?>/img/<?= esc_attr($card['img']); ?>"
              alt="<?= esc_attr($card['alt']); ?>">
            <h3><?= esc_html($card['title']); ?></h3>
            <p><?= $card['content']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-content section-aba">
    <div class="container">
      <div class="infos-top">
        <h2 class="title-content">
          COM A IMBRAFORT
          <p>tem <span>+</span></p>
        </h2>
        <img class="img-content" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ond-front.webp"
          alt="Imagem Telha">
      </div>

      <div class="items-content">
        <?php foreach ($items as $item): ?>
          <div class="item">
            <img class="img-item"
              src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/<?php echo $item['icon']; ?>"
              alt="<?php echo $item['alt']; ?>">
            <h3><?php echo $item['title']; ?></h3>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-services section-aba">
    <div class="container">
      <div class="services-container">
        <?php foreach ($services as $service): ?>
          <div class="service-item">
            <img class="service-image"
              src="<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo $service['img']; ?>"
              alt="<?php echo $service['title']; ?>">
            <h3 class="service-title"><?php echo $service['title']; ?></h3>
            <p class="service-text"><?php echo $service['text']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section-form">
    <div class="container">
      <div class="content-form">
        <div class="infos-form">
          <h2 class="title-form">Treinamento</br> Imbrafort</h2>
          <p>O Treinamento Imbrafort capacita profissionais para a instalação da super telha da Imbralit,
            garantindo eficiência e qualidade. Com foco na tecnologia avançada, resistência e boas
            práticas,
            o curso aprimora habilidades e oferece suporte especializado. Invista no seu conhecimento e
            destaque-se no mercado!</p>
        </div>

        <form id="form-contact" method="post" action="<?php echo get_template_directory_uri(); ?>/form-handler.php">
          <?php wp_nonce_field('custom_form_nonce', '_wpnonce'); ?>

          <div class="form-row">
            <div class="form-column">
              <h3>Cadastro</h3>
              <p>Após a compra das telhas Imbrafort, preencha os dados e clique no botão abaixo para
                cadastre a sua nota fiscal.</p>

              <div class="column-two divided">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input type="text" id="name" name="name" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="cpf">CPF</label>
                  <input type="text" id="cpf" name="cpf" placeholder="" required>
                </div>
              </div>



              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
              </div>

              <div class="column-two">
                <div class="form-group">
                  <label for="revenda_city">Cidade*</label>
                  <input type="text" id="revenda_city" name="revenda_city" required>
                </div>

                <div class="form-group">
                  <label for="revenda_state">UF*</label>
                  <input type="text" id="revenda_state" name="revenda_state" maxlength="2" required>
                </div>
              </div>

              <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" id="phone" name="phone" placeholder="(00)" required>
              </div>

              <div class="consent">
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">
                  Li e concordo com os <a href="/politica-de-privacidade/">Termos de Uso</a>
                </label>
              </div>

              <div class="form-actions">
                <!-- reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="SUA_SITE_KEY"></div>

                <button class="btn tertiary" type="submit">Enviar nota</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>