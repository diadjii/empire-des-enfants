@extends('back.layoutAdmin')
@section("content")
<div class="content-wrapper ">
    <section class="content">
      <div class="container  ">
  <div class="row align-items-center">
      <!-- left column -->
      <div class="col align-self-center">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title "> Dossier  </h3>
          </div>
          @if($d == null)
          <h1>Le Dossier Medical est vide !!!</h1>
          @else

          <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
            <div class="card-body">
             
              <div class="row">
                  <div class="col-6">
                    <label for="exampleInputEmail1">Consultation</label>
                      <input type="text" class="form-control" name="consultation" value="{{$d->getTypeConsultation()}}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  </div>
                  <div class="col-6">
                    <label for="exampleInputEmail1">Prescription</label>
                      <input type="text" class="form-control" name="prescription" value="{{$d->getPrescription()}}">
                  </div>
              </div>
                <div class="row">
                  <div class="col-6">
                    <label for="exampleInputEmail1">Analyse Complementaire</label>
                      <input type="text" class="form-control" name="analyseComplementiare"
                             value="{{$d->getAnalyseComplementaire()}}">
                  </div>
                  <div class="col-6">
                    <label for="exampleInputEmail1">Groupe Sanguin</label>
                      <input type="text" class="form-control" name="groupeSanguin" value="{{$d->getGroupeSanguin()}}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="exampleInputEmail1">Diagnostique</label>
                      <input type="text" class="form-control" name="diagnostique" value="{{$d->getDiagnostique()}}">
                  </div>
                  <div class="col-6">
                    <label for="exampleInputEmail1">Date Derniere Visite</label>
                    <input type="text" class="form-control" name="derniereVisite" >
                  </div>
                </div>
              </div>
              </form>
              @endif
      </div>
    </div>
  </div>
  </div>
    </section>
  </div>
@endsection