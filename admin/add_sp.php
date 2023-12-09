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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add specialty</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- SweetAlert CDN link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../project/js/admin_script.js"></script>
    <!-- custom css file link  -->
    <link href="../css/admin_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <style>
        /* Style for the form */
       

        form.form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            width: 107rem;
            margin-top: 50px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input[type="text"] {
            padding: 12px;
            width: 46rem;
            max-width: 60rem;
            border-radius: 2px;
        }

        form input[type="submit"] {
            padding: 13px 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            width: 31rem;
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        /* Style for the delete button */
        .delete-button {
            background-color: #ff0000;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Mobile responsive styles */
        @media (max-width: 768px) {
            form.form {
                margin-top: 20px;
            }

            form input[type="text"] {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body style="font-size: 1.5rem;">
    <?php include '../components/admin_header.php'; ?>
    <div style="display: flex; justify-content: center;">
        <form method="post" action="" class="form">
            <label for="specialty_name">Specialty Name:</label>
            <input type="text" name="specialty_name" id="specialty_name" required>
            <input type="submit" name="submit" value="Add Specialty">
        </form>
    </div>

    <!-- HTML table to display specialties and delete option -->
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Specialty Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($specialties as $specialty) : ?>
                    <tr>
                        <td><?php echo $specialty['specialty_name']; ?></td>
                        <td>
                            <form method="post" action="">
                                <button type="submit" name="delete" value="<?php echo $specialty['id']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    // Display success or error message if set
    if (isset($success_msg)) {
        echo '<p>' . $success_msg . '</p>';
    }
    if (isset($error_msg)) {
        echo '<p>' . $error_msg . '</p>';
    }
    ?>

</body>

</html>