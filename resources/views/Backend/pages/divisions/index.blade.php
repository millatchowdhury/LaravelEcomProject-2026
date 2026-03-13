
@extends('Backend.layout.master')
@section('content')
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h1>Manage Division</h1>
                </div>
                <div class="card-body">
                    @include('Backend.partials.message')
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Division Name</th>
                            <th>Priority</th>
                            
                            <th>Action</th>
                        </tr>

                        @foreach ($divisions as $division)
                            <tr>
                                <td>#</td>
                                <td>{{ $division->name }}</td>
                                <td>
                                    {{ $division->priority }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.division.edit', ['id' => $division->id]) }}" class="btn btn-success">Edit</a>
                                    {{-- <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a> --}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$division->id}}">
                                        Delete Division
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Division</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.division.delete', $division->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cencel</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
          
        </div>
        

       




@endsection

