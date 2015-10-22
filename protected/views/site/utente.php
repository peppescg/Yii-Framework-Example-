<?php

// var_dump($utente);
/**
 *
 * @var $utente Utente
 * @var $this SiteController
 * @var $form CActiveForm
 * @var $user CWebUser
 */
?>
<div id="content-utente">
<?php  echo CHtml::link('Home',array('/utenti')); ?>
<h1>Utente</h1>
<?php $utente->Nome; ?>
<?php $user = Yii::app()->user;  ?>


<?php $form = $this->beginWidget('CActiveForm'); ?>

<?php if ($message = Yii::app()->user->getFlash('success')){ ?>
	<div style="background: green;"><?php echo $message; ?></div>
<?php }elseif($message = Yii::app()->user->getFlash('error')){?>
	<div style="background: red;"><?php echo $message; ?></div>
<?php }?>

<div>
		<?php echo $form->labelEx($utente,'Nome'); ?><br>
		<?php echo $form->textField($utente, 'Nome'); ?><br>
		<?php echo $form->error($utente, 'Nome'); ?><br>
</div>
<div>
		<?php echo $form->labelEx($utente,'Cognome'); ?><br>
		<?php echo $form->textField($utente, 'Cognome'); ?><br>
		<?php echo $form->error($utente, 'Cognome'); ?><br>
</div>
<div>
		<?php echo $form->labelEx($utente,'Email'); ?><br>
		<?php echo $form->emailField($utente, 'Email'); ?><br>
		<?php echo $form->error($utente, 'Email'); ?><br>
</div>
<div>
		<?php echo $form->labelEx($utente,'Abilitato'); ?><br>
		<?php echo $form->checkBox($utente, 'Abilitato'); ?><br>
		<?php echo $form->error($utente, 'Abilitato'); ?><br>
</div>
<div>
		<?php echo $form->labelEx($utente,'RuoloID'); ?><br>
		<?php echo $form->dropDownList($utente, 'RuoloID',CHtml::listData(Ruolo::GetTutti(), 'RuoloID', 'Descrizione')); ?><br><br>
</div>
<div>
<?php echo CHtml::submitButton('Salva');?>
</div>
<?php $this->endWidget(); ?>

</div>

