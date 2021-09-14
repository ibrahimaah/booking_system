@extends('layouts.app')

@section('content')

<h2 class="text-center mt-4">Rooms Management</h2>

<hr class="my-4">
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <a href="{{ route('create-room') }}" class="btn btn-primary">Add A New Room</a>
        </div>
        <div class="col-sm-12 col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <h4 class="text-success">{{ session()->get('success') }}</h4>
            @else
                <h4 class="text-danger">{{ session()->get('faild') }}</h4>
            @endif

            @if(Session::has('success-removed'))
                <h4 class="text-success">{{ session()->get('success-removed') }}</h4>
            @endif
            
            @if(Session::has('faild-removed'))
                <h4 class="text-danger">{{ session()->get('faild-removed') }}</h4>
            @endif

            @isset($rooms)
            <table class="table table-bordered mt-4">
                <thead class="text-center">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Floor name</th>
                    <th scope="col">Room number</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Room capacity</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php 
                        $i=0;
                    @endphp 
                    @foreach($rooms as $room)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $room->floor->name }}</td>
                            <td>{{ $room->number }}</td>
                            <td>{{ $room->type }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ $room->note ?? '-----------'}}</td>
                            <td>
                               <div class="d-flex justify-content-center">
                                  
                                   <div class="mr-2">
                                        <a href="{{ route('edit-room',$room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                   </div>

                                   <div>
                                        <form action="{{ route('remove-room', $room->id) }}" method="POST">
                                            @csrf
                                            <input type="submit" value="Remove" class="btn btn-sm btn-danger">
                                        </form>
                                    </div>

                               </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else 
                <h4 class="text-danger">No Rooms Yet !!</h4>
            @endisset
        </div>
       
    </div>
</div>
@endsection
