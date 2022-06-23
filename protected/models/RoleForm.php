<?php

class RoleForm extends CFormModel
{
    public static $types = array('Operation', 'Task', 'Role');
    public $name;
    public $description;
    public $type = 2;


    public function rules ()
    {
        return array(
           array('name, description', 'required', 'message'=>'aiiiii :( {attribute}'),
           array('description', 'validating'), 
        ); 
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nome',
            'description' => 'Descrição',
            'type' => 'Tipo'
        ); 
    }

    public function validating($attribute, $param)
    {
        if($this->$attribute=='test') 
            $this->addError($attribute, 'erro fdp');
        
    }
}