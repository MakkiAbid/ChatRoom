<?php 

	include "config.php";

$query = mysqli_query($conn, "SELECT * FROM messages");


while($message = mysqli_fetch_assoc($query)):
?>



<div class="card mb-2">
<div class="card-body">
  <div class="card-subtitle">
    <b><?= $message['full_name'] ?></b>
  </div>
  <?= $message['message'] ?>
</div>
</div>

<?php endwhile; ?>