//************* */
var child=0;
function addFields(){
    $('.extra_fields').append('<div id="child'+child+'" class="row">'+
    '<div class="col-md-6 left_input">'+
    '<input type="text" id="firstPartFieldName'+child+'"  placeholder="field name here">'+
    '</div>'+
    '<div class="col-md-6 right_input">'+
    '<input type="text" id="firstPartValue'+child+'" placeholder="value here">'+
    ' <a style="cursor: pointer;" onclick="removeFields('+child+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a>'+
    '</div>'+
    '</div>');
    child++;
}

function removeFields(childvalue){
    var list=document.getElementById('child'+childvalue+'');
    list.parentNode.removeChild(list);
}


$( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy",
    
});

$( function() {
    $( "#datepicker" ).datepicker();
} );
//************************************ *

//************************************ */
var childInDetails=0;
function addFieldsInDetails(){

    $('.extra_fields_in_details').append('<div id="childfordetails'+childInDetails+'" class="row mt-5 mb-5">'+
                        '<div class="col-md-6 left_input">'+
                            '<input type="text"  placeholder="field name here">'+
                        '</div>'+
                        '<div class="col-md-6 right_input">'+
                            '<input type="text" placeholder="value here">'+
                            ' <a class="mb-5" style="cursor: pointer;" onclick="removeFieldsInDetails('+childInDetails+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a>'+
                        '</div>'+
                    '</div>');
                    childInDetails++;

}

function removeFieldsInDetails(childvalue){
        var list=document.getElementById('childfordetails'+childvalue+'');
        list.parentNode.removeChild(list);
}
//************************************ */

var childForDetails=0;
function addFieldsForDetails(){

    $('.extra_fields_for_details').append('<div id="childindetails'+childForDetails+'" class="row mt-5 mb-5">'+
                        '<div class="col-md-6 left_input">'+
                            '<input type="text" placeholder="field name here">'+
                        '</div>'+
                        '<div class="col-md-6 right_input">'+
                            '<input type="text" placeholder="value here">'+
                            ' <a class="mb-5" style="cursor: pointer;" onclick="removeFieldsForDetails('+childForDetails+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a>'+
                        '</div>'+
                    '</div>');
                    childForDetails++;

}

function removeFieldsForDetails(childvalue){
        var list=document.getElementById('childindetails'+childvalue+'');
        list.parentNode.removeChild(list);
}

//************************************ */
function uploadimage(){
    document.getElementById('imgupload').click();
    
}
//************************************ */