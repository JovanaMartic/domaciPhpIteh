<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <input type="hidden" value="">

    <div class="body-transakcije">

        <h3 id="transakcije-heading">TRANSAKCIJE</h3>
        <a href="add-transakcija.php"><button class="btn btn-dark" id="buttonadd">ADD</button></a>

        <input type="text" placeholder="Datum" id="datum_input" class="form-control">

        <div class="table-transakcije">
            <table class="table table-bordered border-info table-striped mt-3">
                <thead>
                    <tr class="text-center table-info">
                        <th>DATUM</th>
                        <th>TIP</th>
                        <th>VALUTA</th>
                        <th>IZNOS</th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody class="text-center" id="body_tabela">

                    <?php
                    require('connection.php');

                    $user = $_COOKIE['user'];
                    $query = "SELECT * FROM transakcije WHERE transakcije.user_id='" . $user . "'";
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

                </tbody>

            </table>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        document.cookie = "user = " + localStorage.user

        if (window.localStorage) {
            if (!localStorage.getItem('firstLoad')) {
                localStorage['firstLoad'] = true;
                window.location.reload();
            } else
                localStorage.removeItem('firstLoad');
        }
    });
</script>