<?php
 
class BD  
{
private $pdo;//variable para realizar la conexion a la base de datos
//realizado por mo
public function __construct()
{
	$dbHost = 'localhost';
    $dbName = 'climalaboral';
    $dbUser = 'root';
    $dbPass = '';

    	//try catch en caso de error de conexión
		try {
		      $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8",
		                           $dbUser, $dbPass);
		      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		    } catch(Exception $e) {
		      echo $e->getMessage();
		    }
}//fin de constructor


//El insertvideo lorealizamos directo en registr videos
public function RegistroPreguntas($preguntaFinal, $valor, $iden)
{

$sql = "INSERT INTO pregunta(pregunta, valor, iden) VALUES (:pregunta, :valor, :iden)";


       $query = $this->pdo->prepare($sql);
         $query->bindParam(":pregunta", $preguntaFinal);
         $query->bindParam(":valor", $valor);
         $query->bindParam(":iden",$iden);

           $query->execute();


}
public function ContarDimensiones()
{
  return $this->pdo->query("SELECT * FROM campos ORDER BY id asc");
}
public function RegistroResultados($Respuesta, $Clave, $Number, $Id, $Cuestion)
{

$sql = "INSERT INTO respuestas(respuesta, clave, Numero, IDpregunta, Pregunta) VALUES (:Respuestas, :Clave, :Numbero, :Id, :Cuestion)";


       $query = $this->pdo->prepare($sql);
       $query->bindParam(":Respuestas", $Respuesta);
       $query->bindParam(":Clave", $Clave);
       $query->bindParam(":Numbero", $Number);
       $query->bindParam(":Id", $Id);
       $query->bindParam(":Cuestion", $Cuestion);
       
           $query->execute();
}
public function MostrarPreguntasTodas()
{
  return $this->pdo->query("SELECT * FROM pregunta");
}
public function MostrarCamposTodos()
{
  return $this->pdo->query("SELECT * FROM campos");
}
public function MostrarPreguntas($id)
{
  return $this->pdo->query("SELECT * FROM pregunta WHERE iden = '$id' ");
}


/////////////////////////////////////////////////////////////////////
public function MostrarPreguntaUnica($id)
{
  return $this->pdo->query("SELECT * FROM pregunta WHERE id = '$id' ");
}///////////////////////////////////////////////////////////////////
public function EliminarPregunta($id)
{

      $sql = "DELETE FROM `pregunta` WHERE `pregunta`.`id` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
}/////////////////////////////////////////////////////////////////
public function EliminarCampo($id)
{

      $sql = "DELETE FROM `campos` WHERE `campos`.`id` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
}/////////////////////////////////////////////////////////////////
public function EliminarPreguntaXCampo($id)
{

      $sql = "DELETE FROM `pregunta` WHERE `pregunta`.`iden` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
}
public function ActualizarPregunta($id, $pregunta)
{
$sql = "UPDATE `pregunta` SET `pregunta` = :pregunta WHERE `pregunta`.`id` = :id";


      $query = $this->pdo->prepare($sql);

      $query->bindParam(":pregunta", $pregunta);
    
      
      $query->bindParam(":id", $id);



    $query->execute();

}






public function preabiertas ($id)
{


return $this->pdo->query("SELECT * FROM respuestas WHERE clave=6 AND area='$id'");





}





public function mostrarareas ()
{


return $this->pdo->query("SELECT * FROM departamentos ");





}


public function mostrarareasID($id)
{


return $this->pdo->query("SELECT * FROM departamentos WHERE id_depto = '$id' ");





}









public function ActualizarCamposki($id, $titulo)
{
$sql = "UPDATE `campos` SET `titulo` = :titulo WHERE `campos`.`id` = :id";


      $query = $this->pdo->prepare($sql);

      $query->bindParam(":titulo", $titulo);
    
      
      $query->bindParam(":id", $id);



    $query->execute();

}













public function MostrarCampos($id)
{
  return $this->pdo->query("SELECT * FROM campos WHERE id = '$id' ");
}

