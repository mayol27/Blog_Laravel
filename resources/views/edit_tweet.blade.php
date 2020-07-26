@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors) > 0)
                <div class="alert alert-danger ">
                    <strong>Error!</strong>
                    @foreach($errors->all() as $error)
                    <ul>
                        <li>{{$error}}</li>
                    </ul>
                    @endforeach
                </div>
            @endif
            <form action="/update/{{ $edit->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card">
                    <input type="hidden" name="id" value="{{ $edit->id }}" />
                    <div class="card-header"> 
                        <textarea name="context" rows="3" placeholder="What's happining?" class="form-control">{{ $edit->context }}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">
                        Edit
                        </button>
                        <a href="{{ url('profile') }}" class="btn btn-info  btn-sm">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection