<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

?>

<div class="row-fluid">
	<form class="form-search" method="post" action="index.php">
		<input type="text" class="input-medium search-query" name="search" value="<?php echo $search; ?>"/>
		<button type="submit" class="btn btn-success">Search</button>
	</form>

	<table class="table table-striped">
		<thead>
		<tr>
			<th width="1" class="hidden-phone">Id</th>
			<th width="1" class="hidden-phone">Status</th>
			<th>Title</th>
			<th width="20%" class="hidden-phone">Date</th>
			<th width="5%">Action</th>
		</tr>
		</thead>

		<tbody>

		<?php foreach ($items as $item) : ?>
			<tr>
				<td class="hidden-phone center">
					<?php echo $item->id; ?>
				</td>
				<td class="hidden-phone center">
					<?php if ($item->state) : ?>
						<a class="publish-btn" href="<?php echo getRoute('polls/unpublish/' . $item->id); ?>">
							<i class="icon-ok-sign"></i>
						</a>
					<?php else : ?>
						<a class="unpublish-btn" href="<?php echo getRoute('polls/publish/' . $item->id); ?>">
							<i class="icon-remove-sign"></i>
						</a>
					<?php endif; ?>
				</td>
				<td>
					<a href="<?php echo getRoute('polls/edit/' . $item->id); ?>">
						<?php echo $item->title; ?>
					</a>
				</td>
				<td class="hidden-phone">
					<?php echo $item->created; ?>
				</td>
				<td>
					<a title="Delete" href="<?php echo getRoute('polls/delete/' . $item->id); ?>" onclick="return confirmDelete();">
						<i class="icon-trash"></i>
					</a> |
					<a title="Preview" target="_blank" href="<?php echo getRoute('polls/view/' . $item->id, false); ?>">
						<i class="icon-external-link"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>

		</tbody>
	</table>

	<?php if ($total > LIST_LIMIT) : ?>
		<div class="pagination">
			<ul>
				<?php if ($page > 1) : ?>
					<li><a href="<?php echo getRoute('polls/index/' . ($page - 1)); ?>">Prev</a></li>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $total / LIST_LIMIT; $i++) { ?>
					<li class="<?php echo ($page == $i ? 'disabled' : ''); ?>">
						<?php if ($page != $i) { ?>
							<a href="<?php echo getRoute('polls/index/' . $i); ?>"><?php echo $i; ?></a>
						<?php } else { ?>
							<a href="#"><?php echo $i; ?></a>
						<?php } ?>
					</li>
				<?php } ?>
				<?php if ($page != $total) { ?>
					<li><a href="<?php echo getRoute('polls/index/' . ($page + 1)); ?>">Next</a></li>
				<?php } ?>
			</ul>
		</div>
	<?php endif; ?>
</div>