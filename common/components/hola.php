<?php
namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
* 
*/
class Hola extends Component
{
	public $mensaje = 'Andres';

	public function mundo(){
		return "Hola ".$this->mensaje;
	}
}
?>