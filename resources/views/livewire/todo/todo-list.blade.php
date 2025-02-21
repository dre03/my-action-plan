<div>
    <div class="container">
        <div class="d-flex justify-content-center flex-column">
            <h1 class="mt-5 text-center">My Action Plan</h1>
            <p class="text-center">Keep yourself organized and be productive</p>
        </div>
        {{-- form --}}
        <livewire:todo.todo-create>
            <div class="row d-flex justify-content-center mt-3">
                <div class="d-inline-flex justify-content-center">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </div>
                <div class="col-md-6 col-sm-12">
                    @forelse ($todos as $todo)
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="d-inline-flex @if ($todo->priority == 'high') bg-danger border-danger
                                @elseif($todo->priority == 'medium')
                                    bg-primary
                                @elseif($todo->priority == 'low')
                                    bg-success @endif rounded border-4 bg-opacity-25 p-2">
                                        <span
                                            class="@if ($todo->priority == 'high') @else text-dark @endif text-danger fw-bold">
                                            {{ $todo->priority }}
                                        </span>
                                    </div>
                                    <div class="float-end">
                                        <button wire:click="edit({{ $todo->id }}, '{{ $todo->agenda }}')" class="btn btn-light btn-sm"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" wire:click='delete({{ $todo->id }})'
                                            wire:confirm="Apakah Kamu Yakin?" class="btn btn-light btn-sm"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        wire:click="completed({{ $todo->id }})"
                                        {{ $todo->status == 'completed' ? 'checked' : '' }}>
                                    
                                    @if ($editingTodoId === $todo->id)
                                        <input type="text" wire:model="agenda" 
                                            wire:keydown.enter="update"
                                            wire:blur="update"
                                            class="form-control form-control-sm">
                                    @else
                                        <span>{{ $todo->agenda }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-secondary mt-2 text-center">
                            There is no agenda yet, please add one first...
                        </div>
                    @endforelse
                </div>
            </div>
    </div>
</div>
