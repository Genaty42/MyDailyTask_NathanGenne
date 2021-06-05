<!-- Edition et suppression des taches -->

<?php
include('functions.php');
function recupId() {
    return db_connect()->query('SELECT * FROM tasks WHERE task_id = '. $_GET["id"].';')->fetch();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de la tâche numéro <?=$_GET["id"]?></title>
</head>
<body>
    <form method="post" action="">
    <?php $task = recupId(); ?>

        <label for="nom">nom de la tâche</label>
        <input type="text" value="<?=$task["task_name"] ?>" name="nom" id="nom">

        <label for="duree">durée de de la tâche</label>
        <input type="number" value="<?=$task["task_duration"] ?>" name="duree" id="duree">

        <label for="date">date de la tâche</label>
        <input type="date" value="<?= date("Y-m-d", strtotime($task["task_date"])); ?>" name="date" id="date">

        <label for="status">status</label>
        <input type="checkbox" <?php if($task["task_finished"]) {echo "checked";}?> name="status" id="status">
    
        <input type="submit" value="modifier">
        
    </form>
    <button type="button"> <a href="./">retour à la liste</a></button>
</body>
</html>

<?php
    if ( isset($_POST['nom']) ){
        if ($_POST['status']=='on'){$_POST['status']=1;}
        else {$_POST['status']=0;}
        $data=[
            'nom'=>$_POST['nom'],
            'duree'=>$_POST['duree'],
            'date'=>$_POST['date'],
            'status'=>$_POST['status'],
            'id'=>$_GET['id']
        ];
        edit_task($data);
        header('Location: ./');
    }
?>