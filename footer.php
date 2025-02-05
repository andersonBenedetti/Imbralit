<footer id="footer">

</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-list > li');

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.classList.toggle(
                    'active');
                event.stopPropagation();
            }
        });
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.menu-header-m')) {
            menuItems.forEach(item => {
                const submenu = item.querySelector('.submenu');
                if (submenu) {
                    submenu.classList.remove('active');
                }
            });
        }
    });
});

const app = new Vue({
    el: '#app',
    data() {
        return {
            activeMenu: false,
            activeSubmenus: [] // Array to keep track of active submenus
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
        // Close submenus when clicking outside the menu
        document.addEventListener('click', this.closeSubmenus);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.closeSubmenus);
    }
});
</script>

</div>

<?php wp_footer(); ?>
</body>

</html>