<?php

class UserController extends Controller
{    
    /**
     * Returns user based on search passed on search field.
     *
     * @return view
     */
    public function actionIndex()
    {
        $searchUser = CHttpRequest::getPost('search');
        try {
            if (!empty($searchUser)) {
                $criteria=new CDbCriteria;
                $criteria->compare('username', $searchUser, true);
                $user = User::model()->findAll($criteria);
                return $this->render('index', array('user' => $user));
            }
            throw new Exception('erro fodase');
        } catch (Exception $e) {
            echo 'ERRO' . $e->getMessage();
        }
    }
}
