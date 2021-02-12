@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Name')}}</th>
                <th scope="col">{{__('Email')}}</th>
                <th scope="col">{{('Action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_admin === null)
                        <a class="btn btn-warning" href="{{$user->id}}/edit">Edit</a>
                        <form style="display: inline" action="users/{{$user->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" onclick="return confirm('Are you sure?')" value="Delete" class="btn btn-danger">
                        </form>
                        @else <button class="btn btn-success" disabled>It's admin :)</button> @endif</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{$users->links()}}</div>
    </div>
@endsection
