<?php
if (file_exists('./login/includes/api.php')) {
include('./login/includes/api.php');
} else {
include('../login/includes/api.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Resonant Rise Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--
        <script type="text/javascript" src="https://bootswatch.com/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs-3.3.5/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-colvis-1.1.0,b-html5-1.1.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/s/bs-3.3.5/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-colvis-1.1.0,b-html5-1.1.0/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://mods.resonant-rise.com/css/slate.css"/>
<!--
        <script>
      function load_home(){
document.getElementById("indivload").innerHTML='<object type="text/html" data="1.8.9/index.php" ></object>';
}
</script>
-->
        <script type="application/javascript">

$(document).ready(function() {
    $('#table').DataTable( {
        stateSave: true
    } );
} );

        </script>
    </head>
    <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://mods.resonant-rise.com">RRM<br /><h5><small id="brand-small">Resonant Rise Manager</small></h5></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--        <li class="active"><a href="#" onclick="load_home()">1.7.10 <span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
          <a href="http://mods.resonant-rise.com/1.7.10/index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">1.7.10 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <li><a href="http://mods.resonant-rise.com/1.7.10/index.php">View</a></li>
            <li><a href="http://mods.resonant-rise.com/1.7.10/update.php">Update</a></li>
            <li class="divider"></li>
            <?php if(is_minLevel(3)) { ?> <li><a href="http://mods.resonant-rise.com/1.7.10/manage.php">Manage</a></li> <?php } ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="http://mods.resonant-rise.com/1.8.9/index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">1.8.9 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <li><a href="http://mods.resonant-rise.com/1.8.9/index.php">View</a></li>
            <li><a href="http://mods.resonant-rise.com/1.8.9/update.php">Update</a></li>
            <li class="divider"></li>
            <?php if(is_minLevel(3)) { ?> <li><a href="http://mods.resonant-rise.com/1.8.9/manage.php">Manage</a></li> <?php } ?>
          </ul>
        </li>

        <?php if(is_minLevel(2)) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <?php if(is_minLevel(3)) { ?> <li><a href="http://mods.resonant-rise.com/login/settings.php?page=main">Permissions</a></li> <?php } ?>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
          <?php } ?>
      </ul>
<!--
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id"search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
-->
      <ul class="nav navbar-nav navbar-right nav-pills">
         <?php $username = userValue(null, "username");
          if (is_logged_in()) { ?>
          <li class="user-greet"><span class="badge2">Welcome, <?php echo $username; ?>!</span></li>
          <li><a href="http://mods.resonant-rise.com/login/logout.php">Logout</a></li>
          <?php } else { ?>
          <li class="user-greet"><span class="badge2">Welcome, Guest!</span></li>
          <li><a href="http://mods.resonant-rise.com/login/login.php">Login</a></li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>

