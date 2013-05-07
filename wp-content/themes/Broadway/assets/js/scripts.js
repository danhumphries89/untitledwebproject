$(window).ready(function(){

	var breadcrumbCounter = 0;

	$('html').delegate('a', 'click', function(e){
		//stop a link from navigating
		e.preventDefault();

		//store link items in javascript object
		var linkItems = {
			url:$(this).attr('href'),
			targetItem:$(this).attr('rel'),
			title:$(this).html(),
			theClass:$(this).attr('class')
		};

		console.log(linkItems);

		$('.' + linkItems.targetItem).html('<span class="loading">Loading...</span>');

		//execute ajax page request
		$.ajax({
			url: linkItems.url,
			context: document.body,
			success: function(result){
				//append the breadcrumbs with the current link
				if(linkItems.theClass !== undefined){
					if(linkItems.theClass.indexOf('breadcrumb') === 0){
						var breadcrumbID = linkItems.theClass.replace('breadcrumb', '');
						var breadcrumbItemLength = $('.ajax_breadcrumbs > a').length;
						var breadcrumbStart = parseInt(breadcrumbID) + 1;

						for(var i=breadcrumbStart; i<breadcrumbItemLength; i++){
							$('.ajax_breadcrumbs > a')[i].remove();
						}

						breadcrumbCounter = 1;
					}
				}else{

					$('.ajax_breadcrumbs').append(
						$('<a>').attr({
							'href': linkItems.url,
							'title': linkItems.title,
							'class': 'breadcrumb' + breadcrumbCounter,
							'rel': 'ajax_return'
						}).html(linkItems.title)
					);

					breadcrumbCounter += 1;
				}

				$('.' + linkItems.targetItem).html(result);
			}
		});

	});

});