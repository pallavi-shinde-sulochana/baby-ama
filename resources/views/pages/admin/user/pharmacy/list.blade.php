<x-base-layout>
	

	<section>
    	<div class="container">
    		<a class="btn btn-primary" href="{{route('pharmacy.users.add.pharmacy')}}">Add New </a>
        </div>
    </section>
    <div class="p-6 bg-white border-b border-gray-200">
	 <livewire:pharmacy-table/>
    </div>
</x-base-layout>