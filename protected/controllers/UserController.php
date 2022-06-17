<?php

class UserController extends Controller
{    
    /**
     * Returns user based on search passed on search field.
     *
     * @return view
     */
    public function actionSearch()
    {
        $searchUser = CHttpRequest::getPost('search');
        try {
            if (!empty($searchUser)) {
                $criteria=new CDbCriteria;
                $criteria->compare('username', $searchUser, true);
                $user = User::model()->findAll($criteria);
                return $this->render('search', array('user' => $user));
            }
            throw new Exception('erro fodase');
        } catch (Exception $e) {
            echo 'ERRO' . $e->getMessage();
        }
    }
}
