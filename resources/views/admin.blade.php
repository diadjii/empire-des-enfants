
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Empire des Enfants</title>

  <!-- Bootstrap core CSS -->
  <link href="css/semantic.min.css" rel="stylesheet">
</head>

<body>
  <div class="ui small menu">
    <a class=" item">
      <h1>DashBoard</h1>
    </a>

    <div class="right menu">

      <div class="item">
        <div class="ui primary button">Log Out</div>
      </div>
    </div>
  </div>
  <div class="ui grid">
    <div class="three wide column">
      <div class="ui secondary vertical pointing menu">
        <a class="active item">
          Ajout Utilisateur
        </a>
        <a class="item">
          List des Utilisateurs
        </a>
        <a class="item">
          Reporting
        </a>
      </div>
    </div>
    <div class="eight wide column">
      <h2>Ajouter d'un Utilisateur</h2>
      <form id="formAddUser" class="ui form">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="field">
          <label>Login</label>
          <input type="text" name="login" placeholder="Saisir nouveau login">
        </div>
        <div class="field">
          <label>Mot de Passe </label>
          <input type="password" name="password">
        </div>
        <div class="field">
           <label>Ajouter un Utilisateur</label>
           <select name="typeUser" class="ui fluid dropdown">
             <option value=""selected>Selectionner le type d'utilisateur</option>
             <option value="admin">Administrateur</option>
             <option value="infirm">Infirmier</option>
             <option value="enca">Encadreur</option>
             <option value="anim">Animateur</option>
           </select>
        </div>
        <button class="ui primary button" type="submit">Creer</button>
        <div class="ui error message"></div>
      </form>
    </div>
    </div>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="js/semantic.min.js" charset="utf-8"></script>
    <script src="js/empire.js" charset="utf-8"></script>
  </body>
  </html>
