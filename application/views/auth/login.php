<div class="well col-md-5 col-md-offset-3">
  <div class="page-header">
    <h2><?php echo lang('login_heading');?></h2>
    <p><?php echo lang('login_subheading');?></p>
  </div>

  <div class="text-danger" id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/login");?>

    <p>
      <?php echo lang('login_identity_label', 'identity');?>
      <?php echo form_input($identity);?>
    </p>

    <p>
      <?php echo lang('login_password_label', 'password');?>
      <?php echo form_input($password);?>
    </p>

    <p>
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </p>


    <p><?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-success'");?></p>

  <?php echo form_close();?>

  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
