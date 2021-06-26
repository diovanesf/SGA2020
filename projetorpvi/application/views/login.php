<!DOCTYPE html>
<html lang="pt-br">

<head>
   <title>Sistema Gerenciador - Laboratorio Viriologia Uruguaiana</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Sistema para gerenciamento do Laboratorio de Viriologia de Uruguaiana">
   <meta name="author" content="Unipampa">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
</head>

<body>
   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100">
            <form class="login100-form validate-form" role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>authentication/login/">
               <span class="login100-form-title">
                  Autenticação
               </span>
               <div class="wrap-input100 validate-input" data-validate="Um email valido é requerido: professor@unipampa.edu.br">
                  <input class="input100" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                  </span>
               </div>
               <div class="wrap-input100 validate-input" data-validate="Senha requerida">
                  <input class="input100" id="password" placeholder="Senha" name="password" type="password" value="">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
               </div>
               <div class="container-login100-form-btn">
                  <button class="login100-form-btn"  type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                     Acessar
                  </button>
               </div>
               <div class="text-center p-t-12">
                  <a class="txt2" data-toggle="modal" data-target="#forgot" href="#forgot">
                     Esqueci minha senha?
                  </a>
                  <!-- Retorna msg sucesso ou falha para recuperacao email -->
                  <strong>
                     <p class='flashMsg flashSuccess text-center' style="color: #2ce14a"> <?= $this->session->flashdata('flashSuccess') ?> </p>
                  </strong>
                  <strong>
                     <p class='flashMsg flashFail text-center' style="color: #ff4d4d"> <?= $this->session->flashdata('flashFail') ?>
                     </p>
                  </strong>
                  <strong>
                     <p class='flashMsg flashSuccess text-center' style="color: #2ce14a"> <?= $this->session->flashdata('flashCreated') ?> </p>
                  </strong>
                  <strong>
                     <p class='flashMsg flashFail text-center' style="color: #ff4d4d"> <?= $this->session->flashdata('flashError') ?>
                     </p>
                  </strong>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="ModalForgot" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="ModalForgot">Esqueceu sua Senha?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form role="form" method="POST" action="<?= base_url() ?>recuperar_senha">
                  <fieldset>
                     <div class="form-group">
                        <input required class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="" autofocus>
                     </div>
                     <div>Uma senha temporária será enviada para o seu endereço de email.</div>
                  </fieldset>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" type="submit" data-dismiss="modal">Fechar</button>
               <input id="login-submit" type="submit" class="btn btn-primary" value="Enviar Senha">
            </div>
            </form>
         </div>
      </div>
   </div>
   <script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
   <script>
      $('.js-tilt').tilt({
         scale: 1.1
      })
   </script>
</body>

</html>