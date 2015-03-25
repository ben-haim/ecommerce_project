<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Model {

	public function retrieveAllItems()
	{
		$query = "SELECT * FROM items JOIN photos ON photos_item_id = items.id";
		$items = $this->db->query( $query )->result_array();
		return $items;
	}

	public function retrieveOneItem($id)
	{
		$query = "SELECT * FROM items JOIN photos ON photos_item_id = items.id WHERE items.id = ?";
		$item = $this->db->query( $query, array($id) )->row_array();
		return $item;
	}

	public function getItemsByCategory($id)
	{
		$query = "SELECT * FROM items JOIN photos ON photos_item_id = items.id WHERE category = ?";
		$item = $this->db->query( $query, array($id) )->result_array();
		return $item;
	}

	public function retrieveSimilarItems()
	{
		$query = "SELECT * FROM items JOIN photos ON photos_item_id = items.id WHERE category = 'delay'";
		$items = $this->db->query( $query )->result_array();
		return $items;
	}

	public function submitOrder($postData, $items)
	{
		$query = "INSERT INTO orders (customer_id, amount, stripeToken, stripeTokenType, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['customer_id'], $postData['amount'], $postData['stripeToken'], $postData['stripeTokenType'], 'Order in process');
		$this->db->query( $query, $values);

		$order_id = $this->db->insert_id();

		foreach ($items as $item) {
			$query = "INSERT INTO orders_items (order_id, item_id, quantity) VALUES (?, ?, ?)";
			$values = array($order_id, $item['id'], $item['quantity']);
			$result = $this->db->query($query, $values);
		}
		return $result;
	}

}

//end of Item model