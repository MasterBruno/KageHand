<!doctype html>
<html lang="en">
  <head>
    <title>KageHand Motel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">KageHand Motel</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quartos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="#">Fotos dos Quartos</a>
                  <a class="dropdown-item" href="roomsLuxo.php">Quarto de Luxo</a>
                  <a class="dropdown-item" href="roomsPlus.php">Quarto Plus</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contatos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pesquisar</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="reservas.php">Reservas</a>
                  <a class="dropdown-item" href="dados.php">Dados Pessoais</a>
                </div>
              </li>

              <li class="nav-item cta">
                <a class="nav-link" href="booknow.php"><span>Veja Agora</span></a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">

            <div class="mb-5 element-animate">
              <h1>Bem Vindo ao KageHand Motel</h1>
              <h2 class="">Welcome To KageHand Motel</h1>
              <p><a href="booknow.php" class="btn btn-primary">Veja Agora</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-5">Dados Pessoais</h2>
            <form action="#" method="post">
              <div class="row">
                <div class="col-sm-6 form-group">                          
                  <label for="">Informe o CPF</label>
                  <div style="position: relative;">
                    <span class="fa fa-address-card icon" style="position: absolute; right: 10px; top: 10px; cursor:pointer;"></span>
                    <input type='text' class="form-control" maxlength="14" id='cpf' name="cpf" OnKeyPress="formatar('###.###.###-##', this)"/>
                  </div>
                </div>
                <div class="col-sm-6 form-group">                          
                  <label for="">Informe a senha</label>
                  <div style="position: relative;">
                    <span class="fa fa-key icon" style="position: absolute; right: 10px; top: 10px; cursor:pointer;"></span>
                    <input type='password' class="form-control" id="senha" name="senha" maxlength="16"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                    <input type="button" value="Pesquisar" class="btn btn-primary" onClick="buscarDados()">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
        <div class="container">
            <div id="resultado">
            </div>
        </div>
    </section>
    

    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>Telefone</h3>
            <p>Ligue Agora: 4321-1234.</p>
            <p class="lead"><a href="tel://">+55 99 99999-9999</a></p>
          </div>
          <div class="col-md-4">
            <h3>Esteja conectado.</h3>
            <p>Nós estamos nas redes sociais. Confira!</p>
            <p>
              <a href="#" class="pl-0 p-3"><span class="fa fa-facebook"></span></a>
              <a href="#" class="p-3"><span class="fa fa-twitter"></span></a>
              <a href="#" class="p-3"><span class="fa fa-instagram"></span></a>
              <a href="#" class="p-3"><span class="fa fa-vimeo"></span></a>
              <a href="#" class="p-3"><span class="fa fa-youtube-play"></span></a>
            </p>
          </div>
          <div class="col-md-4">
            <h3>Conecte também via email...</h3>
            <p>Deixe seu email para que possamos está mantendo sempre atualizado sobre nossos serviços.</p>
            <form action="#" class="subscribe">
              <div class="form-group">
                <button type="submit"><span class="ion-ios-arrow-thin-right"></span></button>
                <input type="email" class="form-control" placeholder="Email">
              </div>
              
            </form>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            &copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | KageHand Motel | Este template foi feito <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>