@extends('admin.layouts.app')

@section('content')
    @if (isset($contents))
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
        @error('tyoe')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror
        @error('content_by')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror
        @error('subject')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @enderror
        @error('link')
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
            <a class="btn btn-primary" href="{{ route('admin.module.index', ['trail' => $trail]) }}">Voltar</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createContentModal">
                Adicionar conteúdo
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Conteúdo por</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Link</th>
                    <th scope="col" style="text-align: right">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $key => $content)
                    <tr>
                        <th scope="row">{{ $content->title }}</th>
                        <td>{{ $content->description }}</td>
                        <td>{{ $content->time }}</td>
                        <td>{{ $content->type }}</td>
                        <td>{{ $content->content_by }}</td>
                        <td>{{ $content->subject }}</td>
                        <td>{{ $content->link }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#updateContentModal" data-bs-trail_id="{{ $trail->id }}"
                                    data-bs-module_id="{{ $module->id }}" data-bs-content_id="{{ $content->id }}"
                                    data-bs-content_title="{{ $content->title }}"
                                    data-bs-content_description="{{ $content->description }}"
                                    data-bs-content_time="{{ $content->time }}"
                                    data-bs-content_type="{{ $content->type }}"
                                    data-bs-content_by="{{ $content->content_by }}"
                                    data-bs-content_subject="{{ $content->subject }}"
                                    data-bs-content_link="{{ $content->link }}">
                                    Editar
                                </button>
                                <form id="trail_form_delete"
                                    action="{{ route('admin.content.destroy', ['trail' => $trail, 'module' => $module, 'content' => $content]) }}"
                                    method="POST">
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

        {{-- Modal atualizar conteudo --}}
        <div class="modal fade" id="updateContentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="updateContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateContentModalLabel">Atualizar Conteúdo</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateContentForm" method="POST">
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
                                <label for="time" class="col-form-label">Tempo Estimado:</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-form-label">Assunto:</label>
                                <input type="text" class="form-control" id="type" name="type">
                            </div>
                            <div class="form-group">
                                <label for="content_by" class="col-form-label">Conteúdo por:</label>
                                <input type="text" class="form-control" id="content_by" name="content_by">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-form-label">Tema:</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link:</label>
                                <input type="text" class="form-control" id="link" name="link">
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

        {{-- Modal novo modulo --}}
        <div class="modal fade" id="createContentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="createContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createContentModalLabel">Cadastrar Novo Conteúdo</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createContentModal" method="POST"
                            action="{{ route('admin.content.store', ['trail' => $trail, 'module' => $module]) }}">
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
                                <label for="type" class="col-form-label">Assunto:</label>
                                <input type="text" class="form-control" id="type" name="type">
                            </div>
                            <div class="form-group">
                                <label for="content_by" class="col-form-label">Conteúdo por:</label>
                                <input type="text" class="form-control" id="content_by" name="content_by">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-form-label">Tema:</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link:</label>
                                <input type="text" class="form-control" id="link" name="link">
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
        var updateContentModal = document.getElementById('updateContentModal')
        updateContentModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var module_id = button.getAttribute('data-bs-module_id')
            var trail_id = button.getAttribute('data-bs-trail_id')
            var content_id = button.getAttribute('data-bs-content_id')
            var content_title = button.getAttribute('data-bs-content_title')
            var content_description = button.getAttribute('data-bs-content_description')
            var content_time = button.getAttribute('data-bs-content_time')
            var content_type = button.getAttribute('data-bs-content_type')
            var content_by = button.getAttribute('data-bs-content_by')
            var content_subject = button.getAttribute('data-bs-content_subject')
            var content_link = button.getAttribute('data-bs-content_link')

            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var titleInput = updateContentModal.querySelector('#title')
            titleInput.value = content_title

            var descriptionInput = updateContentModal.querySelector('#description')
            descriptionInput.value = content_description

            var timeInput = updateContentModal.querySelector('#time')
            timeInput.value = content_time

            var typeInput = updateContentModal.querySelector('#type')
            typeInput.value = content_type

            var contentByInput = updateContentModal.querySelector('#content_by')
            contentByInput.value = content_by

            var subjectInput = updateContentModal.querySelector('#subject')
            subjectInput.value = content_subject

            var contentLinkInput = updateContentModal.querySelector('#link')
            contentLinkInput.value = content_link

            var route = "{{ route('admin.content.update', [':trail_id', ':module_id', ':content_id']) }}";
            route = route.replace(':trail_id', trail_id);
            route = route.replace(':module_id', module_id)
            route = route.replace(':content_id', content_id)

            var form = updateContentModal.querySelector('#updateContentForm')
            form.action = route

        })
    </script>
@endsection
