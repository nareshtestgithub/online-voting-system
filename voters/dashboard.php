<?php
include "../Admin/inc/connection.php";
session_start();
if (!isset($_SESSION['User'])) {
  header('location:../hompage/login_page.php');
}

$select = "SELECT fullname, phone FROM users WHERE id = " . $_SESSION['id']; // 'id' is the column name in users table
$result = mysqli_query($conn, $select);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $fullname = $row['fullname'];
  $phone = $row['phone'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Custom CSS -->

  <link rel="stylesheet" href="../cssfolder/dashboard.css">
  <!-- For icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
  <div class="grid-container">
    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>


      <div class="class-right">

        <h1>Welcome- <smaLL>
            <?php echo $_SESSION['User'] ?>
          </smaLL></h1>

      </div>
      <div class="class-left">
    
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined"><a href="dashboard.html">how_to_vote</a></span> Go Vote
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="dashboard.php">
            <span class="material-icons-outlined">home</span> Home
        </li></a>
        <li class="sidebar-list-item">
          <a href="votenow.php"> <span class="material-icons-outlined">event</span> election Avaliable
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="logut.php">
            <span class="material-icons-outlined">account_circle</span>
          </a>
          Logout
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->
    <main class="main-container">


      <div class="main-cards" style="margin-left: 130px;">

        <div class="card">
          <div class="card-inner">
            <h2 class="text-primary font-weight-bold">Your details</h2>
            <span class="material-icons-outlined text-blue">groups</span>
          </div>
          <span class="text-primary font-weight-bold">
            Fullanme:
            <?php echo $fullname; ?>
          </span>
          <span class="text-primary font-weight-bold" style="margin-top: 12px;">phone:
            <?php echo $phone; ?>
          </span>
        </div>




      </div>

    </main>

    <div>

      <div>



        <!-- End Main -->

        <!-- Custom JS -->
        <script src="../assets/js/dashobrd.js"></script>
        <script src="../assets/js/first.js"></script>
        <script src="../assets/js/drop_down.js"></script>
        <script src="abcd.js"></script>
      </div>
</body>

</html>