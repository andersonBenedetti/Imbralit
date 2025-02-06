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
</footer>

<script>
const app = new Vue({
    el: '#app',
    data() {
        return {
            activeMenu: false,
            activeSubmenus: []
        };
    },
    methods: {
        toggleMenu() {
            this.activeMenu = !this.activeMenu;
        },
        toggleSubmenu(itemId) {
            if (this.activeSubmenus.includes(itemId)) {
                this.activeSubmenus = this.activeSubmenus.filter(id => id !== itemId);
            } else {
                this.activeSubmenus.push(itemId);
            }
        },
        isSubmenuActive(itemId) {
            return this.activeSubmenus.includes(itemId);
        },
        closeSubmenus(event) {
            if (!this.$el.contains(event.target)) {
                this.activeSubmenus = [];
            }
        }
    },
    mounted() {
        document.addEventListener('click', this.closeSubmenus);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.closeSubmenus);
    }
});
</script>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>

<?php wp_footer(); ?>

</body>

</html>