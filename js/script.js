function autocomplet() {
	var keyword = $('#search').val();
	var tab = $('.tab-content .active').attr('id');
	if(keyword != '') {
		$.ajax({
			url: 'fetch.php',
			type: 'POST',
			data: {keyword:keyword, tab:tab},
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
	$('#search').val(item);
	// hide proposition list
	$('#sugestao').hide();
}
