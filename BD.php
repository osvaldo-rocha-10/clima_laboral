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
public function RegistroResultados($Respuesta, $Clave, $Number, $Id, $Cuestion, $id, $area, $empleados, $idjefe)
{

$sql = "INSERT INTO respuestas(respuesta, clave, Numero, IDpregunta, Pregunta, campo, area, empleado, id_jefe) VALUES (:Respuestas, :Clave, :Numbero, :Id, :Cuestion, :id, :area, :empleado, :idjefe)";


       $query = $this->pdo->prepare($sql);
       $query->bindParam(":Respuestas", $Respuesta);
       $query->bindParam(":Clave", $Clave);
       $query->bindParam(":Numbero", $Number);
       $query->bindParam(":Id", $Id);
       $query->bindParam(":Cuestion", $Cuestion);
       $query->bindParam(":id", $id);
       $query->bindParam(":area", $area);
       $query->bindParam(":empleado", $empleados);
       $query->bindParam(":idjefe", $idjefe);
       
       
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
public function validarUsuario($password)
    {
      $sql = "Select count(*) AS cantidad FROM empleados WHERE contraseña = :clave";
      $query = $this->pdo->prepare($sql);
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

public function getArea($pass)
    {
      $sql = "Select id_depto FROM empleados WHERE contraseña = :pass";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":pass", $pass);
      $query->execute();
      $resultado = $query->fetch();
      return $resultado['id_depto'];
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










    /////////////////////////////////////////////////////////////////////////////////////////////777
    public function getEmpleado($pass)
    {
      $sql = "Select id_empleado FROM empleados WHERE contraseña = :pass";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":pass", $pass);
      $query->execute();
      $resultado = $query->fetch();
      return $resultado['id_empleado'];
    }
public function ContarPreguntasTodas()
    {
      $sql = "Select count(*) AS cantidad FROM pregunta";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":iden", $iden);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasUsuario($iden)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE empleado = :iden";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":iden", $iden);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }

public function ContarPreguntasJefe(){
  $sql = "Select count(*) AS cantidad FROM pregunta WHERE iden = 9";
  $query = $this->pdo->prepare($sql);
  //$query->bindParam(":iden", $iden);
  $query->execute();
  $resultado = $query->fetch(); // ????
  return $resultado['cantidad'];
}

public function ContarRespuestasJefe($empleado, $jefe){
  $sql = "SELECT count(*) AS cantidad FROM respuestas WHERE campo = 9 AND id_jefe = :jefe AND empleado = :iden";
  $query = $this->pdo->prepare($sql);
  $query->bindParam(":jefe", $jefe);
  $query->bindParam(":iden", $empleado);
  $query->execute();
  $resultado = $query->fetch(); 
  return $resultado['cantidad'];
}

public function ContarRespuestasUsuJefe()
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE campo = 9";
        $query = $this->pdo->prepare($sql);
      //$query->bindParam(":iden", $iden);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }

public function getEncuestaTerminada($pass)
    {
      $sql = "Select encuesta_terminada FROM empleados WHERE contraseña = :pass";
        $query = $this->pdo->prepare($sql);
      $query->bindParam(":pass", $pass);
      $query->execute();
      $resultado = $query->fetch();
      return $resultado['encuesta_terminada'];
    }
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
public function ActualizarEncuestaTerminada($id, $estado)
{

      $sql = "UPDATE `empleados` SET `encuesta_terminada` = :estado WHERE `empleados`.`id_empleado` = :id";
      $query = $this->pdo->prepare($sql);

      $query->bindParam(":estado", $estado); 
      $query->bindParam(":id", $id);
      $query->execute();
}

public function SacarTipo($id){
  $sql = "SELECT tipo FROM empleados WHERE id_empleado = :id";
  $query = $this->pdo->prepare($sql); 
  $query->bindParam(":id", $id);
  $query->execute();
  $resultado = $query->fetch();
  return $resultado['tipo'];
}

public function GetJefe($id){
  $sql = "SELECT id_jefe FROM empleados WHERE id_empleado = :id";
  $query = $this->pdo->prepare($sql); 
  $query->bindParam(":id", $id);
  $query->execute();
  $resultado = $query->fetch();
  return $resultado['id_jefe'];
}

public function GetCoordinador($id){
  $sql = "SELECT id_coordinador FROM empleados WHERE id_empleado = :id";
  $query = $this->pdo->prepare($sql); 
  $query->bindParam(":id", $id);
  $query->execute();
  $resultado = $query->fetch();
  return $resultado['id_coordinador'];
}

public function GetNombre($id){
  $sql = "SELECT puesto FROM empleados WHERE id_empleado = :id";
  $query = $this->pdo->prepare($sql); 
  $query->bindParam(":id", $id);
  $query->execute();
  $resultado = $query->fetch();
  return $resultado['puesto'];
}

  public function GetAreaJefe($id){
    $sql = "SELECT id_depto FROM empleados WHERE id_empleado = :id";
    $query = $this->pdo->prepare($sql); 
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch();
    return $resultado['id_depto'];
  }

}

?>