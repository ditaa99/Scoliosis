<?php

if (isset($_POST['signup'])) {
    $signup_validation = [];
    // First name signup_validation
    if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
        $signup_validation['firstname'] = 'First name field is required.';
    } else {
        $firstname = $_POST['firstname'];
    }

    // Last name signup_validation
    if (!isset($_POST['lastname']) || $_POST['lastname'] === '') {
        $signup_validation['lastname'] = 'Last name field is required.';
    } else {
        $lastname = $_POST['lastname'];
    }

    // Password signup_validation
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $signup_validation['password'] = 'Password field is required.';
    } else if (!isset($_POST['password_confirm']) || $_POST['password'] !== $_POST['password_confirm']) {
        $signup_validation['password_confirm'] = 'Password and password confirmation must match.';
        $signup_validation['password'] = 'Password and password confirmation must match.';
    } else if (strlen($_POST['password']) < 10) {
        $signup_validation['password'] = 'Password must have a length of 10 at least.';
    } else {
        $password = $_POST['password'];
        $confirm = $_POST['password_confirm'];
    }

    // Validate date of birth
    if (!isset($_POST['birthday']) || $_POST['birthday'] === '') {
        $signup_validation['birthday'] = 'Date of birth field is required.';
    } else {
        $epoch = strtotime($_POST['birthday']);
        if (!$epoch) {
            $signup_validation['birthday'] = 'Date of birth must be a valid date.';
        } else if ($epoch > time() || $epoch < strtotime('-150 years', time())) {
            $signup_validation['birthday'] = 'Date of birth must be a valid date.';
        } else {
            $birthday = $_POST['birthday'];
        }
    }


    // Email signup_validation
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $signup_validation['email'] = 'Email address field is required.';
    } else {
        $valid = preg_match('/[0-z]+[@][0-z]+[.][A-z]+/', $_POST['email']) === 1;
        if (!$valid) {
            $signup_validation['email'] = 'Email address must have a valid email format.';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $query->execute([$_POST['email']]);
            $emails = $query->fetchAll();

            if (is_array($emails) && count($emails) > 0) {
                $signup_validation['email'] = 'This email is already registered.';
            } else {
                $email = $_POST['email'];
            }
        }
    }

    // Sex signup_validation
    if (!isset($_POST['sex']) || $_POST['sex'] === '') {
        $signup_validation['sex'] = 'Sex field is required.';
    } else {
        switch ($_POST['sex']) {
            case 'Female':
                $sexDbval = 'Female';
                break;
            case 'Male':
                $sexDbval = 'Male';
                break;
            default:
                $signup_validation['sex'] = 'Sex field must contain one of the options.';
                break;
        }
        if (isset($sexDbval)) {
            $sex = $_POST['sex'];
        }
    }

    // License signup_validation
    if (!isset($_POST['license']) || $_POST['license'] !== '1') {
        $signup_validation['license'] = 'License agreement must be accepted.';
    } else {
        $license = $_POST['license'];
    }

    // Phone number signup_validation
    if (!isset($_POST['phonenumber']) || $_POST['phonenumber'] == '') {
        $signup_validation['phonenumber'] = 'Phone number must be filled in';
    } else {
        $phonenumber = $_POST['phonenumber'];
    }


    if (count($signup_validation) === 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $pdo->prepare('INSERT INTO users(email, password_hash, firstname, lastname, birthday, sex, phonenumber, license_accepted, verified) VALUES(?, ?, ?, ?, ?, ?, ?, 1, 1)');
        $query->execute([$email, $hash, $firstname, $lastname, $birthday, $sex, $phonenumber]);

        //Pull out the last inserted ID THEN set sessions for it
        $user_id = $pdo->lastInsertId();
        $query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$user_id]);
        $user = $query->fetch();


        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['sex'] = $user['sex'];
        $_SESSION['phonenumber'] = $user['phonenumber'];
        $_SESSION['birthday'] = $user['birthday'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
    }
}



?>


<?php
if (!isset($_SESSION['user_id'])) {
?>

<aside class="border border-secondary rounded" style="background-color: #f5f5f5;">
    <h5 class="h5 mt-3 fw-normal text-center">Please sign Up</h5>
    <form action="" method="POST" class="form-group p-3">

        <div class="form-outline">
            <input name="firstname" type="text" id="firstName" placeholder="First Name"
                class="form-control form-control-lg" value="<?= isset($firstname) ? $firstname : '' ?>" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['firstname'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['firstname'] ?></span>
            <?php
                }
                ?>

        </div>
        <br>
        <div class="form-outline">

            <input name="lastname" type="text" id="lastName" placeholder="Last Name"
                class="form-control form-control-lg" value="<?= isset($lastname) ? $lastname : '' ?>" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['lastname'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['lastname'] ?></span>
            <?php
                }
                ?>

        </div>

        <br>
        <div class="form-outline">
            <input name="email" type="email" id="emailaddress" placeholder="Email" class="form-control form-control-lg"
                value="<?= isset($email) ? $email : '' ?>" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['email'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['email'] ?></span>
            <?php
                }
                ?>

        </div>
        <div class="form-outline">
            <label class="form-label" for="phonenumber"></label>
            <input name="phonenumber" type="text" id="phonenumber" placeholder="Phone Number"
                class="form-control form-control-lg" value="<?= isset($phonenumber) ? $phonenumber : '' ?>" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['phonenumber'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['phonenumber'] ?></span>
            <?php
                }
                ?>

        </div>
        <br>
        <div class="form-outline datepicker w-100">
            <label for="birthday" class="form-label">Birthday</label>
            <input name="birthday" type="date" class="form-control form-control-lg" id="birthday"
                value="<?= isset($birthday) ? $birthday : '' ?>" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['birthday'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['birthday'] ?></span>
            <?php
                }
                ?>
        </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="sex">Gender: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="femaleGender" value="Female" />
                <label class="form-check-label" for="femaleGender">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="maleGender" value="Male" />
                <label class="form-check-label" for="maleGender">Male</label>
            </div>
            <?php
                if (isset($signup_validation) && isset($signup_validation['sex'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['sex'] ?></span>
            <?php
                }
                ?>
        </div>

        <div class="form-outline">
            <label class="form-label">I Accept The Agreement </label>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="license" value="1" />
                <!-- <span class="checkmark"></span> -->
            </div>

            <?php
                if (isset($signup_validation) && isset($signup_validation['license'])) {
                ?>
            <span class="text-danger"><?= $signup_validation['license'] ?></span>
            <?php
                }
                ?>
        </div>

        <div class="form-outline">
            <label class="form-label" for="password">Password</label>
            <input name="password" type="password" id="password" class="form-control form-control-lg"
                placeholder="Atleast 10 characters" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['password'])) { ?>
            <span class="text-danger"><?= $signup_validation['password'] ?></span>
            <?php } ?>
        </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="password_confirm">Confirm
                password</label>
            <input name="password_confirm" type="password" id="password_confirm" class="form-control form-control-lg" />
            <?php
                if (isset($signup_validation) && isset($signup_validation['password_confirm'])) { ?>
            <span class="text-danger"><?= $signup_validation['password_confirm'] ?></span>
            <?php } ?>

        </div>

        <br>
        <div class="form-outline text-center">
            <input name="signup" type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</aside>

<?php } ?>