<?php
class evento{
    protected $titulo;
    protected $fecha;
    protected $descripcion;
    protected $usuario;

    function __construct($title='', $date=null, $desc='')
    {
        $this->titulo=$title;
        $this->fecha=$date;
        $this->descripcion=$desc;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getDescripcion()
    {
       return $this->descripcion; 
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function addUsuario($user)
    {
        $this->usuario=$user;
    }

}

class eventoXusuario{
    protected $eventos;
    protected $usuario= array();

    function __construct()
    {
        $this->eventos= array(
            'usuario1'=>array(
                new evento('Lavar la ropa', '05/03/2022', 'Lavar solo ropa de color'),
                new evento('Cumple de la abue', '10/03/2022', 'LLevar las velas y el pastel')
            ), 
            'usuario2'=>array(
                new evento('Bañar al perro', '06/03/2022', 'No olvidar echarle veneno para las pulgas')
            )
        );
    }

    public function obtenerEventos($usuario)
    {
        if (array_key_exists($usuario, $this->eventos)) {
            $tmp=$this->eventos;
            $usuariotmp=$tmp[$usuario];
            return $usuariotmp;
        }
    }

    public function agregarEvento($title,$date,$desc,$usuario)
    {
        if (array_key_exists($usuario, $this->eventos)) {
            array_push($this->eventos[$usuario], new evento($title, $date, $desc)); 
        } else {
            $this->eventos= array(
                $usuario=>array(
                    new evento($title, $date,$desc)
                )
            );
        }  
    }
}
?>