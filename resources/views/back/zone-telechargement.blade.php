@extends('back.layoutAdmin')
@section("content")
  <br>
  <div class="content-wrapper ">
    <section class="content">
          @if($errors->any())
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{$errors->first()}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           @endif
      <div class="container  ">
        <div class="row align-items-center">
          <!-- left column -->
          <div class="col align-self-center">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title "> Zone de Telechargement</strong> </h3>
              </div>
              <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" name="nom"  hidden>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="file"  id="exampleInputFile" name="doc" required>
                        <label class="custom-file-label" for="exampleInputFile">Ajouter un Nouveau Document</label>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary">Ajouter Document</button>
                  {{-- Nom et Prenom --}}

                
            </div>
                <div class="card-footer " style="background-color: #fff;"> 
                   
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection