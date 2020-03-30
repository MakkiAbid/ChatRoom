<?php

  include "config.php";
  include "includes/header.php";

?>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <strong class="display-4">ChatRoom</strong>
          <p class="h3 mt-3">Hi, <?= $_SESSION['full_name'] ?></p>
        </div>
        <div id="chat-body" class="card-body bg-grey-100" style="height: 400px; overflow-y: scroll;">
          
        </div>
        <div class="card-footer">
          <input id="message" data-username="<?php echo $_SESSION['full_name'] ?>" name="message" class="form-control" placeholder="Type Your Message..." type="text">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(function(){

    setInterval(function(){
      $.get("getChat.php", function(data){
        $("#chat-body").html(data);
        $("#chat-body").animate({ scrollTop: $('#chat-body').prop("scrollHeight")}, 1000);
      });
    }, 500);


    $("#message").on("keyup", function(e){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == "13"){
        var message = $(this).val();
        var user = $(this).attr("data-username");
        if(message != ""){
          $.post("send.php",{
           "message": message,
           "user": user 
          }, function(data){
            $("#message").val("");
            console.log(data);
          })
        }else {
          alert("Please Enter Your Message!");
        }
      }
    });
  });
</script>

<?php include "includes/footer.php"; ?>