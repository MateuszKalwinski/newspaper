@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2">
                    <div class="d-flex">
                        <h2 class="color-mid-grey">{{$title}}</h2>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <form method="POST" action="{{route('categories-create')}}">
                    @csrf
                    <div class="col-lg-12 col-md-12">
                        <div class="mt-5">
                            <div class="mt-5">
                                <p class="blue-text">Nazwa kategorii</p>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="md-form">
                                        <input type="text" id="categoryName" name="categoryName"
                                               class="form-control"
                                               value="{{$category->name ?? ''}}">
                                        <label for="categoryName" class="label-fon">{{ __('Nazwa kategorii *') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="nav-link btn btn-sm success-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0">
                            {{ __('Zapisz kategorie') }} <i class="fas fa-check ml-3"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
