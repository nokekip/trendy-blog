<header>
    <a href="<?php echo BASE_URL . '/index.php'; ?>" class="logo">
        <h1 class="logo-text"><span>Trendy</span>Blog</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['username'])) : ?>
            <li><a href="#">
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa-solid fa-chevron-down fa-sm"></i>
                </a>
                <ul>
                    <li class="logout"><a href="<?php echo BASE_URL . "/logout.php"; ?>">Sign out</a></li>
                </ul>
        <?php endif; ?>
        </li>
    </ul>
    </div>
</header>