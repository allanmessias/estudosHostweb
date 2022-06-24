<?php

Yii::import('application.service.CountryService'); 
class CountriesController extends Controller
{
    /**
     * Retorna a view index com todos os registros na tabela
     *
     * @return view index
     */
    public function actionIndex()
    {
        /** 
         * Executar funções apenas uma vez, pois elas fazem inserções no BD utilizando a classe
         * CBdAuthManager como pai.
         * 
         *  $this->assignUserRole();
         *  $this->createUserRole();
         */
    
        $countries = Countries::model()->findAll();
        return $this->render('index', array('countries' => $countries));
    }

    /**
     * Cria o registro na tabela e retorna a view, mostrando o registro criado
     *
     * @return view create
     */
    public function actionCreate()
    {
        /**
         * Posso utilizar o request por meio do componente application
         * Ex.: Yii::app()->request->metodoDoCHttpRequest, porém não deixa o código legível
         * Pois a classe CHttpRequest possui todos os métodos necessários e quem for ler o código vai saber de onde estou usando.
         */

        $request = new CHttpRequest;
        $service = new CountryService; 
        
        $country =  $request->getPost('Countries');

        $model = $service->create($country); 
        
        if ($model) {
            Yii::app()->user->setFlash('success', 'País salvo com sucesso');
            $this->redirect(array('countries/index'));
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
            if (!empty($request->getPost('Countries'))) {
                $model->attributes = $request->getPost('Countries');

                if ($model->validate()) {
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
        try {
            if (!empty($request->getQuery('id'))) {
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
        if ($model->status == 1) {
            $model->status = 0;
        } else {
            $model->status = 1;
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
    
    /**
     * Cria permissão para determinado usuário
     * @var auth $user
     * @return role $user
     */
    private function createUserRole()
    {
        $auth = Yii::app()->authManager;

        try {
            if (!empty($auth)) {
                $user = $auth->createRole('admin');
                return $user;
            }
        } catch (Exception $e) {
            echo 'ERRO ' . $e->getMessage();
        }
        return null;
    }
    
    /**
     * Define a permissão para o usuário selecionado
     * @var auth $user
     * @return assigned $user 
     */
    private function assignUserRole()
    {
        $auth = Yii::app()->authManager;

        try {
            if (!empty($auth)) {
                $user = $auth->assign('admin', 1);
                return $user;
            }
        } catch (Exception $e) {
            echo 'ERRO ' . $e->getMessage();
        }
    }

    public function actionDownloadExcel() 
    {
        $request = new CHttpRequest;
        if (!empty($request->getQuery('excel'))) {
            // Renderiza parcialmente a view 'excel', passando como conteúdo a consulta no banco de dados
            $content = $this->renderPartial('excel', array('model' => Countries::model()->findAll()), true);

            // Faz o download da consulta em arquivo .xls, passando como conteúdo a consulta realizada na
            $request->sendFile('test.xls', $content);
        }
    }

}
