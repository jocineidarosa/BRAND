            @if (isset($veiculo->id))
                <form action="{{ route('veiculo.update', ['veiculo' => $veiculo->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                @else
                    <form action="{{ route('veiculo.store') }}" method="POST">
                        @csrf
            @endif
            
            <div class="row mb-1">
                <label for="placa" class="col-md-4 col-form-label text-md-end text-right">Placa Veículo</label>
                <div class="col-md-6">
                    <input id="placa" name="placa" type="text" class="form-control-template" placa="placa"
                        value="{{ $veiculo->placa ?? old('placa') }}" required autocomplete="placa">
                    {{ $errors->has('placa') ? $errors->first('placa') : '' }}
                </div>
            </div>

            <div class="row mb-1">
                <label for="tipo_veiculo" class="col-md-4 col-form-label text-md-end text-right">Placa</label>
                <div class="col-md-6">
                    <select name="tipo_veiculo" id="" class="form-control-template">
                        <option value=""> --Selecione a placa--</option>
                        @foreach ($veiculos as $veiculo)
                            <option value="{{ $veiculo->id }}"
                                {{ ($veiculo->tipo_veiculo ?? old('tipo_veiculo')) == $veiculo->id ? 'selected' : '' }}>
                                {{ $veiculo->nome }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('tipo_veiculo') ? $errors->first('tipo_veiculo') : '' }}
                </div>
            </div>

            <div class="row mb-1">
                <label for="funcionario_id" class="col-md-4 col-form-label text-md-end text-right">Motorista</label>
                <div class="col-md-6">
                    <select name="funcionario_id" id="" class="form-control-template">
                        <option value=""> --Selecione a Motorista--</option>
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{ $funcionario->id }}"
                                {{ ($funcionario->funcionario_id ?? old('funcionario_id')) == $funcionario->id ? 'selected' : '' }}>
                                {{ $funcionario->nome }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('funcionario_id') ? $errors->first('funcionario_id') : '' }}
                </div>
            </div>  

            <div class="row mb-1">
                <label for="observacao" class="col-md-4 col-form-label text-md-end text-right">Observacao</label>
                <div class="col-md-6">
                    <input id="observacao" name="observacao" type="text" class="form-control-template" observacao="observacao"
                        value="{{ $veiculo->observacao ?? old('observacao') }}" required autocomplete="observacao">
                    {{ $errors->has('observacao') ? $errors->first('observacao') : '' }}
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($veiculo) ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </div>
            </div>
            </form>
