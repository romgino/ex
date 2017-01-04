<form   @if ($formItem->nome == "")
        action="{{url('/tipo')}}" method="post"
        @else
        action="{{url('/tipo',$formItem->id)}}" method="post" file="true"
        @endif
>
    {{ csrf_field() }}

    @if($formItem->nome) //teste para update
    {{ method_field('PATCH') }}
    @endif

    <label for="formNome">material: </label>
    <input type="text" name="formNome" value="{{$formItem->nome}}">

    <label for="formInfor">Descrição:</label>
    <input type="text" name="formInfo" value="{{$formItem->info}}">


    <input type="submit" value="enviar">
</form>
