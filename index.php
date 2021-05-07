<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <?php
        function recupClasse($classe){
            require('classes/'.$classe.'.php');
        }
        spl_autoload_register('recupClasse');

        try{
            $pdo = new PDO('mysql:host=localhost;dbname=bibliothèque;charset=utf8', 'root', '');
        }
        catch(Exception $erreur){
            echo 'ERREUR lors de la co. à la BDD : '. $erreur->getMessage();
        }


        $lm = new LivreManager($pdo);
        var_dump($lm->selectionner(1));
        echo "<br> <br> <br>";

        $l1 = new Livre(1, "Les Fleurs du Mal", "Baudelaire", "Poésie", "123456789", '25-06-1857', Livre::FORMAT_POCHE, 8.70, "Gallimard", "images/TOUT_JS.jpg");
        $l1->hydrate($lm->selectionner(1));
        var_dump($l1);
        $l2 = new Livre(1, "Voyage au bout de la Nuit", "Céline", "Roman", "123456789", '25-06-1932', Livre::FORMAT_POCHE, 8.70, "Gallimard", "images/TOUT_JS.jpg");
        
        $livres = array($l1, $l1, $l1, $l1, $l1, $l1, $l1, $l1, $l1, $l1, $l1, $l1);

        // var_dump($livres);
        ?>
        <div class="container">
        <div class="title mt-5 mb-4">
            <h1>Liste des livres</h1> 
        </div>
        <div class="row g-2">
            <?php
            foreach ($livres as $livre) {
                ?>
                    <div class="col-6 mb-1" style="width: 100px;">
                        <div class="p-3 border bg-light" style="display: flex;">
                        <div style="margin-right: 100px;">
                                <img style="width: 200px; object-fit: cover; height: 200px;" class="d-flex align-self-start img-fluid" src="<?php echo $livre->getImage()?>">
                            </div>
                            <div style="margin-top : 30px;">
                                <h4><?php echo $livre->getTitre()?></h4>
                                <p> <?php echo $livre->getAuteur()?> </p>
                                <p> <?php echo $livre->getFpoche() ?> </p>
                                <p> Prix : <?php echo $livre->getPrix() ?> </p>
                                <p><a href="<?php echo $livre->getImage()?>">Détails</a></p>
                            </div> 
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
