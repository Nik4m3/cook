<?php

namespace app\controllers;

use app\models\ActiveRecord\IngredientsList;
use app\models\ActiveRecord\Product;
use app\models\ActiveRecord\UnitTypes;
use Yii;
use app\models\ActiveRecord\ProductContent;
use app\models\ProductContentForm;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * ProductContentController implements the CRUD actions for ProductContent model.
 */
class ProductContentController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all ProductContent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductContentForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductContent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new ProductContent();
        $model->load(Yii::$app->request->get(), '');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }
        $products = ArrayHelper::map(Product::find()->all(), 'ID', 'NAME');
        $ingredients = ArrayHelper::map(IngredientsList::find()->all(), 'ID', 'NAME');
        return $this->render('create', [
            'model' => $model,
            'products' => $products,
            'ingredients' => $ingredients,
        ]);
    }

    public function actionMassCreate($id)
    {
        $model = Product::find()->andWhere(['ID' => $id])->one();
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if (Yii::$app->request->isPost) {
            $modelForm = new ProductContentForm();
            $modelForm->massSave(Yii::$app->request->post('ProductContent', []));
            $this->redirect('/product/index');
        }
        $ingredients = ArrayHelper::map(IngredientsList::find()->all(), 'ID', 'NAME');
        return $this->render('massCreate/create', [
            'model' => $model,
            'ingredients' => $ingredients
        ]);
    }

    public function actionAjaxAddTr($id)
    {
        $ingredients = ArrayHelper::map(IngredientsList::find()->all(), 'ID', 'NAME');
        $model = Product::find()->andWhere(['ID' => $id])->one();

        return $this->renderAjax('massCreate/_tr', [
            'model' => $model,
            'form' => ActiveForm::begin(),
            'productContentModel' => new ProductContent(),
            'ingredients' => $ingredients
        ]);
    }

    /**
     * Updates an existing ProductContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }
        $products = ArrayHelper::map(Product::find()->all(), 'ID', 'NAME');
        $ingredients = ArrayHelper::map(IngredientsList::find()->all(), 'ID', 'NAME');

        return $this->render('update', [
            'model' => $model,
            'products' => $products,
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Deletes an existing ProductContent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductContent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
