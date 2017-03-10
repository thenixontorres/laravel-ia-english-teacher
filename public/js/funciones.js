function contras() {
	var ctr1 = document.getElementById('ctr1');
	var ctr2 = document.getElementById('ctr2');

	if (ctr1.value != ctr2.value) {
		alert('Las contraseñas deben coincidir.');

		return false;
	}
}
