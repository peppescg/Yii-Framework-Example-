<?php 
/**
 * @var $model Utente
*/
?>
<h1>Home Page Application</h1>
<?php  echo CHtml::link('Crea nuovo utente',array('/utente')); ?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				'UtenteID',
				'Nome',
				'Cognome',
				array(
						'header'=>'Indirizzo email',
						'name'=>'Email',
						'value'=>'CHtml::mailto($data->Email)',
						'type'=>'raw',
),
				'Abilitato',
				array(
						'header'=>'RuoloSearch',
						'name'=>'RuoloSearch',
						'value'=>'$data->Ruolo->Descrizione'
),
				array(
						'header'=>'Modifica',
						'value'=>'CHtml::link("Modifica",array("utente/$data->UtenteID"));',
						'type'=>'raw'
)
)
		
)); ?>

<?php /*?>
<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<td><?php echo Utente::model()->getAttributeLabel('UtenteID'); ?></td>
			<td><?php echo Utente::model()->getAttributeLabel('RuoloID'); ?></td>
			<td><?php echo Utente::model()->getAttributeLabel('Email'); ?></td>
			<td><?php echo Utente::model()->getAttributeLabel('Nome'); ?></td>
			<td><?php echo Utente::model()->getAttributeLabel('Cognome'); ?></td>
			<td><?php echo Utente::model()->getAttributeLabel('Abilitato'); ?></td>
			<td>Ruolo</td>
			<td></td>
		</tr>
	</thead>
  <?php foreach ($utenti as $utente){?>
  			<tr>
		<td><?php echo $utente->UtenteID; ?></td>
		<td><?php echo $utente->RuoloID; ?></td>
		<td><?php echo $utente->Email; ?></td>
		<td><?php echo $utente->Nome; ?></td>
		<td><?php echo $utente->Cognome; ?></td>
		<td><?php echo $utente->Abilitato; ?></td>
		<td><?php echo $utente->Ruolo->Descrizione; ?></td>
		<td><a href="utente/<?php echo $utente->UtenteID; ?>">Modifica</a></td>
	</tr>
  <?php }?>
</table>
</div>
 <?php  //var_dump($utenti); ?>
 
 */ ?>