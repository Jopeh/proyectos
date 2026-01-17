<?php
/**
 * Thumb
 */
class Thumb
{
    /**
     * thumb manipulation
     */
    private $image,$type,$mime,$width,$height;
    public function __construct()
    {
        
    }
    // Método de leer la imagen
    public function loadImage(string $name)
    {
    	// tomar la dimensiones de la imagen
    	$info=getimagesize($name);
    	$this->width=$info[0];
    	$this->height=$info[1];
    	$this->type=$info[2];
    	$this->mime=$info['mime'];
    	// dependiendo del tipo de imagen crear una nueva imagen
    	switch ($this->type) {
    		case IMAGETYPE_JPEG:
    			$this->image=@imagecreatefromjpeg($name);
    			break;
    		case IMAGETYPE_GIF:
    			$this->image=@imagecreatefromgif($name);
    			break;
    		case IMAGETYPE_PNG:
    			$this->image=@imagecreatefrompng($name);
    			break;
    		default:
    			trigger_error('No se puede crear un thumbnail con el tipo de imagen especeficada', E_USER_ERROR);
    			break;
    	}
    }
    // Médoto de guardar la imagen
    public function save(string $name,int $quality=100, $type=false)
    {
    	// si no se ha enviado un formato escoger el original de la imagen
    	$type = ($type) ? $type : $this->type;
    	// guardar la imagen en el tipo de archivo correcto
    	switch ($type) {
    		case IMAGETYPE_JPEG:
    			imagejpeg($this->image,$name.image_type_to_extension($type),$quality);
    			break;
    		case IMAGETYPE_GIF:
    			imagegif($this->image, $name.image_type_to_extension($type));
    			break;
    		case IMAGETYPE_PNG:
    			$pngquality=floor($quality/100*9);
    			imagepng($this->image, $name.image_type_to_extension($type), $pngquality);
    			break;
    		default:
    			trigger_error('No se ha especificado un formato de imagen correcto', E_USER_ERROR);
    			break;
    	}
    }
    // Método de redimensionar la imagen sin deformarla
    public function resize(int $value,string $prop)
    {
    	// determinar la propiedad a redimensionar y la propiedad opuesta
    	$prop_value = ($prop=='width') ? $this->width : $this->height;
    	$prop_versus = ($prop=='width') ? $this->height : $this->width;
    	// determinar el valor opuesto a la propiedad a redimensionar
    	$pcent=$value/$prop_value;
    	$value_versus=$prop_versus*$pcent;
    	// crear la imagen dependiendo de la propiedad a variar
    	$image = ($prop=='width') ? imagecreatetruecolor($value, $value_versus) : imagecreatetruecolor($value_versus, $value);
    	// tratar la imagen
    	if ($this->type==IMAGETYPE_GIF or $this->type==IMAGETYPE_PNG) {
    		$this->prepareImage($image);
    	}
    	// hacer una copia de la imagen dependiendo de la propiedad a variar
    	switch ($prop) {
    		case 'width':
    			imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value, $value_versus, $this->width, $this->height);
    			break;
    		case 'height':
    			imagecopyresampled($image, $this->image, 0, 0, 0, 0, $value_versus, $value, $this->width, $this->height);
    			break;
    		default:
    			// code...
    			break;
    	}
    	// actualizar la imagen y sus dimensiones
    	$this->width=imagesx($image);
    	$this->height=imagesy($image);
    	$this->image=$image;
    }
    // Médodo privado de tratar las imágenes antes de mostrarlas
    private function prepareImage($image)
    {
    	// dependiendo del tipo de imagen
    	switch ($this->type) {
    		case IMAGETYPE_GIF:
    			$background=imagecolorallocate($image, 0, 0, 0);
    			imagecolortransparent($image,$background);
    			break;
    		case IMAGETYPE_PNG:
    			imagealphablending($image, false);
    			imagesavealpha($image, true);
    			break;
    		default:
    			// code...
    			break;
    	}
    }
}
?>