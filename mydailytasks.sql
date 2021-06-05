<!-- Création de la base de donnée -->

CREATE DATABASE IF NOT EXISTS timetracking;
USE timetracking;

CREATE TABLE tasks(
    task_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    task_name VARCHAR(200) NOT NULL,
    task_duration FLOAT NOT NULL,
    task_date DATETIME NOT NULL,
    task_finished BOOLEAN
);

INSERT INTO tasks VALUE 
    (NULL, "Faire la vaiselle", 12, "2021-09-06", 0),
    (NULL, "Passer la tondeuse", 69, "2021-05-06", 1),
    (NULL, "Acheter une voiture", 420, "2021-10-06", 0);