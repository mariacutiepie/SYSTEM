<?php
session_start();
require_once '../classes/infos.class.php';
require_once '../tools/clean.php';

$objInfos = new Infos;
$lastname = $firstname = $middleini = $section = $birthday = $bio = $contact = $email = $elem = $high = $college = $shs = '' ;
$lastnameErr = $firstnameErr = $middleiniErr = $sectionErr = $birthdayErr = $bioErr = $contactErr = $emailErr = $elemErr = $highErr = $collegeErr = $shsErr ='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = isset($_POST['lastname']) ? clean_input($_POST['lastname']) : '';
    $firstname = isset($_POST['firstname']) ? clean_input($_POST['firstname']) : '';
    $middleini = isset($_POST['middleini']) ? clean_input($_POST['middleini']) : '';
    $section = isset($_POST['section']) ? clean_input($_POST['section']) : '';
    $birthday = isset($_POST['birthday']) ? clean_input($_POST['birthday']) : '';
    $bio = isset($_POST['bio']) ? clean_input($_POST['bio']) : '';
    $contact = isset($_POST['contact']) ? clean_input($_POST['contact']) : '';
    $email = isset($_POST['email']) ? clean_input($_POST['email']) : '';
    $elem = isset($_POST['elem']) ? clean_input($_POST['elem']) : '';
    $high = isset($_POST['high']) ? clean_input($_POST['high']) : '';
    $shs = isset($_POST['shs']) ? clean_input($_POST['shs']) : '';
    $college = isset($_POST['college']) ? clean_input($_POST['college']) : '';


    if (empty($lastname)) {
        $lastnameErr = '*Lastname is Required!';
    }
    if (empty($firstname)) {
        $firstnameErr = '*Firstname is Required!';
    }
    if (empty($middleini)) {
        $middleiniErr = '*Middle Initial is Required!';
    }
    if (empty($section)) {
        $sectionErr = '*Section is Required!';
    }
    if (empty($contact)) {
        $contactErr = '*Contact is Required!';
    }
    if (empty($email)) {
        $emailErr = '*Email is Required!';
    }
    if (empty($elem)) {
        $elemErr = '*Elementary Education is Required!';
    } 
    if (empty($high)) {
        $highErr = '*High School Education is Required!';
    } 
    if (empty($shs)) {
        $shsErr = '*Senior High School Education is Required!';
    } 
    if (empty($college)) {
        $collegeErr = '*College Education is Required!';
    }
    if (empty($lastnameErr) && empty($firstnameErr) && empty($middleiniErr) && empty($contactErr) && empty($sectionErr)) {
        $objInfos->user_id = $_SESSION['user']['user_id'];
        $objInfos->lastname = $lastname;
        $objInfos->firstname = $firstname;
        $objInfos->section = $section;
        $objInfos->birthday = $birthday;
        $objInfos->bio = $bio;
        $objInfos->middleini = $middleini;
        $objInfos->contact = $contact;
        $objInfos->email = $email;
        $objInfos->elem = $elem;
        $objInfos->high = $high;
        $objInfos->shs = $shs;
        $objInfos->college = $college;

        if ($objInfos->add()) {
            // Redirect to the Location: after successful insertion
            header('Location: skills.php');
        } else {
            // Display an error message if something went wrong during insertion
            echo 'Something went wrong when adding the new product. ';
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/setup.css">
    <title>Profiling</title>
</head>

<body>
    <div class="parent">
        <div class="p-child">
            <img src="../img/null.png" alt="">
            <h1><?php echo $_SESSION["user"]["username"] ?>!</h1>
        </div>
        <div class="form">
            <h1>About You</h1>
            <br>
            <form action="" method="POST">
                <label for="lastname">Last Name<span class="error"><?= $lastnameErr ?></span>
                    <input type="text" name="lastname" id="lastname">
                </label>
                
                <label for="firstname">First Name<span class="error"><?= $firstnameErr ?></span>
                    <input type="text" name="firstname" id="firstname">
                </label>
                
                <label for="middleini">Middle Initial<span class="error"><?= $middleiniErr ?></span>
                    <input type="text" name="middleini" id="middleini">
                </label>

                <label for="section">Year and Section<span class="error"><?= $sectionErr ?></span>
                    <input type="text" name="section" id="section">
                </label>
               
                <label for="birthday">Birthday
                    <input type="date" name="birthday" id="birthday">
                </label>
                
                <label for="email">Email Address<span class="error"><?= $emailErr ?></span>
                    <input type="text" name="email" id="email">
                </label>

                <label for="contact">Contact Number<span class="error"><?= $contactErr ?></span>
                    <input type="number" name="contact" id="contact">
                </label>
            
                <label for="bio">Bio
                    <textarea name="bio" id="bio" cols="40" rows="1"></textarea>
                </label>
                <br>
                <br>
                <br>
                <div class="education">
                    <h1>Education</h1>
                    <br>
                    <label for="elem">Grade School<span class="error"><?= $elemErr ?></span>
                        <input type="text" name="elem" id="elem">
                    </label>

                    <label for="high">High School<span class="error"><?= $highErr ?></span>
                        <input type="text" name="high" id="high">
                    </label>

                    <label for="shs">Senior High School<span class="error"><?= $shsErr ?></span>
                        <input type="text" name="shs" id="shs">
                    </label>

                    <label for="college">College<span class="error"><?= $collegeErr ?></span>
                        <input type="text" name="college" id="college">
                    </label>
                </div>
                <br>
                <input type="submit" value="Proceed" name="submit">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>