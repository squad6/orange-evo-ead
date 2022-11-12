@extends('admin.layouts.app')

@section('content')
    @if (isset($trails))
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
        @error('trail_by')
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

        <div class="d-flex justify-content-between mb-4">
            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Voltar</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTrailModal">
                Adicionar trilha
            </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Duração Estimada</th>
                    <th scope="col" style="text-align: right">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trails as $key => $trail)
                    <tr>
                        <th scope="row">{{ $trail->title }}</th>
                        <td>{{ $trail->description }}</td>
                        <td>{{ $trail->time }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary mr-2"
                                    href="{{ route('admin.module.index', ['trail' => $trail]) }}">Módulos</a>
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#updateTrailModal" data-bs-trail_id="{{ $trail->id }}"
                                    data-bs-trail_title="{{ $trail->title }}"
                                    data-bs-trail_description="{{ $trail->description }}"
                                    data-bs-trail_time="{{ $trail->time }}" data-bs-trail_by="{{ $trail->trail_by }}">
                                    Editar
                                </button>
                                <form id="trail_form_delete"
                                    action="{{ route('admin.trail.destroy', ['trail' => $trail]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modal atualizar trilha --}}
        <div class="modal fade" id="updateTrailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="updateTrailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateTrailModalLabel">Atualizar Trilha</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateTrailForm" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <label for="title" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label">Descrição:</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-form-label">Duração estimada:</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="form-group">
                                <label for="trail_by" class="col-form-label">Trilha criado por:</label>
                                <input type="text" class="form-control" id="trail_by" name="trail_by">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal nova trilha --}}
        <div class="modal fade" id="createTrailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="createTrailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createTrailModalLabel">Cadastrar Nova Trilha</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createTrailForm" method="POST" action="{{ route('admin.trail.store') }}">
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
                                <label for="time" class="col-form-label">Tempo Estimado:</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="form-group">
                                <label for="trail_by" class="col-form-label">Trilha por:</label>
                                <input type="text" class="form-control" id="trail_by" name="trail_by">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
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
        // Script para envio do id correto para alterações de registro
        var updateTrailModal = document.getElementById('updateTrailModal')
        updateTrailModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var trail_id = button.getAttribute('data-bs-trail_id')
            var trail_title = button.getAttribute('data-bs-trail_title')
            var trail_description = button.getAttribute('data-bs-trail_description')
            var trail_time = button.getAttribute('data-bs-trail_time')
            var trail_by = button.getAttribute('data-bs-trail_by')

            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var titleInput = updateTrailModal.querySelector('#title')
            titleInput.value = trail_title

            var descriptionInput = updateTrailModal.querySelector('#description')
            descriptionInput.value = trail_description

            var timeInput = updateTrailModal.querySelector('#time')
            timeInput.value = trail_time

            var trailByInput = updateTrailModal.querySelector('#trail_by')
            trailByInput.value = trail_by

            var form = updateTrailModal.querySelector('#updateTrailForm')
            form.action = "{{ route('admin.trail.update', '') }}" + "/" + trail_id;
        })
    </script>
@endsection
