@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{!!route('store.admin.product.create')!!}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Продукт</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var App\Models\StoreProduct $item */ @endphp
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->title}}</td>
                                    <td>
                                        <a href="{{route('store.admin.product.edit', $item->id)}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td>{{$item->price}}$</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
