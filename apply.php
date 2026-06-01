<?php require_once 'settings.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Apply for the position">
    <meta name="keywords" content="position, details, contact, skills">
    <meta name="author" content="Sophia" >
    <title>Apply for the position</title>
    <link rel="stylesheet" href="style/style.css">

    <style>
      .button {
        background-color: rgba(39, 174, 96, 1);
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
      }
    </style>
  </head>

  <body>
    <!-- Dark/Light mode anchor targets (pure CSS method) -->
    
    <?php include 'header.inc'; ?>

    <div class="applyhero">
      <h1>Apply</h1>
    </div>

    <form
      method="post"
      action="process_eoi.php"
    >
      <h2 class="apply-sections">General Details</h2>
      <div class="apply-container">
        <div class="apply-element">
          <label for="jobRef">Job Reference Number*</label>
          <input
            class="apply-fields"
            type="text"
            name="jobRef"
            id="jobRef"
            required="required">
        </div>
        <br>

        <div class="apply-element">
          <label for="firstName">First Name*</label>
          <input
            class="apply-fields"
            type="text"
            name="firstName"
            id="firstName"
            required="required">
        </div>

        <div class="apply-element">
          <label for="lastName">Last Name*</label>
          <input
            class="apply-fields"
            type="text"
            name="lastName"
            id="lastName"
            required="required">
        </div>

        <div class="apply-element">
          <label for="dateOfBirth">Date of birth*</label>
          <input
            type="date"
            class="apply-fields"
            name="dateOfBirth"
            id="dateOfBirth"
            size="10"
            required="required">
        </div>
      </div>

      <div style="padding: 1%">
        <p>Gender*</p>

        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label>
        <p></p>

        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <p></p>

        <input
          type="radio"
          id="notspecified"
          name="gender"
          value="notspecified">
        <label for="notspecified">N/S</label>
        <p></p>

        <input type="radio" id="prefernot" name="gender" value="Prefer not to say">
        <label for="prefernot">Prefer not to say</label>
        <p></p>
      </div>

      <h2 class="apply-sections">Contact Details</h2>
      <div class="apply-container">
        <div class="apply-element">
          <label for="streetAddress">Street address*</label>
          <input
            class="apply-fields"
            type="text"
            name="streetAddress"
            id="streetAddress"
            required="required">
        </div>
        <div class="apply-element">
          <label for="suburb">Suburb/Town*</label>
          <input
            class="apply-fields"
            type="text"
            name="suburb"
            id="suburb"
            required="required">
        </div>

        <div class="apply-element">
          <label for="state">State*</label>
          <select name="state" id="state" required class="apply-fields">
            <option value="">Please Select</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
          </select>
        </div>

        <div class="apply-element">
          <label for="postcode">Postcode*</label>
          <input
            class="apply-fields"
            type="text"
            name="postcode"
            id="postcode"
            required="required">
        </div>

        <div class="apply-element">
          <label for="email">Email*</label>
          <input
            class="apply-fields"
            type="text"
            name="email"
            id="email"
            required="required">
        </div>
        <div class="apply-element">
          <label for="phone">Phone number*</label>
          <input
            class="apply-fields"
            type="text"
            name="phone"
            id="phone"
            placeholder="0400000000"
            required="required">
        </div>
      </div>

      <h2 class="apply-sections">Skills</h2>
      <div style="padding: 1%">
        <input type="checkbox" id="React" name="category[]" value="React">
        <label for="React">React</label>
        <br>
        <input
          type="checkbox"
          id="Javascript"
          name="category[]"
          value="Javascript">

        <label for="Javascript">Javascript</label>
        <br>

        <input type="checkbox" id="Node.js" name="category[]" value="Node.js">
        <label for="Node.js">Node.js</label>
        <br>

        <input
          type="checkbox"
          id="FluentInAlien"
          name="category[]"
          value="Fluent in Alien"
        >
        <label for="FluentInAlien">Fluent in Alien</label>
        <br>

        <input type="checkbox" id="PHP" name="category[]" value="PHP">
        <label for="PHP">PHP</label>
        <br>
        <input type="checkbox" id="MySQL" name="category[]" value="MySQL">
        <label for="MySQL">MySQL</label>
        <br>
      </div>
      <div class="apply-element">
        <label for="otherSkills">Other skills</label>

        <textarea
          id="otherSkills"
          name="otherSkills"
          rows="12"
          cols="40"
          placeholder="List other skills here..."></textarea>
      </div>

      <div class="apply-buttons">
        <input type="submit" value="Apply" class="button">
        <input type="reset" value="Reset form" class="button">
      </div>
    </form>
   
    <?php include 'footer.inc'; ?>
    
</body>
</html>