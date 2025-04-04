<?php
$footer_items = [
    'logo' => [
        'src' => get_stylesheet_directory_uri() . '/img/logo-footer.webp',
        'alt' => 'Logo Imbralit'
    ],

    'social' => [
        'title' => 'Redes sociais',
        'items' => [
            [
                'icon' => 'hugeicons_instagram.svg',
                'label' => 'Instagram',
                'url' => 'https://www.instagram.com/imbralit/'
            ],
            [
                'icon' => 'iconoir_facebook.svg',
                'label' => 'Facebook',
                'url' => 'https://www.facebook.com/imbralit/?locale=pt_BR'
            ],
            [
                'icon' => 'basil_linkedin-outline.svg',
                'label' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/company/imbralit-ltda/posts/?feedView=all'
            ],
            [
                'icon' => 'proicons_tiktok.svg',
                'label' => 'TikTok',
                'url' => 'https://www.tiktok.com/@imbralit'
            ],
            [
                'icon' => 'hugeicons_youtube.svg',
                'label' => 'YouTube',
                'url' => 'https://www.youtube.com/@imbralit_br'
            ]
        ]
    ],

    'support' => [
        'title' => 'Suporte',
        'items' => [
            [
                'label' => 'Assistência Técnica',
                'url' => home_url('/assistencia-tecnica')
            ],
            [
                'label' => 'Guia de Instalação',
                'url' => home_url('/wp-content/uploads/2025/04/guia-rapido-de-instalacao-doc-4.pdf'),
                'download' => true,
                'type' => 'pdf',
            ],
            [
                'label' => 'SAC',
                'url' => home_url('/sac')
            ]
        ]
    ],

    'policies' => [
        'title' => 'Políticas',
        'items' => [
            [
                'label' => 'Política Integrada',
                'url' => home_url('/politica-integrada')
            ],
            [
                'label' => 'Política de Privacidade',
                'url' => home_url('/politica-de-privacidade')
            ]
        ]
    ],

    'contacts' => [
        'title' => 'Contatos',
        'items' => [
            [
                'label' => 'Entre em contato',
                'url' => home_url('/fale-conosco')
            ],
            [
                'label' => 'Trabalhe conosco',
                'url' => home_url('/trabalhe-conosco')
            ],
            [
                'label' => '(48) 3461-9500',
                'url' => 'tel:+554834619500'
            ],
            [
                'label' => 'Das 7h30 às 12h e das 13h15 às 17h30'
            ]
        ]
    ],

    'credits' => [
        'text' => 'Imbralit. Todos os direitos reservados | Desenvolvido por',
        'link' => [
            'text' => 'Blume Web Studio',
            'url' => 'https://blumewebstudio.com.br'
        ]
    ],
];
?>

<footer id="footer">
    <div class="container">
        <div class="content">
            <div class="infos">
                <a href="<?php echo home_url('/'); ?>" class="logo">
                    <img src="<?php echo esc_url($footer_items['logo']['src']); ?>"
                        alt="<?php echo esc_attr($footer_items['logo']['alt']); ?>">
                </a>
                <nav aria-label="<?php echo esc_attr($footer_items['social']['title']); ?>">
                    <ul>
                        <li>
                            <?php foreach ($footer_items['social']['items'] as $social): ?>
                            <a href="<?php echo esc_url($social['url']); ?>"
                                aria-label="<?php echo esc_attr($social['label']); ?>" target="_blank"
                                rel="noopener noreferrer">
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/icons/' . $social['icon']); ?>"
                                    alt="Logo <?php echo esc_attr($social['label']); ?>">
                            </a>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </nav>
            </div>

            <nav aria-label="<?php echo esc_attr($footer_items['support']['title']); ?>">
                <ul>
                    <li>
                        <h3><?php echo esc_html($footer_items['support']['title']); ?></h3>
                    </li>
                    <?php foreach ($footer_items['support']['items'] as $item): ?>
                    <li>
                        <a href="<?php echo esc_url($item['url']); ?>"
                            <?php if(isset($item['download'])) echo 'download'; ?>
                            <?php if(isset($item['type'])) echo 'type="application/'.esc_attr($item['type']).'"'; ?>
                            <?php if(isset($item['target'])) echo 'target="'.esc_attr($item['target']).'"'; ?>>
                            <?php echo esc_html($item['label']); ?>
                            <?php if(isset($item['size'])): ?>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php echo esc_attr($footer_items['policies']['title']); ?>">
                <ul>
                    <li>
                        <h3><?php echo esc_html($footer_items['policies']['title']); ?></h3>
                    </li>
                    <?php foreach ($footer_items['policies']['items'] as $item): ?>
                    <li><a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['label']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <address>
                <h3><?php echo esc_html($footer_items['contacts']['title']); ?></h3>
                <?php foreach ($footer_items['contacts']['items'] as $item): ?>
                <p>
                    <?php if (isset($item['url'])): ?>
                    <a href="<?php echo esc_url($item['url']); ?>">
                        <?php echo esc_html($item['label']); ?>
                    </a>
                    <?php else: ?>
                    <?php echo esc_html($item['label']); ?>
                    <?php endif; ?>
                </p>
                <?php endforeach; ?>
            </address>
        </div>

        <p class="bottom">
            <?php echo esc_html($footer_items['credits']['text']); ?>
            <a href="<?php echo esc_url($footer_items['credits']['link']['url']); ?>" target="_blank"
                rel="noopener noreferrer">
                <?php echo esc_html($footer_items['credits']['link']['text']); ?>
            </a>
        </p>
    </div>

    <a href="https://wa.me/554834619500" class="whats-float" target="_blank" rel="noopener">
        <img src="<?php echo get_template_directory_uri(); ?>/img/mascote-imbralit.webp" alt="Mascote">
        <div class="whats-balloon"><strong>Olá,</strong> como posso</br> te ajudar?</div>
    </a>
