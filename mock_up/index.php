<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz index</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <link rel="stylesheet" href="./static/css/accountv2.css">
</head>
<body>
    <?php include("template/header.php"); ?>

    
    <?php 
    if (isset($_GET['page'])) {
        include("template/quizz.php");
    } else {
        include("template/home.php");
    }
    
    include('template/footer.php'); ?>
</body>
</html>