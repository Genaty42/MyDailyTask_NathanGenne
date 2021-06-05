<!-- Fonctionnalités de la page -->
<?php
include('functions.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MyDailyTask</title>
</head>
<body>
    <div id="contain">
        <div id="left_contain">
            <h1 id="title">myDailyTask</h1>
            <div id="task_new"><button type="button"> <a href="create_task.php">nouvelle tâche</a></button></div>
            <table>
                <thead>
                    <th>nom de la tâche</th>
                    <th>durée de la tâche</th>
                    <th>date de la tâche</th>
                    <th>status</th>
                    <th>actions</th>
                    
                </thead>
                <tbody>
                    <?php
                        foreach(get_tasks_list() as $row){
                            $status="en cours";
                            if($row['task_finished']){$status="validé";}
                            echo '<tr>';
                            echo '<td> '.$row['task_name'].'</td>';
                            echo '<td> '.$row['task_duration'].'</td>';
                            echo '<td> '.date("d/m/Y", strtotime($row["task_date"])).'</td>';
                            echo '<td> '.$status.'</td>';
                            echo '<td> <button type="button"> <a href="edit_task.php?id='.$row['task_id'].'">modifier</a></button>';
                            echo '<button type="button"> <a href="delete_task.php?id='.$row['task_id'].'">supprimer</a></button> </td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="right_contain">
            <?= "Durée total des tâches réalisées : ".dureeTotale()[0]; ?>

            <canvas id="myChart" width="200" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
    <script>
        var data1=<?= json_encode(nbTachesRealisees()[0]); ?>;
        var data2=<?= json_encode(nbTachesEnCours()[0]); ?>;
    </script>
    <script src="assets/js/canvas.js"></script>
</body>
</html>
