<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type=text], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 5px;
        }
        h3{
            padding-left:40%;
            color:#1a69a4;
        }
    </style>
</head>
<body>
<div class="content-wrapper ">
    <section class="content">

            <div class="row align-items-center">
                <!-- left column -->
                <div class="col align-self-center">

                        <div class="card-header">
                            <h3 class="card-title "> Dossier de <strong>{{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</strong> </h3>
                        </div>
                        <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">

                                {{-- Nom et Prenom --}}


                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Nom : {{$enfant->getNomEnfant()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom : {{$enfant->getPrenomEnfant()}}</label>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Profil : {{$enfant->getProfil()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Description : {{$enfant->getDescription()}}</label>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Date Naissance : {{$enfant->getDateNaissanceEnfant()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Lieu de dateNaissance : {{$enfant->getLieuNaissance()}}</label>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Origine : {{$enfant->getOrigineEnfant()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Adresse Enfant : {{$enfant->getAdresse()}}</label>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom Mere : {{$parent->getPrenomMere()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Nom Mere : {{$parent->getNomMere()}}</label>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom Pere : {{$parent->getPrenomPere()}}</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1">Numero Telephone : {{$parent->getNumTel()}}</label>
                                    </div>

                        </form>
                    </div>

                </div>


    </section>
</div>
</body>
</html>