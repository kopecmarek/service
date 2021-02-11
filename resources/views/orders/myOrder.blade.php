@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-center" scope="col">{{__('Date')}}</th>
                <th class="text-center" scope="col">{{__('Brand')}}</th>
                <th class="text-center" scope="col">{{__('Model')}}</th>
                <th class="text-center" scope="col">{{__('Quantity')}}</th>
                <th class="text-center" scope="col">{{__('Price')}}</th>
                <th class="text-center" scope="col">{{__('Total')}}</th>
                <th class="text-center" scope="col">{{__('Type')}}</th>
                <th class="text-center" scope="col">{{__('Status')}}</th>
                <th class="text-center" class="text-center" scope="col">{{('Action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->brand}}</td>
                    <td>{{$order->model}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->type}}</td>
                    <td>@if(!$order->price and !$order->total) In progress @else Confirmed @endif</td>
                    <td class="text-center">@if(!$order->price and !$order->total)
                        <a class="btn btn-warning" href="{{$order->id}}/edit">Edit</a>
                            <form style="display: inline" action="{{route('order')}}" method="POST">@method('DELETE')<input type="submit" value="Delete" class="btn btn-danger"></form>
                        @else <button class="btn btn-success" disabled>Finished</button> @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
