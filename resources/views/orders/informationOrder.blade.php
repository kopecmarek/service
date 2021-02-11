@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($operation && $message)
                    <div class="card-header">{{ __('Information ').$operation }}</div>
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            {{$message}}
                        </div>
                        @if($operation == 'order')<a class="btn btn-primary" href="/order">{{_('Order another')}}</a>@endif
                        <a class="btn btn-primary" href="{{route('home')}}">{{_('Home')}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
