<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = [];
    // First name validation
    if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
        $validation['firstname'] = 'First name field is required.';
    } else {
        $firstname = $_POST['firstname'];
    }

    // Last name validation
    if (!isset($_POST['lastname']) || $_POST['lastname'] === '') {
        $validation['lastname'] = 'Last name field is required.';
    } else {
        $lastname = $_POST['lastname'];
    }
    // Email validation
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $validation['email'] = 'Email address field is required.';
    } else {
        $valid = preg_match('/[0-z]+[@][0-z]+[.][A-z]+/', $_POST['email']) === 1;
        if (!$valid) {
            $validation['email'] = 'Email address must have a valid email format.';
        } else {
            $email = $_POST['email'];
        }
    }


    // Sex validation
    if (!isset($_POST['sex']) || $_POST['sex'] === '') {
        $validation['sex'] = 'Sex field is required.';
    } else {
        switch ($_POST['sex']) {
            case 'Female':
                $sexDbval = 'Female';
                break;
            case 'Male':
                $sexDbval = 'Male';
                break;
            default:
                $validation['sex'] = 'Sex field must contain one of the options.';
                break;
        }
        if (isset($sexDbval)) {
            $sex = $_POST['sex'];
        }
    }


    // Interest validation
    if (!isset($_POST['interest']) || $_POST['interest'] === '') {
        $validation['interest'] = 'Interest field is required.';
    } else {
        switch ($_POST['interest']) {
            case 'cur':
                $interestDbval = 'Curiosity';
                break;
            case 'per':
                $interestDbval = 'A family/personal case';
                break;
            case 'proj':
                $interestDbval = 'School project';
                break;
            case 'other':
                $interestDbval = 'other';
                break;
            default:
                $validation['interest'] = 'Interest field must contain one of the options.';
                break;
        }
        if (isset($interestDbval)) {
            $interest = $_POST['interest'];
        }
    }

    // Other interest validation
    if (isset($interest)) {
        if ($interest === "other" && (!isset($_POST['other_interest']) || $_POST['other_interest'] === '')) {
            $validation['other_interest'] = 'Please specify what your other interest is.';
        } else {
            $other_interest = $_POST['other_interest'];
        }
    }
    if (count($validation) === 0) {
        $query = $pdo->prepare('INSERT INTO statistics(email, firstname, lastname, sex, interest, other_interest, submit_date) VALUES(?, ?, ?, ?, ?, ?, now())');
        $query->execute([$email, $firstname, $lastname, $sex, $interest, $other_interest]);
    }
}
?>

<?php
if (isset($_SESSION['user_id'])) {
?>

<aside class="border border-secondary rounded" style="background-color: #f5f5f5;">
    <?php
        if (isset($validation)) {
            if (empty($validation)) {
                echo "<br>";

                echo " <div class='alert alert-primary' role='alert'>Thank you for helping us</div>";
            }
        }
        ?>

    <h5 class="h5 mt-3 fw-normal text-center">Help us keep our statistics:</h5>
    <form action="" method="POST" class="form-group p-3">

        <div class="form-outline">
            <label class="form-label" for="firstName">First Name</label>
            <input name="firstname" type="text" id="firstName" class="form-control form-control-lg"
                value="<?= isset($firstname) ? $firstname : '' ?>" />
            <?php
                if (isset($validation) && isset($validation['firstname'])) {
                ?>
            <span class="text-danger"><?= $validation['firstname'] ?></span>
            <?php
                }
                ?>

        </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="lastName">Last Name</label>
            <input name="lastname" type="text" id="lastName" class="form-control form-control-lg"
                value="<?= isset($lastname) ? $lastname : '' ?>" />
            <?php
                if (isset($validation) && isset($validation['lastname'])) {
                ?>
            <span class="text-danger"><?= $validation['lastname'] ?></span>
            <?php
                }
                ?>

        </div>

        <br>
        <div class="form-outline">
            <label class="form-label" for="emailaddress">Email</label>
            <input name="email" type="email" id="emailaddress" class="form-control form-control-lg"
                value="<?= isset($email) ? $email : '' ?>" />
            <?php
                if (isset($validation) && isset($validation['email'])) {
                ?>
            <span class="text-danger"><?= $validation['email'] ?></span>
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
                if (isset($validation) && isset($validation['sex'])) {
                ?>
            <span class="text-danger"><?= $validation['sex'] ?></span>
            <?php
                }
                ?>
        </div>
        <br>
        <div class="form-outline">
            <label for="interest">What got you interested into Scoliosis?</label>
            <select class="select form-control" name="interest">
                <option value="1">Please select one of the options</option>
                <option value="cur">Curiosity</option>
                <option value="per">A family/personal case</option>
                <option value="proj">School project</option>
                <option value="other">Other</option>
            </select>
            <?php
                if (isset($validation) && isset($validation['interest'])) { ?>
            <span class="text-danger"><?= $validation['interest'] ?></span>
            <?php } ?>
        </div>
        <br>
        <div class="form-outline">
            <label for="other_interest">If other, please specify what?</label>
            <textarea class="form-control" value="<?= isset($other_interest) ? $other_interest : '' ?>"
                name="other_interest" rows="15"></textarea>
            <?php
                if (isset($validation) && isset($validation['other_interest'])) { ?>
            <span class="text-danger"><?= $validation['other_interest'] ?></span>
            <?php   } ?>
        </div>
        <br>
        <div class="form-outline text-center">
            <input name="submit" type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</aside>
<?php } ?>