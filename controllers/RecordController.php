<?php
namespace app\controllers;
use Yii;
use app\models\RecordModel;
use yii\db\StaleObjectException;

class RecordController extends AppController
{

    public function actionIndex()
    {
        $model = RecordModel::find()->orderBy(['priority' => SORT_DESC])->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new RecordModel();
        if ($model->load(Yii::$app->request->post())) {
            $model->title = Yii::$app->request->post('RecordModel')['title'];
            $model->priority = Yii::$app->request->post('RecordModel')['priority'];
            $model->done = Yii::$app->request->post('RecordModel')['done'];
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Success', false);
                return $this->redirect('/');
            }
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionEdit($id)
    {
        $model = RecordModel::findOne($id);
        try {
            if ($model->load(Yii::$app->request->post()) ) {

                $model->title = Yii::$app->request->post('RecordModel')['title'];
                $model->priority = Yii::$app->request->post('RecordModel')['priority'];
                $model->done = Yii::$app->request->post('RecordModel')['done'];
                $model->version = Yii::$app->request->post('RecordModel')['version'];
                //debug($model);die();
                if($model->save()) {
                    Yii::$app->session->setFlash('success', 'Success', false);
                    return $this->refresh();
                }
            } else {
                return $this->render('edit', [
                    'model' => $model,
                ]);
            }
        }catch (StaleObjectException $e) {
                $model = RecordModel::findOne($model->id);
                Yii::$app->session->setFlash('error', 'Conflict, 
                item was changed by another user, your changes will be lost. Edit again or Cancel', false);
                return $this->render('edit', [
                    'model' => $model,
                ]);
        }
    }

    public function actionDelete($id, $version)
    {
        try {
            RecordModel::deleteAll(['id' => $id, 'version' => $version]);
            Yii::$app->session->setFlash('success', 'Successfully deleted!');
            return $this->redirect('/');
        }catch (StaleObjectException $e) {
            return var_dump('<pre>' . $e . '</pre>');die();
            $model = RecordModel::findOne($model->id);
            Yii::$app->session->setFlash('error', 'Conflict,
                item was changed by another user, your changes will be lost. Edit again or Cancel');
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
}