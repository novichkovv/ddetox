/**
 * @copyright	Copyright (c) 2013 Skyline Technology Ltd (http://extstore.com). All rights reserved.
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
 */

function submitForm(route) {
	$(document.adminForm).attr('action', route);
	$(document.adminForm).submit();
}

AdvPolls = {
	liveSite:	'',
	modal:		null,

	init: function() {
		$(function() {
			// process polls
			$('.advpolls').each(function() {
				var form		= $(this).find('form.advpolls-form');
				var maxChoices	= parseInt(form.find('input[name="maxChoices"]').val());

				if (maxChoices >= 1) {
					AdvPolls.initChoice(form, maxChoices);
				}

				AdvPolls.initAjax($(this));
			});

			// create modal
			AdvPolls.modal = $('<div id="advpolls-modal" class="modal fade"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 class="modal-title"></h3></div><div class="modal-body"></div></div>').appendTo(document.body);
		});
	},

	initChoice: function(el, max) {
		var checkBoxes	= $(el).find('input[type="checkbox"]');
		var otherCheck = jQuery(el).find('.other-answer-checkbox');
		var otherInput = jQuery(el).find('.other-answer-input');


		checkBoxes.click(function(event) {
			if ($(this).is(':checked')) {
				otherInput.val('');
				otherInput.css('display', 'none');

				if (max == 1) {
					checkBoxes.prop('checked', false);
					$(this).prop('checked', true);
				} else {
					if ($(el).find('input[type="checkbox"]:checked').length > max) {
						$(this).prop('checked', false);
					}
				}
			}
		});

		otherCheck.click(function(event) {
			if(jQuery(this).is(':checked')) {
				otherInput.show(200);
				otherInput.css('max-width', '92%');
			} else {
				otherInput.val('');
				otherInput.hide(200);
			}
		});

	},

	initAjax: function(el) {
		var title	= el.find('.advpolls-question').text();

		// result button
		$(el).find('.advpolls-showresult').click(function(event) {
			event.preventDefault();

			var id	= parseInt($(el).find('form.advpolls-form input[name="id"]').val());

			$.ajax({
				url:	AdvPolls.liveSite + '/index.php?load=polls/ajaxResult',
				method:	'post',
				data:	$.param($(this).parents('form').find('input[type="hidden"]'))
			}).done(function(message) {
				AdvPolls.setModalContent(title, message);
			});
		});

		// vote button
		$(el).find('.advpolls-vote').click(function(event) {
			event.preventDefault();

			var otherCheck = jQuery(el).find('.other-answer-checkbox');
			var otherInput = jQuery(el).find('.other-answer-input');
			var advpoll_form = jQuery(el).find('form.advpolls-form');

			if(otherCheck.is(':checked')) {
				if(otherInput.val() == '') {
					AdvPolls.setModalContent(title, '<p>Please enter your answer!</p>');
					return;
				}
			}


			//if ($('form.advpolls-form input[type="checkbox"]:checked').length == 0) {
			if(advpoll_form.find('input[type=checkbox]:checked').length == 0) {
				// show message
				AdvPolls.setModalContent(title, '<p>You must select at least one item to vote!</p>');
			} else {
				$.ajax({
					url:	AdvPolls.liveSite + '/index.php?load=polls/ajaxVote',
					method:	'post',
					data:	$.param($(this.form).find('input[type="hidden"], input[type="checkbox"]:checked, .other-answer-input'))
				}).done(function(message) {
					AdvPolls.setModalContent(title, message);
				});
			}
		});
	},

	setModalContent: function(title, content) {
		var body	= AdvPolls.modal.find('.modal-body');

		if (content.indexOf('id="advpolls-gchart') == -1) {
			body.html(content);
		}

		AdvPolls.modal.find('.modal-title').text(title);

		AdvPolls.modal.unbind('show').unbind('shown').on('show', function() {
			body.find('.advpolls-line').css('width', 0);
			body.find('.advpoll-percent').css('width', 0);
		}).on('shown', function() {
			if (content.indexOf('id="advpolls-gchart') != -1) {
				body.html(content);
			}

			body.find('.advpolls-answer-graph').each(function() {
				var el		= $(this);
				var width	= el.data('percent');

				if (width != '0%') {
					el.find('.advpolls-line').animate({width: width});
					el.find('.advpolls-percent').animate({width: width});
				}
			});
		});

		if (AdvPolls.modal.find('.advpolls-total').length) {
			AdvPolls.modal.find('.modal-footer').remove();
			$('<div class="modal-footer">' + AdvPolls.modal.find('.advpolls-total').html() + '</div>').insertAfter(AdvPolls.modal.find('.modal-body'));
			AdvPolls.modal.find('.advpolls-total').remove();
		} else {
			AdvPolls.modal.find('.modal-footer').remove();
		}

		AdvPolls.modal.modal('show');
	}
}

$(document).ready(function() {
	AdvPolls.init();
});