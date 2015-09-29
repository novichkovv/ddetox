<?php
/**
 * @copyright	Copyright (c) 2013 ExtStore Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

$count	= count($item->answers);
?>

<script>
jQuery(document).ready(function() {
	AdvPolls.answers = <?php echo $count; ?>;

	if (!AdvPolls.answers) {
		AdvPolls.addAnswer();
	} else {
		AdvPolls.refresh();
	}

	AdvPolls.otherAnswer();
});
</script>

<table class="table table-striped table-bordered" style="width: auto;">
	<thead>
		<tr>
			<th class="nowrap center hidden-phone">
				<i class="icon-sort"></i>
			</th>
			</th>
			<th class="nowrap">
				Title
			</th>
			<th class="nowrap">
				Votes
			</th>
			<th class="nowrap">
				Published
			</th>
			<th class="nowrap">
				Type
			</th>
			<th class="nowrap">
				Remove
			</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<td colspan="5" class="left">
				<a class="add-button" onclick="AdvPolls.addAnswer();" href="javascript:void(0);">
					<i class="icon-plus-sign"></i> Add More Answers
				</a>
			</td>
		</tr>
	</tfoot>

	<tbody id="answers_container">
		<?php if (isset($item->answers)) : ?>
		<?php foreach ($item->answers as $i => $answer) : ?>
			<tr id="answer_row-<?php echo $i; ?>" sortable-group-id="<?php echo $answer->title ?>">
				<td class="order nowrap center hidden-phone">
					<span class="sortable-handler">
						<i class="icon-move" style="cursor: move;"></i>
					</span>
					<input type="hidden" name="answers[id][]" value="<?php echo $answer->id; ?>" />
				</td>
				<td align="center" valign="top" class="center">
					<input type="text" class="inputbox" name="answers[title][]" value="<?php echo $answer->title; ?>" size="40" />
				</td>
				<td align="center" valign="top" class="center">
					<input type="text" class="inputbox input-small" name="answers[votes][]" value="<?php echo $answer->votes; ?>" size="10" />
				</td>
				<td class="center" valign="top" class="center">
					<input type="checkbox" class="inputbox" value="1" onclick="AdvPolls.publishAnswer(<?php echo $i; ?>, this.checked ? 1 : 0);"<?php echo $answer->state != 0 ? ' checked="checked"' : ''; ?> />
					<input type="hidden" name="answers[state][]" id="answer_state-<?php echo $i; ?>" value="<?php echo $answer->state; ?>" />
				</td>
				<td align="center" valign="top" class="center">
					<input type="text" class="input-small" readonly="readonly" name="answers[type_answer][]" value="<?php echo $answer->type_answer; ?>" size="5" />
				</td>
				<td class="center" valign="top" class="center">
					<a class="answer-delete"  onclick="AdvPolls.removeAnswer(<?php echo $i; ?>);">
						<i class="icon-remove-sign"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>

