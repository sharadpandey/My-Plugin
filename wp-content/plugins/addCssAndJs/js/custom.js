
/************************************* PLUGIN JS*********************************************/
jQuery(document).ready(function(){
	
	var fullthemepath = jQuery('.cls_fullthemepath').val();
	var website_url = jQuery('.cls_website_url').val();
	var plugin_url = jQuery('.cls_plugin_url').val();
	

	jQuery(document).on('click','.cls_btn_submit',function(e){
	e.preventDefault();	
	
		var ids = [];
		jQuery('.custom:checked').each(function(i, e) {
			var allnames=ids.push(jQuery(this).val());
		});
		jQuery.ajax({
			type: "POST",
			url: plugin_url+'/ajax/savepackagedata.php',
			
			data: {
				'ids[]': ids.join(),
				plugin_url: plugin_url,
			},
			success:function(resp){
			 //alert(resp);
				/* if( resp !="")
				{
					location.reload();
				} */
				
			}
		});
	})
});
