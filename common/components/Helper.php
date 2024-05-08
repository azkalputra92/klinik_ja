<?php

namespace common\components;

use yii\base\Component;

class Helper extends Component
{
    public function getYaTidak($data)
    {
        if ($data == 1) {
            return 'Ya';
        }
        return 'Tidak';
    }
}
