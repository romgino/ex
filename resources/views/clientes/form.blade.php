{{$formItem->nome}}
<form 
        @if($formItem == "") action="{{ url('/cliente') }}"
        @else action="{{ url('/cliente',$formItem->id) }}"
        @endif
        method="post">
    {{ csrf_field() }}
    @if($formItem->nome) //teste para update
    {{ method_field('PATCH') }}
    @endif
    <input type="hidden" name="_user"  value="{{ Auth::user()->name }}" placeholder="">
    <label for="formCpf">CPF: </label>
    <input type="text" name="formCpf" value="{{$formItem->cpf}}">

    <label for="formNome">Nome: </label>
    <input type="text" name="formNome" value="{{ $formItem->nome }}">

    <label for="formEndereco">Endereço:</label>
    <input type="text" name="formEndereco" value="{{ $formItem->endereco }}">

    <label for="formBairro">Bairro:</label>
    <input type="text" name="formBairro" value="{{ $formItem->bairro }}">

    <label for="formCidade">Cidade:</label>
    <input type="text" name="formCidade" value="{{ $formItem->cidade }}">

    <label for="formUf">UF:</label>
    <input type="text" name="formUf" value="{{ $formItem->uf }}">

    <label for="formCep">CEP:</label>
    <input type="text" name="formCep" value="{{ $formItem->cep }}">

    <label for="formContato">Contato:</label>
    <input type="text" name="formContato" value="{{ $formItem->contato }}">

    <label for="formFone">Fone:</label>
    <input type="text" name="formFone" value="{{ $formItem->fone }}">

    <label for="formEmail">Email:</label>
    <input type="text" name="formEmail" value="{{ $formItem->email }}">

    <label for="formContato2">2 - Contato:</label>
    <input type="text" name="formContato2" value="{{ $formItem->contato2 }}">

    <label for="formFone2">2 - Fone:</label>
    <input type="text" name="formFone2" value="{{ $formItem->fone2 }}">

    <label for="formEmail2">2 - Email: </label>
    <input type="text" name="formEmail2" value="{{ $formItem->email2 }}">

    <label for="formObs">Observações: </label>
    <textarea name="formObs" id="" cols="30" rows="5" value="{{ $formItem->obs }}" placeholder="{{ $formItem->obs }}">{{ $formItem->obs }}</textarea>
    <input type="submit" value="enviar">
    </form>