<footer class="container-fluid">
    <div class="footer-text">
        Desiged By your name
    </div>
</footer>


<script src=".\js\bootstrap.min.js"></script>

<script>
    const menuToggle = document.querySelector('.menu-toggle');
    const navItems = document.querySelector('.nav-links-mobile');

    menuToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        navItems.classList.toggle('active');

        // Change icon from hamburger to cross and vice versa
        const icon = this.querySelector('i');
        if (icon.classList.contains('fa-bars')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }



    });
</script>
</body>

</html>