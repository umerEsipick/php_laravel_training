@extends('layouts.main')

@section('content')

    <div class="col-lg-8">
        
        @foreach($posts as $post)
        
            <div class="card mb-4">
                {!! Html::image('/img/posts/'. $post->image, $post->title, array('style'=>'width:675px; height:225px; object-fit: contain')) !!}
                <div class="card-body">
                    <div class="small text-muted">{!! $post->created_at !!}</div>
                    <h2 class="card-title h4">{!! $post->title !!}</h2>
                    <p>by {!! $post->author !!}</p>
                    <p class="card-text">{!! $post->short_desc !!}</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        @endforeach

        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
            </ul>
        </nav>
    </div>
@endsection