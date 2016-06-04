$(function(){

	console.log("It's working");
	var s = skrollr.init({forceHeight: false});

	$(document).scroll(function(e){

		var scrollAmount = $(window).scrollTop();
		console.log(scrollAmount);

	});

});