@extends('layouts.app')

@section('content')
<h2 class="text-center mt-4">Rooms Management - Edit Room ( {{ $room->number }} )</h2>

<hr class="my-4">

<div class="container">
    <div class="row">


        <div class="col-sm-12 col-md-8 m-auto">

            
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


            <form class="mt-4" method="POST" action="{{ route('update-room',$room->id) }}">
                @csrf
                <div class="form-group">
                    <select name="floor_id" class="form-control mb-2 mr-sm-2 w-75" required>
                        <option value="">Select Floor</option>
                        @foreach ($floors as $floor)
                            <option value="{{ $floor->id }}" <?=$room->floor->id == $floor->id ? 'selected' : '' ?>>{{ $floor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="number" value="{{ $room->number ?? old('number') }}" class="form-control mb-2 mr-sm-2 w-75" placeholder="Room Numbe..." required>
                </div>
                <div class="form-group">
                    <input type="text" name="type" value="{{ $room->type ?? old('type') }}" class="form-control mb-2 mr-sm-2 w-75" placeholder="Room Type..." required>
                </div>
                <div class="form-group">
                    <input type="text" name="capacity" value="{{ $room->capacity ?? old('capacity') }}" class="form-control mb-2 mr-sm-2 w-75" placeholder="Room Capacity..." required>
                </div>
                <div class="form-group">
                    <input type="text" name="note" value="{{ $room->note ?? old('note') }}" class="form-control mb-2 mr-sm-2 w-75" placeholder="Add A Note..">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection