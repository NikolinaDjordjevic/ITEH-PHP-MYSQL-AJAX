<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stil.css">
</head>

<body>

    <img src="https://www.insidesport.in/wp-content/uploads/2022/04/byersandco-wimbledon-1594393920819.jpg" alt="" id="w-pocetna">

    <?php
    include 'navbar.php';
    ?>

    <h1 id="rezter-tekst">REZERVISANI TRENING TERMINI</h1>

    <table class="table table-bordered table-light border border-2 border-dark text-center" id="trez">
        <thead>
            <tr>
                <th kolona="datum" sort="asc">Datum</th>
                <th kolona="vreme" sort="asc">Vreme</th>
                <th kolona="naziv" sort="asc">Naziv terena</th>
                <th kolona="lokacija" sort="asc">Lokacija terena</th>
                <th kolona="trajanje" sort="asc">Trajanje</th>
                <th kolona="ime" sort="asc">Teniser</th>
                <th kolona="edit" sort="asc">EDIT-DELETE</th>
            </tr>
        </thead>

        <tbody id="bdy">
            <?php

            $konekcija = new mysqli("localhost", "root", "", "trening");
            $sql = "SELECT trening.id, trening.datum, trening.vreme, teren.naziv, teren.lokacija, trening.trajanje, teniser.ime, teniser.prezime 
            FROM trening JOIN teren ON trening.teren_id=teren.id 
            JOIN teniser ON trening.teniser_id = teniser.id";

            $rezultat = $konekcija->query($sql);

            while ($t = mysqli_fetch_array($rezultat)) {
            ?>
                <tr>
                    <td><?php echo $t['datum'];  ?></td>
                    <td><?php echo $t['vreme'];  ?></td>
                    <td><?php echo $t['naziv'];  ?></td>
                    <td><?php echo $t['lokacija'];  ?></td>
                    <td><?php echo $t['trajanje'];  ?></td>
                    <td><?php echo $t['ime'] . " " . $t['prezime'];  ?></td>
                    <td>
                        <a href="editTrening.php?IDTRENING=<?php echo $t['id']; ?>"><button class="btn btn-success" id="biz">EDIT</button></a>
                        <a href="deleteTrening.php?IDTRENING=<?php echo $t['id']; ?>"><button class="btn btn-success" id="dd">DELETE</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js.js"></script>

</body>

</html>