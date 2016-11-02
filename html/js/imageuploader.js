jQuery(document).ready(function(){
	jQuery('.buttonupload').click(function(){
		
		tb_show(' ','media-upload.php?post_id=74&type=image&TB_iframe=1');
		return false;
	});
	window.send_to_editor = function(html){
		
		var imagelinke = jQuery('img',html).attr('src');
		jQuery('.image-field-class').val(imagelinke);
		tb_remove();
		
		
	}
	
});