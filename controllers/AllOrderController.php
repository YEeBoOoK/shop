<?php

namespace app\controllers;

use app\models\AllOrder;
use app\models\AllOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AllOrderController implements the CRUD actions for AllOrder model.
 */
class AllOrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AllOrder models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AllOrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AllOrder model.
     * @param int $id_order Id Order
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_order)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_order),
        ]);
    }

    /**
     * Creates a new AllOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AllOrder();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_order' => $model->id_order]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AllOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_order Id Order
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_order)
    {
        $model = $this->findModel($id_order);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_order' => $model->id_order]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AllOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_order Id Order
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_order)
    {
        $this->findModel($id_order)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AllOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_order Id Order
     * @return AllOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_order)
    {
        if (($model = AllOrder::findOne(['id_order' => $id_order])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
