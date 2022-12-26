<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/home');
    }

    public function userList()
    {   
      $data = [];
      $userModel = new UserModel();
      $users = $userModel->findAll();
      $data['users'] = $users;
      return view('admin/user', $data);
    }
    public function userAdd()
    {
      $data = [];
      helper('form');
      if($this->request->getMethod() == 'post') {
        $rules = [
          'username' => 'required|min_length[6]|max_length[30]',
          'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
          'password' => 'required|min_length[6]|max_length[30]',
          'password_cf' => 'matches[password]',
          'avatar' => [
            'label' => 'Avatar',
            'rules' => 'uploaded[avatar]'
                . '|is_image[avatar]'
                . '|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
        ],
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $img = $this->request->getFile('avatar');
          if ($img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(APPPATH . '../public/imgs/user', $newName);
            $userModel = new UserModel();
            $newData = array(
              'username' => $this->request->getVar('username'),
              'email' => $this->request->getVar('email'),
              'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
              'avatar' => '/imgs/user/'.$newName,
            );
            $userModel->save($newData);
            return redirect()->to('/admins/user')->with('msg', 'Create user success');
          }
          return redirect()->to('/admins/user')->with('msg', 'Create user success');
        }
      }
      return view('admin/userAdd', $data);
    }
    public function userEdit($id)
    {
      $data = [];
      helper('form');
      $userModel = new UserModel();
      if($this->request->getMethod() == 'post') {
        //dd($this->request);
        $rules = [
          'username' => 'required|min_length[6]|max_length[30]',
          'email' => 'required|min_length[6]|max_length[50]|valid_email',
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $findUsers = $userModel->where('email', $this->request->getVar('email'))->first();
          //dd($findUsers);
          if($findUsers) {
            $errors['email'] = 'This email is already in use';
            return redirect()->back()->withInput()->with('errors', $errors);
          } else {
            $updateData = array(
              'username' => $this->request->getVar('username'),
              'email' => $this->request->getVar('email'),
            );
            $userModel->update($id, $updateData);
            return redirect()->to('/admins/user')->with('msg', 'Update data success.');
          }
        }
      }
      $user = $userModel->find($id);
      if(!$user) {
        return view('not_found', $data);
      } else {
        $data['user'] = $user;
      }
      return view('admin/userEdit', $data);
    }
    public function userDelete($id) 
    {
      $userModel = new UserModel();
      $findUser = $userModel->find($id);
      if(!$findUser) {
        return redirect()->to('/admins/user');
      }
      if($findUser['avatar']) {
        unlink(APPPATH . '../public' . $findUser['avatar']); 
      }
      $userModel->delete($id);
      return redirect()->to('/admins/user')->with('msg', 'Delete data success.');
    }

    //
    
    public function productList()
    {
      $data = [];
      $productModel = new ProductModel();
      $productModel->select('products.id as id, products.name as name, price, qty, des, image, categories.name as categories_name');
      $productModel->join('categories', 'categories.id = products.categories_id');
      //$products = $productModel->findAll();
      $products = $productModel->paginate(8);
      $data['products'] = $products;
      $data['pager'] = $productModel->pager;
      return view('admin/product', $data);
    }
    public function productAdd()
    {
      $data = [];
      helper('form');
      $productModel = new ProductModel();
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->findAll();
      $data['categories'] = $categories;

      if($this->request->getMethod() == 'post') {
        $rules = [
          'name' => 'required|min_length[6]|max_length[30]',
          'price' => 'required|min_length[1]|numeric',
          'qty' => 'required|min_length[1]',
          'categories_id' => 'required',
          'des' => 'required|min_length[6]',
          'image' => [
            'label' => 'Image',
            'rules' => 'uploaded[image]'
                . '|is_image[image]'
                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
        ],
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          if (!ctype_digit($this->request->getVar('qty'))) {
            $errors['qty'] = 'The qty must be int';
          }
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $img = $this->request->getFile('image');
          if ($img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(APPPATH . '../public/imgs/product', $newName);
            $newData = array(
              'name' => $this->request->getVar('name'),
              'price' => $this->request->getVar('price'),
              'qty' => (int)$this->request->getVar('qty'),
              'categories_id' => $this->request->getVar('categories_id'),
              'des' => $this->request->getVar('des'),
              'image' => '/imgs/product/'.$newName,
            );
            $productModel->save($newData);
            return redirect()->to('/admins/product')->with('msg', 'Create product success');
          }
          return redirect()->to('/admins/product')->with('msg', 'Create product success');
        }
      }

      return view('admin/productAdd', $data);
    }
    public function productEdit($id)
    {
      $data = [];
      helper('form');
      $productModel = new ProductModel();
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->findAll();
      $data['categories'] = $categories;

      if($this->request->getMethod() == 'post') {
        $rules = [
          'name' => 'required|min_length[6]|max_length[30]',
          'price' => 'required|min_length[1]|numeric',
          'qty' => 'required|min_length[1]',
          'categories_id' => 'required',
          'des' => 'required|min_length[6]',
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          if (!ctype_digit($this->request->getVar('qty'))) {
            $errors['qty'] = 'The qty must be int';
          }
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $updateData = array(
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'qty' => (int)$this->request->getVar('qty'),
            'categories_id' => $this->request->getVar('categories_id'),
            'des' => $this->request->getVar('des'),
          );
          $productModel->update($id, $updateData);
          return redirect()->to('/admins/product')->with('msg', 'Update data success.');
        }
      }
      $product = $productModel->find($id);
      if(!$product) {
        return view('not_found', $data);
      } else {
        $data['product'] = $product;
      }
      return view('admin/productEdit', $data);
    }
    public function productDelete($id) 
    {
      $productModel = new ProductModel();
      $product = $productModel->find($id);
      if(!$product) {
        return redirect()->to('/admins/product');
      }
      unlink(APPPATH . '../public' . $product['image']);
      $productModel->delete($id);
      return redirect()->to('/admins/product')->with('msg', 'Delete data success.');
    }

    //
    
    public function categoryList()
    {
      $data = [];
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->findAll();
      $data['categories'] = $categories;
      return view('admin/category', $data);
    }
    
    public function categoryAdd()
    {
      $data = [];
      helper('form');
      if($this->request->getMethod() == 'post') {
        //dd($this->request);
        $rules = [
          'name' => 'required|min_length[2]|max_length[30]|is_unique[categories.name]',
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $categoryModel = new CategoryModel();
          $newData = array(
            'name' => $this->request->getVar('name'),
          );
          $categoryModel->save($newData);
          return redirect()->to('/admins/category')->with('msg', 'Create category success');
        }
      }
      return view('admin/categoryAdd', $data);
    }
    public function categoryEdit($id)
    {
      $data = [];
      helper('form');
      $categoryModel = new CategoryModel();
      if($this->request->getMethod() == 'post') {
        $rules = [
          'name' => 'required|min_length[2]|max_length[30]|is_unique[categories.name]',
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $updateData = array(
            'name' => $this->request->getVar('name'),
          );
          $categoryModel->update($id, $updateData);
          return redirect()->to('/admins/category')->with('msg', 'Update data success.');;
        }
      }
      $category = $categoryModel->find($id);
      if(!$category) {
        return view('not_found', $data);
      } else {
        $data['category'] = $category;
      }
      return view('admin/categoryEdit', $data);
    }
    //orderEdit

    public function orderList()
    {
      //['id', 'amount', 'type', 'date', 'user_id', 'status', 'address', 'phone']
      $data = [];
      $orderModel = new OrderModel();
      $orderModel->select('orders.id as id, amount, type, date, status, address, phone, users.username as username');
      $orderModel->join('users', 'users.id = orders.user_id');
      $orders = $orderModel->findAll();
      $data['orders'] = $orders;
      return view('admin/order', $data);
        
    }
    public function orderEdit($id)
    {
      $data = [];
      helper('form');
      $orderModel = new OrderModel();
      $orderItemModel = new OrderItemModel();
      $orderModel->select('orders.id as id, amount, type, date, status, address, phone, users.username as username');
      $orderModel->join('users', 'users.id = orders.user_id');
      $order = $orderModel->find($id);
      if($this->request->getMethod() == 'post') {
        $updateData = array(
          'date' => $this->request->getVar('date'),
          'status' => $this->request->getVar('status'),
          'address' => $this->request->getVar('address'),
          'phone' => $this->request->getVar('phone'),
        );
        $orderModel->update($id, $updateData);
        return redirect()->to('/admins/order')->with('msg', 'Update data success.');
      }
      if(!$order) {
        return view('not_found', $data);
      } else {
        $data['order'] = $order;
        $orderItemModel->select('order_items.id as id, products.name as product_name, products.price as product_price, order_items.qty as qty, products.image as product_image');
        $orderItemModel->join('products', 'products.id = order_items.product_id');
        $orderItems = $orderItemModel->where('order_id', $order['id'])->findAll();
        $data['orderItems'] = $orderItems;
      }
      return view('admin/orderEdit', $data);
    }
}