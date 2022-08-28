@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    Профиль пользователя ID:{{Auth::user()->id}}
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content">
                                <div class="tab-pane active" id="maindata" role="tabpanel">
                                    <div class="form-group">
                                        <label for="name">ФИО</label>
                                        <input name="name" value="{{Auth::user()->name}}"
                                               type="text"
                                               id="name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Почта</label>
                                        <input name="email" value="{{Auth::user()->email}}"
                                               type="text"
                                               id="email"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                     История покупок
                                </li>
                            </ul>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Название продукта</th>
                                            <th>Дата и время покупки</th>
                                        </tr>
                                        </thead>
                                        @foreach($items as $item)
                                            @if($item->user_id == AUTH::user()->id)
                                                <tbody>
                                                <tr>
                                                    <td>{{$item->product->title}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                </tr>
                                                </tbody>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
