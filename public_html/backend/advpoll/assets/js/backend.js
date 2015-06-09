/**
 * @copyright	Copyright (c) 2013 ExtStore Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

function submitForm(route) {
	$(document.adminForm).attr('action', route);
	$(document.adminForm).submit();
}

function confirmDelete() {
	if (confirm('Do you want to delete this item?')) {
		return true;
	} else {
		return false;
	}
}

AdvPolls = {
	answers:		0,

	refresh: function() {
		// refresh sortable
		$('#answers_container').sortable();
	},

	/**
	 * Add answer.
	 */
	addAnswer: function() {
		var id	= AdvPolls.answers++;
		// count all rows
		var len	= $('answers_container').find('tr').length;

		// create new table row
		$('<tr/>', {
			id: 	'answer_row-' + id,
			class:	'row' + (len % 2)
		}).html('<td class="order nowrap center hidden-phone"><span class="sortable-handler" ><i class="icon-move" style="cusor: pointer;"></i></span><input type="hidden" name="answers[id][]" value="" /></td><td align="center" valign="top"><input type="text" class="inputbox" name="answers[title][]" value="" size="40" /></td><td align="center" valign="top"><input type="text" class="inputbox input-small" name="answers[votes][]" value="" size="10" /></td><td class="center" valign="top"><input type="checkbox" class="inputbox" value="1" onclick="AdvPolls.publishAnswer(' + id + ', this.checked ? 1 : 0);" checked="checked" /><input type="hidden" name="answers[state][]" id="answer_state-' + id + '" value="1" /></td><td align="center" valign="top" class="center"><input type="text" class="input-small" readonly="readonly" name="answers[type_answer][]" value="default" size="5" /></td><td class="center" valign="top"><a class="answer-delete" onclick="AdvPolls.removeAnswer(' + id + ');"><i class="icon-remove-sign"></i></a></td>')
		.appendTo($('#answers_container')).hide().show('slide');

		AdvPolls.refresh();
	},

	/**
	 * Remove answer.
	 */
	removeAnswer: function(id) {
		if ($('#answer_row-' + id)) {
			$('#answer_row-' + id).hide('slide', function() {
				$(this).remove();
			});
		}
	},

	/**
	 * Set answer state value.
	 */
	publishAnswer: function(id, value) {
		if ($('#answer_state-' + id)) {
			$('#answer_state-' + id).val(value);
		}
	},

	otherAnswer: function() {
		if($('#inputSchedule').val() == 0) {
			$('#inputStartDate').closest('.control-group').css('display', 'none');
			$('#inputEndDate').closest('.control-group').css('display', 'none');
			$('#inputExpiredText').closest('.control-group').css('display', 'none');
        } else {
			$('#inputStartDate').closest('.control-group').css('display', 'block');
			$('#inputEndDate').closest('.control-group').css('display', 'block');
			$('#inputExpiredText').closest('.control-group').css('display', 'block');
        }

        $('#inputSchedule').change(function(){
			if($('#inputSchedule').val() == 0) {
				$('#inputStartDate').closest('.control-group').css('display', 'none');
				$('#inputEndDate').closest('.control-group').css('display', 'none');
				$('#inputExpiredText').closest('.control-group').css('display', 'none');
			} else {
				$('#inputStartDate').closest('.control-group').css('display', 'block');
				$('#inputEndDate').closest('.control-group').css('display', 'block');
				$('#inputExpiredText').closest('.control-group').css('display', 'block');
			}
        });

        if($('#inputParamsOtherAnswer').val() == 0) {
			$('#inputParamsOtherAnswerLabel').closest('.control-group').css('display', 'none');
			$('#inputParamsDisplayOtherAnswer').closest('.control-group').css('display', 'none');
			$('#inputParamsOtherAnswerVote').closest('.control-group').css('display', 'none');
        } else {
			$('#inputParamsOtherAnswerLabel').closest('.control-group').css('display', 'block');
			$('#inputParamsDisplayOtherAnswer').closest('.control-group').css('display', 'block');
			$('#inputParamsOtherAnswerVote').closest('.control-group').css('display', 'block');
        }

        $('#inputParamsOtherAnswer').change(function(){
			if($('#inputParamsOtherAnswer').val() == 0) {
				$('#inputParamsOtherAnswerLabel').closest('.control-group').css('display', 'none');
				$('#inputParamsDisplayOtherAnswer').closest('.control-group').css('display', 'none');
				$('#inputParamsOtherAnswerVote').closest('.control-group').css('display', 'none');
			} else {
				$('#inputParamsOtherAnswerLabel').closest('.control-group').css('display', 'block');
				$('#inputParamsDisplayOtherAnswer').closest('.control-group').css('display', 'block');
				$('#inputParamsOtherAnswerVote').closest('.control-group').css('display', 'block');
			}
        });
	}

}