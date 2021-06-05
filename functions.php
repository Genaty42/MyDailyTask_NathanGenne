<!-- Regroupement des différentes fonctions -->

<?php

function db_connect(){
    include("config.php");
    try{
    return $PDO = new PDO($hostdb, $user, $password);
    } catch (PDOException $e){
        echo 'erreur! : ' .$e->getMessage();
        die();
    }
}

function get_tasks_list(){
    return db_connect()->query("SELECT * FROM tasks ORDER BY task_date DESC;");
}

function edit_task($data) {
    db_connect()->prepare("UPDATE tasks SET task_name=:nom, task_duration=:duree, task_date=:date, task_finished=:status WHERE task_id = :id;")->execute($data);
}

function create_task($data) {
    db_connect()->prepare("INSERT INTO tasks VALUES ( NULL, :nom, :duree, :date, 0 );")->execute($data);
}

function delete_task($id) {
    db_connect()->prepare("DELETE FROM tasks WHERE task_id = $id;")->execute();
}

function nbTachesRealisees(){
    return db_connect()->query("SELECT COUNT(task_finished) FROM tasks WHERE task_finished=1;")->fetch();
}

function nbTachesEnCours(){
    return db_connect()->query("SELECT COUNT(task_finished) FROM tasks WHERE task_finished=0;")->fetch();
}

function dureeTotale(){
    return db_connect()->query("SELECT SUM(task_duration) FROM tasks WHERE task_finished=1;")->fetch();
}
?>