<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link href="../css/admin_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

</head>
<body>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->

<!-- dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <h3>welcome!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update.php" class="btn">update profile</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `user`");
         $select_users->execute();
         $count_users = $select_users->rowCount();
      ?>
      <h3><?= $count_users; ?></h3>
      <p>students</p>
      <a href="users.php" class="btn">view students</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admins`");
         $select_admins->execute();
         $count_admins = $select_admins->rowCount();
      ?>
      <h3><?= $count_admins; ?></h3>
      <p>total admins</p>
      <a href="admins.php" class="btn">view admins</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `departments`");
         $select_admins->execute();
         $count_admins = $select_admins->rowCount();
      ?>
      <h3><?= $count_admins; ?></h3>
      <p>total departments</p>
      <a href="add_dpt.php" class="btn">view departments</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `specialty`");
         $select_admins->execute();
         $count_admins = $select_admins->rowCount();
      ?>
      <h3><?= $count_admins; ?></h3>
      <p>total option</p>
      <a href="add_sp.php" class="btn">view option</a>
   </div>
   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $count_messages = $select_messages->rowCount();
      ?>
      <h3><?= $count_messages; ?></h3>
      <p>new messages</p>
      <a href="messages.php" class="btn">view messages</a>
   </div>

   </div>

</section>


<!-- dashboard section ends -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>