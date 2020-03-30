<?php
  
  
  include "config.php";
  include "includes/header.php";

  if(isset($_POST['submit'])) {

    if(!empty($_POST['full_name'])) {
      if(preg_match('/^[a-zA-Z ]+$/', $_POST['full_name'])) {
        $_SESSION['full_name'] = $_POST['full_name'];
        header("Location: chat.php");
      }else {
        $full_name_error = "Only Alphabets are Allowed!";
      }
    }else {
      $full_name_error = "Field Cannot Be Empty!";
    }

  }//main if ends here

?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <strong class="display-4">ChatRoom</strong>
          <p class="h3 mt-3">Login</p>
        </div>
        <div class="card-body bg-grey-100">
          <form action="" method="POST">
            <div class="form-group">
              <label for="name">Enter Your Name</label>
              <input type="text" class="form-control <?= (!empty($full_name_error)) ? "is-invalid" : "" ?>" name="full_name" placeholder="Your Name">
              <?php if(!empty($full_name_error)): ?>
                <p class="invalid-feedback"><?= $full_name_error; ?></p>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




<?php include "includes/footer.php"; ?>