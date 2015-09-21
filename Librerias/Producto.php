<?php


 /**
  * Producto Value Object.
  * This class is value object representing database table producto
  * This class is intented to be used together with associated Dao object.
  */

 /**
  * This sourcecode has been generated by FREE DaoGen generator version 2.4.1.
  * The usage of generated code is restricted to OpenSource software projects
  * only. DaoGen is available in http://titaniclinux.net/daogen/
  * It has been programmed by Tuomo Lukka, Tuomo.Lukka@iki.fi
  *
  * DaoGen license: The following DaoGen generated source code is licensed
  * under the terms of GNU GPL license. The full text for license is available
  * in GNU project's pages: http://www.gnu.org/copyleft/gpl.html
  *
  * If you wish to use the DaoGen generator to produce code for closed-source
  * commercial applications, you must pay the lisence fee. The price is
  * 5 USD or 5 Eur for each database table, you are generating code for.
  * (That includes unlimited amount of iterations with all supported languages
  * for each database table you are paying for.) Send mail to
  * "Tuomo.Lukka@iki.fi" for more information. Thank you!
  */




class Producto {

    /** 
     * Persistent Instance variables. This data is directly 
     * mapped to the columns of database table.
     */
    var $idproducto;
    var $descripcion;
    var $link;
    var $idartesano;
    var $aceptado;
    var $empresa;
    var $nroenvio;
    var $notificado;
    var $stock;
    var $ventas;
    var $formatofoto;
    var $precio;
    var $mostrar;



    /** 
     * Constructors. DaoGen generates two constructors by default.
     * The first one takes no arguments and provides the most simple
     * way to create object instance. The another one takes one
     * argument, which is the primary key of the corresponding table.
     */

    function Producto () {

    }

    /* function Producto ($idproductoIn) {

          $this->idproducto = $idproductoIn;

    } */


    /** 
     * Get- and Set-methods for persistent variables. The default
     * behaviour does not make any checks against malformed data,
     * so these might require some manual additions.
     */

    function getIdproducto() {
          return $this->idproducto;
    }
    function setIdproducto($idproductoIn) {
          $this->idproducto = $idproductoIn;
    }

    function getDescripcion() {
          return $this->descripcion;
    }
    function setDescripcion($descripcionIn) {
          $this->descripcion = $descripcionIn;
    }

    function getLink() {
          return $this->link;
    }
    function setLink($linkIn) {
          $this->link = $linkIn;
    }

    function getIdartesano() {
          return $this->idartesano;
    }
    function setIdartesano($idartesanoIn) {
          $this->idartesano = $idartesanoIn;
    }

    function getAceptado() {
          return $this->aceptado;
    }
    function setAceptado($aceptadoIn) {
          $this->aceptado = $aceptadoIn;
    }

    function getEmpresa() {
          return $this->empresa;
    }
    function setEmpresa($empresaIn) {
          $this->empresa = $empresaIn;
    }

    function getNroenvio() {
          return $this->nroenvio;
    }
    function setNroenvio($nroenvioIn) {
          $this->nroenvio = $nroenvioIn;
    }

    function getNotificado() {
          return $this->notificado;
    }
    function setNotificado($notificadoIn) {
          $this->notificado = $notificadoIn;
    }

    function getStock() {
          return $this->stock;
    }
    function setStock($stockIn) {
          $this->stock = $stockIn;
    }

    function getVentas() {
          return $this->ventas;
    }
    function setVentas($ventasIn) {
          $this->ventas = $ventasIn;
    }

    function getFormatofoto() {
          return $this->formatofoto;
    }
    function setFormatofoto($formatofotoIn) {
          $this->formatofoto = $formatofotoIn;
    }

    function getPrecio() {
          return $this->precio;
    }
    function setPrecio($precioIn) {
          $this->precio = $precioIn;
    }

    function getMostrar() {
          return $this->mostrar;
    }
    function setMostrar($mostrarIn) {
          $this->mostrar = $mostrarIn;
    }



    /** 
     * setAll allows to set all persistent variables in one method call.
     * This is useful, when all data is available and it is needed to 
     * set the initial state of this object. Note that this method will
     * directly modify instance variales, without going trough the 
     * individual set-methods.
     */

