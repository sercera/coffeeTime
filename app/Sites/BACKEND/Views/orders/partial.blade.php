<div class="panel">
    <div class="panel-heading">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-7">
            <h4 class="panel-title">Narudžbine</h4>
        </div>
    </div>
    <br>
    <div class="panel-body">

        {{Form::hidden('order_id',$orderId,['id'=>'orderId'])}}
        <div class="col-md-12">
            @if(!empty($orders))
                @foreach($orders as $order)
                    <div class="order form-group row">
                        <div class="col-md-2">
                            <div class="col-md-2 control-label">
                                {{Form::label('Meni','Meni')}}
                            </div>
                            <div class="col-md-10">
                                <select name="menu" id="select3" style="width: 100%" disabled>
                                    <option value="{{$order['menu']}}">{{$order['menu']}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <div class="col-md-2 control-label">
                                {{Form::label('article','Artikl:')}}
                            </div>
                            <div class="col-md-10">
                                <select name="article" id="select4" style="width: 100%" disabled>
                                    <option value="{{$order['article']}}">{{$order['article']}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">

                            <div class="col-md-2 control-label">
                                {{Form::label('table','Sto:')}}
                            </div>
                            <div class="col-md-10">
                                <select name="table" id="select5" style="width: 100%" disabled>
                                    <option value="{{$order['table']}}">{{$order['table']}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-2 control-label">

                                {{Form::label('quantity','Kolicina:')}}
                            </div>
                            <div class="col-md-10">
                                <select name="quantity" id="select6" style="width: 100%" disabled>
                                    <option value="{{$order['quantity']}}">{{$order['quantity']}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <div class="col-md-2 control-label">
                                {{Form::label('user','Korisnik:')}}
                            </div>
                            <div class="col-md-10">
                                <select name="user" id="select7" style="width: 100%" disabled>
                                    <option value=""></option>
                                    <option value="">{{$order['user']}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">

                            <div class="col-md-6">
                                <button type="button" data-order="{{$order['order']}}"
                                        class="btn btn-primary btn-icon add-order">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" data-order="{{$order['order']}}"
                                        class="btn btn-danger btn-icon delete-order">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="order form-group row">
                <div class="col-md-2">
                    <div class="col-md-2 control-label">
                        {{Form::label('Meni','Meni')}}
                    </div>
                    <div class="col-md-10">
                        <select name="menu" id="select3" style="width: 100%">
                            @foreach($menus as $menu)
                                <option value="{{$menu->menu_id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">

                    <div class="col-md-2 control-label">
                        {{Form::label('article','Artikl:')}}
                    </div>
                    <div class="col-md-10">
                        <select name="article" id="select4" style="width: 100%">
                            @foreach($articles as $article)
                                @foreach($article as $art)
                                    <option value="{{$art->article_id}}">{{$art->name}}</option>
                                @endforeach
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-md-2">

                    <div class="col-md-2 control-label">
                        {{Form::label('table','Sto:')}}
                    </div>
                    <div class="col-md-10">
                        <select name="table" id="select5" style="width: 100%">
                            @foreach($tables as $table)
                                <option value="{{$table->table_id}}">{{$table->table_number}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-2 control-label">

                        {{Form::label('quantity','Kolicina:')}}
                    </div>
                    <div class="col-md-10">
                        <select name="quantity" id="select6" style="width: 100%">
                            @for($i=1;$i<=10;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-2">

                    <div class="col-md-2 control-label">
                        {{Form::label('user','Korisnik:')}}
                    </div>
                    <div class="col-md-10">
                        <select name="user" id="select7" style="width: 100%">
                            <option value=""></option>
                            @foreach($users as $user)}
                            <option value="{{$user['user_id']}}">{{$user['username']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">

                    <div class="col-md-6">
                        <button type="button" data-order=""
                                class="btn btn-primary btn-icon add-order">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" data-order=""
                                class="btn btn-danger btn-icon delete-order">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 right">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <h1 style="float: left">Total:</h1>
                <h1 class="receipt" style="float: left">0</h1>
            </div>
        </div>
    </div>
</div>
