<section id="user-crud">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="@if(!$isFormTrue) d-none @endif">
					<livewire:admin.user.form  :type="$type"/>
				</div>
				<div class="@if($isFormTrue) d-none @endif">
					<div class="table-section">
						<div class="row">
							<div class="col-12 text-end mb-5">
								@if($type === 'admin-pharmacy')
									<select wire:model="role" wire:change="changeUserRole" class="btn border border-1 btn-sm border-dark">
										<option value="admin">Admin</option>
										<option value="pharmacy">Pharmacy</option>
									</select>
								@endif
								<button class="btn btn-primary btn-sm" wire:click="$emit('createNewUser')">Add New</button>
							</div>
							<div class="col-12 border border-1 py-5 shadow-sm rounded">
								<div class="py-5">
									<livewire:admin.user.table :role="$role"/>
								</div>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	// User Alert
	window.addEventListener('user:alert', event => { 
	     Swal.fire({
	        title: event.detail.message,
	        icon: event.detail.type
	    })
	});

	document.addEventListener('remove:user',function(e){
		if(confirm('Are you sure you want to delete this item?')){
			Livewire.emit('removeUserData',e['detail']['data'])
		}
	})
</script>
	