  // Formulario

$('.formphp').on('submit', function() {
	var emailContato = "paulosbzl@gmail.com"; // Escreva aqui o seu e-mail

	var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};

	that.find('[name]').each(function(index, value) {
		var that = $(this),
				name = that.attr('name'),
				value = that.val();

		data[name] = value;
	});

	return false;
});
