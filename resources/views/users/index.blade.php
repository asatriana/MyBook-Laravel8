@extends('users.layout')
 
@section('content')
    <div class="row">
    <x-header type="success" title="{{$title}}"/>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Laravel 8 CRUD - Manajemen User</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   <!-- Start kode untuk form pencarian -->
    <form class="form" method="get" action="{{ route('search') }}">
        <div class="form-group w-100 mb-3">
            <label for="search" class="d-block mr-2">Pencarian</label>
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </form>
    <!-- End kode untuk form pencarian -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>`
            <th>Position</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->position_id }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-center">
        {!! $users->links() !!}
    </div>
      
@endsection