<form   @if ($formItem->id == "")
        action="{{url('/comprapedido')}}" method="post"
        @else
        action="{{url('/comprapedido',$formItem->id)}}" method="post" file="true"
        @endif
>
    {{ csrf_field() }}

    @if($formItem->id) //teste para update
    {{ method_field('PATCH') }}
    @endif
    <input type="hidden" name="_user"  value="{{ Auth::user()->id }}">
    <input type="hidden" name="user"  value="{{ Auth::user()->name }}">





    {{ Form::label('formRef', 'Ref: ', ['class' => 'control-label']) }}
    {{ Form::text('formRef', $formItem->ref, ['class' => 'form-control']) }}




    {{Form::label('formTipo','Tipo do item:', ['class' => 'control-label'])}}
    <small style="color:#ff0000">{{$errors->first('formTipo')}}</small>
    {{Form::select('formTipo', $listTipo, $formItem->tipo_id, ['placeholder' => 'selecione..','class'=>'form-control'])}}

    {{ Form::label('formQtd', 'Quantidade: ', ['class' => 'control-label']) }}
    <small style="color:red">{{$errors->first('formQtd')}}</small>
    {{ Form::number('formQtd', $formItem->qtd, ['class' => 'form-control']) }}

    {{ Form::label('formObs', 'Observações: ', ['class' => 'control-label']) }}
    {{ Form::textArea('formObs', $formItem->obs, ['class' => 'form-control']) }}


    <input type="submit" value="enviar">
</form>