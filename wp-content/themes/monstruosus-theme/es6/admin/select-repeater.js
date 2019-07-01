
//Galería Meta - Agregar member
jQuery(document).ready(function($){
	$('#table__team').on('click','.add__member_JS',function() {

		var meta_name = jQuery(this).attr('meta-name');
		var lastkey = 0;
		var nextKey = 0;

		jQuery('#table__team_JS').find('tr').each(function(){
			var actualKey = parseInt( jQuery(this).attr('meta-key') );
			if (lastkey <= actualKey ){
				lastkey = actualKey;
			}
		});
		nextKey = lastkey + 1;

		var clone = jQuery("#team_clone_JS").clone()
												.appendTo("#table__team_JS")
												.css("visibility", "visible")
												.attr( "meta-key", nextKey )
												.removeAttr('id');	
		clone.find('*').attr('disabled', false );

		clone.attr('id',meta_name+'_'+nextKey);
		clone.find('td').attr('id',meta_name+'_'+nextKey);
		clone.find('td:nth-child(1) > input').attr('name',meta_name+'['+nextKey+']').attr('id',meta_name+'_'+nextKey).attr('required','required').css({'opacity':'0','height':'0','width':'100%'});
	});
});

//Galería Meta - Eliminar Item
jQuery(document).ready(function($){
	$('#table__team').on('click','.reset',function(e) {
		e.preventDefault();
		var meta_name = jQuery(this).attr('meta-name');
		var num_ele = jQuery('#table__team_JS').children("tr").length;
		if( num_ele > 1) { // Verifica que haya al menos un elemento con esa clase__input
			var row = jQuery(this).parent().parent().parent().attr('meta-key'); // Obtiene la llave del elemento a eliminar
			jQuery('#table__team tr[meta-key='+row+']').remove(); // Elimina los elementos con esa llave
		}
		var counter=0;
		jQuery('#table__team_JS').find('tr').each(function(){
			jQuery(this).attr('meta-key',counter).attr('id',meta_name+'_'+counter);
			jQuery(this).find('td').attr('id',meta_name+'_'+counter);
			jQuery(this).find('td:nth-child(1) > input').attr('name',meta_name+'['+counter+']').attr('id',meta_name+'_'+counter);
			counter++;
		});
	});
});
jQuery(document).ready(function($){
	$('#table__team').on('click','.delete__member_JS',function(e) {
		e.preventDefault();
		var meta_name = jQuery(this).attr('meta-name');
		var num_ele = jQuery('#table__team_JS').children("tr").length;
		if( num_ele > 1) { // Verifica que haya al menos un elemento con esa clase__input
			var row = jQuery(this).parent().parent().attr('meta-key'); // Obtiene la llave del elemento a eliminar
			jQuery('#table__team tr[meta-key='+row+']').remove(); // Elimina los elementos con esa llave
		}
		var counter=0;
		jQuery('#table__team_JS').find('tr').each(function(){
			jQuery(this).attr('meta-key',counter).attr('id',meta_name+'_'+counter);
			jQuery(this).find('td').attr('id',meta_name+'_'+counter);
			jQuery(this).find('td:nth-child(1) > input').attr('name',meta_name+'['+counter+']').attr('id',meta_name+'_'+counter);
			counter++;
		});
	});
});

