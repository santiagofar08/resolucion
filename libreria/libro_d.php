<?php
class libro_d {
    public $id;
    public $id_libro;
    public $autor;
    public $titulo;
    public $edicion;
    public $anio;
    public $origen;
    public $tipo;
    public $area;
    public $materia;
    public $comentario;
    public $archivo;

    function guardar($objConexion) {
        $sql = "INSERT INTO libros_d (autor, titulo, edicion, año, origen, tipo, area, materia, comentario, archivo)
                VALUES ('$this->autor', '$this->titulo', '$this->edicion', '$this->anio', '$this->origen', '$this->tipo', '$this->area', '$this->materia', '$this->comentario', '$this->archivo')";
        mysqli_query($objConexion, $sql);
    }

    function actualizar($objConexion, $nro = 0) {
        $sql = "UPDATE libros_d SET 
                    autor = '$this->autor',
                    titulo = '$this->titulo',
                    edicion = '$this->edicion',
                    año = '$this->anio',
                    origen = '$this->origen',
                    tipo = '$this->tipo',
                    area = '$this->area',
                    materia = '$this->materia',
                    comentario = '$this->comentario',
                    archivo = '$this->archivo'
                WHERE id_libro = $nro";
        mysqli_query($objConexion, $sql);
    }

    function borrar($objConexion, $nro = 0) {
        $sql = "DELETE FROM libros_d WHERE id_libro = $nro";
        mysqli_query($objConexion, $sql);
    }

    static function traer_datos($objConexion, $nro = 0) {
        if ($nro != 0) {
            $sql = "SELECT * FROM libros_d WHERE id_libro = $nro";
            $result = mysqli_query($objConexion, $sql);
            return mysqli_fetch_array($result);
        }
        return null;
    }

    static function mostrar_todos($objConexion) {
        $sql = "SELECT * FROM libros_d";
        $rs = mysqli_query($objConexion, $sql);
        $lib = [];
        while ($fila = mysqli_fetch_assoc($rs)) {
            $lib[] = $fila;
        }
        return $lib;
    }

    static function buscar($objConexion, $str) {
        $sql = "SELECT * FROM libros_d WHERE 
                    autor LIKE '%$str%' OR 
                    titulo LIKE '%$str%' OR 
                    tipo LIKE '%$str%' OR 
                    area LIKE '%$str%' OR 
                    materia LIKE '%$str%' OR 
                    id_libro = '$str'
                ORDER BY titulo";
        $rs = mysqli_query($objConexion, $sql);
        $lib = [];
        while ($fila = mysqli_fetch_assoc($rs)) {
            $lib[] = $fila;
        }
        return $lib;
    }
}
?>