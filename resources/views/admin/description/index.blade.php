@extends('layouts.admin');
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Description</h1>
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
          <p> <a href="{{route ('description.create') }}" class="btn btn-primary"> Add New Description</a> </p>
        <table class="table table-bordered table-striped">
            <tr>
                <th> Id</th>
                <th>Title </th>
                <th>Remark </th>
                <th>Action </th>
            </tr>
            @foreach($A as $a)
            <tr>
                <td> {{$a->id}}</td>
                <td> {{$a->title}}</td>
                <td> {{$a->remark}}</td>
                
                <td><a href="{{route ('description.edit',$a->id)}}" class="btn btn-info">Edit </a> <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger"> Delete </a></td>
                  <form action="{{route('description.destroy',$a->id)}}" method="post">
                    @method('DELETE')
                    <input type="hidden" name="_token" value="{{'csrf_token()'}}">

                    </form>
                </tr>
            @endforeach
        </table>
        </div>
    </section>
            @endsection
           