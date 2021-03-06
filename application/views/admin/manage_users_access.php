<style type="text/css">
	.userAccsssCheckbox{
		    position: absolute;
		    z-index: 2993;
		    margin-left: -91px !important;
		    margin-top: 7px !important;
			}
</style>
<?php
$this->load->view('templates/headers/admin_header', $title);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Admin</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url(); ?>/admin">Admin</a>
            </li>
            <li class="active">
                <strong>Manage Users Access</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
	    <form  class="form-inline">
		    <div class="btn_filter_placeholder">
				<div class="form-group">
		    		<input type="text" class="form-control form-username" placeholder="Search by username" />
				</div>
				<button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i></button>
		    </div>
	    </form>
    </div>
</div>
<div class="col-lg-12 block_form">
    <div class="ibox-content-no-bg">
	    <?php
		if(isset($_GET["action"])) {
			if($_GET["action"] == "deleted_user") {
			?>
			<div class="alert alert-success alert-centered">
				This user account has been deleted.
			</div>
			<?php
			}
		}  
		?>
		<div id="userslst" class="clearfix">
			<div class="form-group row">
				<label for="select_all_users" class="col-md-2">Select All Users</label><div class="col-md-1"> <input type="checkbox" id="select_all_users" class="form-control" name=""></div>
			</div>
			<?php
	    	$cpt = 1;
	    	?>
	    	<?php foreach($users as $user): ?>
	    	
	    	<?php
	    	$birthdate = new DateTime($user["birthday"]);
			$today     = new DateTime();
			$interval  = $today->diff($birthdate);
			$age	   = $interval->format('%y');
			
			if($user["gender"] == 0) {
				$gender_color = "male_color";
			} else {
				$gender_color = "female_color";
			}
			
			if($user["thumb_url"] == "" || $user["thumb_url"] == NULL) {
				$user["thumb_url"] = "images/avatar.png";
			}
		
			?>
	    	
			<div class="col-lg-3 col-md-4 col-xs-6 clearfix user_block" data-user-id="<?php echo $user["uid"]; ?>" data-cpt="<?php echo $cpt; ?>">
				<div class="thumb">
					<input type="checkbox" name="" class="form-control userAccsssCheckbox">
					<a class="thumbnail" href="<?php echo base_url(); ?>user/profile/<?php echo $user["uid"]; ?>">
		                <?php
			            if($user["is_fake"] == 1):   
			            ?>
		                <img src="<?php echo $user["thumb_url"]; ?>" alt="Photo User" />
		                <?php
			            else:
			            ?>
			            <img src="<?php echo base_url() . $user["thumb_url"]; ?>" alt="Photo User" />
			            <?php
				        endif;
				        ?>
		                <?php
			                if($user["is_online"] == 1):
			            ?>
		                <div class="online_status"><i class="fa fa-circle"></i></div>
		                <?php
			                endif;
			            ?>
	               	</a>
				   	<div class="userslst_infos">
					   	<a href="<?php echo base_url(); ?>user/profile/<?php echo $user["uid"]; ?>" class="userslst_username <?php echo $gender_color; ?>"><?php echo $user["username"]; ?></a>
					   	<div class="userslst_age"><?php echo $age; ?> &#8226; <?php echo get_country_name_by_code($user["country"]); ?></div>
					   <?php /*	<div class="row">
						   	<div class="col-md-6 btndelete">
							   	<a href="" class="btn btn-danger btn-delete-user" data-user-id="<?php echo $user["uid"]; ?>"><i class="fa fa-times"></i> <span>Delete</span></a>
						   	</div>
						   	<div class="col-md-6 btnedit">
							   	<a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $user["uid"]; ?>" class="btn btn-info btn-edit-user"><i class="fa fa-pencil"></i> <span>Edit</span></a>
						   	</div>
					   	</div> */ ?>
					</div> 
				</div>
            </div>
			<?php
			$cpt++;
			endforeach;
			?>
		</div>
		<?php
		if($links != ""):
		?>
		<div class="btnmoreplaceholder message">
			<?php echo $links; ?>
		</div>
		<?php
		endif; 
		?>
    </div>
    <div class="row">
		<label for="select_all_access" class="col-md-2">Enable All Access</label>
		<div class="col-md-1"> <input type="checkbox" id="select_all_access" class="form-control" name=""></div>
    </div>
    <div class="row">
    	<div class="col-md-1"> <input type="checkbox" id="browse_profiles_page" class="form-control" name=""></div>
    	<div class="col-md-10">
    		<label for="browse_profiles_page">Visit Browse Profiles At Home Link</label>
    	</div>	
    </div>
    <div class="row">
    	<div class="col-md-1"> <input type="checkbox" id="friends_page" class="form-control" name=""></div>
    	<div class="col-md-10">
    		<label for="friends_page">Visit Friends At Home Link</label>
    	</div>	
    </div>
    <div class="row">
    	<div class="col-md-1"> <input type="checkbox" id="premium_page" class="form-control" name=""></div>
    	<div class="col-md-10">
    		<label for="premium_page">Visit Premium At Home Link</label>
    	</div>	
    </div>
    <div class="row">
    	<div class="col-md-1"> <input type="checkbox" id="page_encounters_access" class="form-control" name=""></div>
    	<div class="col-md-10">
    		<label for="page_encounters_access">Can Visit Encounter Page after login</label>
    	</div>	
    </div>
    <div class="row">
    	<div class="col-md-1"> <input type="checkbox" id="page_matches_access" class="form-control" name=""></div>
    	<div class="col-md-10">
    		<label for="page_matches_access">Visit Matches At Home Link</label>
    	</div>	
    </div>
</div>
<?php
$this->load->view('templates/footers/admin_footer');
?>