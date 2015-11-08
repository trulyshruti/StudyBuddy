var http = require('http'),
	qs = require("querystring"),
	easymongo = require('./easymongo.js');


http.createServer(function (request, response) {

	var body = ""; var data = "";
	request.on('data', function(chunk) {
		body += chunk;
	});

	request.on("end", function() {
		data = JSON.parse(body);//qs.parse(body));
		console.log(data);
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