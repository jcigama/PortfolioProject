<!doctype html>
<html lang="en">



<?php
//Redirect if form has not been submitted
if (empty($_POST)) {
    header("location: guestbook.html");
}

//Set the time zone


//Include header file
include ('includes/header.html');
require ('includes/dbcred.php');
require ('includes/guestBookFunctions.php');
?>

<body>

<div class="container" id="main">
    <div class="jumbotron shadow p-3" >
        <div class="container text-center">
            <h1 class="display-5 font-weight-bold">Joseph's Guestbook</h1>
            <p class="lead">Join my network.</p>
        </div>
    </div>
</div>

<div class="container">
<?php


    //Data validation
    $isValid = true;

    //Get data from POST array

    // fname validation
    if (validName($_POST['fname'])) {
        $fname = $_POST['fname'];
    }
    else {
        echo "<p>Please provide a valid first name (Required)</p>";
        $isValid = false;
    }

    // lname validation
    if (validName($_POST['lname'])) {
        $lname = $_POST['lname'];
    }
    else {
        echo "<p>Please provide a valid last name (Required)</p>";
        $isValid = false;
    }

    // email validation
    if (!empty($_POST['email'])) {
        if (validEmail($_POST['email'])){
            $email = $_POST['email'];
        }
        else {
            echo "<p>Please provide a valid E-mail for mailing list (Example: johndoe@example.com)</p>";
            $isValid = false;
        }
    }

    // meeting validation
    if (validMeeting($_POST['choice'])) {
        $metBy = $_POST['choice'];
    }
    else {
        echo "<p>Please specify how we met (Required)</p>";
        $isValid = false;
    }

    // linkedin validation
    if (!empty($_POST['linkedIn'])) {
        if(validateLinkedIn($_POST['linkedIn'])) {
            $linkedIn = $_POST['linkedIn'];
        }
        else
        {
            echo "<p>Please provide a valid LinkedIn address. (Example: https://www.linkedin.com/in/example/)</p>";
            $isValid = false;
        }
    }

    // mail list validation
    if ($_POST['mailList'] === "on" && empty($_POST['email'])) {
        echo "Please provide an email for mailing list.";
        $isValid = false;
    }
    else if ($_POST['mailList'] === "on" && !empty($_POST['email'])) {
        if (!($_POST['inlineRadioOptions'] === "option1") && !($_POST['inlineRadioOptions'] === "option2")) {
            echo "<p>Please choose a mailing option (HTML or Text)</p>";
            $isValid = false;
        }
    }

    // email format validation
    if ($_POST['inlineRadioOptions'] === "option1" && $_POST['mailList'] === "on"){
        $mailList = "HTML";
    }
    else if ($_POST['inlineRadioOptions'] === "option2" && $_POST['mailList'] === "on"){
        $mailList = "Text";
    }
    else if (($_POST['inlineRadioOptions'] === "option1") && !($_POST['mailList'] === "on")
    || ($_POST['inlineRadioOptions'] === "option2") && !($_POST['mailList'] === "on")) {
        echo "You must check the opt-in into mailing list box in order to choose an email format";
        $isValid = false;
    }

    // no validation required
    $jobTitle = $_POST['jobTitle'];
    $company = $_POST['company'];




//    Save data to database
    $sql = "INSERT INTO guest_book(`fname`, `lname`, `job_title`,
        `company`, `linkedIn`, `email`, `met_by`, `mail_list_method`) VALUES
    ('$fname', '$lname', '$jobTitle', '$company', '$linkedIn','$email', '$metBy', '$mailList')";

    echo "<h1 class='text-center'>Thank you for signing up, <strong>$fname</strong>!<br> I look forward to meeting you!</h1><br>";
    // data dump
    echo ("<pre>");
    if (!$isValid) {
        return;
    }
    else {
        echo "Form submission, successful! <br>";
        echo "Data submitted: <br>";
        echo "First name: " . $fname . "<br>";
        echo "Last name: " . $lname . "<br>";
        echo "Job Title: " . $jobTitle . "<br>";
        echo "Company: " . $company . "<br>";
        echo "LinkedIn: " . $linkedIn . "<br>";
        echo "E-mail: " . $email . "<br>";
        echo "Met By: " . $metBy . "<br>";
        echo "Mailing List Method: " . $mailList . "<br>";
    }
    echo ("</pre>");

    echo "<a class='container text-center btn btn-dark' href='http://jigama.greenriverdev.com/305/guestBook/guestbook.html' role='button'>Return back to guest form</a>";

    $success = mysqli_query($cnxn, $sql);
    if (!$success) {
        echo "<p>Sorry.... something went wrong.</p>";
        return;
    }
?>


</div>
</body>
</html>

