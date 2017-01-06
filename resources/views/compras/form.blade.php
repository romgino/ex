<form   @if ($formItem->id == "")
                  action="{{url('/compra')}}" method="post"
                  @else
                  action="{{url('/compra',$formItem->id)}}" method="post" file="true"
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

    {{ Form::label('formNota', 'Nota fiscal: ', ['class' => 'control-label']) }}
    {{ Form::text('formNota', $formItem->notafiscal, ['class' => 'form-control']) }}

    {{ Form::label('formDataentreda', 'Data de Entrada: ', ['class' => 'control-label']) }}
    {{ Form::DateTime('formDataentrada', $formItem->dataentrada, ['class' => 'form-control']) }}

    {{ Form::label('formGarantia', 'Data da garantia: ', ['class' => 'control-label']) }}
    {{ Form::DateTime('formGarantia', $formItem->garantia, ['class' => 'form-control']) }}

    {{Form::label('formTipo','Tipo do item:', ['class' => 'control-label'])}}
    <small style="color:#ff0000">{{$errors->first('formTipo')}}</small>
    {{Form::select('formTipo', $listTipo, $formItem->tipo_id, ['placeholder' => 'selecione..','class'=>'form-control'])}}

    {{Form::label('formPedido','Viculo de pedido:', ['class' => 'control-label'])}}
    <small style="color:#ff0000">{{$errors->first('formPedido')}}</small>
    {{Form::select('formPedido', $listPedido, $formItem->tipo_id, ['placeholder' => 'selecione..','class'=>'form-control'])}}


    {{ Form::label('formQtd', 'Quantidade: ', ['class' => 'control-label']) }}
    <small style="color:red">{{$errors->first('formQtd')}}</small>
    {{ Form::number('formQtd', $formItem->qtd, ['class' => 'form-control']) }}

    {{ Form::label('formObs', 'Observações: ', ['class' => 'control-label']) }}
    {{ Form::textArea('formObs', $formItem->obs, ['class' => 'form-control']) }}


    <input type="submit" value="enviar">
</form>