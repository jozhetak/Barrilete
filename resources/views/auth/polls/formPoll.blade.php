<div id="Article_Form">
<h1>Cargar encuesta</h1>
    <form method="post" enctype="multipart/form-data" id="createArticle" action="{{ route('createPoll') }}">
        <fieldset>
            <legend>Información</legend>
            <p><b>Autor</b>: {{ Auth::user()->name }}</p>
            <p><b>Fecha de publicación</b>: {{ now()->formatLocalized('%A %d %B %Y') }}</p> 
        </fieldset>
        <fieldset>
            <legend>Título y Copete</legend>
            <div id="errors"></div>
            <input type="text" name="title" value="" placeholder="Título: éste es el principal título de la encuesta (*) Mínimo 20 caracteres" required />            
            <textarea name="article_desc" placeholder="Copete: puedes incluir el primer párrafo de tu encuesta (*) Mínimo 50 caracteres" required></textarea>
            <input type="submit" value="Siguiente »" id="enviar" class="primary" />
            <input type="reset" class="default" value="Restablecer" />
        </fieldset>
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
        <input type="hidden" name="author" value="{{ Auth::user()->name }}" />
        <input type="hidden" name="section_id" value="{{ $section->id }}" />
    </form>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.filestyle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dashboard-form-submit.js') }}"></script>