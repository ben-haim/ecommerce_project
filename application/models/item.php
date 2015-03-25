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

	public function authenticateUser($postData)
	{
		$query = "SELECT * FROM customers WHERE email = ? AND password = ?";
		$values = array($postData['email'], $postData['password'] );
		$user = $this->db->query( $query, $values )->row_array();
		return $user;
	}

	public function retrieveOneUser($id)
	{
		$query = "SELECT * FROM customers WHERE id = ?";
		$values = array($id);
		$user = $this->db->query( $query, $values )->row_array();
		return $user;
	}

	public function register($postData)
	{
		$query = "INSERT INTO customers (s_first_name, s_last_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['first_name'], $postData['last_name'], $postData['email'], $postData['password'] );
		$result = $this->db->query( $query, $values);
		return $this->db->insert_id();
	}

	public function updateAccount($postData)
	{
		$query = "UPDATE customers SET s_first_name = ?, s_last_name = ?, s_address = ?, s_city =?, s_state = ?, s_zip = ?, b_first_name = ?, b_last_name = ?, b_address = ?, b_city =?, b_state = ?, b_zip = ?, updated_at = NOW() WHERE id = ?";
		$values = array($postData['s_first_name'], $postData['s_last_name'], $postData['s_address'], $postData['s_city'], $postData['s_state'], $postData['s_zip'], $postData['b_first_name'], $postData['b_last_name'], $postData['b_address'], $postData['b_city'], $postData['b_state'], $postData['b_zip'], $postData['id'] );
		$result = $this->db->query( $query, $values);
		return $result;
	}

	public function submitOrder($postData, $items)
	{
		$query = "INSERT INTO orders (customer_id, amount, stripeToken, stripeTokenType, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['customer_id'], $postData['amount'], $postData['stripeToken'], $postData['stripeTokenType'], 'In process');
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