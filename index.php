<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
    $posts = getPostsByTopic($_GET['t_id']);
    $postTitle = "These are posts under '" . $_GET['name'] . "'" . " topic";
} elseif (isset($_POST['search-term'])) {
    $postTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
} else {
    $posts = getPublishedPosts('posts', ['published' => 1]);
}

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
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Blog: Homepage</title>
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php") ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php") ?>

    <!-- Post  wrapper -->
    <div class="post-wrapper">

        <!-- Post Slider -->
        <div class="post-slider">
            <h1 class="slider-title">Tending Post</h1>
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next"></i>

            <div class="post-wrapper slick-slider">

                <?php foreach($posts as $post): ?>
                    <div class="post">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                        <div class="post-info">
                            <h4><a href="article.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="fa-regular fa-user"><?php echo $post['username']; ?></i>
                            &nbsp;&nbsp;
                            <i class="fa-regular fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                        </div>
                    </div>
                <?php endforeach ; ?>
            </div>

        </div>
        <!-- //Post slider -->

        <!-- Content -->
        <div class="content clearfix">

            <!-- Recent Posts -->
            <div class="main-content">
                <h1><?php echo $postTitle; ?></h1>

                <?php foreach($posts as $post): ?>
                    <div class="recent-post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="article.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                            <i class="fa-regular fa-user"> <?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="fa-regular fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                            <p class="preview-text"><?php echo html_entity_decode(substr($post['body'], 0, 150) . '...') ?></p>
                            <a href="article.php?id=<?php echo $post['id']; ?>" class="btn readmore">Read more</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- //Recent posts -->

            <!-- Side Bar -->

            <div class="sidebar">

                <!-- search section -->
                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" method="post">
                        <input type="search" name="search-term" class="text-input" placeholder="Search...">
                    </form>
                </div>
                <!-- //search section -->

                <!-- Topics section -->
                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name'] ?></a></li>
                    <?php endforeach; ?>
                        
                    </ul>
                </div>
                <!-- Topics section -->

            </div>

            <!-- //Side Bar -->
        </div>
        <!-- //Content -->

    </div>
    <!-- //Post wrapper -->

    <!-- Footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php") ?>
    <!-- //Footer -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick Courosel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>