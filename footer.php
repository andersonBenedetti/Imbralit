<footer id="footer">
    <div class="container">
        <div class="content">
            <div class="infos">
                <a href="/" class="logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-footer.webp" alt="Logo Imbralit">
                </a>
                <nav aria-label="Redes sociais">
                    <ul>
                        <li>
                            <a href="#" aria-label="Instagram">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/hugeicons_instagram.svg"
                                    alt="Logo Instagram">
                            </a>
                            <a href="#" aria-label="Facebook">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/iconoir_facebook.svg"
                                    alt="Logo Facebook">
                            </a>
                            <a href="#" aria-label="LinkedIn">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/basil_linkedin-outline.svg"
                                    alt="Logo LinkedIn">
                            </a>
                            <a href="#" aria-label="TikTok">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/proicons_tiktok.svg"
                                    alt="Logo TikTok">
                            </a>
                            <a href="#" aria-label="YouTube">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/hugeicons_youtube.svg"
                                    alt="Logo YouTube">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <nav aria-label="Suporte">
                <ul>
                    <li>
                        <h3>Suporte</h3>
                    </li>
                    <li><a href="#">Assistência Técnica</a></li>
                    <li><a href="#">Guia de Instalação</a></li>
                    <li><a href="#">SAC</a></li>
                </ul>
            </nav>

            <nav aria-label="Políticas">
                <ul>
                    <li>
                        <h3>Políticas</h3>
                    </li>
                    <li><a href="#">Política Integrada</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </nav>

            <address>
                <h3>Contatos</h3>
                <p><a href="#">Entre em contato</a></p>
                <p><a href="#">Trabalhe conosco</a></p>
                <p><a href="tel:+554834619500">(48) 3461-9500</a></p>
                <p>Das 7h30 às 12h e das 13h15 às 17h30</p>
            </address>
        </div>
        <p class="bottom">Imbralit. Todos os direitos reservados | Desenvolvido por
            <a href="https://blumewebstudio.com.br" target="_blank">Blume Web Studio</a>
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
                activeMenu: false, // Controle do menu
                activeSubmenus: [], // Submenus ativos
                activeTab: 'descricao', // Aba ativa
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
    document.addEventListener('DOMContentLoaded', function () {
        const faqButtons = document.querySelectorAll('.faq-question'); // Seleciona os botões de FAQ

        faqButtons.forEach((button, index) => {
            button.addEventListener('click', function () {
                const faqAnswer = this.nextElementSibling; // Seleciona a resposta correspondente
                const arrowIcon = this.querySelector('.arrow-icon'); // Seleciona o ícone da seta

                // Alterna a exibição da resposta e a rotação da seta
                faqAnswer.classList.toggle('show');
                arrowIcon.style.transform = faqAnswer.classList.contains('show') ?
                    'rotate(180deg)' : 'rotate(0deg)';
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const faqButtons = document.querySelectorAll('.faq-question');
        faqButtons.forEach(button => {
            button.addEventListener('click', function () {
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