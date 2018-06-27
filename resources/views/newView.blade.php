<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="/css/semantic.min.css" rel="stylesheet">
  <link href="/css/empire.css" rel="stylesheet">
  <link href="/js/semantic.min.js" rel="stylesheet">
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <title></title>
</head>
<body onload="">
  <div class="ui secondary menu" id="menuAdmin">
    <div class="header item">
      Empire des Enfants
    </div>
    <a class="active item" href="/administration">
      Accueil
    </a>
    <a class="item" href="/administration/Activites">
      Activites
    </a>
    <a class="item" href="/administration/dossier">
      Dossier Enfants
    </a>
    <div class="right menu">
      <div class="item">
        <div id="profile" class="ui primary button">Login</div>
      </div>
      <div class="item">
        <div id="logOut" class="ui button primary">Log Out</div>
        {{-- <input id="logOut" type="submit" class="ui primary button" value="Log Out"/>
        <input  type="hidden" name="_token" value="{!! csrf_token() !!}"> --}}
      </div>
    </div>
  </div>
  <div class="ui content ">
    <div class="ui inverted vertical menu">
      <a class="active item">
          <button id="btnAddActivite" type="button" class="button green ui"name="button">Creer une Activite</button>
      </a>
      <a class="item">
        Messages
      </a>
      <a class="item">
        Friends
      </a>
    </div>
  </div>
</body>
