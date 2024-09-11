{{html()->form('POST', route('menus.store'))->open()}}
    @csrf

    {{-- Menu Name --}}
    <div class="form-group mb-3">
        {{ html()->label('Menu Name', 'name') }}
        {{ html()->text('name')
            ->class('form-control' . ($errors->has('name') ? ' is-invalid' : ''))

            ->required() }}
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Route --}}
    <div class="form-group mb-3">
        {{ html()->label('Route', 'route') }}
        {{ html()->text('route')
            ->class('form-control' . ($errors->has('route') ? ' is-invalid' : ''))

            ->required() }}
        @error('route')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Icon --}}
    <div class="form-group mb-3">
        {{ html()->label('Icon', 'icon')}}
        {{html()->text('icon')
            ->class('form-control' . ($errors->has('icon') ? ' is-invalid' : ''))

            ->required() }}
        @error('icon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Sort Order --}}
    <div class="form-group mb-3">
        {{ html()->label('Sort Order', 'sort_order') }}
        {{ html()->number('sort_order')
            ->class('form-control' . ($errors->has('sort_order') ? ' is-invalid' : ''))

            ->required() }}
        @error('sort_order')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Status --}}
    <div class="form-group mb-3">
        {{ html()->label('Status', 'status') }}
        {{ html()->select('status', [
                '1' => 'Active',
                '2' => 'Inactive'
            ])
            ->class('form-control' . ($errors->has('status') ? ' is-invalid' : ''))
           
            ->required() }}
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


{{ html()->form()->close()}}
