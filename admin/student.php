<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
   $admin_id = $_COOKIE['admin_id'];
} else {
   $admin_id = '';
   header('location:login.php');
}

$is_sortedBy = "nothing";
$mat = $_GET['mat'];
$select_users = $conn->prepare("SELECT * FROM `user` where matricule='$mat'");
$select_users->execute();

// $select_users = $conn->prepare("SELECT * FROM `user`");
// if (isset($_GET['search_btn'])) {
//    $search_box = $_GET['search_box'];
//    $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
//    $select_users = $conn->prepare("SELECT * FROM `user` WHERE name LIKE '%$search_box%' OR email LIKE '%$search_box%' OR matricule LIKE '%$search_box%'");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link href="../css/admin_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

   <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 1000px;
  overflow-x: auto;
  border: 1px solid black;
  border-radius: 12px;
}

.seperate-depart{
   border-top: 3px solid #2980b9;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2980b9;
  color: white;
  font-size: 1.3rem;
}
#customers td{
   font-size: 1.4rem;
}
.title{
      display: none;
      text-align: center;
      margin-bottom: 2rem;
      text-decoration: underline;
    }
    .centered {
      display: none;
    }
   .buttons{
      display: flex;
      justify-content: center ;
   }
   #print{
      cursor: pointer;
         background-color: #2980b9;     
         border-radius: 0.5rem;
         margin: 1.2rem 0;
         /* font-size: 1.7rem; */
         color: var(--black);
         padding: 1.5rem 1.7rem;
         background-color: var(--light-bg);
         border: var(--border);
   }
   #print:hover{
      background-color: #2980b9;
   }
   #sort{
      cursor: pointer;
         background-color: #2980b9;     
         border-radius: 0.5rem;
         margin: 1.2rem 0;
         /* font-size: 1.7rem; */
         color: var(--black);
         padding: 1.5rem 1.7rem;
         background-color: var(--orange);
         border: var(--border);
   }
   #sort:hover{
      background-color: var(--light-bg);
   }
    .intro{
      display: flex;
      justify-content: space-between;
      width: 100%;
      font-size: 1.5rem;
      line-height: 1.5;
      display: none;
    }
    .left{
      justify-content: flex-start;
    }
    .right{
      justify-content: flex-end;
    }
    .view{
      color: white;
      background-color: var(--orange);
      text-transform: capitalize;
      padding: 5px 12px;
      border-radius: 5px;
    }

    .view a {
      text-decoration: none;
      color: white;
    }
    .flex{
      display: flex;
      justify-content: center;
    }
    .head{
      margin-right: 36px;
    }
    .head h3{
      font-size: 2rem;
      line-height: 1.9;
    }
    .data p{
      font-size: 2rem;
      line-height: 1.9;
    }
    .text{
      margin: 70px;
    }
    .stamp{
      display: flex;
      justify-content: flex-end;
      margin-top: 40px;
    }
    .details{
      display: block;
      line-height: 29.9px;
    }
    .stamp{
      display: none;
   }
   .footer{
      display: none;
   }
@media print {
    header, footer, aside, form, #form, .heading, #print,#menu-btn{
        display: none;
    }
    .title, .centered {
      display: block;
    }
    .intro{
      display: flex;
    }
    body {
      background-color: white;
    }
    .view{
      display: none;
    }
    .stamp{
    display: flex;  
   }
   .footer{
      display: block;
   }

}

   /* Default table styles */
   table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    table th,
    table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    /* Mobile responsive styles */
    @media (max-width: 600px) {
        table {
            font-size: 12px;
        }

        table th,
        table td {
            padding: 6px;
        }
    }
</style>
</head>

<body>

   <!-- header section starts  -->
   <?php include '../components/admin_header.php'; ?>
   <!-- header section ends -->

   <!-- admins section starts  -->

   <section class="grid">

      <h1 class="heading">Student Details </h1>
<!-- 
      <form action="" method="GET" class="search-form" id="form">
         <input type="text"   name="search_box" placeholder="search users..." maxlength="100" required id="search_box">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
         <button type="submit" class="fas fa-refresh" id="homeBtn" ></button>
      </form> -->
      <center><button class="fas fa-print" id="print">
         Print
      </button>
      </center>

     
<br/>
<br/>
<div class="intro">
<div class="left">
   <p>UNIVERSITY OF BUEA
<p>HIGHER TECHNICAL TEACHERS' TRAINING COLLEGE</p>                                            
<p>P.O Box 249 Buea Road, Kumba</p>
<p>South West Region, Cameroon</p>
<p>Tel:(+237)233354691 - Fax:(+237)233354692</p>
<p>Email: administrator@htttckumba.com</p>
<p>Director: Prof. Akume Daniel Akume</p>
<p>Deputy Director: Prof. Nkongho Anyi Joseph</p>
<p>Director of Studies: Prof. Defang henry Fualefa</p>
<p>Secretary General: Prof. Lissouck Daniel</p>
</p>
</div>
<div><img src="../images/Capture.PNG" class="centered" alt="" width="100px" height="100px"></div>

<div class="right"><p> REPUBLIC OF CAMEROON</p>
<p>Peace - Work - Fatherland</p></div>
</div>


