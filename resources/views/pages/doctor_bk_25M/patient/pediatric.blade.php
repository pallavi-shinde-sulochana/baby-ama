@extends('base.doctor-dashboard')
@section('doctor-content')
    @php
        $appointment = $appoinment;
        $id = $appointment->id;
        $get = isset($getdata->pediatric) ? json_decode($getdata->pediatric) : [];
    @endphp

    <section class="doctor-patinet-appointment pt-5">
        <div class="header ">
            <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                <div class="col-1 position-absolute">
                    <a href="{{route('doctor.appointment.patient',$id)}}">
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
                    <h2 class="mb-0">Paediatric Case Record</h2>
                </div>
            </div>
        </div>
    </section>

    {{-- Common Patient Profile Start --}}
    @include('pages.doctor.patient.common-patient-profile')
    {{-- Common Patient Profile Start --}}
    <section>
        <form action="{{ route('doctor.patient.pediatric.post', $patient->id) }}" method="POST">
            @csrf

            <input type="hidden" name="app_status" value="{{ $app_status }}">
            <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <div class="row py-5 my-5 mx-0 pediatric-form-fields ">
                <div class="col-12 col-lg-8 col-xl-7 ">
                    <div id="chief_complaints">
                        <label for="chief_complaints"
                            class="form-label">CHIEF COMPLAINTS </label>
