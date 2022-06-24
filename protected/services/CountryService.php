<?php

class CountryService
{
    public function create($country = [])
    {
        try {
            if (empty($country)) return false;
            
            $model = new Countries();
            $model->attributes = $country;
            
            if (!$model->validate()) return false;
            
            if (!$model->save()) return false;
            
            return Yii::app()->user->setFlash('success', 'País salvo com sucesso');
        } catch (Exception $e) {
            Yii::log($e->getMessage(), 'error');
            Yii::app()->user->setFlash('error', $e->getMessage());
            return false; 
        }
    }
}
