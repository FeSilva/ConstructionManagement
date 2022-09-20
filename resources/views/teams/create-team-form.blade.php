<x-jet-form-section submit="createTeam">
  <x-slot name="title">
    {{ __('Detalhes do Grupo') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Ao criar uma Equipe é possivel Atribuir Colaboradores, Serviços e Produtos a essa equipe.') }}
  </x-slot>

  <x-slot name="form">
    <div class="mb-1">
      <x-jet-label class="form-label" value="{{ __('Responsável Pelo Grupo') }}" />    
      <div class="d-flex mt-2">
        <img class="rounded-circle" width="48" src="{{ $this->user->profile_photo_url }}">

        <div class="ms-2">
          <div>{{ $this->user->name }}</div>
          <div class="text-muted">{{ $this->user->email }}</div>
        </div>
      </div>
    </div>

     
    <div class="mb-1">
      <x-jet-label class="form-label" for="name" value="{{ __('Nome da Equipe') }}" />
      <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        wire:model.defer="state.name" autofocus />
      <x-jet-input-error for="name" />
    </div>

    <div class="mb-1">
      <x-jet-label class="form-label" for="phone" value="{{ __('Telefone') }}" />
        <x-jet-input id="phone" type="text" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
        wire:model.defer="state.phone"  />
      <x-jet-input-error for="phone" />

      <div class="mb-2">
        <x-jet-label class="form-label" for="zipcode" value="{{ __('CEP') }}" />
          <x-jet-input id="zipcode" type="text" class="{{ $errors->has('zipcode') ? 'is-invalid' : '' }}"
          wire:model.defer="state.zipcode" />
        <x-jet-input-error for="zipcode" />
      </div>
    </div>

  </x-slot>

  <x-slot name="actions">
    <x-jet-button>
      {{ __('Salvar Grupo') }}
    </x-jet-button>
  </x-slot>
</x-jet-form-section>
