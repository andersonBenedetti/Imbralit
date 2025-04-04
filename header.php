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

        <?php
        $menu_items = [
            ['label' => 'Sobre nós', 'url' => '/sobre-nos'],
            [
                'label' => 'Produtos',
                'url' => '#',
                'submenu' => [
                    ['label' => 'Telhas', 'url' => '/telhas'],
                    ['label' => 'Peças Complementares', 'url' => '/pecas-complementares'],
                    ['label' => 'Chapa Cimentícia', 'url' => '/chapa-cimenticia'],
                    ['label' => 'cessórios de fixação e vedação', 'url' => '/acessorios'],
                ]
            ],
            ['label' => 'Imbrafort', 'url' => '/imbrafort'],
            ['label' => 'Calculadora', 'url' => '/calculadora'],
            ['label' => 'Onde encontrar', 'url' => '/onde-encontrar'],
            ['label' => 'Blog', 'url' => '/blog'],
        ];
        ?>

        <header id="header">
            <div class="container">
                <div class="content">
                    <a href="/" class="logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.svg"
                            alt="Logo Imbralit">
                    </a>
                    <div class="menu-header">
                        <ul class="menu-list">
                            <?php
                            foreach ($menu_items as $item) {
                                echo '<li>';
                                echo '<a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a>';

                                if (!empty($item['submenu'])) {
                                    echo '<ul class="submenu">';
                                    foreach ($item['submenu'] as $submenu_item) {
                                        echo '<li><a href="' . esc_url($submenu_item['url']) . '">' . esc_html($submenu_item['label']) . '</a></li>';
                                    }
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <a href="#" class="btn secondary">Compre aqui</a>
                    <div class="menu-header-m" :class="{ active: activeMenu }">
                        <button class="btn-menu" @click="toggleMenu">
                            <span></span>
                        </button>
                        <ul class="menu-list">
                            <?php
                            foreach ($menu_items as $item) {
                                echo '<li>';
                                echo '<a href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a>';

                                if (!empty($item['submenu'])) {
                                    echo '<ul class="submenu">';

                                    foreach ($item['submenu'] as $submenu_item) {
                                        $submenu_id = isset($submenu_item['id']) ? $submenu_item['id'] : '';

                                        echo '<li><a href="' . esc_url($submenu_item['url']) . '" data-id="' . esc_attr($submenu_id) . '">' . esc_html($submenu_item['label']) . '</a></li>';
                                    }

                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>