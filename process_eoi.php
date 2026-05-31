<?php
require 'settings.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit();
}

// code sanitisation
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

$jobRef = clean_input($_POST['jobRef']);
$firstName = clean_input($_POST['firstName']);
$lastName = clean_input($_POST['lastName']);
$dateOfBirth = clean_input($_POST['dateOfBirth']);
$gender = clean_input($_POST['gender']);
$street = clean_input($_POST['street']);
$suburb = clean_input($_POST['suburb']);
$state = clean_input($_POST['state']);
$postcode = clean_input($_POST['postcode']);
$email = clean_input($_POST['email']);
$phone = clean_input($_POST['phone']);
$otherSkills = clean_input($_POST['otherSkills']);
$skillsArray  = isset($_POST['category']) && is_array($_POST['category']) ? $_POST['category'] : [];
$skillsArray = array_map('clean_input', $skillsArray);
$skills = implode(', ', $skillsArray);

// validation
$errors = [];

// jobref validation
if (empty($jobRef)) {
    $errors[] = 'Job reference is required.';
} elseif (!preg_match('/^[A-Z]{2}\d{4}$/', $jobRef)) {
    $errors[] = 'Job reference must be in the format: two uppercase letters followed by four digits (e.g., AB1234).';
}


// First and last name validation
if (empty($firstName)) {
    $errors[] = 'First name is required.';
} elseif (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
    $errors[] = 'First name can only contain letters.';
}

if (empty($lastName)) {
    $errors[] = 'Last name is required.';
} elseif (!preg_match('/^[a-zA-Z]+$/', $lastName)) {
    $errors[] = 'Last name can only contain letters.';
}

// date of birth validation
if (empty($dateOfBirth)) {
    $errors[] = 'Date of birth is required.';
} elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateOfBirth)) {
    $errors[] = 'Date of birth must be in the format: YYYY-MM-DD.';
} else {
    $dobTimestamp = strtotime($dateOfBirth);
    if ($dobTimestamp === false) {
        $errors[] = 'Invalid date of birth.';
    } else {
        $age = (int)((time() - $dobTimestamp) / (365.25 * 24 * 60 * 60));
        if ($age < 18) {
            $errors[] = 'You must be at least 18 years old to apply.';

        }
    }
}

// gender validation
if (empty($gender)) {
    $errors[] = 'Gender is required.';
}

// address validation
if (empty($street)) {
    $errors[] = 'Street addressis required.';
}

if (empty($suburb)) {
    $errors[] = 'Suburb is required.';
}

// state validation
$validStates = ['VIC', 'NSW', 'QLD', 'SA', 'WA', 'TAS', 'ACT', 'NT'];
if (empty($state)) {
    $errors[] = 'State is required.';
} elseif (!in_array($state, $validStates)) {
    $errors[] = 'State must be one of the following: VIC, NSW, QLD, SA, WA, TAS, ACT, NT.';
}