<textarea rows="" class="form-control mb-5 pb-5" id="chief_complaints" name="chief_complaints"><?php if (isset($get->chief_complaints)) { echo $get->chief_complaints;
                        } ?></textarea>
                    </div>

                    <div id="h_o_pi">
                        <label for="h_o_pi" class="form-label">HISTORY OF PRESENTING ILLNESS</label>
                        <textarea rows="" class="form-control mb-5 pb-5" id="h_o_pi" name="h_o_pi"><?php if (isset($get->h_o_pi)) {
                            echo $get->h_o_pi;
                        } ?></textarea>
                    </div>

                    <div id="past_history">
                        <label for="past_history" class="form-label">PAST MEDICAL & SURGICAL HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="past_history" name="past_history"><?php if (isset($get->past_history)) {
                            echo $get->past_history;
                        } ?></textarea>
                    </div>

                    <div id="antenatal_h_o">
                        <label for="antenatal_h_o" class="form-label">ANTENATAL HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="antenatal_h_o" name="antenatal_h_o"><?php if (isset($get->antenatal_h_o)) {
                            echo $get->antenatal_h_o;
                        } ?></textarea>
                    </div>

                    <div id="">
                        <label for="natal_h_o" class="form-label">NATAL HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="natal_h_o" name="natal_h_o"><?php if (isset($get->natal_h_o)) {
                            echo $get->natal_h_o;
                        } ?></textarea>
                    </div>

                    <div id="">
                        <label for="post_natal_h_o" class="form-label">POST NATAL HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="post_natal_h_o" name="post_natal_h_o"><?php if (isset($get->post_natal_h_o)) {
                            echo $get->post_natal_h_o;
                        } ?></textarea>
                    </div>

                    <div id="" >
                        <label for="treatment_h_o" class="form-label">TREATMENT HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="treatment_h_o" name="treatment_h_o"><?php if (isset($get->treatment_h_o)) {
                            echo $get->treatment_h_o;
                        } ?></textarea>
                    </div>

                    <div id="" >
                        <label for="nutrition_h_o" class="form-label">NUTRITION HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="nutrition_h_o" name="nutrition_h_o"><?php if (isset($get->nutrition_h_o)) {
                            echo $get->nutrition_h_o;
                        } ?></textarea>
                    </div>

                    <div id="" >
                        <label for="immunization_h_o" class="form-label">IMMUNIZATION HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="immunization_h_o" name="immunization_h_o"><?php if (isset($get->immunization_h_o)) {
                            echo $get->immunization_h_o;
                        } ?></textarea>
                    </div>

                    <div id="">
                        <label for="development_h_o" class="form-label">DEVELOPMENTAL HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="development_h_o" name="development_h_o"><?php if (isset($get->development_h_o)) {
                            echo $get->development_h_o;
                        } ?></textarea>
                    </div>
                    <div id="">
                        <label for="family_h_o" class="form-label">FAMILY HISTORY</label>
                        <textarea rows="" class="form-control mb-5" id="family_h_o" name="family_h_o"><?php if (isset($get->family_h_o)) {
                            echo $get->family_h_o;
                        } ?></textarea>
                    </div>
                    <div id="">
                        <label for="contact_h_o" class="form-label">CONTACT HISTORY </label>
                        <textarea rows="" class="form-control mb-5" id="contact_h_o" name="contact_h_o"><?php if (isset($get->contact_h_o)) {
                            echo $get->contact_h_o;
                        } ?></textarea>
                    </div>
                </div>







                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="gen_examination_label" class="mt-5 pt-5 mb-4">GENERAL EXAMINATION </label>
                    <div class="row mx-0">
                        <div class="col-12 col-lg-6">
                            <div>
                                <label for="gen_examination_1" class="form-label">1.Level of Consciousness </label>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Alert" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Alert', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Alert</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Awake" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Awake', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Awake</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Confused" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Confused', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Confused</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Disoriented" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Disoriented', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Disoriented</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Lethargic" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Lethargic', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Lethargic</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Obtunded" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Obtunded', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Obtunded</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Stupor" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Stupor', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Stupor</span>
                                    </label></div>
                                <div class="checkbox-list"><label class="checkbox">
                                        <input type="checkbox" name="gen_examination_1[]" value="Comatose" <?php if (isset($get->gen_examination_1)) {
                                            if (in_array('Comatose', $get->gen_examination_1)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                        <span>Comatose</span>
                                    </label></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div>
                                <label for="gen_examination_2" class="form-label">2.Peripheral Examination </label>
                            <?php //print_r($get->gen_examination_2); exit;
                            ?>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Pollor" <?php if (isset($get->gen_examination_2)) {
                                        if (in_array('Pollor', $get->gen_examination_2)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                    <span>Pallor</span>
                                </label></div>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Icterus" <?php if (isset($get->gen_examination_2)) {
                                        if (in_array('Icterus', $get->gen_examination_2)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                    <span>Icterus</span>
                                </label></div>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Cyanosis" <?php if (isset($get->gen_examination_2)) {
                                        if (in_array('Cyanosis', $get->gen_examination_2)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                    <span>Cyanosis</span>
                                </label></div>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Clubbing" <?php if (isset($get->gen_examination_2)) {
                                        if (in_array('Clubbing', $get->gen_examination_2)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                    <span>Clubbing</span>
                                </label></div>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Lymphadenopathy"
                                        <?php if (isset($get->gen_examination_2)) {
                                            if (in_array('Lymphadenopathy', $get->gen_examination_2)) {
                                                echo 'checked';
                                            }
                                        } ?>>
                                    <span>Lymphadenopathy</span>
                                </label></div>
                            <div class="checkbox-list"><label class="checkbox">
                                    <input type="checkbox" name="gen_examination_2[]" value="Edema" <?php if (isset($get->gen_examination_2)) {
                                        if (in_array('Edema', $get->gen_examination_2)) {
                                            echo 'checked';
                                        }
                                    } ?>>
                                    <span>Edema</span>
                                </label></div>
                        </div>
                        </div>
                    </div>
                </div>


                <div id="" class="col-12 col-lg-8 col-lg-7 ">
                    <label for="vitals_label" class="mt-5 py-5">3.VITALS </label>

                    <div class="field-with-suffix mb-5">
                        <label for="vitals_hr" class="form-label">HR</label>
                        <input type="text" class="form-field" id="vitals_hr" name="vitals_hr"
                            value="<?php if (isset($get->vitals_hr)) {
                                echo $get->vitals_hr;
                            } ?>"><span class="ps-2"> / min</span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="vitals_rr" class="form-label">RR</label>
                        <input type="text" class="form-field" id="vitals_rr" name="vitals_rr"
                            value="<?php if (isset($get->vitals_rr)) {
                                echo $get->vitals_rr;
                            } ?>"><span class="ps-2"> / min</span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="vitals_spo2" class="form-label">SPO2</label>
                        <input type="text" class="form-field" id="vitals_spo2" name="vitals_spo2"
                            value="<?php if (isset($get->vitals_spo2)) {
                                echo $get->vitals_spo2;
                            } ?>"><span class="ps-2">%</span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="vitals_bp" class="form-label">BP</label>
                        <input type="text" class="form-field" id="vitals_bp" name="vitals_bp"
                            value="<?php if (isset($get->vitals_bp)) {
                                echo $get->vitals_bp;
                            } ?>"><span class="ps-2"> mmHg</span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="vitals_temperature" class="form-label">Temperature </label>
                        <input type="text" class="form-field" id="vitals_temperature"
                            name="vitals_temperature" value="<?php if (isset($get->vitals_temperature)) {
                                echo $get->vitals_temperature;
                            } ?>"><span class="ps-2">
                            °F</span>
                    </div>
                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="anthrapometry_label" class="mt-5 pt-5 mb-4">4. ANTHROPOMETRY </label>

                    <div class="field-with-suffix mb-5">
                        <label for="anthrapometry_weight" class="form-label">Weight</label>
                        <input type="text" class="form-field" id="anthrapometry_weight"
                            name="anthrapometry_weight" value="<?php if (isset($get->anthrapometry_weight)) {
                                echo $get->anthrapometry_weight;
                            } ?>"><span class="ps-2"> kg</span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="anthrapometry_height" class="form-label">Height </label>
                        <input type="text" class="form-field" id="anthrapometry_height"
                            name="anthrapometry_height" value="<?php if (isset($get->anthrapometry_height)) {
                                echo $get->anthrapometry_height;
                            } ?>"><span class="ps-2">cm </span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="anthrapometry_head_circumference"class="form-label">Head Circumference</label>
                        <input type="text" class="form-field"
                            id="anthrapometry_head_circumference" name="anthrapometry_head_circumference"
                            value="<?php if (isset($get->anthrapometry_head_circumference)) {
                                echo $get->anthrapometry_head_circumference;
                            } ?>"><span class="ps-2">cm </span>
                    </div>

                    <div class="field-with-suffix mb-5">
                        <label for="mid_arm_circumference" class="form-label">Mid Arm Circumfernece</label>
                        <input type="text" class="form-field"
                            id="mid_arm_circumference" name="mid_arm_circumference" value="<?php if (isset($get->mid_arm_circumference)) {
                                echo $get->mid_arm_circumference;
                            } ?>"><span
                            class="ps-2">cm </span>
                    </div>
                </div>


                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="primamry_assessment_label d-block" class="mt-5 pt-5 mb-4">5. PRIMARY ASSESSMENT </label>
                    <label for="pa_airway" class="form-label d-block">AIRWAY </label>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 d-flex flex-wrap align-items-center gap-3 ">
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input type="checkbox" name="pa_airway[]" value="Open and Stable" <?php if (isset($get->pa_airway)) {
                                if (in_array('Open and Stable', $get->pa_airway)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Open and Stable</span>
                        </label>
                    </div>
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input type="checkbox" name="pa_airway[]" value="Obstructed maintainable"
                                <?php if (isset($get->pa_airway)) {
                                    if (in_array('Obstructed maintainable', $get->pa_airway)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Obstructed, maintainable</span>
                        </label>
                    </div>
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input type="checkbox" name="pa_airway[]" value="Obstructed non-maintainable"
                                <?php if (isset($get->pa_airway)) {
                                    if (in_array('Obstructed non-maintainable', $get->pa_airway)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Obstructed, non-maintainable</span>
                        </label>
                    </div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="breathing_label"
                        class="mt-5 pt-5 mb-4">BREATHING </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="pa_breathing_resprate"
                            class="form-label">Respiratory
                            rate</label> <input type="text" class="form-field" id="pa_breathing_resprate"
                            name="pa_breathing_resprate" value="<?php if (isset($get->pa_breathing_resprate)) {
                                echo $get->pa_breathing_resprate;
                            } ?>"><span class="ps-2"> / min</span>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <label for="pa_breathing_efforts" class="form-label">Efforts : </label>
                </div>
                <div id="" class="col-12 col-md-7 d-flex gap-3 flex-wrap align-items-center mb-3">
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_efforts[]" value="Normal" <?php if (isset($get->pa_breathing_efforts)) {
                                if (in_array('Normal', $get->pa_breathing_efforts)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Normal</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_efforts[]" value="Increased" <?php if (isset($get->pa_breathing_efforts)) {
                                if (in_array('Increased', $get->pa_breathing_efforts)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Increased</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_efforts[]" value="Poor" <?php if (isset($get->pa_breathing_efforts)) {
                                if (in_array('Poor', $get->pa_breathing_efforts)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Poor</span>
                        </label></div>
                </div>
                <div class="col-12 col-md-7">
                    <label for="pa_breathing_airentry" class="form-label">Air Entry : </label>
                </div>
                <div id="" class="col-12 col-md-7 d-flex gap-3 flex-wrap align-items-center">
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_airentry[]" value="Normal" <?php if (isset($get->pa_breathing_airentry)) {
                                if (in_array('Normal', $get->pa_breathing_airentry)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Normal</span>
                        </label>
                    </div>

                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_airentry[]" value="Differential"
                                <?php if (isset($get->pa_breathing_airentry)) {
                                    if (in_array('Differential', $get->pa_breathing_airentry)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Differential</span>
                        </label>
                    </div>
                    <div class="checkbox-list"><label class="checkbox">
                        <input type="checkbox" name="pa_breathing_airentry[]" value="Poor" <?php if (isset($get->pa_breathing_airentry)) {
                            if (in_array('Poor', $get->pa_breathing_airentry)) {
                                echo 'checked';
                            }
                        } ?>>
                        <span>Poor</span>
                    </label>
                </div>
                    </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_restractions"
                            class="form-label">Retraction</label> <input type="text" class="form-field"
                            id="pa_breathing_restractions" name="pa_breathing_restractions"
                            value="<?php if (isset($get->pa_breathing_restractions)) {
                                echo $get->pa_breathing_restractions;
                            } ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 "> <label for="pa_breathing_ausculation"
                        class="form-label">Auscultation :
                    </label>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_ausculation[]" value="None" <?php if (isset($get->pa_breathing_ausculation)) {
                                if (in_array('None', $get->pa_breathing_ausculation)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>None</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_ausculation[]" value="Stridor"
                                <?php if (isset($get->pa_breathing_ausculation)) {
                                    if (in_array('Stridor', $get->pa_breathing_ausculation)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Stridor</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_ausculation[]" value="Grunt" <?php if (isset($get->pa_breathing_ausculation)) {
                                if (in_array('Grunt', $get->pa_breathing_ausculation)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Grunt</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_ausculation[]" value="Wheeze" <?php if (isset($get->pa_breathing_ausculation)) {
                                if (in_array('Wheeze', $get->pa_breathing_ausculation)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Wheeze</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_ausculation[]" value="Crackles"
                                <?php if (isset($get->pa_breathing_ausculation)) {
                                    if (in_array('Crackles', $get->pa_breathing_ausculation)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Crackles</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-6 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_spo2" class="form-label">Spo2
                        </label> <input type="text" class="form-field" id="pa_breathing_spo2"
                            name="pa_breathing_spo2" value="<?php if (isset($get->pa_breathing_spo2)) {
                                echo $get->pa_breathing_spo2;
                            } ?>"><span class="ps-2">% </span></div>
                </div>
                <div id="" class="col-12 col-lg-6">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_fio2" class="form-label">Fio2
                        </label> <input type="text" class="form-field" id="pa_breathing_fio2"
                            name="pa_breathing_fio2" value="<?php if (isset($get->pa_breathing_fio2)) {
                                echo $get->pa_breathing_fio2;
                            } ?>"><span class="ps-2"> %</span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="circulation_label"
                        class="mt-5 pt-5 mb-4">CIRCULATION </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_heartrate" class="form-label">Heart
                            rate</label> <input type="text" class="form-field" id="pa_breathing_heartrate"
                            name="pa_breathing_heartrate" value="<?php if (isset($get->pa_breathing_heartrate)) {
                                echo $get->pa_breathing_heartrate;
                            } ?>"><span class="ps-2"> /min</span>
                    </div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7">
                    <label for="pa_breathing_central_pulse" class="form-label">Central Pulse : </label>
                </div>
                <div id="" class="col-12 d-flex gap-3 flex-wrap align-items-center mb-3">

                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Good"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Good', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Good</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Weak"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Weak', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Weak</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Absent"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Absent', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Absent</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7">
                    <label for="pa_breathing_peripheral_pulse" class="form-label">Peripheral Pulse : </label>
                </div>
                <div id="" class="col-12 d-flex gap-3 flex-wrap align-items-center ">

                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_peripheral_pulse[]" value="Good"
                                <?php if (isset($get->pa_breathing_peripheral_pulse)) {
                                    if (in_array('Good', $get->pa_breathing_peripheral_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Good</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_peripheral_pulse[]" value="Weak"
                                <?php if (isset($get->pa_breathing_peripheral_pulse)) {
                                    if (in_array('Weak', $get->pa_breathing_peripheral_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Weak</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_peripheral_pulse[]" value="Absent"
                                <?php if (isset($get->pa_breathing_peripheral_pulse)) {
                                    if (in_array('Absent', $get->pa_breathing_peripheral_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Absent</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_cft" class="form-label">CFT</label>
                        <input type="text" class="form-field" id="pa_breathing_cft" name="pa_breathing_cft"
                            value="<?php if (isset($get->pa_breathing_cft)) {
                                echo $get->pa_breathing_cft;
                            } ?>"><span class="ps-2">seconds</span></div>
                </div>
                <div id="" class="col-12 d-flex gap-3 flex-wrap align-items-center"> <label
                        for="pa_breathing_skin_temp" class="form-label">Skin Temperature : </label>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_skin_temp[]" value="Warm" <?php if (isset($get->pa_breathing_skin_temp)) {
                                if (in_array('Warm', $get->pa_breathing_skin_temp)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Warm</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_skin_temp[]" value="Cold" <?php if (isset($get->pa_breathing_skin_temp)) {
                                if (in_array('Cold', $get->pa_breathing_skin_temp)) {
                                    echo 'checked';
                                }
                            } ?>>
                            <span>Cold</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="disability_label" class="mt-5 pt-5 mb-4">DISABILITY </label>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="pa_disability_motor_activity" class="form-label">Motor Activity : </label>
                </div>
                <div id="" class="col-12  d-flex gap-3 flex-wrap align-items-center">
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_disability_motor_activity[]" value="Normal and Symmetrical"
                                <?php if (isset($get->pa_disability_motor_activity)) {
                                    if (in_array('Normal and Symmetrical', $get->pa_disability_motor_activity)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Normal &amp; Symmetrical</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_disability_motor_activity[]" value="Asymmetrical seizure"
                                <?php if (isset($get->pa_disability_motor_activity)) {
                                    if (in_array('Asymmetrical seizure', $get->pa_disability_motor_activity)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Asymmetrical</span>
                        </label></div>
                        <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_disability_motor_activity[]" value="Asymmetrical seizure"
                                <?php if (isset($get->pa_disability_motor_activity)) {
                                    if (in_array('Asymmetrical seizure', $get->pa_disability_motor_activity)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Seizure</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_disability_motor_activity[]" value="Posturing"
                                <?php if (isset($get->pa_disability_motor_activity)) {
                                    if (in_array('Posturing', $get->pa_disability_motor_activity)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Posturing</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_disability_motor_activity[]" value="Extrapyramidal"
                                <?php if (isset($get->pa_disability_motor_activity)) {
                                    if (in_array('Extrapyramidal', $get->pa_disability_motor_activity)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Extrapyramidal</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_blood_glucose" class="form-label">Blood
                            Glucose</label> <input type="text" class="form-field" id="pa_breathing_blood_glucose"
                            name="pa_breathing_blood_glucose" value="<?php if (isset($get->pa_breathing_blood_glucose)) {
                                echo $get->pa_breathing_blood_glucose;
                            } ?>"><span class="ps-2">
                            mg/dl</span></div>
                </div>
                <!-- CHANGE INTO -->
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="circulation_label"
                        class="mt-5 pt-5 mb-4">EXPOSURE : </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_cir_temp"
                            class="form-label">Temperature</label> <input type="text" class="form-field" id="pa_breathing_cir_temp"
                            name="pa_breathing_cir_temp" value="<?php if (isset($get->pa_breathing_cir_temp)) {
                                echo $get->pa_breathing_cir_temp;
                            } ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 d-flex gap-3 flex-wrap align-items-center "> <label
                        for="pa_breathing_central_pulse" class="form-label">Color: </label>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Normal"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Normal', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Normal</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Pollor"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Pollor', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Pallor</span>
                        </label></div>
                    <div class="checkbox-list"><label class="checkbox">
                            <input type="checkbox" name="pa_breathing_central_pulse[]" value="Cyanosis"
                                <?php if (isset($get->pa_breathing_central_pulse)) {
                                    if (in_array('Cyanosis', $get->pa_breathing_central_pulse)) {
                                        echo 'checked';
                                    }
                                } ?>>
                            <span>Cyanosis</span>
                        </label></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="pa_breathing_surface_findings"
                            class="form-label">Surface Findings</label> <input type="text" class="form-field"
                            id="pa_breathing_surface_findings" name="pa_breathing_surface_findings"
                            value="<?php if (isset($get->pa_breathing_surface_findings)) {
                                echo $get->pa_breathing_surface_findings;
                            } ?>"><span class="ps-2"> </span></div>
                </div>
                <!-- ill change here -->
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                        <div id="final_physio_imp">
                            <label for="pa_breathing_fpi"
                                class="form-label"> FINAL PHYSIOLOGICAL IMPRESSION </label>
                            </label>
    <textarea rows="" class="form-control mb-5 pb-5" id="final_physio_imp" name="final_physio_imp"><?php if (isset($get->final_physio_imp)) { echo $get->final_physio_imp;
                            } ?></textarea>
                        </div>

                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="htf_examination_label"
                        class="mt-5 pt-5 mb-4">HEAD TO FOOT EXAMINATION </label></div>
                <div id="food_examination_head_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">A. Head</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_head"><input type="checkbox"
                                id="food_examination_head" name="head_foot_examine[]" value="hfe_head"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_head", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_head">

 <textarea rows="" class="form-control" id="food_examination_head" name="food_examination_head"><?php if (isset($get->food_examination_head)) {
    echo $get->food_examination_head;
} ?></textarea>

                            </label></div>
                </div>
                <div id="food_examination_hair_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">B. Hair</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_hair"><input type="checkbox"
                                id="food_examination_hair" name="head_foot_examine[]" value="hfe_hair"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_hair", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label>
                                 <label class="input-fld"
                            for="food_examination_hair"> <textarea rows="" class="form-control" id="food_examination_hair" name="food_examination_hair"><?php if (isset($get->food_examination_hair)) {
                                echo $get->food_examination_hair;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_face_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">C. Face</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_face"><input type="checkbox"
                                id="food_examination_face" name="head_foot_examine[]" value="hfe_face"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_face", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_face"> <textarea rows="" class="form-control" id="food_examination_face" name="food_examination_face"><?php if (isset($get->food_examination_face)) {
                                echo $get->food_examination_face;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_eyes_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">D. Eyes</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_eyes"><input type="checkbox"
                                id="food_examination_eyes" name="head_foot_examine[]" value="hfe_eyes"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_eyes", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_eyes"> <textarea rows="" class="form-control" id="food_examination_eyes" name="food_examination_eyes"><?php if (isset($get->food_examination_eyes)) {
                                echo $get->food_examination_eyes;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_ears_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">E. Ears</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_ears"><input type="checkbox"
                                id="food_examination_ears" name="head_foot_examine[]" value="hfe_eyes"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_eyes", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_ears"> <textarea rows="" class="form-control" id="food_examination_ears" name="food_examination_ears"><?php if (isset($get->food_examination_ears)) {
                                echo $get->food_examination_ears;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_nose_container" class="input-with-checkbox inv-general has-txt-area py-3">
                    <div class="input-lbl">F. Nose</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_nose"><input type="checkbox"
                                id="food_examination_nose" name="head_foot_examine[]" value="hfe_nose"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_nose", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_nose"> <textarea rows="" class="form-control" id="food_examination_nose" name="food_examination_nose"><?php if (isset($get->food_examination_nose)) {
                                echo $get->food_examination_nose;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_lips_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">G. Lips</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_lips"><input type="checkbox"
                                id="food_examination_lips" name="head_foot_examine[]" value="hfe_lips"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_lips", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_lips"> <textarea rows="" class="form-control" id="food_examination_lips" name="food_examination_lips"><?php if (isset($get->food_examination_lips)) {
                                echo $get->food_examination_lips;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_tongue_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">H. Tongue</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_tongue"><input type="checkbox"
                                id="food_examination_tongue" name="head_foot_examine[]" value="hfe_tongue"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_tongue", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_tongue"> <textarea rows="" class="form-control" id="food_examination_tongue" name="food_examination_tongue"><?php if (isset($get->food_examination_tongue)) {
                                echo $get->food_examination_tongue;
                            } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_teeth_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">I. Teeth</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_teeth"><input type="checkbox"
                                id="food_examination_teeth" name="head_foot_examine[]" value="hfe_teeth"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_teeth", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_teeth"> <textarea rows="" class="form-control" id="food_examination_teeth" name="food_examination_teeth"><?php if (isset($get->food_examination_teeth)) {
                                echo $get->food_examination_teeth;
                            } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_oral_cavity_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">J. Oral Cavity</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_oral_cavity">
                    <input type="checkbox" id="food_examination_oral_cavity" name="head_foot_examine[]"
                    value="hfe_oral" <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_oral", $get->head_foot_examine)){ echo "checked"; }}?>>
                   <span>
                                NAD</span></label>
                        <label class="input-fld" for="food_examination_oral_cavity"> <textarea rows="" class="form-control" id="food_examination_oral_cavity" name="food_examination_oral_cavity"><?php if (isset($get->food_examination_oral_cavity)) {
                            echo $get->food_examination_oral_cavity;
                        } ?></textarea>
                                    </label>
                    </div>
                </div>
                <div id="food_examination_throat_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">K. Throat</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_throat"><input type="checkbox"
                                id="food_examination_throat" name="head_foot_examine[]" value="hfe_throat" <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_throat", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label>
                               <label class="input-fld"
                            for="food_examination_throat"> <textarea rows="" class="form-control" id="food_examination_throat" name="food_examination_throat"><?php if (isset($get->food_examination_throat)) {
                                echo $get->food_examination_throat;
                            } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_neck_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">L. Neck</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_neck"><input type="checkbox"
                                id="food_examination_neck" name="head_foot_examine[]" value="hfe_neck"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_neck", $get->head_foot_examine)){ echo "checked"; }}?>><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_neck"> <textarea rows="" class="form-control" id="food_examination_neck" name="food_examination_neck"><?php if (isset($get->food_examination_neck)) {
                                echo $get->food_examination_neck;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_chest_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">M. Chest</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_chest"><input type="checkbox"
                                id="food_examination_chest" name="head_foot_examine[]" value="hfe_chest"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_chest", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span> NAD</span></label> <label class="input-fld"
                            for="food_examination_chest"> <textarea rows="" class="form-control" id="food_examination_chest" name="food_examination_chest"><?php if (isset($get->food_examination_chest)) {
                                echo $get->food_examination_chest;
                            } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_abdomen_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">N. Abdomen</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_abdomen"><input
                                type="checkbox" id="food_examination_abdomen" name="head_foot_examine[]"
                                value="hfe_abdomen" <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_abdomen", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span> NAD</span></label>
                        <label class="input-fld" for="food_examination_abdomen"> <textarea rows="" class="form-control" id="food_examination_abdomen" name="food_examination_abdomen"><?php if (isset($get->food_examination_abdomen)) {
                            echo $get->food_examination_abdomen;
                        } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_upper_extermities_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">O. Upper Extermities</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_upper_extermities"><input
                                type="checkbox" id="food_examination_upper_extermities"
                                name="head_foot_examine[]" value="hfe_upper_extermities"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_upper_extermities", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span>
                                NAD</span></label> <label class="input-fld"
                            for="food_examination_upper_extermities"> <textarea rows="" class="form-control" id="food_examination_upper_extermities" name="food_examination_upper_extermities"><?php if (isset($get->food_examination_upper_extermities)) {
                                echo $get->food_examination_upper_extermities;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_lower_extermities_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">P. Lower Extermities</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_lower_extermities"><input
                                type="checkbox" id="food_examination_lower_extermities"
                                name="head_foot_examine[]" value="hfe_lower_extermities"
                                <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_lower_extermities", $get->head_foot_examine)){ echo "checked"; }}?>><span>
                                NAD</span></label> <label class="input-fld"
                            for="food_examination_lower_extermities"> <textarea rows="" class="form-control" id="food_examination_lower_extermities" name="food_examination_lower_extermities"><?php if (isset($get->food_examination_lower_extermities)) {
                                echo $get->food_examination_lower_extermities;
                            } ?></textarea></label></div>
                </div>
                <div id="food_examination_skull_spine_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">Q. Skull and Spine</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_skull_spine"><input
                                type="checkbox" id="food_examination_skull_spine"
                                name="head_foot_examine[]" value="hfe_skull_spine" <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_skull_spine", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span>
                                NAD</span></label>
                        <label class="input-fld" for="food_examination_skull_spine"> <textarea rows="" class="form-control" id="food_examination_skull_spine" name="food_examination_skull_spine"><?php if (isset($get->food_examination_skull_spine)) {
                            echo $get->food_examination_skull_spine;
                        } ?></textarea></label>
                    </div>
                </div>
                <div id="food_examination_gentials_container" class="input-with-checkbox inv-general py-3">
                    <div class="input-lbl">R. Genitals</div>
                    <div class="input-fld "><label class="checkbox" for="food_examination_gentials"><input
                                type="checkbox" id="food_examination_gentials" name="head_foot_examine[]"
                                value="hfe_gentials" <?php if(isset($get->head_foot_examine)){ if(in_array("hfe_gentials", $get->head_foot_examine)){ echo "checked"; }}?>
                                ><span> NAD</span></label>
                        <label class="input-fld" for="food_examination_gentials"> <textarea rows="" class="form-control" id="food_examination_gentials" name="food_examination_gentials"><?php if (isset($get->food_examination_gentials)) {
                            echo $get->food_examination_gentials;
                        } ?></textarea></label>
                    </div>
                </div>
                <h4 class="p-0 my-5 color-primary ">DEVELOPMENTAL HISTORY</h4>
                <div class="table-style-one py-3 PX-0">
                    <div class="table-responsive py-3">
                        <table class="table ">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="bg-color-v1 text-center">Gross Motor</th>
                                    <th scope="col" class="bg-color-v1 text-center">Attained</th>
                                    <th scope="col" class="bg-color-v1 text-center">Expected</th>
                                    <th scope="col" class="bg-color-v1 text-center">DQ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start">HEAD CONTROL</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="developmental_head_control"  value="<?php if (isset($get->developmental_head_control)) {
                                            echo $get->developmental_head_control;  } ?> ">
                                         </td>
                                    <td class="text-center">3 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_head_control_dq"
                                            value="<?php if (isset($get->gross_motor_head_control_dq)) {
                                                echo $get->gross_motor_head_control_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ROLL OVER</td>
                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_roll_over"  value="<?php if (isset($get->developmental_roll_over)) {
                                                echo $get->developmental_roll_over;  } ?> ">
                                             </td>
                                    <td class="text-center">5 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_rollover_dq"
                                            value="<?php if (isset($get->gross_motor_rollover_dq)) {
                                                echo $get->gross_motor_rollover_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SITS WITH SUPPORT</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_sit_support"  value="<?php if (isset($get->developmental_sit_support)) {
                                                echo $get->developmental_sit_support;  } ?> ">
                                             </td>


                                    <td class="text-center">6 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_sits_with_support_dq"
                                            value="<?php if (isset($get->gross_motor_sits_with_support_dq)) {
                                                echo $get->gross_motor_sits_with_support_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SITS WITHOUT SUPPORT</td>
                                        <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_sit_without_support"  value="<?php if (isset($get->developmental_sit_without_support)) {
                                                echo $get->developmental_sit_without_support;  } ?> ">
                                             </td>

                                    <td class="text-center">8 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_sits_with_out_support_dq"
                                            value="<?php if (isset($get->gross_motor_sits_with_out_support_dq)) {
                                                echo $get->gross_motor_sits_with_out_support_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">CREEPS &amp; CRAWL</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_creeps_crawl"  value="<?php if (isset($get->developmental_creeps_crawl)) {
                                                echo $get->developmental_creeps_crawl;  } ?> ">
                                             </td>
                                    <td class="text-center">9 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_stands_c_support_dq"
                                            value="<?php if (isset($get->gross_motor_stands_c_support_dq)) {
                                                echo $get->gross_motor_stands_c_support_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">STANDS WITH SUPPORT</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="developmental_standw_support"  value="<?php if (isset($get->developmental_standw_support)) {
                                            echo $get->developmental_standw_support;  } ?> ">
                                         </td>
                                    <td class="text-center">12 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_creeps_crawl_dq"
                                            value="<?php if (isset($get->gross_motor_creeps_crawl_dq)) {
                                                echo $get->gross_motor_creeps_crawl_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">WALK ALONE</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_walk_alone"  value="<?php if (isset($get->developmental_walk_alone)) {
                                                echo $get->developmental_walk_alone;  } ?> ">
                                             </td>
                                    <td class="text-center">15 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_walk_alone_dq"
                                            value="<?php if (isset($get->gross_motor_walk_alone_dq)) {
                                                echo $get->gross_motor_walk_alone_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">RUN</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_run"  value="<?php if (isset($get->developmental_run)) {
                                                echo $get->developmental_run;  } ?> ">
                                             </td>
                                    <td class="text-center">18 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_run_dq"
                                            value="<?php if (isset($get->gross_motor_run_dq)) {
                                                echo $get->gross_motor_run_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">WALK UP AND DOWN STAIRS (2 FEET / STEP)</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_wake_up"  value="<?php if (isset($get->developmental_wake_up)) {
                                                echo $get->developmental_wake_up;  } ?> ">
                                             </td>
                                    <td class="text-center">2 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_walk_up_and_down_stairs_dq"
                                            value="<?php if (isset($get->gross_motor_walk_up_and_down_stairs_dq)) {
                                                echo $get->gross_motor_walk_up_and_down_stairs_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">JUMP</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_jump"  value="<?php if (isset($get->developmental_jump)) {
                                                echo $get->developmental_jump;  } ?> ">
                                             </td>
                                    <td class="text-center">3 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_jump_dq"
                                            value="<?php if (isset($get->gross_motor_jump_dq)) {
                                                echo $get->gross_motor_jump_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">HOPS</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="developmental_hops"  value="<?php if (isset($get->developmental_hops)) {
                                                echo $get->developmental_hops;  } ?> ">
                                             </td>
                                    <td class="text-center">4 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="gross_motor_hops_dq"
                                            value="<?php if (isset($get->gross_motor_hops_dq)) {
                                                echo $get->gross_motor_hops_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h4 class="p-0 my-5 color-primary ">FINE MOTOR</h4>

                <div class="table-style-one py-3 PX-0">
                    <div class="table-responsive py-3">
                        <table class="table ">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="bg-color-v1 text-center">Fine Motor</th>
                                    <th scope="col" class="bg-color-v1 text-center">Attained</th>
                                    <th scope="col" class="bg-color-v1 text-center">Expected</th>
                                    <th scope="col" class="bg-color-v1 text-center">DQ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start">BIDEXTROUS REACH</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_biidextrous"  value="<?php if (isset($get->copy_biidextrous)) {
                                                echo $get->copy_biidextrous;  } ?> ">
                                             </td>
                                    <td class="text-center">5 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_bidextrous_reach_dq"
                                            value="<?php if (isset($get->finr_motor_bidextrous_reach_dq)) {
                                                echo $get->finr_motor_bidextrous_reach_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">UNIDEXTROUS REACH</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_unidextrous"  value="<?php if (isset($get->copy_unidextrous)) {
                                                echo $get->copy_unidextrous;  } ?> ">
                                             </td>

                                    <td class="text-center">6 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_unidextrous_reach_dq"
                                            value="<?php if (isset($get->finr_motor_unidextrous_reach_dq)) {
                                                echo $get->finr_motor_unidextrous_reach_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">IMMATURE PINCER GRASP</td>
                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_immature_pincer_grasp"  value="<?php if (isset($get->copy_immature_pincer_grasp)) {
                                                echo $get->copy_immature_pincer_grasp;  } ?> ">
                                             </td>

                                    <td class="text-center">9 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_immature_pincer_grasp_dq"
                                            value="<?php if (isset($get->finr_motor_immature_pincer_grasp_dq)) {
                                                echo $get->finr_motor_immature_pincer_grasp_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">MATURE PINCER GRASP</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_mature_pincer_grasp"  value="<?php if (isset($get->copy_mature_pincer_grasp)) {
                                                echo $get->copy_mature_pincer_grasp;  } ?> ">
                                             </td>
                                    <td class="text-center">12 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_mature_grasp_dq"
                                            value="<?php if (isset($get->finr_motor_mature_grasp_dq)) {
                                                echo $get->finr_motor_mature_grasp_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SCRIBBLING /TOWER 2 BLOCKS</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="finr_motor_copies"  value="<?php if (isset($get->finr_motor_copies)) {
                                                echo $get->finr_motor_copies;  } ?> ">
                                    </td>

                                    <td class="text-center">15 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_scribbling_tower_2_blocks_dq"
                                            value="<?php if (isset($get->finr_motor_scribbling_tower_2_blocks_dq)) {
                                                echo $get->finr_motor_scribbling_tower_2_blocks_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SCRIBBLE / TOWER 3 BLOCKS</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="finr_motor_copies_3"  value="<?php if (isset($get->finr_motor_copies_3_3)) {
                                                echo $get->finr_motor_copies_3;  } ?> ">
                                    </td>
                                    <td class="text-center">18 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_scribble_tower_3_blocks_dq"
                                            value="<?php if (isset($get->finr_motor_scribble_tower_3_blocks_dq)) {
                                                echo $get->finr_motor_scribble_tower_3_blocks_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">TOWER 6 BLOCKS</td>
                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_tower_6_block"  value="<?php if (isset($get->copy_tower_6_block)) {
                                                echo $get->copy_tower_6_block;  } ?> ">
                                    </td>
                                    <td class="text-center">2 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_tower_6_blocks_dq"
                                            value="<?php if (isset($get->finr_motor_tower_6_blocks_dq)) {
                                                echo $get->finr_motor_tower_6_blocks_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">TOWER 9 BLOCKS /COPIES CIRCLE</td>


                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_tower_9_block"  value="<?php if (isset($get->copy_tower_9_block)) {
                                                echo $get->copy_tower_9_block;  } ?> ">
                                    </td>
                                    <td class="text-center">3 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_tower_9_blocks_copies_circle_dq"
                                            value="<?php if (isset($get->finr_motor_tower_9_blocks_copies_circle_dq)) {
                                                echo $get->finr_motor_tower_9_blocks_copies_circle_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">COPIES CROSS /BRIDGE C BLOCKS</td>

                                         <td class="text-center"><input type="text" class="form-control-food w-100px"
                                            name="copy_cross_bridge"  value="<?php if (isset($get->copy_cross_bridge)) {
                                                echo $get->copy_cross_bridge;  } ?> ">
                                    </td>
                                    <td class="text-center">4 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_copies_cross_bridge_c_blocks_dq"
                                            value="<?php if (isset($get->finr_motor_copies_cross_bridge_c_blocks_dq)) {
                                                echo $get->finr_motor_copies_cross_bridge_c_blocks_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">COPIES TRIANGLE /GATE C BLOCKS</td>

                                     <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="copy_triangle"  value="<?php if (isset($get->copy_triangle)) {
                                            echo $get->copy_triangle;  } ?> ">
                                </td>

                                    <td class="text-center">5 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="finr_motor_copies_triangle_gate_c_blocks_dq"
                                            value="<?php if (isset($get->finr_motor_copies_triangle_gate_c_blocks_dq)) {
                                                echo $get->finr_motor_copies_triangle_gate_c_blocks_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4 class="p-0 my-5 color-primary ">SOCIAL &amp; ADAPTIVE</h4>
                <div class="table-style-one py-3 PX-0">
                    <div class="table-responsive py-3">
                        <table class="table ">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="bg-color-v1 text-center">Social &amp; Adaptive</th>
                                    <th scope="col" class="bg-color-v1 text-center">Attained</th>
                                    <th scope="col" class="bg-color-v1 text-center">Expected</th>
                                    <th scope="col" class="bg-color-v1 text-center">DQ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start">SOCIAL SMILE</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="social_smile"  value="<?php if (isset($get->social_smile)) {
                                            echo $get->social_smile;  } ?> ">
                                </td>
                                    <td class="text-center">2 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">RECOGNIZES MOTHER</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="recog_mother"  value="<?php if (isset($get->recog_mother)) {
                                            echo $get->recog_mother;  } ?> ">
                                    </td>
                                    <td class="text-center">5 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">STRANGER ANXIETY</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="strainger_anxiety"  value="<?php if (isset($get->strainger_anxiety)) {
                                            echo $get->strainger_anxiety;  } ?> ">
                                </td>
                                    <td class="text-center">6 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">WAVES BYE - BYE</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="waves_bye"  value="<?php if (isset($get->waves_bye)) {
                                            echo $get->waves_bye;  } ?> ">
                                    </td>
                                    <td class="text-center">9 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SIMPLE BALL GAME</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="social_adaptive"  value="<?php if (isset($get->social_adaptive)) {
                                            echo $get->social_adaptive;  } ?> ">
                                    </td>
                                    <td class="text-center">12 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">JARGON SPEECH</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="jargon_speech"  value="<?php if (isset($get->jargon_speech)) {
                                            echo $get->jargon_speech;  } ?> ">
                                    </td>
                                    <td class="text-center">15 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">COPIES PARENTS</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="toys_name_gender"  value="<?php if (isset($get->toys_name_gender)) {
                                            echo $get->toys_name_gender;  } ?> ">
                                    </td>
                                    <td class="text-center">18 Months</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ASK FOR FOOD / TOILET</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="food_toilet"  value="<?php if (isset($get->food_toilet)) {
                                            echo $get->food_toilet;  } ?> ">
                                    </td>
                                    <td class="text-center">2 Years</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SHARES TOYS / NAMES / GENDER</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="toys_name_gender"  value="<?php if (isset($get->toys_name_gender)) {
                                            echo $get->toys_name_gender;  } ?> ">
                                    </td>
                                    <td class="text-center">3 Years</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">CO-OPERATIVE PLAY</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="co_op_play"  value="<?php if (isset($get->co_op_play)) {
                                            echo $get->co_op_play;  } ?> ">
                                    </td>
                                    <td class="text-center">4 Years</td>
                                    <td class="text-center"> </td>
                                </tr>
                                <tr>
                                    <td class="text-start">DRESS/ UNDRESS</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="dress_undress"  value="<?php if (isset($get->dress_undress)) {
                                            echo $get->dress_undress;  } ?> ">
                                    </td>
                                    <td class="text-center">4 Years</td>
                                    <td class="text-center"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h4 class="p-0 my-5 color-primary ">LANGUAGE MILESTONE</h4>
                <div class="table-style-one py-3 PX-0">
                    <div class="table-responsive py-3">
                        <table class="table ">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="bg-color-v1 text-center">Language Milestone</th>
                                    <th scope="col" class="bg-color-v1 text-center">Attained</th>
                                    <th scope="col" class="bg-color-v1 text-center">Expected</th>
                                    <th scope="col" class="bg-color-v1 text-center">DQ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td class="text-start">ALERTS TO SOUND</td>
                                    <td class="text-center"><input type="checkbox"
                                        name="language_milestone[]" value="alerts_sound"
                                        <?php if(isset($get->language_milestone)){ if(in_array("alerts_sound", $get->language_milestone)){ echo "checked"; }}?> >
                                    </td>
                                    <td class="text-center">2 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_alerts_to_sound_dq"
                                            value="<?php if (isset($get->language_milestone_alerts_to_sound_dq)) {
                                                echo $get->language_milestone_alerts_to_sound_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr> -->
                                <tr>
                                    <td class="text-start">COOS AND BABBLES</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="coos_babbles"  value="<?php if (isset($get->coos_babbles)) {
                                            echo $get->coos_babbles;  } ?> ">
                                    </td>
                                    <td class="text-center">2 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_coos_dq"
                                            value="<?php if (isset($get->language_milestone_coos_dq)) {
                                                echo $get->language_milestone_coos_dq;
                                            } ?>
                                    ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">LAUGH LOUDLY</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="language_laugh_loudly"  value="<?php if (isset($get->language_laugh_loudly)) {
                                            echo $get->language_laugh_loudly;  } ?> ">
                                    </td>
                                    <td class="text-center">4 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_laugh_loud_dq"
                                            value="<?php if (isset($get->language_milestone_laugh_loud_dq)) {
                                                echo $get->language_milestone_laugh_loud_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">MONOSYLLABLES</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="monosyllables"  value="<?php if (isset($get->monosyllables)) {
                                            echo $get->monosyllables;  } ?> ">
                                    </td>
                                    <td class="text-center">6 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_monosyllables_dq"
                                            value="<?php if (isset($get->language_milestone_monosyllables_dq)) {
                                                echo $get->language_milestone_monosyllables_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">BISYLLABLES</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="bisyllables"  value="<?php if (isset($get->bisyllables)) {
                                            echo $get->bisyllables;  } ?> ">
                                    </td>
                                    <td class="text-center">9 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_bisyllables_dq"
                                            value="<?php if (isset($get->language_milestone_bisyllables_dq)) {
                                                echo $get->language_milestone_bisyllables_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">1-2 WORD WITH MEANING</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="lang_1_2_word"  value="<?php if (isset($get->lang_1_2_word)) {
                                            echo $get->lang_1_2_word;  } ?> ">
                                    </td>
                                    <td class="text-center">12 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_1_2_word_with_meaning_dq"
                                            value="<?php if (isset($get->language_milestone_1_2_word_with_meaning_dq)) {
                                                echo $get->language_milestone_1_2_word_with_meaning_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">8-10 VOCABULARY</td>
                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="lang_8_10_word"  value="<?php if (isset($get->lang_8_10_word)) {
                                            echo $get->lang_8_10_word;  } ?> ">
                                    </td>
                                    <td class="text-center">15 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_8_10_vocabulary_dq"
                                            value="<?php if (isset($get->language_milestone_8_10_vocabulary_dq)) {
                                                echo $get->language_milestone_8_10_vocabulary_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">2-3 WORD SENTENCE</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="lang_2_3_words"  value="<?php if (isset($get->lang_2_3_words)) {
                                            echo $get->lang_2_3_words;  } ?> ">
                                    </td>
                                    <td class="text-center">18 Months</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_2_3_word_sentence_dq"
                                            value="<?php if (isset($get->language_milestone_2_3_word_sentence_dq)) {
                                                echo $get->language_milestone_2_3_word_sentence_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ASK QUESTIONS/KNOWS NAME AND GENDER</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="name_gender"  value="<?php if (isset($get->name_gender)) {
                                            echo $get->name_gender;  } ?> ">
                                    </td>
                                    <td class="text-center">3 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_ask_questions_dq"
                                            value="<?php if (isset($get->language_milestone_ask_questions_dq)) {
                                                echo $get->language_milestone_ask_questions_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">SONG / POEM / TELL STORIES</td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="song_poem"  value="<?php if (isset($get->song_poem)) {
                                            echo $get->song_poem;  } ?> ">
                                    </td>
                                    <td class="text-center">3 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_song_poem_tell_storys_dq"
                                            value="<?php if (isset($get->language_milestone_song_poem_tell_storys_dq)) {
                                                echo $get->language_milestone_song_poem_tell_storys_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ASK MEANING </td>

                                    <td class="text-center"><input type="text" class="form-control-food w-100px"
                                        name="ask_meaning"  value="<?php if (isset($get->ask_meaning)) {
                                            echo $get->ask_meaning;  } ?> ">
                                    </td>
                                    <td class="text-center">4 Years</td>
                                    <td class="text-center"> <input type="text" class="form-control-food w-100px"
                                            name="language_milestone_ask_meaning_dq"
                                            value="<?php if (isset($get->language_milestone_ask_meaning_dq)) {
                                                echo $get->language_milestone_ask_meaning_dq;
                                            } ?>
                                                ">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="systemic_examination_label"
                        class="pt-5 mb-4">SYSTEMIC EXAMINATION : </label></div>
    <div id="systemic_examination_cvs_container" class="input-with-checkbox inv-general py-3">
        <div class="input-lbl">CVS</div>
        <div class="input-fld "><label class="checkbox" for="systemic_examination_cvs"><input type="checkbox" id="systemic_examination_cvs"
            name="systemic_examination[]" value="se_cvs"
        <?php if(isset($get->systemic_examination)){ if(in_array("se_cvs", $get->systemic_examination)){ echo "checked"; }}?>><span> NAD</span></label>
         <label class="input-fld" for="systemic_examination">
         <textarea rows="" class="form-control" id="systemic_examination_cvs" name="systemic_examination_cvs"><?php if (isset($get->systemic_examination_cvs)) {
            echo $get->systemic_examination_cvs;
        } ?></textarea>
        </label>
     </div>
    </div>
    <div id="systemic_examination_rs_container" class="input-with-checkbox inv-general py-3">
        <div class="input-lbl">RS</div>
        <div class="input-fld "><label class="checkbox" for="systemic_examination_rs"><input type="checkbox" id="systemic_examination_rs"
            name="systemic_examination[]" value="se_cvs"
        <?php if(isset($get->systemic_examination)){ if(in_array("se_rs", $get->systemic_examination)){ echo "checked"; }}?>><span> NAD</span></label>
         <label class="input-fld" for="systemic_examination">
         <textarea rows="" class="form-control" id="systemic_examination_rs" name="systemic_examination_rs"><?php if (isset($get->systemic_examination_rs)) {
            echo $get->systemic_examination_rs;
        } ?></textarea>
        </label>
     </div>
    </div>
    <div id="systemic_examination_pa_container" class="input-with-checkbox inv-general py-3">
        <div class="input-lbl">P/A</div>
        <div class="input-fld "><label class="checkbox" for="systemic_examination_pa"><input type="checkbox" id="systemic_examination_pa"
            name="systemic_examination[]" value="se_pa"
        <?php if(isset($get->systemic_examination)){ if(in_array("se_pa", $get->systemic_examination)){ echo "checked"; }}?>><span> NAD</span></label>
         <label class="input-fld" for="systemic_examination">
         <textarea rows="" class="form-control" id="systemic_examination_pa" name="systemic_examination_pa"><?php if (isset($get->systemic_examination_pa)) {
            echo $get->systemic_examination_pa;
        } ?></textarea>
        </label>
     </div>
    </div>
    <div id="systemic_examination_cns_container" class="input-with-checkbox inv-general py-3">
        <div class="input-lbl">CNS</div>
        <div class="input-fld "><label class="checkbox" for="systemic_examination_cns"><input type="checkbox" id="systemic_examination_cns"
            name="systemic_examination[]" value="se_cns"
        <?php if(isset($get->systemic_examination)){ if(in_array("se_cns", $get->systemic_examination)){ echo "checked"; }}?>><span> NAD</span></label>
         <label class="input-fld" for="systemic_examination">
         <textarea rows="" class="form-control" id="systemic_examination_cns" name="systemic_examination_cns"><?php if (isset($get->systemic_examination_cns)) {
            echo $get->systemic_examination_cns;
        } ?></textarea>
        </label>
     </div>
    </div>

    <div id="systemic_examination_le_container" class="input-with-checkbox inv-general py-3">
        <div class="input-lbl">L/E</div>
        <div class="input-fld "><label class="checkbox" for="systemic_examination_le"><input type="checkbox" id="systemic_examination_le"
            name="systemic_examination[]" value="se_le"
        <?php if(isset($get->systemic_examination)){ if(in_array("se_le", $get->systemic_examination)){ echo "checked"; }}?>><span> NAD</span></label>
         <label class="input-fld" for="systemic_examination">
         <textarea rows="" class="form-control" id="systemic_examination_le" name="systemic_examination_le"><?php if (isset($get->systemic_examination_le)) {
            echo $get->systemic_examination_le;
        } ?></textarea>
        </label>
     </div>
    </div>


                <div id="" class="col-12 col-md-9 col-lg-8 col-xl-7 my-5 pt-5"> <label for="diagnosis"
                        class="form-label">DIAGNOSIS : </label>
                    <textarea rows="" class="form-control" id="diagnosis" name="diagnosis"><?php if (isset($get->diagnosis)) {
                        echo $get->diagnosis;
                    } ?></textarea>
                </div>
                <div class="col-12  mb-5">
                    <div class="row mx-0 align-items-center">
                        <div class="col-12 col-md-9 col-lg-8 col-xl-7 px-0">
                            <div id="" class="">
                                <label for="management"
                                    class="form-label">MANAGEMENT : </label>
                                <textarea rows="" class="form-control" id="management" name="management"><?php if (isset($get->management)) {
                                    echo $get->management;
                                } ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-4 col-xl-5">
                            <div class="d-flex justify-content-start align-items-center gap-4 my-5">
                                <?php if(isset($getdata->id)) { ?>
                                <a class="baby-primary-btn"
                                href="{{ route('doctor.appointment.patient.prescription.medicine', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'pr_id' => $getdata->id,'type' => 'pediatric']) }}">+
                                Add Prescriptions</a>
                                    <?php } else { ?>
                                        <div class="tooltip1">

                         <a class="baby-primary-btn" href="#">+  Add Prescriptions</a>
                                        <span class="tooltip_text">Please update the paediatric case record form</span>
                                        </div>
                                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="" class="col-12 col-md-9 col-lg-8 col-xl-7 mt-5"> <label for="follow_up_advice"
                        class="form-label">FOLLOW-UP ADVICE : </label>
                    <textarea rows="" class="form-control" id="follow_up_advice" name="follow_up_advice"><?php if (isset($get->follow_up_advice)) {
                        echo $get->follow_up_advice;
                    } ?></textarea>

                </div>
            </div>

            <div class="d-flex justify-content-start align-items-center gap-4 mb-5">

                <a type="button" href="{{ route('doctor.appointments') }}"
                    class="baby-secondary-btn border-1 text-center" data-bs-dismiss="modal">Cancel</a>
                    <?php if ($app_status=='assigned') { ?>
                    <button type="submit" class="baby-primary-btn">Save</button>
                    <?php } ?>

            </div>

        </form>
    </section>
@endsection
