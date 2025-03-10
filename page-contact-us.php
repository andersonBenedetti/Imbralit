<?php // Template Name: Fale conosco ?>

<?php get_header(); ?>

<main id="pg-contact">

    <section class="intro section-aba">
        <div class="container">
            <h1>Fale conosco</h1>
            <p>Por gentileza, selecione o departamento e diga-nos como podemos ajudar você:</p>
        </div>
    </section>

    <section class="section-content">
        <div class="container">
            <div class="content">
                <div class="container-form">
                    <form id="form-contact" method="post"
                        action="<?php echo get_template_directory_uri(); ?>/form-handler.php">
                        <?php wp_nonce_field('custom_form_nonce', '_wpnonce'); ?>

                        <div class="form-row">
                            <div class="form-column">
                                <h2>Obrigado por nos escolher!</h2>
                                <p>Por gentileza, selecione o departamento e nos diga como podemos ajudar você:</p>

                                <div class="form-group">
                                    <select id="department" name="department" required>
                                        <option value="" disabled selected>Selecione o Departamento</option>
                                        <option value="financeiro">Financeiro</option>
                                        <option value="comercial">Comercial</option>
                                        <option value="sac">SAC</option>
                                        <option value="rh">RH</option>
                                    </select>
                                </div>

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

                                    <button class="btn tertiary" type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
                <div class="contact-infos">
                    <?php include(TEMPLATEPATH . '/inc/OurContact.php'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.5177160603776!2d-49.3327349!3d-28.674156000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x952178fafeab78cb%3A0x30b723df7baf1a2d!2zUi4gQW50w7RuaW8gRGFyw6kgLSBDcmljacO6bWEsIFNDLCA4ODgxMy02MTA!5e0!3m2!1spt-BR!2sbr!4v1741641817619!5m2!1spt-BR!2sbr&amp;output=embed"
            width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

</main>

<?php get_footer(); ?>