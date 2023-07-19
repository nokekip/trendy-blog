<?php include("../../path.php"); ?>
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
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Add Post</title>
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
            <div class="button-group">
                <a href="createPosts.php" class="btn btn-big">Add Post</a>
                <a href="managePosts.php" class="btn btn-big">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Post</h2>

                <?php include(ROOT_PATH . '/app/helpers/formErrors.php') ?>

                <form action="createPosts.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                    </div>
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo htmlspecialchars($body) ?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>
                        <?php foreach ($topics as $key => $topic): ?>

                            <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                                <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <?php if (empty($published)): ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else: ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                    </div>
                </form>

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
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>