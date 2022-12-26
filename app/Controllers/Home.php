<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
      $data = [];
      $productModel = new ProductModel();
      $products = $productModel->findAll(8);
      $data['products'] = $products;
      return view('user/home', $data);
    }

    public function login()
    {
      helper('form');
      $userModel = new UserModel();
      if($this->request->getMethod() == 'post') { 
        $rules = [
          'email' => 'required|min_length[6]|max_length[50]|valid_email',
          'password' => 'required|min_length[6]|max_length[30]',
        ];
        if(!$this->validate($rules)) {
          $errors = "Incorrect email or password";
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $findUsers = $userModel->where('email', $this->request->getVar('email'))->first();
          //dd($findUsers);
          if(!$findUsers) {
            $errors = 'Incorrect email or password';
            return redirect()->back()->withInput()->with('errors', $errors);
          } else {
            if(password_verify($this->request->getVar('password'), $findUsers["password"])) {
              if($findUsers['role'] == 'admin') {
                return redirect()->to('/admins');
              } else {
                return redirect()->to('/');
              }
            } else {
              $errors = 'Incorrect email or password';
              return redirect()->back()->withInput()->with('errors', $errors);
            }
          }
        }
      }
      return view('user/login');
    }

    public function register()
    {    
      helper('form');
      $userModel = new UserModel();
      if($this->request->getMethod() == 'post') {
        //dd($this->request);
        $rules = [
          'username' => 'required|min_length[6]|max_length[30]',
          'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
          'password' => 'required|min_length[6]|max_length[30]',
          'password_cf' => 'matches[password]'
        ];
        if(!$this->validate($rules)) {
          $errors = $this->validator->getErrors();
          return redirect()->back()->withInput()->with('errors', $errors);
        } else {
          $userModel = new UserModel();
          $newData = array(
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
          );
          $userModel->save($newData);
          return redirect()->to('/');
        }
      }
      return view('user/register');
    }

    public function productDetail($id)
    {
      $data = [];
      $productModel = new ProductModel();
      $productModel->select('products.id as id, products.name as name, price, qty, des, image, categories.name as categories_name');
      $productModel->join('categories', 'categories.id = products.categories_id');
      $product = $productModel->find($id);
      if(!$product) {
        return view('not_found', $data);
      } else {
        $data['product'] = $product;
      }
      return view('user/productDetail', $data);
    }

    public function cart()
    {
        return view('user/cart');
    }
    
    public function checkOut()
    {
      helper('form');
      $orderModel = new OrderModel();
      $orderItemModel = new OrderItemModel();
      //['id', 'amount', 'type', 'date', 'user_id', 'status', 'address', 'phone'] date("d/m/Y")
      if($this->request->getMethod() == 'post') {
        $orderItems = json_decode($this->request->getVar('orderItems'));
        $amount = 0;
        foreach($orderItems as $orderItem) {
          $amount += $orderItem->qty * $orderItem->price;
        }
        $newOrderData = array(
          'amount' => $amount,
          'date' => date("d/m/Y"),
          'user_id' => 6,
          'address' => $this->request->getVar('address'),
          'phone' => $this->request->getVar('phone')
        );
        $orderModel->save($newOrderData);
        $idOrder = $orderModel->insertID();
        foreach($orderItems as $orderItem) {
          //['id', 'product_id', 'order_id', 'qty']
          $newOrderItemData = array(
            'product_id' => $orderItem->id,
            'order_id' => $idOrder,
            'qty' => $orderItem->qty
          );
          $orderItemModel->save($newOrderItemData);
        }
        return redirect()->to('/')->with('msg', 'The order has been placed');
      }
      return view('user/checkOut');
    }
    public function shop()
    { 
      $data = [];
      $productModel = new ProductModel();
      $products = $productModel->paginate(12);
      $data['products'] = $products;
      $productModel->select('categories.name as categories_name');
      $productModel->join('categories', 'categories.id = products.categories_id');
      $productModel->selectCount('categories_id', 'count');
      $productModel->groupBy('categories_name');
      $categories = $productModel->findAll();
      $data['categories'] = $categories;
      $data['pager'] = $productModel->pager;
      return view('user/shop', $data);
    }

    public function contacts()
    {
        return view('user/contacts');
    }
}