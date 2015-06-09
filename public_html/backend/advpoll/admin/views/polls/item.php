<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

?>

<script>
$(document).ready(function() {
	$('#pollForm').submit(function() {
		if ($('#inputTitle').val() == '') {
			alert('Poll Question is required!');
			return false;
		}

		return true;
	});

	$("#inputStartDate").datepicker({
		dateFormat: 'yy-mm-dd'
	});
    $("#inputEndDate").datepicker({
		dateFormat: 'yy-mm-dd'
	});

	$('#inputParamsHeaderFooterBg').minicolors();
	$('#inputParamsHeaderFooterText').minicolors();
	$('#inputParamsBodyBg').minicolors();
	$('#inputParamsBodyText').minicolors();

});
</script>

<div class="row-fluid">
	<form action="" method="post" id="pollForm" name="adminForm">
		<div class="span9 form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputTitle">
					Poll Question<span class="star">&nbsp;*</span>
				</label>

				<div class="controls">
					<input class="input-xxlarge" type="text" name="title" id="inputTitle" required="required" placeholder="Poll Question" value="<?php echo $item->title; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputState">
					State
				</label>

				<div class="controls">
					<select name="state" id="inputState">
						<option <?php echo $item->state ? "selected='selected'" : ''; ?> value="1">
							Published
						</option>
						<option <?php echo !$item->state ? "selected='selected'" : ''; ?> value="0">
							Unpublished
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputSchedule">
					Schedule
				</label>

				<div class="controls">
					<select name="schedule" id="inputSchedule">
						<option <?php echo !$item->schedule ? "selected='selected'" : ''; ?> value="0">
							No
						</option>
						<option <?php echo $item->schedule ? "selected='selected'" : ''; ?> value="1">
							Yes
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTitle">
					Start Date
				</label>

				<div class="controls">
					<input class="input" type="text" name="start_date" id="inputStartDate" placeholder="Start Date" value="<?php echo $item->start_date ? $item->start_date : ''; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTitle">
					End Date
				</label>

				<div class="controls">
					<input class="input" type="text" name="end_date" id="inputEndDate" placeholder="End Date" value="<?php echo $item->end_date ? $item->end_date : ''; ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputExpiredText">
					Expired Text
				</label>
				<div class="controls">
					<input class="input" type="text" name="params[expiredText]" id="inputExpiredText" placeholder="Expired Text" value="<?php echo $item->params->get('expiredText') ? $item->params->get('expiredText') : 'Poll is expired to vote!' ?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputTitle">
					Poll Answers
				</label>
				<div class="controls">
					<?php include 'item_answers.php'; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsOtherAnswer">
					Other Answer
				</label>

				<div class="controls">
					<select name="params[otherAnswer]" id="inputParamsOtherAnswer">
						<option value="1" <?php echo $item->params->get('otherAnswer') == 1 ? 'selected="selected"' : ''; ?>>
							Yes
						</option>
						<option value="0" <?php echo $item->params->get('otherAnswer') == 0 || $item->params->get('otherAnswer') == null ? 'selected="selected"' : ''; ?>>
							No
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">
					Other Answer Label
				</label>
				<div class="controls">
					<input type="text" id="inputParamsOtherAnswerLabel" name="params[otherAnswerLabel]" value="<?php echo $item->params->get('otherAnswerLabel') ? $item->params->get('otherAnswerLabel') : 'Other' ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsDisplayOtherAnswer">
					Display Other Answer
				</label>

				<div class="controls">
					<select name="params[displayOtherAnswer]" id="inputParamsDisplayOtherAnswer">
						<option value="1" <?php echo $item->params->def('displayOtherAnswer', 1) == 1 ? 'selected="selected"' : ''; ?>>
							Yes
						</option>
						<option value="0" <?php echo $item->params->get('displayOtherAnswer') != 1 ? 'selected="selected"' : ''; ?>>
							No
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsOtherAnswerVote">
					Other Answer Vote
				</label>

				<div class="controls">
					<select name="params[otherAnswerVote]" id="inputParamsOtherAnswerVote">
						<option value="1" <?php echo $item->params->def('otherAnswerVote', 1) == 1 ? 'selected="selected"' : ''; ?>>
							Yes
						</option>
						<option value="0" <?php echo $item->params->get('otherAnswerVote') != 1 ? 'selected="selected"' : ''; ?>>
							No
						</option>
					</select>
				</div>
			</div>

		</div>

		<div class="span3">
			<div class="control-group">
				<label class="control-label" for="inputParamsMaxChoices">
					Max Choices
				</label>

				<div class="controls">
					<input type="text" name="params[maxChoices]" id="inputParamsMaxChoices" placeholder="Max Choices" value="<?php echo $item->params->get('maxChoices', 1); ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsLog">
					Lag
				</label>

				<div class="controls">
					<input type="text" name="params[lag]" id="inputParamsLog" placeholder="Lag" value="<?php echo $item->params->get('lag', 86400); ?>" />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsResultGraph">
					Result Graph
				</label>

				<div class="controls">
					<select name="params[resultGraph]" id="inputParamsResultGraph">
						<option value="0" <?php echo $item->params->def('resultGraph', 0) == 0 ? 'selected="selected"' : ''; ?>>
							Normal Line
						</option>
						<option value="1" <?php echo $item->params->get('resultGraph') == 1 ? 'selected="selected"' : ''; ?>>
							Full Line
						</option>
						<option value="2" <?php echo $item->params->get('resultGraph') == 2 ? 'selected="selected"' : ''; ?>>
							Google Pie Chart
						</option>
						<option value="3" <?php echo $item->params->get('resultGraph') == 3 ? 'selected="selected"' : ''; ?>>
							Google Bar Chart
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsShowResult">
					Show Result
				</label>

				<div class="controls">
					<select name="params[showResult]" id="inputParamsShowResult">
						<option value="1" <?php echo $item->params->def('showResult', 1) == 1 ? 'selected="selected"' : ''; ?>>
							Yes
						</option>
						<option value="0" <?php echo $item->params->get('showResult') != 1 ? 'selected="selected"' : ''; ?>>
							No
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsShowVotes">
					Show Votes
				</label>

				<div class="controls">
					<select name="params[showVotes]" id="inputParamsShowVotes">
						<option value="1" <?php echo $item->params->def('showVotes', 1) == 1 ? 'selected="selected"' : ''; ?>>
							Yes
						</option>
						<option value="0" <?php echo $item->params->get('showVotes') != 1 ? 'selected="selected"' : ''; ?>>
							No
						</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsHeaderFooterBg">
					Header-Footer Background
				</label>

				<div class="controls">
					<input type="text" class="input" name="params[header_footer_bg]" id="inputParamsHeaderFooterBg"
						value="<?php echo $item->params->get('header_footer_bg') ? $item->params->get('header_footer_bg') : '#FFFFFF';?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsHeaderFooterText">
					Header-Footer Text
				</label>

				<div class="controls">
					<input type="text" class="input" name="params[header_footer_text]" id="inputParamsHeaderFooterText"
						value="<?php echo $item->params->get('header_footer_text') ? $item->params->get('header_footer_text') : '#111111';?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsBodyBg">
					Body Background
				</label>

				<div class="controls">
					<input type="text" class="input" name="params[body_bg]" id="inputParamsBodyBg"
						value="<?php echo $item->params->get('body_bg') ? $item->params->get('body_bg') : '#EEEEDD';?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputParamsBodyText">
					Body Text
				</label>

				<div class="controls">
					<input type="text" name="params[body_text]" id="inputParamsBodyText"
						value="<?php echo $item->params->get('body_text') ? $item->params->get('body_text') : '#4D4D4D';?>"/>
				</div>
			</div>

		</div>

		<input type="hidden" name="id" value="<?php echo $item->id; ?>" />
	</form>
</div>