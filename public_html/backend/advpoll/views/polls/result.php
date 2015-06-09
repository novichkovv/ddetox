<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

if ($item->params->get('resultGraph', 0) == 1) {
	// get votes max
	$max_votes	= 0;

	foreach ($item->answers as $answer) {
		if ($answer->votes > $max_votes) {
			$max_votes	= $answer->votes;
		}
	}
}

?>

<?php if ($message) : ?>
	<div class="alert alert-success">
		<?php echo $message; ?>
	</div>
<?php endif; ?>

<?php if ($item->params->get('resultGraph') == 2 || $item->params->get('resultGraph') == 3) : // Google Chart ?>
	<?php
	$data	= array("['Answer', 'Votes']");
	foreach ($item->answers as $answer) {
		$data[]	= "['" . addslashes($answer->title) . "',	$answer->votes]";
	}

	if ($item->params->get('resultGraph') == 2) {
		$chartType	= 'PieChart';
	} else if ($item->params->get('resultGraph') == 3) {
		$chartType	= 'BarChart';
	}
	?>

	<div id="advpolls-gchart"></div>

	<script>
		var data	= google.visualization.arrayToDataTable([
			<?php echo implode(', ', $data); ?>
		]);

		var option	= {
			is3D: true,
			chartArea: {height: 300}
			<?php if (!$item->params->get('showVotes', 1)) : ?>
				<?php echo ', tooltip: {trigger: \'none\'}'; ?>
			<?php endif; ?>
		};

		var chart = new google.visualization.<?php echo $chartType; ?>(document.getElementById('advpolls-gchart'));
		chart.draw(data, option);
	</script>

<?php else : ?>

	<ul class="advpolls-graph">
		<?php foreach ($item->answers as $answer) : ?>
			<?php $percent				= $item->total_votes ? round(100 * $answer->votes / $item->total_votes, 2) : 0; ?>
			<?php $calculated_percent	= $item->params->get('resultGraph', 0) == 0 ? $percent : ($max_votes ? round(100 * $answer->votes / $max_votes, 2) : 0); ?>

			<li class="clearfix">
				<div class="advpolls-answer-title">
					<?php echo $answer->title; ?>
				</div>
				<div class="advpolls-answer-graph" title="<?php echo $percent; ?>%" data-percent="<?php echo $calculated_percent; ?>%">
					<div class="advpolls-line-container">
						<div class="advpolls-full-line">
							<div class="advpolls-line" style="width: <?php echo $calculated_percent; ?>%"></div>
						</div>
						<div class="advpolls-percent" style="width: <?php echo $calculated_percent; ?>%">
							<?php echo $percent; ?>%
						</div>
					</div>
				</div>

				<?php if ($item->params->get('showVotes', 1)) : ?>
					<div class="advpolls-answer-votes">
						<?php echo sprintf('%d ' . ($answer->votes <= 1 ? 'Vote' : 'Votes'), $answer->votes); ?>
					</div>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php if ($item->params->get('showVotes', 1)) : ?>
		<div class="advpolls-total">
			Total: <span class="advpolls-total-votes"><?php echo sprintf('%d ' . ($item->total_votes <= 1 ? 'Vote' : 'Votes'), $item->total_votes); ?></span>
		</div>
	<?php endif; ?>

<?php endif; ?>