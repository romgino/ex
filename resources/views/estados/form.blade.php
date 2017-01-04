
<form   @if ($formItem->nome == "")
            action="{{url('/estado')}}" method="post"
        @else
            action="{{url('/estado',$formItem->id)}}" method="post" file="true"
        @endif
        >
    {{ csrf_field() }}

    @if($formItem->nome) //teste para update
    {{ method_field('PATCH') }}
    @endif

    <label for="formEstado">Estados: </label>
    <input type="text" name="formEstado" value="{{$formItem->nome}}">

    <label for="formInfor">Descrição:</label>
    <input type="text" name="formInfor" value="{{$formItem->infor}}">


    <input type="submit" value="enviar">
</form>

