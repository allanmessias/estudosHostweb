<?php

class Countries extends CActiveRecord
{    
    /**
     * Retorna o modelo da classe específica do Active Record
     *
     * @param  mixed $ClassName
     * @return object
     */
    public static function model($ClassName=__CLASS__)
    {
        return parent::model($ClassName); 
    }
    
    /**
     * Método que capta o mesmo nome da tabela no banco de dados para registros
     *
     * @return void
     */
    public function tableName()
    {
        return "tbl_paises"; 
    }

    

    public function rules()
    {
        return array(
            array('name', 'required', 'message' => 'Campo nome não pode ser vazio' ),
            array('status', 'required', 'message' => 'Campo status não pode ser vazio' ),

        ); 
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider('Countries', array(
            'criteria' => $criteria
        )); 
    }
}