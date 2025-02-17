<div class="modal fade" id="deleteMedicoModal-{{ $medico->id }}" tabindex="-1"
    aria-labelledby="deleteMedicoModalLabel-{{ $medico->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteMedicoModalLabel-{{ $medico->id }}">
                    {{ __('Medico') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('Deseja realmente apagar o registro do medico') . " $medico->name" }}?
            </div>
            <div class="modal-footer">
                <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-primary" type="submit">{{ __('Deletar') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
