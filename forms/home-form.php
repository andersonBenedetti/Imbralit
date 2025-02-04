<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="form-contact">
    <input type="hidden" name="formulario" value="Entre em contato">
    <input type="hidden" name="action" value="processar_contato">

    <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>

    <input type="tel" name="telefone" id="telefone" pattern="\(\d{2}\)\s?\d{4,5}-?\d{4}"
        placeholder="Digite seu telefone com DDD" required>

    <button type="submit" class="btn">Enviar dados</button>

    <span class="info">*Ao enviar os dados você aceita nossa política de privacidade.</span>
</form>