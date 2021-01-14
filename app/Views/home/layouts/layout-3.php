<?php 

// $fmt = numfmt_create( 'de_DE', NumberFormatter::CURRENCY );\
$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/quotation.css")?>">

    <title>quotation</title>
</head>
<body class="quotation_body" onload="window.print()">

    <section class="header_section">

        <div class="row">
            <div class="col-md-3">
                <h4 style="color: #7e1111;">Quotation</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Quotation#</label>
                        <br>
                        <label for="">Quotation Date</label>
                    </div>
                    <div class="col-md-6">
                        <h6>QTY--38</h6>
                        <br>
                        <h6>01-05-2021</h6>
                    </div>
                </div>

            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3 text-right ">
                <img height="180px" src="data:image/png;base64,<?=$user[0]->user_business_logo?>" alt="">
                
            </div>
        </div>


    </section>

    <section style="margin: 5px 0;" class="information_section">

        <div class="row">
            <div class="col-md-5 rounded" style="background: #EFEAF8;">
                <h4 style="color: #7e1111;">Quotation From</h4>
                <h6><?=$user[0]->user_name?></h6>
                <p><?=$user[0]->user_address?></p>
                <p><?=$user[0]->user_city?>-<?=$user[0]->user_postal_zip?>,<?=$user[0]->user_country?></p>
                <h6 class="d-inline">Email:</h6>
                <p class="d-inline"><?=$user[0]->user_email?></p>
                <br>
                <h6 class="d-inline">Phone:</h6>
                <p class="d-inline"><?=$user[0]->user_phone_no?></p>
            </div>
            <div class="offset-md-2"></div>
            <div class="col-md-5 rounded" style="background: #EFEAF8;">
                <h4 style="color: #7e1111;">Quotation To</h4>
                <h6><?=$client[0]->client_name?></h6>
                <p><?=$client[0]->client_address?></p>
                <p><?=$client[0]->client_city?>-<?=$client[0]->client_postal_zip?>,<?=$client[0]->client_country?></p>
                <h6 class="d-inline">Email:</h6>
                <p class="d-inline"><?=$client[0]->client_email?></p>
                <br>
                <h6 class="d-inline">Phone:</h6>
                <p class="d-inline"><?=$client[0]->client_phone_no?></p>

            </div>
        </div>


    </section>

    <section class="items_part mt-2">
        <div class="row rounded" style="background: #7e1111;">
                <div class="col-md-7 text-white">Item</div>
                <div class="col-md-1 text-white text-right">Quantity</div>
                <div class="col-md-1 text-white text-right">Rate</div>
                <div class="col-md-1 text-white text-right">Discount</div>
                <div class="col-md-2 text-white text-right">Amount</div>
        </div>
        <?php

            $json= json_decode($quotation[0]->quotation_item_details);
            $count=0;
            $items_total_amount=0;
            foreach($json[0] as $value){
               // echo $value->item_name;
            $items_total_amount +=$value->item_amount;
            $count++;
            if($count%2==0){
                $color = "#EFEAF8";
            }
            else{
                $color = "#fff";
            }
        ?>
        <div class="row pb-5 border-bottom" style="background: <?=$color?>;" >
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12"><?=$count?>. <?=$value->item_name?></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><?=$value->item_description?></div>
                </div>
            </div>
            <div class="col-md-1 text-right"><?=$value->item_qty?></div>
            <div class="col-md-1 text-right"><?=$value->item_rate?></div>
            <div class="col-md-1 text-right"><?=$value->item_discount?><?=$value->item_discount_sign?></div>
            <div class="col-md-2 text-right"><?=$value->item_amount?></div>
            
        </div>
        <?php
            }
        ?>
    </section>

    <section class="item_amount_part mt-1">
            <div class="row">
                <div class="col-md-8"><h6>Total in Words :<?php echo $f->format( $items_total_amount);?></h6></div>
                <div class="col-md-4">
                    <div class="row text-right">
                        <div class="col-md-6"><h6>Sub Total :</h6></div>
                        <div class="col-md-6"><h6>BDT <?=$items_total_amount?></h6></div>
                    </div>
                    <div class="row text-right">
                        <div class="col-md-6"><h6>Discount(<?=$json[2]?><?=$json[3]?>) :</h6></div>
                        <?php
                            if($json[3]=="%"){
                                $items_total_amount = $items_total_amount-$items_total_amount*($json[2]/100);
                            }
                        ?>
                        <div class="col-md-6"><h6>BDT <?=number_format($items_total_amount, 2, '.', '')?></h6></div>
                    </div>
                    <?php

                        foreach($json[1] as $key=>$value)
                        {

                        

                    ?>
                    <div class="row text-right">
                        <div class="col-md-6"><h6><?=$key?>:</div>
                        <div class="col-md-6"><h6><?=$value?></div>
                    </div>

                   <?php } ?>
                   <div class="row text-right border-top">
                        <div class="col-md-6"><h6>Total:</div>
                        <div class="col-md-6"><h6>BDT <?=$quotation[0]->quotation_total?></div>
                    </div>
                </div>
            </div>
    </section>


    <section class="terms_part mt-2">

        <h5 style="color: #7e1111;">Terms and Conditions</h5>
        <?php
        $json_terms = json_decode($quotation[0]->quotation_terms_cond);
        foreach($json_terms->quotation_terms_cond as $terms){
            ?>
            <p class="ml-2"><?=$terms?></p>
            <?php
        }

        ?>

    </section>



    <section class="last_part text-center mt-2">
            <p class="d-inline">For any enquiry, reach out via email at
            <h6 class="d-inline"> <?=$user[0]->user_email?></h6>
            <p class="d-inline">or call on</p>
            <h6 class="d-inline"><?=$user[0]->user_phone_no?></h6>
    </section>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/jquery.js")?>"></script>
    
    
</body>
</html>