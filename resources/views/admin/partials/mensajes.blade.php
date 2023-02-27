@if (session('success'))
    <input type="hidden" name="tipo-mensaje" value="green">
    <input type="hidden" name="texto-mensaje" value="{!! session('success') !!}">
@endif
@if (session('warning'))
    <input type="hidden" name="tipo-mensaje" value="yellow">
    <input type="hidden" name="texto-mensaje" value="{!! session('warning') !!}">
@endif
@if (session('danger'))
    <input type="hidden" name="tipo-mensaje" value="red">
    <input type="hidden" name="texto-mensaje" value="{!! session('danger') !!}">
@endif
@if (session('info'))
    <input type="hidden" name="tipo-mensaje" value="blue">
    <input type="hidden" name="texto-mensaje" value="{!! session('info') !!}">
@endif
@if (session('status'))
    <input type="hidden" name="tipo-mensaje" value="blue">
    <input type="hidden" name="texto-mensaje" value="{!! session('status') !!}">
@endif
