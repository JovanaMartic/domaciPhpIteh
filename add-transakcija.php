<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="body-index">

        <h3 id="login-heading">TRANSAKCIJA</h3>

        <form method="POST" id="form">
            <div class="login-username">
                <span>Datum: </span>
                <input type="text" name="datum" class="form-control">
            </div>
            <div class="login-username">
                <span>Tip: </span>
                <input type="text" name="tip" class="form-control">
            </div>
            <div class="login-username">
                <span>Valuta: </span>
                <input type="text" name="valuta" class="form-control">
            </div>
            <div class="login-username">
                <span>Iznos: </span>
                <input type="text" name="iznos" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="addbutton" id="addbutton">ADD</button>
        </form>

    </div>



    <?php
    require 'klase/Transakcija.php';


    if (isset($_POST['addbutton'])) {
        $transakcija = new Transakcija(null, null, null, null, null, null);
        $transakcija->addTransakcija($_POST['datum'], $_POST['tip'], $_POST['valuta'], $_POST['iznos'], $_COOKIE['user']);
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>