<?php
	use yii\helpers\Url;
	use yii\helpers\Html;

	echo Html::a('Evento Uno', Url::to(['site/eventouno'], true));
	echo "<br>";
	echo Html::a('Evento Dos', Url::to(['site/eventodos'], true));
?>