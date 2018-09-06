




function editNote(idNote){
    $.getJSON("/dossier-enfant/note/"+idNote+"/get-note").then(function(response){
        console.log(response);
        $("input[name='editObjet']").val(response.objectNote);
        $("input[name='idNote']").val(response.idNote);
        $("textarea[name='editNote']").val(response.descNote);

        $("#modalEditNote").modal("toggle");
    }).fail(function(r){
        console.log(r);
    })
}


$("#editNote").submit(function(e){
    e.preventDefault();
    
    let objetNote   = $("input[name='editObjet']").val();
    let descNote    = $("textarea[name='editNote']").val();
    let idNote      = $("input[name='idNote']").val();
    let token       = $("input[name='_token']").val();

    if(objetNote.length > 0 && descNote.length > 0){
        $.post("/dossier-enfant/note/"+idNote+"/edit-note",{
            idNote: idNote,
            objetNote: objetNote,
            idNote: idNote,
            descNote: descNote,
            _token:token
        }).then(function(){
            $("#exampleModalLabel").text("Modification Enregistrée");
            $('#messageError').text("Les modifications sur la note ont bien été enregistrées ");
            $("#modalError").modal("toggle");

            $("#modalEditNote").modal("toggle");
            
            // window.location.href ="/dossier-enfant/"+idNote+"/liste-des-notes";
        }).fail(function(r){
            console.log(r);
        })
    }else{
        $('#messageError').text("Veillez remplir tous les champs");
    }
})