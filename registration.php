<?php
include 'inc/users.php';

$user = new Users;
if (isset($_POST['signup'])) {
  $res = $user->insert_user($_POST);
  if ($res) {
    echo "Successfully added!</br></br>";
  }else{
    echo "Fail to add user!</br></br>";
  }
}
?>
<style type="text/css">
    
</style>
<!-- Sign Up -->

      <!-- body (form)-->
      <div class="modal-body">
        <form role="form" name="registrationform" id="registrationform" method="post">
          <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" name="user[fname]" placeholder="First Name" required>
            </div>

           <div class="form-group">
             <label>Last Name:</label>
             <input type="text" class="form-control" name="user[lname]" placeholder="Last Name" required>
            </div>

          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="user[email_address]" placeholder="Email Address" required>
            </div>

          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="user[username]" placeholder="Username" required>
            </div>

          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="password form-control" name="user[password]" placeholder="Password" required>
            </div>

          <div class="form-group">
            <label>Contact Number:</label>
            <input type="text" class="numbersonly form-control" name="user[cont_no]" placeholder="Contact Number" maxlength="10" required>
            </div>

          <div class="form-group">
            <label>Type:</label>
            <select class="form-control" name="user[type]" required>
              <option value ="0">-Please select-</option>
              <option value ="1">ADMIN</option>
              <option value ="2">OWNER</option>
              <option value ="3">STAFF</option>
              <option value ="4">STUDENT</option>
              <option value ="5">FACULTY/EMPLOYEE</option>
              

            </select>
          </div>
      <!-- button footer -->
      <div class="modal-footer">
        <button type="submit" name="signup" class="btn btn-primary btn-block">Sign up!</button>
      </div>

    </form>   
  </div>

<!-- end of sign up -->



    <!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           
          <div class="mu-footer-copyright">
            <p>&copy; FoodEx Team, University of San Carlos | <a href="foodex@gmail.com"> foodex@gmail.com </a></p>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  </body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('#registrationform').submit(function(){
      var value = $('.password').val();
      if (!value || value != '') {
        return false;
      }
    });
    $('.numbersonly').keydown(function () { 
      if ( event.keyCode == 46 || event.keyCode == 8 ) {
      }
      else {
        if (event.keyCode < 48 || event.keyCode > 57 ) {
            event.preventDefault(); 
        }   
      }
    });
  </script>
</html>