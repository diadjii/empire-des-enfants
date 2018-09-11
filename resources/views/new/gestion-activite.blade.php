@extends("new.layout-admin") 
@section("titreSection")
<h3>Gestion des Activit&eacutes</h3>
@endsection
 
@section("content")
<div class="modal fade" id="errorActivite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Erreur Connexion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="messageError"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
</div>
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
      <input  type="button" class="btn btn-success"  data-toggle="modal" data-target="#addActivite" value="Ajouter Activite">
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
<div class="modal fade" id="addActivite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="btn btn-success">
              <div class="card-text">
                <h4 class="card-title  col-12-md text-white">Création Activite</h4>
              </div>
            </div>
            <form method="get" action="/" class="form-horizontal">
            <div class="card-body ">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nom Activite</label>
                      <input type="text" id="new-activite" class="form-control" value="">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Couleur Activite</label><br>
                      <input type="color" name="couleur" id="couleur" value="#ffffff" style="width: 40%;">
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description Activite</label>
                      <textarea id="descActivite" class="form-control" name="descActivite" cols="40" rows="10"></textarea>
                    </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button id="add-new-activite" type="button" class="btn btn-info" >Enregistrer</button>&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
@endsection
 
@section("script")
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="/js/activiteScript.js"></script>
@endsection