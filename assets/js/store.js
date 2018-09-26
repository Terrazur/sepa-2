function test(){
	var search;
	var srcName = $('#shoesName').val();
	var shoes =  $('.fall').length;
	
	var searchNumber = '';
	var nameSpace = srcName.indexOf(' ');
	var strType = $('#product_type').find(":selected").text();
	var strGend = $('#product_gender').find(":selected").text();
	var tempType = strType.split(" ");
	var joinType = tempType.join("");
	var type = joinType.toLowerCase();
	var gender = strGend.toLowerCase();

	$('#error').hide();
	if(type == 'all'){
		if (gender == 'all') {
			if (srcName == '' || srcName == null) {
				$('.fall').hide();
				$('.allType'+'.allGender').slideDown(500);
			}
			else{
				if (nameSpace >= 0) {
					search = srcName.toLowerCase();
					var searchPart = search.split(' ');
					for (var i = 0; i < searchPart.length; i++) {
						if (searchPart[i] == '' || searchPart[i] == null) {
							
						}
						else{
							searchNumber += '.'+searchPart[i];
						}
					}
					$('.fall').hide();
					$(searchNumber).slideDown(500);
				}
				else{
					search = srcName.toLowerCase();
					$('.'+search).slideDown(500);
				}
			}
		}
		else{
			if (srcName == '' || srcName == null) {
				$('.'+gender).show();
			}
			else{
				if (nameSpace >= 0) {
					search = srcName.toLowerCase();
					var searchPart = search.split(' ');
					for (var i = 0; i < searchPart.length; i++) {
						if (searchPart[i] == '' || searchPart[i] == null) {
							
						}
						else{
							searchNumber += '.'+searchPart[i];
						}
					}
					$(searchNumber+'.'+gender).show();
				}
				else{
					search = srcName.toLowerCase();
					$('.'+search+'.'+gender).show();
				}		
			}
		}
	}
	else{
		if (gender == 'all') {
			$('.'+type).show();
		}
		else{
			$('.'+gender+'.'+type).show();
		}
	}


	var hidden =  $('.fall:hidden').length;
	var count = $('.fall').length;

	if (hidden == shoes) {
		$('#error').text('Sorry, No '+strType+' Shoes For '+strGend+' Has Been Found');
		$('#error').slideDown(500)
	}
	else{
		$('#error').text('');
	}
}