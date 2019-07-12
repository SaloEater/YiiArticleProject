<?php


namespace frontend\controllers;


use common\models\Article;
use common\models\ArticleSearch;
use common\models\Comment;
use Yii;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{

    private function incVisit()
    {
        $reqCookies = Yii::$app->request->cookies;
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'visit',
            'value' => (int)$reqCookies->getValue('visit', 0)+1
        ]));
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->incVisit();
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->incVisit();
        $model = $this->findModel($id);
        return $this->getCommonView($model);
    }
    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewslug($slug)
    {
        $this->incVisit();
        $model = $this->findModelBySlug($slug);
        return $this->getCommonView($model);

    }

    private function getCommonView($model)
    {
        $this->incVisit();
        $comment = new Comment();

        //$comment->article_id = $model->id;
        $post = Yii::$app->request->post();

        if ($comment->load($post) && $comment->save()) {
            $comment = new Comment();
        }
        return $this->render('view', [
            'model' => $model,
            'comment' => $comment
        ]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Article::findOne(['slug'=>$slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}