<?php 

class FHappy extends CApplicationComponent
{
    public $trato; 

    public function init()
    {
        echo "Inicializado";
    }

    public function hi()
    {
        if($this->trato === null) {}
            return 'Olá';
        if($this->trato === 1)
            return 'Olá como esta'; 
    }
}