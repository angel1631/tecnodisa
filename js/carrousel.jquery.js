 $(document).ready(function (){
 	$container = $('#slide_baner').children().eq(0);
			if($container){
				var $fotos = $container.children();
				var cantidad= $fotos.length;
				var incremento= $fotos.outerHeight(true);
				var encarrousel = Math.floor($('#marco').height() / incremento);
				var primerelemento = 1;
				var estaMoviendo = false;
			}
	$container.css('width', (cantidad + encarrousel) * incremento);
		for(var i=0; i<encarrousel; i++){
			$container.append($fotos.eq(i).clone());
		}
	$('#siguiente').click(function(e){
				e.preventDefault();		
				if(!estaMoviendo){
						if(primerelemento>cantidad){
						$container.css('left', '0px');
						primerelemento=2;
						}
						else{
							primerelemento++;
						}
					estaMoviendo = true;
					$container.animate({
						top: '-=' + incremento,}, 'swing', function(){
							estaMoviendo = false;
					})
				}				
			});
	$('#anterior').click(function(e){
				e.preventDefault();
				if(!estaMoviendo){
					if(primerelemento==1){
					$container.css('left', cantidad * incremento * -1);
					primerelemento=cantidad;
					}
					else{
						primerelemento--;
					}
					estaMoviendo = true;
					$container.animate({
						left: '+=' + incremento,}, 'swing', function(){
							estaMoviendo = false;
					})
				}
			});
 });