<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div id="app">

        <header id="header">
            <div class="container">
                <div class="content">
                    <a href="/" class="logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.webp"
                            alt="Logo Mundial Tratamentos Fitossanitários">
                    </a>
                    <div class="menu-header" :class="{ active: activeMenu }">
                        <button class="btn-menu" @click="activeMenu = !activeMenu">
                            <span></span>
                        </button>
                        <ul class="menu-list">
                            <li><a href="/">Quem somos</a></li>
                            <li><a href="#">Produtos</a></li>
                            <li><a href="#">Contato</a></li>
                            <li><a href="#">Blog</a></li>
                            <li class="item-mobile"><a href="#">Entre em contato</a></li>
                        </ul>
                    </div>
                    <a href="#" class="btn">Entre em contato</a>
                </div>
            </div>
        </header>