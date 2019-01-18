/* 
 $('div').on("click", function(){
	alert("boi");
	this.off();
	stop();
   });  */
user = ''
   $(document).ready(function () {
	/* LoadChat(); */
	LoadUsers();
/* 	if (user == 0)
	{
		$("#textarea").hide();
	} */
	/* setInterval(function () {
		LoadChat();
	}, 10000);  */
	$('#textarea').keyup(function (e) {
		//alert("keyup");
		if (e.which == 13) {
			alert("submitted");
			$('form').submit();
		}
	});

	$("#chat_user").on('click',function(){
		//alert("fuck yeah");
		alert(this.getAttribute("data-user_id"));
		user = this.getAttribute("data-user_id");
		LoadChat(user);
	});


	$('form').submit(function () {
		var chat = escape($('#chat').html());
		var message = $('#textarea').val();
		alert(user);
	    $.post('chat_messages.php?action=sendMessage&message=' + message +'&chat='+chat +'&user='+user , function (response) {

			//console.log(response);
			//alert(response);
		/* 	if (response == 1) { */
				LoadChat(user);
				$('#messageFrm')[0].reset();
		//	}
		}).fail( function(xhr, textStatus, errorThrown) {
			alert("some randome ass text " + xhr.responseText + '  fukk:'+ textStatus); 
		});
		return false;
	});
});

/* 	$(".uname").on("click", function(){
		alert(this);
		showPart(this);
	}) */

/* 	$('#users').on("click", function(){
		//alert("boi");
		//this.off();
		stop();
	
	   });  */


	//user = 0;
	

	function LoadUsers() {
		$.post('chat_messages.php?action=getUsers', function (response) {
			$('#users').html(response);
		});
	}


	// {{"user":"11","message":"helllllo","time":"14:42pm"},{"user":"4","message":"yes","time":"14:42pm"}}

	function LoadChat(user) {
		alert(user);
		$.post('chat_messages.php?action=getMessages&user='+user, function (response) {
			//console.log("test:  " +response);
			themessages = JSON.parse(response);
			//console.log(themessages);
			parsedChat = JSON.parse(themessages["chat"]);
			//console.log(JSON.parse(themessages["chat"]));
			console.log(parsedChat);
			const length = Object.getOwnPropertyNames(parsedChat);
		 	alert(length.length);
			$('#chat').html('');
			for(var t = 0; t < length.length - 1; t++){
				//alert("heriheriogherg");
				$('#chat').append(parsedChat[t]['message']);
				$('#chat').append(parsedChat[t]['time'] + '<br>');
			//	console.log(parsedChat[0['message']]);
			}
			var scrollpos = $('#chat').scrollTop();
			var scrollpos = parseInt(scrollpos) + 520;
			var scrollHeight = $('#chat').prop('scrollHeight');
			//console.log(JSON.parse(response));
			//$('#chat').html(response);
			if (scrollpos < scrollHeight) {

			} else {
				$('#chat').scrollTop($('#chat').prop('scrollHeight'));
			}
		});
	}

	


	// function showPart(theParticipant){
	// 	user = theParticipant.getAttribute("data-pid");
	// 	LoadChat(user);
	// 	$("#textarea").show();

	// }
