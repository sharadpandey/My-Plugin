<?php
	/*
		Plugin Name: Add Css and Js 
		Description: Add Css and Js File into the theame Header and Footer
		Author: Sharad
	*/
	
	/*************** Add Plugin into the menu *******************/
	
	function addCssAndJsFiles() 
	{  
		add_menu_page("Add Css and Js","Add Css and Js",1,"addcssandjs","");
		add_submenu_page("addcssandjs","addcssandjs","Add Css and Js",8,"addcssandjs","addcssandjs");
	}  
	add_action('admin_menu','addCssAndJsFiles'); 
	
	/***************Add Plugin into the menu*******************/
	
	
	
	/***************Plugin Activation*******************/
	
		function addCssAndJs_Plugin_install() 
		{
			global $wpdb;
			$table_name = $wpdb->prefix .'add_css_js';
			include( ABSPATH . 'wp-config.php');
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE ".$table_name." (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				name varchar(1550) DEFAULT '' NOT NULL,
				cssUrl varchar(1550) DEFAULT '' NOT NULL,
				jsUrl varchar(1550) DEFAULT '' NOT NULL,
				status varchar(10) DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			)
			$charset_collate;";
			dbDelta( $sql );
			
			
			$plugin_url = plugin_dir_url( __FILE__ );
			$main_dir_path = plugin_dir_path(__FILE__).'packages/';
			$folders = glob($main_dir_path."*", GLOB_ONLYDIR);
			foreach ($folders as $folder)
			{
				// Sort in descending order
				$files = scandir($folder,1);
			
				$folder_name=basename($folder);
				
				foreach($files as $file_name)
				{
					if($file_name != '.' && $file_name != '..')
					{
						//echo $file_name;
						$fext = pathinfo($file_name, PATHINFO_EXTENSION);
						$fname=basename($file_name,".".$fext);
						
						
						$file_path_for_db=$plugin_url .'packages/'.$folder_name.'/'.$file_name;
						
						//insert data into table process
						global $wpdb;
						$table_name = $wpdb->prefix .'add_css_js';
						
						$db_table_results = $wpdb->get_var("SELECT count(id) FROM `".$table_name."` WHERE `name`='".$folder_name."' ");
						
						if($fext=='js')
						{
							if($db_table_results < 1)
							{	
								$wpdb->insert($table_name, array('name' => $folder_name,'cssUrl' =>'','jsUrl' =>$file_path_for_db,'status' => '0'));
							}
							else
							{
								$wpdb->query("UPDATE `".$table_name."` SET `jsUrl`='".$file_path_for_db."' WHERE name='".$folder_name."'");
							}
						}
						else
						{
							
							if($db_table_results < 1)
							{	
								$wpdb->insert($table_name, array('name' => $folder_name,'cssUrl' =>$file_path_for_db,'jsUrl' =>'','status' => '0'));	
							}
							else
							{
								$wpdb->query("UPDATE `".$table_name."` SET `cssUrl`='".$file_path_for_db."' WHERE name='".$folder_name."'");
							}
						}

					}
				}
			}
			
		}
		register_activation_hook( __FILE__, 'addCssAndJs_Plugin_install' );
		
	/***************Plugin Activation*******************/
	
	
	/***************Plugin Deactivation*******************/

		function addCssAndJs_Plugin_uninstall() {
			global $wpdb;
			$table_name = $wpdb->prefix .'add_css_js';
			$sql = "DROP TABLE IF EXISTS ".$table_name ."";
		 
			$wpdb->query($sql);
		}
		register_deactivation_hook( __FILE__, 'addCssAndJs_Plugin_uninstall' );
		
    /***************Plugin Deactivation*******************/
	
	
	
	/***************Plugin front end section*******************/
	function addcssandjs()
	{
		include('../wp-config.php');
		
		$plugin_url = plugin_dir_url( __FILE__ );

	?>
		<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/style.css' type='text/css'/>
		<link rel='stylesheet' href='<?php echo $plugin_url; ?>css/bootstrap.min.css' type='text/css'/>
		<script src="<?php echo $plugin_url; ?>js/bootstrap.min.js"></script>
		<script src="<?php echo $plugin_url; ?>js/jquery.validate.js"></script>
		<script src="<?php echo $plugin_url; ?>js/form.js"></script>
		<script src="<?php echo $plugin_url; ?>js/custom.js"></script>
		
		<div class="box-container">
			<input type="hidden" class="cls_fullthemepath" value="<?php echo get_template_directory_uri(); ?>" />
			<input type="hidden" class="cls_website_url" value="<?php echo get_site_url(); ?>" />
			<input type="hidden" class="cls_plugin_url" value="<?php echo $plugin_url; ?>" />
			
			<div class="bx-innr">
				
				<form action="" method="post" enctype="multipart/form-data">
					<h1> WHICH PACKAGE YOU WANT TO ADD </h1>
					<fieldset data-role="controlgroup">
						
						<legend>Packages are:</legend>
						<?php 
							$i=1;
							$dir_path = plugin_dir_path(__FILE__).'packages/';
							$folders = glob($dir_path."*", GLOB_ONLYDIR);
							foreach ($folders as $folder)
							{
								$folder_name=basename($folder);
							?>	
								<p><input type="checkbox" name="checkbox[]" id="checkbox-<?php echo $i;?>" class="custom" value="<?php echo $folder_name;?>"/>
								<label for="checkbox-1"><?php echo $folder_name;?></label></p>
							<?php
							}
						?>
					</fieldset>
					</br>
					<input type="submit" name="submit" class="cls_btn_submit" value="SAVE">
				</form>
				
				
			</div>
		</div>
	<?php
	}
	/***************Plugin front end section*******************/
	
?>