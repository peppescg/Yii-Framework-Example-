<?php
return array(
		'import'=>array(
				'application.models.*',
		),
		'preload'=>array('log'),
		'components'=>array(
				'errorHandler'=>array(
						'errorAction'=>'site/error'),
				'urlManager' => array(
						'urlFormat'=>'path',
						'showScriptName'=>false,
						'rules'=>array(
								'utenti'=>'site/index',
								'utente'=>'site/utente',
								'utente/<utenteid:[0-9]+>'=>'site/utente',
						)
							
				),
				'authManager'=>array(
						'class'=>'CPhpAuthManager'
				),
				'db'=>array(
						'connectionString'=>'mysql:host=localhost;dbname=utenti',
						'username'=>'root',
						'password'=>'',
				),
				'log' => array(
						'class' => 'CLogRouter',
						'routes' => array(
								array(
										'class' => 'CProfileLogRoute',
										'levels' => '',
										'enabled' => true,
								),
								array(
										'class' => 'CWebLogRoute',
										'enabled' => true,
								),
						),
				),
		),
);