public function RegistroCampo($titulo, $fecha_actual, $cantidad, $tipo)
{
$sql = "INSERT INTO campos(titulo, fecha, cantidad, tipo) VALUES (:titulo, :fecha, :cantidad, :tipo)";


       $query = $this->pdo->prepare($sql);
         $query->bindParam(":titulo", $titulo);
         $query->bindParam(":fecha", $fecha_actual);
         $query->bindParam(":cantidad",$cantidad);
         $query->bindParam(":tipo",$tipo);         

           $query->execute();

}

public function ObtenerIdCampo($titulo)
{
return $this->pdo->query("SELECT * FROM campos WHERE titulo  = '$titulo' " );


}

public function ActualizarCampo($id, $titulo, $fecha, $cantidad)
{
$sql = "UPDATE `campos` SET `titulo` = :titulo, `fecha` = :fecha, `cantidad` = :cantidad WHERE `campos`.`id` = :id";


      $query = $this->pdo->prepare($sql);

      $query->bindParam(":titulo", $titulo);
      $query->bindParam(":fecha", $fecha);
      $query->bindParam(":cantidad", $cantidad);
      $query->bindParam(":cantidad", $cantidad);
    
      
      $query->bindParam(":id", $id);



    $query->execute();

}

public function eliminar_video($id)
  {


    $sql = "DELETE FROM `videos` WHERE `videos`.`ID_Videos` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
  }
public function validarUsuario($usuario, $password)
    {
      $sql = "Select count(*) AS cantidad FROM administrador WHERE usuario = :usuario AND password = :clave";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":usuario", $usuario);
      $query->bindParam(":clave", $password);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function TotalDeCampos()
    {
      $sql = "Select count(*) AS cantidad FROM campos";
      $query = $this->pdo->prepare($sql);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }

public function Contestados()
    {
      $sql = "Select count(*) AS cantidad FROM empleados where encuesta_terminada = 1";
      $query = $this->pdo->prepare($sql);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }

public function getArea($pass)
    {
      $sql = "Select area FROM usuarios WHERE clave = :pass";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":pass", $pass);
      $query->execute();
      $resultado = $query->fetch();
      return $resultado['area'];
    }
public function ContarPreguntas($iden)
    {
      $sql = "Select count(*) AS cantidad FROM pregunta WHERE iden = :iden";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":iden", $iden);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
public function EliminarRespuestaID($id)
{

      $sql = "DELETE FROM `respuestas` WHERE `respuestas`.`empleado` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
}/////////////////////////////////////////////////////////////////
public function ActualizarEncuestaTerminada($id)
{

      $sql = "UPDATE `empleados` SET `encuesta_terminada` = 0 WHERE `empleados`.`id_empleado` = :id";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":id", $id);
      $query->execute();
}
public function Faltantes()
  {
    return $this->pdo->query("SELECT * FROM empleados WHERE encuesta_terminada = 0 OR encuesta_terminada = 2 order by encuesta_terminada desc");
  }
  /////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////
  public function EliminarRespuestas()
{

      $sql = "DELETE FROM `respuestas`";
      $query = $this->pdo->prepare($sql);
      $query->execute();
}
 public function ActualizarEncuestaReiniciada()
{
      $sql = "UPDATE `empleados` SET `encuesta_terminada` = 0";
      $query = $this->pdo->prepare($sql);
      $query->execute();
      
}

public function preaAllPdf ()
{
return $this->pdo->query("SELECT * FROM respuestas ORDER BY empleado ASC");
}

public function preaAllPdfSearch ()
{
return $this->pdo->query("SELECT * FROM respuestas where area=16 GROUP BY empleado ORDER BY empleado ASC");
}

public function GetCampo($id){
    $sql = "SELECT titulo FROM campos WHERE id = :id";
    $query = $this->pdo->prepare($sql); 
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch();
    return $resultado['titulo'];
  }

public function GetArea2($id){
    $sql = "SELECT nombre FROM departamentos WHERE id_depto = :id";
    $query = $this->pdo->prepare($sql); 
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch();
    return $resultado['nombre'];
  }


}

?>