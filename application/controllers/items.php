<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('orders'))
		{
			$this->session->set_userdata('orders', []);
		}
		$this->load->view('store/welcome');
	}

	public function getItemsByCategory($category)
	{
		$items = $this->item->getItemsByCategory($category);
		$this->load->view('store/items', array('items' => $items));
	}

	public function getAllItems($page = 1)
	{
		$items = $this->item->retrieveAllItems();
		$page_item_data = array();
    $count = 6 * $page - 6;
    for ($i=$count;$i<count($items);$i++)
    {
      array_push($page_item_data, $items[$i]);
      $count++;
      if ($count >= 6 * $page)
      {
        break;
      }
    }
			$this->load->view('store/items', array('items' => $page_item_data, 'total_items' => count($items) ));
	}

	public function showItem($id, $category)
	{
		$item = $this->item->retrieveOneItem($id);
		$items = $this->item->retrieveSimilarItems($id, $category);
		$this->load->view('store/item', array('item' => $item, 'items' => $items));
	}

	public function search_items()
	{
		$result = $this->item->search_items($this->input->post('search'));
		$this->load->view('store/items', array('items' => $result));
	}

	public function cart()
	{
		$items = $this->item->retrieveAllItems();
		$this->load->view('store/cart', array('items' => $items));
	}

	public function addToCart()
	{
		$cart = $this->session->userdata('orders');
		$itemExists = false;
		foreach($cart as &$item) 
		{
			if($this->input->post('id') === $item['id'])
			{
				$item['quantity']+=$this->input->post('quantity');
				$itemExists = true;
			}
		}
		if(!$itemExists)
		{
			$cart[] = $this->input->post();
		}
		$this->session->set_userdata('orders', $cart);
		$this->session->set_flashdata('success', 'Item was added to your cart!');
		redirect('cart');
	}

	public function removeFromCart()
	{
		$key = $this->input->post('key');
		$cart = $this->session->userdata('orders');
		unset($cart[$key]);
		$this->session->set_userdata('orders', $cart);		
		redirect('/cart');
	}

	public function placeOrder()
	{
		$items = $this->session->userdata('orders');
		$postData = $this->input->post();
		$result = $this->item->submitOrder($postData, $items);
		if($result)
		{
			$this->session->unset_userdata('orders');
			$this->session->set_userdata('orders', []);
			redirect('success');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! We could not place your order. Please try again later.');
			redirect('cart');
		}
	}

	public function success()
	{
		$this->load->view('store/success');
	}

}

//end of Items controller