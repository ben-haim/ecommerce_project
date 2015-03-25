<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admins extends CI_Controller {

	public function index()
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

	public function retrieveOneOrder()
	{
		$order = $this->admin->retrieveOneOrder($this->input->post('id'));
		$products = $this->admin->retrieveOrderProduct($this->input->post('id'));
		$this->load->view('admin/order_detail', array('order'=>$order, 'products'=>$products));
	}

	public function status()
	{
		$this->admin->updateStatus($this->input->post());
		redirect('admins/dashboard');
	}

	public function products()
	{
		$result = $this->admin->retrieveAllProducts();
		$this->load->library('pagination');
		$config['base_url'] = 'admin/products';
		$config['total_rows'] = count($result);
		$config['per_page'] = 2; 
		$this->pagination->initialize($config); 
		$this->pagination->create_links();
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
	
	public function search_order()
	{
		$result = $this->admin->searchOrder($this->input->post('search'));
		$this->load->view('admin/search_result', array('items'=>$result));
	}

	public function orderPage($page = 1)
    {
      $all_order_data = $this->admin->retrieveAll();
      $page_order_data = array();
      $count = 5 * $page - 5;
      for ($i=$count;$i<count($all_order_data);$i++)
      {
	      array_push($page_order_data, $all_order_data[$i]);
	      $count++;
	      if ($count >= 5 * $page)
	      {
	        break;
	      }
      }
	      $this->load->view('admin/dashboard', $page_order_data);
    }

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('admins');
	}

	public function upload()
	{
		$this->load->view('admin/upload_photo');
	}

	public function upload_photo()
	{
		$id = $this->input->post('item_id');
		function randomKey() 
		{
		  $key = '';  
		  for ($i=0; $i < 10 ; $i++) 
		  { 
		  	$key = $key.rand(0,100);
		  }
		  return $key;
		}
		$rand = randomKey();
		$target_dir = "./assets/img/lg/";
		$originalName = basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = pathinfo($originalName,PATHINFO_EXTENSION);
		$target_file = $target_dir . $rand . "." . $imageFileType;
		// $newImageName = $rand . "." . $imageFileType;
		$uploadOk = 1;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) 
	    {
	      echo "File is an image - " . $check["mime"] . ".";
	      $uploadOk = 1;
	    } 
	    else 
	    {
	      echo "File is not an image.";
	      $uploadOk = 0;
	    }
		}
		// Check if file already exists
		if (file_exists($target_file)) 
		{
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) 
		{
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} 
		else 
		{
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	    {
        $img_name = $rand.".".$imageFileType;
       	$result = $this->admin->uploadPhoto($img_name, $id);
      	if($result)
       	{
       		redirect('admins/products');
       	}
       	else
       	{
       		die('fail!');
       	}
	    } 
	    else 
	    {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
	}
}

//end of main controller