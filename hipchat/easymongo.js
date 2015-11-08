var mongodb = require('mongodb');

var url = 'mongodb://localhost:27017/StuddyBuddy'

function _find(db, collection, filter, callback) {
	var cursor = db.collection(collection).find(filter);

	cursor.each(function (err, doc) {
		if (doc != null) {
			console.log(doc);
		} else {
			callback();
		}
	});
};


function _insert(db, collection, data, callback) {
	db.collection(collection).insertOne(data, function(err, result) {
		console.log("Document inserted in " + collection +" collection");
		callback(result);
	});
};


module.exports = {

	find: function(collection, filter) {

		if (filter == undefined)
			filter = {};

		// Connect to the db
		mongodb.MongoClient.connect(url, function(err, db) {
			_find(db, collection, filter, function() {
				db.close();
			});
		});
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