@extends("new.layout-admin") 
@section("titreSection")
<h3>Gestion des Activit&eacutes</h3>
@endsection
 
@section("content")
<div class="col-md-3 ml-auto mr-auto">
  <div class="card">
    <div class="card-header card-header-danger">
      <h4 class="card-title">Liste des Activités</h4>
      <p class="category">Vous pouvez glisser et déposer les activités dans le calendrier</p>
    </div>
    <div class="card-body">
      <ul id="external-events">
      </ul>
      <input type="button" class="btn btn-info" value="Supprimer Activite" onclick="showAllActiviteToDelete()">
      <input id="new-activite" type="text" class="form-control" name="nomActivite" placeholder="Saisir Nom Activite">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">

      <input type="color" name="couleur" id="couleur" value="#ffffff" style="width: 40%;">

      <input id="add-new-activite" type="button" class="btn btn-success" value="Ajouter Activite">
    </div>
  </div>
</div>
<div id="deleteListeActiviteModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-danger">
        <span class="btn btn-primary" style="width:100%;">Suppression Activite(s)</span>
      </div>
      <ul id="listActivites">

      </ul>
      <input id="conf" type="button" class="btn btn-danger" value="Supprimer Activite">
    </div>
  </div>
</div>
<div class="col-md-9 ml-auto mr-auto">
  <div class="card card-calendar">
    <div class="card-body ">
      <div id="calendar"></div>
    </div>
  </div>
</div>
@endsection
 
@section("script")
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="/js/activiteScript.js"></script>
@endsection