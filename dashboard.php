<?php
$page_title='Dashboard';
include 'header.php';
if(!isset($_SESSION['user'])){ header('Location:login.php'); exit; }
$user = $_SESSION['user'];
?>
<div class="card">
  <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
  <p class="small">Email: <?php echo htmlspecialchars($user['email']); ?></p>
  <p>Quick links:</p>
  <ul>
    <li><a href="/courses.php">View Courses</a></li>
    <li><a href="/contact.php">Contact Support</a></li>
  </ul>
</div>
<?php include 'footer.php'; ?>