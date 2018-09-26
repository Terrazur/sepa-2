function next(){
	for (var i = 0; i < 5 ; i++) {
		if ($('#'+i).hasClass('prd-active')) {
			var after = i+1;
			if (after > 5) {
				after = 1;
			}

			$('#'+i).slideUp().removeClass('prd-active');
			$('#'+after).slideDown().addClass('prd-active');
			console.log(i);
			break
		}
	}
}


function previous(){
	for (var i = 0; i < 5 ; i++) {
		if ($('#'+i).hasClass('prd-active')) {
			var after = i-1;
			if (after < 0) {
				after = 4;
			}
			$('#'+i).slideUp().removeClass('prd-active');
			$('#'+after).slideDown().addClass('prd-active');
			console.log(i);

			break
		}
	}
}