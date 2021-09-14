@extends('layouts.app')

@section('content')

<h2 class="text-center mt-4">Floors Management</h2>

<hr class="my-4">
<div class="container">
    <div class="row">

        <div class="col-sm-12 col-md-6">
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

            @isset($floors)
            <table class="table table-bordered mt-4">
                <thead class="text-center">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Floor name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($floors as $floor)
                        <tr>
                            <th scope="row">{{ $floor->id }}</th>
                            <td>{{ $floor->name }}</td>
                            <td>
                            
                            <form action="{{ route('remove-floor', $floor->id) }}" method="POST">
                                @csrf
                                <input type="submit" value="Remove" class="btn btn-sm btn-danger">
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else 
                <h4 class="text-warning">No Floors Yet !!</h4>
            @endisset
        </div>
        <div class="col-sm-12 col-md-6">
            <form class="mt-4" method="POST" action="{{ route('store-floor') }}">
                @csrf
                <div class="form-group">
                    <!-- <label>Enter Category :</label> -->
                    <input type="text" name="name" class="form-control mb-2 mr-sm-2 w-50" placeholder="Type Floor Name" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
            </form>
            {{-- <p class="invisible">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla praesentium eveniet hic commodi vitae corporis quia qui, reiciendis omnis cupiditate corrupti unde quos impedit, molestias ipsum labore alias perspiciatis velit!</p> --}}
        </div>



    </div>
</div>
@endsection
