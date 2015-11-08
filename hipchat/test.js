var http = require('http'),
	qs = require("querystring");

http.createServer(function (request, response) {

	// Get parameters from request
	console.log("Request's headers: " + JSON.stringify(request.headers));

	var body = ""; var data = "";
	request.on('data', function(chunk) {
		body += chunk;
	});

	request.on("end", function() {
		data = JSON.parse(body);//qs.parse(body));
		console.log(data.event);
	});

	console.log("Method: " + request.method);

	response.writeHead(200, {'Content-Type': 'application/json'});
	response.write(JSON.stringify({
		"color": "green",
		"message": "It's going to be sunny tomorrow! (yey)",
		"notify": false,
		"message_format": "text"
	}));
  response.end();

  console.log('Received new request');
}).listen(8079);