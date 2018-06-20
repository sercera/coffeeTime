<?php

use App\Models\OrderTableUser;
use Carbon\Carbon;

$order = new OrderTableUser();
$order->menu_id =3;
$order->order_id = 2;
$order->table_id = 1;
$order->user_id = null;
$order->employee_id = 1;
$order->article_id = 6;
$order->quantity = 1;
$order->date = Carbon::now();

$order->save();

var_dump(OrderTableUser::all()->last()->ord_tbl_id);