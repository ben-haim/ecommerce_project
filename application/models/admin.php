<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Model{

	public function retrieveAll()
	{
		$query = "SELECT orders.id, DATE_FORMAT(orders.created_at, '%M %d, %Y') AS created_at, s_first_name, s_address, amount, status FROM orders JOIN customers ON orders.customer_id = customers.id ORDER BY orders.id DESC";
		$result = $this->db->query( $query )->result_array();
		return $result;
	}

	public function retreiveOneUser($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$user = $this->db->query( $query, array($email) )->row_array();
		return $user;
	}

	public function retrieveOneOrder($orders)
	{
		$query = "SELECT * FROM orders JOIN customers ON orders.customer_id = customers.id WHERE orders.id = ?";
		$order = $this->db->query( $query, array($orders))->row_array();
		return $order;
	}

	public function retrieveOrderProduct($product)
	{
		$query = "SELECT * FROM orders LEFT JOIN orders_items ON orders.id = orders_items.order_id LEFT JOIN items ON orders_items.item_id = items.id WHERE orders.id = ?";
		$products = $this->db->query( $query, array($product))->result_array();
		return $products;
	}

	public function retrieveAllProducts()
	{
		$query = "SELECT *, items.id AS id FROM items LEFT JOIN photos ON photos.photos_item_id = items.id";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function retrieveOneItem($item)
	{
		$query = "SELECT * FROM items WHERE id=?";
		$result = $this->db->query($query, array($item))->row_array();
		return $result;
	}

	public function updateItem($item)
	{
		$query = "UPDATE items SET name=?, description=?, category=?, inventory=? WHERE id=?";
		$value = array($item['name'], $item['description'], $item['categories'], $item['inventory'], $item['id']);
		$this->db->query($query, $value);
	}

	public function createNew($item)
	{
		$query="INSERT INTO items (name, description, category, price, inventory, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$value=array($item['name'], $item['description'], $item['categories'], $item['price'], $item['inventory']);
		$this->db->query($query, $value);

		$id = $this->db->insert_id();

		$photo_query = "INSERT INTO photos (img_name, type, created_at, updated_at, photos_item_id) VALUES (?, ?, NOW(), NOW(), ?)";
		$values = array('temp.jpg', 'sub', $id);
		$result = $this->db->query( $photo_query, $values );
		return $result;
	}

	public function delete($id)
	{
		$query = "DELETE FROM items WHERE id=?";
		$this->db->query($query, array($id));
	}

	public function search($item)
	{
		$this->db->like('name', $item);
		$result = $this->db->get('items')->result_array();
		return $result;
	}


	public function updateStatus($item)
	{
		$query="UPDATE orders SET status=? WHERE id=?";
		$value=array($item['status'], $item['id']);
		$result = $this->db->query($query, $value);
	}



	public function uploadPhoto($img_name, $id)
	{
		$query = "UPDATE photos SET img_name = ?, photos_item_id = ? WHERE id = ?";
		$values = array($img_name, $id, $id);
		$result = $this->db->query( $query, $values);
		return $result;
	}

	public function searchOrder($order)
	{
	// 	$this->db->like('s_first_name',$order);
	// 	$this->db->or_like('created_at',$order);
	// 	$this->db->or_like('s_address',$order);
	// 	$this->db->or_like('amount',$order);
	// 	$this->db->or_like('status',$order);
	// 	$result = $this->db->get($table) ->result_array();
	// 	var_dump($result);
	// 	die();

		$query = "SELECT * FROM orders JOIN customers ON orders.customer_id = customers.id WHERE orders.id LIKE ? OR b_first_name LIKE ? OR b_address LIKE ? OR amount LIKE ? OR status LIKE ?";
		// $search = $order;
		$result = $this->db->query($query, $order)->result_array();
		var_dump($result);
		die();
	}


}