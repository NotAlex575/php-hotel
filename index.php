<!DOCTYPE html>

<?php
    $isParking;
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<style>

table{
    width: 100%;
}

.central{
    display: flex;
    justify-content: center;
}
form{
    text-align: center;
    margin-bottom: 50px;
    width: 40%;
}

form button{
    margin-top: 10px;
}
table, form, th, td {
  border:1px solid black;
}
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="central">Lista Hotel</h1>

    <div class="central">
        <form action="index.php" method="get">
            <label for="off">With parking?</label>
            <input name="isParking" type="checkbox" value="1"><br>
            <button type="submit">Filtra</button>
        </form>
    </div>

    <table>
        <!--CREAZIONE NOMI COLONNE TABELLE TRAMITE USO DEI NOMI DELLE KEY NELL'ARRAY-->
        <!--
        <tr>
            <?php 
                /*
                foreach($hotels[0] as $key => $value){
                    echo "<th>". $key ."</th>";
                }
                */
            ?>
        </tr>
        -->

        <!--CREAZIONE NOMI COLONNE TABELLE-->
 

        <tr>
            <th>Hotel Name</th>
            <th>Description</th>
            <th>Parking</th>
            <th>Vote</th>
            <th>Distance to center</th>
        </tr>

        <?php
            //CHECK PER VEDERE SE PARCHEGGIO E TRUE O FALSE
            $isParking = $_GET["isParking"] ?? 0;
            echo $isParking;
            foreach($hotels as $hotel){
                //CONDIZIONE IS PARKING
                if($isParking == 1 && $hotel["parking"]){
                    echo "<tr>";
                    foreach($hotel as $key => $value){
                        if(is_bool($value)){
                            $value = $value ? "Si" : "No";
                        }
                        echo "<td>". $value ."</td>";
                    }
                    echo "</tr>";
                }
                else if($isParking === 0){
                    foreach($hotel as $key => $value){
                        if(is_bool($value)){
                            $value = $value ? "Si" : "No";
                        }
                        echo "<td>". $value ."</td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>