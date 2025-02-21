<div x-data="{ agenda: '', priority: '' }">
    <div class="d-flex justify-content-center mt-3">
        <form wire:submit.prevent='store'>
            <div class="row g-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-9 col-9">
                            <input type="text" wire:model='agenda' x-model="agenda" class="form-control" placeholder="Create a new agenda">
                            @error('agenda') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-3 col-3">
                            <button type="submit" class="btn btn-primary mb-3" :disabled="!agenda || !priority">Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pilihan Prioritas -->
            <div class="row">
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" wire:model='priority' x-model='priority' name="priority" type="radio" id="high" value="high">
                        <label class="form-check-label" for="high">High Priority</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" wire:model='priority' x-model='priority' name="priority" type="radio" id="medium" value="medium">
                        <label class="form-check-label" for="medium">Medium Priority</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" wire:model='priority' x-model='priority' name="priority" type="radio" id="low" value="low">
                        <label class="form-check-label" for="low">Low Priority</label>
                    </div>
                </div>
            </div>
            @error('priority') <span class="text-danger">{{ $message }}</span> @enderror
        </form>
    </div>
</div>
