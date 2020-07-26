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
            <form action="{{url('home')}}" method="post">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header">
                        <input type="text" name="name" id="" value=" {{ Auth::user()->name }}" hidden>
                        <input type="text" name="username" id="" value=" {{ Auth::user()->username }}" hidden>
                        <textarea name="context" id="textarea-input" rows="3" placeholder="What's happining?" class="form-control" spellcheck="false"></textarea>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="">
                                <label for="" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
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
        @foreach($tweet as $row)
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <strong class="card-title pl-2">{{$row->name}}</strong>
                    <span>@</span><span>{{$row->username}} - {{$row->created_at}}</span>
                    
                    <hr>
                    {{$row->context}}
                </div>
            </div>
        </div>
        @endforeach
        <!-- sample -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <strong class="card-title pl-2">ABS-GMA</strong>
                    <span>@fakeNEWS - 2020-07-24 06:42:41</span>
                    <hr>
                    <p>MANILA, Philippines — Model John Lloyd Mayol's trending Instagram stories are unrelenting as he continues to post cryptic texts and images up until Friday afternoon.</p>
                    <p>The message is a little bit more clear, however, with John Lloyd more or less confirming speculation that his recent behavior is related to his reaction to the relationship of his ex-girlfriend, Miss Universe 2018 Catriona Gray and her new beau, actor Sam Milby.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
