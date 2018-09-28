@extends('layouts.app')

@section('jumbotron')
    @parent
@endsection

<!-- Example row of columns -->
@section('content')
    <div class="row">
        @forelse($news as $key=>$item)
            @if ($item['active'])
                <div class="col-md-4">
                    <h2>@myDir({{$item['title']}})</h2>
                    <p>{{$item['description']}}</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
            @endif
        @empty
        @endforelse
    </div>
@endsection