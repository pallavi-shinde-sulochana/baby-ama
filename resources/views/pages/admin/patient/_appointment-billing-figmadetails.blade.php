<div class="row p-2">
    <div class="col-md-6 mb-12">
        <label for="doctor_id" class="form-label">Doctor Name</label>
        <select class="form-control" id="doctor_id" >
            <option value="">Select a doctor</option>
            @foreach($doctorlist as $id => $name)
            <option value="{{ $id }}">
                {{ $name }}
            </option>
            @endforeach
        </select>
    </div>
</div>
