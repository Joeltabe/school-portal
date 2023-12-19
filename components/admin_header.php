<header class="header">

   <div id="close-btn"><i class="fas fa-times"></i></div>

   <a href="dashboard.php" class="logo">AdminPanel.</a>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="users.php"><i class="fas fa-user"></i><span>students</span></a>
      <a href="add_dpt.php"><i class="fas fa-building"></i><span>add departments</span></a>
      <a href="add_sp.php"><i class="fas fa-book"></i><span>add option</span></a>
   </nav>

   <a href="update.php" class="btn">update account</a>
   <div class="flex-btn">
      <a href="login.php" class="option-btn">login</a>
   </div>
   <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn"><i class="fas fa-right-from-bracket"></i><span>logout</span></a>

</header>

<div id="menu-btn" class="fas fa-bars" onclick="myFunction()"></div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
   // Code that depends on the DOM being fully loaded
   let header = document.querySelector('.header');

   document.querySelector('#menu-btn').onclick = () => {
       header.classList.add('active');
   }

   document.querySelector('#close-btn').onclick = () => {
       header.classList.remove('active');
   }

   window.onscroll = () => {
       header.classList.remove('active');
   }

   document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
       inputNumber.oninput = () => {
           if (inputNumber.value.length > inputNumber.maxLength) {
               inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
           }
       }
   });
});
</script>