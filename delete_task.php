<?php
include('functions.php');
delete_task($_GET['id']);
header('Location: ./');
?>