<?php
include '../components/connect.php';

// Add department if the form is submitted
if (isset($_POST['submit'])) {
    $department_name = $_POST['department_name'];
    $department_name = filter_var($department_name, FILTER_SANITIZE_STRING);

    // Prepare and execute the SQL query to insert the department
    $insert_department = $conn->prepare("INSERT INTO `departments` (department_name) VALUES (?)");
    $insert_department->execute([$department_name]);

    if ($insert_department) {
        $success_msg = 'Department added successfully!';
    } else {
        $error_msg = 'Failed to add department.';
    }
}

// Delete department if delete button is clicked
if (isset($_POST['delete_department'])) {
    $department_id = $_POST['delete_department'];

    // Prepare and execute the SQL query to delete the department
    $delete_department = $conn->prepare("DELETE FROM `departments` WHERE id = ?");
    $delete_department->execute([$department_id]);

    if ($delete_department) {
        $success_msg = 'Department deleted successfully!';
    } else {
        $error_msg = 'Failed to delete department.';
    }
}

// Prepare and execute the SQL query to select departments
$stmt = $conn->prepare("SELECT * FROM `departments`");
$stmt->execute();

// Fetch all departments as an associative array
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML form -->
<form method="post" action="">
    <label for="department_name">Department Name:</label>
    <input type="text" name="department_name" id="department_name" required>
    <input type="submit" name="submit" value="Add Department">
</form>

<!-- HTML table to display departments -->
<table>
    <thead>
        <tr>
            <th>Department Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($departments as $department) {
            echo "<tr>";
            echo "<td>" . $department['department_name'] . "</td>";
            echo "<td>";
            echo "<form method='post' action=''>";
            echo "<button type='submit' name='delete_department' value='" . $department['id'] . "'>Delete</button>";
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