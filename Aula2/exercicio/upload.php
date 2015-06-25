<?php

echo "<pre>";
var_dump($_FILES);
echo "</pre>";
if($_FILES)
{
	foreach($_FILES as $file)
	{		
		
		//var_dump($file);
		if($file['size']>1)
		{			
			if($file['type']=="image/jpeg" or $file['type']=="image/png")
			{
				if(move_uploaded_file($file['tmp_name'], $file["name"]))
				{
					echo "Arquivo $file[name] movido com sucesso<br>";
					
					echo "<img src='$file[name]'><br>\n"; 
				}	
				else
				{
					echo "Erro ao mover arquivo $file[name]!!!<br>";	
				}
			}
			else
			{
				echo "Arquivo $file[name] tipo invalido!!!<br>";
			}
						
		}
		else
		{
			echo "Arquivo $file[name] tamanho invalido!!!<br>";
		}
		
	}
	
	
}
?>

<form enctype="multipart/form-data" action="" method="post">		
	<input type="file" name="arquivo[]"><br>	
	<input type="file" name="arquivo[]"><br>
	<input type="file" name="arquivo[]"><br>
	<input type="submit" value="Enviar">
</form>