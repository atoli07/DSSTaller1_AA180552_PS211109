<?php
class evento{
    protected $titulo;
    protected $fecha;
    protected $descripcion;

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
}

class eventoXusuario{
    protected $eventos;
    protected $usuario= array();

    function __construct()
    {
        $this->eventos= array(
            'admin'=>array(
                new evento('Entregar taller 1', '05/03/2022', 'Verificar bien que se mande un txt con el video'),
                new evento('Sacar a pasear al perro', '07/03/2022', 'Sacarlo a las 3:30, NO olvidar bolsas')
            ), 
            'usuario1'=>array(
                new evento('Lavar la ropa', '05/03/2022', 'Lavar solo ropa de color'),
                new evento('Ir a la U', '11/03/2022', 'Salón 6.2.3, a las 7:00 AM')
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

    public function ordenarXfecha($usuario)
    {
        $longitud = count($this->eventos[$usuario]);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                $fecha1=strtotime($this->eventos[$usuario][$j]->getFecha());
                $fecha2=strtotime($this->eventos[$usuario][$j + 1]->getFecha());
                if ($fecha1> $fecha2) {
                    $temporal =$this->eventos[$usuario][$j];
                    $this->eventos[$usuario][$j] = $this->eventos[$usuario][$j + 1];
                    $this->eventos[$usuario][$j + 1] = $temporal;
                }
            }
        }
        return $this->eventos[$usuario];
    }
}
