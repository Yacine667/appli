

<?php

    session_start();    
    require ('function.php');
    require('db_functions.php');
    $products = findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit En Base De Données</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id=gen>

        <div class="container-fluid">

            <div class="container">

                <nav class="navbar navbar-expand-md navbar-light ">

                <a class="navbar-brand" href="http://localhost/appli/index.php">Ajout De Produit |</a>

                <a class="navbar-brand" href="http://localhost/appli/recap.php">|  Récapitulatif Des Produits</a>

                <a class="navbar-brand" href="http://localhost/appli/recap.php"><i class="fa-solid fa-basket-shopping"></i></a>
                <?php 

                    if (empty ($_SESSION['products'])){
                        echo "Vide";
                    }

                    else {
                        echo addpanier();
                    };               
                
                ?>

                <a class="navbar-brand" href="traitement.php?action=viderPanier"><i class="fa-regular fa-trash-can"></i></a>

                </nav>

    

                <h1>Ajouter un produit en base de données</h1>

                <form action="traitement.php?action=ajouterProduitBdd" method="post">
                    <p>
                        <label>
                            Nom du produit :
                            <input type="text" class="form-control form-control-lg mb-3 shadow-lg" name="name">
                        </label>
                    </p>

                    <label> 
                        Description du produit :
                        <textarea class="form-control form-control-lg mb-3 shadow-lg" name="description" cols="24" rows="4"></textarea>
                    </label>

                    <p>            
                        <label>
                            Prix du produit :
                            <input type="number" min="0.01" class="form-control form-control-lg mb-3 shadow-lg" step="any" name="price">
                        </label>
                    </p>

                    <p>
                        <input class="btn btn-primary mb-2 shadow-lg" type="submit" name="submit" value="Ajouter le produit">
                    </p>
                </form>

                
            <div><?php  echo afficherMessage(); unset($_SESSION['messages']);?></div>
        

        <h1 class="text-center" >Produits présents en base de donées</h1>
        <table class='table table-light table-hover'>
                <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>

    <?php 
                foreach ($products as $product) {
    
                $id= $product['id'];       

                        echo
                        "
                        <td><a href='product.php?id=$id'>". $product['name']." </a></td>"?>

                        <td><?php echo $product['description'] ?></td>

                        <td><strong><p><?php echo $product['price'] ?>€</p></strong></td>
        
                        <td><?php echo "<a href='traitement.php?action=deleteProductBdd&id=$id'>Supprimer produit de la base de données</a>"?></td>

                    </tr>       
                </tbody
            </table>

        
    <?php
    }


?>
            </div>
        </div>
    </div>
</body>

</html>