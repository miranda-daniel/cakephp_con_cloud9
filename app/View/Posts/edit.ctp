
<?php
	echo $this->Form->create('Post');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('cantidad');

	echo $this->Form->end(__('Submit'));
?>