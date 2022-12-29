<?php


require('../connection.php');



$query = "SELECT * FROM transakcije WHERE datum LIKE '%" . $_POST['datum'] . "%' AND user_id=" . $_POST['user_id'] .
    " ORDER BY iznos " . $_POST['sortiranje'];
$transakcije = $db_conn->query($query);


while ($transakcija = mysqli_fetch_array($transakcije)) {
?>
    <tr class="text-center">
        <td><?php echo $transakcija['datum']; ?></td>
        <td><?php echo $transakcija['tip'];  ?></td>
        <td><?php echo $transakcija['valuta'];  ?></td>
        <td><?php echo $transakcija['iznos'];  ?></td>
        <td><button id="delete_transakcijabutton" class="btn btn-dark" transakcija_id="<?php echo $transakcija['id']; ?>">Delete</button></td>
    </tr>
<?php
}
?>