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
$streetAddress = clean_input($_POST['streetAddress']);
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
} elseif (!preg_match('/^[A-Za-z0-9]{6}$/', $jobRef)) {
    $errors[] = 'Job reference must be exactly 6 alphanumeric characters (e.g., NEX101).';
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
if (empty($streetAddress)) {
    $errors[] = 'Street address is required.';
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

// postcode validation
if (empty($postcode)) {
    $errors[] = 'Postcode is required.';
} elseif (!preg_match('/^\d{4}$/', $postcode)) {
    $errors[] = 'Postcode must be a 4-digit number.';
}

// email validation
if (empty($email)) {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address.';
}

// phone number validation
if (empty($phone) || !preg_match('/^\d{8,12}$/', $phone)) {
    $errors[] = "Phone number must be 8–12 digits.";
}
 
// if there are any other errors within the form that the user has inputted, then the user will be redirected back to the form. (used copilot to assist with this code)
if (!empty($errors)) {
    echo "<h2>There were problems with your submission:</h2><ul>";
    foreach ($errors as $e) {
        echo "<li>" . $e . "</li>";
    }
    echo "</ul><p><a href=\"apply.php\">Go back to the application form</a></p>";
    exit();
}

// store user input in eoi db
$stmt = $conn->prepare("INSERT INTO eoi (jobRef, firstName, lastName, dateOfBirth, gender, streetAddress, suburb, state, postcode, email, phone, skills, otherSkills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $jobRef, $firstName, $lastName, $dateOfBirth, $gender, $streetAddress, $suburb, $state, $postcode, $email, $phone, $skills, $otherSkills);

if ($stmt->execute()) {
    $eoiNumber = $stmt->insert_id;
    echo "<h2>Expression of Interest Submitted</h2>";
    echo "<p>Your EOInumber is: <strong>" . htmlspecialchars($eoiNumber) . "</strong></p>";
    echo "<p>Status: <strong>New</strong></p>";
    echo "<p>Thank you, " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . ".</p>";
    echo "<p><a href=\"apply.php\">Submit another EOI</a></p>";
} else {
    echo "Error saving your EOI: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>