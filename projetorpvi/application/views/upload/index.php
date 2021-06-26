<div class="row" style="padding-top: 1px">
        <!-- <h3>Midias</h3> -->

        <?php echo form_open_multipart('ImageUploadController/image_upload/'); ?>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first">Descrição da Imagem</label>
                        <input type="text" class="form-control" placeholder="" name="alt" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="first">Selecione um arquivo</label>
                        <input type="file" name="pic" required>
                    </div>
                </div>
            </div>

            <input type="hidden" name="amostra_id" value="<?php echo $amostra_id ?>">

            <div class="row">
                <div class="col-lg-12">
                    <button name="submit" class="btn btn-primary" type="submit" id="img-submit" data-submit="...Enviando">Submit</button>
                </div>
            </div>
        </form>
</div>

<!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" /> -->
<!-- load jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

<!-- <script>
    var form_data = $(this).serialize();
    var form_url = $(this).attr("action");
    var form_method = $(this).attr("method");

    $(document).ready(function() {
        // evento de "submit"
        $("#img-submit").click(function(event) {
            // parar o envio para que possamos faze-lo manualmente.
            event.preventDefault();
            // document.location.reload(true);
           
            // capture o formulário
            var form = $('#midias')[0];
            // crie um FormData {Object}
            var data = new FormData(form);
            // caso queira adicionar um campo extra ao FormData
            // data.append("customfield", "Este é um campo extra para teste");
            // desabilitar o botão de "submit" para evitar multiplos envios até receber uma resposta
            // $("#img-submit").prop("disabled", true);
            // processar
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: form_url,
                data: data,
                processData: false, // impedir que o jQuery tranforma a "data" em querystring
                contentType: false, // desabilitar o cabeçalho "Content-Type"
                cache: false, // desabilitar o "cache"
                timeout: 600000, // definir um tempo limite (opcional)
                // manipular o sucesso da requisição
                success: function() {
                    // console.log(data);
                    // reativar o botão de "submit"
                    // $("#img-submit").prop("disabled", false);
                    alertify.success('item saved successfully');
                    
                },
            });
        });
    });
</script> -->
