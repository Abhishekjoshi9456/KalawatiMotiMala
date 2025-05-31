
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

    <script>
        // Add active class to current navigation item
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));

                    // Add active class to clicked link
                    this.classList.add('active');
                });
            });

            // Close mobile menu when clicking on a link
            const navbarCollapse = document.getElementById('navbarNav');
            const navbarToggler = document.querySelector('.navbar-toggler');

            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (navbarCollapse.classList.contains('show')) {
                        navbarToggler.click();
                    }
                });
            });
        });
    </script>