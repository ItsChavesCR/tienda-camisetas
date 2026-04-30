@php
    $isEdit = isset($camiseta);
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $camiseta->nombre ?? '') }}" required>
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Version</label>
        <select name="version" class="form-select @error('version') is-invalid @enderror" required>
            @foreach(['fan', 'player', 'retro'] as $version)
                <option value="{{ $version }}" @selected(old('version', $camiseta->version ?? '') === $version)>{{ ucfirst($version) }}</option>
            @endforeach
        </select>
        @error('version') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Descripcion</label>
        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $camiseta->descripcion ?? '') }}</textarea>
        @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Genero</label>
        <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror" value="{{ old('genero', $camiseta->genero ?? '') }}" required>
        @error('genero') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Temporada</label>
        <input type="text" name="temporada" class="form-control @error('temporada') is-invalid @enderror" value="{{ old('temporada', $camiseta->temporada ?? '') }}" required>
        @error('temporada') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $camiseta->precio ?? '') }}" required>
        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Material</label>
        <input type="text" name="material" class="form-control @error('material') is-invalid @enderror" value="{{ old('material', $camiseta->material ?? '') }}" required>
        @error('material') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Tipo de Manga</label>
        <input type="text" name="tipo_manga" class="form-control @error('tipo_manga') is-invalid @enderror" value="{{ old('tipo_manga', $camiseta->tipo_manga ?? '') }}" required>
        @error('tipo_manga') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Numero</label>
        <input type="number" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero', $camiseta->numero ?? '') }}">
        @error('numero') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Imagen URL</label>
        <input type="url" name="imagen_url" class="form-control @error('imagen_url') is-invalid @enderror" placeholder="https://..." value="{{ old('imagen_url', $camiseta->imagen_url ?? '') }}">
        @error('imagen_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Categoria</label>
        <select name="id_categoria" class="form-select @error('id_categoria') is-invalid @enderror" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}" @selected((int) old('id_categoria', $camiseta->id_categoria ?? 0) === $categoria->id_categoria)>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @error('id_categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Marca</label>
        <select name="id_marca" class="form-select @error('id_marca') is-invalid @enderror" required>
            @foreach($marcas as $marca)
                <option value="{{ $marca->id_marca }}" @selected((int) old('id_marca', $camiseta->id_marca ?? 0) === $marca->id_marca)>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
        @error('id_marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Equipo</label>
        <select name="id_equipo" class="form-select @error('id_equipo') is-invalid @enderror" required>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id_equipo }}" @selected((int) old('id_equipo', $camiseta->id_equipo ?? 0) === $equipo->id_equipo)>
                    {{ $equipo->nombre }} ({{ $equipo->liga->nombre }})
                </option>
            @endforeach
        </select>
        @error('id_equipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-8">
        <label class="form-label">Tallas</label>
        @php
            $selectedTallas = old('tallas', $isEdit ? $camiseta->tallas->pluck('id_talla')->toArray() : []);
        @endphp
        <div class="d-flex flex-wrap gap-3">
            @foreach($tallas as $talla)
                <div class="form-check">
                    <input class="form-check-input @error('tallas') is-invalid @enderror" type="checkbox" name="tallas[]" value="{{ $talla->id_talla }}" id="talla{{ $talla->id_talla }}" @checked(in_array($talla->id_talla, $selectedTallas))>
                    <label class="form-check-label" for="talla{{ $talla->id_talla }}">{{ $talla->codigo }}</label>
                </div>
            @endforeach
        </div>
        @error('tallas') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4 d-flex justify-content-end gap-2">
    <a href="{{ route('camisetas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Actualizar' : 'Guardar' }}</button>
</div>
