function clickPost() {
	var unitdata = new Object();
	unitdata.id = document.getElementById("id").value;
	unitdata.type = document.getElementById("type").value;
	unitdata.player = document.getElementById("player").value;
	unitdata.index = document.getElementById("index").value;
	unitdata.health = document.getElementById("health").value;
	unitdata.x_coord = document.getElementById("x_coord").value;
	unitdata.y_coord = document.getElementById("y_coord").value;

	//Call Function Using Mocked Data
	setFile(unitdata);

	function setFile(unitdata) { //POST AJAX CALL
		var httpRequest = new XMLHttpRequest();
		var url = "http://web.engr.oregonstate.edu/~sibailaj/cs419/handler.php";
		var payload = JSON.stringify(unitdata);

		console.log(payload);

		if (httpRequest) {
			httpRequest.onreadystatechange = handle;
			httpRequest.open('POST', url, true);
			httpRequest.setRequestHeader("Content-type", "application/json");
			httpRequest.send(payload);
		}

		function handle() {
			if (httpRequest.readyState === 4 && httpRequest.status === 200) {
				//Display Response
				document.getElementById("here").innerHTML = httpRequest.responseText;
						
			}
			else {
				//alert("Error: Bad Request");
			}
		}
	}


}

function clickGet() { //GET AJAX CALL
	var id = document.getElementById("id2").value;

	//Call Function Using Mocked Data
	getFiles(id);

	function getFiles(id) {
		var httpRequest = new XMLHttpRequest();
		var url = "http://web.engr.oregonstate.edu/~sibailaj/cs419/handler.php?id=" + id;
		var data;

		if (httpRequest) {
			httpRequest.onreadystatechange = handle;
			httpRequest.open('GET', url, true);
			httpRequest.send();
		}

		function handle() {
			if (httpRequest.readyState === 4 && httpRequest.status === 200) {
				//Display Response
				document.getElementById("here").innerHTML = httpRequest.responseText;

				//Parse JSON Data
				data = JSON.parse(httpRequest.responseText);						
			}
			else {
				//alert("Error: Bad Request");
			}
		}



		return data;
	}	
}