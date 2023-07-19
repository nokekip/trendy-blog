<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
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

    <title><?php echo $post['title']; ?> | TrendyBlog</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php") ?>

    <!-- Post  wrapper -->
    <div class="post-wrapper">

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main content -->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title']; ?></h1>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']) ?>
                    </div>

                </div>
            </div>
            <!-- //Recent posts Main content -->

            <!-- Side Bar -->

            <div class="sidebar single">

                <!-- Popular posts -->
                <div class="section popular">
                    <h2 class="section-title">Popular Posts</h2>

                    <?php foreach ($posts as $pop) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $pop['image']; ?>" alt="">
                            <a href="article.php?id=<?php echo $pop['id']; ?>" class="title">
                                <h4><?php echo $pop['title']; ?></h4>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- // Popular posts -->

                <!-- Topics section -->
                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $topic) : ?>
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