    function setAll($idproductoIn,
          $descripcionIn,
          $linkIn,
          $idartesanoIn,
          $aceptadoIn,
          $empresaIn,
          $nroenvioIn,
          $notificadoIn,
          $stockIn,
          $ventasIn,
          $formatofotoIn,
          $precioIn,
          $mostrarIn) {
          $this->idproducto = $idproductoIn;
          $this->descripcion = $descripcionIn;
          $this->link = $linkIn;
          $this->idartesano = $idartesanoIn;
          $this->aceptado = $aceptadoIn;
          $this->empresa = $empresaIn;
          $this->nroenvio = $nroenvioIn;
          $this->notificado = $notificadoIn;
          $this->stock = $stockIn;
          $this->ventas = $ventasIn;
          $this->formatofoto = $formatofotoIn;
          $this->precio = $precioIn;
          $this->mostrar = $mostrarIn;
    }


    /** 
     * hasEqualMapping-method will compare two Producto instances
     * and return true if they contain same values in all persistent instance 
     * variables. If hasEqualMapping returns true, it does not mean the objects
     * are the same instance. However it does mean that in that moment, they 
     * are mapped to the same row in database.
     */
    function hasEqualMapping($valueObject) {

          if ($valueObject->getIdproducto() != $this->idproducto) {
                    return(false);
          }
          if ($valueObject->getDescripcion() != $this->descripcion) {
                    return(false);
          }
          if ($valueObject->getLink() != $this->link) {
                    return(false);
          }
          if ($valueObject->getIdartesano() != $this->idartesano) {
                    return(false);
          }
          if ($valueObject->getAceptado() != $this->aceptado) {
                    return(false);
          }
          if ($valueObject->getEmpresa() != $this->empresa) {
                    return(false);
          }
          if ($valueObject->getNroenvio() != $this->nroenvio) {
                    return(false);
          }
          if ($valueObject->getNotificado() != $this->notificado) {
                    return(false);
          }
          if ($valueObject->getStock() != $this->stock) {
                    return(false);
          }
          if ($valueObject->getVentas() != $this->ventas) {
                    return(false);
          }
          if ($valueObject->getFormatofoto() != $this->formatofoto) {
                    return(false);
          }
          if ($valueObject->getPrecio() != $this->precio) {
                    return(false);
          }
          if ($valueObject->getMostrar() != $this->mostrar) {
                    return(false);
          }

          return true;
    }



    /**
     * toString will return String object representing the state of this 
     * valueObject. This is useful during application development, and 
     * possibly when application is writing object states in textlog.
     */
    function toString() {
        $out = $this->getDaogenVersion();
        $out = $out."\nclass Producto, mapping to table producto\n";
        $out = $out."Persistent attributes: \n"; 
        $out = $out."idproducto = ".$this->idproducto."\n"; 
        $out = $out."descripcion = ".$this->descripcion."\n"; 
        $out = $out."link = ".$this->link."\n"; 
        $out = $out."idartesano = ".$this->idartesano."\n"; 
        $out = $out."aceptado = ".$this->aceptado."\n"; 
        $out = $out."empresa = ".$this->empresa."\n"; 
        $out = $out."nroenvio = ".$this->nroenvio."\n"; 
        $out = $out."notificado = ".$this->notificado."\n"; 
        $out = $out."stock = ".$this->stock."\n"; 
        $out = $out."ventas = ".$this->ventas."\n"; 
        $out = $out."formatofoto = ".$this->formatofoto."\n"; 
        $out = $out."precio = ".$this->precio."\n"; 
        $out = $out."mostrar = ".$this->mostrar."\n"; 
        return $out;
    }


    /**
     * Clone will return identical deep copy of this valueObject.
     * Note, that this method is different than the clone() which
     * is defined in java.lang.Object. Here, the retuned cloned object
     * will also have all its attributes cloned.
     */
    function cloneObject() {
        $cloned = new Producto();

        $cloned->setIdproducto($this->idproducto); 
        $cloned->setDescripcion($this->descripcion); 
        $cloned->setLink($this->link); 
        $cloned->setIdartesano($this->idartesano); 
        $cloned->setAceptado($this->aceptado); 
        $cloned->setEmpresa($this->empresa); 
        $cloned->setNroenvio($this->nroenvio); 
        $cloned->setNotificado($this->notificado); 
        $cloned->setStock($this->stock); 
        $cloned->setVentas($this->ventas); 
        $cloned->setFormatofoto($this->formatofoto); 
        $cloned->setPrecio($this->precio); 
        $cloned->setMostrar($this->mostrar); 

        return $cloned;
    }



    /** 
     * getDaogenVersion will return information about
     * generator which created these sources.
     */
    function getDaogenVersion() {
        return "DaoGen version 2.4.1";
    }

}

?>