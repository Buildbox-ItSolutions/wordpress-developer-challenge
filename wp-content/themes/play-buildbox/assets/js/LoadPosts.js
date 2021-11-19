jQuery(function($){ 
	$('.load--posts').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': posts_loadmore_params.posts, // Query puxada na função
			'page' : posts_loadmore_params.current_page
		};
 
		$.ajax({ 
			url : posts_loadmore_params.ajaxurl, // AJAX handler
			
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Carregando...'); // Feedback de funcionamento do load
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Carregar Mais' ).prev().before(data); // Inserir posts
					posts_loadmore_params.current_page++;
 
					if ( posts_loadmore_params.current_page == posts_loadmore_params.max_page ) 
						button.remove(); //Remove botão de carregar mais quando carrega todas as pages
					
				} else {
					button.remove(); // Caso não tenha posts a chamar, não mostra botão
				}
				
			}
			
		});
		
	});
});