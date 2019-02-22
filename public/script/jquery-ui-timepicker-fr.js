/* French translation for the jQuery Timepicker Addon */
/* Written by Thomas Lété */
(function($) {
	$.timepicker.regional['fr'] = {
		timeOnlyTitle: 'Choisir une heure',
		timeText: '',
		hourText: 'Heures',
		minuteText: 'Minutes',
		secondText: 'Secondes',
		millisecText: 'Millisecondes',
		microsecText: 'Microsecondes',
		timezoneText: 'Fuseau horaire',
		currentText: '',
		closeText: 'Terminé',
		timeFormat: 'HH:mm',
		timeSuffix: '',
		amNames: ['AM', 'A'],
		pmNames: ['PM', 'P'],
		isRTL: false,
		monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
			'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
		monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
			'Jul','Aou','Sep','Oct','Nov','Dec'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa']
	};
	$.timepicker.setDefaults($.timepicker.regional['fr']);
})(jQuery);
