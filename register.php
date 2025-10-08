<?php
$page_title='Register';
include 'header.php';
$errors=[]; $success='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name'] ?? '');
  $email=trim($_POST['email'] ?? '');
  $pass=$_POST['password'] ?? '';
  if(!$name||!$email||!$pass) $errors[]='All fields are required.';
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[]='Invalid email.';
  if(empty($errors)){
    $file='data/users.json';
    $users = json_decode(file_get_contents($file), true) ?: [];
    foreach($users as $u) if($u['email']===$email) $errors[]='Email already registered.';
    if(empty($errors)){
      $users[]=['id'=>time(),'name'=>$name,'email'=>$email,'password'=>password_hash($pass,PASSWORD_DEFAULT)];
      file_put_contents($file,json_encode($users,JSON_PRETTY_PRINT));
      $success='Registration complete. You can now login.';
    }
  }
}
?>
<div class="card">
  <h2>Register</h2>
  <?php if($errors): foreach($errors as $e): ?><div class="small" style="color:#c00"><?php echo htmlspecialchars($e); ?></div><?php endforeach; endif; ?>
  <?php if($success): ?><div class="small" style="color:green"><?php echo $success; ?></div><?php endif; ?>
  <form method="post" action="/register.php">
    <div class="form-group"><input name="name" placeholder="Full name" required></div>
    <div class="form-group"><input name="email" type="email" placeholder="Email" required></div>
    <div class="form-group"><input name="password" type="password" placeholder="Password" required></div>
    <button>Register</button>
  </form>
</div>
<?php include 'footer.php'; ?>