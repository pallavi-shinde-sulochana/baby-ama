<div class="row">
	<div class="col-md-12 text-centre">


		 @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
						  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
						  <p>{{$message}}</p>
					</div>
        @elseif($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
						  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
						  <p>{{$message}}</p>
					</div>
        @endif
	</div>
</div>