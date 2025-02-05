<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_theme_support('post-thumbnails');

register_nav_menus([
	'categorias' => 'Categorias'
]);

function carregar_formulario($formulario)
{
	$caminho_formulario = get_template_directory() . '/forms/' . $formulario . '-form.php';
	if (file_exists($caminho_formulario)) {
		include $caminho_formulario;
	} else {
		echo '<p>Formulário não encontrado.</p>';
	}
}

function processar_formulario()
{
	// Recupere o nome do formulário
	$formulario = isset($_POST['formulario']) ? sanitize_text_field($_POST['formulario']) : 'Formulário Desconhecido';

	// Monte o título do e-mail
	$titulo_email = "Novo envio: $formulario";

	// Corpo do e-mail
	$corpo_email = "Formulário: $formulario\n";

	// Processar os dados do formulário
	foreach ($_POST as $key => $value) {
		if (!in_array($key, ['formulario', 'action'])) {
			$key_formatado = ucfirst(str_replace('_', ' ', $key));
			$corpo_email .= "$key_formatado: " . sanitize_text_field($value) . "\n";
		}
	}

	// Processar arquivo anexado
	if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
		$upload_dir = wp_upload_dir();
		$uploaded_file = $_FILES['anexo'];

		$target_path = $upload_dir['path'] . '/' . basename($uploaded_file['name']);
		if (move_uploaded_file($uploaded_file['tmp_name'], $target_path)) {
			$corpo_email .= "Arquivo anexado: " . $upload_dir['url'] . '/' . basename($uploaded_file['name']) . "\n";
		} else {
			wp_die('Erro ao salvar o arquivo anexado.');
		}
	}

	// Enviar o e-mail
	$email_destino = 'andersonjcbenedetti@gmail.com';
	if (!is_email($email_destino)) {
		wp_die('E-mail de destino inválido.');
	}

	wp_mail($email_destino, $titulo_email, $corpo_email);

	// Redirecione após o envio
	wp_safe_redirect(home_url('/obrigado'));
	exit;
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}