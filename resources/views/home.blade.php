@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <a class="btn btn-secondary" href="{{route('store.products.index', Auth::user()->id)}}">Список всех родуктов</a>
                            </div>
                            <div class="col-md-auto">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Категории
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach($items as $item)
                                            <li><a class="dropdown-item" href="{{route('store.category.index', ["id" => $item->id])}}">{{$item->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
