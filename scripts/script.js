$(document).ready(function(){
	// Homepage form switch
	$("#myonoffswitch").change(function() {
	    if(this.checked) {
	        $('#cpl').addClass('show');
	        $('#otm').removeClass('show');
	    } else {
	        $('#cpl').removeClass('show');
	        $('#otm').addClass('show');

	    }
	});
	// Page Layout menu button, slideout and options
	$('.menu').click(function(){
	    $('.menupanel').addClass('open');
	})
	$('.menupanel').click(function(){
		$('.menupanel').removeClass('open');
	})
	$('.menucontainer').click(function(e){
		e.stopPropagation();
	})
	$('body.printlayout input[type="checkbox"]').click(function(){
	    if( $(this).attr('name') == 'borders' ){
	        if( $(this).prop("checked") ){
	        	$('.page-container').addClass('noborder');
	        } else {
	        	$('.page-container').removeClass('noborder');
	        }
	    } else if( $(this).attr('name') == 'inset' ) {
	    	if( $(this).prop("checked") ){
	    		$('body').addClass('borderinset');
	    	} else {
	    		$('body').removeClass('borderinset');
	    	}
	    } else if( $(this).attr('name') == 'pagenums' ) {
	    	if( $(this).prop("checked") ){
	    		$('.page-container > span').addClass('hide');
	    	} else {
	    		$('.page-container > span').removeClass('hide');
	    	}
	    } else if( $(this).attr('name') == 'campaign' ) {
	    	if( !$(this).prop("checked") ){
	    		$('.campaign-msg').addClass('hide');
	    	} else {
	    		$('.campaign-msg').removeClass('hide');
	    	}
	    }
	})
	// Add Campaign Text
	$('#campaigntext').keyup(function(event) {
		msg = event.target.value;
		$('.campaign-msg').text(msg);
	});
	// Invalid page size message
	if( typeof invalidsize !== 'undefined' ) {
		$('body').prepend('<div class="invalid">'+invalidsize+'</div>');
		$('.invalid').css('opacity');
		$('.invalid').addClass('enter');
		setTimeout(function(){
			$('.invalid').removeClass('enter');
		},5000);
	}

})