
user = '';
   $(document).ready(function () {
	LoadUsers();

	setInterval(function () {
		if (user > 0)
		{
			LoadChat(user);
		}
		else
		{
			console.log("add user");
		}
		//console.log(user);
	}, 10000);


	$('#textarea').keyup(function (e) {
		if (e.which == 13) {
			$('form').submit();
		}
	});

	$("#chat_user").on('click',function(){
		user = this.getAttribute("data-user_id");
		LoadChat(user);
	});


	$('form').submit(function () {
		var chat = escape($('#chat').html());
		var message = $('#textarea').val();
	    $.post('chat_messages.php?action=sendMessage&message=' + message +'&chat='+chat +'&user='+user , function (response) {

		if (response == 1) { 
				LoadChat(user);
				$('#messageFrm')[0].reset();
		}

		}).fail( function(xhr, textStatus, errorThrown) {
			alert("some randome ass text " + xhr.responseText + '  fukk:'+ textStatus); 
		});
		return false;
	});
});


	function LoadUsers() {
		$.post('chat_messages.php?action=getUsers', function (response) {
			$('#users').html(response);
		});
	}

	function LoadChat(user) {
		$.post('chat_messages.php?action=getMessages&user='+user, function (response) {

			themessages = JSON.parse(response);

			parsedChat = JSON.parse(themessages["chat"]);

			console.log(parsedChat);
			const length = Object.getOwnPropertyNames(parsedChat);
			$('#chat').html('');
			for(var t = 0; t < length.length - 1; t++){
				$('#chat').append(parsedChat[t] + '<br>');
			}
			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');

			if (scrollpos < scrollHeight) {

			} else {
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			}
		});
	}