<div class="well well-lg">
  <div class="page-header">
    <h2><?php echo lang('create_group_heading');?></h2>
    <p><?php echo lang('create_group_subheading');?></p>
  </div>

  <div class="text-danger" id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/create_group");?>

        <p>
              <?php echo lang('create_group_name_label', 'group_name');?> <br />
              <?php echo form_input($group_name);?>
        </p>

        <p>
              <?php echo lang('create_group_desc_label', 'description');?> <br />
              <?php echo form_input($description);?>
        </p>

        <p><?php echo form_submit('submit', lang('create_group_submit_btn'), "class='btn btn-success'");?></p>

  <?php echo form_close();?>
</div>
