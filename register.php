<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
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

    <title>Register</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/header.php") ?>

    <!-- Register form -->
    <div class="auth-content">
        <form action="register.php" method="post">
            <h2 class="form-title">Register</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <div>
                <label>Username</label>
                <input type="text" class="text-input" name="username" value="<?php echo $username; ?>">
            </div>
            <div>
                <label>Email</label>
                <input type="email" class="text-input" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label>password</label>
                <input type="password" class="text-input" name="password" value="<?php echo $password; ?>">
            </div>
            <div>
                <label>Confirm password</label>
                <input type="password" class="text-input" name="confpassword" value="<?php echo $confpassword; ?>">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big">Register</button>
            </div>
            <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
        </form>
    </div>
    <!-- Register form -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom scripts -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>