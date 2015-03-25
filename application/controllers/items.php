<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		if(!$this->session->userdata('orders'))
		{
			$this->session->set_userdata('orders', []);
		}
		$this->load->view('welcome');
	}

	public function getItemsByCategory($id)
	{
		$items = $this->item->getItemsByCategory($id);
		$this->load->view('items', array('items' => $items));
	}

	public function showItem($id)
	{
		$item = $this->item->retrieveOneItem($id);
		$items = $this->item->retrieveSimilarItems();
		$this->load->view('item', array('item' => $item, 'items' => $items));
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
		redirect('show/item/'.$this->input->post('id'));
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
		$this->load->view('success');
	}

	public function cart()
	{
		$items = $this->item->retrieveAllItems();
		$this->load->view('cart', array('items' => $items));
	}

	public function signIn()
	{
		$postData = $this->input->post();
		$user = $this->item->authenticateUser($postData);
		if($user)
		{
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('first_name', $user['s_first_name']);
			$this->session->set_userdata('last_name', $user['s_last_name']);
			$this->session->set_userdata('email', $user['email']);
			$this->session->set_userdata('id', $user['id']);
			$this->session->set_flashdata('success', 'Login Successful!');
			redirect('cart');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Invalid email or username.');
			redirect('/');
		}
	}

	public function register()
	{
		$postData = $this->input->post();
		$result = $this->item->register($postData);
		if($result)
		{
			$this->session->set_flashdata('success', 'Account successfully created! Please add your shipping and billing info below:');
			redirect('update_account/'.$this->db->insert_id());
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
			redirect('/');
		}
	}

	public function account($id)
	{
		$user = $this->item->retrieveOneUser($id);
		$this->load->view('update_account', array('user' => $user));
	}

	public function updateAccount()
	{
		$postData = $this->input->post();
		$result = $this->item->updateAccount($postData);
		if($result)
		{
			$this->session->set_flashdata('success', 'Account successfully updated!');
			redirect('cart');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! We could not update your account info at this moment.');
			redirect('update_account');
		}
	}

	public function logOut()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('last_name');
		redirect('/');
	}

}

//end of Items controller