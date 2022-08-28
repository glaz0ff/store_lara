@extends('layouts.app')

@section('content')

    @php /** @var App\Models\StoreProduct $item */  @endphp

    @if($item->exists)
        <form method="POST" action="{{ route('store.admin.product.update', $item->id )}}">
            @method('PATCH')
            @else
                <form method="POST" action="{{route('store.admin.product.store')}}">
                    @endif
                    @csrf
                    <div class="container">
                        @include('store.admin.product.includes.result_message')

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('store.admin.product.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('store.admin.product.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
        </form>
        @endsection
