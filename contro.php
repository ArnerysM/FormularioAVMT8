<?php
class Controlador
{
	public function Index() {
		// se crea un objeto de la clase classdb que contiene los metodos correspondientes para la conexion a la bd
		$db = new classdb();
		// se realiza la conexión a la bd
		$conex=$db->conectar();
		// se inicializa la variable que contendrá la consulta a realizar
		$sql="SELECT * FROM datos_personales";
		// se realiza la consulta y se guarda el resultado
		$res=mysqli_query($conex, $sql);
		// se guarda la cantidad de campos (columnas) que contiene el resultado
		$campos=mysqli_num_fields($res);
		// se guarda la cantidad de filas que contiene el resultado
		$filas=mysqli_num_rows($res);
		// se inicializa una variable que será el índice para de las filas
		$i=0;
		// se inicializa un arreglo que contedrá la información del resultado
		$datos[]=array();

		while($data=mysqli_fetch_array($res)){
			// se inicializz el bucle que irá de campo por campo
			for ($j=0; $j < $campos; $j++) {
				// se guarda la información contenida en el resultado al arreglo
				$datos[$i][$j]=$datos[$j]; 
			}
			// aumenta el contador del bucle "while"
			$i++;
		}
		// una vez realizado todo el proceso, se cierra la conexión a la bd
		mysqli_close($conex);
		header("Location: index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	}
}
?>