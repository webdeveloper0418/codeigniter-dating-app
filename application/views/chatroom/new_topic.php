<?php
$this->load->view('templates/headers/main_header', $title);
?>

<div class="container">
	<?php
	if($settings["ads_code"] != ""):
	?>
	<div class="ad_block">
		<?php echo $settings["ads_code"]; ?>
	</div>
	<?php
	endif;
	?>
	<div class="row">
		<div class="pull-left">
			<h3><?php echo $this->lang->line("Forum") ?></h3>
        </div>
	</div>
	<div class="row">
		<div class="main_container">
			<?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
		    <?php echo form_open($this->uri->uri_string()); ?>
			    <div class="form-group">
			    	<label class="control-label" for="inputTitle"><?php echo $this->lang->line("Title"); ?></label>
					<div class="controls">
						<input type="text" id="inputTitle" placeholder="<?php echo $this->lang->line("title_placeholder"); ?>" class="form-control" name="title" value="<?php echo set_value('title'); ?>">
					</div>
			    </div>
			    <div class="form-group">
			    	<label class="control-label" for="inputDesc"><?php echo $this->lang->line("Content"); ?></label>
					<div class="controls">
						<textarea rows="6" id="inputDesc" class="form-control form-new-topic" placeholder="<?php echo $this->lang->line("content_placeholder"); ?>" name="content"><?php echo set_value('content'); ?></textarea>
					</div>
			    </div>
			    <hr />
			    <div style="text-align:center;" class="clearfix">
			    	<button type="submit" class="btn btn-primary btn-large"><i class="fa fa-check"></i> <?php echo $this->lang->line("create_topic_btn"); ?></button>
			    </div>
		    <?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php
$this->load->view('templates/footers/main_footer');
?>