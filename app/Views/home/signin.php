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
                   echo '<a class="text-white nav-item nav-link" href="<?=base_url("/myquotation")?>" >My Quotations</a>';
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
                            
                          echo '<a class="nav-item nav-link" >Hi...'.$session->get("loginemail").'</a>';
                            
                        }


                    ?>
                    <!--  -->
                </div>
            </div>
        </nav>
    
    

        <div class="signin">
            <div class="signinPart">
                <input class="form-control email" require id="emailid" placeholder="email address" type="email">
                <br>
                <input class="form-control password" require id="passwordid" placeholder="password" type="password">
                <br>
                <input class="form-control signupPart" id="phoneid" placeholder="phone no example +880" type="number">
                
            </div>
           
            <input class="form-control signinbtn" value="sign-in" type="submit">
            <a class="form-control signupbtn text-center" value="sign-up" type="submit">sign-up</a>
        
        </div>
        
    </section>








    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/jquery.js")?>"></script>
    <script src="<?= base_url("assets/jquery-ui.js")?>"></script>
    <script src="<?= base_url("assets/myscript.js")?>"></script>
    <script src="<?= base_url("assets/submitscript.js")?>"></script>
    <script>
        $('.signupbtn').click(function () {

            var email=$('#emailid').val();
            var password=$('#passwordid').val();
            var phone=$('#phoneid').val();
            if (email.length > 2 && password.length > 5 && phone.length > 10) {

                $.ajax({
                    url: '<?= base_url('/signupsubmit') ?>',
                    method: 'post',
                    data: { "email":email,"password":password,"phone_no":phone },
                    
                    success: function (response) {
                        alert("sign up successful...please sign in now");
                        location.href="/signin";

                    },
                    error: function (err) {

                    }
                });//ajax ends


            }
            else{

                $('.signin').addClass('signup-rotate');
                
                $(".signupPart").fadeIn(2200)
                setTimeout(function () { $('.signin').removeClass("signup-rotate") }, 3000)
            }

        });
    </script>
    <script>
        $('.signinbtn').click(function () {

            var email=$('#emailid').val();
            var password=$('#passwordid').val();
            if(email.length>5 && password.length>10){
                $.ajax({
                    url: '<?= base_url('/signinsubmit') ?>',
                    method: 'post',
                    data: { "email":email,"password":password },
                    
                    success: function (response) {
                        if(response=="null"){
                            console.log(response);
                        }
                        else{
                            console.log(response)
                            alert("sign in successful..");
                            location.href="/";
                        }

                    },
                    error: function (err) {

                    }
                });//ajax ends
            }
            else{

                
                
                $('.signin').toggleClass('signin-rotate');
                
                $(".signupPart").fadeOut(2200);
                setTimeout(function () { $('.signin').removeClass("signin-rotate") }, 3000)
            }



        });
    </script>
</body>
</html>