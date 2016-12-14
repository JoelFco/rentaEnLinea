@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<h2 class="text-center">Escoge tu membresia</h2>

		<form action="{{url('/guardarMembresia')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            

                                			<h3>Gold</h3>
                                            <input type="radio" value="1" name="membresia" required>

                                            <h3>Normal</h3>
                                            <input type="radio" value="0" name="membresia" required>

                                     

                                 <p>
                                <input type="submit" value="Cambiar" class="btn btn-warning">
                                </p>

                            </form>

	</div>
</div>

@endsection