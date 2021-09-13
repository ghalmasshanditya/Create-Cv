@extends('layouts.master')
@section('title','Activity')
@section('page-name','Activity')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title" style="float: left;"><i class="fas fa-basketball-ball"> </i> Activity </h3>
        <button type="button" class="btn btn-outline-primary btn-sm mt-0" data-toggle="modal" data-target="#add" style="float: right; top:0"><i class="fas fa-plus"></i> Add Activity</button><br>
        <small>Please enter your activity</small>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Organization</th>
                    <th>Start</th>
                    <th>Finish</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($activity) == 0)
                <tr class="text-center">
                    <td colspan="5" class="text-center">- No Data -</td>
                </tr>
                @endif

                @php
                    $no=1;
                @endphp
                @foreach ($activity as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <strong>{{ $data->organisasi }}</strong><br>
                        <span>{{ $data->peran }}</span><br>
                        <span class="text-muted">{{ $data->deskripsi }}</span>
                    </td>
                    <td>{{ $data->bln_mulai }} - {{ $data->thn_mulai }}</td>
                    <td>{{ $data->bln_selesai }} - {{ $data->thn_selesai }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-warning btn-sm mt-1" data-toggle="modal" data-target="#edit{{ $data->id }}"><i class="fas fa-edit"> </i> Edit</button>
                        <button type="button" class="btn btn-outline-danger btn-sm mt-1" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="fas fa-trash"> </i> Delete</button>
                    </td>
                </tr>
                @endforeach
                <tr>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Organization</th>
                    <th>Start</th>
                    <th>Finish</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Add Data -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/activity/add" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Activity</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body mt-0">
                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" name="organization" placeholder="Organization" value="{{ old('organization') }}">
                            @error('organization')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="role" value="{{ old('role') }}">
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start</label>
                                    <select class="form-control @error('start_month') is-invalid @enderror select2bs4" style="width: 100%;" name="start_month" value="{{ old('start_month') }}">
                                        <option selected="selected" disabled>- Month -</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('start_month')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" class="form-control @error('start_year') is-invalid @enderror mt-1" placeholder="Year" name="start_year" value="{{ old('start_year') }}">
                                    @error('start_year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End</label>
                                    <select class="form-control @error('end_month') is-invalid @enderror select2bs4" style="width: 100%;" name="end_month" value="{{ old('end_month') }}">
                                        <option selected="selected" disabled>- Month -</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('end_month')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" class="form-control @error('end_year') is-invalid @enderror mt-1" placeholder="Year" name="end_year" value="{{ old('end_year') }}">
                                    @error('end_year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Edit Data -->
@foreach ($activity as $data)
<div class="modal fade" id="edit{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/activity/edit/{{ $data->id }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-warning text-white">
                    <h4 class="modal-title">Edit Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body mt-0">
                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" name="organization" placeholder="Organization" value="{{ $data->organisasi }}">
                            @error('organization')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="role" value="{{ $data->peran }}">
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start</label>
                                    <select class="form-control @error('start_month') is-invalid @enderror select2bs4" style="width: 100%;" name="start_month" value="{{ old('start_month') }}">
                                        <option selected="selected" disabled>- Month -</option>
                                        <option @if ($data->bln_mulai == 'January') selected @endif value="January">January</option>
                                        <option @if ($data->bln_mulai == 'February') selected @endif value="February">February</option>
                                        <option @if ($data->bln_mulai == 'March') selected @endif value="March">March</option>
                                        <option @if ($data->bln_mulai == 'April') selected @endif value="April">April</option>
                                        <option @if ($data->bln_mulai == 'May') selected @endif value="May">May</option>
                                        <option @if ($data->bln_mulai == 'June') selected @endif value="June">June</option>
                                        <option @if ($data->bln_mulai == 'July') selected @endif value="July">July</option>
                                        <option @if ($data->bln_mulai == 'August') selected @endif value="August">August</option>
                                        <option @if ($data->bln_mulai == 'September') selected @endif value="September">September</option>
                                        <option @if ($data->bln_mulai == 'October') selected @endif value="October">October</option>
                                        <option @if ($data->bln_mulai == 'November') selected @endif value="November">November</option>
                                        <option @if ($data->bln_mulai == 'December') selected @endif value="December">December</option>
                                    </select>
                                    @error('start_month')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" class="form-control @error('start_year') is-invalid @enderror mt-1" placeholder="Year" name="start_year" value="{{ $data->thn_mulai }}">
                                    @error('start_year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End</label>
                                    <select class="form-control @error('end_month') is-invalid @enderror select2bs4" style="width: 100%;" name="end_month" value="{{ old('end_month') }}">
                                        <option selected="selected" disabled>- Month -</option>
                                        <option @if ($data->bln_selesai == 'January') selected @endif value="January">January</option>
                                        <option @if ($data->bln_selesai == 'February') selected @endif value="February">February</option>
                                        <option @if ($data->bln_selesai == 'March') selected @endif value="March">March</option>
                                        <option @if ($data->bln_selesai == 'April') selected @endif value="April">April</option>
                                        <option @if ($data->bln_selesai == 'May') selected @endif value="May">May</option>
                                        <option @if ($data->bln_selesai == 'June') selected @endif value="June">June</option>
                                        <option @if ($data->bln_selesai == 'July') selected @endif value="July">July</option>
                                        <option @if ($data->bln_selesai == 'August') selected @endif value="August">August</option>
                                        <option @if ($data->bln_selesai == 'September') selected @endif value="September">September</option>
                                        <option @if ($data->bln_selesai == 'October') selected @endif value="October">October</option>
                                        <option @if ($data->bln_selesai == 'November') selected @endif value="November">November</option>
                                        <option @if ($data->bln_selesai == 'December') selected @endif value="December">December</option>
                                    </select>
                                    @error('end_month')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" class="form-control @error('end_year') is-invalid @enderror mt-1" placeholder="Year" name="end_year" value="{{ $data->thn_selesai }}">
                                    @error('end_year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" placeholder="Description"> {{ $data->deskripsi }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>

            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach


<!-- Delete Data -->
@foreach ($activity as $data)
<div class="modal fade" id="delete{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/activity/delete/{{ $data->id }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title">Delete Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to continue delete data ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>

            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection

