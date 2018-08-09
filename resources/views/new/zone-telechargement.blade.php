@extends("new.layout-admin")
@section("content")
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">assignment</i>
      </div>
      <h4 class="card-title">Zone de Téléchargement</h4>
    </div>
    <div class="card-body">
      <div class="toolbar">
        <!--        Here you can write extra buttons/actions for the toolbar              -->
      </div>
      <form action="/administration/DossierEnfant/addDocument" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control" value="{{$idDossier}}" name="id" hidden required>
            <input type="text" class="form-control" name="nomDocument" placeholder="Nom du document">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          </div>
        </div>
          <div class="input-group">
              <span class="btn btn-raised btn-round btn-primary btn-file">
                  <span class="fileinput-new">Ajouter un document</span>
                  
                  <input type="file" name="doc" />
              </span>
            <span class="input-group-btn">
              <button type="submit" class="btn btn-fab btn-round btn-info">
                <i class="material-icons">layers</i>
              </button>
            </span>
          </div>
        </form>
      </div>
      <div class="row">
        @if($allDocuments != null)
          @foreach ($allDocuments as $document)
            @if($document['type'] == 'pdf')
            <div class="col-md-3">
              <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="{{asset('images/icon-pdf.png')}}"  href="{{asset($document['document'])}}" alt="Card image cap">
                <div class="card-body">
                  <a class="card-text" href="{{asset($document['document'])}}">{{$document['nom']}}
                    <i  class="material-icons">get_app</i></a>
                </div>
              </div>
            </div>
            @else
              <div class="col-md-3">
                  <div class="card" style="width: 10rem;">
                    <img class="card-img-top" src="{{asset($document['document'])}}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text" href="{{asset($document['document'])}}"> 
                        <form  action=/administration/DossierEnfant/zoneTelechargement/download method='post'> 
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <input name="nomDocument" hidden type="text" value="{{$document['p']}}">
                          <span class="text-primary">{{$document['nom']}}</span>
                          <button type="submit" class="btn btn-fab  btn-round btn-primary">
                            <i  class="material-icons">get_app</i>
                          </button>
                          {{-- <input type="submit" class="btn btn-round btn-info" value="Telecharger"> --}}
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
            @endif
          @endforeach
        @endif 
      </div>
      {{-- <ul class="nav">
        <li class="nav-item">
          <div class="card" style="width: 10rem;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Nom fichier.</p>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="card" style="width: 10rem;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Nom fichier.</p>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="card" style="width: 10rem;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Nom fichier.</p>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="card" style="width: 10rem;">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Nom fichier.</p>
            </div>
          </div>
        </li>
      </ul> --}}
      
      <!-- end content-->
    </div>
    <!--  end card  -->
  </div>
  <!-- end col-md-12 -->
</div>
@endsection