@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Покупатель</th>
                                    <th>Название продукта</th>
                                    <th>Дата и время покупки</th>
                                </tr>
                                </thead>
                            @foreach($items as $item)
                                <tbody>
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->product->title}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                                 </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($items->total() > $items->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$items->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
