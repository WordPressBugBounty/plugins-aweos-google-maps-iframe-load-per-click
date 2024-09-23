const policies = "<a target='_blank' href='https://policies.google.com/privacy?hl=de' rel='noreferrer noopener'> " + lang[5] + " </a>";
const anzeigen = "<span title='Karte anzeigen' class='awmp-show-map'>" + lang[1] + "</span>";
const style = 'background:linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)),url(' + lang[6] + 'map.svg);' +
'border: 1px solid grey;'
const icon = ""; 

jQuery(function() {
	jQuery('.awmp-map').html(
		"<div class='awmp_map_wrapper' style='" + style + "'>\
			<h3>" + lang[0] + "</h3>\
			<p>"
				+ anzeigen + " " + "<br>" + lang[2] + "<br>" + lang[3] + policies + lang[4] + 
			"</p>\
		</div>"
	);

	jQuery('span.awmp-show-map').click(function() {
		// `this` is the <a> 
		var map = jQuery(this).parent().parent().parent(); 
		map.replaceWith(function () {
			// string is split to escape the php iframe detector
		    return jQuery(['<', 'iframe', '>'].join(''), {
		        src: map.attr('data-src'),
		        frameborder: map.attr('data-frameborder'),
		        allowfullscreen: map.attr('data-allowfullscreen'),
		        style: map.attr('style'),
		        id: map.attr('id'),
		        class: map.attr('class'),
		        name: map.attr('name'),
		        title: map.attr('tite')
		    });
		});
	})
});
