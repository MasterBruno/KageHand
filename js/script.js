window.onload = function (){
	document.getElementById("cpf").onfocus = function() {
        set_item('');
	};
	document.getElementById("cartao").onfocus = function() {
        document.getElementById("cartao").value('');
	};
	document.getElementById("senha").onfocus = function() {
        document.getElementById("senha").value('');
	};
	document.getElementById("finalizar").fadeOut();
}
function autocomplet() {
	var keyword = $('#cpf').val();
	if(keyword != '') {
		$.ajax({
			url: 'buscarCPF.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#sugestao').show();
				$('#sugestao').html(data);
			}
		}); 
	} else {
		$('#sugestao').fadeOut();
		$('#sugestao').html("");
	}
}

function verificaDisp() {
	var data = $('#arrival_date').val();
	var tipoQ = $('#tipoQ').val();
	if(data != ''){
		$.ajax({
			url: 'buscaQuarto.php',
			type: 'POST',
			data: {data:data, tipoQ:tipoQ},
			success:function(data){
				$('#nQuarto').html(data);
			}
		});
	} else {
		alert("Informe uma data!");
	}
}

function verificaData(){
	var data = $('#arrival_date').val();
	if(data != ''){
	} 
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#cpf').val(item);
	// hide proposition list
	$('#sugestao').hide();
}

function buscarCPF(){
	var keyword = $('#cpf').val();
	if(keyword != '') {
		$.ajax({
			url: 'buscarCPF.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#finalizar').show();
				$('#finalizar').html(data);
			}
		}); 
	} else {
		$('#finalizar').fadeOut();
		$('#finalizar').html("");
	}
}

function buscarReserva(){
	var keyword = $('#cpf').val();
	var senha = $('#senha').val();
	if(keyword != '') {
		$.ajax({
			url: 'buscarReserva.php',
			type: 'POST',
			data: {keyword:keyword, senha:senha},
			success:function(data){
				$('#resultado').show();
				$('#resultado').html(data);
				$('#resultado')[0].scrollIntoView(true);
			}
		}); 
	} else {
		alert("Informe CPF e Senha!");
		$('#resultado').fadeOut();
		$('#resultado').html("");
	}
}

function formatar(mascara, documento){
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i)

	if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
	}  
}