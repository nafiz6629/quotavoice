<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./assets/style.css"> -->
    <link rel="stylesheet" href="<?= base_url("assets/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/all.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/jquery-ui.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/jquery-ui.theme.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/js/dropzone.css")?>">
    <script src="<?= base_url("assets/js/dropzone.js")?>"></script>

    
    <title>quotation</title>
</head>
<body>

    <section class="header_section">
    
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-white" href="#">QUOTAVOICE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mynavbar">
                    <a class="text-white nav-item nav-link active" href="<?=base_url("/")?>">Quotation <span class="sr-only">(current)</span></a>
                    <?php 
                            $session = session();
                            if($session->get("loginemail")){
                   echo '<a class="text-white nav-item nav-link" href="'.base_url("/QuotationController/my_quotation").'" >My Quotations</a>';
                            }
                            ?>
                    <a class="text-white nav-item nav-link"  href="<?=base_url("/invoice")?>" >Invoice</a>
                    <!--  -->
                    <?php 
                            $session = session();
                            if($session->get("loginemail")){
                               echo '<a class="text-white bg-danger nav-item nav-link"  href="'.base_url("/logout").'" >Logout</a>';
                               
                        }
                        else{
                            
                          echo '<a class="text-white nav-item nav-link"  href="'.base_url("/signin").'" >Sign in</a>';
                            
                        }
                        ?>
                    
                    <?php 

                        if($session->get("loginemail")){
                            
                          echo '<a class="text-white nav-item nav-link" >Hi...'.$session->get("loginemail").'</a>';
                            
                        }


                    ?>
                    <!--  -->
                </div>
            </div>
        </nav>
    
    </section>

    <section class="create_quotation">

        <div class="trust_us text-center text-white">
            <h4>Trust us for our bussiness</h4>
        </div>

        <h2 class="text-center mb-4">Create Your Quotation Now</h2>
        <div class="create text-center" style="margin-left: 39%;">
            <div class="round_circle">
                1
            </div>
            <p>Quotaion details</p>
        </div>
        <div class="greater_than">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="create text-center">
            <div class="round_circle text">
                2
            </div>
            <p>Select Design & Colors</p>
        </div>

        <div class="form_box">
             <div class="heading">
                 <div class="row">
                     <div class="col-md-12 text-center">                         
                         <input type="text" value="Quotation">
                     </div>
                 </div>
             </div>
             <div class="first_part">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="row">
                             <div class="col-md-6 left_input">
                                <input type="text" id="quotationNoField" readonly value="Quotation No">
                             </div>
                             <div class="col-md-6 right_input">
                                <input type="text" id="quotationNoValue" readonly required value="QTN--<?= $data ?>">
                             </div>
                             
                         </div>
                         <div class="row">
                             <div class="col-md-6 left_input">
                                <input type="text" id="quotationDate" readonly value="Quotation Date">
                             </div>
                             <div class="col-md-6 right_input">
                                <input type="text" placeholder="select date" id="datepicker" >
                               
                            </div>
                         </div>
                         <div class="extra_fields">

                         </div>
                         <a style="margin-left: 15px; color: #000; cursor: pointer;" onclick="addFields()">
                            <i style="color: #733DD9;" class="far fa-plus-square"></i> Add More Fields</a>
                     </div>
                     <div class="col-md-6  text-right">
                            <div style="margin-left: 30%; width: 60%;" class="drag-drop text-center">
                                <form action="<?=base_url("/photoupload")?>" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data" method="post">
                                    <h5>Business Logo Here</h5>
                                </form>
                            </div>
                     </div>
                 </div>
             </div>
       

             <div class="second_part">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="your_details">
                             <h4>Quotation From <span> <h6 style="display: inline; color: #8A97AA;">(Your details)</h6> </span> </h4>
                             <div class="details_form">
                                <select style="color: #8A97AA;" class="custom-select mt-5 mb-3" id="selectCountry">
                                    <option selected>Choose Country...</option>
                                    <option <?php $user[0]->user_country=="bangladesh" ? $country="selected" : $country=""?> <?=$country?> value="bangladesh">Bangladesh</option>
                                    <option <?php $user[0]->user_country=="india" ? $country="selected" : $country=""?> <?=$country?> value="india">India</option>
                                    <option <?php $user[0]->user_country=="china" ? $country="selected" : $country=""?> <?=$country?> value="china">China</option>
                                  </select>
                                  <input type="text" value="<?=$user[0]->user_name?>" id="yourBusinessName" placeholder="Business / Freelancer Name (REQUIRED)">
                                  <div class="divide_part mt-5 mb-3">
                                        <input type="text" id="yourEmail" value="<?=$user[0]->user_email?>" placeholder="Your email">
                                        <select class="fomr-control">
                                            <option selected>Choose...</option>
                                            <option <?php $user[0]->user_country=="bangladesh" ? $country="selected" : $country=""?> <?=$country?> value="bangladesh">Bangladesh</option>
                                            <option <?php $user[0]->user_country=="india" ? $country="selected" : $country=""?> <?=$country?> value="india">India</option>
                                            <option <?php $user[0]->user_country=="china" ? $country="selected" : $country=""?> <?=$country?> value="china">China</option>
                                        </select>
                                        <input type="number" id="yourPhone"  value="<?=$user[0]->user_phone_no?>"  placeholder="phone no">
                                  </div>
                                  <div class="divide_part2 mt-5 mb-3">
                                        <input type="text" id="yourGstin" placeholder="Enter your GSTIN (Optional)">
                                        
                                        <input type="number" id="yourPan" placeholder="Enter your PAN (Optional)">
                                  </div>
                                  <input type="text" id="yourAddress" value="<?=$user[0]->user_address?>" placeholder="Address">
                                  <div class="divide_part2 mt-5 mb-3">
                                    <input type="text" id="yourCity" value="<?=$user[0]->user_city?>" placeholder="City">
    
                                    
                                    <input type="number" id="yourZipCode" placeholder="Postal Code / Zip Code">
                                 </div>
                                 <select id="yourState" class="custom-select">
                                    <option selected>Choose Sate...</option>
                                    <option value="dhaka">Dhaka</option>
                                    <option value="chittagong">Chittagong</option>
                                    <option value="sylhet">Sylhet</option>
                                  </select>
                                  <div class="extra_fields_in_details mt-5">

                                </div>
                                <a class="mt-5" style="margin-left: 15px; color: #000; cursor: pointer;" onclick="addFieldsInDetails()">
                                   <i style="color: #733DD9;" class="far fa-plus-square"></i> Add More Fields</a>

                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <!-- <div class="client_details"> -->
                             <!-- your details starts -->
                            <div class="your_details">
                                <h4>Quotation For <span> <h6 style="display: inline; color: #8A97AA;">(Client details)</h6> </span> </h4>
                                <div class="details_form">
                                   <select style="color: #8A97AA;" class="custom-select mt-5 mb-3" id="selectClientCountry">
                                       <option selected>Choose Country...</option>
                                       <option value="bangladesh">Bangladesh</option>
                                       <option value="india">India</option>
                                       <option value="china">China</option>
                                     </select>
                                     <input type="text" id="clientBusinessName" placeholder="Client's business name (REQUIRED)">
                                     <div class="divide_part mt-5 mb-3">
                                           <input type="text" id="clientEmail" placeholder="Your email">
                                           <select class="fomr-control">
                                               <option selected>Choose...</option>
                                               <option value="bangladesh">Bangladesh</option>
                                               <option value="india">India</option>
                                               <option value="china">China</option>
                                           </select>
                                           <input type="number" id="clientPhone" placeholder="phone no">
                                     </div>
                                     <div class="divide_part2 mt-5 mb-3">
                                           <input type="text" id="clientGstin" placeholder="Enter your GSTIN (Optional)">
                                           
                                           <input type="number" id="clientPan" placeholder="Enter your PAN (Optional)">
                                     </div>
                                     <input type="text" id="clientAddress" placeholder="Address">
                                     <div class="divide_part2 mt-5 mb-3">
                                       <input type="text" id="clientCity" placeholder="City">
                                       
                                       <input type="number" id="clientZipCode" placeholder="Postal Code / Zip Code">
                                    </div>
                                    <select id="clientState" class="custom-select">
                                       <option selected>Choose Sate...</option>
                                       <option value="1">One</option>
                                       <option value="2">Two</option>
                                       <option value="3">Three</option>
                                     </select>
                                     <div class="extra_fields_for_details mt-5">
   
                                   </div>
                                   <a class="mt-5" style="margin-left: 15px; color: #000; cursor: pointer;" onclick="addFieldsForDetails()">
                                      <i style="color: #733DD9;" class="far fa-plus-square"></i> Add More Fields</a>
   
                                </div>
                            </div>
                         <!-- </div> -->
                     </div>
                 </div>
                 <!-- your details ends -->
                 

             </div>

            <div class="third_part">
            
                <div class="row">
                    <div class="col-md-6 mb-5">
            
                        <div class="col-md-6" style="display: inline;">
                            <input type="checkbox" name="checkbox-1" id="checkbox-1">
                            <label for="checkbox-1">Add GST</label>
            
                        </div>
                        <div class="col-md-6" style="display: inline;">
                            <label for="">Currency</label>
                            <select style="display: inline; width: 300px;" class="custom-select">
                                <option selected>Choose...</option>
                                <option value="1">Bangladeshi Taka(BDT)</option>
                                <option value="2">Indian Rupee(INR)</option>
                                <option value="3">Chinese Yuan(CNY)</option>
                            </select>
            
                        </div>
                    </div>
                </div>
            
            </div>

            <div class="fourth_part">
                <div class="highlight">
                    <p class="text-white">Item</p>
                    <p class="text-white">Quantity</p>
                    <p class="text-white">Rate</p>
                    <p class="text-white">Discount</p>
                    <p class="text-white">VAT</p>
                    <p class="text-white">Amount</p>
                </div>
                <div class="add_new_item text-center mt-4 mb-4">
                   
                </div>
                    <a class="mb-5" style="margin-left: 45%; color: #000; cursor: pointer;" onclick="addFieldsInAddNewItem()">
                    <i style="color: #733DD9;" class="far fa-plus-square"></i> Add New Item</a>

                
            </div>

            <div class="fifth_part">
                <div class="total_calculation">
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <div class="add_discount mb-4">
            
                                <div id="adddiscountid">
            
                                    <!-- <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Discount</label>
                                                    <select style="width: 30%;" class="custom-select">
                                                        <option value="">Type Choose...</option>
                                                        <option >%</option>
                                                <option >Amount</option>
                                            </select>
                                            <input type="text" placeholder="Discount (REQUIRED)">
                                            <a style="cursor: pointer;" onclick="removeFields('+child+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a> -->
                                </div>
                                <a class="mb-1" style="color: #000; cursor: pointer;" onclick="addDiscount(this)">
                                    <i style="color: #733DD9;" class="far fa-plus-square"></i> Add Discount</a>
                                <br>
            
                            </div>
                            <div class="add_additional_charge">
                                <!-- <input type="text" placeholder="field name here">
                                            <input type="text" placeholder="value here"> -->
                            </div>
                            <a class="mb-3" style="color: #000; cursor: pointer;" onclick="addAdditionalCharge()">
                                <i style="color: #733DD9;" class="far fa-plus-square"></i> Add Additional Charge</a>
                            <hr>
                                <div class="total_cal">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h4>Total</h4>
                                        </div>
                                        <div class="col-md-5">
                                            <h4>
                                            <input type="text" value="0" class="text-right" readonly id="total_items_amount">
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sixth_part">

                <div class="row">
                    <div class="col-md-12">
                        <div class="terms text-center">
                            <h6  style="color: #51618A; padding: 9px;">Terms and Conditions</h6>
                            <div class="terms_condition mb-4">
                                <!-- <input type="text" placeholder="Add new terms and condition (REQUIRED)">
                                <a style="cursor: pointer;" onclick="removeTerms('+child+')" ><i style="color: #733DD9;" class="fas fa-times"></i></a>
                                -->
                            </div>
                            <a class="mb-5" style=" color: #000; cursor: pointer;" onclick="addTermsAndCondition()">
                            <i style="color: #733DD9;" class="far fa-plus-square"></i> Add Terms And Condition</a>
            
                        </div>
                        <div class="notes_attatchment">
                            <div class="row">
                                <div class="notes pb-5 col-md-6">
                                    <div class="add_notes">
                                        <!-- <div class="row">
                                            <div class="col-md-10">
                                                <textarea class="form-control" placeholder="Add a note" required></textarea>                                               
                                                
                                            </div>
                                            <a style="cursor: pointer;" onclick="removeNotes()"><i style="color: #733DD9;" class="fas fa-times"></i></a>
                                        </div> -->
                                    </div>
                                    <a class="mb-5" style=" color: #000; cursor: pointer;" onclick="addNotes(this)">
                                    <i style="color: #733DD9;" class="far fa-plus-square"></i> Add Notes</a>
                            
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="mb-5 p-2" style=" background: #E2E5EB; color: #000; cursor: pointer;" onclick="addSignature()">
                                        <i style="color: #733DD9;" class="far fa-plus-square"></i> Add Signature</a>
                                        <input type="file" id="imguploadsign" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="seventh_part text-center pb-4">
                <div class="row">
                    <div class="col-md-12 m-2">
                        <h6 class="pb-2" style="color: #51618A;" >Your Contact Details</h6>
                        <label for="">For any enquiry, reach out via email at</label>
                        <input type="email" id="enquiryemailid" placeholder="email here">
                        <label for="">or call on</label>
                        <input type="text" id="enquiryphoneid" placeholder="+880">
                    </div>
                </div>
                <a id="submitBtnid" style="background-color: #733DD9; color: #ddd;" class="btn">Save & Continue</a>
            </div>


        </div>

    </section>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/jquery.js")?>"></script>
    <script src="<?= base_url("assets/jquery-ui.js")?>"></script>
    <script src="<?= base_url("assets/myscript.js")?>"></script>
    <script src="<?= base_url("assets/addfields.js")?>"></script>
    
    <script>
    var grandTotal=0;
        $('#submitBtnid').click(function(){
    //first part starts
    //var quotationNoField= $('#quotationNoField').val();
    var quotationNoValue= $('#quotationNoValue').val();
    //var quotationDate= $('#quotationDate').val();
    var datepicker= $('#datepicker').val();
    var firstPartNewItem = [];//even index is field name , odd index is field value
  
    $('.extra_fields :input').each(function(){
        
        firstPartNewItem.push($(this).val())
    })
    var firstPartobj={};
    for(i=0;i<firstPartNewItem.length;i++){
        if(firstPartNewItem[i].length>0){

             firstPartobj[firstPartNewItem[i]] = firstPartNewItem[++i];
        }
        else{
            i++;
        }
        
    }
    

    //first part ends

    //second part starts
    var country = $('#selectCountry').val()
    var yourBusinessName = $('#yourBusinessName').val();
    var yourEmail = $('#yourEmail').val();
    var yourPhone = $('#yourPhone').val()
    var yourGstin = $('#yourGstin').val()
    var yourPan = $('#yourPan').val()
    var yourAddress = $('#yourAddress').val()
    var yourCity = $('#yourCity').val()
    var yourZipCode = $('#yourZipCode').val()
    var yourState = $('#yourState').val()
    //your new item
    var secondPartNewItem=[];
    $('.extra_fields_in_details :input').each(function(){
        secondPartNewItem.push($(this).val())
    })

    var secondPartobj={};
    for(i=0;i<secondPartNewItem.length;i++){
        if(secondPartNewItem[i].length>0){

            secondPartobj[secondPartNewItem[i]] = secondPartNewItem[++i];
        }
        else{
            i++;
        }
        
    }

    var selectClientCountry = $('#selectClientCountry').val();
    var clientBusinessName = $('#clientBusinessName').val();
    var clientEmail = $('#clientEmail').val();
    var clientPhone = $('#clientPhone').val();
    var clientGstin = $('#clientGstin').val();
    var clientPan = $('#clientPan').val();
    var clientAddress = $('#clientAddress').val();
    var clientCity = $('#clientCity').val();
    var clientZipCode = $('#clientZipCode').val();
    var clientState = $('#clientState').val();
    var secondPartClientNewItem = [];
   
    $('.extra_fields_for_details :input').each(function(){
        secondPartClientNewItem.push($(this).val())
    })

    var secondPartClientobj={};
    for(i=0;i<secondPartClientNewItem.length;i++){
        if(secondPartClientNewItem[i].length>0){

            secondPartClientobj[secondPartClientNewItem[i]] = secondPartClientNewItem[++i];
        }
        else{
            i++;
        }
        
    }
   
    //second part ends

    //fourth part starts
    var fourthPartNewItems = [];//index 0 =item name,1=description,2=img,3=qty,4=rate,5=amount
    $('.add_new_item :input').each(function(){
        fourthPartNewItems.push($(this).val())
    })
    
    var fourthPartNewItemsarr=[];
    count = 0;
    var arr = {};
    for(i=0;i<fourthPartNewItems.length;i++){
        var item_amount;
       if(count==0){

           arr.item_name=fourthPartNewItems[i]
        } 
       if(count==1){

           arr.item_description=fourthPartNewItems[i]
        } 
       if(count==2){

           arr.item_photo=fourthPartNewItems[i]
        } 
       if(count==3){

           arr.item_qty=fourthPartNewItems[i]
        } 
       if(count==4){

           arr.item_rate=fourthPartNewItems[i]
        } 
       if(count==5){
           arr.item_discount=fourthPartNewItems[i]

        } 
       if(count==6){
           arr.item_discount_sign=fourthPartNewItems[i]
            // if(arr.item_discount_sign == "%"){
            //     item_amount = arr.item_qty*arr.item_rate;
            //     item_amount = item_amount- item_amount*(arr.item_discount/100);
            // }
            // else{
            //     item_amount = arr.item_qty*arr.item_rate;
            //     item_amount -= arr.item_discount
            // }
            // console.log(item_amount)
        } 
       if(count==7){
           arr.item_vat=fourthPartNewItems[i]

        } 
       if(count==8){
           arr.item_vat_sign=fourthPartNewItems[i]

        } 
       if(count==9){
        //    if(arr.item_vat_sign=="%"){
        //     item_amount =item_amount+item_amount*(arr.item_vat/100);
            
        //    }
        //    else{
        //     item_amount =item_amount+arr.item_vat;

        //    }
           arr.item_amount=fourthPartNewItems[i];
           count=-1;
           fourthPartNewItemsarr.push(arr);
           arr = {};
        //    $('.add_new_item :input:nth-child(9)').val=item_amount;
        } 
        count++;
    }
    var total_items_amount = $('#total_items_amount').val();
    //fourth part ends

    //fifth part starts
    var discountValue;
    var discountSelect;
    if($('#adddiscountid').has("input").length>0){
        discountValue = $('#discountvalueid').val()
        discountSelect = $('#discountselectid').val()
    }
    var fifthPartAddAdditionalcharge = [];///even index is field name , odd index is field value
    $('.add_additional_charge :input').each(function(){
        fifthPartAddAdditionalcharge.push($(this).val())
    })
    var fifthPartAddAdditionalchargeobj={};
    for(i=0;i<fifthPartAddAdditionalcharge.length;i++){
        if(fifthPartAddAdditionalcharge[i].length>0){

            fifthPartAddAdditionalchargeobj[fifthPartAddAdditionalcharge[i]] = fifthPartAddAdditionalcharge[++i];
        }
        else{
            i++;
        }
        
    }
    
    //fifth part ends

    //sixth part starts
    var sixthPartTermsCondition = [];
    $('.terms_condition :input').each(function(){
        sixthPartTermsCondition.push($(this).val())
    })




    var addNotes;
    if($('.add_notes').has('textarea').length>0){
        addNotes=$('#addnotevalueid').val();
    }

    // sixthPartTermsCondition.push(addNotes);
    // console.log(sixthPartTermsCondition)
    var imguploadsign=$('#imguploadsign').val();
    
    //sixth part ends

    //seventh part starts
    var enquiryemail=$('#enquiryemailid').val()
    var enquiryphoneid=$('#enquiryphoneid').val()
    //seventh part ends
    
    //check null value

    if(quotationNoValue.length<2){
        alert("quotationNoValue not found");
        
    }
    else if(datepicker.length<2){
        alert("datepicker not found");

    }
    
    //first part ends
    // else if(country.length<2){
    //     alert("country not found");

    // }
    // else if(yourBusinessName.length<2){
    //     alert("yourBusinessName not found");

    // }
    // else if(yourEmail.length<2){
    //     alert("yourEmail not found");

    // }
    // else if(yourPhone.length<2){
    //     alert("yourPhone not found");

    // }
    // else if(yourGstin.length<2){
    //     alert("yourGstin not found");

    // }
    // else if(yourPan.length<2){
    //     alert("yourPan not found");

    // }
    // else if(yourAddress.length<2){
    //     alert("yourAddress not found");

    // }
    // else if(yourCity.length<2){
    //     alert("yourCity not found");

    // }
    // else if(yourZipCode.length<2){
    //     alert("yourZipCode not found");

    // }
    // else if(yourState.length<2){
    //     alert("yourState not found");

    // }
    
    // //second part ends
    // else if(selectClientCountry.length<2){
    //     alert("selectClientCountry not found");

    // }
    // else if(clientBusinessName.length<2){
    //     alert("clientBusinessName not found");

    // }
    // else if(clientEmail.length<2){
    //     alert("clientEmail not found");

    // }
    // else if(clientPhone.length<2){
    //     alert("clientPhone not found");

    // }
    // else if(clientGstin.length<2){
    //     alert("clientGstin not found");

    // }
    // else if(clientPan.length<2){
    //     alert("clientPan not found");

    // }
    // else if(clientAddress.length<2){
    //     alert("clientAddress not found");

    // }
    // else if(clientCity.length<2){
    //     alert("clientCity not found");

    // }
    // else if(clientZipCode.length<2){
    //     alert("clientZipCode not found");

    // }
    // else if(clientState.length<2){
    //     alert("clientState not found");

    // }
    // //third part ends
    // else if(fourthPartNewItems.length<1){
    //     alert("fourthPartNewItems not found");

    // }
    // //fourth part ends
    // else if(sixthPartTermsCondition.length<1){
    //     alert("sixthPartTermsCondition not found");

    // }
    
    // //sixth part ends
    // else if(enquiryemail.length<1){
    //     alert("enquiryemail not found");

    // }
    // else if(enquiryphoneid.length<1){
    //     alert("enquiryphoneid not found");

    // }
    
    // //seventh part ends
    else{

        
        
        
        
        //signin check
        
        $.ajax({
            url: '<?= base_url('/signincheck') ?>',
            method: 'post',
            data: { 
                    "quotationNoValue":quotationNoValue,
                    "quotationDate":datepicker,
                    //
                    "user_country":country,
                    "user_name":yourBusinessName,
                    "user_email":yourEmail,
                    "user_phone_no":yourPhone,
                    "yourGstin":yourGstin,
                    "yourPan":yourPan,
                    "user_address":yourAddress,
                    "user_city":yourCity,
                    "user_postal_zip":yourZipCode,
                    "yourState":yourState,
                    //
                    "client_country":selectClientCountry,
                    "client_name":clientBusinessName,
                    "client_email":clientEmail,
                    "client_phone_no":clientPhone,
                    "clientGstin":clientGstin,
                    "clientPan":clientPan,
                    "client_address":clientAddress,
                    "client_city":clientCity,
                    "client_postal_zip":clientZipCode,
                    "clientState":clientState,
                    //
                    "firstPartNewItem":firstPartobj,
                    "secondPartNewItem":secondPartobj,
                    "secondPartClientNewItem":secondPartClientobj,
                    //
                    "fourthPartNewItems":fourthPartNewItemsarr,
                    "fifthPartAddAdditionalcharge":fifthPartAddAdditionalchargeobj,
                    "discountValue":discountValue,
                    "discountSelect":discountSelect,
                    "sixthPartTermsCondition":sixthPartTermsCondition,
                    "addNotes":addNotes,
                    "totalItemsAmount":total_items_amount

                },
            success: function (response) {
                
                if(response=="not login"){
                    location.href="/signin";
                }
                else{
                                        
                }
                
                
            },
            error: function (err) {
                
            }
        })
        
        
    }

});

    </script>


</body>
</html>