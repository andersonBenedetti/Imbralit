<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  wp_die("Acesso negado");
}

if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'custom_form_nonce')) {
  wp_die("Falha na verificação de segurança");
}

// Validação do reCAPTCHA
$recaptcha_secret = "SUA_SECRET_KEY"; // Substitua pela sua chave secreta reCAPTCHA
$recaptcha_response = $_POST["g-recaptcha-response"];

$response = wp_remote_post("https://www.google.com/recaptcha/api/siteverify", [
  "body" => [
    "secret" => $recaptcha_secret,
    "response" => $recaptcha_response,
    "remoteip" => $_SERVER["REMOTE_ADDR"]
  ]
]);

$response_body = wp_remote_retrieve_body($response);
$result = json_decode($response_body);

if (!$result->success) {
  wp_die("Falha na verificação do reCAPTCHA");
}

// Processa os campos dinamicamente e valida
$data = [];

// Sanitiza os campos recebidos no formulário
foreach ($_POST as $key => $value) {
  // Ignora campos do reCAPTCHA e do nonce
  if ($key !== 'g-recaptcha-response' && $key !== '_wpnonce') {
    $data[$key] = sanitize_text_field($value);
  }
}

// Caso haja upload de arquivos, trate-os separadamente
if (isset($_FILES['nota_fiscal'])) {
  $nota_fiscal = $_FILES['nota_fiscal'];
  $upload_dir = wp_upload_dir();
  $upload_path = $upload_dir['path'] . '/' . basename($nota_fiscal['name']);

  if (move_uploaded_file($nota_fiscal['tmp_name'], $upload_path)) {
    $data['nota_fiscal'] = $upload_path;
  }
}

// Monta o e-mail
$to = get_option('admin_email');
$subject = "Novo contato recebido";
$message = "Novos dados do formulário:\n\n";

foreach ($data as $key => $value) {
  $message .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
}

$headers = ["From: Site <no-reply@seudominio.com>", "Reply-To: " . ($data['email'] ?? '')];

// Envia o e-mail
$email_sent = wp_mail($to, $subject, $message, $headers);

// Retorna uma resposta JSON para ser tratada pelo JavaScript
header('Content-Type: application/json');

if ($email_sent) {
  echo json_encode([
    'success' => true,
    'message' => 'Formulário enviado com sucesso!'
  ]);
} else {
  echo json_encode([
    'success' => false,
    'message' => 'Ocorreu um erro ao enviar o formulário.'
  ]);
}

exit();
?>