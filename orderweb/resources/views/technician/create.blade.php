@extends('templates.base')
@section('title', 'Crear técnico')
@section('header', 'Crear técnico')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="" method="post">
            @csrf
            <div class="row form-group">
                <div class="col-lg-6 mb-4">
                    <label for="document">Documento</label>
                    <input type="number" class="form-control" name="document" id="document" required>
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>
                <div class="row form-group">
                <div class="col-lg-6 mb-4">
                    <label for="especiality">Especialidad</label>
                    <input type="text" class="form-control" name="especiality" id="especiality" required>
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="phone">Teléfono</label>
                    <input type="number" class="form-control" name="phone" id="phone" required>
                </div>
                </div>
            </div>


            </div>
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <br><br>
                <div class="col-lg-6">
                    <a href="{{ route('technician.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
