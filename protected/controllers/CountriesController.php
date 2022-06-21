<?php

class CountriesController extends Controller
{    
    /**
     * Retorna a view index com todos os registros na tabela
     *
     * @return view index
     */
    public function actionIndex() 
    {
        Yii::import('application.Test');
        $me = new Test; 
        echo $me->hi(); 
        //include(dirname(__FILE__)."/Test.php"); 
        $countries=Countries::model()->findAll(); 
        return $this->render('index', array('countries'=>$countries)); 
    }
    
    /**
     * Cria o registro na tabela e retorna a view, mostrando o registro criado
     *
     * @return view create
     */
    public function actionCreate()
    {
        $model = new Countries();
        $request = new CHttpRequest;
        try {
            if(!empty($request->getPost('Countries'))) {
                $model->attributes =  $request->getPost('Countries'); 
                
                if($model->validate()) {
                    /**  Salva o registro no banco de dados caso o atributo isNewRecord seja true */
                    $model->save(); 
                    Yii::app()->user->setFlash('sucesso', 'País salvo com sucesso'); 
                    $this->redirect(array('countries/index')); 
                 } else {
                    Yii::app()->user->setFlash('erro', 'Não foi possível cadastrar o país');
                 }
             }             
        } catch (Exception $e) {
            echo 'ERRO ' . $e->getMessage(); 
        }
       
       return $this->render('create', array('model' => $model)); 
    }
    
    /**
     * Update no registro pelo $id, passado no link pela view update e então retorna a view 
     * 
     * @param  mixed $id 
     * @return view
     */
    public function actionUpdate($id)
    {
        $model = Countries::model()->findByPk($id);
        $request = new CHttpRequest;
        try {
            if(!empty($request->getPost('Countries'))) {
                $model->attributes = $request->getPost('Countries');
                
                if($model->validate()) {
                    /**  O método save do Active Record chama insert caso o atribut isNewRecord seja true, caso falso, ele manda o update */
                    $model->save(); 
                    $this->redirect(array('countries/index'));
                }
            }
        } catch (Exception $e) {
            echo 'ERRO ' . $e->getMessage(); 
        }

        return $this->render('update', array('model' => $model)); 
    }
    
    /**
     * Deleta o registro do banco passando um id para ele e redireciona para o index
     *
     * @param  mixed $id
     * @return void
     */
    public function actionDelete($id)
    {
        $request = new CHttpRequest;
        try{
            if(!empty($request->getQuery('id'))) {
                Countries::model()->deleteByPk($id); 
                $this->redirect(array('index')); 
            }

        } catch (Exception $e) {
            echo 'ERRO ' . $e->getMessage();
        }
    }
    
    /**
     * Muda o status de ativo para desativado e vice-versa
     *
     * @param  mixed $id
     * @return view
     */
    public function actionEnabled($id) 
    {
        $model = Countries::model()->findByPk($id); 
        if($model->status == 1) {
            $model->status = 0;
        } else {
            $model->status=1;
        }
        $model->save(); 
        return $this->redirect(array('index'));

    }
    
    /**
     * Visualiza o registro no banco de dados
     *
     * @param  mixed $id
     * @return void
     */
    public function actionView($id)
    {
        $model = Countries::model()->findByPk($id);
        return $this->render('view', array('model' => $model)); 
    }

}