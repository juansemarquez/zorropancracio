$.fn.disableSelection = function() {
    return this.each(function() {
        $(this).attr('unselectable', 'on')
               .css({
                   '-moz-user-select':'none',
                   '-webkit-user-select':'none',
                   'user-select':'none'
               })
               .each(function() {
                   this.onselectstart = function() { return false; };
               });
    });
};

var footer = function(action){

	var n;

	switch(action)
	{
	case 'open':
	  n = '250px';
	  break;
	case 'close':
	  n = '50px';

	  break;
	}

	$('footer.fixed').animate({
		height: n,
	}, 500);

}

var km = function(distance) {

	var a = $('#km').html();
	var b = parseInt(a) + distance;
	$('#km').html(b);

}

var show = function(provincia, data){

    console.log(data);
    console.log(provincia);
	var j = jQuery.parseJSON(data);
	var mensaje = j.msj;
	var errores = j.errores;
	var ok = j.ok;
	var distance = j.km;

	// Tomamos la distancia y lal sumamos
	km(distance);

	//Si hay error...
	if(ok == 0){
		$('#mensaje').addClass('error');

		$('#errores').parent('span').effect("highlight", {}, 3000);

	}
	else if(ok == 1) //Y si no lo hay…
	{
		$('#mensaje').removeClass('error');
	}
	else //Ganaste!
	{
		$(provincia).addClass('ganaste');
		$('#ganaste').appendTo(provincia);
		$('#ganaste').fadeIn();
		$('#viajar').unbind('click');
		$('#viajar').text('Volver a jugar');
		$('#viajar').attr("href", "/");
		$('#ganaste .pancracio').animate({
			bottom: '-50',
		});
		return false;
	}

	// Mostramos el mensaje
	$('#mensaje .bubble p').html(mensaje);
	$('#errores').html(errores);
	$('#mensaje').appendTo(provincia);

	$('#mensaje').fadeIn();
}

var verificar = function(destino, prov){

	var json = $('#json').text();
    console.log(json);

	var a = $('#km').html();
	var b = parseInt(a);

	try
	{
		var j = jQuery.parseJSON(json);
	}
	catch(e)
	{
		alert('Error, un dato está faltando. Intente comenzar de nuevo!');
	}

	$.ajax({
		url: 'action.php',
		type: "POST",
		data: {
			"base": j.base,
			"km": j.km,
			"kmtotal": b,
			"nombre": j.nombre,
			"personaje": j.personaje,
			"destino" : destino,
			"viaje": j.viaje,
			"paso": j.paso,
			"errores": j.errores
		},
		success: function(data) {
			$('#json').html(data);
			show(prov, data);
		},
		error: function() {
			alert('Ocurrió un error.');
		}
	});

}

function mostrarCartelCelulares()
{
    var x = '<form action="juego.php" method="post">';
    x += '<div id="pancracio"></div>';
    x += '<h1>Este juego no funciona<br> en pantallas pequeñas</h1>';
    x += '</form>';
    $('#login').html(x);
    alert("Este juego no funciona en pantallas pequeñas");
}

$(function() {

	//$('body').disableSelection();
    if($(window).width() < 800){
        mostrarCartelCelulares();
    } else {

        $('#nombre').focus();

        $("input:radio[name=cod]").click(function() {
            if($(this).is(':checked') && $(this).val() == '0'){
                $("#codigoinput").show();
            }else{
                $("#codigoinput").hide();
            }
        });

        $.scrollTo('#inicio', 1500, {
            offset: { top: -30 },
        });

        var link = null;
        var prov = null;

        $('#provincias ol li').live('click', function() {
            link = $(this).children('a');
        });

        $('#provincias ol li').localScroll({
            hash: false,
            reset: true,
            offset: { top: -30 },
            duration: DURACION, // Duración del viaje!
            onBefore: function(e, elem){
                prov = elem.id;
                $('#mensaje').fadeOut();
                footer('close');
            },
            onAfter: function(e, elem){
                var rel = link.prop('rel');
                verificar(rel, '#' + prov);
                footer('close');
            }
        });

        $('#viajar').click(function(ev){
            ev.preventDefault();
            footer('open');
        });
    }
});
