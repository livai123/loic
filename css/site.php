
<html lang="fr">
  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body class="bg-dark text-white">
    <div class="row container-fluid"> 
        <div  class="col-sm-8 ">
          

          <p > la bibliothèque de Moulisard est fermé au public jusqu'a nouvel ordre.Mais il vous est posssible de reserve et retirez vos livres via notre biblotheque en ligne </p>  
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark  ">     
            
              
              <br> <br>
                    <nav class="navbar navbar-dark bg-dark">
                        <form action="listes_livres.php" class="form-inline">
                            <!-- permet d'ajouter des boutons et autre s -->
                            <input type="text" class="form-control" placeholder="livre recherche dans le catalogue (nom de l'auteur)" aria-label="Username"
                                aria-describedby="basic-addon1" size="70%" name="recherche">
                            <button class="btn btn-out " type="submit" name="bouton">
                                <!-- button + image loupe  qui marche pas-->
                                <i class="glyphicon glyphicon-search"></i>
                            

                        </form>
                    </nav>
    </h1>

            </form>
               
           
  
            </nav>  
        </div> 
      <div class="col-sm-4">
        <img src="image/30.png" class="img-rounded" width="80%" heigth="100%"margin-left=60px  alt="la  Bibliothèque de Moulinsart">
     </div>
    </div class="container text-center">
        <div class="row">
            <div class="col-sm-6">
        
     <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
      
        <!-- The slideshow/carousel -->
        div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/dune.jpg" alt="dune" class="d-block w-100" width="80%" heigth="60%"margin-left=40px>
    </div>
    <div class="carousel-item">
      <img src="image/712t-Sis-sL.jpg" alt="Eiji" class="d-block w-100" width="80%" heigth="60%"margin-left=40px>
    </div>
    <div class="carousel-item">
      <img src="image/9782012031715_1_75.jpg" alt="Jules Verne" class="d-block w-100" width="80%" heigth="60%"margin-left=40px>
    </div>
  </div>
      
        <!-- Left and right controls/icons -->
        <div  class="col-sm-2 ">
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
    
    
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
                                              </div>
      
                                              </div class="container text-center">
   
                                                 <div class="col-sm-6">

                                                 <form action="site.php" method="post">
        
                                                username  <input type="text" name="rang"><br>
        
                                                 password <input type="text" name="Valeur"><br>
        
                                                 <input type="submit">se connecter</form>
       
        
                                                </form>
                                             </div>
      
</body>

</html>