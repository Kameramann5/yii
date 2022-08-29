<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use app\models\Admin;
use app\models\Books;

use yii\data\ActiveDataProvider;
/*красивый вардап * */
function pr($var) {
    static $int=0;
    echo '<pre><b style="background: red;padding: 1px 5px;">'.$int.'</b> ';
    print_r($var);
    echo '</pre>';
    $int++;
}

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
        return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
        $user = new User();
        $user->username = $model->username;
   
        $user->password = \Yii::$app->security->generatePasswordHash($model->password);
        if($user->save()){
        return $this->goHome();
        }
        }
       
        return $this->render('signup', compact('model'));
       }
    /**
     * Login action.
     *
     */
    public function actionUser() {
$user = User::find()->all();
return $this->render('user',
['user' => $user]
);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    /**
     * Displays book_all page.
     */
    public function actionBook_all()
    {
      
$books = Books::find()->all();

      
         
         return $this->render('book_all',compact('books'));
    }
//показать мои книги
    public function actionBook_my()
    {  


//$books = Books::find()->where(['reader' => Yii::$app->user->identity->username,'status' => 'Одобрено'])->all(); 
        // return $this->render('book_my',compact('books'));
  
     
 //    return $this->render('book_my',['dataProvider'=>$dataProvider,'rows' => $rows]);
 $dataProvider = new ActiveDataProvider([
    'query' => Books::find()
    ->
    where(['reader' => Yii::$app->user->identity->username,'status' => 'Одобрено']),
    'pagination' => [
        'pageSize' => 10,
    ],

 ]);
 return $this->render('book_my',['dataProvider'=>$dataProvider]);
   
    }
    //просмотр моей книги
    public function actionView_book_my($id)
    {  
        $model = Books::findOne($id);
        return $this->render('view_book_my',['model'=>$model]);
     
      
 
   
      
    }
    
     //конец просмотр моей книги
    //конец показать мои книги
    //изменить статус книги
    public function actionRequest() 
    { 
        $query = Books::find();
        $request = Yii::$app->request;
        $get = $request->get('value');
        $query = books::findOne($get);
        $query->status = 'На одобрении';
        $query->reader = Yii::$app->user->identity->username;
        $query->tel = Yii::$app->user->identity->tel;
       
        $query->save();
        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionRequestyes() 
    { 
        $query = Books::find();
        $request = Yii::$app->request;
        $get = $request->get('value');
        $query = books::findOne($get);
        $query->status = 'Одобрено';
        $date = date("Y-m-d H:i:s");
        $query->begindate = $date;
      
        $query->save();
        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionRequestno() 
    { 
        $query = Books::find();
        $request = Yii::$app->request;
        $get = $request->get('value');
        $query = books::findOne($get);
        $query->status = '';
        $query->tel = '';
        $query->reader = '';
        $query->save();
        return $this->redirect(Yii::$app->request->referrer);
    }

      //конец изменить статус книги
  
    public function actionAdmin() {
 if (Yii::$app->user->identity->role !== 'admin') {
            return $this->goHome();
        }


        $rows = User::find()->all();
       
        $dataProvider = new ActiveDataProvider([
            'query' => Books::find(),
            'pagination' => [
                'pageSize' => 10,
            ],

         ]);
         
         return $this->render('admin',['dataProvider'=>$dataProvider,'rows' => $rows]);
      
        
            }
            public function actionAdmin2() {
            $dataProvider = new ActiveDataProvider([
               'query' => User::find(),
               'pagination' => [
                   'pageSize' => 10,
               ],

            ]);
            return $this->render('admin2',['dataProvider'=>$dataProvider]);
                    }
                    
                  public function actionDelete($id) {
                    $model = User::findOne($id); 
                    if($model) $model->delete();
                     return $this->redirect(['admin2']);
                  }
                    public function actionUpdate($id) {
                        $model = User::findOne($id); 
                     if($model->load(Yii::$app->request->post()))  {
                         $model->save();
                         return $this->redirect(['admin2']);
                     }
                        return $this->render('edit',['model'=>$model]);
                    }
                  


                   
                    public function actionView($id) {
                        $model = User::findOne($id);
                        return $this->render('view',['model'=>$model]);
                        } 
                        public function actionView_book($id) {
                            $model = Books::findOne($id);
                            return $this->render('view_book',['model'=>$model]);


                            
                            } 
                            public function actionEdit_book($id) {
                                $model = Books::findOne($id);
                                if($model->load(Yii::$app->request->post()))  {
                                    $model->save();
                                    return $this->redirect(['admin']);
                                }
                                return $this->render('edit_book',['model'=>$model]);
                                }
                                public function actionDelete_book($id) {
                                    $model = Books::findOne($id); 
                                    if($model) $model->delete();
                                     return $this->redirect(['admin']);
                                  }
                                  public function actionAdd() {
                                      $model = new Books();
                                      if($model->load(Yii::$app->request->post()))  {
                                        $model->save();
                                        return $this->redirect(['admin']);
                                    }
                                    return $this->render('add_book',['model'=>$model]);
                                  }
                                  //редактирование профиля
                                  public function actionEdit_profile() {
                                    {
                                        $model = $this->findModel();
                                        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                                            return $this->redirect(['index']);
                                        } 
                                        return $this->render('edit_profile', [
                                            'model' => $this->findModel(),
                                        ]);
                                    }
                                               
}
private function findModel() {
    return User::findOne(Yii::$app->user->identity->getId()); 
  } 
 // конец редактирование профиля

}