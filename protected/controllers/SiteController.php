<?php
class SiteController extends CController {
	
	public function accessRules(){
		return array(
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('denied','error','index'),
				),
				
				array('deny',
                'deniedCallback' => array($this, 'actionDenied'),
            ),
		);	
		}
	public function filters(){
		return array('accessControl');
	}
	public function actionDenied(){
		throw new CHttpException(403,'Errore non hai il permesso per entrare in questa pagina!');
	}
	public function actionIndex() {
		$utenti = Utente::GetTutti();
		//CActiveRecord search is scenario
		$model = new Utente('search');
		$model->unsetAttributes();
		if (isset($_GET['Utente'])){
			var_dump($_GET);
			$model->attributes = $_GET['Utente']; 
		}
		
// 		$ruoli = Ruolo::model()->findAll();
// 		var_dump($ruoli);
		$this->render('home',array("model"=>$model));
// 		var_dump(get_class(Utente::model()));
// 		var_dump(Yii::app()->db->getSchema()->getTableNames());
// 		$this->render("home");
		
	}
	/**
	 * Action that manage Errors of app
	 */
	public function actionError(){
		$error = Yii::app()->getErrorHandler()->error;
		$this->render("error",$error);
	}
	/**
	 * @var $utente Utente
	 * @param string $utenteid
	 * @var $user CWebUser 
	 */
	public function actionUtente($utenteid = null){
		// if the action come from a cration of new utente or modify utente
		if ($utenteid==null){
			$utente=new Utente;
		}else {
			$utente = Utente::GetUtenteByPk($utenteid);
		}
// 		var_dump($_POST);
		if(Yii::app()->getRequest()->isPostRequest){
			$isNew=$utente->isNewRecord;
			//setAttributes must be have "false", like second params, to save all the inputs field, with true it save only for safe attrbiutes ( required input )
			$utente->setAttributes($_POST['Utente']); 
			try {
				if ($utente->save()){
					$user = Yii::app()->user;
					if ($isNew){
						// messagge flash
						$user->setFlash('success', 'Utente creato!!');
						// redirect to new utente page
						return $this->redirect('utente/'.Yii::app()->db->lastInsertID);
					}else {
						$user->setFlash('success', 'Utente modificato!!');
						return $this->refresh();
					}
				}
			} catch (CDbException $ex) {
				// cacthare l'esatto codice di errore mysql per dare il corretto messaggio di errore
				Yii::app()->user->setFlash('error', "Errore: ".$ex->getMessage());
			}
		}
	
		$this->render('utente',array("utente"=>$utente));
// 		var_dump($utente);
	}
}