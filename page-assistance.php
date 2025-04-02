<?php // Template Name: Assistência Técnica ?>

<?php get_header(); ?>

<main id="pg-assistance">

    <section class="intro section-aba">
        <div class="container">
            <h1>ASSISTÊNCIA TÉCNICA</h1>
            <p>Estamos aqui para ajudar, siga as orientações abaixo para solicitar assistência técnica</p>
        </div>
    </section>

    <section class="content-form  section-aba">
        <div>
            <div class="top">
                <h2>Abrir solicitação</h2>
                <p>Para abrir uma solicitação de Assistência Técnica, necessitaremos dos seguintes dados:</p>
            </div>

            <form id="form-contact" method="post" action="<?php echo get_template_directory_uri(); ?>/form-handler.php">
                <?php wp_nonce_field('custom_form_nonce', '_wpnonce'); ?>

                <div class="form-row">
                    <!-- Dados do Consumidor Final -->
                    <div class="form-column">
                        <h3>Dados do Consumidor Final</h3>

                        <div class="form-group">
                            <label for="name">Nome completo*</label>
                            <input type="text" id="name" name="name" placeholder="Seu nome" required>
                        </div>

                        <div class="form-group">
                            <label for="cep">CEP*</label>
                            <input type="text" id="cep" name="cep" placeholder="" required>
                        </div>

                        <div class="column-two">
                            <div class="form-group">
                                <label for="address">Endereço*</label>
                                <input type="text" id="address" name="address" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Número*</label>
                                <input type="text" id="number" name="number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input type="text" id="complement" name="complement">
                        </div>

                        <div class="column-two">
                            <div class="form-group">
                                <label for="city">Cidade*</label>
                                <input type="text" id="city" name="city" required>
                            </div>

                            <div class="form-group">
                                <label for="state">UF*</label>
                                <input type="text" id="state" name="state" maxlength="2" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefone*</label>
                            <input type="text" id="phone" name="phone" placeholder="(00)" required>
                        </div>

                        <!-- Campo de upload para Nota Fiscal -->
                        <div class="upload-field">
                            <label for="nota_fiscal">
                                Nota fiscal
                                <img class="info-icon"
                                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/info-label.svg"
                                    alt="Info">
                                <span class="tooltip-text">Informações sobre o campo Nota Fiscal.</span>
                            </label>
                            <input type="file" id="nota_fiscal" name="nota_fiscal" accept="image/*,application/pdf"
                                style="display: none;">
                            <button class="btn tertiary" type="button"
                                onclick="document.getElementById('nota_fiscal').click();">Enviar
                                foto</button>
                        </div>

                        <!-- Campo de upload para Outros Anexos -->
                        <div class="upload-field">
                            <label for="outros_anexos">Outros anexos (opcional)</label>
                            <input type="file" id="outros_anexos" name="outros_anexos" accept="image/*,application/pdf"
                                style="display: none;">
                            <button class="btn tertiary" type="button"
                                onclick="document.getElementById('outros_anexos').click();">Anexar arquivos</button>
                        </div>

                    </div>

                    <!-- Dados da Revenda -->
                    <div class="form-column">
                        <h3>Dados da Revenda</h3>

                        <div class="form-group">
                            <label for="revenda_name">Nome*</label>
                            <input type="text" id="revenda_name" name="revenda_name" required>
                        </div>

                        <div class="form-group">
                            <label for="cnpj">CNPJ*</label>
                            <input type="text" id="cnpj" name="cnpj" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="revenda_cep">CEP*</label>
                            <input type="text" id="revenda_cep" name="revenda_cep" placeholder="" required>
                        </div>

                        <div class="column-two">
                            <div class="form-group">
                                <label for="revenda_address">Endereço*</label>
                                <input type="text" id="revenda_address" name="revenda_address" required>
                            </div>

                            <div class="form-group">
                                <label for="revenda_number">Número*</label>
                                <input type="text" id="revenda_number" name="revenda_number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="revenda_complement">Complemento</label>
                            <input type="text" id="revenda_complement" name="revenda_complement">
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
                            <label for="revenda_phone">Telefone*</label>
                            <input type="text" id="revenda_phone" name="revenda_phone" placeholder="(00)" required>
                        </div>
                    </div>
                </div>

                <!-- Defeito Relatado -->
                <div class="form-column">
                    <div class="form-row">
                        <div>
                            <h3>Defeito relatado</h3>

                            <div class="upload-field">
                                <label for="product_image">
                                    Foto do produto defeituoso e data de fabricação
                                    <img class="info-icon"
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/info-label.svg"
                                        alt="Info">
                                    <span class="tooltip-text">Informações sobre a foto do produto defeituoso e data de
                                        fabricação.</span>
                                </label>
                                <input type="file" id="product_image" name="product_image"
                                    accept="image/*,application/pdf" style="display: none;">
                                <button class="btn tertiary" type="button"
                                    onclick="document.getElementById('product_image').click();">Enviar
                                    foto</button>
                            </div>

                            <div class="form-group" style="margin: 10px 0;">
                                <label for="defect_description">Descreva o defeito*</label>
                                <textarea id="defect_description" name="defect_description" required></textarea>
                            </div>

                            <div class="radio-options">
                                <div class="form-group">
                                    <input type="radio" id="telha" name="produto" value="Telha Ondulada" required>
                                    <label for="telha">Telha Ondulada</label>
                                </div>

                                <div class="form-group">
                                    <input type="radio" id="outros" name="produto" value="Outros">
                                    <label for="outros">Outros</label>
                                </div>

                                <div class="form-group">
                                    <input type="radio" id="pecas" name="produto" value="Peças Complementares">
                                    <label for="pecas">Peças Complementares</label>
                                </div>
                            </div>
                        </div>

                        <!-- Campos Quantidade, Comprimento/Graus/Litros e Espessura -->
                        <div>
                            <div class="fields-row">
                                <div class="field-column">
                                    <label for="quantidade">Quantidade*</label>
                                    <input type="text" id="quantidade1" name="quantidade1" required>
                                    <input type="text" id="quantidade2" name="quantidade2" required>
                                    <input type="text" id="quantidade3" name="quantidade3" required>
                                </div>

                                <div class="field-column">
                                    <label for="comprimento">Comprimento/ Graus/ Litros*</label>
                                    <input type="text" id="comprimento1" name="comprimento1" required>
                                    <input type="text" id="comprimento2" name="comprimento2" required>
                                    <input type="text" id="comprimento3" name="comprimento3" required>
                                </div>

                                <div class="field-column">
                                    <label for="espessura">Espessura*</label>
                                    <input type="text" id="espessura1" name="espessura1" required>
                                    <input type="text" id="espessura2" name="espessura2" required>
                                    <input type="text" id="espessura3" name="espessura3" required>
                                </div>
                            </div>
                            <div class="form-actions">
                                <!-- reCAPTCHA -->
                                <div class="g-recaptcha" data-sitekey="SUA_SITE_KEY"></div>

                                <button class="btn tertiary" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

            <div class="content-infos">
                <div>
                    <h2>Fale conosco</h2>
                    <p>Nos dedicaremos a atender sua demanda com a maior agilidade e comprometimento possível, mas
                        atente-se aos dados solicitados, pois são obrigatórios e sem eles não conseguiremos prosseguir
                        com sua solicitação.</p>
                </div>

                <?php include(TEMPLATEPATH . '/inc/OurContact.php'); ?>
            </div>

        </div>
    </section>

    <section class="archives">
        <div>
            <div class="content">
                <h3>TERMOS DE GARANTIA</h3>
                <div class="items">
                    <?php
                    $args = array(
                        'post_type' => 'termos_garantia',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post();
                            $arquivo_download = get_field('arquivo_para_download');
                            ?>

                            <?php if ($arquivo_download): ?>
                                <a class="item" href="<?php echo esc_url($arquivo_download); ?>" download
                                    aria-label="Baixar <?php the_title_attribute(); ?>">
                                    <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/baixar.svg"
                                        alt="Ícone de download">
                                    <p><?php the_title(); ?></p>
                                </a>
                            <?php endif; ?>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p class="no-items"><?php _e('Desculpe, nenhum certificado encontrado.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="content">
                <h3>GUIA DE INSTALAÇÃO</h3>
                <div class="items">
                    <?php
                    $args = array(
                        'post_type' => 'guia_instalacao',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()): ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post();
                            $arquivo_download = get_field('arquivo_para_download');
                            ?>

                            <?php if ($arquivo_download): ?>
                                <a class="item" class="item" href="<?php echo esc_url($arquivo_download); ?>" download
                                    aria-label="Baixar <?php the_title_attribute(); ?>">
                                    <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/baixar.svg"
                                        alt="Ícone de download">
                                    <p><?php the_title(); ?></p>
                                </a>
                            <?php endif; ?>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p class="no-items"><?php _e('Desculpe, nenhum certificado encontrado.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>