</footer>

<script>
const app = new Vue({
    el: '#app',
    data() {
        return {
            activeMenu: false,
            activeSubmenus: [],
            activeTab: 'descricao',
            tabs: [{
                    id: 'descricao',
                    label: 'Descrição'
                },
                {
                    id: 'especificacoes',
                    label: 'Especificações Técnicas'
                },
                {
                    id: 'downloads',
                    label: 'Downloads'
                }
            ]
        };
    },
    methods: {
        toggleMenu() {
            this.activeMenu = !this.activeMenu; // Alterna o estado do menu
        },
        toggleSubmenu(itemId) {
            // Verifica se o submenu já está aberto. Se sim, fecha. Se não, abre.
            if (this.activeSubmenus.includes(itemId)) {
                this.activeSubmenus = this.activeSubmenus.filter(id => id !== itemId);
            } else {
                this.activeSubmenus.push(itemId);
            }
        },
        isSubmenuActive(itemId) {
            // Retorna se o submenu está ativo ou não
            return this.activeSubmenus.includes(itemId);
        },
        closeSubmenus(event) {
            // Verifica se o clique foi fora do componente Vue e fecha os submenus
            if (!this.$el.contains(event.target)) {
                this.activeSubmenus = []; // Fecha todos os submenus
            }
        }
    },
    mounted() {
        // Adiciona o ouvinte de evento de clique para fechar os submenus quando clicado fora
        document.addEventListener('click', this.closeSubmenus);
    },
    beforeDestroy() {
        // Remove o ouvinte de evento quando o componente for destruído
        document.removeEventListener('click', this.closeSubmenus);
    }
});

// Lógica de Toggle para as perguntas e respostas do FAQ
document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-question'); // Seleciona os botões de FAQ

    faqButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const faqAnswer = this.nextElementSibling; // Seleciona a resposta correspondente
            const arrowIcon = this.querySelector('.arrow-icon'); // Seleciona o ícone da seta

            // Alterna a exibição da resposta e a rotação da seta
            faqAnswer.classList.toggle('show');
            arrowIcon.style.transform = faqAnswer.classList.contains('show') ?
                'rotate(180deg)' : 'rotate(0deg)';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-question');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const index = this.getAttribute('data-index');
            const answer = document.querySelectorAll('.faq-answer')[index];
            const arrow = this.querySelector('.arrow-icon');

            // Alterna a visibilidade da resposta
            answer.classList.toggle('active');

            // Alterna a direção da seta
            if (answer.classList.contains('active')) {
                arrow.src =
                    "<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-down.svg";
            } else {
                arrow.src =
                    "<?php echo get_stylesheet_directory_uri(); ?>/img/icons/arrow-up.svg";
            }
        });
    });
});
</script>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>

<?php wp_footer(); ?>

</body>

</html>