<?php

namespace App\Sites\BACKEND\Controllers;

use App\Models\Caffe;
use App\Models\Article;
use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderTableUser;
use App\Models\User;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
use Request;

use Session;

class OrderController extends AuthController
{

    public function index($permissions = ['caffe'])
    {

        $orders = Order::all();


        return view('orders.index');
    }

    public function show($order, $caffe, $permissions = ['caffe'])
    {
        $orderId = $order;
        $caffeId = $caffe;

        $orders = [];

        $order = Order::find($orderId);

        if (empty($order)) {

            return redirect()->back();
        }

        $getOrders = DB::table('ord_tbl_usr')->where('ord_tbl_usr.order_id', $orderId)->get();
        $i = 0;
        foreach ($getOrders as $order) {

            $orders[$i]['menu'] = Menu::find($order->menu_id)->name;
            $orders[$i]['article'] = Article::find($order->article_id)->name;
            $orders[$i]['table'] = Table::find($order->table_id)->table_number;
            $orders[$i]['quantity'] = $order->quantity;
            $orders[$i]['user'] = !empty(User::find($order->user_id)) ? User::find($order->user_id)->username : null;
            $orders[$i]['order'] = $order->ord_tbl_id;
        }
        $menus = Caffe::find($caffeId)->menu()->get();

        foreach ($menus as $menu) {

            $articles[$menu->menu_id] = $menu->article()->get();

        }

        $tables = Caffe::find($caffeId)->tables()->get();


        $getUsers = DB::table('users')
            ->join('role_user', 'users.user_id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 4)
            ->select('users.user_id', 'users.username')->get();

        $i = 0;
        foreach ($getUsers as $user) {

            $users[$i]['user_id'] = $user->user_id;
            $users[$i++]['username'] = $user->username;
        }


        return view('orders.index', compact('menus', 'articles', 'tables', 'users', 'orderId', 'orders'));
    }

    public function create($permissions = ['caffe'])
    {


        return view('orders.index');
    }

    public function edit($permissions = ['caffe'])
    {


        return view('orders.index');
    }

    public function update($permissions = ['caffe'])
    {


        return view('orders.index');
    }

    public function destroy($id, $permissions = ['caffe', 'delete'])
    {


        return view('orders.index');
    }

    public function applyOrder($permissions = ['edit'])
    {

        $request = Request::all();

        $order = new OrderTableUser();
        $order->menu_id = $request['menu'];
        $order->order_id = $request['order'];
        $order->table_id = $request['table'];
        $order->user_id = $request['user'];
        $order->employee_id = Auth::user()->user_id;
        $order->article_id = $request['article'];
        $order->quantity = $request['quantity'];
        $order->date = Carbon::now();

        $order->save();


        if ($order) {

            return response()->json(OrderTableUser::all()->last()->ord_tbl_id, 200);

        } else {

            return response()->json($error = ['order' => 'Something is wrong!'], 500);

        }


    }

    public function deleteOrder($permissions = ['edit'])
    {
        $request = Request::all();
        $order=OrderTableUser::find($request['orderId']);

        if (!empty($order)) {

            $order->delete();
            return response()->json('Order successfully successfully!', 200);

        } else {

            return response()->json($error = ['order' => 'Something is wrong!'], 500);
        }
    }


}

