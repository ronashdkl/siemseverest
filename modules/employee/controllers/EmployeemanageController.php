<?php

namespace app\modules\employee\controllers;

use dektrium\user\models\Profile;
use dektrium\user\models\User;
use Yii;
use app\modules\account\models\Employee;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * EmployeeManagementController implements the CRUD actions for Employee model.
 */
class EmployeemanageController extends Controller
{
    public $layout = "@app/modules/account/views/layouts/admin";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Employee::find(),
//        ]);

        $data = Employee::find()->where(['status'=>1])->all();
        return $this->render('index', [
            'data' => $data,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'image');
            $model->image = 'uploads/' . $file->baseName . '.' . $file->extension;
            if ($model->save()) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);

                //generating random password
                $randomString = Yii::$app->getSecurity()->generateRandomString(6);
                $user = new User();
                $user->setAttributes([
                    "username" => $model->first_name,
                    "email" => $model->email,
                    "password"=>$randomString
                ]);

                $user->password_hash = Yii::$app->security->generatePasswordHash($randomString,Yii::$app->getModule('user')->cost);

                //setting up profile
                $profile = new Profile();
                $profile->setAttributes([
                    'name'=> $model->first_name . ' ' . $model->last_name,
                    'public_email'=>$model->email,
                    'gravatar_email'=>$model->email,
                    'location'=>$model->address
                ]);
                $user->setProfile($profile);

                if ($user->register()) {
                    Yii::$app->mailer->compose()
                        ->setFrom('admin@siems.com')
                        ->setTo($user->email)
                        ->setSubject('Hello ' . $user->username)->setTextBody('')
                        ->setHtmlBody('<h2>Your user name is ' . $user->username . '</h2><h2>And password is ' . $randomString . '</h2>')
                        ->send();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'image');
            $model->image = 'uploads/' . $file->baseName . '.' . $file->extension;
            if ($model->save()) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteEmployee()
    {
        $id=$_POST['id'];
        $model = Employee::findOne($id);
        $model->status = 0;
        $model->save(false);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
