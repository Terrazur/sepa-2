$('#gender').hide();
$('#type').hide();

function toggle(id) {
	$('#'+id).slideToggle();
}

function search(select) {
	console.log(select);
	var test = $('#'+select).hasClass("active");
	console.log(test);
	if (test == false) {
		$('.active').removeClass('active');

		if (select == 'all') {
			$('.sort').show(500);
		}

		else{
			$('.sort').not('.'+select).hide(500);
			$('.'+select).show(500);
		}
		
		$('#'+select).addClass('active');
	}
}