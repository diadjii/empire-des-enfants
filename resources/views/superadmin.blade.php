<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Empire des Enfants</title>
  <link href="css/empire.css" rel="stylesheet">
  <link href="css/semantic.min.css" rel="stylesheet">
  <link href="css/icon.min.css" rel="stylesheet">
</head>
<body>
  <div class="ui stackable small menu">
      <a class=" item">
        <h1>Administration</h1>
      </a>
      <div class="right menu">
        <div class="item">
          <div id="profile" class="ui primary button">{{$login}}</div>
        </div>
        <div class="item">
          <form id="logOut" class="" action="logOut">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="submit" class="ui primary button" value="Log Out"/>
          </form>
        </div>
      </div>
    </div>
    <div class="ui stackable two column grid centered">

      <div class="ten wide column">
        <div class="four column centered grid">
          <div class="ui top attached tabular menu">
            <a class="item  active" data-tab="first">Ajout Utilisateur</a>
            <a class="item" data-tab="second">Liste des Utilisateurs</a>
            <a class="item" data-tab="third">Statisque</a>
          </div>
          <div class="ui bottom attached tab segment active" data-tab="first">
            <h2>Ajouter un Utilisateur</h2>
            <p id="message" class="ui error message" hidden></p>
            <form id="formAddUser" class="ui form" >
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class=" two fields">
                <div class="field">
                  <label>Nom</label>
                  <input type="text" name="nom" placeholder="Saisir le Nom" >
                </div>
                <div class="field">
                  <label>Prenom</label>
                  <input type="text" name="prenom" placeholder="Saisir le Prenom" >
                </div>
              </div>
                <div class="two fields">
                  <div class="field">
                    <label>Login</label>
                    <input type="text" name="login" placeholder="Saisir nouveau login">
                  </div>
                  <div class="field">
                    <label>Mot de Passe </label>
                    <input type="text" name="password" placeholder="Saisir votre mot de passe" >
                    <a id="generatePassword" class="ui green  mini">Generer un mot de passe</a>
                  </div>
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
          <div class="ui bottom attached tab segment" data-tab="second">
            <table id="listeUtilisateurs" class="ui striped table">
              <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Nom</th>
                  <th>Pr&eacutenom</th>
                  <th>Role</th>
                  {{-- <th>Desactiver Compte</th> --}}
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div class="ui bottom attached tab segment " data-tab="third">
            Third
          </div>
        </div>
      </div>
      <div class="ui modal">

        <div class="header">
          Modification Profile Utilisateur
        </div>
        <div class="content">
          <h2>Ajouter d'un Utilisateur</h2>
          <p id="message" class="ui error message" hidden></p>
          <form id="formAddUser" class="ui form" >
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class=" two fields">
              <div class="field">
                <label>Nom</label>
                <input type="text" name="newNom" placeholder="Saisir le Nom" >
              </div>
              <div class="field">
                <label>Prenom</label>
                <input type="text" name="newPrenom" placeholder="Saisir le Prenom" >
              </div>
            </div>
              <div class="two fields">
                <div class="field">
                  <label>Login</label>
                  <input type="text" name="newLlogin" placeholder="Saisir nouveau login">
                </div>
                <div class="field">
                  <label>Mot de Passe </label>
                  <input type="text" name="newPassword" placeholder="Saisir votre mot de passe" >
                </div>
              </div>
              <div class="field">
                <label>Ajouter un Utilisateur</label>
                <select name="newTypeUser" class="ui fluid dropdown">
                  <option value=""selected>Selectionner le type d'utilisateur</option>
                  <option value="admin">Administrateur</option>
                  <option value="infirm">Infirmier</option>
                  <option value="enca">Encadreur</option>
                  <option value="anim">Animateur</option>
                </select>
              </div>
            <button class="ui primary button" type="submit">Enregistrer</button>
            <div class="ui error message"></div>
          </form>
        </div>

      </div>
  </div>
<script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
<script src="js/semantic.min.js" charset="utf-8"></script>
<script src="js/empire.js" charset="utf-8"></script>
</body>
</html>
