jQuery(function($){
	// Homepage card animation
	var $homeCard = $('#mainContainer').find('.card'),
		$header = $('header');
	$homeCard.click(function(){
		if( $(this).hasClass('unfocus') ) {
			$homeCard.addClass('unfocus');
			$(this).removeClass('unfocus');
		}
		if( $(this).attr('id') === 'print') {
			window.history.replaceState(null,null,'?print');
			$header.addClass('alt');
		} else {
			$header.removeClass('alt');
			window.history.replaceState(null,null,'?create');
		}
	})
	// Header shrinker
	if ($(document).scrollTop() > 40){
	  $header.addClass('small');
	}
	$(document).scroll(function(){
	  if ($(document).scrollTop() > 40){
	    $header.addClass('small');
	  } else {
	    $header.removeClass('small');
	  }
	})
	// Terrnums input enter submit
	var $terrnums = $('#terrnums');
	$terrnums.keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      createInserts( 'create', $terrnums.val() );
	    }
	})
	// Page Layout menu button, slideout and options
	var $menu = $('#menu'),
		$menupanel = $('#menupanel'),
		$menucontainer = $('#menucontainer'),
		$body = $('body'),
		$pagecontainer = $('.page-container'),
		$campaignMsg = $('.campaign-msg');
	$menu.click(function(){
	    $menupanel.addClass('open');
	})
	$menupanel.click(function(){
		$(this).removeClass('open');
	})
	$menucontainer.click(function(e){
		e.stopPropagation();
	})
	$menupanel.find('input[type="checkbox"]').click(function(){
	    if( $(this).attr('name') == 'cropmarks' ){
	        if( $(this).prop("checked") ){
	        	$body.addClass('cropmarks');
	        } else {
	        	$body.removeClass('cropmarks');
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
		$body.prepend('<div id="invalid">'+invalidsize+'</div>');
		var $invalid = $('#invalid');
		$invalid.css('opacity');
		$invalid.addClass('enter');
		setTimeout(function(){
			$invalid.removeClass('enter');
		},5000);
	}

	// Display uploaded files
	var $mainContainer = $('#mainContainer');
	onFileLoad = function(e) {
		var src = e.target.result;
		// var num = ("0" + 1).slice(-2);
		var html = '<div class="page-body create">';
				html += '<div class="page-container">';
					html += '<div class="page-inner">';
	    				html +='<img src="'+src+'"/>';
	    			html += '</div>';
	    			// html += '<span>'+num+'</span>';
					html += '<div class="campaign-msg"></div>';
	    		html += '</div>';
	    	html += '</div>';
	    $mainContainer.append(html);
	}

	printInserts = function(files) {
		printContent = [];
		$mainContainer.html('');
	    $body.addClass('printlayout');
	    $menucontainer.addClass('print');
		$menucontainer.find('h2').text('Card print layout');
	    for (var i = 0, f; f = files[i]; i++) {
	    	// Only process image files.
			// if (!f.type.match('image.*')) {
			// 	continue;
			// }
		    var reader = new FileReader();
		    reader.onload = onFileLoad;
		    reader.readAsDataURL(files[i]);
	    }
	}

	createInserts = function(submitted) {
		var submitted = $('input#terrnums').val();
		$.ajax({
			url: 'printlayout.php?create='+submitted,
			type: "POST",
			success: function(data) {
				window.history.replaceState(null,null,'?create='+submitted);
				$mainContainer.html(data);
				$body.addClass('printlayout');
				$menucontainer.addClass('create');
				$menucontainer.find('h2').text('Showing territories:\n '+submitted)
			}
		})
	}

})