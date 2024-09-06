<?php

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
    // dichiaro un array per il filtraggio
    $filteredHotels = $hotels;
    // verifico l'esistenza della variabile relativa al parcheggio e se è diversa da stringa vuota
    if (isset($_GET['parking']) && $_GET['parking'] != '') {
        // dichiaro una variabile temporanea per gli hotels
        $tempHotels = [];
        // ciclo gli hotels
        foreach($hotels as $hotel) {
            // verifico che l'hotel abbia il parcheggio in base al valore selezionato dall'utente
            if ($_GET['parking'] == $hotel['parking']) {
                // se è vera la condizione inserisco l'hotel nell'array temporaneo
                $tempHotels [] = $hotel;
            }
        }
        // assegno il valore contenuto nell'array temporaneo alla variabile filteredHotels
        $filteredHotels = $tempHotels;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">BoolHotels</h1>
            </div>        
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <form action="./bonus.php" method="GET">
                    <div class="row">
                        <div class="col-5">
                            <select name="parking" id="parking" class="form-select form-select-sm">
                                <option value="">Parcheggio</option>
                                <option value="0" <?php echo (isset($_GET['parking']) && $_GET['parking'] == 0) ? 'selected' : ''; ?> >No</option>
                                <option value="1" <?php echo (isset($_GET['parking']) && $_GET['parking'] == 1) ? 'selected' : ''; ?> >Sì</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control form-control-sm" name="vote" placeholder="voto">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-sm btn-primary">Cerca</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h1 class="text-center">PHP Hotel</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Parcheggio</th>
                            <th>Voto</th>
                            <th>Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($filteredHotels as $hotel) { ?>
                            <tr>
                                <td>
                                    <?php echo $hotel['name']; ?>
                                </td>
                                <td>
                                    <?php 
                                        echo str_replace('Descrizione', '', $hotel['description']);
                                    ?>
                                </td>
                                <td>
                                    <?php echo $hotel['parking'] ? 'Sì' : 'No'; ?>
                                </td>
                                <td>
                                    <?php echo $hotel['vote']; ?>
                                </td>
                                <td>
                                    <?php echo $hotel['distance_to_center']; ?> Km
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>