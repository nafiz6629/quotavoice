//fourth part starts
var childAddNewItem=0;

function addFieldsInAddNewItem(){
    $('.add_new_item').append('<div class="row border-bottom border-warning" id="newitem'+childAddNewItem+'">'+
    '<div class="col-md-4 text-left">'+
        '<input class="mb-4" type="text" placeholder="Item name (REQUIRED)">'+
        '<div class="add_description">'+
        '<input type="text" placeholder="Description">'+
        '</div>'+       
            '<br>'+
            '<a class="mt-5" style="color: #000; cursor: pointer;" onclick="addImgInAddNewItem('+childAddNewItem+')">'+
            '<i style="color: #733DD9;" class="far fa-plus-square"></i>Add Image</a>'+
            '<input type="file" name="" id="imguploadnewitem'+childAddNewItem+'" hidden>'+
            '<br>'+
            '<br>'+
    '</div>'+
    '<div class="col-md-1">'+
        '<input  class="text-right" min="0" id="qty'+childAddNewItem+'" onkeyup="newItemValueChange('+childAddNewItem+')" value="0" type="number" placeholder="Qty">'+
    '</div>'+
    '<div class="col-md-1">'+
        '<input class="text-right" min="0"  onkeyup="newItemValueChange('+childAddNewItem+')"   value="0" type="number" placeholder="Rate">'+
    '</div>'+
    '<div class="col-md-2">'+
        '<input class="text-right" value="0" onkeyup="newItemValueChange('+childAddNewItem+')" style="width: 55%;" min="0" type="number" placeholder="Discount ">'+
        '<select style="width: 45%;" id="discountselectid" class="custom-select">'+
        '<option selected value="%" >%</option>'+
        '<option  value="Tk" >Tk</option>'+
        '</select>'+    
    '</div>'+
    '<div class="col-md-2">'+
    '<input class="text-right" value="0" onkeyup="newItemValueChange('+childAddNewItem+')" style="width: 55%;" min="0" type="number" placeholder="Vat ">'+
    '<select style="width: 45%;" id="discountselectid" class="custom-select">'+
    '<option selected value="%" >%</option>'+
    '<option  value="Tk" >Tk</option>'+
    '</select>'+     
    '</div>'+
    '<div class="col-md-2">'+
        '<input class="text-right item_amount" value="0" min="0" type="number" placeholder="Amount">'+
        '<a style="cursor: pointer;" onclick="removeFieldsInAddNewItem('+childAddNewItem+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a>'+
    '</div>'+
'</div> ');
childAddNewItem++;
}


function removeFieldsInAddNewItem(value){
    var list=document.getElementById('newitem'+value+'');
    list.parentNode.removeChild(list);
}

function newItemValueChange(value){
    var item_amount=0;
    var qty =  $('#qty'+value+'').val();
    var rate = $('#newitem'+value+' div:nth-child(3) :input').val();
    item_amount=qty*rate;
    var discountSign = $('#newitem'+value+' div:nth-child(4) :input:nth-child(2)').val();
    var discountValue = $('#newitem'+value+' div:nth-child(4) :input:nth-child(1)').val();
    var vatSign = $('#newitem'+value+' div:nth-child(5) :input:nth-child(2)').val();
    var vatValue = $('#newitem'+value+' div:nth-child(5) :input:nth-child(1)').val();
    
    if(discountSign=="%"){
        item_amount=item_amount-item_amount*(discountValue/100);
    }
    else{
        item_amount=item_amount-discountValue;
    }

    if(vatSign=="%"){
        item_amount=item_amount+item_amount*(vatValue/100);
    }
    else{
        item_amount=item_amount+vatValue;
    }

    
    
    $('#newitem'+value+' div:nth-child(6) :input').val(item_amount.toFixed(2));

    grandTotalCount();

}

