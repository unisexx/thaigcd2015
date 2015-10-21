// JavaScript Document
SSS_faq = {
	init : function() {
		$('div.faq .answer').slideToggle('fast');
		$('div.faq .question').click(function() { SSS_faq.toggle(this) });
	},
	
	toggle : function(elt) {
		$(elt).toggleClass('active');
		$(elt).siblings('.answer').slideToggle('slow');
	}
}