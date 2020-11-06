<?php

?>  
<header>
<nav>

    <ul>
      <li><a class="active" href="index.php?page=home">Home</a></li>


      <?php

      $response = $database->query("SELECT * FROM `quizz` ");

      while ($result = $response->fetch()) {
      ?>
        <li><a href="index.php?page=quizz&quizz_id=<?php echo $result['quizz_id']?>"><?php echo ($result['quizz_name']); ?></a></li>

      <?php   }
      $response->closeCursor() ;
      ?>
      <li><a href="index.php?page=account_page">Login</a></li>
    </ul>
  </nav>
</header>