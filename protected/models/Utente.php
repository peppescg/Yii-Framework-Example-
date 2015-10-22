<?php
/**
 * 
 * @author peppe
 * @property Ruolo $Ruolo 
 */
class Utente extends CActiveRecord {
	public $UtenteID;
	public $RuoloID;
	public $Nome;
	public $Cognome;
	public $Email;
	public $Abilitato;
	public $RuoloSearch;
	
	/**
	 * Get the name of object record of db
	 * @see CActiveRecord::tableName()
	 */
	public function tableName() {
		return 'utenti';
	}
	/**
	 * Insert the label of variables into table
	 * @see CModel::attributeLabels()
	 */
	public function attributeLabels(){
		return array(
				'UtenteID'=>'#',
				'Nome'=>'Nome di battesimo',
				'Cognome'=>'Cognome',
				'Descrizione'=>'Descrizione',
		);
	}
	/**
	 * Insert rules validations condition of input, with "safe" the field will be save automatically without validation, so I must to validate myself
	 * @see CModel::rules()
	 */
	public function rules(){
		return array(
			array('Nome,Cognome','default'),
			array('Nome,Cognome','length','max'=>50,'tooLong'=>'Massimo 50 caratteri!'),
			array('Email','email','message'=>'Email non valida!!','allowEmpty'=>false),
			array('Abilitato','boolean'),
			array('RuoloID','safe'),
				// this rules work only for scenario search, create in object $model in SiteController
			array('UtenteID,RuoloSearch','safe','on'=>'search')
		);
	}
	/**
	 * Relation between Utente table to Ruoli table with foreign Key ( Utenti ) RuoloID and primary key RuoloID( Ruoli)
	 * Create an object of class Ruolo, add Ruolo to attribute class Utente, so I can access to Ruoli ruoli table direclty between object class Utente
	 * @see CActiveRecord::relations()
	 * @param RelationType
	 * @param ClassName
	 * @param ForeignKey
	 */
	public function relations(){
		return array(
				'Ruolo'=>array(self::BELONGS_TO,'Ruolo','RuoloID'),
// 				'Logins'=>array(self::HAS_MANY,'Login','UtenteID'),
		);
	}
	/**
	 * Get the method of class parent to access to methods and get the objects array
	 * @param system $className
	 * @return static
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	/**
	 *  Restituisce tutti i record della tabella utenti
	 * @param string $soloAbilitati
	 * @return Utente[] Lista utenti
	 */
	public static function GetTutti($soloAbilitati = false){
		$criteria = new CDbCriteria();
		$criteria->order='UtenteID ASC';
		if ($soloAbilitati===true){
// 			$criteria->addCondition('Abilitato=1');
			// variabile 1 di abilitato parametrizzato
			$criteria->addCondition('Abilitato=:abilitato');
			$criteria->params=array(':abilitato'=>true);
		}
		return self::model()->with('Ruolo')->findAll($criteria);
	}
	/**
	 * Get Utente primary key
	 * @param unknown $utenteid
	 */
	public static function GetUtenteByPk($utenteid){
		return self::model()->with('Ruolo')->findByPk($utenteid);
	}
	/**
	 * 
	 * @return Object CActiveDataProvider
	 */
	public function search(){
		$criteria = new CDbCriteria();
// 		$criteria->addCondition('abilitato=1');
//		$this is $model object create in contreller action index
		$criteria->compare('UtenteID',$this->UtenteID);
		$criteria->compare('Nome',$this->Nome,true);
		$criteria->compare('Cognome',$this->Cognome,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Abilitato',$this->Abilitato);
		// join sql
		$criteria->with = array('Ruolo');
		$criteria->compare('Ruolo.Descrizione', $this->RuoloSearch, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'RuoloSearch' => array(
                        'asc' => 'Ruolo.Descrizione ASC',
                        'desc' => 'Ruolo.Descrizione DESC',
                    ),
                    '*',
                )
            ),
        ));
    }
}