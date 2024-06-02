@extends('base.doctor-dashboard')
@section('doctor-content')
    @php
        $appointment = $appoinment;
        $get = isset($getdata->dental) ? json_decode($getdata->dental) : [];
        $id = $appointment->id;

    @endphp

    <section class="doctor-patinet-appointment pt-5">
        <style>
            @media (min-width:768px){
                .doctor-patinet-appointment .field-with-suffix .form-label {
                    min-width: 260px;
                }
            }
        </style>
        <section class="doctor-patinet-appointment pt-5">
            <div class="header ">
                <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                    <div class="col-1 position-absolute">
                        <a href="{{ route('doctor.appointment.patient', $id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
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
                        <h2 class="mb-0">Paediatric Dental Case Record</h2>
                    </div>
                </div>
            </div>

            {{-- Common Patient Profile Start --}}
            @include('pages.doctor.patient.common-patient-profile')
            {{-- Common Patient Profile Start --}}


            <form action="{{ route('doctor.patient.dental.post', $patient->id) }}" method="POST">
                @csrf
                <input type="hidden" name="app_status" value="{{ $app_status }}">
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">

                <div class="row py-5 my-5 pediatric-form-fields  dental-form mx-0">
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Chief Complaints" class="form-label mx-0 mx-0">CHIEF COMPLAINTS :</label>
                        <textarea class="form-control ms-1" id="chief_complaint" name="chief_complaints"><?php if (isset($get->chief_complaints)) {
                            echo $get->chief_complaints;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="H/O Presenting illness" class="form-label mx-0 mx-0">HISTORY OF PRESENTING ILLNESS
                            :</label>
                        <textarea class="form-control ms-1" id="h_o_presenting_illness" name="h_o_presenting_illness"><?php if (isset($get->h_o_presenting_illness)) {
                            echo $get->h_o_presenting_illness;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Medical History" class="form-label mx-0 mx-0">PAST MEDICAL HISTORY :</label>
                        <textarea class="form-control ms-1" id="medical_history" name="medical_history"><?php if (isset($get->medical_history)) {
                            echo $get->medical_history;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Dental History :" class="form-label mx-0 mx-0">DENTAL HISTORY : </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="1. Is this the child’s first visit to the dentist?" class="form-label mx-0">1. Is this
                            the
                            child’s first visit to the dentist? </label>
                        <div class=""><label class="checkbox ms-5">
                                <input type="checkbox" name="child_visit[]" value="Yes" <?php if (isset($get->child_visit)) {
                                    if (in_array('Yes', $get->child_visit)) {
                                        echo 'checked';
                                    }
                                } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="child_visit[]" value="No" <?php if (isset($get->child_visit)) {
                                    if (in_array('No', $get->child_visit)) {
                                        echo 'checked';
                                    }
                                } ?>>

                                <span></span>
                                No
                            </label><input type="text" class="form-control-food w-100px" id="child_visit_answer"
                                name="child_visit_answer" value="<?php if (isset($get->child_visit_answer)) {
                                    echo $get->child_visit_answer;
                                } ?>
                            "></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="2. Has the child had any unpleasant medical or dental experience?"
                            class="form-label mx-0">2. Has
                            the child had any unpleasant medical or dental experience? </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="dental_experience[]" value="Yes" <?php if (isset($get->dental_experience)) {
                                    if (in_array('Yes', $get->dental_experience)) {
                                        echo 'checked';
                                    }
                                } ?>>
                                <span></span>
                                Yes
                            </label> <label class="checkbox">
                                <input type="checkbox" name="dental_experience[]" value="No" <?php if (isset($get->dental_experience)) {
                                    if (in_array('No', $get->dental_experience)) {
                                        echo 'checked';
                                    }
                                } ?>>
                                <span></span>
                                No
                            </label> </div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="3. Has the child had any oral trauma?" class="form-label mx-0">3. Has the child had any
                            oral
                            trauma? </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="oral_truma[]" value="Yes" <?php if (isset($get->oral_truma)) {
                                    if (in_array('Yes', $get->oral_truma)) {
                                        echo 'checked';
                                    }
                                } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="oral_truma[]" value="No" <?php if (isset($get->oral_truma)) {
                                    if (in_array('No', $get->oral_truma)) {
                                        echo 'checked';
                                    }
                                } ?>>
                                <span></span>
                                No
                            </label><input type="text" class="form-control-food w-100px" id="oral_truma_answer"
                                name="oral_truma_answer" value="<?php if (isset($get->oral_truma_answer)) {
                                    echo $get->oral_truma_answer;
                                } ?>
                            "></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="4. Age of the child at first tooth eruption?" class="form-label mx-0">4. Age of the
                            child at
                            first tooth eruption? </label> <input type="text" class="form-control-food w-100px"
                            id="tooth_eruption" name="tooth_eruption"
                            value="<?php if (isset($get->tooth_eruption)) {
                                echo $get->tooth_eruption;
                            } ?>
                        ">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="a. Problems, any" class="form-label mx-0">a. Problems, any </label> <input
                            type="text" class="form-control-food" id="tooth_eruption_problems"
                            name="tooth_eruption_problems" value="<?php if (isset($get->tooth_eruption_problems)) {
                                echo $get->tooth_eruption_problems;
                            } ?>
                        ">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="b. Which tooth?" class="form-label mx-0">b. Which tooth? </label> <input
                            type="text" class="form-control-food" id="tooth_eruption_which_tooth"
                            name="tooth_eruption_which_tooth" value="<?php if (isset($get->tooth_eruption_which_tooth)) {
                                echo $get->tooth_eruption_which_tooth;
                            } ?>
                        ">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Prenatal history :" class="form-label mx-0 mx-0">PRENATAL HISTORY : </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="1. Any illness/ trauma to the mother during pregnancy" class="form-label mx-0">1. Any
                            illness/
                            trauma to the mother during pregnancy :</label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="prenatal_history_mother_pregnancy[]" value="Yes"
                                    <?php if (isset($get->prenatal_history_mother_pregnancy)) {
                                        if (in_array('Yes', $get->prenatal_history_mother_pregnancy)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="prenatal_history_mother_pregnancy[]" value="No"
                                    <?php if (isset($get->prenatal_history_mother_pregnancy)) {
                                        if (in_array('No', $get->prenatal_history_mother_pregnancy)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="2. Drugs taken during pregnancy :" class="form-label mx-0">2. Drugs taken during
                            pregnancy :
                        </label> <input type="text" class="form-control-food" id="prenatal_history_mother_drugs"
                            name="prenatal_history_mother_drugs" value="<?php if (isset($get->prenatal_history_mother_drugs)) {
                                echo $get->prenatal_history_mother_drugs;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="3. Delivery " class="form-label mx-0">3. Delivery </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="prenatal_history_mother_delivery[]" value="Full term"
                                    <?php if (isset($get->prenatal_history_mother_delivery)) {
                                        if (in_array('Full term', $get->prenatal_history_mother_delivery)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Full term
                            </label><label class="checkbox">
                                <input type="checkbox" name="prenatal_history_mother_delivery[]" value="Pre term"
                                    <?php if (isset($get->prenatal_history_mother_pregnancy)) {
                                        if (in_array('Pre term', $get->prenatal_history_mother_pregnancy)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Pre term
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="4. Type" class="form-label mx-0">4. Type </label>
                        <div class=" "><label class="checkbox mx-5">
                                <input type="checkbox" name="prenatal_history_type_option[]" value="Normal"
                                    <?php if (isset($get->prenatal_history_type_option)) {
                                        if (in_array('Normal', $get->prenatal_history_type_option)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Normal
                            </label><label class="checkbox ms-5">
                                <input type="checkbox" name="prenatal_history_type_option[]" value="Forceps"
                                    <?php if (isset($get->prenatal_history_type_option)) {
                                        if (in_array('Forceps', $get->prenatal_history_type_option)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Forceps
                            </label><label class="checkbox">
                                <input type="checkbox" name="prenatal_history_type_option[]" value="Caesarian"
                                    <?php if (isset($get->prenatal_history_type_option)) {
                                        if (in_array('Caesarian', $get->prenatal_history_type_option)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Caesarean
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Postnatal history :" class="form-label mx-0 mx-0">POSTNATAL HISTORY : </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="1. Blood group :" class="form-label mx-0">1. Blood group : </label> <input
                            type="text" class="form-control-food" id="postnatal_blood_group"
                            name="postnatal_blood_group" value="<?php if (isset($get->postnatal_blood_group)) {
                                echo $get->postnatal_blood_group;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="2. Whether jaundiced at birth? " class="form-label mx-0">2. Whether jaundiced at
                            birth?
                        </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_jaundiced[]" value="Yes"
                                    <?php if (isset($get->postnatal_history_jaundiced)) {
                                        if (in_array('Forceps', $get->postnatal_history_jaundiced)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_jaundiced[]" value="No"
                                    <?php if (isset($get->postnatal_history_jaundiced)) {
                                        if (in_array('No', $get->postnatal_history_jaundiced)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="3. Was the child breast fed?" class="form-label mx-0">3. Was the child breast fed?
                        </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_jaundiced[]" value="Yes"
                                    <?php if (isset($get->postnatal_history_jaundiced)) {
                                        if (in_array('Forceps', $get->postnatal_history_jaundiced)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_jaundiced[]" value="No"
                                    <?php if (isset($get->postnatal_history_jaundiced)) {
                                        if (in_array('No', $get->postnatal_history_jaundiced)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="If yes, duration" class="form-label mx-0">If yes, duration :</label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_child_breast_yes[]" value="6 months"
                                    <?php if (isset($get->postnatal_history_child_breast_yes)) {
                                        if (in_array('6 months', $get->postnatal_history_child_breast_yes)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                6 months
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_child_breast_yes[]" value="6-12 months"
                                    <?php if (isset($get->postnatal_history_child_breast_yes)) {
                                        if (in_array('6-12 months', $get->postnatal_history_child_breast_yes)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                6-12 months
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_child_breast_yes[]" value=">12 months"
                                    <?php if (isset($get->postnatal_history_child_breast_yes)) {
                                        if (in_array('>12 months', $get->postnatal_history_child_breast_yes)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                &gt;12 months
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="4. Was the child given blood transfusion?" class="form-label mx-0">4. Was the child
                            given blood
                            transfusion? </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_blood_transfusion[]" value="Yes"
                                    <?php if (isset($get->postnatal_history_blood_transfusion)) {
                                        if (in_array('Yes', $get->postnatal_history_blood_transfusion)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label> <label class="checkbox">
                                <input type="checkbox" name="postnatal_history_blood_transfusion[]" value="No"
                                    <?php if (isset($get->postnatal_history_blood_transfusion)) {
                                        if (in_array('No', $get->postnatal_history_blood_transfusion)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="5. Did the child use nursing bottle?" class="form-label mx-0">5. Did the child use
                            nursing
                            bottle? </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_nursing_bottle[]" value="Yes"
                                    <?php if (isset($get->postnatal_history_nursing_bottle)) {
                                        if (in_array('Yes', $get->postnatal_history_nursing_bottle)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_nursing_bottle[]" value="No"
                                    <?php if (isset($get->postnatal_history_nursing_bottle)) {
                                        if (in_array('No', $get->postnatal_history_nursing_bottle)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">
                        <label for="a. How long and how frequent :" class="form-label mx-0 col-4">a. How long and how
                            frequent </label>
                        <input type="text" class="form-control-food" id="postnatal_nursing_bottle_long_frequent"
                            name="postnatal_nursing_bottle_long_frequent" value="<?php if (isset($get->postnatal_nursing_bottle_long_frequent)) {
                                echo $get->postnatal_nursing_bottle_long_frequent;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="b. Type of nipple used :" class="form-label mx-0 col-4">b. Type of nipple used
                        </label> <input type="text" class="form-control-food"
                            id="postnatal_nursing_bottle_nipple_used" name="postnatal_nursing_bottle_nipple_used"
                            value="<?php if (isset($get->postnatal_nursing_bottle_nipple_used)) {
                                echo $get->postnatal_nursing_bottle_nipple_used;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="c. Does the child go to sleep bottle fed? :" class="form-label mx-0">c. Does the child
                            go to
                            sleep bottle fed? </label>
                        <div class=" "><label class="checkbox ms-5">
                                <input type="checkbox" name="postnatal_history_nursing_bottle_sleep_fed[]" value="Yes"
                                    <?php if (isset($get->postnatal_history_nursing_bottle_sleep_fed)) {
                                        if (in_array('Yes', $get->postnatal_history_nursing_bottle_sleep_fed)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                Yes
                            </label><label class="checkbox">
                                <input type="checkbox" name="postnatal_history_nursing_bottle_sleep_fed[]" value="No"
                                    <?php if (isset($get->postnatal_history_nursing_bottle_sleep_fed)) {
                                        if (in_array('No', $get->postnatal_history_nursing_bottle_sleep_fed)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                <span></span>
                                No
                            </label></div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="d. Content :" class="form-label mx-0">d. Content : </label>
                        <div class=" ms-5">
                            <!-- add class="checkbox-list"-->
                            <div class="checkbox-list">
                                <label class="checkbox ">
                                    <input type="checkbox" name="postnatal_history_nursing_bottle_content[]"
                                        value="Milk" <?php if (isset($get->postnatal_history_nursing_bottle_content)) {
                                            if (in_array('Milk', $get->postnatal_history_nursing_bottle_content)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Milk
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="postnatal_history_nursing_bottle_content[]"
                                        value="Juice" <?php if (isset($get->postnatal_history_nursing_bottle_content)) {
                                            if (in_array('Juice', $get->postnatal_history_nursing_bottle_content)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Juice
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="postnatal_history_nursing_bottle_content[]"
                                        value="Water" <?php if (isset($get->postnatal_history_nursing_bottle_content)) {
                                            if (in_array('Water', $get->postnatal_history_nursing_bottle_content)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Water
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="postnatal_history_nursing_bottle_content[]"
                                        value="Others" <?php if (isset($get->postnatal_history_nursing_bottle_content)) {
                                            if (in_array('Others', $get->postnatal_history_nursing_bottle_content)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="6. Milestones of development" class="form-label mx-0 mx-0">6. Milestones of
                            development :</label>
                        <textarea class="form-control ms-1" id="postnatal_history_milestones_of_development"
                            name="postnatal_history_milestones_of_development"><?php if (isset($get->postnatal_history_milestones_of_development)) {
                                echo $get->postnatal_history_milestones_of_development;
                            } ?></textarea>
                    </div>
                    <!-- NEW CHANGE -->
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="6. Milestones of development" class="form-label mx-0 mx-0">7. Immunization Status
                            :</label>
                        <textarea class="form-control ms-1" id="postnatal_history_milestones_of_development"
                            name="postnatal_history_milestones_of_development"><?php if (isset($get->postnatal_history_milestones_of_development)) {
                                echo $get->postnatal_history_milestones_of_development;
                            } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Oral hygiene practices" class="form-label mx-0 mx-0">8. Oral hygiene practices
                            :</label>
                        <textarea class="form-control ms-1" id="oral_hygiene_practices" name="oral_hygiene_practices"><?php if (isset($get->oral_hygiene_practices)) {
                            echo $get->oral_hygiene_practices;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Diet history" class="form-label mx-0 mx-0 d-block">9. Diet history :</label><label
                            class="checkbox">
                            <input type="checkbox" name="diet_history[]" value="Veg" <?php if (isset($get->diet_history)) {
                                if (in_array('Veg', $get->diet_history)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span></span>
                            Veg
                        </label><label class="checkbox">
                            <input type="checkbox" name="diet_history[]" value="Non-veg" <?php if (isset($get->diet_history)) {
                                if (in_array('Non-veg', $get->diet_history)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span></span>
                            Non-veg
                        </label><label class="checkbox">
                            <input type="checkbox" name="diet_history[]" value="Mixed" <?php if (isset($get->diet_history)) {
                                if (in_array('Mixed', $get->diet_history)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span></span>
                            Mixed
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Sugar Score" class="form-label mx-0 mx-0 d-block">10. Sugar Score : </label>
                        <input type="text" class="form-control-food w-300px " id="hard_tissue_examination_sound_tooth"
                            name="hard_tissue_examination_sound_tooth" value="<?php if (isset($get->hard_tissue_examination_sound_tooth)) {
                                echo $get->hard_tissue_examination_sound_tooth;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Clinical examination" class="form-label mx-0 mx-0">CLINICAL EXAMINATION :</label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="General examination" class="form-label mx-0 mx-0">GENERAL EXAMINATION :</label>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="Height" class="form-label mx-0">Height </label> <input type="text"
                            class="form-control-food w-100px" id="general_examination_height"
                            name="general_examination_height" value="<?php if (isset($get->general_examination_height)) {
                                echo $get->general_examination_height;
                            } ?>"> <span class="ps-2">
                            cm</span>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="Weight" class="form-label mx-0">Weight </label> <input type="text"
                            class="form-control-food w-100px" id="general_examination_weight"
                            name="general_examination_weight" value="<?php if (isset($get->general_examination_weight)) {
                                echo $get->general_examination_weight;
                            } ?>"> <span class="ps-2">
                            kg</span>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Body Type" class="form-label mx-0 d-block ">Body Type :</label><label
                            class="checkbox ms-5">
                            <input type="checkbox" name="general_examination_body_type[]" value="Ectomorph"
                                <?php if (isset($get->general_examination_body_type)) {
                                    if (in_array('Ectomorph', $get->general_examination_body_type)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Ectomorph
                        </label><label class="checkbox">
                            <input type="checkbox" name="general_examination_body_type[]" value="Endomorph"
                                <?php if (isset($get->general_examination_body_type)) {
                                    if (in_array('Endomorph', $get->general_examination_body_type)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Endomorph
                        </label><label class="checkbox">
                            <input type="checkbox" name="general_examination_body_type[]" value="Mesomorph"
                                <?php if (isset($get->general_examination_body_type)) {
                                    if (in_array('Mesomorph', $get->general_examination_body_type)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Mesomorph
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 ">

                        <label for="Speech" class="form-label mx-0">Speech :</label> <input type="text"
                            class="form-control-food w-200px" id="general_examination_speech"
                            name="general_examination_speech" value="<?php if (isset($get->general_examination_speech)) {
                                echo $get->general_examination_speech;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Extra oral examination" class="form-label mx-0 mx-0">EXTRA ORAL EXAMINATION :</label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Shape Of Head" class="form-label mx-0 d-block">1. Shape Of Head :</label>
                        <div class="ms-5">
                            <div class="checkbox-list">
                                <label class="checkbox ">
                                    <input type="checkbox" name="extra_oral_examination_shape_of_head[]" value="Meso"
                                        <?php if (isset($get->extra_oral_examination_shape_of_head)) {
                                            if (in_array('Meso', $get->extra_oral_examination_shape_of_head)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Meso
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_shape_of_head[]" value="Dolicho"
                                        <?php if (isset($get->extra_oral_examination_shape_of_head)) {
                                            if (in_array('Dolicho', $get->extra_oral_examination_shape_of_head)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Dolicho
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_shape_of_head[]"
                                        value="Brachycephalic" <?php if (isset($get->extra_oral_examination_shape_of_head)) {
                                            if (in_array('Brachycephalic', $get->extra_oral_examination_shape_of_head)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Brachycephalic
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Facial form" class="form-label mx-0 d-block">2. Facial form :</label>
                        <label class="checkbox ms-5">
                            <input type="checkbox" name="extra_oral_examination_facial_form[]" value="Oval"
                                <?php if (isset($get->extra_oral_examination_facial_form)) {
                                    if (in_array('Oval', $get->extra_oral_examination_facial_form)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Mesoprosopic
                        </label><label class="checkbox">
                            <input type="checkbox" name="extra_oral_examination_facial_form[]" value="Round"
                                <?php if (isset($get->extra_oral_examination_facial_form)) {
                                    if (in_array('Round', $get->extra_oral_examination_facial_form)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Euryprosopic
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Facial symmetry " class="form-label mx-0 d-block">3. Facial symmetry :</label>
                        <label class="checkbox ms-5">
                            <input type="checkbox" name="extra_oral_examination_facial_symmetry []" value="Symmetrical"
                                <?php if (isset($get->extra_oral_examination_facial_symmetry)) {
                                    if (in_array('Symmetrical', $get->extra_oral_examination_facial_symmetry)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Symmetrical
                        </label><label class="checkbox">
                            <input type="checkbox" name="extra_oral_examination_facial_symmetry []" value="Asymmetrical"
                                <?php if (isset($get->extra_oral_examination_facial_symmetry)) {
                                    if (in_array('Asymmetrical', $get->extra_oral_examination_facial_symmetry)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Asymmetrical
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Facial divergence" class="form-label mx-0 d-block">4. Facial divergence :</label>
                        <div class="ms-5">
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_facial_divergence[]"
                                        value="Straight" <?php if (isset($get->extra_oral_examination_facial_divergence)) {
                                            if (in_array('Straight', $get->extra_oral_examination_facial_divergence)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Straight
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_facial_divergence[]"
                                        value="Anterior" <?php if (isset($get->extra_oral_examination_facial_divergence)) {
                                            if (in_array('Anterior', $get->extra_oral_examination_facial_divergence)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Anterior
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_facial_divergence[]"
                                        value="Posterior" <?php if (isset($get->extra_oral_examination_facial_divergence)) {
                                            if (in_array('Posterior', $get->extra_oral_examination_facial_divergence)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Posterior
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Profile" class="form-label mx-0 d-block">5. Profile :</label>
                        <div class="ms-5">
                            <div class="checkbox-list">
                                <label class="checkbox ">
                                    <input type="checkbox" name="extra_oral_examination_profile[]" value="Straight"
                                        <?php if (isset($get->extra_oral_examination_profile)) {
                                            if (in_array('Straight', $get->extra_oral_examination_profile)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Straight
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_profile[]" value="Prognathic"
                                        <?php if (isset($get->extra_oral_examination_profile)) {
                                            if (in_array('Prognathic', $get->extra_oral_examination_profile)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Prognathic
                                </label>
                            </div>
                            <div class="checkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_profile[]" value="Retrognathic"
                                        <?php if (isset($get->extra_oral_examination_profile)) {
                                            if (in_array('Retrognathic', $get->extra_oral_examination_profile)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Retrognathic
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Lips " class="form-label mx-0 d-block">6. Lips :</label>
                        <!-- add class="checkbox-list" -->
                        <div class=" ms-1">
                            <div class="checkbox-list">
                                <label class="checkbox mx-3">
                                    <input type="checkbox" name="extra_oral_examination_lips[]" value="Incompetent"
                                        <?php if (isset($get->extra_oral_examination_lips)) {
                                            if (in_array('Incompetent', $get->extra_oral_examination_lips)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Incompetent
                                </label>
                            </div>
                            <div class="chexkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_lips[]" value="Short upper lip"
                                        <?php if (isset($get->extra_oral_examination_lips)) {
                                            if (in_array('Short upper lip', $get->extra_oral_examination_lips)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Short upper lip
                                </label>
                            </div>
                            <div class="chexkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_lips[]" value="Short lower lip"
                                        <?php if (isset($get->extra_oral_examination_lips)) {
                                            if (in_array('Short lower lip', $get->extra_oral_examination_lips)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Short lower lip
                                </label>
                            </div>
                            <div class="chexkbox-list">
                                <label class="checkbox">
                                    <input type="checkbox" name="extra_oral_examination_lips[]" value="Everted lip"
                                        <?php if (isset($get->extra_oral_examination_lips)) {
                                            if (in_array('Everted lip', $get->extra_oral_examination_lips)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Everted lip
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 px-0 mb-4">

                        <div id="dental_tmj" class="input-with-checkbox">
                            <label for="TMJ " class="form-label mx-0 d-block col-12 col-md-3 col-xl-1">7. TMJ :
                            </label>
                            <div class="input-fld ">
                                <label class="checkbox" class="col-12 col-md-3 col-lg-2" for="dental_tmj">
                                    <input type="checkbox" id="dental_tmj" name="dental_tmj_chk[]" value="tmj"
                                        <?php if (isset($get->head_foot_examine)) {
                                            if (in_array('tmj', $get->dental_tmj_chk)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span> NAD</span>
                                </label>
                                <label class="input-fld  col-12 col-md-9 col-lg-10" for="dental_tmj">
                                    <textarea rows="" class="form-control" id="dentalTMJ" name="dentalTMJ"><?php if (isset($get->dentalTMJ)) {
                                        echo $get->dentalTMJ;
                                    } ?></textarea>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-xl-9 px-0 mb-4">
                        <label for="Lymph nodes " class="form-label mx-0">Lymph nodes :</label>
                        <textarea rows="" class="form-control mb-5 pb-5 " id="extra_oral_examination_lymph_nodes"
                            name="extra_oral_examination_lymph_nodes"><?php if (isset($get->extra_oral_examination_lymph_nodes)) {
                                echo $get->extra_oral_examination_lymph_nodes;
                            } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">
                        <label for="Others " class="form-label mx-0">Others :</label>
                        <textarea rows="" class="form-control mb-5 pb-5 " id="extra_oral_examination_others"
                            name="extra_oral_examination_others"><?php if (isset($get->extra_oral_examination_others)) {
                                echo $get->extra_oral_examination_others;
                            } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Local examination" class="form-label mx-0 mx-0">LOCAL EXAMINATION :</label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Oral soft tissues :" class="form-label mx-0">1.Oral soft tissues : </label>
                        <textarea class="form-control" id="local_examination_oral_soft_tissues" name="local_examination_oral_soft_tissues"><?php if (isset($get->local_examination_oral_soft_tissues)) {
                            echo $get->local_examination_oral_soft_tissues;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Hard Tissue examination :" class="form-label mx-0">2.Hard Tissue examination :
                        </label>
                    </div>
                    <div class="col-12 px-0 sound-teeth">
                        {{-- <input type="text" class="form-control-food w-300px "
                        id="hard_tissue_examination_sound_tooth" name="hard_tissue_examination_sound_tooth"
                        value="<?php // if (isset($get->hard_tissue_examination_sound_tooth)) { echo $get->hard_tissue_examination_sound_tooth;}
                        ?>"> --}}

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div class="accordion-header" id="flush-headingOne">
                                    <label class="accordion-button collapsed ps-0 mx-0" style="width:max-content;"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-soundTeesthWrap"
                                        aria-expanded="false" aria-controls="flush-soundTeesthWrap">
                                        <span class="pe-3 mx-0 font-weight-semibold" style="font-weight: 500">Sound
                                            Teeth</span>
                                    </label>
                                </div>
                                <div id="flush-soundTeesthWrap" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body" style="overflow-x:scroll; ">
                                        <div class="sound-teeth-wrap row mx-0">
                                            <div class="border col-6 py-2 pe-2 border-dark border-top-0 border-start-0">
                                                <div
                                                    class="w-100 pe-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-end align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                            id="soundTeeth18" value='soundTeeth18' <?php if (isset($get->soundTeeth)) {
                                                                if (in_array('soundTeeth18', $get->soundTeeth)) {
                                                                    echo 'checked';
                                                                }
                                                            } ?>>
                                                        <label for="soundTeeth18" class="form-label">18</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth17" value='soundTeeth17' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth17', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth17" class="form-label">17</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth16" value='soundTeeth16' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth16', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth16" class="form-label">16</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth15" value='soundTeeth15' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth15', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth15" class="form-label">15</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth14" value='soundTeeth14' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth14', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth14" class="form-label">14</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth13" value='soundTeeth13' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth13', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth13" class="form-label">13</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth12" value='soundTeeth12' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth12', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth12" class="form-label">12</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth11" value='soundTeeth11' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth11', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth11" class="form-label">11</label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-100 pe-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-end align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth55" value='soundTeeth55' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth55', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth55" class="form-label">55</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth54" value='soundTeeth54' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth54', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth54" class="form-label">54</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth53" value='soundTeeth53' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth53', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth53" class="form-label">53</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth52" value='soundTeeth52' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth52', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth52" class="form-label">52</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth51" value='soundTeeth51' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth51', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth51" class="form-label">51</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="border col-6 py-2 ps-2 border-dark border-top-0 border-end-0">
                                                <div
                                                    class="w-100 ps-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-start align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth21" value='soundTeeth21' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth21', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth21" class="form-label">21</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth22" value='soundTeeth22' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth22', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth22" class="form-label">22</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth23" value='soundTeeth23' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth23', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth23" class="form-label">23</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth24" value='soundTeeth24' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth24', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth24" class="form-label">24</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth25" value='soundTeeth25' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth25', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth25" class="form-label">25</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth26" value='soundTeeth26' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth26', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth26" class="form-label">26</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth27" value='soundTeeth27' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth27', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth27" class="form-label">27</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth28" value='soundTeeth28' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth28', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth28" class="form-label">28</label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-100 ps-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-start align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth61" value='soundTeeth61' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth61', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth61" class="form-label">61</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth61" value='soundTeeth61' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth61', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth62" class="form-label">62</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth63" value='soundTeeth63' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth63', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth63" class="form-label">63</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth64" value='soundTeeth64' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth64', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth64" class="form-label">64</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                         <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth65" value='soundTeeth65' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth65', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth65" class="form-label">65</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  --}}
                                            <div class="border col-6 py-2 pe-2 border-dark border-bottom-0 border-start-0">
                                                <div
                                                    class="w-100 pe-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-end align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth85" value='soundTeeth85' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth85', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth85" class="form-label">85</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth84" value='soundTeeth84' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth84', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth84" class="form-label">84</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth83" value='soundTeeth83' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth83', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth83" class="form-label">83</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth82" value='soundTeeth82' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth82', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth82" class="form-label">82</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth81" value='soundTeeth81' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth81', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth81" class="form-label">81</label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-100 pe-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-end align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth48" value='soundTeeth48' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth48', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth48" class="form-label">48</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth47" value='soundTeeth47' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth47', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth47" class="form-label">47</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth46" value='soundTeeth46' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth46', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth46" class="form-label">46</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth45" value='soundTeeth45' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth45', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth45" class="form-label">45</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth44" value='soundTeeth44' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth44', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth44" class="form-label">44</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth43" value='soundTeeth43' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth43', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth43" class="form-label">43</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth42" value='soundTeeth42' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth42', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth42" class="form-label">42</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth41" value='soundTeeth41' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth41', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth41" class="form-label">41</label>
                                                    </div>
                                                </div>

                                            </div>
                                            {{--  --}}
                                            <div class="border col-6 py-2 ps-2 border-dark border-bottom-0 border-end-0">

                                                <div
                                                    class="w-100 ps-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-start align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth71" value='soundTeeth71' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth71', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth71" class="form-label">71</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth72" value='soundTeeth72' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth72', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth72" class="form-label">72</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth73" value='soundTeeth73' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth73', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth73" class="form-label">73</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth74" value='soundTeeth74' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth74', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth74" class="form-label">74</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth75" value='soundTeeth75' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth75', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth75" class="form-label">75</label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-100 ps-2 py-2 d-flex flex-no-wrap align-items-center gap-2 col-6 justify-content-start align-items-center">
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth31" value='soundTeeth31' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth31', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth31" class="form-label">31</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth32" value='soundTeeth32' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth32', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth32" class="form-label">32</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth33" value='soundTeeth33' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth33', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth33" class="form-label">33</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth34" value='soundTeeth34' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth34', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth34" class="form-label">34</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth35" value='soundTeeth35' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth35', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth35" class="form-label">35</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth36" value='soundTeeth36' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth36', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth36" class="form-label">36</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth37" value='soundTeeth37' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth37', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth37" class="form-label">37</label>
                                                    </div>
                                                    <div class="rounded-checkbox">
                                                        <input type="checkbox" class="form-check" name="soundTeeth[]"
                                                        id="soundTeeth38" value='soundTeeth38' <?php if (isset($get->soundTeeth)) {
                                                            if (in_array('soundTeeth38', $get->soundTeeth)) {
                                                                echo 'checked';
                                                            }
                                                        } ?>>
                                                        <label for="soundTeeth38" class="form-label">38</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="Missing tooth  :  " class="form-label mx-0">Missing tooth </label> <input
                            type="text" class="form-control-food w-300px " id="hard_tissue_examination_missing_tooth"
                            name="hard_tissue_examination_missing_tooth" value="<?php if (isset($get->hard_tissue_examination_missing_tooth)) {
                                echo $get->hard_tissue_examination_missing_tooth;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="Plaque and calculus status:" class="form-label mx-0 col-3">Plaque and calculus status
                        </label>
                        <input type="text" class="form-control-food w-300px " id="hard_tissue_examination_calculus"
                            name="hard_tissue_examination_calculus" value="<?php if (isset($get->hard_tissue_examination_calculus)) {
                                echo $get->hard_tissue_examination_calculus;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Restorative and endodontic evaluation" class="form-label mx-0">Restorative and
                            endodontic
                            evaluation :</label>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="1. Caries tooth" class="form-label mx-0">1. Caries tooth </label> <input
                            type="text" class="form-control-food w-300px " id="endodontic_evaluation_caries_tooth"
                            name="endodontic_evaluation_caries_tooth" value="<?php if (isset($get->endodontic_evaluation_caries_tooth)) {
                                echo $get->endodontic_evaluation_caries_tooth;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="2. Fractured tooth" class="form-label mx-0">2. Fractured tooth </label> <input
                            type="text" class="form-control-food w-300px " id="endodontic_evaluation_fractured_tooth"
                            name="endodontic_evaluation_fractured_tooth" value="<?php if (isset($get->endodontic_evaluation_fractured_tooth)) {
                                echo $get->endodontic_evaluation_fractured_tooth;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="3. Secondary caries " class="form-label mx-0">3. Secondary caries </label> <input
                            type="text" class="form-control-food w-300px " id="endodontic_evaluation_secondary_caries"
                            name="endodontic_evaluation_secondary_caries" value="<?php if (isset($get->endodontic_evaluation_secondary_caries)) {
                                echo $get->endodontic_evaluation_secondary_caries;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="4. Tenderness on percusion" class="form-label mx-0 col-3">4. Tenderness on percussion
                        </label> <input type="text" class="form-control-food w-300px "
                            id="endodontic_evaluation_tenderness_on_percusion"
                            name="endodontic_evaluation_tenderness_on_percusion" value="<?php if (isset($get->endodontic_evaluation_tenderness_on_percusion)) {
                                echo $get->endodontic_evaluation_tenderness_on_percusion;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="5. Swelling " class="form-label mx-0">5. Swelling </label> <input type="text"
                            class="form-control-food w-300px " id="endodontic_evaluation_swelling"
                            name="endodontic_evaluation_swelling" value="<?php if (isset($get->endodontic_evaluation_swelling)) {
                                echo $get->endodontic_evaluation_swelling;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="6. Pulp testing   " class="form-label mx-0">6. Pulp testing </label> <input
                            type="text" class="form-control-food w-300px " id="endodontic_evaluation_pulp_testing"
                            name="endodontic_evaluation_pulp_testing" value="<?php if (isset($get->endodontic_evaluation_pulp_testing)) {
                                echo $get->endodontic_evaluation_pulp_testing;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 ">

                        <label for="Orthodontic evaluation " class="form-label mx-0 text-uppercase mx-0">Orthodontic
                            evaluation :</label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="1. Oral habits " class="form-label mx-0 d-block">1. Oral habits :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_oral_habits[]" value="Yes"
                                <?php if (isset($get->orthodontic_evaluation_oral_habits)) {
                                    if (in_array('Yes', $get->orthodontic_evaluation_oral_habits)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Yes
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_oral_habits[]" value="No"
                                <?php if (isset($get->orthodontic_evaluation_oral_habits)) {
                                    if (in_array('No', $get->orthodontic_evaluation_oral_habits)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            No
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="A. Tongue thrusting" class="form-label mx-0 d-block">A. Tongue thrusting
                            :</label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_tongue_thrusting[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_tongue_thrusting)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_tongue_thrusting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_tongue_thrusting[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_tongue_thrusting)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_tongue_thrusting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="B. Thumb / finger sucking" class="form-label mx-0 d-block">B. Thumb / finger sucking
                            :</label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_finger_sucking[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_finger_sucking)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_finger_sucking)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_finger_sucking[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_finger_sucking)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_finger_sucking)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="a. Which digit" class="form-label mx-0">a. Which digit </label> <input
                            type="text" class="form-control-food w-300px "
                            id="orthodontic_evaluation_finger_sucking_digit"
                            name="orthodontic_evaluation_finger_sucking_digit" value="<?php if (isset($get->orthodontic_evaluation_finger_sucking_digit)) {
                                echo $get->orthodontic_evaluation_finger_sucking_digit;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="b. Age stopped " class="form-label mx-0">b. Age stopped </label> <input
                            type="text" class="form-control-food w-300px "
                            id="orthodontic_evaluation_finger_age_stopped"
                            name="orthodontic_evaluation_finger_age_stopped" value="<?php if (isset($get->orthodontic_evaluation_finger_age_stopped)) {
                                echo $get->orthodontic_evaluation_finger_age_stopped;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="C. Mouth breathing " class="form-label mx-0 d-block">C. Mouth breathing
                            :</label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_mouth_breathing[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_mouth_breathing)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_mouth_breathing)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_mouth_breathing[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_mouth_breathing)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_mouth_breathing)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="D. Bruxism   " class="form-label mx-0 d-block">D. Bruxism :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_bruxism[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_bruxism)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_bruxism)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_bruxism[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_bruxism)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_bruxism)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="E. Nail biting " class="form-label mx-0 d-block">E. Nail biting :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_nail_biting[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_nail_biting)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_nail_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_nail_biting[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_nail_biting)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_nail_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="F. Lip biting    " class="form-label mx-0 d-block">F. Lip biting :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_lip_biting[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_lip_biting)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_lip_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_lip_biting[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_lip_biting)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_lip_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="G. Cheek biting" class="form-label mx-0 d-block">G. Cheek biting :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_cheek_biting[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_cheek_biting)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_cheek_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_cheek_biting[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_cheek_biting)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_cheek_biting)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="H. Others " class="form-label mx-0">H. Others </label> <input type="text"
                            class="form-control-food w-300px " id="orthodontic_evaluation_others"
                            name="orthodontic_evaluation_others" value="<?php if (isset($get->orthodontic_evaluation_others)) {
                                echo $get->orthodontic_evaluation_others;
                            } ?>">
                    </div>
                    <!-- add new -->
                    <div class="row mt-3">
                        <div class="col-12 ">

                            <label for="2. Terminal plane relationship " class="form-label mx-0 ">2. Terminal plane
                                relationship :
                            </label>
                        </div>
                        <div class="col-12 offset-md-1 col-md-6 pt-2 ">

                            <div class=" "><label class="checkbox ms-5 ">
                                    <input type="checkbox"
                                        name="orthodontic_evaluation_terminal_plane_relationship_right[]" value="Right"
                                        <?php if (isset($get->orthodontic_evaluation_terminal_plane_relationship_right)) {
                                            if (in_array('Right', $get->orthodontic_evaluation_terminal_plane_relationship_right)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Right <span class="ms-2 me-3">:</span>
                                </label><input type="text" class="form-control-food w-300px ms-1"
                                    id="orthodontic_evaluation_terminal_plane_relationship_right_answer"
                                    name="orthodontic_evaluation_terminal_plane_relationship_right_answer"
                                    value="<?php if (isset($get->orthodontic_evaluation_terminal_plane_relationship_right_answer)) {
                                        echo $get->orthodontic_evaluation_terminal_plane_relationship_right_answer;
                                    } ?>">
                            </div>
                            <div class="pt-2">

                                <div class=" "><label class="checkbox ms-5 me-5">
                                        <input type="checkbox"
                                            name="orthodontic_evaluation_terminal_plane_relationship_left[]"
                                            value="Left" <?php if (isset($get->orthodontic_evaluation_terminal_plane_relationship_right)) {
                                                if (in_array('Left', $get->orthodontic_evaluation_terminal_plane_relationship_right)) {
                                                    echo 'checked';
                                                }
                                            } ?>>
                                        <span></span>
                                        Left <span class="ms-4 ps-1 me-2">:</span>
                                    </label> <input type="text" class="form-control-food w-300px ms-0"
                                        id="orthodontic_evaluation_terminal_plane_relationship_left_answer"
                                        name="orthodontic_evaluation_terminal_plane_relationship_left_answer"
                                        value="<?php if (isset($get->orthodontic_evaluation_terminal_plane_relationship_left_answer)) {
                                            echo $get->orthodontic_evaluation_terminal_plane_relationship_left_answer;
                                        } ?>"></div>
                            </div>
                        </div>

                    </div>
                    <!-- add new -->

                    <!-- add new -->
                    <div class="row mt-3">
                        <div class="col-12 ">

                            <label for="3. Molar relationship " class="form-label mx-0">3. Molar relationship :</label>
                        </div>
                        <div class="col-12 offset-md-1 col-md-6 pt-2">

                            <div class=" "><label class="checkbox ms-5 me-3">
                                    <input type="checkbox" name="orthodontic_evaluation_molar_relationship_right[]"
                                        value="Right" <?php if (isset($get->orthodontic_evaluation_molar_relationship_right)) {
                                            if (in_array('Right', $get->orthodontic_evaluation_molar_relationship_right)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Right <span class="ms-2 me-3">:</span>
                                </label> <input type="text" class="form-control-food w-300px ms-2"
                                    id="orthodontic_evaluation_molar_relationship_right_answer"
                                    name="orthodontic_evaluation_molar_relationship_right_answer"
                                    value="<?php if (isset($get->orthodontic_evaluation_molar_relationship_right_answer)) {
                                        echo $get->orthodontic_evaluation_molar_relationship_right_answer;
                                    } ?>">
                            </div>
                            <div class=" "><label class="checkbox ms-5 ">
                                    <input type="checkbox" name="orthodontic_evaluation_molar_relationship_left[]"
                                        value="Left" <?php if (isset($get->orthodontic_evaluation_molar_relationship_right)) {
                                            if (in_array('Left', $get->orthodontic_evaluation_molar_relationship_right)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Left <span class="ms-4 ps-1 me-2">:</span>
                                </label> <input type="text"
                                    class="form-control-food w-300px ms-2
                        "
                                    id="orthodontic_evaluation_terminal_plane_relationship_left_answer"
                                    name="orthodontic_evaluation_molar_relationship_answer"
                                    value="<?php if (isset($get->orthodontic_evaluation_molar_relationship_answer)) {
                                        echo $get->orthodontic_evaluation_molar_relationship_answer;
                                    } ?>">
                            </div>
                        </div>

                    </div>
                    <!-- add new -->

                    <!-- new add -->
                    <div class="row my-3">
                        <div class="col-12 ">

                            <label for="4. Canine relationship " class="form-label mx-0">4. Canine relationship
                                :</label>
                        </div>
                        <div class="col-12 offset-md-1 col-md-6 pt-2">

                            <div class=" "><label class="checkbox ms-5 me-3">
                                    <input type="checkbox" name="orthodontic_evaluation_canine_relationship_right[]"
                                        value="Right" <?php if (isset($get->orthodontic_evaluation_canine_relationship_right)) {
                                            if (in_array('Right', $get->orthodontic_evaluation_canine_relationship_right)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Right <span class="ms-2 me-3">:</span>
                                </label> <input type="text" class="form-control-food w-300px"
                                    id="orthodontic_evaluation_canine_relationship_right_answer"
                                    name="orthodontic_evaluation_canine_relationship_right_answer"
                                    value="<?php if (isset($get->orthodontic_evaluation_canine_relationship_right_answer)) {
                                        echo $get->orthodontic_evaluation_canine_relationship_right_answer;
                                    } ?>">
                            </div>
                            <div class=" "><label class="checkbox ms-5 ">
                                    <input type="checkbox" name="orthodontic_evaluation_canine_relationship_left[]"
                                        value="Left" <?php if (isset($get->orthodontic_evaluation_canine_relationship_right)) {
                                            if (in_array('Left', $get->orthodontic_evaluation_canine_relationship_right)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span></span>
                                    Left <span class="ms-4 ps-1 me-2">:</span>
                                </label> <input type="text" class="form-control-food w-300px ms-0"
                                    id="orthodontic_evaluation_canine_relationship_left_answer"
                                    name="orthodontic_evaluation_canine_relationship_left_answer"
                                    value="<?php if (isset($get->orthodontic_evaluation_canine_relationship_left_answer)) {
                                        echo $get->orthodontic_evaluation_canine_relationship_left_answer;
                                    } ?>">
                            </div>
                        </div>

                    </div>
                    <!-- new add -->

                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="5. Overjet " class="form-label mx-0">5. Overjet </label> <input type="text"
                            class="form-control-food w-300px " id="orthodontic_evaluation_overjet"
                            name="orthodontic_evaluation_overjet" value="<?php if (isset($get->orthodontic_evaluation_overjet)) {
                                echo $get->orthodontic_evaluation_overjet;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="6. Overbite " class="form-label mx-0">6. Overbite </label> <input type="text"
                            class="form-control-food w-300px " id="orthodontic_evaluation_overbite"
                            name="orthodontic_evaluation_overbite" value="<?php if (isset($get->orthodontic_evaluation_overbite)) {
                                echo $get->orthodontic_evaluation_overbite;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="7. Open bite " class="form-label mx-0">7. Open bite </label> <input type="text"
                            class="form-control-food w-300px " id="orthodontic_evaluation_open_bite"
                            name="orthodontic_evaluation_open_bite" value="<?php if (isset($get->orthodontic_evaluation_open_bite)) {
                                echo $get->orthodontic_evaluation_open_bite;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="8. Cross bite " class="form-label mx-0">8. Cross bite </label> <input
                            type="text" class="form-control-food w-300px " id="orthodontic_evaluation_cross_bite"
                            name="orthodontic_evaluation_cross_bite" value="<?php if (isset($get->orthodontic_evaluation_cross_bite)) {
                                echo $get->orthodontic_evaluation_cross_bite;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="9. Ectopic eruption" class="form-label mx-0">9. Ectopic eruption </label> <input
                            type="text" class="form-control-food w-300px "
                            id="orthodontic_evaluation_ectopic_eruption" name="orthodontic_evaluation_ectopic_eruption"
                            value="<?php if (isset($get->orthodontic_evaluation_ectopic_eruption)) {
                                echo $get->orthodontic_evaluation_ectopic_eruption;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="10. Supernumerary teeth" class="form-label mx-0">10. Supernumerary teeth </label>
                        <input type="text" class="form-control-food w-300px "
                            id="orthodontic_evaluation_supernumerary_teeth"
                            name="orthodontic_evaluation_supernumerary_teeth" value="<?php if (isset($get->orthodontic_evaluation_supernumerary_teeth)) {
                                echo $get->orthodontic_evaluation_supernumerary_teeth;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0">

                        <label for="11. Midline " class="form-label mx-0 d-block">11. Midline :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_midline[]" value="Normal"
                                <?php if (isset($get->orthodontic_evaluation_midline)) {
                                    if (in_array('Normal', $get->orthodontic_evaluation_midline)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Normal
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_midline[]" value="Deviated"
                                <?php if (isset($get->orthodontic_evaluation_midline)) {
                                    if (in_array('Deviated', $get->orthodontic_evaluation_midline)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Deviated
                        </label>
                    </div>
                    <div class="col-12 col-xl-9  field-with-suffix px-0">

                        <label for="12. Crowding / spacing" class="form-label mx-0 ">12. Crowding / spacing </label>
                        <input type="text" class="form-control-food w-300px "
                            id="orthodontic_evaluation_crowding_spacing" name="orthodontic_evaluation_crowding_spacing"
                            value="<?php if (isset($get->orthodontic_evaluation_crowding_spacing)) {
                                echo $get->orthodontic_evaluation_crowding_spacing;
                            } ?>">
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="13. Proclination " class="form-label mx-0 d-block">13. Proclination :</label><label
                            class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_proclination[]" value="Present"
                                <?php if (isset($get->orthodontic_evaluation_proclination)) {
                                    if (in_array('Present', $get->orthodontic_evaluation_proclination)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Present
                        </label><label class="checkbox">
                            <input type="checkbox" name="orthodontic_evaluation_proclination[]" value="Absent"
                                <?php if (isset($get->orthodontic_evaluation_proclination)) {
                                    if (in_array('Absent', $get->orthodontic_evaluation_proclination)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span></span>
                            Absent
                        </label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Investigation " class="form-label mx-0">INVESTIGATION :</label>
                        <textarea class="form-control" id="dental_investigation" name="dental_investigation"><?php if (isset($get->dental_investigation)) {
                            echo $get->dental_investigation;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Diagnosis " class="form-label mx-0">DIAGNOSIS :</label>
                        <textarea class="form-control" id="dental_diagnosis" name="dental_diagnosis"><?php if (isset($get->dental_diagnosis)) {
                            echo $get->dental_diagnosis;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Treatment plan  " class="form-label mx-0">TREATMENT PLAN :</label>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="1 Systemic phase " class="form-label mx-0">1. Systemic phase :</label>
                        <textarea class="form-control" id="treatment_systemic_phase" name="treatment_systemic_phase"><?php if (isset($get->treatment_systemic_phase)) {
                            echo $get->treatment_systemic_phase;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="2 Preventive phase" class="form-label mx-0">2. Preventive phase :</label>
                        <textarea class="form-control" id="treatment_preventive_phase" name="treatment_preventive_phase"><?php if (isset($get->treatment_preventive_phase)) {
                            echo $get->treatment_preventive_phase;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="3 Preparatory phase" class="form-label mx-0">3. Preparatory phase :</label>
                        <textarea class="form-control" id="treatment_preparatory_phase" name="treatment_preparatory_phase"><?php if (isset($get->treatment_preparatory_phase)) {
                            echo $get->treatment_preparatory_phase;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="4 Corrective phase" class="form-label mx-0">4. Corrective phase :</label>
                        <textarea class="form-control" id="treatment_corrective_phase" name="treatment_corrective_phase"><?php if (isset($get->treatment_corrective_phase)) {
                            echo $get->treatment_corrective_phase;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="5 Maintenance phase" class="form-label mx-0">5. Maintenance phase :</label>
                        <textarea class="form-control" id="treatment_maintenance_phase" name="treatment_maintenance_phase"><?php if (isset($get->treatment_maintenance_phase)) {
                            echo $get->treatment_maintenance_phase;
                        } ?></textarea>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">
                        <div class="d-flex justify-content-start align-items-center gap-4 my-5">
                            <?php if(isset($getdata->id)) { ?>
                            <a class="baby-primary-btn mt-3"
                                href="{{ route('doctor.appointment.patient.prescription.medicine', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'pr_id' => $getdata->id, 'type' => 'dental']) }}">+
                                Add Prescriptions</a>
                            <?php } else { ?>
                            <div class="tooltip1 border-0">

                                <a class="baby-primary-btn" href="#">+ Add Prescriptions</a>
                                <span class="tooltip_text">Please update the paediatric case record form</span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-9 px-0 mb-4">

                        <label for="Referral" class="form-label mx-0">Referral </label>
                        <textarea class="form-control" id="treatment_any_referral" name="treatment_any_referral"><?php if (isset($get->treatment_any_referral)) {
                            echo $get->treatment_any_referral;
                        } ?></textarea>
                    </div>

                </div>

                {{-- table --}}
                <div class="table-style-one py-3 procedure-table px-2">
                    <div class="table-responsive py-3">
                        <table class="table " style="vertical-align: middle;">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="bg-color-v1 text-center"  style="width: 17%;" >Date</th>
                                    <th scope="col" class="bg-color-v1 text-center " style="width: 65%;">Procedure done</th>
                                    <th scope="col" class="bg-color-v1 text-center date"  style="width: 18%;">Next visit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           // dd($get); exit;
                            if(isset($get->procedure)) {
                            foreach ($get->procedure as $key => $value) {
                            ?>
                                <tr>
                                    <td class="text-center date">
                                        <div class="d-flex h-100 justify-content-center align-items-center">
                                            <input class="form-control" type="date" name="visited_date[]"
                                                value="<?php if (isset($value->visited_date)) {
                                                    echo $value->visited_date;
                                                } else {
                                                    echo date('Y-m-d');
                                                } ?>">
                                            <div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <textarea class="form-control" name="advice[]">
                                            <?php if (isset($value->advice)) {
                                                echo $value->advice;
                                            } ?>
                                        </textarea>
                                    </td>
                                    <td class="text-center date">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-control" id="deleteRow" type="date" id=""
                                                name="followUpDays[]" value="<?php if (isset($value->followUpDays)) {
                                                    echo $value->followUpDays;
                                                } ?>">
                                            <div>
                                                <button type="button" class="action-btn delete-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 16 16" fill="none">
                                                        <path
                                                            d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                                                            stroke="#FF505B" stroke-width="1.11111"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php } } else { ?>


                                <tr>
                                    <td class="text-center date">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input class="form-control" type="date" name="visited_date[]"
                                                value="<?php if (isset($value->visited_date)) {
                                                    echo $value->visited_date;
                                                } else {
                                                    echo date('Y-m-d');
                                                } ?>">
                                            <div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <textarea class="form-control" name="advice[]" id=""><?php if (isset($get->advice)) {
                                            echo $get->advice;
                                        } ?></textarea>
                                    </td>
                                    <td class="text-center date">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <input class="form-control" type="date" id=""
                                                name="followUpDays[]" value="<?php if (isset($get->followUpDays)) {
                                                    echo $get->followUpDays;
                                                } ?>">
                                            <div>
                                                <button type="button" class="action-btn delete-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 16 16" fill="none">
                                                        <path
                                                            d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                                                            stroke="#FF505B" stroke-width="1.11111"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <!-- <button id="addNewButton" class="baby-primary-btn">Add New</button> -->
                            <button type="button" id="addNewButton" class="baby-primary-btn">Add New</button>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start align-items-center gap-4 mb-5">

                    <a type="button" href="http://babyama.test/doctor/appointments"
                        class="baby-secondary-btn border-1 text-center" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="baby-primary-btn" {{ ($app_status!='assigned') ? 'disabled' : '' }}
                    >Save</button>

                </div>

            </form>
        </section>
    @endsection
