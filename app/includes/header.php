<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
        <h1 class="logo-text"><span>Trendy</span>Blog</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Services</a></li>

        <?php if (isset($_SESSION['id'])) : ?>
            <li><a href="#">
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa-solid fa-chevron-down fa-sm"></i>
                </a>
                <ul>
                    <?php if($_SESSION['admin']): ?>
                        <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
                    <?php endif; ?>
                    
                    <li class="logout"><a href="<?php echo BASE_URL . '/logout.php' ?>">Sign out</a></li>
                </ul>
            </li>
        <?php else : ?>
            <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
        <?php endif; ?>
    </ul>
</header>