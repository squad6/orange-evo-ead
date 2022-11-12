@extends('admin.layouts.app')

@section('content')


    @if (isset($modules))
    <a class="btn btn-primary" href="{{ route('admin.trail.index') }}">Voltar</a>
        @error('title')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror
        @error('description')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror
        @error('time')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror


        @if (isset($message))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModuleModal">
            Adicionar modulo
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $key => $module)
                    <tr>
                        <th scope="row">{{ $module->title }}</th>
                        <td>{{ $module->description }}</td>
                        <td>{{ $module->time }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.content.index', ['trail' => $trail, 'module' => $module]) }}">Conteúdos</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModuleModal" data-bs-trail_id="{{ $trail->id }}"
                                data-bs-module_id="{{ $module->id }}" data-bs-module_title="{{ $module->title }}"
                                data-bs-module_description="{{ $module->description }}"
                                data-bs-module_time="{{ $module->time }}">
                                Editar
                            </button>
                            <form id="trail_form_delete"
                                action="{{ route('admin.module.destroy', ['trail' => $trail, 'module' => $module]) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-primary" type="submit">Excluir</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>




        {{-- Modal atualizar trail --}}
        <div class="modal fade" id="updateModuleModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="updateModuleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModuleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateModuleForm" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <input id="title" type="text" name="title">

                            <br>
                            <input id="description" type="text" name="description">

                            <br>
                            <input id="time" type="time" name="time">


                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal novo modulo --}}
        <div class="modal fade" id="createModuleModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="createModuleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModuleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createModuleForm" method="POST"
                            action="{{ route('admin.module.store', ['trail' => $trail]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Descrição:</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-form-label">Tempo de duração:</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        var updateModuleModal = document.getElementById('updateModuleModal')
        updateModuleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var module_id = button.getAttribute('data-bs-module_id')
            var trail_id = button.getAttribute('data-bs-trail_id')
            var module_title = button.getAttribute('data-bs-module_title')
            var module_description = button.getAttribute('data-bs-module_description')
            var module_time = button.getAttribute('data-bs-module_time')

            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var titleInput = updateModuleModal.querySelector('#title')
            titleInput.value = module_title

            var descriptionInput = updateModuleModal.querySelector('#description')
            descriptionInput.value = module_description

            var timeInput = updateModuleModal.querySelector('#time')
            timeInput.value = module_time

            var route = "{{ route('admin.module.update', [':trail_id', ':module_id']) }}";
            route = route.replace(':trail_id', trail_id);
            route = route.replace(':module_id', module_id)

            var form = updateModuleModal.querySelector('#updateModuleForm')
            form.action = route

        })
    </script>
@endsection
