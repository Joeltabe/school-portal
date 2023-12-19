<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

$stmt = $conn->prepare("SELECT * FROM `departments`");
$stmt->execute();

$stmt2 = $conn->prepare("SELECT * FROM `specialty` WHERE 1");
if ($stmt2->execute()) {
   
    $specialties = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Handle query execution error
    die("Error executing query: " . $stmt2->errorInfo()[2]);
}

// Fetch all departments as an associative array
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
   $matricule = $_POST['matricule'];
   $matricule = filter_var($matricule, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   // ... other form fields ...

   // Check if matricule exists in the database
   $check_query = $conn->prepare("SELECT COUNT(*) as count FROM `user` WHERE matricule = ?");
   $check_query->execute([$matricule]);
   $result = $check_query->fetch(PDO::FETCH_ASSOC);

   if ($result['count'] > 0) {
      // Matricule already exists
      $warning_msg[] = "Matricule already exists. Please enter a different matricule.";
   } else {
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);
   $dob = $_POST['dob'];
   $dob = filter_var($dob, FILTER_SANITIZE_STRING);
   $pob = $_POST['pob'];
   $pob = filter_var($pob, FILTER_SANITIZE_STRING);
   $department = $_POST['department'];
   $department = filter_var($department, FILTER_SANITIZE_STRING);
   $specialty = $_POST['specialty'];
   $specialty = filter_var($specialty, FILTER_SANITIZE_STRING);
   $level = $_POST['level'];
   $level = filter_var($level, FILTER_SANITIZE_STRING);
   $other_level = $_POST['other_level'];
   $other_level = filter_var($other_level, FILTER_SANITIZE_STRING);
   $award = $_POST['award'];
   $award = filter_var($award, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $language = $_POST['language'];
   $language = filter_var($language, FILTER_SANITIZE_STRING);
   $academic_year = $_POST['academic_year'];
   $academic_year = filter_var($academic_year, FILTER_SANITIZE_STRING);

   // ... Your existing code ...

   // Add the following code to insert the form data into the database
   $insert_user = $conn->prepare("INSERT INTO `user` (matricule, name, gender, dob, pob, department, specialty, level, other_level, award, email, number, language, academic_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $insert_user->execute([$matricule, $name, $gender, $dob, $pob, $department, $specialty, $level, $other_level, $award, $email, $number, $language, $academic_year]);
   $success_msg[] ="Your details have been uploaded successfully";
   // ... Your existing code ...
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<?php include 'components/user_header.php'; ?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>create an account!</h3>
      <input type="text" name="matricule" required maxlength="50" placeholder="enter your matricule" class="box" required>
      <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <select name="gender" required maxlength="50" placeholder="enter your name" class="box">
      <option value="male">Male</option>
      <option value="female">female</option>
      <option value="other">other</option>
      </select>
      <h4 class="reg_label">enter your date of birth</h4>
      <input type="date" name="dob" required maxlength="15" placeholder="enter your date of birth" class="box">
      <input type="text" name="pob" required maxlength="50" placeholder="enter your place of birth" class="box">
       <!-- departments -->
       <h4 class="reg_label">Enter your department:</h4>
      <!-- <select class="box" name="department" id="department"> 
        <?php

        for($i =0;$i< count($departments); $i++){
         $department = $departments[$i];
         echo "<option value='". $department['id'] . "' name='department'>". $department['department_name'] ."</option>";

        }
        ?>
     
      </select> -->
      <select class="box" name="department" id="department"> 
    <?php
    $stmt = $conn->prepare("SELECT * FROM `departments`");
    $stmt->execute();
    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($departments as $department) {
        echo "<option value='" . $department['department_name'] . "' name='department'>" . $department['department_name'] . "</option>";
    }
    ?>
    </select>
      <h4 class="reg_label">Enter your option:</h4>
      <!-- <select class="box" name="specialty" id="specialty">
      <?php
      if (is_array($specialties)) { // Check if $specialties is an array
         foreach ($specialties as $specialty) {
               echo "<option value='" . $specialty['id'] . "' name='specialty'>" . $specialty['specialty_name'] . "</option>";
         }
      } else {
         echo "<option disabled>No specialties available</option>";
      }
      ?>
       </select> -->
       <select class="box" name="specialty" id="specialty">
    <?php
    if (is_array($specialties)) { // Check if $specialties is an array
        foreach ($specialties as $specialty) {
            echo "<option value='" . $specialty['specialty_name'] . "' name='specialty'>" . $specialty['specialty_name'] . "</option>";
        }
    } else {
        echo "<option disabled>No options available</option>";
    }
    ?>
</select>
       <h4 class="reg_label">Enter level:</h4>
    <select class="box" name="level" id="level" onchange="toggleLevelInput()" required>
        <option value="200">200</option>
        <option value="300">300</option>
        <option value="400">400</option>
        <option value="500">500</option>
        <option value="600">600</option>
        <option value="other">Other</option>
    </select>
    <input class="box2" type="text" name="other_level" id="otherLevelInput" style="display: none;" placeholder="Enter your level" onblur="setInputValue()">

    <!-- Other form fields... -->
    <h4 class="reg_label">Enter Award:</h4>
    <select class="box" name="award" required>
    <option value="HND">HND</option>
    <option value="Bsc">Bsc</option>
    <option value="Masters">Masters</option>
    <option value="Phd">Phd</option>
    <option value="Other">Other</option>
    </select>

    <!-- Other form fields... -->
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your phone number" class="box">
      <input type="text" name="language" required maxlength="30" placeholder="enter your first language" class="box">
      <h4 class="reg_label">Academic Year:</h4>
  <input type="" name="academic_year" required maxlength="50" placeholder="Enter the academic year" class="box">
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>

<script>
function toggleLevelInput() {
    var levelSelect = document.getElementById("level");
    var levelInput = document.getElementById("otherLevelInput");

    if (levelSelect.value === "other") {
        levelInput.style.display = "block";
        levelInput.setAttribute("required", "required");
        levelInput.focus();
        levelSelect.removeAttribute("required");
    } else {
        levelInput.style.display = "none";
        levelInput.removeAttribute("required");
        levelInput.value = "";
        levelSelect.setAttribute("required", "required");
    }
}

function setInputValue() {
    var levelSelect = document.getElementById("level");
    var levelInput = document.getElementById("otherLevelInput");

    levelSelect.value = levelInput.value;
}
</script>
</html>