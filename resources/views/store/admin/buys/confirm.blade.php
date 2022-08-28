@extends('layouts.app')

@section('content')

    @php /** @var App\Models\StoreBuy $item */  @endphp
        <form method="POST" action="{{route('store.admin.buys.store', ['user_id' => Auth::user()->id, 'id' => $items])}}">
            @csrf
            <br>
            <div class="container">
                        <div class="row justify-content-center">
                            <button class="btn btn-secondary">Подтвердить покупку</button>
                        </div>
                    </div>
        </form>

    @endsection
