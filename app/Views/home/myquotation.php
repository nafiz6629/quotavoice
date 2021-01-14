<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/signin.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/all.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/jquery-ui.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/jquery-ui.theme.css")?>">
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
                   echo '<a class="text-white nav-item nav-link" href="'.base_url("QuotationController/my_quotation").'" >My Quotations</a>';
                            }
                            ?>
                    <a class="text-white nav-item nav-link"  href="<?=base_url("/invoice")?>" >Invoice</a>
                    <!--  -->
                    <?php 
                            $session = session();
                            if($session->get("loginemail")){
                               echo '<a class="text-white btn btn-danger nav-item nav-link"  href="'.base_url("/logout").'" >Logout</a>';
                               
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

    <section class="myquotation_section">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Quotation No</th>
                    <th scope="col">Quotation Date</th>
                    <th scope="col">Select Layout</th>
                    <th scope="col">Print</th>
                </tr>
            </thead>
            <tbody>
                <?php 


                ?>
                <?php 
                $count=0;
                $filename= $user_layout[0]->layout_file_name;
                foreach($data as $value){
                    $quotaion_info  = json_decode($value->quotation_info);
                    $count++;
                
                ?>
            
                    <tr>
                        <th scope="row"><?= $count; ?></th>
                        <td><?= $value->client_email ?></td>
                        <td><?= $quotaion_info->quotation_no ?></td>
                        <td><?= $quotaion_info->quotation_date ?></td>
                        <td>
                            <!-- <a class="mr-5" href="<?= base_url("QuotationController/myquotation_by_id/$value->quotation_id/$value->client_id") ?>">Layout-1</a> -->
                            
                        <a class="d-inline btn btn-primary" href="<?= base_url("QuotationController/view_layout_selection") ?>" >layouts</a>
                        
                        </td>
                        <td>
                        <a href="<?= base_url("QuotationController/myquotation_by_id/$value->quotation_id/$value->client_id/$filename") ?>" class="d-inline btn btn-primary" >print</a>

                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    

    </section>








    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/jquery.js")?>"></script>
    <script src="<?= base_url("assets/jquery-ui.js")?>"></script>

    
</body>
</html>