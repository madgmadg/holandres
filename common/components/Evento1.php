<?php

namespace common\components;

use yii\base\Component;
use yii\base\Event;

class Evento1 extends Component
{
    const EVENTO_UNO = 'EVENTO UNO';

    public function Event()
    {
        $this->trigger(self::EVENTO_UNO);
    }
}
