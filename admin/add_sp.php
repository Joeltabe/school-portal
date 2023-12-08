<?php
include '../components/connect.php';

// Add specialty if the form is submitted
if (isset($_POST['submit'])) {
    $specialty_name = $_POST['specialty_name'];
    $specialty_name = filter_var($specialty_name, FILTER_SANITIZE_STRING);

    // Prepare and execute the SQL query to insert the specialty
    $insert_specialty = $conn->prepare("INSERT INTO `specialty` (specialty_name) VALUES (?)");
    $insert_specialty->execute([$specialty_name]);

    if ($insert_specialty) {
        $success_msg = 'Specialty added successfully!';
    } else {
        $error_msg = 'Failed to add specialty.';
    }
}

// Delete specialty if delete button is clicked
if (isset($_POST['delete'])) {
    $specialty_id = $_POST['delete'];

    // Prepare and execute the SQL query to delete the specialty
    $delete_specialty = $conn->prepare("DELETE FROM `specialty` WHERE id = ?");
    $delete_specialty->execute([$specialty_id]);

    if ($delete_specialty) {
        $success_msg = 'Specialty deleted successfully!';
    } else {
        $error_msg = 'Failed to delete specialty.';
    }
}

// Fetch all specialties as an associative array
$stmt = $conn->prepare("SELECT * FROM `specialty`");
$stmt->execute();
$specialties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML form to add specialties -->
<form method="post" action="">
    <label for="specialty_name">Specialty Name:</label>
    <input type="text" name="specialty_name" id="specialty_name" required>
    <input type="submit" name="submit" value="Add Specialty">
</form>

<!-- HTML table to display specialties and delete option -->
<table>
    <thead>
        <tr>
            <th>Specialty Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($specialties as $specialty) {
            echo "<tr>";
            echo "<td>" . $specialty['specialty_name'] . "</td>";
            echo "<td>";
            echo "<form method='post' action=''>";
            echo "<button type='submit' name='delete' value='" . $specialty['id'] . "'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Display success or error message if set
if (isset($success_msg)) {
    echo '<p>' . $success_msg . '</p>';
}
if (isset($error_msg)) {
    echo '<p>' . $error_msg . '</p>';
}
?>