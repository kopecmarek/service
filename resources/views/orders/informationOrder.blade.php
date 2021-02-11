@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($success === 1)
                    <div class="card-header">{{ __('Information') }}</div>
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            {{__('Your order has been processed successfully. Wait for information about the progress of the order')}}
                        </div>
                        <a class="btn btn-primary" href="/order">{{_('Order another')}}</a>
                        <a class="btn btn-primary" href="{{route('home')}}">{{_('Home')}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
