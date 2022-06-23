<?php

class MyValidator extends CValidator
{
    public function validateAttribute($object, $attribute)
    {
        if($object->$attribute=='test') {
            $this->addError($object, $attribute, 'Erro');
        }
    }
}