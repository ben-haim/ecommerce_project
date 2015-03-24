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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

//end of Item model