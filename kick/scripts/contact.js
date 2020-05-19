
(function() {
	// Changes text inside send button on submit
	var send = document.getElementById('form-submit');
	if(send) {
		send.onclick = function () {
			this.innerHTML = 'processing';
		}
	}

})();