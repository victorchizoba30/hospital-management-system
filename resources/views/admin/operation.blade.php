@extends('layouts.master')

@section('top_header')
  Add New Operation
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Operation Information
        </div>
        <div class="panel-body">
        <div class="col-lg-12">
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(count($errors) > 0)
        <div>
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {{$error}}
            @endforeach
          </ul>
        </div>
      @endif
          <form class="form-horizontal bordered-group" role="form" action="{{ route('operation.save') }}" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Patient</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  <option value="1">Nazmul</option>
                  <option value="2">Somrat</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Operation Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                  <option value="1">T4</option>
                  <option value="2">C.B.C</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Select Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  <option value="1">T4</option>
                  <option value="2">C.B.C</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Select Seat</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  <option value="1">ICU - 101</option>
                  <option value="2">ICU - 202</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">O.T Date</label>
              <div class="col-sm-8">
                <input type="text" name="date" class="form-control" placeholder="Format : Y-M-D">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">O.T Time</label>
              <div class="col-sm-8">
                <input type="text" name="time" class="form-control" placeholder="Format : H:M:S">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="description"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Operation</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection