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
           array('name, description', 'required'),
           array('description', 'safe'), 
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
}