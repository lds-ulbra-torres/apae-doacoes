<div class="well well-lg container">
  <?= $this->session->flashdata('alert') ?>
    <div class="page-header">
		<h2>Aniversariantes</h2>
    </div>

        <div class="row col-sm-12">
            <form action="<?= base_url('birthdays/send')?>" method="POST" enctype="multipart/form-data">
                
                <?php foreach ($email as $key => $value) { ?>
                    <input type="checkbox" name="checked[]" class="invisible" value="<?= $value ?>" checked>
                <?php } ?>
                
                <div class="row col-sm-8">
                    <div class="form-group row">
                        <label for="titulo_birthday" class="col-sm-3 col-form-label"> Título </label>
                        <div class="col-sm-8">              
                            <input type="text" name="subject" required class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="msg_birthday" class="col-sm-3 col-form-label"> Mensagem </label>
                        <div class="col-sm-8">   
                            <textarea name="message" cols="70" rows="10" class="form-control"></textarea>                           
                        </div>
                    </div>
                    
                        <input type="file" class="file"
                        id="photo_birthdays" name="photo_birthdays"
                        placeholder="Imagem Email" required/>
                        <br/>
                   
                    <button type="submit" class="btn btn-success" value="Submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
                
</div>

            