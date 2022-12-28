<?php


require('../connection.php');



$query = "DELETE FROM transakcije WHERE id=" . $_POST['transakcija_id'];
$db_conn->query($query);
