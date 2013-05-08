$(window).ready(function(){

	var breadcrumbCounter = 0;

	$('html').delegate('a', 'click', function(e){

		//stop a link from navigating
		e.preventDefault();

		//store link items in javascript object
		var linkItem = {
			url:$(this).attr('href'),
			targetItem:$(this).attr('rel'),
			title:$(this).html(),
			theClass:$(this).attr('class'),
			theActualElement:$(this),
			theParent:$(this).parent().attr('class')
		};

		//prepare and display the loading screen
		$('.' + linkItem.targetItem).html('<span class="loading">Loading...</span>');

		//current breadcrumb items
		var breadcrumbItems = [];
		$.each($('.ajax_breadcrumbs > a'), function(x, item){
			breadcrumbItems.push($(item).html());
		});

		//execute ajax page request
		$.ajax({
			url: linkItem.url,
			context: document.body,
			success: function(result){

				//if menu-item link is clicked, remove all breadcrumbs
				if(linkItem.theParent.indexOf('menu-item') === 0){ $('.ajax_breadcrumbs > a').remove(); }

				//see if the current linkItem is duplicated in the breadcrumbs
				if($.inArray(linkItem.title, breadcrumbItems) >= 0) {
					//get the position of the current breadcrumb item & remove
					var breadcrumbPosition = $.inArray(linkItem.title, breadcrumbItems);

					//loop through and remove all other items exepct the item clicked
					$.each($('.ajax_breadcrumbs > a'), function(i){
						//from the selected breadcrumb position, delete all other items
						if(i > breadcrumbPosition){
							$('.ajax_breadcrumbs > a')[i].remove();
						}
					});

					//reset the breadcrumb counter
					breadcrumbCounter = 1;
				}else{

					//add breadcrumb for the current linkItem
					$('.ajax_breadcrumbs').append(
						$('<a>').attr({
							'href': linkItem.url,
							'title': linkItem.title,
							'class': 'breadcrumb' + breadcrumbCounter,
							'rel': 'ajax_return'
						}).html(linkItem.title)
					);

					//increment the breadcrumb counter for styling
					breadcrumbCounter += 1;
				}

				//apply the ajax result to the linkItem target - usually .ajax_return
				$('.' + linkItem.targetItem).html(result);
			}
		});

	});

});