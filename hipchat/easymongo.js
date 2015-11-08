var mongodb = require('mongodb');

var url = 'mongodb://localhost:27017/StuddyBuddy'

function _find(db, collection, filter, callback) {
	var cursor = db.collection(collection).find(filter);

	found = [];

	cursor.each(function (err, doc) {
		if (doc != null) {
			found.push(doc);
			console.log("Yo: " + found);
		} else {
			callback();
		}
	});

	console.log("Before return: " + found);
	return found;
};


function _insert(db, collection, data, callback) {
	db.collection(collection).insertOne(data, function(err, result) {
		if (err != null) return false;
		return true;
		callback(result);
	});
};


module.exports = {

	foundResult: {},

	find: function(collection, filter) {

		if (filter == undefined)
			filter = {};

		var found;

		// Connect to the db
		mongodb.MongoClient.connect(url, function(err, db) {
			found = _find(db, collection, filter, function() {
				db.close();
			});

			console.log("AFter _find: " + found);
		});

		console.log("Before returning totally: " + found);
		return found;
	},


	insert: function(collection, data) {

		// Connecto to the db
		mongodb.MongoClient.connect(url, function(err, db) {
			_insert(db, collection, data, function() {
				db.close();
			});
		});
	}

};