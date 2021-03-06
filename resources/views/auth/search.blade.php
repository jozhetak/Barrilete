@php 
$query = Request::get('query')
@endphp
<div id="user-articles-list">
    <p class="searchFilter">
        <a class="{{ Request::get('sec') == 'articulos' ? 'active' : 'searchFilterLink' }}" href="{{route('searchAuth',['query'=>$query,'sec'=>'articulos','author'=>Auth::user()->id])}}">Artículos</a>
        <a class="{{ Request::get('sec') == 'galerias' ? 'active' : 'searchFilterLink' }}" href="{{route('searchAuth',['query'=>$query,'sec'=>'galerias','author'=>Auth::user()->id])}}">Galerías</a>
        <a class="{{ Request::get('sec') == 'encuestas' ? 'active' : 'searchFilterLink' }}" href="{{route('searchAuth',['query'=>$query,'sec'=>'encuestas','author'=>Auth::user()->id])}}">Encuestas</a>
    </p>
    <p class="searchInfo">Se encontraron {{$resultado->total()}} resultados para la búsqueda: <b>{{$query}}</b></p>
    @forelse ($resultado as $pub)
    <article class="searchResult">
        <p class="searchDate">
            @if ($pub->status == 'DRAFT')
            <img src="{{ asset('svg/forbidden.svg') }}" title="No publicado" />
            @else
            <img src="{{ asset('svg/checked.svg') }}" title="Publicado" />
            @endif
            {{ $pub->created_at->diffForHumans() }}
        </p>
        @if (Request::get('sec') == 'articulos')
        <a class="searchTitle" href="{{ route('previewArticle', ['id'=>$pub->id]) }}">{{$pub->title}}</a>
        @elseif (Request::get('sec') == 'galerias')
        <a class="searchTitle" href="{{ route('previewGallery', ['id'=>$pub->id]) }}">{{$pub->title}}</a>
        @elseif (Request::get('sec') == 'encuestas')
        <a class="searchTitle" href="{{ route('previewPoll', ['id'=>$pub->id]) }}">{{$pub->title}}</a>
        @endif
        <p class="searchCopete">{{$pub->article_desc}}</p>
    </article>
    @empty
    <hr />
    <p>No hay artículos para mostrar</p>
    @endforelse
    {{$resultado->links()}}
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $('div#user-articles-list a').each(function () {

            var href = $(this).attr('href');
            $(this).attr({href: '#'});

            $(this).click(function () {
                $('#user-articles-list').fadeOut('fast', 'linear', function () {
                    $('#loader').fadeIn('fast', 'linear', function () {
                        $('#loader').fadeOut('fast', 'linear', function () {
                            $('#user-content').fadeOut('fast', 'linear', function () {
                                $('#user-content').load(href, function () {
                                    $('#user-content').fadeIn('fast', 'linear');
                                });
                            });
                        });
                    });
                });
            });
        });
    });
</script>