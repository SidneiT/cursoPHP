<?php
echo '<pre>';
 
if( $_POST ) {
	print_r( $_FILES );
	
	echo '<hr>';
	var_dump( is_uploaded_file( $_FILES['arquivo']['tmp_name'] ) );
	
	move_uploaded_file($_FILES['arquivo']['tmp_name'], "./{$_FILES['arquivo']['name']}");
}

?>
<hr>
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
	<input type="file" name="arquivo">
	<br>
	<input type="submit" value="Enviar">
</form>