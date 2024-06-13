<x-base-layout>

    <section>
        <div class="container">

            <div class="row ">
                <div class="col-md-12 row">
                    <div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body py-3 px-5">

                            @include('pages.admin.patient._appointment-billing-details')

                            <hr />

                            @include('pages.admin.patient._appointment-billing-figmadetails')


                            <hr />
                            <div class="row p-2">
                                <div class="col-md-12 mb-4">
                                    <h3>Fees Summery</h3>
                                </div>
                                <div class="col-12">
                                    <form method="POST" action="{{route('admin.patients.appointments.billing.save')}}">
                                        @csrf
                                        <input type="hidden" name="appoinment_id" value="{{$appointment->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="doctor_fee" class="form-label">Doctor Fees</label>
                                                <input type="text" class="form-control" id="doctor_fee"
                                                    name="doctor_fee"
                                                    value="{{old('doctor_fee', $appointment->doctor_fee)}}"
                                                    placeholder="Enter here">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="consultant_fee" class="form-label">Other Consulting
                                                    Charges</label>
                                                <input type="text" class="form-control" id="consultant_fee"
                                                    name="consultant_fee"
                                                    value="{{old('consultant_fee', $appointment->consultant_fee)}}"
                                                    placeholder="Enter here">
                                            </div>


                                            <div class="col-12 mt-2 ">
                                                <label for="notes" class="form-label">Notes</label>
                                                <textarea class="form-control" id="notes" rows="3" name="notes"
                                                    placeholder="Type here">{{old('notes', $appointment->notes)}}</textarea>
                                            </div>

                                            <div class="col-12 mt-2 mb-12">
                                                <button type="button" id="addDoctorButton" class="btn btn-link ">Add
                                                    Doctor +
                                                </button>
                                            </div>

                                            <div class="col-md-6 mb-12" id="doctorFields" style="display: none;">
                                                <label for="doctor_id" class="form-label">Doctor Name</label>
                                                <select class="form-control" id="doctor_id" name="doctor_id">
                                                    <option value="">Select a doctor</option>
                                                    @foreach($doctorlist as $id => $name)
                                                    <option value="{{ $id }}" {{ old('doctor_id', $appointment->
                                                        doctor_id) == $id ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-12" id="specialistFields" style="display: none;">
                                                <label for="specialists" class="form-label">Specialist In</label>
                                                <select class="form-control" id="specialists" name="specialists">
                                                    <option value="">Select a specialist type</option>
                                                    @foreach($specialistTypes as $specialistType)
                                                    <option value="{{ $specialistType }}" {{ old('specialists',
                                                        $appointment->specialists) == $specialistType ?
                                                        'selected' : ''
                                                        }}>
                                                        {{ $specialistType }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-12" id="fees" style="display: none;">
                                                <label for="fees" class="form-label">Fess</label>
                                                <input type="text" class="form-control" id="fees"
                                                    name="doctor_fee"
                                                    value="{{old('fees', $appointment->fees)}}"
                                                    placeholder="Enter here">
                                            </div>
                                            </div>

                                            <hr />

                                            <div class="col-12 mt-5 text-center">
                                                <a class="btn btn-secondary"
                                                    href="{{route('admin.patients.appointments')}}">Back</a>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <a class="btn btn-danger ms-2"
                                                    href="{{route('admin.print.appointment.billing',['appoinment' => $appointment->id])}}"
                                                    target="_blank">Print Appointment</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            {{-- <div class="row p-5">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-secondary"
                                        href="{{route('admin.patients.appointments')}}">Back</a>
                                    <a class="btn btn-danger ms-2"
                                        href="{{route('admin.print.appointment.billing',['appoinment' => $appointment->id])}}"
                                        target="_blank">Print Appointment</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="p-6 bg-white border-b border-gray-200">

        {{--
        <livewire:appoinment-table /> --}}
    </div>



</x-base-layout>
<script>
    document.getElementById('addDoctorButton').addEventListener('click', function() {
        var doctorFields = document.getElementById('doctorFields');
        var specialistFields = document.getElementById('specialistFields');
        var fees = document.getElementById('fees');
        var saveButton = document.getElementById('saveButton');

        if (doctorFields.style.display === 'none') {
            doctorFields.style.display = 'block';
            specialistFields.style.display = 'block';
            fees.style.display = 'block';
            saveButton.style.display = 'block';
            this.textContent = 'Hide Doctor Fields';
        } else {
            doctorFields.style.display = 'none';
            specialistFields.style.display = 'none';
            fees.style.display = 'none';
            saveButton.style.display = 'none';
            this.textContent = 'Add Doctor';
        }
    });
</script>
