<?php
    namespace app\controllers;

    use app\controllers\AppController;
    use app\models\Product;
    use app\models\Category;
    use Yii;

    class CategoryController extends AppController {
        public function actionIndex()
        {
            $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
            return $this->render('index', compact('hits'));
        }
    }