<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="/css/semantic.min.css" rel="stylesheet">
  <link href="/css/empire.css" rel="stylesheet">
  <link href="/css/fullcalendar.min.css" rel="stylesheet">
  <script src="../js/jquery-3.3.1.min.js" charset="utf-8"></script>
  <title></title>
</head>
<body onload="listeActivite()">
  <div class="ui secondary menu " id="menuAdmin">
    <div class="header item">
      Empire des Enfants
    </div>
    <a class=" item" href="/administration">
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
        <div id="profile" class="ui primary button">{{$login}}</div>
      </div>
      <div class="item">
        <div id="logOut" class="ui button primary">Log Out</div>
        {{-- <input id="logOut" type="submit" class="ui primary button" value="Log Out"/>
        <input  type="hidden" name="_token" value="{!! csrf_token() !!}"> --}}
      </div>
    </div>
  </div>
  @yield('header')
  <div class="ui grid fluid  ">
    <div class="ui inverted vertical menu three wide column" >
      <a class="ui header item">
        <span id="titreGestionActivite" class="centered">Tableau de Bord </span>
      </a>
      <a class="item">
        <span id="btnAddActivite"  class="green ui" name="button">Creer une Activite</span>
      </a>
      <a class="item">
        <span id="btnShowActivites"  class=" green ui" name="button">Voir les Activites</span>
      </a>
      <a id="btnShowListeActivite"class="item">
        Liste des Activites
      </a>
      <span class="center" id="aucuneActivite">Aucune Activite pour l'instant</span>
      <ul id="activitesNotAdded" class="ui white relaxed divided list" hidden>
        <button id="chooseDate" class='addToAgenda ui mini button primary ' onClick='addActiviteToAgenda()'>Choisir Date</button>
      </ul>
    </div>
    <div class="twelve wide column">
      @yield('body')
    </div>
  </div>
  @yield('footer')
  <script src="../js/semantic.min.js" charset="utf-8"></script>
  <script src="../js/empire.js" charset="utf-8"></script>
  <script src="../js/moment.min.js" charset="utf-8"></script>
  <script src="../js/fullcalendar.min.js" charset="utf-8"></script>
  <script src="../js/scheduler.min.js" charset="utf-8"></script>
  <script src="../js/admin.js" charset="utf-8"></script>

</body>
</html>
