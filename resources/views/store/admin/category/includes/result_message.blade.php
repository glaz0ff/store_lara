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
