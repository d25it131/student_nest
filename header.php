<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>StudentNest - <?php echo isset($page_title)?$page_title:'Home'; ?></title>
  <link rel="stylesheet" href="styles.css">
  <script defer src="/assets/js/scripts.js"></script>
</head>
<body>
<header class="site-header">
  <div class="container">
    <a class="brand" href="/index.php">StudentNest</a>
    <nav class="nav">
      <a href="/index.php">Home</a>
      <a href="/about.php">About</a>
      <a href="/courses.php">Courses</a>
      <a href="/services.php">Services</a>
      <a href="/blog.php">Blog</a>
      <a href="/faq.php">FAQ</a>
      <a href="/contact.php">Contact</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a href="/dashboard.php">Dashboard</a>
        <a href="/logout.php">Logout</a>
      <?php else: ?>
        <a href="/register.php">Register</a>
        <a href="/login.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
<main class="container">