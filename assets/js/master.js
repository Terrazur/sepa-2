// input start
	$(".form-input").focus(function(){
		$(this).parent().addClass("form-active form-completed");
	});

	$(window).ready(function(){
		$(".form-input").show(function(){
			$(this).parent().addClass("form-active form-completed");
			if($(this).val() == "")
				$(this).parent().removeClass("form-completed");
			$(this).parent().removeClass("form-active");
		});
	});

	$(".form-input").focusout(function(){
		if($(this).val() == "")
			$(this).parent().removeClass("form-completed");
		$(this).parent().removeClass("form-active");
	})
// input end

// scroll detect start
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll >= 200) {
			$(".navbar-transparent").addClass("navbar-black navbar-transition");
		}
		else{
			$(".navbar-transparent").removeClass("navbar-black");	
		}
	}); 
// scroll detect end

// collapse start
	$(".collapse").click(function(){
		$(".show").slideToggle();
	});
	$("#user").click(function(){
		$(".drop").slideToggle();
	});
// collapase end

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

var priceItems =  $('.price').length;
for (var i = 0; i < priceItems ; i++) {
    var price = $('#price'+i).html();
    var priceSplit = price.split('.');
    priceSplit[0] = priceSplit[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    var priceFinal = priceSplit.join('.');
    $('#price'+i).html(priceFinal);
}

var totalItems =  $('.total').length;
for (var i = 0; i < totalItems ; i++) {
    var total = $('#total'+i).html();
    totalFinal = total.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $('#total'+i).html(totalFinal);
}

// confirm pass start
  function confirm() {
    var conf = $("#conf").val();
    var pass = $("#pass").val();
    if (conf != pass) {
      $("#error").text("Confirm Password Must Same With Password");
    }
    else{
      $("#error").text("");
    }
  }
// confirm pass end