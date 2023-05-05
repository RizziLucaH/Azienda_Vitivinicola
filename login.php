<?php
$pagina="login";

//avvio session, require _db_dal_inc.php, avvio _config_inc.php
include('session_check.php');

include('header_inc.php');
?>

<?php //aggiunta style extra?>
<link rel="stylesheet" href="style/styleLogin.css">

    <?php //FORM ACCEDI-REGISTRATI?>
    <div class="section_Login">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section_Login pb-5 pt-5 pt-sm-2 text-center">
                        
                        <?php //selezione del form?>
                        <h6 class="mb-0 pb-3"><span>Accedi </span><span>Registrati</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">

                                <?php //FORM ACCEDI?>
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Accedi</h4>
                                            <form method="post" action="login_act.php">
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
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php //FORM REGISTRATI?>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section_Login text-center">
                                            <h4 class="mb-4 pb-3">Registrati</h4>
                                            <form method="post" action="login_act.php">
                                                <div class="form-group">
                                                    <input type="text" name="signup_nome" class="form-style" placeholder="Nome completo o Ragione Sociale *" id="signup_nome" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Email *" id="signup_email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="signup_piva" class="form-style" placeholder="P.Iva" id="signup_piva" autocomplete="off" onkeydown="VerificaFatt()">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="signup_indirizzo" class="form-style" placeholder="Indirizzo di Fatturazione" id="signup_indirizzo" autocomplete="off" oninput="VerificaFatt()">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>		
                                                <div class="form-group mt-2">
                                                    <input type="password" name="psw" class="form-style" placeholder="Password *" id="psw" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4" id="submit">Registrati</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php //bottone per la pagina login admin?>
                            <a href="login_admin.php">
                                <button type="submit" class="btn mt-4" id="submit">Sei un admin?</button>
                            </a>

                        </div>
                    </div>
                </div>
        </div>
    </div>

<?php //aggiunta script ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

<?php //script per verificare se ci si prova a registrare con una p.iva busogna inserire anche l'indirizzo di fatturazione?>
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