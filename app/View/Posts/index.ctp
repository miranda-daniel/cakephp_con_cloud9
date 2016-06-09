<h2><?php echo __('Post'); ?></h2>

<div>
	<?php echo $this->Html->link(__('Add new post'), array('action' => 'add')); ?>
</div>

<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
		<th><?php echo $this->Paginator->sort('rol'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo __('Actions'); ?></th>
	</tr>

	<?php foreach ($posts as $post): ?>

		<tr>
			<td><?php echo h($post['Post']['id']); ?></td>
			<td><?php echo $this->Html->link(__(h($post['Post']['title'])), array('action' => 'view', h($post['Post']['id'])));?></td>
			<td><?php echo h($post['Post']['cantidad']); ?></td>
			<td><?php echo h($post['Post']['rol_id']); ?></td>
			<td><?php echo $this->Time->nice(h($post['Post']['created'])); ?></td>

			<td>
				<?php
					echo $this->Html->link(__('Edit'), array('action' =>'edit', h($post['Post']['id'])));

					echo " / ";

					// Utiliza POSTLINK, para que no se pueda llevar acabo esta accion por URL.
					echo $this->Form->postLink(__('Delete'), array('action' =>'delete', h($post['Post']['id'])), array('confirm' => 'Delete this post?'));?>
			</td>
		</tr>

	<?php endforeach; ?>
</table>