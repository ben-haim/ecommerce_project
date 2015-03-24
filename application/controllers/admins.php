<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admins extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function dashboard()
	{
		if($this->session->userdata('user_level') == 'admin')
		{
			$result = $this->admin->retrieveAll();
			$this->load->view('admin/dashboard', array('orders'=>$result));
		}
		else{
			$this->load->view('admin/index');
		}		
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->admin->retreiveOneUser($email);
		if($user && $user['password'] == $password)
		{
			$user = array(
				'user_id' => $user['id'],
				'user_email' => $user['email'],
				'user_level' => $user['user_level'],
				'is_logged_in' => true
				);
			$this->session->set_userdata($user);
			redirect('admins/dashboard');
		}
		else
		{
			$this->session->set_flashdata("error", "Invalid email or password!");
			redirect('admins');
		}
	}

	public function retrieveOneOrder()
	{
		$order = $this->admin->retrieveOneOrder($this->input->post('id'));
		$products = $this->admin->retrieveOrderProduct($this->input->post('id'));
		$this->load->view('admin/order_detail', array('order'=>$order, 'products'=>$products));
	}

	public function products()
	{
		$result = $this->admin->retrieveAllProducts();
		$this->load->view('admin/products', array('products'=>$result));
	}

	public function edit()
	{
		$result = $this->admin->retrieveOneItem($this->input->post('id'));
		$this->load->view('admin/edit_product', array('item'=>$result));
	}

	public function updateItem()
	{
		$this->admin->updateItem($this->input->post());
		redirect('admins/products');
	}

	public function addItem()
	{
		$this->load->view('admin/newProduct');
	}

	public function createNew()
	{
		$this->admin->createNew($this->input->post());
		redirect('admins/products');
	}

	public function delete($id)
	{
		$this->admin->delete($id);
		redirect('admins/products');
	}

	public function search()
	{
		$result = $this->admin->search($this->input->post('search'));
		$this->load->view('admin/search_result', array('items'=>$result));
	}
	
	public function searchOrder()
	{
		$result = $this->admin->searchOrder($this->input->post('search'));
		$this->load->view('admin/search_result', array('items'=>$result));
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('admins');
	}

}

//end of main controller