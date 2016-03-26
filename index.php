<?php

 ?>
 <html id="index-background">
  <div class="fullscreen-bg">
    <video loop muted autoplay poster="img/background.jpg" class="fullscreen-bg__video">
        <source src="videos/background.mp4" type="video/mp4">
    </video>
  </div>
  <head>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
   <link rel="stylesheet/less" type="text/css" href="css/bootswatch.less">
   <link rel="stylesheet/less" type="text/css" href="css/variables.less">
   <link rel="stylesheet" type="text/css" href="css/slate.css">
   <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
   <body>
     <nav class="navbar navbar-default" style="border:none;height:10%;   background-color: transparent; background: transparent;border-color: transparent;">
       <article class="container-fluid">
         <section class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php" style="padding:5px;">
            <img src="img/logo.jpg" alt="Brand" style="width:25% ;"></img>
           </a>
         </section>
         <section class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav navbar-right">
             <li><a href="php/forum.php">Forum</a></li>
             <li><a href="#">Modpacks</a></li>
             <li><a href="php/login.php">Login</a></li>
           </ul>
         </section>
       </article>
     </nav>
      <article class="container">
        <section class="panel2 panel-primary">
          <section class="panel-heading">
            <h3 class="panel-title">Welcome!</h3>
          </section>
        </section>
        <section class="jumbotron">
          <h1>Oh, Hello there</h1>
          <p>Resonant Rise Manager is an application built by hand and with love from the Resonant Rise Development Team.</p>
          <p>With this application, it allows the developers to update the pack a little quicker.</p>
          <p>Plus, there are a lot of features coming soon.</p>
          <p>This is an alpha build so it may be broken in some parts</p>
        </section>
      </article>
   </body>
    <footer>
      <script src="js/jquery-2.2.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </footer>
 </html>
<?php
 ?>
