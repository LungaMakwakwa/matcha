function Ajax(sendto, method, value, AsyncOrSync) {
	request = "";
	request = $.ajax({
		url: sendto,
		type: method,
		data: value,
		async: AsyncOrSync,
	})
	return request.responseText;
}

function checknotes() {
    notes = Ajax('notification.php', 'POST', 'getnotes=getnotes', false);
    //console.log(notes);
    
    notes = JSON.parse(notes);
    
	if (notes && notes != "0") {
		var result = Object.keys(notes).map(function (key) {
			return [Number(key), notes[key]];
		});
		$('#notes_count').text(result.length);
	} else
		$('#notes_count').html('0');
}

$('#Notifications_icon').hover(function () {
	notes = Ajax('notification.php', 'POST', 'getnotes=getnotes', false);
	if (notes && notes != "0") {
		notes = JSON.parse(notes);
		$("#Notifications p").remove();
		var result = Object.keys(notes).map(function (key) {
			return [notes[key]];
		});
		for (i = 0; i < result.length; i++) {
			$('#Notifications').append('<p class="w3-bar-item w3-button" style = "color:black;">' + result[i] + '</p>');
		}
	}
});

$('#NotificationsBtn').click(function () {
	Ajax('notification.php', 'POST', 'removenotes=removenotes', true);
	$("#Notifications p").remove();
})



setInterval(function () {
	checknotes();
}, 1000);