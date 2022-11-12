@extends('admin.layouts.app')

@section('content')


    @if (isset($trails))
    <button class="btn btn-primary" type="submit">Nova Trilha</button>
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
                @foreach ($trails as $key => $trail)
                    <tr>
                        <th scope="row">{{ $trail->title }}</th>
                        <td>{{ $trail->description }}</td>
                        <td>{{ $trail->time }}</td>
                        <td>
                            <a href="{{ route('admin.module.index', ['trail' => $trail]) }}">Módulos</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateTrailModal" data-bs-trail_id="{{ $trail->id }}"
                                data-bs-trail_title="{{ $trail->title }}"
                                data-bs-trail_description="{{ $trail->description }}"
                                data-bs-trail_time="{{ $trail->time }}" data-bs-trail_by="{{ $trail->trail_by }}">
                                Editar
                            </button>
                            <form id="trail_form_delete" action="{{ route('admin.trail.destroy', ['trail' => $trail]) }}"
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
        {{-- <ul>
        @foreach ($trails as $trail)
            <li>
                {{ $trail->title }}
                <button><a href="{{ route('admin.trail.show', $trail->id) }}">Detalhes</a></button>
            </li>
        @endforeach
    </ul> --}}


        @if (isset($message))
            <p>{{ $message }}</p>
        @endif

        {{-- Modal cadastro de novo admin --}}
        <div class="modal fade" id="updateTrailModal" tabindex="-1" aria-labelledby="updateTrailModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateTrailModal">Registro de novo Admin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="card-body">
                        <form id="updateTrailForm" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <input id="title" type="text" name="title">

                            <br>
                            <input id="description" type="text" name="description" value="{{ $trail->description }}">

                            <br>
                            <input id="time" type="time" name="time" value="{{ $trail->time }}">

                            <br>
                            <input id="trail_by" type="text" name="trail_by" value="{{ $trail->trail_by }}">


                            <br>
                            <button type="submit">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
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
