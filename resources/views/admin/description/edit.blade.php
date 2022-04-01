@extends('layouts.admin');
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Descriptions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Description</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   <section class="content">
      <div class="container-fluid">
<form method="get" action="{{route ('description.update', $descriptions->id)}}">
@method('PUT')  
<input type="hidden" name="_token" value="{{'csrf_token()'}}">
    <div class="form-group">
        <div class="row">
            <label class="col-md-2">  Title </label>
            <div class="col-md-4"><input type="text" name="title" class="form-control"> </div>
            <div class="clearfix"></div>
</div>
</div>
<div class ="form-group">
    <input type="submit" class="btn btn-info" value="Update">
</div>
</form>

</div>
</section>

    @endsection