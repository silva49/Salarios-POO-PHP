<?php

   require_once 'Empleados.php';

   class Pension extends Empleados{
    public function __construct(){
    $parametros = func_get_args();
    $numero_parametros = func_num_args();
    $funcion_constructor = '__construct'.$numero_parametros;

    if(method_exists($this,$funcion_constructor)) {
        call_user_func_array(array($this,$funcion_constructor), $parametros);
    }

}
  public function __construct2($ch,$vh) {
     parent::__construct2($ch,$vh);
  }     
    
    public function calcularPension($porcentaje){
           return ( ($this->getCantidadHoras() * $this->getValorHora() ) * $porcentaje ); 
       }

       
    
    
}




?>