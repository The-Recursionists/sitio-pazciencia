$(function () {
	var NewReference = $('#NewReference');
	var ReferencesTable = $('#ReferencesTable');

	var remove_item = function (event) {
		event.preventDefault();
		$(this).off();
		$(this).closest('tr').remove();
	};

	NewReference.on('click', function () {
		var cloned = $('#CloneTemplate').clone();
		cloned.removeAttr('id');
		cloned.removeClass('d-none');
		var index = $('tbody > tr').length;
		var delete_button = cloned.find('.delete-template-unsaved');
		
		cloned.find('.title').attr('name', 'data[references][' + index + '][title]');
		cloned.find('.reference_url').attr('name', 'data[references][' + index + '][url]');
		delete_button.on('click', remove_item);
		$('#ReferencesTable > tbody').append(cloned);
	});
});


/**
 * TODO: 
 * - Asegurarnos que inputs guardados se ponen tambien
 */