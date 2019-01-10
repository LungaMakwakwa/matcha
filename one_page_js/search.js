var textBox = document.getElementById('textbox'),
			resultContainer = document.getElementById('result')

		// keep this global to abort it if already a request is running even textbox is upated
		var ajax = null;
		var loadedUsers = 0; // number of users shown in the results

		textBox.onkeyup = function() {
			// "this" refers to the textbox
			var val = this.value;

			// trim - remove spaces in the begining and the end
			val = val.replace(/^\s|\s+$/, "");

			// check if the value is not empty
			if (val !== "") {
				// search for data	
				searchForData(val);
			} else {
				// cle ar the result content
				clearResult();
			}
		}

		
		function searchForData(value, isLoadMoreMode) {
			// abort if ajax request is already there
			if (ajax && typeof ajax.abort === 'function') {
				ajax.abort();
			}

			// nocleaning result is set to true on load more mode
			if (isLoadMoreMode !== true) {
				clearResult();
			}

			// create the ajax object
			ajax = new XMLHttpRequest();
			// the function to execute on ready state is changed
			ajax.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					try {
						var json = JSON.parse(this.responseText)
					} catch (e) {
						noUsers();
						return;
					}

					if (json.length === 0) {
						if (isLoadMoreMode) {
							alert('No more to load');
						} else {
							noUsers();
						}
					} else {
						showUsers(json);
					}


				}
			}
			// open the connection
			ajax.open('GET', 'search.php?username=' + value + '&startFrom=' + loadedUsers , true);
			// send
			ajax.send();
		}

		function showUsers(data) {
			// the function to create a row
			function createRow(rowData) {
				// creating the wrap
				var wrap = document.createElement("div");
				// add a class name
				wrap.className = 'row'

				// name holder
				var name = document.createElement("span");
				name.innerHTML = rowData.name;

				// picture of the user
				//var picture = document.createElement("img");
				//picture.src = rowData.picture;
				//picture.className = 'picture';

				// show descript on click
				wrap.onclick = function() {
					alert(rowData.description);
				}

				//wrap.appendChild(picture);
				wrap.appendChild(name);

				// append wrap into result container
				resultContainer.appendChild(wrap);
			}

			// loop through the data
			for (var i = 0, len = data.length; i < len; i++) {
				// get each data
				var userData = data[i];
				// create the row (see above function)
				createRow(userData);
			}

			//  create load more button
			var loadMoreButton = document.createElement("span");
			loadMoreButton.innerHTML = "Load More";
			// add onclick event to it. 
			loadMoreButton.onclick = function() {
				// searchForData() function is called in loadMoreMode
				searchForData(textBox.value, true);
				// remove loadmorebutton
				this.parentElement.removeChild(this);
			}
			// append loadMoreButton to result container
			resultContainer.appendChild(loadMoreButton);

			// increase the user count
			loadedUsers += len;
		}

		function clearResult() {
			// clean the result <div>
			resultContainer.innerHTML = "";
			// make loaded users to 0
			loadedUsers = 0;
		}

		function noUsers() {
			resultContainer.innerHTML = "No Users";
		}
