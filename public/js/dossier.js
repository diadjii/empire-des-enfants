
  //recuperation des details du dossier d'un enfant
function viewDetailsDossier(idDossier){
  // alert("ok ça marche"+idDossier )
  $('#exampleModalCenter').modal('toggle');
  $.get("/administration/DossierEnfant/"+idDossier+"/Details").then(function(response){
    $("#titre").text("Infos de "+response.prenom+" "+response.nom);
    $("input[name='profil']").val(response.profil);
    $("textarea[name='description']").val(response.description);
    $("input[name='lieuNaissance']").val(response.lieuNaissance);
    $("input[name='dateNaissance']").val(response.dateNaissance);
    $("input[name='origine']").val(response.origine);
    $("input[name='pere']").val(response.prenomPere);
    $("input[name='nomMere']").val(response.nomMere);
    $("input[name='prenomMere']").val(response.prenomMere);


    // $(".modal-body").html("Profil : "+response.profil+"<br>"+
    //                       "Description : "+response.description+"<br>"+
    //                       "Lieu de Naissance : "+response.lieuNaissance+"<br>"+
    //                       "Date de Naissance : "+response.dateNaissance+"<br>"+
    //                       "Origine :"+response.origine+"<br>"+
    //                       "Nom Pere : "+response.prenomPere+"<br>"+
    //                       "Nom Mere : "+response.nomMere+"<br>"+
    //                       "Prenom Mere : "+response.prenomMere
    //                   );

      console.log(response);
  }).fail(function(r){
      console.log(r);
  })
}
