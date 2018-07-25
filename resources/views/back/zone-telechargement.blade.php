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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title ">Zone de Telechargement</strong> </h3>
            </div>
            <div class="card-body">
              <form role="form" action="/administration/DossierEnfant/addDocument" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$idDossier}}" name="id" hidden required>
                      <label for="exampleInputEmail1">Nom Document</label>
                      <input type="text" class="form-control" name="nomDocument" placeholder="Nom du Document" required>
                    </div>  
                </div>
                <br>
                <div class="input-group">
                    <div class="col-6">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <label class="custom-file-label" for="exampleInputFile">Ajouter un Nouveau Document</label>
                      <input type="file"  id="exampleInputFile" name="doc" required>
                    </div>  
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ajouter Document</button>
              </form>
                
                <div class="col-md-12">
                  @if($allDocuments != null)
                    @foreach ($allDocuments as $document)
                      @if($document['type'] == 'pdf')
                        <div class="col-md-2">
                          <img src="{{asset('images/icon-pdf.png')}}" height=100px width=100 >
                          <a href="{{asset($document['document'])}}">{{$document['nom']}}</a>
                        </div>
                      @else
                        <div class="col-md-2">
                            <img src="{{asset($document['document'])}}" href="{{asset($document['document'])}}" height=100px width=100 >
                            <br>
                            <form  action=/administration/DossierEnfant/zoneTelechargement/download method='post'> 
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                              <input name="nomDocument" hidden type="text" value="{{$document['p']}}">
                            <input type="submit" class="btn btn-primary"value="Telecharger">
                          </form>
                        </div>
                      @endif
                    @endforeach
                   @endif 
                </div>
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
@section("script")
  <script>
    $("#getmage").submit(function(e){
        e.preventDefault();
        let nom = $("#nom").val();

        $.post("/administration/DossierEnfant/zoneTelechargement/download",{
          nom:nom,
          _token : $('input[name="_token"]').val()
        }).then(function(){
          alert(nom);

        }).fail(function(d){
          console.log(d);
        })
    })
  </script>
@endsection