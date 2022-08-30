@extends('layouts.app')

@section('content')
    @include('store.admin.buys.includes.result_message')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>id</th>
                                <th>Название</th>
                                <th>Цена</th>
                            </tr>
                            @foreach($items as $item)
                                @if($item->category_id == $id)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <a class="btn btn-secondary" @if(Auth::user()!=null)
                                                href="{{route('store.admin.buys.create', ['id' => $item->id])}}"
                                               @else
                                                   href="{{route('login')}}"
                                                @endif
                                            >Купить</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
