<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
   $admin_id = $_COOKIE['admin_id'];
} else {
   $admin_id = '';
   header('location:login.php');
}

$is_sortedBy = "nothing";
$is_sortedBy1 = "nothing";
$is_sortedBy2 = "nothing";

$select_users = $conn->prepare("SELECT * FROM `user`");
$select_users->execute();

$select_users = $conn->prepare("SELECT * FROM `user`");
if (isset($_GET['search_btn'])) {
   $search_box = $_GET['search_box'];
   $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
   $select_users = $conn->prepare("SELECT * FROM `user` WHERE name LIKE '%$search_box%' OR email LIKE '%$search_box%' OR matricule LIKE '%$search_box%'");
}

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
.show-prtn {
   display: none !important;
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
   #prnt-std{
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

   #prnt-std:hover{
      background-color: #2980b9;
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
      .flex0{
         display: block;
      }
      .flex{
      display: none;
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
   footer{
      display: none;
   }
   .empty-page{
         page-break-after: always;
      }
   @media print {

      #prnt-std{
         display: none;
      }
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
   footer{
      display: block;
      page-break-after: always;
   }
   #customers{
      page-break-after: always;
   }

   .flex{
      display: flex;
      justify-content: center;
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

      <h1 class="heading">Students</h1>

      <form action="" method="GET" class="search-form" id="form">
         <input type="text"   name="search_box" placeholder="search users..." maxlength="100" required id="search_box">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
         <button type="submit" class="fas fa-refresh" id="homeBtn" ></button>
         <?php
         $select_users = $conn->prepare("SELECT * FROM `user`");
         $select_users->execute();
         
         $select_users = $conn->prepare("SELECT * FROM `user`");
         if (isset($_GET['search_btn'])) {
            $search_box = $_GET['search_box'];
            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_users = $conn->prepare("SELECT * FROM `user` WHERE name LIKE '%$search_box%' OR email LIKE '%$search_box%' OR matricule LIKE '%$search_box%'");
            $result =  $select_users;
         }
         
         ?>
      </form>
      <div class="buttons">
      <center>
      <form method="post">
         <button class="fas fa-sort" style="cursor: pointer; margin: 12px;"  name="sort_general" id="sort">
         general_sort       
      </button>
      </form>
     </center>
      <center>
      <form method="post">
         <button class="fas fa-sort" style="cursor: pointer; margin: 12px;"  name="sort_department" id="sort">
         sort per department        
      </button>
      </form>
     </center>
      <center>
      <form method="post">
      <button class="fas fa-sort" style="cursor: pointer; margin: 12px;" name="sort_specialty" id="sort">
         sort per option
      </button>
      </form>
      </center>
      <center><form method="post">
      <button class="fas fa-sort" style="cursor: pointer; margin: 12px;" name="sort_level" id="sort">
         sort per level
      </button>
      </form>
      </center>
      <center><button class="fas fa-print" 
         id="print">
         Print Page
      </button>
      </center>
      <center><button class="fas fa-print" 
         id="prnt-std">
         Print Students form
      </button>
      </center>
      </div>
     
<br/>
<br/>
<div class="intro" id="intro" >
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
<h1 class="title" id="title-r"><u>REGISTRATION FOR PRIVATE ADMITTED STUDENTS OF 2023/2024 ACADEMIC YEAR DIPET I, DIPET II, DEPEN, DIPCO</u></h1>
<div class="" id="empty-page"></div>
   <!-- main -->
   <?php
// Check if the sort buttons is clicked
if (isset($_POST['sort_department'])) {
   $is_sortedBy = 'department';
   $select_users = $conn->prepare("SELECT * FROM `user` ORDER BY department");
   $select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_POST['sort_specialty'])) {
   $is_sortedBy = 'specialty';
   $select_users = $conn->prepare("SELECT * FROM `user` ORDER BY specialty");
   $select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_POST['sort_level'])) {
   $is_sortedBy = 'level';
   $select_users = $conn->prepare("SELECT * FROM `user` ORDER BY level");
   $select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_POST['sort_general'])) {
   // General sort
   $is_sortedBy1 = 'level';
   $is_sortedBy2 = 'specialty';
   $is_sortedBy3 = 'department';

   $select_users = $conn->prepare("SELECT * FROM `user` ORDER BY  level, specialty, department");
   $select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);
}
 else {
   $is_sortedBy = 'nothing';
   $select_users = $conn->prepare("SELECT * FROM `user`");
   $select_users->execute();
   $result = $select_users->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- HTML table structure -->
<table id="customers">
   <tr>
      <th>Matricule</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Date of Birth</th>
      <th>Place of Birth</th>
      <th>Department</th>
      <th>Option</th>
      <th>Level</th>
      <th>Award</th>
      <th>Email</th>
      <th>Number</th>
      <th>Language</th>
      <th>Academic Year</th>
      <th class='view'>Action </th>
   </tr>
   <?php
   if (isset($result) && count($result) > 0) {
      $prev_depart = 'nothing';
      $prev_depart1 = 'nothing';
      $prev_depart2 = 'nothing';
      foreach ($result as $fetch_users) {
         
         if($is_sortedBy == 'department' || $is_sortedBy == 'specialty' || $is_sortedBy == 'level'){
            $seperate_depart = $prev_depart == $fetch_users[$is_sortedBy] ? '': 'seperate-depart';
            if($seperate_depart != ''){
               $cur =  $fetch_users[$is_sortedBy];
               echo "<tr><td colspan='14'><h3 style='text-transform: capitalize;'>". $is_sortedBy . ": " .$cur ."</h3></td></tr>";
               // echo "<tr><td colspan='14'><h3 style='text-transform: capitalize;'>". $and . ": " .$fetch_users[$and] ."</h3></td></tr>";

            }
            echo "<tr class='$seperate_depart'>";

         } elseif ($is_sortedBy1 == 'level'){
            $seperate_depart1 = $prev_depart1 == $fetch_users[$is_sortedBy1] ? '': 'seperate-depart';
            $seperate_depart2 =  $prev_depart2 == $fetch_users[$is_sortedBy2] ? '': 'seperate-depart';
            if($seperate_depart1 != '' || $seperate_depart2 != ''){
               $cur1 =  $fetch_users[$is_sortedBy1];
               $cur2 =  $fetch_users[$is_sortedBy2];
               $cur3 =  $fetch_users[$is_sortedBy3];
               echo "<tr><td colspan='14'><h3 style='text-transform: capitalize;'>". $is_sortedBy1 . ": " .$cur1 ."</h3></td></tr>";
               echo "<tr><td colspan='14'><h3 style='text-transform: capitalize;'>". $is_sortedBy2 . ": " .$cur2 ."</h3></td></tr>";
               echo "<tr><td colspan='14'><h3 style='text-transform: capitalize;'>". $is_sortedBy3 . ": " .$cur3 ."</h3></td></tr>";
            }
            echo "<tr class='$seperate_depart1 $seperate_depart2'>";

         }
         else {
            echo "<tr>";
         }
         
            echo   "<td>". $fetch_users['matricule'] . "</td>
            <td>". $fetch_users['name'] ."</td>
            <td>". $fetch_users['gender'] ."</td>
            <td>". $fetch_users['dob'] ."</td>
            <td>". $fetch_users['pob'] ."</td>
            <td>". $fetch_users['department'] ."</td>
            <td>". $fetch_users['specialty'] ."</td>
            <td>". $fetch_users['level'] ."</td>
            <td>". $fetch_users['award'] ."</td>
            <td>". $fetch_users['email'] ."</td>
            <td>". $fetch_users['number'] ."</td>
            <td>". $fetch_users['language'] ."</td>
            <td>". $fetch_users['academic_year'] ."</td>
            <td class='view'><a href='student.php?mat=". $fetch_users['matricule'] ."'> view </a></td>

         </tr>";

            if($is_sortedBy == 'department'){
               $prev_depart = $fetch_users['department'];
            }else if($is_sortedBy == 'specialty'){
               $prev_depart = $fetch_users['specialty'];
            }else if($is_sortedBy == 'level'){
               $prev_depart = $fetch_users['level'];
            }else if($is_sortedBy1 == 'level' || $is_sortedBy2 == 'specialty'){
               $prev_depart1 = $fetch_users['level'];
               $prev_depart2 = $fetch_users['specialty'];
            }
         }
         
      } else {
         echo "<tr><td colspan='13'>No data found.</td></tr>";
      }
      ?>
   </table>
 <div class="prnt" id="prnts">
<?php
if (isset($result) && count($result) > 0) {
foreach ($result as $fetch_users) {
   echo '<section class="grid">
   <br/>
   <br/>
   <div class="intro">
   <div class="left">
   <p>UNIVERSITY OF BUEA
   <p>HIGHER TECHNICAL TEACHERS TRAINING COLLEGE</p>                                            
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
   </section>

   <div class="flex">
   <div class="head">
   <h3>Matricule:</h3>
   <h3>Name:</h3>
   <h3>Gender:</h3>
   <h3>Date of Birth:</h3>
   <h3>Place of Birth:</h3>
   <h3>Department:</h3>
   <h3>Specialty:</h3>
   <h3>Level:</h3>
   <h3>Award:</h3>
   <h3>Email:</h3>
   <h3>Number:</h3>
   <h3>Language:</h3>
   <h3>Academic Year:</h3>
   </div>
  
  
      
   <div class="data"> ';
            
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
   </div>
</div>";

echo '
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
</div>';

echo '<br><br><CEnter><footer>DIVISION OF TRAINING AND ORIENTATION HTTTC KUMBA</footer></CEnter>';
      }
   }
   ?>
  
</div>

</div>



   <!-- users section ends -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>
   <script>   // Add an event listener to the refresh button
          // Add an event listener to the home button
          document.getElementById('homeBtn').addEventListener('click', function() {
         // Set the desired home page URL
         var homePageUrl = "users.php";


         // Open the home page in a new tab or window
         window.location.href = homePageUrl;
      });
      
      let search = document.getElementById('search_box');

search.addEventListener('keydown', (e) => {
   let subBtn = document.getElementById('form');
   // subBtn.submit();
   console.log(subBtn);
}, false)

let prt = document.getElementById('print');
let prtStudent = document.getElementById('prnt-std')
let customers = document.getElementById('customers');
let prtn = document.getElementById('prnts');
let TRO = document.getElementById('intro');
let TTL = document.getElementById('title-r');
let emptyPage = document.getElementById('empty-page');

prt.addEventListener('click', (e) => {
   console.log(prtn)
   prtn.classList.add('show-prtn')
   window.print();
   prtn.classList.remove('show-prtn')

})

prtStudent.addEventListener('click', (e) => {
   console.log(customers);
   customers.classList.add('show-prtn')
   TRO.classList.add('show-prtn')
   TTL.classList.add('show-prtn')
   emptyPage.classList.add('empty-page');
   window.print();
   emptyPage.classList.remove('empty-page');
   customers.classList.remove('show-prtn')
   TTL.classList.remove('show-prtn')
   TRO.classList.remove('show-prtn')


})
      </script>

</body>
</html>
