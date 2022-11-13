@extends('user.layouts.home')
@push('head')
    <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('body')
    <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>
@endpush

@section('page-content')
    <div class="container-fluid">
        <!-- Card Title -->
        <div class="card shadow mb-4" style="background-color: #FFDACC; color: black">
            <div class="py-3">
                <h2 class="m-0 font-weight-bold" style="padding-left: 1%; color: #36357E;">
                    <i class="fas fa-fw fa-puzzle-piece"></i>
                    {{ $module->title }}
                </h2>
                <div class="row">
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card-body">
                            <p>
                                {{ $module->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-expand">
            <a class="btn nav-item" style="background-color: #FE4400; color: white;"
               href="{{ route('user.trail.show', ['trail' => $module->trail->id]) }}">Voltar</a>
        </div>
        <br>
        <!-- End Card Title -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold" style="color: #36357E;">
                    <i class="fa fa-fw fa-book"></i>
                    Conteúdos
                </h4>
            </div>
            <div class="card-body">
                @if(isset($module->contents) and sizeof($module->contents) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" style="color: black">
                            <thead>
                            <tr>
                                @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                    <th>Concluído</th>
                                @endif
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Duração</th>
                                <th>Provedor de Conteúdo</th>
                                <th>Assunto</th>
                                <th>Tipo</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                    <th>Concluído</th>
                                @endif
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Duração</th>
                                <th>Provedor de Conteúdo</th>
                                <th>Assunto</th>
                                <th>Tipo</th>
                                <th>Link</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($module->contents as $key => $content)
                                <tr>
                                @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                        <td style="text-align: center">
                                            <form action="{{ route('user.status.content', ['content' => $content]) }}" method="POST">
                                                @csrf
                                                <label>
                                                    <select class="dropdown-list" name="content_status" onchange="this.form.submit()">
                                                        @if (isset($content->users->find(Auth::user()->id)->pivot) and
                                                            $content->users->find(Auth::user()->id)->pivot->content_status == 1)
                                                            <option value="0">Não estudei</option>
                                                            <option value="1" selected="selected">Concluído</option>
                                                        @else
                                                            <option value="0" selected="selected">Não estudei</option>
                                                            <option value="1">Concluído</option>
                                                        @endif
                                                    </select>
                                                </label>
                                            </form>
                                        </td>
                                    @endif
                                    <td>{{$content->title}}</td>
                                    <td>{{$content->description}}</td>
                                    <td>{{$content->time}}</td>
                                    <td>{{$content->content_by}}</td>
                                    <td>{{$content->subject}}</td>
                                    <td>{{$content->type}}</td>
                                    <td><a href="{{$content->link}}">{{$content->link}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


{{--<h1>{{ $module->title }}</h1>--}}

{{--<p>{{ $module->time }}</p>--}}

{{--<button><a href="{{ route('user.trail.show', ['trail' => $module]) }}">Voltar</a></button>--}}
{{--@if (!isset($module->users->find(Auth::user()->id)->pivot))--}}
{{--    <button><a href="{{ route('user.trail.subscribe', $module->id) }}">Inscrever-se</a></button>--}}
{{--@endif--}}

{{--<br>--}}

{{--@if (isset($module->users->find(Auth::user()->id)->pivot))--}}
{{--    Barra de status: {{ $module->users->find(Auth::user()->id)->pivot->trail_status_percentage }} %--}}
{{--@endif--}}

{{--<ul>--}}
{{--    @foreach ($module->contents as $content)--}}
{{--        <li>--}}
{{--            <p>{{ $content->title }}</p>--}}
{{--            <button><a href="#">Ver--}}
{{--                    conteúdo</a></button>--}}

{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}


{{-- <form action="{{ route('user.status.content', ['content' => $content]) }}" method="POST">--}}
{{--    @csrf--}}
{{--    <select name="content_status">--}}
{{--        @if (isset($content->users->find(Auth::user()->id)->pivot))--}}
{{--            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 0)--}}
{{--                <option value="0" disabled>Não estudei</option>--}}
{{--            @else--}}
{{--                <option value="0">Não estudei</option>--}}
{{--            @endif--}}
{{--            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 1)--}}
{{--                <option value="1" disabled>Concluído</option>--}}
{{--            @else--}}
{{--                <option value="1">Consluído</option>--}}
{{--            @endif--}}
{{--        @else--}}
{{--            <option value="0" disabled>Não estudei</option>--}}
{{--            <option value="1">Consluído</option>--}}
{{--        @endif--}}

{{--    </select>--}}
{{--    <button type="submit">Enviar</button>--}}
{{--</form> --}}
