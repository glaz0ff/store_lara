@extends('layouts.app')

@section('content')

    @php /** @var App\Models\StoreCategory $item */  @endphp

    @if($item->exists)
        <form method="POST" action="{{ route('store.admin.category.update', $item->id )}}">
            @method('PATCH')
            @else
                <form method="POST" action="{{route('store.admin.category.store')}}">
                    @endif
                    @csrf
                    <div class="container">
                        @php
                            /** @var Illuminate\Support\ViewErrorBag $errors */
                        @endphp
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first()}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&#10006;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-success" role="alert">
                                        {{session()->get('success')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&#10004;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('store.admin.category.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('store.admin.category.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
        </form>
        @endsection
