<?php
class Ruolo extends CActiveRecord{
	
	public $RuoloID;
	public $Descrizione;
	public $Colore;
	
	public function tableName(){
		return 'ruoli';
	}
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	public static function GetTutti(){
		return self::model()->findAll();
	}
}