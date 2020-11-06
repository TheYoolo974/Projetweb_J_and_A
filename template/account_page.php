 <!Doctype html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../static/css/styles.css">
  
</head>

<body>
<?php include("template/header.php"); ?>
    <section>
    
    <form  action="index.php?page=account_page.php" method="post">
        <div class="container">
          <label for="lastname"><b>first Name</b></label>
          <input type="text" placeholder="Enter Username" name="lastname" required>
          <br>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <br>

          <input type="submit" name="submit">
        
        </div>
      </form>
      <section>
      <?php include('template/footer.php'); ?>
  </body>
  </html>
  





