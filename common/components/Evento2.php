<?php

namespace common\components;

use yii\base\Component;
use yii\base\Event;

class Evento2 extends Component
{
    const EVENTO_DOS = 'Evento Dos';

    public function Event()
    {
        $this->trigger(self::EVENTO_DOS);
    }
}
	
?>