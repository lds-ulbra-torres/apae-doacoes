<div class="well well-lg">
  <div class="page-header">
    <h2><?php echo lang('edit_user_heading');?></h2>
    <p><?php echo lang('edit_user_subheading');?></p>

  </div>
  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open(uri_string());?>

        <p class="col-md-6">
              <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
              <?php echo form_input($last_name);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_user_company_label', 'company');?> <br />
              <?php echo form_input($company);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_user_phone_label', 'phone');?> <br />
              <?php echo form_input($phone);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_user_password_label', 'password');?> <br />
              <?php echo form_input($password);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
              <?php echo form_input($password_confirm);?>
        </p>

        <?php if ($this->ion_auth->is_admin()): ?>

            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <?php foreach ($groups as $group):?>
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" id="<?echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <label for="<?echo $group['id'];?>"><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></label>

            <?php endforeach?>

        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>
        <br>
        <br>
        <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), "class='btn btn-success'");?></p>

  <?php echo form_close();?>

</div>
