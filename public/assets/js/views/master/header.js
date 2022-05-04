/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: Department Selection
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
Department Selection
-----------------------------------------------------------------------*/
$('.aioscript-universe-select').on('click', function () {
    var id = $(this).data("universe-id");
    $.ajax({
    	type: 'POST',
    	data: {
    		id:id
    	},
        url: base_url+'/switch_universe/',
        success: function() {
        	location.reload(true);
        }
    });
});