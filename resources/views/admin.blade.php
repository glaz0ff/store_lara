@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-auto">
                            <a class="btn btn-secondary" href="{{route('store.admin.category.index')}}">Управление категориями</a>
                        </div>
                        <div class="col-md-auto">
                            <a class="btn btn-secondary" href="{{route('store.admin.product.index')}}">Управление продуктами</a>
                        </div>
                        <div class="col-md-auto">
                            <a class="btn btn-secondary" href="{{route('store.admin.buys.index')}}">Список всех покупок</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
