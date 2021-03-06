NewsEdit = {
    init : function() {
	$('.countries .delete-button').bind('click', function() {
            $(this).closest('li').remove();
	});

	$(".countries select").chosen({"search_contains" : true});
	
        $('#add-country').click(function() {
            var countriesList = $('#countries-fields-list');

            var newWidget = countriesList.attr('data-prototype');
            newWidget = newWidget.replace(/\$\$name\$\$/g, NewsEdit.countryCount);
            NewsEdit.countryCount++;

            var deleteButton = $('<a class="btn-delete delete-button" href="javascript:;" title="' + NewsEdit.i18n.deleteCountry + '">x</a>');
            deleteButton.bind('click', function() {
                $(this).closest('li').remove();
            });

            var newLi = $('<li></li>').html(newWidget).append(deleteButton);
            newLi.appendTo($('#countries-fields-list'));

            $(".countries select").chosen({"search_contains" : true});
            return false;
        });        
    }
}

$(NewsEdit.init);