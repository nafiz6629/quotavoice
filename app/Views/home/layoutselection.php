
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/css/all.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/layoutselection.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/owl/owl.carousel.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/owl/owl.theme.default.min.css")?>">
    
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


    <section class="slider_section">
        <div class="owl-carousel owl-theme">
            <?php 
                foreach($layouts as $layout){

                

            ?>
            <div class="item"> <img onclick="sliderClicked(this)"  style="height: 300px; width: 480px;" src="<?= base_url("assets/images/layouts/".$layout->layout_file_name.".png")?>" alt="<?=$layout->layout_file_name?>">
                    <a href="<?= base_url("QuotationController/set_as_default/".$layout->layout_id."")?>" class="btn btn-success">SET AS DEFAULT</a>
            </div>
            <?php 

                }
            ?>
        </div>
    </section>



    <section class="layout_image">
    <img  src="<?=base_url()?>/assets/images/layouts/layout-1.png" alt="">
    </section>

    






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/owl/owl.carousel.min.js")?>"></script>
    <script src="<?= base_url("assets/owl/jquery.mousewheel.min.js")?>"></script>
    <script>
        $(".owl-carousel").owlCarousel({
                loop:true,
                nav:true,
                margin:10,
                
            })

    </script>

    <script>
       function sliderClicked(item){
            $('.layout_image').empty();
            $('.layout_image').append('<img  src="<?=base_url()?>/assets/images/layouts/'+item.alt+'.png" alt="">');
            // console.log(item.alt);
       }


    </script>
    
</body>
</html>