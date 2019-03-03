<?php


//for existent elements in the page
updateElements();
makeDeletable();


/*
ON CLICK EVENTS
*/

//pop up menu to add class
$(".addNew").on("click", function(){

  $(".popUp").fadeToggle();

});

//clicking to add class
$(".addButton").on("click", function(){

  var title = $(".nameInput").val();

  var checkboxValue = [];

//retrives the values from selected checkboxes and pushes it into array
 $.each($("input:checked"), function(){
        checkboxValue.push($(this).val());
   });

  var fromTimeHour = $("#fromTimeHour").val();
  var fromTimeHalf = $("#fromTimeHalf").val();

  var toTimeHour = $("#toTimeHour").val();
  var toTimeHalf = $("#toTimeHalf").val();

  var color = $(this).css('backgroundColor');
  // alert(color);

  // alert(checkboxValue + " " + typeof checkboxValue[0] + " " + checkboxValue.length); //string

  //VALIDADE INPUTS

  if(title != "") {
    //create new div with class element and fadeout popup

    //CREATE NEW ELEMENTS
    for(var i = 0; i < checkboxValue.length; i++) {

      createNew(title, fromTimeHour, fromTimeHalf, toTimeHour, toTimeHalf, Number(checkboxValue[i]), color);

    }

      makeDeletable();
      updateElements()
    $(".nameInput").val("");
    $(".popUp").fadeToggle();


  } else {
    //shake textbox
    //toggle
    shake();
    //untoggles after animation is done
    setTimeout(shake,310);
  }

});

 //clicking colors
$(".color").on("click", function() {

  let myColor = $(this).css('backgroundColor');

  $(".addButton").css('backgroundColor', myColor);

});

function shake () {
  $(".nameInput").toggleClass("shake");
}

function createNew(title, fromTimeHour, fromTimeHalf, toTimeHour, toTimeHalf, weekDay, color) {


  var unit = 15;
  //create new element using title+weekday as ID
  var newElement = '<div id=' + title + weekDay + ' class="myClass ui-draggable ui-draggable-handle ui-resizable"><p class="title">' + title + '<i class="fa fa-trash-o" aria-hidden="true"></i></p><div class="ui-resizable-handle ui-resizable-s" style="z-index:90;"></div></div>';

  //inserts it
  $(newElement).insertBefore(".tableTimes");


  //this is how we will control where the elements will appear on the grid
  //left for the day of the week
  //top for starting time
  //height interval of time
  $("#" + title + weekDay).css({
    "left": weekDay,
    "top": getStartHour(fromTimeHour, fromTimeHalf),
    "height": getToHour(fromTimeHour, fromTimeHalf, toTimeHour, toTimeHalf),
    "background-color": "" + color,

  });

  updateElements();
}

function makeResizable() {
  $( ".myClass" ).resizable({
  handles: 's',
  grid: [ 0, 15 ]
});
}

function makeDraggable() {
  $(".myClass").draggable({
  containment: 'parent',
    grid: [100,15]
});
  console.log("dragable");
}



function updateElements() {
  makeDraggable();
  makeResizable();

}

function makeDeletable() {

  $(".fa-trash-o").on("click", function() {

  $(this).parent().parent().remove();


});
}

/*
NOTE: need to make sure inputs are valid on functions bellow and test more
- FROM needs to be smaller than TO
- create function validate input
*/

function correctHour(toHour) {

        var result;

        if(toHour < 7) {
          result = 12 + Number(toHour);
        } else {
          result = toHour;
        }
        // alert(result);
        return result;
      }

function getToHour(fromHour, fromHalf, toHour, toHalf) {
  //needs to handle 9am to 1pm types of entry
  var compensation;

  if(fromHalf == 30 && toHalf == 30) {

    compensation = 0;

  } else if (fromHalf == 30 ){

    compensation = -15;

  } else if(toHalf == 30){

    compensation = 15;

  } else {

    compensation = 0;
  }

    var correctedToHour = correctHour(toHour);
    var correctedFromHour = correctHour(fromHour);
    // alert(correctedHour);
    return ((correctedToHour - correctedFromHour) * 30) + compensation;

}

function getStartHour(fromHour, fromHalf) {

  let base = 110; //that gives 7am
  var unitHalf;

  //this rounds down or up
  if (fromHalf >= 30) {

    unitHalf = 15; //half an hour

  } else {

    unitHalf = 0;
  }


  if(fromHour >= 7) {

    return base + ((fromHour - 7) * 30) + unitHalf;

  } else {
    //260 is the base for anything after 12
    return  260 + (fromHour * 30) + unitHalf;

  }

};

function validateInput (number1, number2) {
  //tittle cant be an empty string
  //fromHour > toHour
  //array of weekdays is not empty
  //color with r,g or b lower than 130 makes color of text white


}

 ?>
