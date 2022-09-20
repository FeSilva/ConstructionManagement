<x-jet-form-section submit="updateProfileInformation">
  <x-slot name="title">
    {{ __('Informações do Perfil') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Update your account\'s profile information and email address.') }}
  </x-slot>

  <x-slot name="form">

    <x-jet-action-message on="saved">
      {{ __('Saved.') }}
    </x-jet-action-message>

    <!-- Profile Photo -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
      <div class="mb-1" x-data="{photoName: null, photoPreview: null}">
        <!-- Profile Photo File Input -->
        <input type="file" hidden wire:model="photo" x-ref="photo"
          x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
          <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
          <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
        </div>

        <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
          {{ __('Selecionar Uma Nova Foto') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
          <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
            {{ __('Remover Foto') }}
          </button>
        @endif

        <x-jet-input-error for="photo" class="mt-2" />
      </div>
    @endif

    <!-- Name -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="name" value="{{ __('Nome Completo') }}" />
      <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        wire:model.defer="state.name" autocomplete="name" />
      <x-jet-input-error for="name" />
    </div>

    <!-- Email -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="email" value="{{ __('E-mail') }}" />
      <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
        wire:model.defer="state.email" />
      <x-jet-input-error for="email" />
    </div>

     <!-- CPF/CNPJ -->
    <div class="mb-1">
      <x-jet-label class="form-label" for="tax_id" value="{{ __('CPF/CNPJ') }}" />
      <x-jet-input id="tax_id" type="tax_id" class="{{ $errors->has('tax_id') ? 'is-invalid' : '' }}"
        wire:model.defer="state.tax_id" />
      <x-jet-input-error for="tax_id" />
    </div>
       <!-- CPF/CNPJ -->
    <div class="mb-1">
        <x-jet-label class="form-label" for="phone" value="{{ __('Telefone') }}" />
        <x-jet-input id="phone" type="phone" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
          wire:model.defer="state.phone" />
        <x-jet-input-error for="phone" />
    </div>
  </x-slot>

  <x-slot name="actions">
    <div class="d-flex align-items-baseline">
      <x-jet-button>
        {{ __('Save') }}
      </x-jet-button>
    </div>
  </x-slot>
</x-jet-form-section>
