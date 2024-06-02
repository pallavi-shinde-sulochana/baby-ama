@extends('base.noDashboard')



	
	{{-- {{getUMRONo();}} --}}
	{{-- @if($errors->any())
	    {{ implode('', $errors->all('<div>:message</div>')) }}
	@endif --}}
	<section >
    	<div class="container">
        	<div class="row">
        		<div class="col-md-12 text-center">
        			<h1>Oops!, you don't have a permission to view this page </h1>
        			<div class="row ">
        				<div class="col-md-10 p-5">
        					
        					<a class="btn btn-info" href="{{route('admin.index')}}">Back to Dashbaord</a> <br>
        				</div>
        				<div class="col-md-10 p-5">
        					<a class="btn btn-danger" href="{{route('logout')}}">Logout</a> 
        					
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </section>
