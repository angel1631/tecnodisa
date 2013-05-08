
	
	function animar_entrada(contenedor, opciones, iniciox, inicioy,tiempo_animacion){

		var ancho_contenedor=$(contenedor).width();
		var alto_contenedor=$(contenedor).height();
		var numero_aleatorio=0;
		var ancho_label=0;
		var alto_label=0;
		var ancho_label=0;
		var posicion_x=0;
		var posicion_y=0;
		$(opciones).css('display', 'block');
		$(contenedor+" "+opciones).each(function (){
			ancho_label=$(this).width();
			alto_label=$(this).height();
			while(numero_aleatorio==0){
				numero_aleatorio=Math.round(Math.random()*100);
			}
				if(numero_aleatorio>50){
					numero_aleatorio=0;
					while(numero_aleatorio==0){
						numero_aleatorio=Math.round(Math.random()*100);
					}
						if(numero_aleatorio>50){
							posicion_x=ancho_contenedor+10;
						}else{
							posicion_x=-10-ancho_label;
						}
					posicion_y=Math.round(Math.random()*alto_contenedor);
					
					$(this).css('left', posicion_x);
					$(this).css('top', posicion_y);

					numero_aleatorio=0;
				}else{
					numero_aleatorio=0;
					while(numero_aleatorio==0){
						numero_aleatorio=Math.round(Math.random()*100);
					}
						if(numero_aleatorio>50){
							posicion_y=alto_contenedor+10;
						}else{
							posicion_y=-10-alto_contenedor;
						}
					posicion_x=Math.round(Math.random()*ancho_contenedor);
					
					$(this).css('left', posicion_x);
					$(this).css('top', posicion_y);

					numero_aleatorio=0;
				}
		});
		var inicio=iniciox;
		var tope=inicioy;
		$(contenedor+" "+opciones).each(function (){
			ancho_label=$(this).width();
			
			$(this).animate({"left": inicio+"px", "top": tope+"px"}, tiempo_animacion);
			inicio=inicio+ancho_label;
		});	
		/*
		var timeoutId = setTimeout(function(){
		  animar_salida("#animacion_1", "label", 55, 50);
		},7000);*/
		

	}
	function animar_salida(contenedor, opciones, iniciox, inicioy,tiempo_animacion){
		var ancho_contenedor=$(contenedor).width();
		var alto_contenedor=$(contenedor).height();
		var numero_aleatorio=0;
		var ancho_label=0;
		var alto_label=0;
		var ancho_label=0;
		var posicion_x=0;
		var posicion_y=0;
		$(contenedor+" "+opciones).each(function (){
			ancho_label=$(this).width();
			alto_label=$(this).height();
			while(numero_aleatorio==0){
				numero_aleatorio=Math.round(Math.random()*100);
			}
				if(numero_aleatorio>50){
					posicion_x=ancho_contenedor+10;
				}else{
					posicion_x=-10-ancho_label;
				}
			posicion_y=Math.round(Math.random()*alto_contenedor);
			
			
			$(this).animate({"left": posicion_x+"px", "top": posicion_y+"px"}, tiempo_animacion);
			numero_aleatorio=0;
		});
		
			
	}
	function crear_grafica(contenedor,opciones,iniciox,inicioy,tiempo_animacion){
		var ancho_contenedor=$(contenedor).width();
		var alto_contenedor=$(contenedor).height();
		var ancho=150;
		var inicio=iniciox;
		var tope=inicioy;

		$(opciones).css('display', 'block');
		$(contenedor+" "+opciones).each(function (){
			$(this).css('left', inicio+'px');
			$(this).animate({"top": tope+"px"}, tiempo_animacion);
			inicio=inicio+60;
			tope=tope-15;
		});	


	}
	function llamada_retrasada(tiempo_retraso,funcion,p1,p2,p3,p4,p5){
		var timeoutB = setTimeout(function(){
			//animar_entrada("#animacion_1", ".op", 55, 50,5000);
			funcion(p1,p2,p3,p4,p5);

		},tiempo_retraso);
		//clearTimeout(timeoutId);
	}

	


	
