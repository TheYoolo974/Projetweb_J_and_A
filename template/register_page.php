<!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../static/css/styles.css">
  
</head>

<body>
<?php include("template/header.php"); ?>
<section class="registercontent0">
<p><font color="white">Please enter the following information : </font></p>
</section>
    <section class="registercontent1">  
    <form  action="index.php?page=login_page.php" method="post">

        <div class="container">
          <label for="firstname"><b>First Name</b></label>
          <input type="text" placeholder="Enter firstname" name="firstname" required>
          <br>

          <label for="Lastname"><b>Lastname</b></label>
          <input type="text" placeholder="Enter Lastname" name="Lastname" required>
          <br>

          <label for="Address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="Address" required>
          <br>

          <label for="Phone"><b>Phone</b></label>
          <input type="text" placeholder="Enter Phone" name="Phone" required>
          <br>

          <label for="Birthdate"><b>Birthdate</b></label>
          <input type="text" placeholder="Enter Birthdate" name="Birthdate" required>
          <br>


          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
 
            
          <input type="submit" name="submit">
        
        </div>
      </form>
      </section>
      <?php include('template/footer.php'); ?>
  </body>
  </html>
  





