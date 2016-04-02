<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Resonant Rise Buisness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
   <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
  </head>
   <body>
     <nav id="navbar_default" class="navbar navbar-default navbar-fixed-top">
       <article class="container-fluid">
         <section class="navbar-header">
           <a class="navbar-brand" href="index.php" style="padding:5px;">
            <img id="nav_logo" src="../img/logo.jpg" alt="Brand"></img>
           </a>
         </section>
         <section class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right" style="padding-top:15px;">
             <li><a href="php/login.php">Link</a></li>
             <li><a href="php/forum.php">Forum</a></li>
             <li><a href="php/login.php">Login</a></li>
           </ul>
         </section>
       </article>
     </nav>
      <article class="container-fluid">
        <form data-toggle="validator" role="form" action="data_collection.php" method="POST">
                   <label   class="control-label" >
                    First Name
                    <input type="text" class="form-control" id="inputName" name="F_Name" value="<?php echo $_POST['F_Name']; ?>" required>
                   </label>
                   <label class="control-label">
                    Last Name
                    <input type="text" class="form-control" name="L_Name" value="<?php echo $_POST['L_Name']; ?>" required>
                   </label>
                   <label  class="control-label">
                    Email
                    <input type="email" class="form-control" name="E_Mail" value="<?php echo $_POST['E_Mail']; ?>" required>
                   </label>
                   <label  class="control-label">
                    Street
                    <input type="text" class="form-control" name="Street" value="<?php echo $_POST['Street']; ?>" required>
                   </label>
                   <label  class="control-label">
                    City
                    <input type="text" class="form-control" name="City" value="<?php echo $_POST['City']; ?>" required>
                   </label>
                   <div class="col-lg-4">
                     <label> State </label>
                      <select name="State" class="form-control" required>
                          <option value="AL">AL</option>
                          <option value="AK">AK</option>
                          <option value="AZ">AZ</option>
                          <option value="AR">AR</option>
                          <option value="CA">CA</option>
                          <option value="CO">CO</option>
                          <option value="CT">CT</option>
                          <option value="DE">DE</option>
                          <option value="DC">DC</option>
                          <option value="FL">FL</option>
                          <option value="GA">GA</option>
                          <option value="HI">HI</option>
                          <option value="ID">ID</option>
                          <option value="IL">IL</option>
                          <option value="IN">IN</option>
                          <option value="IA">IA</option>
                          <option value="KS">KS</option>
                          <option value="KY">KY</option>
                          <option value="LA">LA</option>
                          <option value="ME">ME</option>
                          <option value="MD">MD</option>
                          <option value="MA">MA</option>
                          <option value="MI">MI</option>
                          <option value="MN">MN</option>
                          <option value="MS">MS</option>
                          <option value="MO">MO</option>
                          <option value="MT">MT</option>
                          <option value="NE">NE</option>
                          <option value="NV">NV</option>
                          <option value="NH">NH</option>
                          <option value="NJ">NJ</option>
                          <option value="NM">NM</option>
                          <option value="NY">NY</option>
                          <option value="NC">NC</option>
                          <option value="ND">ND</option>
                          <option value="OH">OH</option>
                          <option value="OK">OK</option>
                          <option value="OR">OR</option>
                          <option value="PA">PA</option>
                          <option value="RI">RI</option>
                          <option value="SC">SC</option>
                          <option value="SD">SD</option>
                          <option value="TN">TN</option>
                          <option value="TX">TX</option>
                          <option value="UT">UT</option>
                          <option value="VT">VT</option>
                          <option value="VA">VA</option>
                          <option value="WA">WA</option>
                          <option value="WV">WV</option>
                          <option value="WI">WI</option>
                          <option value="WY">WY</option>
                      </select>
                   </div>
                   <label  class="control-label">
                    Zip Code
                    <input type="text" class="form-control" data-minlength="5" name="Zip_Code" value="<?php echo $_POST['Zip_Code']; ?>" required>
                   </label>
                   <label class="control-label">
                    T-ShirtSize
                    <input type="text" name="T-ShirtSize" class="form-control" value="<?php echo $_POST['T-ShirtSize']; ?>">
                   </label>
                   <button type="submit" class="btn btn-primary"> Submit </button>
                   <button class="btn btn-danger" type="reset"> Reset </button>
                  </form>
      </article>
   </body>
    <footer>
      <script src="../js/jquery-2.2.2.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    </footer>
</html>