function grandTotalCount(){
    grandTotal=0;
    add_additional_charge = 0;
    discounted = 0;
    $('.add_new_item .item_amount').each(function(){
        grandTotal=grandTotal+parseFloat($(this).val())
        
    })
    if(document.getElementById('discountvalueid')){

        if($('#discountselectid').val()=="%"){
            discounted = $('#discountvalueid').val()
            grandTotal = grandTotal - (grandTotal*(parseFloat(discounted/100)));
    
        }
        else{
            discounted = parseFloat($('#discountvalueid').val());
            grandTotal = grandTotal - discounted;
        }
    }
    else{
        
    }
    $('.add_additional_charge .additional_value').each(function(){
        add_additional_charge += parseFloat($(this).val())
    })
    grandTotal += add_additional_charge;

    $('#total_items_amount').val(grandTotal);
        
}





// function addDescInAddNewItem(item){
//     $('.add_description').append('<input type="text" placeholder="Description">');
//     item.remove();
// }


function addImgInAddNewItem(value){
    $('#imguploadnewitem'+value+'').click();
}
//fourth part ends

//fifth part starts
function addDiscount(item){
    $('#adddiscountid').append('<div id="discountid"><label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Discount</label>'+
    '<input style="width: 35%;" onkeyup="grandTotalCount()" class="text-right" min="0" id="discountvalueid" value="0" type="number" placeholder="Discount (REQUIRED)">'+
    '<select style="width: 25%;" id="discountselectid" onkeyup="grandTotalCount()" class="custom-select">'+
        '<option selected value="%" >%</option>'+
        '<option  value="Tk" >Tk</option>'+
    '</select>'+
    '<a style="cursor: pointer; margin-left:5px;" onclick="removeAddDiscount()" ><i style="color: #733DD9;" class="fas fa-times"></i></a></div>');
    discountBtn=item;
    item.remove();
}
function removeAddDiscount(){
    var list=document.getElementById('discountid');
    list.parentNode.removeChild(list);
    $('.add_discount').append(discountBtn);
}

var addAdditionalChargeCount=0;
function addAdditionalCharge(){
    $('.add_additional_charge').append('<div class="mb-3" id="additionalchargeid'+addAdditionalChargeCount+'">'+
    '<input type="text" style="width: 46%; margin-left:15px;" placeholder="field name here">'+
    '<input type="number" onkeyup="grandTotalCount()" min="0" value="0" class="text-right additional_value" style="width: 25%; margin-left:15px;" placeholder="value here">'+
    '<a style="cursor: pointer;" onclick="removeAddAdditionalCharge('+addAdditionalChargeCount+')" >'+
    '<i style="color: #733DD9;" class="fas fa-times"></i></a></div>');
    addAdditionalChargeCount++;
}
function removeAddAdditionalCharge(value){
    var list=document.getElementById('additionalchargeid'+value+'');
    list.parentNode.removeChild(list);
}
//fifth part ends



//sixth part starts
var termsAndConditionCount=1;
function addTermsAndCondition(){
    $('.terms_condition').append('<div class="mb-3" id="terms'+termsAndConditionCount+'">'+
    '<input type="text" placeholder="'+termsAndConditionCount+'. Add new terms and condition (REQUIRED)">'+
    '<a style="cursor: pointer;" onclick="removeTerms('+termsAndConditionCount+')" >'+
    '<i style="color: #733DD9;" class="fas fa-times"></i></a></div>');
    termsAndConditionCount++;
}

function removeTerms(value){
    termsAndConditionCount--;
    var list=document.getElementById('terms'+value+'');
    list.parentNode.removeChild(list);
}


function addNotes(item){
    $('.add_notes').append('<div id="addnoteid" class="row">'+
    '<div class="col-md-10">'+
        '<textarea class="form-control" id="addnotevalueid" placeholder="Add a note" required></textarea>'+                                           
        
    '</div>'+
    '<a style="cursor: pointer;" onclick="removeNotes()"><i style="color: #733DD9;" class="fas fa-times"></i></a>'+
'</div>');
notebtn=item;
item.remove();
}


function removeNotes(){
    var list=document.getElementById('addnoteid');
    list.parentNode.removeChild(list);
    $('.notes').append(notebtn);
}

function addSignature(){
    $('#imguploadsign').click();
}
//sixth part ends