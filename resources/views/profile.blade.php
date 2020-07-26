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
            <form action="{{route('add')}}" method="post">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header">
                        <input type="text" name="name" id="" value=" {{ Auth::user()->name }}" hidden>
                        <input type="text" name="username" id="" value=" {{ Auth::user()->username }}" hidden>
                        <textarea name="context" id="textarea-input" rows="3" placeholder="What's happining?" class="form-control" spellcheck="false"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">
                        Tweet
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container container-fluid">
    <div class="row justify-content-center">
        <!-- display data  -->
        @foreach($own as $row)
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <strong class="card-title pl-2">{{$row->name}}</strong>
                    <span>@</span><span>{{$row->username}} - {{$row->created_at}}</span>
                    <a id="navbarDropdown" class="dropdown-toggle btn btn-default" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/edit/{{ $row->id }}">
                            Edit
                        </a>
                        <a class="dropdown-item" href="/delete/{{ $row->id }}">
                            Delete
                        </a>
                    </div>
                    <hr>
                    {{$row->context}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection