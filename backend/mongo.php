<?php

class EasyMongo {

	public $connection;
	public $current_db;
	public $current_collection;

	public function __construct() {
		$this->connection = new MongoClient();
		$this->current_db = $this->connection->selectDB("StuddyBuddy");
	}

	public function useCollection($collection) {
		$this->current_collection = $this->current_db->selectCollection($collection);
	}

	public function select($collection, array $filters = []) {
		$this->useCollection($collection);

		$cursor = $this->current_collection->find($filters);

		$result = [];

		// Parse the default mongo cursor into a readable array
		$i = 0;
		foreach($cursor as $document) {
			foreach ($document as $key => $value) {
				if ($key == "_id")
					$result[$i]["_id"] = $value->__toString();
				else
					$result[$i][$key] = $value;
			}
			$i++;
		} 

		return $result;
	}

	public function insert($collection, $data) {
		$this->useCollection($collection);
		$this->current_collection->insert($data);
	}

	public function update($collection, $data, $query) {
		$this->useCollection($collection);
		$this->current_collection->update($query, $data);
	}
}


?>