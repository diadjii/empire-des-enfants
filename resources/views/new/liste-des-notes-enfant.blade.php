@extends("new.layout-admin") 
@section("link")
<link rel="stylesheet" href="/css/empire.css">
@endsection
@section("titreSection")
<h2>Consultation Notes</h2>
@endsection
 
@section("content")
<div class="col-md-12">
  <div class="card card-timeline card-plain">
    <div class="card-body">
      <button class="btn btn-danger" data-toggle="modal" data-target="#modalAddNote">Ajouter une Note</button>

      <ul class="timeline">

        @foreach ($noteListe as $note) 
          @if(($loop->iteration%2) == 0)
            <li class="timeline-inverted">
                @if ($note->getIdUser()->getId() == $idCurrentUser)
                  <div class="timeline-badge success">
                    <i class="material-icons medium editNote"  onclick="editNote({{$note->getIdNote()}})">edit</i> 
                  </div>
                @else
                  <div class="timeline-badge danger">
                    <i class="material-icons">card_travel</i>
                  </div>
              @endif
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <span class="badge badge-pill badge-danger">{{$note->getObjet()}}</span>
                </div>
                <div class="timeline-body">
                  <p>{{$note->getNote()}}</p>
                </div>
                <span>
                  <i class="ti-time"></i> {{$note->getDateAjoutNote()}}
                  @if ($note->getIdUser()->getId() == $idCurrentUser) Modifier @endif
                  </span>
              </div>
            </li>
          @else

          <li class="timeline">
            @if ($idUserNoted == $idCurrentUser)
              <div class="timeline-badge success">
                 <i class="material-icons medium editNote" onclick="editNote({{$note->getIdNote()}})">edit</i> 
              </div>
            @else
                <div class="timeline-badge danger">
                  <i class="material-icons">card_travel</i>
                </div>
            @endif
            <div class="timeline-panel">
              <div class="timeline-heading">
                <span class="badge badge-pill badge-danger">{{$note->getObjet()}}</span>
              </div>
              <div class="timeline-body">
                <p>{{$note->getNote()}}</p>
              </div>
              <i class="ti-time"></i> {{$note->getDateAjoutNote()}}
            </div>
          </li>

          @endif 
        @endforeach

      </ul>
    </div>
  </div>
</div>
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erreur Modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="messageError"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Fermer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modalAddNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajout d'une Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/dossier-enfant/add-note" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="bmd-label-floating">Object Note</label>
            <input type="text" class="form-control" name="objet" required>
            <input type="hidden" name="idDossierEnfant" value="{{$id}}">
          </div>
          <div class="form-group">
            <label for="exampleInput1" class="bmd-label-floating">Ecrivez une note</label><br>
            <textarea name="note" class="form-control" id="" cols="30" rows="10" required></textarea>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Confirmer</button>&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="modalEditNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modification Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editNote" action="/dossier-enfant/edit-note" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="bmd-label-floating">Object Note</label>
            <input type="text" class="form-control" name="editObjet" value="  " required>
            <input type="hidden" name="idNote">
          </div>
          <div class="form-group">
            <label for="exampleInput1" class="bmd-label-floating">Ecrivez une note</label><br>
            <textarea name="editNote" class="form-control" id="" cols="30" rows="10" required>  </textarea>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Modifier</button>&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section("script")
  <script src="/js/note.js"></script>
@endsection