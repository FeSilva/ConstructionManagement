<x-jet-form-section submit="updateTeamName">
  <x-slot name="title">
    {{ __($team->name) }}
  </x-slot>

  <x-slot name="description">
    {{ __('The team\'s name and owner information.') }}
  </x-slot>

  <x-slot name="form">
    <x-jet-action-message on="saved">
      {{ __('Informações Foram Salvar com Sucesso.') }}
    </x-jet-action-message>

    <!-- Team Owner Information -->
    <div class="mb-2">
      <x-jet-label class="form-label" value="{{ __('Próprietário') }}" />

      <div class="d-flex mt-1">
        <img class="rounded-circle me-1" width="48" src="{{ $team->owner->profile_photo_url }}">
        <div>
          <div>{{ $team->owner->name }}</div>
          <div class="text-muted">{{ $team->owner->email }}</div>
        </div>
      </div>
    </div>

    <!-- Team Photo -->
  
    <x-jet-label class="form-label" value="{{ __('Informações do Grupo') }}" />

    <div class="mb-1" x-data="{photoName: null, photoPreview: null}">
      <!-- Team Photo File Input -->
      <input type="file" hidden wire:model="photo" x-ref="photo"
        x-on:click="photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

      <!-- Current Team Photo -->
      <div class="mt-2" x-show="! photoPreview">
        <img src="{{ $this->team->profile_photo_path }}" class="rounded-circle" height="80px" width="80px" >
      </div>

      <!-- New Team Photo Preview -->
      <div class="mt-2" x-show="photoPreview">
        <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
      </div>

      <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
        {{ __('Selecionar Uma Nova Foto') }}
      </x-jet-secondary-button>

      @if ($this->team->profile_photo_path)
        <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
          {{ __('Remover Foto') }}
        </button>
      @endif

      <x-jet-input-error for="photo" class="mt-2" />
    </div>
 
 
    <!-- Team Name -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="name" value="{{ __('Grupo') }}" />
        <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        wire:model.defer="state.name" :disabled="! Gate::check('update', $team)" />
      <x-jet-input-error for="name" />
    </div>

    <div class="mb-1">
      <x-jet-label class="form-label" for="phone" value="{{ __('Telefone') }}" />
        <x-jet-input id="phone" type="text" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
        wire:model.defer="state.phone" :disabled="! Gate::check('update', $team)" />
      <x-jet-input-error for="phone" />
    </div>

    <div class="mb-1">
      <x-jet-label class="form-label" for="zipcode" value="{{ __('CEP') }}" />
        <x-jet-input id="zipcode" type="text" class="{{ $errors->has('zipcode') ? 'is-invalid' : '' }}"
        wire:model.defer="state.zipcode" :disabled="! Gate::check('update', $team)" />
      <x-jet-input-error for="zipcode" />
    </div>


  
  </x-slot>

  @if (Gate::check('update', $team))
    <x-slot name="actions">
      <div class="d-flex align-items-baseline">
        <x-jet-button>
          {{ __('Salvar') }}
        </x-jet-button>
      </div>
    </x-slot>
  @endif
</x-jet-form-section>
