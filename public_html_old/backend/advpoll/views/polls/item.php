<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

switch ($position) {
	case 'left':
		$position_style	= 'float: left';
		break;
	case 'right':
		$position_style	= 'float: right';
		break;
	default:
		$position_style	= 'margin: 0 auto';
}
?>
<script>

</script>

<style type="text/css">
	<?php echo $custom_style; ?>
</style>

<div class="advpolls" id="advpoll-<?php echo $item->id; ?>" style="width: <?php echo $width ? (is_int($width) ? $width . 'px' : $width) : '300px'; ?>; <?php echo $position_style; ?>">
	<form class="advpolls-form" method="post">
		<?php if ($title) : ?>
			<div class="wrap-advpoll-title">
				<h3 class="advpolls-title">
					<?php echo $title; ?>
				</h3>
			</div>
		<?php endif; ?>

		<div class="advpolls-body">
			<div class="advpolls-question">
				<?php echo $item->title; ?>
			</div>
			<div class="advpolls-answers">
				<ul>
					<?php if($item->params->get('otherAnswerVote', 1) == 0) {
						$other_vote = false;
					} else {
						$other_vote = true;
					} ?>

					<?php foreach ($item->answers as $answer) : ?>
						<?php if($other_vote == false) : ?>
							<?php if($answer->type_answer == 'default') : ?>
								<li>
									<label>
										<input type="checkbox" name="answers[]" value="<?php echo $answer->id; ?>" />
										<?php echo $answer->title; ?>
									</label>
								</li>
							<?php endif; ?>
						<?php else : ?>
							<li>
								<label>
									<input type="checkbox" name="answers[]" value="<?php echo $answer->id; ?>" />
									<?php echo $answer->title; ?>
								</label>
							</li>
						<?php endif; ?>

					<?php endforeach; ?>

					<?php if($item->params->get('otherAnswer', 0) == 1) : ?>
						<li>
							<label>
								<input type="checkbox" name="other_answers[]" value="" class="other-answer-checkbox" />
								<?php echo $item->params->get('otherAnswerLabel', 'Other'); ?>
							</label>
							<input type="text" name="other_answer_value" id="other_answer_value" value="" class="other-answer-input" style="display: none;">
						</li>
					<?php endif; ?>

				</ul>
			</div>
		</div>
		<div class="advpolls-buttons">
			<?php if($item->schedule) : ?>
				<?php if($expired_poll) : ?>
					<label style="display: inline-block; width: 60%;"><?php echo $item->params->get('expiredText', 'Poll is expired to vote!'); ?></label>
				<?php else: ?>
					<input type="submit" class="btn btn-primary advpolls-vote" value="Vote" />
				<?php endif; ?>
			<?php else: ?>
				<input type="submit" class="btn btn-primary advpolls-vote" value="Vote" />
			<?php endif; ?>

			<?php if ($item->params->get('showResult', 1)) : ?>
				<a href="javascript:void(0);" class="advpolls-showresult">
					View Results
				</a>
			<?php endif; ?>
		</div>

		<input type="hidden" name="id" value="<?php echo $item->id; ?>" />
		<input type="hidden" name="maxChoices" value="<?php echo $item->params->get('maxChoices', 1); ?>" />
	</form>
</div>