<br/>
<h1 class="title"><u>REGISTRATION FORM FOR DIPET I, DIPET II, DEPEN, DIPCO</u></h1>
     
<?php
   $is_sortedBy = 'nothing';
   $select_users = $conn->prepare("SELECT * FROM `user` where matricule='$mat'");
$select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);

 

?>
<!-- HTML table structure -->
<!-- <h3>Matricule</th>
      <h3>Name</h3>
      <h3>Gender</h3>
      <h3>Date of Birth</h3>
      <h3>Place of Birth</h3>
      <h3>Department</h3>
      <h3>Specialty</h3>
      <h3>Level</h3>
      <h3>Award</h3>
      <h3>Email</h3>
      <h3>Number</h3>
      <h3>Language</h3>
      <h3>Academic Year</h3>
-->
<!-- <table id="customers">
   <tr>
      <th>Matricule</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Date of Birth</th>
      <th>Place of Birth</th>
      <th>Department</th>
      <th>Specialty</th>
      <th>Level</th>
      <th>Award</th>
      <th>Email</th>
      <th>Number</th>
      <th>Language</th>
      <th>Academic Year</th>
   </tr> -->
   <div class="flex">
   <div class="head">
   <h3>Matricule:</h3>
      <h3>Name:</h3>
      <h3>Gender:</h3>
      <h3>Date of Birth:</h3>
      <h3>Place of Birth:</h3>
      <h3>Department:</h3>
      <h3>Option:</h3>
      <h3>Level:</h3>
      <h3>Award:</h3>
      <h3>Email:</h3>
      <h3>Number:</h3>
      <h3>Language:</h3>
      <h3>Academic Year:</h3>
      </div>
   <div class="data">
   <?php
   if (isset($result) && count($result) > 0) {
      foreach ($result as $fetch_users) {
         
            
            echo   "<p>". $fetch_users['matricule'] . "</p>
            <p>". $fetch_users['name'] ."</p>
            <p>". $fetch_users['gender'] ."</p>
            <p>". $fetch_users['dob'] ."</p>
            <p>". $fetch_users['pob'] ."</p>
            <p>". $fetch_users['department'] ."</p>
            <p>". $fetch_users['specialty'] ."</p>
            <p>". $fetch_users['level'] ."</p>
            <p>". $fetch_users['award'] ."</p>
            <p>". $fetch_users['email'] ."</p>
            <p>". $fetch_users['number'] ."</p>
            <p>". $fetch_users['language'] ."</p>
            <p>". $fetch_users['academic_year'] ."</p>

         </tr>";
      }
   } else {
      echo "<tr><td colspan='13'>No data found.</td></tr>";
   }
   ?>
   </div>
   <!-- <?php
   // if (isset($result) && count($result) > 0) {
   //    foreach ($result as $fetch_users) {
         
   //          echo "<tr>";
   //          echo   "<td>". $fetch_users['matricule'] . "</td>
   //          <td>". $fetch_users['name'] ."</td>
   //          <td>". $fetch_users['gender'] ."</td>
   //          <td>". $fetch_users['dob'] ."</td>
   //          <td>". $fetch_users['pob'] ."</td>
   //          <td>". $fetch_users['department'] ."</td>
   //          <td>". $fetch_users['specialty'] ."</td>
   //          <td>". $fetch_users['level'] ."</td>
   //          <td>". $fetch_users['award'] ."</td>
   //          <td>". $fetch_users['email'] ."</td>
   //          <td>". $fetch_users['number'] ."</td>
   //          <td>". $fetch_users['language'] ."</td>
   //          <td>". $fetch_users['academic_year'] ."</td>

   //       </tr>";
   //    }
   // } else {
   //    echo "<tr><td colspan='13'>No data found.</td></tr>";
   // }
   ?>  -->
   </div>
   <div class="stamp">
      <div class="text">
         <h3>FISCAL STAMP</h3>
      </div>
      <div class="details">
        <center><h2>DATE AND SIGNATURE OF CANDIDATE</h2> </center>
        <h3>On ______________________________ at ______________________________</h3> 
        <h3>Recived for Director and by Delegation</h3> 
         <h3>Signature__________________________________</h3>
      </div>
   </div>
   <CEnter><h3 class="footer">DIVISION OF TRAINING AND ORIENTATION HTTTC KUMBA</h3></CEnter>
</section>
   </section>
   <!-- users section ends -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>
   <script>   
   // alert('hey hey')
   // Add an event listener to the refresh button
          // Add an event listener to the home button
      //     document.getElementById('homeBtn').addEventListener('click', function() {
      //    // Set the desired home page URL
      //    var homePageUrl = "users.php";


      //    // Open the home page in a new tab or window
      //    window.location.href = homePageUrl;
      // });
      
   //    let search = document.getElementById('search_box');

   //    search.addEventListener('keydown', (e) => {
   //    let subBtn = document.getElementById('form');
   //    // subBtn.submit();
   //    console.log(subBtn);
   // }, false)

   let prt = document.getElementById('print');

   prt.addEventListener('click', (e) => {
      // alert('hey hey')
      window.print();
   }, false)
      </script>

</body>
</html>