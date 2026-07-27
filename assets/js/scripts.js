(function () {
    function getElements() {
        return {
            nav: document.getElementById('universalInlineNav'),
            toggleButtons: Array.from(document.querySelectorAll('.universal-hamburger')),
        };
    }

    function setExpanded(isExpanded) {
        const { toggleButtons } = getElements();
        toggleButtons.forEach((button) => {
            button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
            button.setAttribute('aria-controls', 'universalInlineNav');
            button.setAttribute('aria-haspopup', 'true');
        });
    }

    function closeMenu() {
        const { nav } = getElements();
        if (!nav) {
            return;
        }
        nav.classList.remove('is-open');
        setExpanded(false);
    }

    function toggleMenu() {
        const { nav } = getElements();
        if (!nav) {
            return;
        }
        const willOpen = !nav.classList.contains('is-open');
        nav.classList.toggle('is-open', willOpen);
        setExpanded(willOpen);
    }

    function wireNav() {
        const { nav, toggleButtons } = getElements();
        if (!nav || !toggleButtons.length) {
            return;
        }

        setExpanded(false);

        toggleButtons.forEach((button) => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                toggleMenu();
            });
        });

        document.addEventListener('click', function (event) {
            if (!nav.classList.contains('is-open')) {
                return;
            }

            const clickedInsideNav = nav.contains(event.target);
            const clickedToggle = toggleButtons.some((button) => button.contains(event.target));

            if (!clickedInsideNav && !clickedToggle) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', wireNav);
})();
