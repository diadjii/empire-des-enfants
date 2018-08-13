@extends("new.layout-admin")
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
                <div class="timeline-badge danger">
                  <i class="material-icons">card_travel</i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-danger">{{$note->getObjet()}}</span>
                  </div>
                  <div class="timeline-body">
                    <p>{{$note->getNote()}}</p>
                  </div>
                  <span>
                    <i class="ti-time"></i> {{$note->getDateAjoutNote()}}
                  </span>
                </div>
              </li>
            @else
            <li class="timeline">
              <div class="timeline-badge danger">
                <i class="material-icons">card_travel</i>
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <span class="badge badge-pill badge-danger">{{$note->getObjet()}}</span>
                </div>
                <div class="timeline-body">
                  <p>{{$note->getNote()}}</p>
                </div>
                <span>
                  <i class="ti-time"></i> {{$note->getDateAjoutNote()}}
                </span>
              </div>
            </li>
            @endif
          @endforeach
       
      </ul>
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
      <form action="/DossierEnfant/add-note" method="post">
        <div class="modal-body">
            <div class="form-group">
              <label for="" class="bmd-label-floating">Object Note</label>
              <input type="text" class="form-control"  name="objet" required>
            <input type="hidden" name="idDossierEnfant" value="{{$id}}">
            </div>
            <div class="form-group">
              <label for="exampleInput1" class="bmd-label-floating">Ecrivez une note</label><br>
              <textarea name="note" class="form-control" id="" cols="30" rows="10" required></textarea>
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >Confirmer</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          </div>
      </form>  
    </div>
  </div>
</div>
@endsection    