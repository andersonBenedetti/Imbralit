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

function custom_post_type($post_type, $singular_name, $plural_name)
{
	$labels = array(
		'name' => $plural_name,
		'singular_name' => $singular_name,
		'menu_name' => $plural_name,
		'add_new' => 'Adicionar Novo',
		'add_new_item' => 'Adicionar Novo',
		'edit' => 'Editar',
		'edit_item' => 'Editar',
		'new_item' => 'Novo',
		'view' => 'Ver',
		'view_item' => 'Ver',
		'search_items' => 'Procurar',
		'not_found' => 'Nenhum slide encontrado',
		'not_found_in_trash' => 'Nenhum slide encontrado no Lixo',
	);

	$args = array(
		'label' => $plural_name,
		'description' => $plural_name,
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => '', 'with_front' => false),
		'query_var' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'labels' => $labels,
	);

	register_post_type($post_type, $args);
}

add_action('init', function () {
	custom_post_type('carrossel', 'Carrossel', 'Carrossel');
	custom_post_type('produtos', 'Produtos', 'Produtos');
	custom_post_type('downloads', 'Downloads', 'Downloads');
	custom_post_type('compromisso_social', 'Compromisso Social', 'Compromisso Social');
	custom_post_type('termos_garantia', 'Termos de garantia', 'Termos de garantia');
	custom_post_type('guia_instalacao', 'Guia de instalação', 'Guia de instalação');
	custom_post_type('vagas', 'Vagas', 'Vagas');
});

function custom_taxonomy_produto()
{
	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Categorias de Produtos',
			'singular_name' => 'Categoria de Produto',
			'search_items' => 'Procurar Categorias',
			'all_items' => 'Todas as Categorias',
			'parent_item' => 'Categoria Pai',
			'parent_item_colon' => 'Categoria Pai:',
			'edit_item' => 'Editar Categoria',
			'update_item' => 'Atualizar Categoria',
			'add_new_item' => 'Adicionar Nova Categoria',
			'new_item_name' => 'Novo Nome de Categoria',
			'menu_name' => 'Categorias de Produtos',
		),
		'rewrite' => array(
			'slug' => 'produto',
			'with_front' => false,
			'hierarchical' => true,
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'show_in_rest' => true,
	);

	register_taxonomy('produto_categoria', 'produtos', $args);
}

add_action('init', 'custom_taxonomy_produto');

function custom_taxonomy_downloads()
{
	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Categorias de Downloads',
			'singular_name' => 'Categoria de dowloads',
			'search_items' => 'Procurar Categorias',
			'all_items' => 'Todas as Categorias',
			'parent_item' => 'Categoria Pai',
			'parent_item_colon' => 'Categoria Pai:',
			'edit_item' => 'Editar Categoria',
			'update_item' => 'Atualizar Categoria',
			'add_new_item' => 'Adicionar Nova Categoria',
			'new_item_name' => 'Novo Nome de Categoria',
			'menu_name' => 'Categorias de Downloads',
		),
		'rewrite' => array(
			'slug' => 'downloads',
			'with_front' => false,
			'hierarchical' => true,
		),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'show_in_rest' => true,
	);

	register_taxonomy('downloads_categoria', 'downloads', $args);
}

add_action('init', 'custom_taxonomy_downloads');


function enqueue_slick_scripts()
{
	wp_enqueue_style('slick-carousel-css', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick.css', array(), '1.8.1');

	wp_enqueue_script('slick-carousel-js', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
}

add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');

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
	// Verifica se é uma requisição AJAX
	$is_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

	// Recupere o nome do formulário
	$formulario = isset($_POST['formulario']) ? sanitize_text_field($_POST['formulario']) : 'Formulário Desconhecido';

	// Monte o título do e-mail
	$titulo_email = "Novo envio: $formulario";

	// Corpo do e-mail
	$corpo_email = "Formulário: $formulario\n";

	// Processar os dados do formulário
	foreach ($_POST as $key => $value) {
		if (!in_array($key, ['formulario', 'action', '_wpnonce'])) {
			$key_formatado = ucfirst(str_replace('_', ' ', $key));
			$corpo_email .= "$key_formatado: " . sanitize_text_field($value) . "\n";
		}
	}

	// Processar arquivo anexado
	$anexo_path = '';
	if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] === UPLOAD_ERR_OK) {
		$upload_dir = wp_upload_dir();
		$uploaded_file = $_FILES['anexo'];

		$target_path = $upload_dir['path'] . '/' . basename($uploaded_file['name']);
		if (move_uploaded_file($uploaded_file['tmp_name'], $target_path)) {
			$corpo_email .= "Arquivo anexado: " . $upload_dir['url'] . '/' . basename($uploaded_file['name']) . "\n";
			$anexo_path = $target_path;
		} else {
			$response = [
				'success' => false,
				'message' => 'Erro ao salvar o arquivo anexado.'
			];
			wp_send_json($response);
		}
	}

	// Enviar o e-mail
	$email_destino = 'andersonjcbenedetti@gmail.com';
	if (!is_email($email_destino)) {
		$response = [
			'success' => false,
			'message' => 'E-mail de destino inválido.'
		];
		wp_send_json($response);
	}

	$headers = ['Content-Type: text/plain; charset=UTF-8'];
	$email_enviado = wp_mail($email_destino, $titulo_email, $corpo_email, $headers);

	// Limpar arquivo temporário se existir
	if ($anexo_path && file_exists($anexo_path)) {
		unlink($anexo_path);
	}

	if ($is_ajax) {
		// Resposta para requisição AJAX
		$response = [
			'success' => $email_enviado,
			'message' => $email_enviado
				? 'Formulário enviado com sucesso!'
				: 'Erro ao enviar o formulário.'
		];
		wp_send_json($response);
	} else {
		// Resposta para envio tradicional (sem JavaScript)
		if ($email_enviado) {
			echo '<script>alert("Formulário enviado com sucesso!");</script>';
			// Você pode adicionar um redirecionamento opcional aqui se quiser
			// echo '<script>window.location.href = "' . home_url() . '";</script>';
		} else {
			echo '<script>alert("Erro ao enviar o formulário.");</script>';
		}
	}

	exit;
}

add_action('wp_ajax_processar_formulario', 'processar_formulario');
add_action('wp_ajax_nopriv_processar_formulario', 'processar_formulario');

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_action('init', 'custom_rewrite_for_produtos');
function custom_rewrite_for_produtos()
{
	// Regra para single posts sem slug
	add_rewrite_rule(
		'^([^/]+)/?$',                          // Padrão: qualquer slug na raiz (ex: "nome-do-produto")
		'index.php?post_type=produtos&name=$matches[1]',
		'top'                                   // Prioridade máxima
	);
}

add_filter('request', 'prioritize_produtos_in_query');
function prioritize_produtos_in_query($query_vars)
{
	if (isset($query_vars['name']) && !isset($query_vars['post_type'])) {
		// Verifica se o slug corresponde a um produto
		$produto = get_page_by_path($query_vars['name'], OBJECT, 'produtos');
		if ($produto) {
			$query_vars['post_type'] = 'produtos';
			$query_vars['name'] = $produto->post_name;
		}
	}
	return $query_vars;
}

add_filter('post_type_link', 'custom_produtos_permalink', 10, 2);
function custom_produtos_permalink($permalink, $post)
{
	if ($post->post_type === 'produtos') {
		return home_url('/' . $post->post_name . '/');
	}
	return $permalink;
}