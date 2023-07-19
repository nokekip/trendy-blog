<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4b023a96fb.js" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

    <!-- custom styling -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Admin styling -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>Dashboard</title>
</head>
<body>
    <!-- Header -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Admin  wrapper -->
    <div class="admin-wrapper">

        <!-- menu -->
        <?php include(ROOT_PATH . "/app/includes/adminMenu.php"); ?>
        <!-- // menu -->

        <!-- admin content -->
        <div class="admin-content">

            <div class="content">
                <h2 class="page-title">Dashboad</h2>

                <?php include(ROOT_PATH . '/app/includes/messages.php') ?>
                
                <!-- content -->
                <a href="<?php echo BASE_URL . '/admin/users/manageUsers.php'; ?>" class="dashboard-data users">
                    <h3><i class="fa-solid fa-users"></i> Users</h3>
                    <h2>5</h2>
                </a>
                <a href="<?php echo BASE_URL . '/admin/posts/managePosts.php'; ?>" class="dashboard-data posts">
                    <h3><i class="fa-solid fa-newspaper"></i> Posts</h3>
                    <h2>20</h2>
                </a>
                <a href="<?php echo BASE_URL . '/admin/topics/manageTopics.php'; ?>" class="dashboard-data topics">
                    <h3><i class="fa-solid fa-tag"></i> Topics</h3>
                    <h2>7</h2>
                </a>
                <!-- // content -->
                
            </div>
        </div>
        <!-- // admin content -->
    </div>
    <!-- // Admin wrapper -->
    
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <!-- Custom scripts -->
    <script src="../assets/js/scripts.js"></script>
</body>
</html>