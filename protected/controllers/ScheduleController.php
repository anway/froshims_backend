<?php

class ScheduleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    /*
	public function actionCreate()
	{
		$model = new Schedule;
        $dorm = new Dorm;
        $sport = new Sport;
        $location = new Location;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Schedule']))
		{
			$model->attributes=$_POST['Schedule'];
            $model->scoreReported='0';
            $model->emailSent='0';
            $model->reminderSent='0';
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'sport'=>$sport,
            'location'=>$location,
            'dorm'=>$dorm,
		));
	}*/
    // attempt at BatchCreate
    public function actionCreate()
	{
		$models = array();
        $dorm = new Dorm;
        $sport = new Sport;
        $location = new Location;
        $i=0;
        while($i<24) {
            $models[$i] = new Schedule;
            $i++;
        }
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        
		if (isset($_POST['Schedule']))
		{
            $valid=true;
            $oneval=false;
            foreach ($_POST['Schedule'] as $j=>$model)
            {
                if (!empty($model->s_id) || !empty($model->date) || !empty($model->time) || !empty($model->l_id) || !empty($model->t1_id) || !empty($model->t2_id) || !empty($model->type))//(!empty($_POST['Schedule'][$j]))
                {
                    $oneval=true;
                    $models[$j]=new Schedule;
                    $models[$j]->attributes=$model;
                    $models[$j]->scoreReported='0';
                    $models[$j]->emailSent='0';
                    $models[$j]->reminderSent='0';
                    $valid = $models[$j]->validate() && $valid;
                }
            }
            if ($valid && $oneval)
            {
                $i=0;
                while ($i<24)//(isset($models[$i]))
                {
                    if (!empty($models[$i]->s_id) && !empty($models[$i]->date) && !empty($models[$i]->time) && !empty($models[$i]->l_id) && !empty($models[$i]->t1_id) && !empty($models[$i]->t2_id) && !empty($models[$i]->type))
                    {
                            $models[$i]->save(false);
                    }
                    $i++;
                }
                $this->redirect(array('index'));
            }
            /*
            $model->scoreReported='0';
            $model->emailSent='0';
            $model->reminderSent='0';
            */
        }
        
		$this->render('create',array(
                                     'models'=>$models,
                                     'sport'=>$sport,
                                     'location'=>$location,
                                     'dorm'=>$dorm,
                                     ));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $dorm = new Dorm;
        $sport = new Sport;
        $location = new Location;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Schedule']))
		{
			$model->attributes=$_POST['Schedule'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
            'sport'=>$sport,
            'location'=>$location,
            'dorm'=>$dorm
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Schedule');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Schedule('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Schedule']))
			$model->attributes=$_GET['Schedule'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Schedule the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Schedule::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Schedule $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='schedule-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
