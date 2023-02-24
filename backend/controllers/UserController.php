<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use backend\models\UserForm;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * SignIn controller
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex(){
        $userSearch = new UserSearch();
        $dataProvider = $userSearch->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'userSearch' => $userSearch,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['user/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $userModel = User::findOne($id);
        $model->setModel($userModel);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['user/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = User::findOne($id);
        if (User::find()->count() > 1 and $id != 1) {
         //   Yii::$app->authManager->revokeAll($id);
            $model->delete();
        }
        return $this->redirect(['user/index']);
    }
}