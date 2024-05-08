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
    public function getPostifNegatif($data = null)
    {
        if ($data == 0) {
            return 'Negatif';
        }else if($data == 1){
            return '<b style="color:red">Positif</b>';
        }
        return null;
    }
}
