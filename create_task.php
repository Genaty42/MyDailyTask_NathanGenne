<?php include('functions.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'une nouvelle tâche'</title>
</head>
<body>
    <form method="post" action="">

        <label for="nom">nom de la tâche</label>
        <input type="text" name="nom" id="nom">

        <label for="duree">durée de de la tâche</label>
        <input type="number" name="duree" id="duree">

        <label for="date">date de la tâche</label>
        <input type="date" name="date" id="date">
    
        <input type="submit" value="créer">
        
    </form>
    <button type="button"> <a href="./">retour à la liste</a></button>
</body>
</html>

<?php
    if ( isset($_POST['nom']) ){
        $data=[
            'nom'=>$_POST['nom'],
            'duree'=>$_POST['duree'],
            'date'=>$_POST['date'],
        ];
        create_task($data);
        header('Location: ./');
    }
?>