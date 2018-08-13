$(function () {
      
  /*---------------------------------------------------------------
   initialize the external events
   -----------------------------------------------------------------*/
  function ini_events(ele) {
    ele.each(function () {
      
      // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
      // it doesn't need to have a start or end
      var eventObject = {
        title: $.trim($(this).text()),
        id:$(this).attr("id") // use the element's text as the event title
      }
      
      // store the Event Object in the DOM element so we can get to it later
      $(this).data('eventObject', eventObject)
      $(this).draggable({
        zIndex        : 1070,
        revert        : true, // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      })
      
    })
  }
  
  ini_events($('#external-events div.external-event'))
  getListeActivite();
  /* initialize the calendar
  -----------------------------------------------------------------*/
  //Date for the calendar events (dummy data)
  var date = new Date()
  var d    = date.getDate(),
  m    = date.getMonth(),
  y    = date.getFullYear()
  $('#calendar').fullCalendar({
    header    : {
      left  : 'prev,next today',
      center: 'title',
      right : 'month,agendaWeek,agendaDay'
    },
    buttonText: {
      today: 'today',
      month: 'Mois',
      week : 'Week',
      day  : 'Jour'
    },
    //Random default events
    events    : '/agendaActivites',
    editable  : true,
    droppable : true, // this allows things to be dropped onto the calendar !!!
    drop      : function (date, allDay) { // this function is called when something is dropped
      
      //retrieve the dropped element's stored Event Object
      var originalEventObject = $(this).data('eventObject')
      console.log(originalEventObject)
      // we need to copy it, so that multiple events don't have a reference to the same object
      var copiedEventObject = $.extend({}, originalEventObject)
      
      // assign it the date that was reported
      copiedEventObject.start           = date
      copiedEventObject.allDay          = allDay
      copiedEventObject.backgroundColor = $(this).css('background-color')
      copiedEventObject.borderColor     = $(this).css('border-color')
      
      // render the event on the calendar
      // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
      
      // console.log(idActivite)
      console.log(copiedEventObject.start._d.toISOString().split('.')[0])
      addToAgenda(copiedEventObject.id,copiedEventObject.start._d.toISOString().split('.')[0])
      // is the "remove after drop" checkbox checked?
      if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove()
      }
      
    },
    eventDrop:function(event){
      var debut = event.start._d.toISOString().split(".")[0];
      var fin = "";
      console.log(event)
      var idActivite = event.id;
      if(event.end !=null){
        fin = event.end._d.toISOString().split('.')[0];
        // console.log(event.end._i)
      }
      saveActivite(idActivite,debut,fin);
    },
    eventResize:function(event){
      var debut = event.start._d.toISOString().split(".")[0];
      var fin = "";
      
      var idActivite = event.id;
      if(event.end !=null){
        fin = event.end._d.toISOString().split('.')[0];
        // console.log(event.end._i)
      }
      saveActivite(idActivite,debut,fin);
    },
    
  })
  
  /* ADDING EVENTS */
  var currColor = '#3c8dbc' //Red by default
  //Color chooser button
  
  $('#color-chooser > li > a').click(function (e) {
    e.preventDefault()
    //Save color
    currColor = $(this).css('color')
    //Add color effect to button
    $('#add-new-event').css({
      'background-color': currColor,
      'border-color'    : currColor
    })
  })
  
  $('#add-new-event').click(function (e) {
    e.preventDefault()
    //Get value and make sure it is not null
    var val = $('#new-event').val()
    if (val.length == 0) {
      //addNewActivite(val);
      return
    }
    
    //Create events
    var event = $('<div />')
    event.css({
      'background-color': currColor,
      'border-color'    : currColor,
      'color'           : '#000'
    }).addClass('external-event')
    event.html(val)
    $('#external-events').prepend(event)
    
    //Add draggable funtionality
    ini_events(event)
    
    //Remove event from text input
    $('#new-event').val('')
  })
  
  function getListeActivite(){
    $.get("/listeActivites").then(function(response){
      listeActToDelete(response);
      for (var i = 0; i < response.length; i++) {
        
        var val = response[i].nomActivite;
        
        var event = $('<div />')
        event.css({
          'background-color': response[i].color,
          'border-color'    : response[i].color,
          'color'           : '#000'
        }).addClass('external-event acti badge')
        event.html(val)
        event.attr("id",response[i].id);
        //event.attr("class","activite");
        $('#external-events').prepend(event);
        
        //Add draggable funtionality
        ini_events(event)
      }
      //recuperation de la liste des activites
      
      
    }).fail(function(r,t){
      console.log(r);
      console.log(t);
    })
  }
  
  function addToAgenda(id,d){
    let token = $('input[name="_token"]').val();
    
    $.post("/saveToAgenda",{
      idActivite  : id,
      dateDebut   : d,
      _token      : token
    }).then(function(response){
      console.log(response);
    }).fail(function(r){
      console.log(r);
    });
  }
})

function saveActivite(idActivite,heureDebut,heureFin){
  
  let  token = $('input[name="_token"]').val();
  
  $.post("/updateActivite",{
    idActivite: idActivite,
    heureDebut: heureDebut,
    heureFin  : heureFin,
    _token    : token
  }).then(function(response){
    console.log(response);
  }).fail(function(r){
    console.log(r);
  });
}

var currColor;
$('#color-chooser > li > a').click(function (e) {
  e.preventDefault()
  //Save color
  currColor = $(this).css('color')
  //Add color effect to button
  $('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
  })
})

$("#add-new-activite").click(function(){
  let activite  = $("#new-activite").val();
  let  token    = $('input[name="_token"]').val();
  let couleur   = $('#couleur').val();
  
  if(activite == "" || couleur == ""){
    alert("Vous devez choisir une couleur et donnez le nom de l'activite");
  }else{
    
    $.post("/addActivite",{
      nomActivite : activite,
      _token      : token,
      couleur     : couleur
    }).then(function(response){
      window.location = "/administration";
    }).fail(function(r){
      console.log(r);
    });
  }
})

function showAllActiviteToDelete(){
  $("#deleteListeActiviteModal").modal('show');
}

function listeActToDelete(response){
  for (let i = 0; i < response.length; i++) {
    //const element = array[response];
    var val = response[i].nomActivite;
    var event = $('<div />')
    let v = "<li class='list-group-item'><input class='form-check-input ' type='checkbox' value="+response[i].id+"/>"+response[i].nomActivite+"</li>";
      $("#listActivites").append(v);
      
    }
  }
  
  $("#conf").click(function(){
    let t =  $("input[type='checkbox']:checked");
    let id ="";
    
    for (let i = 0; i < t.length; i++) {
      const el = t[i];
      id +=el.value.split('/');
    }
    
    //envoi de la liste des id des activites à supprimer
    $.get("/deleteActivite/"+id).then(function(response){
      $("#deleteActiviteModal").modal("hide");
      alert("L'activite a bien ete supprimée");
      window.location = "/administration";
    }).fail(function(r){
      console.log(r);
    })
  })
  