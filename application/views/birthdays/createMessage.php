<div class="well well-lg">
  <?= $this->session->flashdata('alert') ?>
  <div class="page-header">
    <h2>Aniversariantes</h2>

                      <div class="container">
                         <div class="row">
                                <div class="col-md-6">

                                    <form action="<?= base_url('birthdays/send')?>" method="POST">
                                    
                                    <?php foreach ($email as $key => $value) { ?>
                                        <input type="checkbox" name="checked[]" class="invisible" value="<?= $value ?>" checked>
                                        <?php } ?>
                                        
                                        <p>Título</p>
                                        <input type="text" name="subject" required>
                                        <p>Mensagem</p>
                                        <textarea name="message" cols="70" rows="20" required></textarea>
                                        
                                        <button type="submit" value="Submit">Envia</button>
                                    </form>
                                    
                                </div>

                                <div class="col-md-6">

                                    
                                    
                                </div>
            
            
                         </div> 
                    </div>
  </div>

</div>