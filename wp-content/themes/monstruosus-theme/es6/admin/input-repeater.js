// STARTS DETALLES META

//Detalles Meta - Agregar Item
jQuery(document).ready(function($){
	$('#table__detalles').on('click','.add__detalle_JS',function() {
		var meta_name = jQuery(this).attr('meta-name');
		var lastkey = 0;
		var nextKey = 0;
		jQuery('#tbody__detalles_JS').find('tr').each(function(){
			var actualKey = parseInt( jQuery(this).attr('meta-key') );
			if (lastkey <= actualKey ){
				lastkey = actualKey;
			}
		});
		nextKey = lastkey + 1;
		var clone = jQuery("#detalle_clone_JS").clone()
												.appendTo("#tbody__detalles_JS")
												.css("visibility", "visible")
												.attr( "meta-key", nextKey )
												.removeAttr('id');	
		clone.find('*').attr('disabled', false );
		
		clone.find('td').attr('id',meta_name+'_'+nextKey);

		clone.find('td:nth-child(1) > input').attr('name',meta_name+'['+nextKey+'][detalle]')
		clone.find('td:nth-child(2) > input').attr('name',meta_name+'['+nextKey+'][contenido]');
		
		clone.find('td:nth-child(1) > input').attr('id',meta_name+'_'+nextKey+'_detalle');
		clone.find('td:nth-child(2) > input').attr('id',meta_name+'_'+nextKey+'_contenido');
 		
 		clone.attr('id',meta_name+'_'+nextKey);
   });
});

//Detalles Meta - Elimnar Item
jQuery(document).ready(function($){
	$('#table__detalles').on('click','.delete__detalle_JS',function(e) {
		e.preventDefault();
		var meta_name = jQuery(this).attr('meta-name');
		var num_ele = jQuery('#tbody__detalles_JS').children("tr").length;
		if( num_ele > 1) { // Verifica que haya al menos un elemento con esa clase__input
			var row = jQuery(this).parent().parent().attr('meta-key'); // Obtiene la llave del elemento a eliminar
			jQuery('#table__detalles tr[meta-key='+row+']').remove(); // Elimina los elementos con esa llave
		}
		var counter=0;
		jQuery('#tbody__detalles_JS').find('tr').each(function(){
			jQuery(this).attr('meta-key',counter);
			jQuery(this).find('td:nth-child(1) > input').attr('name',meta_name+'['+counter+'][detalle]');
			jQuery(this).find('td:nth-child(2) > input').attr('name',meta_name+'['+counter+'][contenido]');
			
			jQuery(this).attr('id',meta_name+'_'+counter); 
			jQuery(this).find('td:nth-child(1) > input').attr('id',meta_name+'_'+counter+'_detalle');
			jQuery(this).find('td:nth-child(2) > input').attr('id',meta_name+'_'+counter+'_contenido');
			counter++;
		});
	});
});

//Detalles Meta - Sort Gallery Rows
jQuery(document).ready(function($){
	
	function start_function() {
		$('body').css('cursor','move');
		$('#table__detalles .tr_sortable').addClass('shadow');
	}
	
	function stop_function() {
		$('body').css('cursor','default');
		$('#table__detalles').find('.tr_sortable').removeClass('shadow');
	}

	function update_function() { }
	
	$('#table__detalles').sortable({ 
		items: '.tr_sortable',
		cancel:'input',
		start: start_function,
		stop: stop_function,
		update: update_function
	});	

});

jQuery(document).ready(function($){
	$('.move').click( function (e) {
		e.preventDefault();
	});
});