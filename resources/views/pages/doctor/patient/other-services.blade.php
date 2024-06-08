@extends('base.doctor-dashboard')
@section('doctor-content')

@php
use App\Models\Appoinment;
$appointment = $appoinment;
$id = $appointment->id;
@endphp

<section class="doctor-patinet-appointment pt-5">
    <div class="header mb-5">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-absolute">
                <a href="{{ route('doctor.appointment.patient', $id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M12.7599 25.0934C12.5066 25.0934 12.2533 25 12.0533 24.8L3.95992 16.7067C3.57326 16.32 3.57326 15.68 3.95992 15.2934L12.0533 7.20003C12.4399 6.81337 13.0799 6.81337 13.4666 7.20003C13.8533 7.5867 13.8533 8.2267 13.4666 8.61337L6.07992 16L13.4666 23.3867C13.8533 23.7734 13.8533 24.4134 13.4666 24.8C13.2799 25 13.0133 25.0934 12.7599 25.0934Z"
                            fill="#344054" />
                        <path
                            d="M27.3336 17H4.89355C4.34689 17 3.89355 16.5467 3.89355 16C3.89355 15.4533 4.34689 15 4.89355 15H27.3336C27.8802 15 28.3336 15.4533 28.3336 16C28.3336 16.5467 27.8802 17 27.3336 17Z"
                            fill="#344054" />
                    </svg>
                </a>
            </div>
            <div class="col-11 text-center">
                <h2 class="mb-0">Other Services</h2>
            </div>
        </div>
    </div>

    {{-- Common Patient Profile Start --}}
    @include('pages.doctor.patient.common-patient-profile')

    <div class="row py-5 my-5 mx-0 pediatric-form-fields">
        <div id="other_services" class="col-12 col-lg-8">
            @foreach($notes as $note)
            {{-- Retrieve the appointment associated with the current other service --}}
            @php
            $associatedAppointment = Appoinment::find($note->appointment_id);
            @endphp

            {{-- Display the name of the doctor for the associated appointment --}}
            <div class="mb-8 note-container">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="note_{{ $note->id }}" class="form-label">
                        {{ $associatedAppointment->doctor->first_name . ' ' . $associatedAppointment->doctor->last_name
                        }}
                    </label>
                </div>
                <div class="d-flex gap-2 ">
                    <div class="card bg-transparant border-secondary border"
                        style="height: 100px; width: 100%; padding: 10px;">
                        {{ $note->notes }}
                    </div>

                    @if(Auth::check() && Auth::user()->id === $note->doctor_id)
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle rounded-circle bg-transparent border"
                            type="button" id="dropdownMenuButton_{{ $note->id }}" data-bs-toggle="dropdown"
                            aria-expanded="false" style="width: 30px; height: 30px; padding: 0;">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $note->id }}">
                            <li><a class="dropdown-item"
                                    href="{{ route('doctor.patient.other_services.edit', ['appoinment' => $appointment->id, 'patient' => $patient->id, 'note' => $note->id]) }}">Edit
                                    the Note</a>
                            </li>
                            <li>
                                <form
                                    action="{{ route('doctor.patient.other_services.delete', ['patient' => $patient->id, 'note' => $note->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this note?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Delete the Note</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="text-muted small text-end">Created at: {{ $note->created_at }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <a type="button" class="baby-add-new-btn"
        href="{{ route('doctor.patient.other_services.note', ['appoinment' => $appointment->id, 'patient' => $user->patient->id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
            <path
                d="M18.334 21.6654H8.33398V18.332H18.334V8.33203H21.6673V18.332H31.6673V21.6654H21.6673V31.6654H18.334V21.6654Z"
                fill="white"></path>
        </svg>
    </a>
</section>

@endsection
<script>
    function deleteNote(noteId) {
        if (confirm('Are you sure you want to delete this note?')) {
            $.ajax({
                url: '/patient/{{ $patient->id }}/other_services/' + noteId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Remove the note from the view
                    $('#note_' + noteId).remove();
                    alert('Note deleted successfully.');
                },
                error: function(xhr) {
                    alert('Failed to delete note.');
                }
            });
        }
    }
</script>

<style>
    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu {
        min-width: auto;
    }

    .btn-secondary {
        background-color: transparent !important;
        border: 1px solid #000 !important;
    }

    .btn-secondary .bi-chevron-down {
        color: #000;
    }

    .note-container:hover .btn-secondary {
        visibility: visible;
    }

    .btn-secondary {
        visibility: hidden;
    }
</style>
