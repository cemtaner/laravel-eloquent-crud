@extends('module.layout')
  
@section('content')
   
<form action="{{ route('module.store') }}" method="POST">
    @csrf
  
    <div class="my-5 d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary" href="{{ route('module.index') }}"> <i class="fas fa-arrow-left"></i> Back</a> Add New Item</div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="Detail">Detail</label>
                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Enter Detail"></textarea>
                        </div>
                        <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
   
</form>
    
@endsection