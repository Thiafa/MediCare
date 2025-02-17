<div class="modal fade" id="deleteAtendimento-{{ $atendimento->id }}" tabindex="-1"
    aria-labelledby="deleteAtendimentoLabel-{{ $atendimento->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteAtendimentoLabel-{{ $atendimento->id }}">
                    {{ __('Medico') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('Deseja realmente apagar o registro do atendimento') . " $atendimento->name" }}?
            </div>
            <div class="modal-footer">
                <form action="{{ route('atendimentos.destroy', $atendimento->id) }}" method="POST">
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
