<?php get_header(); ?>

<main id="single-vacancies">

  <section class="intro">
    <div class="container">
      <div class="infos">
        <a href="/">
          Home
          <span>></span>
        </a>
        <a href="/trabalhe-conosco">
          Trabalhe conosco
          <span>></span>
        </a>
      </div>

      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="section-content container">
    <div class="content">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <div class="container-form">
        <form id="form-contact" method="post" action="<?php echo get_template_directory_uri(); ?>/form-handler.php">
          <?php wp_nonce_field('custom_form_nonce', '_wpnonce'); ?>

          <div class="form-row">
            <div class="form-column">
              <h3>Venha fazer parte de nossa história!</h3>
              <p>Candidate-se nas vagas disponíveis que se adequam ao seu currículo e experiência.</p>

              <div class="form-group">
                <label for="name">Nome*</label>
                <input type="text" id="name" name="name" placeholder="Seu nome" required>
              </div>

              <div class="form-group">
                <label for="email">E-mail*</label>
                <input type="email" id="email" name="email" required>
              </div>

              <div class="form-group">
                <label for="phone">Telefone*</label>
                <input type="text" id="phone" name="phone" placeholder="(00)" required>
              </div>

              <div class="form-group">
                <label for="message">Mensagem*</label>
                <textarea id="message" name="message" required></textarea>
              </div>

              <div class="upload-field">
                <label for="nota_fiscal">
                  Anexar currículo
                  <img class="info-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/info-label.svg"
                    alt="Info">
                  <span class="tooltip-text">Informações sobre o campo Anexar currículo.</span>
                </label>
                <input type="file" id="nota_fiscal" name="nota_fiscal" accept="image/*,application/pdf"
                  style="display: none;">
                <button class="btn tertiary" type="button"
                  onclick="document.getElementById('nota_fiscal').click();">Anexar</button>
              </div>

              <div class="consent">
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">
                  Estou ciente que os dados inseridos serão utilizados somente para possibilitar o
                  meu atendimento, bem como tratados conforme disposto no Aviso de Privacidade e
                  Lei Geral de Proteção de Dados.
                </label>
              </div>

              <div class="form-actions">
                <!-- reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="SUA_SITE_KEY"></div>

                <button class="btn tertiary" type="submit">Canditatar-se</button>
              </div>
            </div>
          </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      </div>
    </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>