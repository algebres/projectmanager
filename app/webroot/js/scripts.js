$(document).ready(function() {
	$(".progressbar").progressBar(parseInt($(".progressbar").attr("data-progress"), 10), {
		showText 		: false,
		boxImage		: IMAGE_PATH + 'plugins/progressbar/progressbar.gif',
		barImage		: {
							0:	IMAGE_PATH + 'plugins/progressbar/progressbg_red.gif',
							30: IMAGE_PATH + 'plugins/progressbar/progressbg_orange.gif',
							70: IMAGE_PATH + 'plugins/progressbar/progressbg_green.gif'
						}
	});
	
	$(".hide-toggle").click(function() {
		var $this = $(this);
		var target = $($(this).attr("data-target"));
		
		target.slideToggle(function() {
			if ($(this).css("display") == "block") {
				$this.find("span").html("Hide");
			}
			else {
				$this.find("span").html("Show");
			}
		});
		
		
	})
});