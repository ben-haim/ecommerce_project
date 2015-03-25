<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function signIn()
	{
		$postData = $this->input->post();
		$user = $this->user->authenticateUser($postData);
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
		$result = $this->user->register($postData);
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
		$user = $this->user->retrieveOneUser($id);
		$this->load->view('store/update_account', array('user' => $user));
	}

	public function updateAccount()
	{
		$postData = $this->input->post();
		$result = $this->user->updateAccount($postData);
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
		$this->session->set_flashdata('success', 'Successfully logged out!');
		redirect('/');
	}

}

//end of Users controller