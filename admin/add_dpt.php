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
$stmt = $conn->prepare("SELECT * FROM `departments` ORDER BY department_name ASC");
$stmt->execute();

// Fetch all departments as an associative array
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add departments</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- SweetAlert CDN link -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 1.5rem;
            
        }

        .container{
            position: relative;
            left: 307px;
            top: 40px;
        }
        .container .department-form{    
            display: flex;
            font-size: 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 50px;
        }
        .logo {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        .nav-2 {
            display: none;
        }
        .department-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 145px;
        }
        @media (max-width: 991px){
            .container{
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .nav-1 {
                display: none;
            }

            .nav-2 {
                display: block;
            }

            .department-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;    
            width: 60px;
        }
        }

        .department-form {
            margin-bottom: 20px;
        }

        .department-form label {
            font-weight: bold;
            margin-right: 10px;
        }

        .department-form input[type="text"] {
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .department-table {
            width: 100%;
            border-collapse: collapse;
        }

        .department-table th,
        .department-table td {
            padding: 10px; .delete-button {
            background-color: #ff0000;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .department-table th {
            background-color: #f2f2f2;
        }

       

        .success-msg {
            color: #008000;
        }

        .error-msg {
            color: #ff0000;
        }
    </style>
</head>

<body>
<?php include '../components/admin_header.php'; ?>

    <div class="container">
        <div class="department-form">
            <form method="post" action="">
                <label for="department_name">Department Name:</label>
                <input type="text" name="department_name" id="department_name" required>
                <input type="submit" name="submit" value="Add Department">
            </form>
        </div>

        <table class="department-table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department) : ?>
                    <tr>
                        <td><?php echo $department['department_name']; ?></td>
                        <td>
                        <form id="delete_department_form" method="post" action="">
                        <button type="submit" name="delete_department" value="<?php echo $department['id']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (isset($success_msg)) : ?>
            <p class="success-msg"><?php echo $success_msg; ?></p>
        <?php endif; ?>
        <?php if (isset($error_msg)) : ?>
            <p class="error-msg"><?php echo $error_msg; ?></p>
        <?php endif; ?>
    </div>

    <script src="js/script.js"></script>
  
</body>

</html>