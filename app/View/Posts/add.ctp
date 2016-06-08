<fieldset>

	<h3>Add Post</h3>
	<?php

		echo $this->Form->create('Post', array('novalidate' => 'novalidate'));
		// En FALSE deshabilita las validaciones HTML 5 client-side del navegador.


		echo $this->Form->input('title', array('label' => 'Titulo'));

		echo $this->Form->input('body',  array('label' => 'Cuerpooo',
											   'rows' => '3'));


		echo $this->Form->input('cantidad',  array('label' => 'Precio'));
	?>

	<br />

	<?php echo $this->Form->submit('Guardar'); ?>

	<?php echo $this->Form->end(); ?>

</fieldset>