<div class="well well-lg">
  <div class="page-header">
    <h2><?php echo lang('edit_group_heading');?></h2>
    <p><?php echo lang('edit_group_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>
  </div>

  <?php echo form_open(current_url());?>

        <p class="col-md-6">
              <?php echo lang('edit_group_name_label', 'group_name');?> <br />
              <?php echo form_input($group_name);?>
        </p>

        <p class="col-md-6">
              <?php echo lang('edit_group_desc_label', 'description');?> <br />
              <?php echo form_input($group_description);?>
        </p>

        <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), "class='btn btn-success'");?></p>

  <?php echo form_close();?>
</div>
