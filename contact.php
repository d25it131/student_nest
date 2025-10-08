<?php
$page_title='Contact';
include 'header.php';
$sent=false; $errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name'] ?? '');
  $email=trim($_POST['email'] ?? '');
  $message=trim($_POST['message'] ?? '');
  if(!$name||!$email||!$message) $errors[]='All fields required.';
  if(empty($errors)){
    $file='messages.json';
    $msgs=json_decode(file_get_contents($file), true) ?: [];
    $msgs[]=['id'=>time(),'name'=>$name,'email'=>$email,'message'=>$message];
    file_put_contents($file,json_encode($msgs,JSON_PRETTY_PRINT));
    $sent=true;
  }
}
?>
<div class="card">
  <h2>Contact Us</h2>
  <?php if($sent): ?><div class="small" style="color:green">Message sent. We'll get back to you.</div><?php endif; ?>
  <?php if($errors): foreach($errors as $e): ?><div class="small" style="color:#c00"><?php echo $e; ?></div><?php endforeach; endif; ?>
  <form method="post" action="/contact.php" data-ajax="true" data-reset-on-success="true">
    <div class="form-group"><input name="name" placeholder="Your name" required></div>
    <div class="form-group"><input name="email" type="email" placeholder="Your email" required></div>
    <div class="form-group"><textarea name="message" placeholder="Message" rows="5" required></textarea></div>
    <button>Send</button>
  </form>
</div>
<?php include 'footer.php'; ?>