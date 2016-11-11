@extends('layouts.master')

@section('top_header')
  Add New Patient
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Patient Information
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('patient.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Patient ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $lastID }}" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::old('name') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="Male"> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="Female"> Female
                </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Date of Birth</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" data-provide="datepicker" name="birthDate">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Blood Group</label>
              <div class="col-sm-8">
                <select class="form-control" name="bloodGroup">
                  <option value="A+">A+</option>
                  <option value="O+">O+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="A-">A-</option>
                  <option value="O-">O-</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Symptoms</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="symptoms" placeholder="Symptoms" value="{{ Request::old('symptoms') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Assign Doctor</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">                  
                  @foreach ($doctors as $doctor)
                    @foreach($employees as $employee)
                      @if($doctor->id == $employee->ecategory_id)
                      <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                      @endif
                    @endforeach
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Assign Seat</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->seatFloor}} -- {{ $seat->seatNo }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Mobile Number</label> 
              <div class="col-sm-8">
                <input class="form-control" type="tel" pattern="^\d{11}$" required name="mobile" placeholder="(format: xxxxxxxxxxx)" name="mobile">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ Request::old('address') }}" required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Upload Image</label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Add Patient</button>
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