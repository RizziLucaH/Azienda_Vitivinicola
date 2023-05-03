<?php
$pagina="login_admin";
?>

<?php
include('session_check.php');
include('header_inc.php');
?>


<link rel="stylesheet" href="style/styleLogin.css">
    <!-- LOGIN -->
    <div class="section_Login">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <img src="img/miner.png" width="10%" alt="">
                    <div class="section_Login pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Accedi </span><span>Registrati</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                            <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">

                                        <?php
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        // <!-- -------------------------------FORM ACCEDI---------------------------------------- -->
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        ?>
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Accedi</h4>
                                            <form method="post" action="login_admin_act.php">

                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Email" id="email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" name="psw" class="form-style" placeholder="Password" id="psw" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Accedi</button>
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Password dimenticata?</a></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <div class="card-back">
                                    <div class="center-wrap">

                                        <?php
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        // <!-- -------------------------------FORM REGISTRATI------------------------------------ -->
                                        // <!-- ---------------------------------------------------------------------------------- -->
                                        ?>
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Registrati</h4>
                                            <form method="post" action="login_admin_act.php">

                                                
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email *" id="signup_email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                

                                                <div class="form-group mt-2">
                                                    <input type="password" name="psw" class="form-style" placeholder="Password *" id="psw" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <!-- <p class="form-style">* Campi obbligatori</p> -->
                                                <button type="submit" class="btn mt-4" id="submit">Registrati</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            W&M
                            <br>
                            Winers & miners united
                        </div>
                    </div>
                </div>
        </div>
    </div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script>
    function VerificaFatt(){
        $(document).ready(function(){
            let fatt= $("#signup_indirizzo").val();
            let piva=$("#signup_piva").val();
            console.log(piva);
            console.log(fatt);
            if(piva!="" && fatt=="" ){
                $("#submit").prop('disabled',"true");
                $("#signup_indirizzo").css("border","4px dotted red")
                console.log("VERO");
            }else{$("#submit").removeAttr('disabled'); $("#signup_indirizzo").css("border","none"); console.log("FLS");}
        });
    }
</script>

<?php include('_footer_inc.php');?>