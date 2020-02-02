<?php

if(isset($_POST["btncalcular"])) {

    sleep(2);
    
    require_once 'logica/Salario.php' ;
    require_once 'logica/Salud.php' ;
    require_once 'logica/Pension.php' ;
    require_once 'logica/Caja.php' ;

    $cantidadHoras = $_POST["txthorastrabajadas"];
     $valorHora = $_POST["txtcostohoratrabajo"];
    
    $objSalario = new Salario($cantidadHoras,$valorHora);
     $objSalud = new Salud($cantidadHoras,$valorHora);
     $objPension = new Pension($cantidadHoras,$valorHora);
     $objCaja = new Caja($cantidadHoras,$valorHora);

     

    
    echo "<b>El salario bruto es: </b>" . $objSalario->calcularSalarioBruto() ."<br>" ;
    
    if($objSalario->calcularSalarioBruto() <= 1000000){
      
          echo "<b>El descuento de salud es : </b>" . $objSalud->calcularSalud(0.02) ."<br>" ; 
         
         
          echo "<b>El descuento de pensión es : </b>" . $objPension->calcularPension(0.04) ."<br>" ; 
          
          $incremento = $objSalario->calcularSalarioBruto() * 0.03;
           echo "<b>Incremento</b>" . $incremento  . "<br>";
          $salarioFinal = ($objSalario->calcularSalarioBruto() + $incremento) - $objSalud->calcularSalud(0.02) - $objPension->calcularPension(0.04);
           echo "<b>Salario a pagar : </b>" . $salarioFinal . "<br>";
        } elseif($objSalario->calcularSalarioBruto() > 1000000 && $objSalario->calcularSalarioBruto() <= 2000000) {

          
          echo "<b>El descuento de salud es : </b>" . $objSalud->calcularSalud(0.04) ."<br>" ; 
         
     
          echo "<b>El descuento de pensión es : </b>" . $objPension->calcularPension(0.06) ."<br>" ; 

         echo "<b>El descuento de caja de compensación es : </b>" . $objCaja->calcularCaja(0.02) ."<br>" ; 
          

         $salarioFinal = $objSalario->calcularSalarioBruto()  - $objSalud->calcularSalud(0.04) - $objPension->calcularPension(0.06) - $objCaja->calcularCaja(0.02);
         echo "<b>Salario a pagar : </b>" . $salarioFinal . "<br>";    
        }elseif($objSalario->calcularSalarioBruto() > 2000000){
         
            echo "<b>El descuento de salud es : </b>" . $objSalud->calcularSalud(0.05) ."<br>" ; 
           
         
            echo "<b>El descuento de pensión es : </b>" . $objPension->calcularPension(0.07) ."<br>" ; 
  
        
           echo "<b>El descuento de caja de compensación es : </b>" . $objCaja->calcularCaja(0.03) ."<br>" ; 
            
  
           $salarioFinal = $objSalario->calcularSalarioBruto()  - $objSalud->calcularSalud(0.05) - $objPension->calcularPension(0.07) - $objCaja->calcularCaja(0.03);
           echo "<b>Salario a pagar : </b>" . $salarioFinal . "<br>";    
        }
     

    

}else {

 echo "Opcion invalida";

}

?>