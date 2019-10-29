<?php
 
class BD
{
private $pdo;//variable para realizar la conexion a la base de datos
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
public function MostrarAreas($id)
{
  return $this->pdo->query("SELECT * FROM departamentos WHERE id_depto = '$id' ");
}
public function MostrarAreasAll()
{
  return $this->pdo->query("SELECT * FROM departamentos");
}
/////////////////////////////////////////////////////////////////////
public function MostrarPreguntaUnica($id)
{
  return $this->pdo->query("SELECT * FROM pregunta WHERE id = '$id' ");
}//













public function MostrarCampos($id)
{
  return $this->pdo->query("SELECT * FROM campos WHERE id = '$id' ");
}
public function MostrarCamposAll()
{
  return $this->pdo->query("SELECT * FROM campos");
}
public function MostrarCamposss()
{
  return $this->pdo->query("SELECT * FROM campos WHERE tipo = 1");
}

public function ObtenerIdCampo($titulo)
{
return $this->pdo->query("SELECT * FROM campos WHERE titulo  = '$titulo' " );


}


public function ExistenciaDePregunta($iden)
    {
      $sql = "Select count(*) AS cantidad FROM pregunta WHERE id = :iden";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":iden", $iden);
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ExistenciaDeCampo($iden)
    {
      $sql = "Select count(*) AS cantidad FROM campos WHERE id = :iden";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":iden", $iden);
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
	
public function ContarRespuestasSatisfecho($campo)
    {
     $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 or clave = 2) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
	
  public function ContarRespuestasNeutroNueva($campo)
    {
     $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 3) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ContarRespuestasInsatisfechoNueva($campo)
    {
     $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 4 or clave = 5) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
	
public function ContarRespuestasSatisfecho2($iden, $campo){
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 OR clave = 2) AND IDpregunta = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
 }
   
   
    public function ContarRespuestasSatisfechoA($iden, $campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 OR clave = 2) AND IDpregunta = :iden AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasNeutro($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE clave = 3 AND IDpregunta = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasNeutroA($iden, $campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE clave = 3 AND IDpregunta = :iden AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasInsatisfecho($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 5 OR clave = 4) AND IDpregunta = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasInsatisfechoA($iden, $campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 5 OR clave = 4) AND IDpregunta = :iden AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestas($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE IDpregunta = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
  public function ContarRespuestasA($iden, $campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE IDpregunta = :iden AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
///////////////AREA////////////////7
public function ContarRespuestasSatisfechoAREA($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 OR clave = 2) AND area = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasNeutroAREA($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE clave = 3 AND area = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasInsatisfechoAREA($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 5 OR clave = 4) AND area = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasAREA($iden, $campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE area = :iden AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":iden", $iden);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarAreas()
    {
      $sql = "Select count(*) AS cantidad FROM departamentos";

        $query = $this->pdo->prepare($sql);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasSatisfechoGENERAL($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 OR clave = 2) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ContarRespuestasSiempre($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 ) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ContarRespuestasCasiSiempre($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 2 ) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ContarRespuestasAlgunasVeces($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 3) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
       public function ContarRespuestasCasiNunca($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 4) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
   public function ContarRespuestasNunca($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 5) AND campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasSatisfechoGENERAL_A($campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 1 OR clave = 2) AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
  public function ContarRespuestasNeutroGENERAL_A($campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 3) AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
    public function ContarRespuestasInsatisfechoGENERAL_A($campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE (clave = 4 OR clave = 5) AND campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function TotalDeCamposTipo()
    {
      $sql = "Select count(*) AS cantidad FROM campos WHERE tipo = 1";
      $query = $this->pdo->prepare($sql);     
      $query->execute();
      $resultado = $query->fetch(); // ????
      //echo $resultado['cantidad'];
      return $resultado['cantidad'];
    }
public function VerificarTipo($iden)
    {
      return $this->pdo->query("SELECT * FROM campos WHERE id  = '$iden' " );
    }
public function ContarRespuestasGENERAL($campo)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE campo = :campo";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }
public function ContarRespuestasGENERAL_A($campo, $area)
    {
      $sql = "Select count(*) AS cantidad FROM respuestas WHERE campo = :campo AND area = :area";

        $query = $this->pdo->prepare($sql);
        $query->bindParam(":campo", $campo);
        $query->bindParam(":area", $area);
      
      
      $query->execute();
      $resultado = $query->fetch(); // ????
      return $resultado['cantidad'];
    }

  public function GetCampo($id){
    $sql = "SELECT titulo FROM campos WHERE id = :id";
    $query = $this->pdo->prepare($sql); 
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch();
    return $resultado['titulo'];
  }

}

?>