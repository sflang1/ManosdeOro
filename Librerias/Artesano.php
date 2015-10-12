<?php


 /**
  * Artesano Value Object.
  * This class is value object representing database table artesano
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
class Artesano {

    /** 
     * Persistent Instance variables. This data is directly 
     * mapped to the columns of database table.
     */
    var $idArtesano;
    var $TipoDoc;
    var $NroDoc;
    var $password;
    var $direccion;
    var $telefono;
    var $telefono2;
    var $username;
    var $estado;
    var $nombre;
    var $celular; 
    var $email;
    var $certificacion;
    var $nivelestudio;
    var $aprendices;
    var $cursos;
    var $formatofoto;
    var $departamento;
    var $ciudad;

    /** 
     * Constructors. DaoGen generates two constructors by default.
     * The first one takes no arguments and provides the most simple
     * way to create object instance. The another one takes one
     * argument, which is the primary key of the corresponding table.
     */

    function Artesano () {

    }

    /* function Artesano ($idArtesanoIn) {

          $this->idArtesano = $idArtesanoIn;

    } */
    /** 
     * Get- and Set-methods for persistent variables. The default
     * behaviour does not make any checks against malformed data,
     * so these might require some manual additions.
     */

    function getIdArtesano() {
          return $this->idArtesano;
    }
    function setIdArtesano($idArtesanoIn) {
          $this->idArtesano = $idArtesanoIn;
    }

    function getTipoDoc() {
          return $this->TipoDoc;
    }
    function setTipoDoc($TipoDocIn) {
          $this->TipoDoc = $TipoDocIn;
    }

    function getNroDoc() {
          return $this->NroDoc;
    }
    function setNroDoc($NroDocIn) {
          $this->NroDoc = $NroDocIn;
    }

    function getPassword() {
          return $this->password;
    }
    function setPassword($passwordIn) {
          $this->password = $passwordIn;
    }

    function getDireccion() {
          return $this->direccion;
    }
    function setDireccion($direccionIn) {
          $this->direccion = $direccionIn;
    }

    function getTelefono() {
          return $this->telefono;
    }
    function setTelefono($telefonoIn) {
          $this->telefono = $telefonoIn;
    }

    function getTelefono2() {
          return $this->telefono2;
    }
    function setTelefono2($telefonoIn2) {
          $this->telefono2 = $telefonoIn2;
    }

    function getUsername() {
          return $this->username;
    }
    function setUsername($usernameIn) {
          $this->username = $usernameIn;
    }

    function getEstado() {
          return $this->estado;
    }
    function setEstado($estadoIn) {
          $this->estado = $estadoIn;
    }

    function getNombre() {
          return $this->nombre;
    }
    function setNombre($nombreIn) {
          $this->nombre = $nombreIn;
    }

    function getCelular() {
          return $this->celular;
    }
    function setCelular($celularIn) {
          $this->celular = $celularIn;
    }

    function getEmail() {
          return $this->email;
    }
    function setEmail($emailIn) {
          $this->email = $emailIn;
    }

    function getCertificacion() {
          return $this->certificacion;
    }
    function setCertificacion($certificacionIn) {
          $this->certificacion = $certificacionIn;
    }

    function getNivelestudio() {
          return $this->nivelestudio;
    }
    function setNivelestudio($nivelestudioIn) {
          $this->nivelestudio = $nivelestudioIn;
    }

    function getAprendices() {
          return $this->aprendices;
    }
    function setAprendices($aprendicesIn) {
          $this->aprendices = $aprendicesIn;
    }

    function getCursos() {
          return $this->cursos;
    }
    function setCursos($cursosIn) {
          $this->cursos = $cursosIn;
    }

    function getFormatofoto() {
          return $this->formatofoto;
    }
    function setFormatofoto($formatofotoIn) {
          $this->formatofoto = $formatofotoIn;
    }

    function getDepartamento() {
          return $this->departamento;
    }
    function setDepartamento($departamentoIn) {
          $this->departamento = $departamentoIn;
    }

      function getCiudad() {
          return $this->ciudad;
    }
    function setCiudad($ciudadIn) {
          $this->ciudad = $ciudadIn;
    }



    /** 
     * setAll allows to set all persistent variables in one method call.
     * This is useful, when all data is available and it is needed to 
     * set the initial state of this object. Note that this method will
     * directly modify instance variales, without going trough the 
     * individual set-methods.
     */

    function setAll($idArtesanoIn,
          $TipoDocIn,
          $NroDocIn,
          $passwordIn,
          $direccionIn,
          $telefonoIn,
          $telefonoIn2,
          $usernameIn,
          $estadoIn,
          $nombreIn,
          $celularIn,
          $emailIn,
          $certificacionIn,
          $nivelestudioIn,
          $aprendicesIn,
          $cursosIn,
          $formatofotoIn,
          $departamentoIn,
          $ciudadIn) {
          $this->idArtesano = $idArtesanoIn;
          $this->TipoDoc = $TipoDocIn;
          $this->NroDoc = $NroDocIn;
          $this->password = $passwordIn;
          $this->direccion = $direccionIn;
          $this->telefono = $telefonoIn;
          $this->telefono2 = $telefonoIn2;
          $this->username = $usernameIn;
          $this->estado = $estadoIn;
          $this->nombre = $nombreIn;
          $this->celular = $celularIn;
          $this->email = $emailIn;
          $this->certificacion = $certificacionIn;
          $this->nivelestudio = $nivelestudioIn;
          $this->aprendices = $aprendicesIn;
          $this->cursos = $cursosIn;
          $this->formatofoto = $formatofotoIn;
          $this->departamento = $departamentoIn;
          $this->ciudad = $ciudadIn;
    }


    /** 
     * hasEqualMapping-method will compare two Artesano instances
     * and return true if they contain same values in all persistent instance 
     * variables. If hasEqualMapping returns true, it does not mean the objects
     * are the same instance. However it does mean that in that moment, they 
     * are mapped to the same row in database.
     */
    function hasEqualMapping($valueObject) {

          if ($valueObject->getIdArtesano() != $this->idArtesano) {
                    return(false);
          }
          if ($valueObject->getTipoDoc() != $this->TipoDoc) {
                    return(false);
          }
          if ($valueObject->getNroDoc() != $this->NroDoc) {
                    return(false);
          }
          if ($valueObject->getPassword() != $this->password) {
                    return(false);
          }
          if ($valueObject->getDireccion() != $this->direccion) {
                    return(false);
          }
          if ($valueObject->getTelefono() != $this->telefono) {
                    return(false);
          }
          if ($valueObject->getTelefono2() != $this->telefono2) {
                    return(false);
          }
          if ($valueObject->getUsername() != $this->username) {
                    return(false);
          }
          if ($valueObject->getEstado() != $this->estado) {
                    return(false);
          }
          if ($valueObject->getNombre() != $this->nombre) {
                    return(false);
          }
          if ($valueObject->getCelular() != $this->celular) {
                    return(false);
          }
          if ($valueObject->getEmail() != $this->email) {
                    return(false);
          }
          if ($valueObject->getCertificacion() != $this->certificacion) {
                    return(false);
          }
          if ($valueObject->getNivelestudio() != $this->nivelestudio) {
                    return(false);
          }
          if ($valueObject->getAprendices() != $this->aprendices) {
                    return(false);
          }
          if ($valueObject->getCursos() != $this->cursos) {
                    return(false);
          }
          if ($valueObject->getFormatofoto() != $this->formatofoto) {
                    return(false);
          }
          if ($valueObject->getDepartamento() != $this->departamento) {
                    return(false);
          }
          if ($valueObject->getCiudad() != $this->ciudad) {
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
        $out = $out."\nclass Artesano, mapping to table artesano\n";
        $out = $out."Persistent attributes: \n"; 
        $out = $out."idArtesano = ".$this->idArtesano."\n"; 
        $out = $out."TipoDoc = ".$this->TipoDoc."\n"; 
        $out = $out."NroDoc = ".$this->NroDoc."\n"; 
        $out = $out."password = ".$this->password."\n"; 
        $out = $out."direccion = ".$this->direccion."\n"; 
        $out = $out."telefono = ".$this->telefono."\n"; 
        $out = $out."telefono2 = ".$this->telefono2."\n"; 
        $out = $out."username = ".$this->username."\n"; 
        $out = $out."estado = ".$this->estado."\n"; 
        $out = $out."nombre = ".$this->nombre."\n"; 
        $out = $out."celular = ".$this->celular."\n"; 
        $out = $out."email = ".$this->email."\n"; 
        $out = $out."certificacion = ".$this->certificacion."\n"; 
        $out = $out."nivelestudio = ".$this->nivelestudio."\n"; 
        $out = $out."aprendices = ".$this->aprendices."\n"; 
        $out = $out."cursos = ".$this->cursos."\n"; 
        $out = $out."formatofoto = ".$this->formatofoto."\n"; 
        $out = $out."departamento = ".$this->departamento."\n"; 
        $out = $out."ciudad = ".$this->ciudad."\n"; 
        return $out;
    }


    /**
     * Clone will return identical deep copy of this valueObject.
     * Note, that this method is different than the clone() which
     * is defined in java.lang.Object. Here, the retuned cloned object
     * will also have all its attributes cloned.
     */
    function cloneObject() {
        $cloned = new Artesano();

        $cloned->setIdArtesano($this->idArtesano); 
        $cloned->setTipoDoc($this->TipoDoc); 
        $cloned->setNroDoc($this->NroDoc); 
        $cloned->setPassword($this->password); 
        $cloned->setDireccion($this->direccion); 
        $cloned->setTelefono($this->telefono); 
        $cloned->setTelefono2($this->telefono2); 
        $cloned->setUsername($this->username); 
        $cloned->setEstado($this->estado); 
        $cloned->setNombre($this->nombre); 
        $cloned->setCelular($this->celular); 
        $cloned->setEmail($this->email); 
        $cloned->setCertificacion($this->certificacion); 
        $cloned->setNivelestudio($this->nivelestudio); 
        $cloned->setAprendices($this->aprendices); 
        $cloned->setCursos($this->cursos); 
        $cloned->setFormatofoto($this->formatofoto); 
        $cloned->setDepartamento($this->departamento); 
        $cloned->setCiudad($this->ciudad); 

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