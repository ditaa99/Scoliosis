<?php
if (isset($_POST['login'])) {
    $login_validation = [];
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    //todo: add email login_validation
    if (empty($password)) {
        $login_validation['password'] = 'Password field is required.';
    } else {
        $password = $_POST['password'];
    }

    if (empty($email)) {
        $login_validation['email'] = 'Email field is required.';
    } else {
        $email = $_POST['email'];
    }

    if (empty($login_validation)) {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $query->execute([$email]);
        $user = $query->fetchAll();
        if (!is_array(($user)) || count($user) === 0) {
            $login_validation['email'] = 'Email or password is incorrect.';
            $login_validation['password'] = 'Email or password is incorrect.';
        } else {
            foreach ($user as $row) {
                $db_user_id = $row['id'];
                $db_user_email = $row['email'];
                $db_user_firstname = $row['firstname'];
                $db_user_lastname  = $row['lastname'];
                $db_user_password = $row['password_hash'];
                $db_user_sex = $row['sex'];
                $db_user_phonenumber = $row['phonenumber'];
                $db_user_birthday = $row['birthday'];
            }
            if (($email === $db_user_email) && password_verify($password, $db_user_password)) {
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['sex'] = $db_user_sex;
                $_SESSION['email'] = $db_user_email;
                $_SESSION['phonenumber'] = $db_user_phonenumber;
                $_SESSION['birthday'] = $db_user_birthday;
                header("Location: index.php");
            } else {
                // Login failed, bad password
                $login_validation['email'] = 'Email or password is incorrect.';
                $login_validation['password'] = 'Email or password is incorrect.';
            }
        }
    }
}

?>
<?php
if (!isset($_SESSION['user_id'])) {
?>

<aside class="border border-secondary rounded" style="background-color: #f5f5f5;">
    <h5 class="h5 mt-3 fw-normal text-center">Please sign in</h5>

    <form action="" method="POST" class="form-group p-3">
        <div class="form-outline">
            <input name="email" type="email" id="emailaddress" placeholder="Email" class="form-control form-control-lg"
                value="<?= isset($email) ? $email : '' ?>" />
            <?php
                if (isset($login_validation) && isset($login_validation['email'])) {
                ?>
            <span class="text-danger"><?= $login_validation['email'] ?></span>
            <?php
                }
                ?>

        </div>
        <br>
        <div class="form-outline">
            <input name="password" type="password" class="form-control  form-control-lg" placeholder="Password"
                value="<?= isset($password) ? $password : '' ?>" id="floatingPassword">
            <?php
                if (isset($login_validation) && isset($login_validation['password'])) {
                ?>
            <span class="text-danger"><?= $login_validation['password'] ?></span>
            <?php
                }
                ?>
        </div>
        <br>
        <div class="form-outline text-center">
            <input name="login" type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</aside>
<?php } ?>