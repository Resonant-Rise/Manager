<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
  </head>
  <body>
    <div id="wrapper">
      <nav id="navbar_default_admin"  class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border:none;">
        <article class="container-fluid">
          <section class="navbar-header">
            <a class="navbar-brand" href="index.php" style="padding:5px;">
             <img id="nav_logo" src="../img/logo.jpg" alt="Brand"></img>
            </a>
          </section>
          <!-- can be converted to fit account info-->
          <section class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="padding-top:15px;">
              <li><a href="php/login.php">Link</a></li>
              <li><a href="php/forum.php">Forum</a></li>
              <li><a href="php/login.php">Login</a></li>
            </ul>
          </section>
        </article>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li>
              <a href="admindashboard.php">Dashboard</a>
            </li>
            <li>
              <a data-toggle="collapse" data-target="#demo">Mods</a>
                <ul id="demo" class="collapse">
                  <li>
                    <a href="#">1.7.10</a>
                  </li>
                  <li>
                    <a href="#">1.8.9</a>
                  </li>
                </ul>
            </li>
            <li>
              <a href="reports.php">Reports</a>
            </li>
            <li>
              <a href="forum.php">Forum</a>
            </li>
            <li>
              <a href="tickets.php">Tickets</a>
            </li>
            <li>
              <a href="accountslist.php">Accounts</a>
            </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-responsive">
                <td>Name</td>
                <td>Current Version</td>
                <td>Pack Version</td>
                <td>Last Updated</td>
                <td>Repository</td>
                <td>Website</td>
                <td>Author's</td>
                <td>Danger Zone</td>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
      <script src="../js/jquery-2.2.2.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
