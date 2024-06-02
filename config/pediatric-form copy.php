<?php

// Doctor specialist type config
 
return [
    'fields' => [

        [
            'prefix' => 'section1',
            'fields1' => [
                [
                    'name' => 'chief_complaints',
                    'label' => 'CHIEF COMPLAINTS',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'chief_complaints',
                    'rows' => ''
                ],
                [
                    'name' => 'h_o_pi',
                    'label' => 'H/O PI',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'h_o_pi',
                    'rows' => ''
                ],
                [
                    'name' => 'past_history',
                    'label' => 'PAST HISTORY',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'past_history',
                    'rows' => ''
                ],
                [
                    'name' => 'antenatal_h_o',
                    'label' => 'ANTENATAL H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'antenatal_h_o'
                ],
                [
                    'name' => 'natal_h_o',
                    'label' => 'NATAL H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'natal_h_o'
                ],
                [
                    'name' => 'post_natal_h_o',
                    'label' => 'POST NATAL H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'post_natal_h_o'
                ],
                [
                    'name' => 'treatment_h_o',
                    'label' => 'TREATMENT H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'treatment_h_o'
                ],
               /* [
                    'name' => 'development_h_o',
                    'label' => 'DEVELOPMENT H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'development_h_o'
                ],*/
                [
                    'name' => 'nutrition_h_o',
                    'label' => 'NUTRITION H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'nutrition_h_o'
                ],
                [
                    'name' => 'immunization_h_o',
                    'label' => 'IMMUNIZATION H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'immunization_h_o'
                ],
                [
                    'name' => 'family_h_o',
                    'label' => 'FAMILY H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'family_h_o'
                ],
                [
                    'name' => 'contact_h_o',
                    'label' => 'CONTACT H/O',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'contact_h_o'
                ],
                /*[
                    'name' => 'summary',
                    'label' => 'SUMMARY',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'text',
                    'id' => 'summary'
                ],*/
                [
                    'name' => 'gen_examination',
                    'label' => 'GEN EXAMINATION <br> 1.Level of Consiousness',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Alert',
                        'Awake',
                        'Confused',
                        'Disoriented',
                        'Lethargic',
                        'Obtunded',
                        'Stupor',
                        'Comatose',
                        '-'
                    ],
                    'id' => 'gen_examination1'
                ],
                [
                    'name' => '',
                    'label' => '2.',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Pollor',
                        'Icterus',
                        'Cyanosis',
                        'Clubbing',
                        'Lymphadenopathy,-',
                        'Edema'
                    ],
                    'id' => 'gen_examination2'
                ],
                 [
                    'name' => '',
                    'label' => '3.VITALS',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'vitals_hr',
                    'label' => 'HR :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' / Min',
                    'input_type' => 'text',
                    'id' => 'vitals_hr',
                    // 'container' => 'div',
                    // 'container_id' => '',
                    // 'container_class' => 'style-row'
                ],
                [
                    'name' => 'vitals_rr',
                    'label' => 'RR :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' / Min',
                    'input_type' => 'text',
                    'id' => 'vitals_rr'
                ],
                [
                    'name' => 'vitals_spo2',
                    'label' => 'SPO2 :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' %',
                    'input_type' => 'text',
                    'id' => 'vitals_spo2'
                ],
                [
                    'name' => 'vitals_bp',
                    'label' => 'BP :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' minHg',
                    'input_type' => 'text',
                    'id' => 'vitals_bp'
                ],
                 [
                    'name' => 'vitals_temperature',
                    'label' => 'Temperature :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' / Min',
                    'input_type' => 'text',
                    'id' => 'vitals_temperature'
                ],
                [
                    'name' => '',
                    'label' => '4. ANTHRAPOMETRY',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'anthrapometry_wt',
                    'label' => 'Weight :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'anthrapometry_wt'
                ],
                [
                    'name' => 'anthrapometry_ht',
                    'label' => 'Height :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'anthrapometry_ht'
                ],
                [
                    'name' => 'anthrapometry_hc',
                    'label' => 'Head Circumfernece :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'anthrapometry_hc'
                ],
                [
                    'name' => 'anthrapometry_mac',
                    'label' => 'Mid Arm Circumfernece :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'anthrapometry_mac'
                ],
                [
                    'name' => '',
                    'label' => '5. PRIMARY ASSESSMENT :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => '',
                    'label' => 'AIRWAY :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Open and Stable',
                        'Obstructed maintainable',
                        'Obstructed non-maintainable'
                    ],
                    'id' => 'pa_airway'
                ],
                [
                    'name' => '',
                    'label' => 'BREATHING :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'pa_breathing_resprate',
                    'label' => 'Respiratory rate :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' / Min',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_resprate'
                ],
                [
                    'name' => '',
                    'label' => 'Efforts :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal',
                        'Increased',
                        'Poor'
                    ],
                    'id' => 'pa_breathing_efforts'
                ],
                [
                    'name' => '',
                    'label' => 'Air Entry :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal',
                        'Poor',
                        'Differential'
                    ],
                    'id' => 'pa_breathing_airentry'
                ],
                [
                    'name' => 'pa_breathing_restractions',
                    'label' => 'Restractions :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_restractions'
                ],
                [
                    'name' => '',
                    'label' => 'Ausculation :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'None',
                        'Stridor',
                        'Grunt',
                        'Wheeze',
                        'Crackles'
                    ],
                    'id' => 'pa_breathing_ausculation'
                ], 
                [
                    'name' => 'pa_breathing_spo2',
                    'label' => 'Spo2 :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_spo2'
                ],
                [
                    'name' => 'pa_breathing_fio2',
                    'label' => 'Fio2 :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_fio2'
                ],
                [
                    'name' => '',
                    'label' => 'CIRCULATION :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'pa_breathing_heartrate',
                    'label' => 'Heart rate :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => ' / Min',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_heartrate'
                ],
                [
                    'name' => '',
                    'label' => 'Central Pulse :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Good',
                        'Weak',
                        'Absent'
                    ],
                    'id' => 'pa_breathing_central_pulse'
                ],
                [
                    'name' => '',
                    'label' => 'Peripheral Pulse :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Good',
                        'Weak',
                        'Absent'
                    ],
                    'id' => 'pa_breathing_peripheral_pulse'
                ],
                [
                    'name' => 'pa_breathing_cft',
                    'label' => 'CFT :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => 'Seconds',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_cft'
                ],
                [
                    'name' => '',
                    'label' => 'Skin Temperature :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Warm',
                        'Cold'
                    ],
                    'id' => 'pa_breathing_skin_temp'
                ],
                [
                    'name' => '',
                    'label' => 'DISABILITY :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                /*[
                    'name' => '',
                    'label' => 'Motor Activity :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],*/
                [
                    'name' => '',
                    'label' => 'Motor Activity :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal & Symmetrical',
                        'Asymmetrical seizure',
                        'Posturing',
                        'Extrapyramidal'
                    ],
                    'id' => 'pa_disability_motor_activity'
                ],
                [
                    'name' => 'pa_breathing_blood_glucose',
                    'label' => 'Blood Glucose :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'label_suffix' => 'mg/dl',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_blood_glucose'
                ],
                [
                    'name' => 'pa_breathing_fpi',
                    'label' => 'FINAL PHYSIOLOGICAL IMPRESSION :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_fpi'
                ],
                [
                    'name' => '',
                    'label' => 'CIRCULATION :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'pa_breathing_cir_temp',
                    'label' => 'Temperature :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_cir_temp'
                ],
                [
                    'name' => '',
                    'label' => 'Central pulse:',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal',
                        'Pollor',
                        'Cyanosis'
                    ],
                    'id' => 'pa_breathing_central_pulse'
                ],
                [
                    'name' => 'pa_breathing_surface_findings',
                    'label' => 'Surface Findings :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'pa_breathing_cir_temp'
                ],
                [
                    'name' => '',
                    'label' => 'HEAT TO FOOT EXAMINATION',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'food_examination_head',
                    'label' => 'A. Head',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_head'
                ],
                [
                    'name' => 'food_examination_hair',
                    'label' => 'B. Hair',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_hair'
                ],
                [
                    'name' => 'food_examination_face',
                    'label' => 'C. Face',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_face'
                ],
                [
                    'name' => 'food_examination_eyes',
                    'label' => 'D. Eyes',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_eyes'
                ],
                [
                    'name' => 'food_examination_ears',
                    'label' => 'E. Ears',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_ears'
                ],
                [
                    'name' => 'food_examination_nose',
                    'label' => 'F. Nose',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_nose'
                ],
                [
                    'name' => 'food_examination_lips',
                    'label' => 'G. Lips',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_lips'
                ],
                [
                    'name' => 'food_examination_tongue',
                    'label' => 'H. Tongue',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_tongue'
                ],
                [
                    'name' => 'food_examination_teeth',
                    'label' => 'I. Teeth',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_teeth'
                ],
                [
                    'name' => 'food_examination_oral_cavity',
                    'label' => 'J. Oral Cavity',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_oral_cavity'
                ],
                [
                    'name' => 'food_examination_throat',
                    'label' => 'K. Throat',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_throat'
                ],
                [
                    'name' => 'food_examination_neck',
                    'label' => 'L. Neck',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_neck'
                ],
                [
                    'name' => 'food_examination_chest',
                    'label' => 'M. Chest',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_chest'
                ],
                [
                    'name' => 'food_examination_abdomen',
                    'label' => 'N. Abdomen',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_abdomen'
                ],
                [
                    'name' => 'food_examination_upper_extermities',
                    'label' => 'O. Upper Extermities',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_upper_extermities'
                ],
                [
                    'name' => 'food_examination_lower_extermities',
                    'label' => 'P. Lower Extermities',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_lower_extermities'
                ],
                [
                    'name' => 'food_examination_skull_spine',
                    'label' => 'Q. Skull and Spine',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_skull_spine'
                ],
                [
                    'name' => 'food_examination_gentials',
                    'label' => 'R. Gentials',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'design' => '-',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'food_examination_gentials'
                ],
               
            ],// fields1 end
            // fields2 start
            "fields2"=>[
                [
                    'name' => '',
                    'label' => 'SYSTEMIC EXAMINATION :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => ''
                ],
                [
                    'name' => 'systemic_examination_cvs',
                    'label' => 'CVS :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'systemic_examination_cvs'
                ],
                [
                    'name' => 'systemic_examination_rs',
                    'label' => 'RS &nbsp; :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'systemic_examination_rs'
                ],
                [
                    'name' => 'systemic_examination_pa',
                    'label' => 'P/A :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'systemic_examination_pa'
                ],
                [
                    'name' => 'systemic_examination_cns',
                    'label' => 'CNS :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'systemic_examination_cns'
                ],
                  [
                    'name' => 'systemic_examination_le',
                    'label' => 'L/E  &nbsp; :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'label_suffix' => 'NAD',
                    'id' => 'systemic_examination_le'
                ],
                [
                    'name' => 'diagnosis',
                    'label' => 'DIAGNOSIS :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'diagnosis',
                    'rows' => ''
                ],
                [
                    'name' => 'management',
                    'label' => 'MANAGEMENT :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'management',
                    'rows' => ''   
                ],
                [
                    'name' => 'follow_up_advice',
                    'label' => 'FOLLOW-UP ADVICE :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'follow_up_advice',
                    'rows' => ''
                ],
            ],
            "tables"=>[
                    [   'title' => 'DEVELOPMENT HISTORY',
                        'columns'=>['Gross Motor','Attained', 'Expected','DQ'],
                        'rows'=>
                        [
                            [
                            'name' => 'gross_motor_head_control',
                            'name2' => 'gross_motor_head_control_dq',
                            'label' => 'HEAD CONTROL',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_head_control',
                            'label2' => '3 Month'
                            ],
                             [
                            'name' => 'gross_motor_rollover',
                            'name2' => 'gross_motor_rollover_dq',
                            'label' => 'ROLL OVER',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_rollover',
                            'label2' => '5 Month'
                            ],
                            [
                            'name' => 'gross_motor_sits_with_support',
                            'name2' => 'gross_motor_sits_with_support_dq',
                            'label' => 'SITS WITH SUPPORT',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_sits_with_support',
                            'label2' => '6 Month'
                            ],
                            [
                            'name' => 'gross_motor_sits_with_out_support',
                            'name2' => 'gross_motor_sits_with_out_support_dq',
                            'label' => 'SITS WITH OUT SUPPORT',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_sits_with_out_support',
                            'label2' => '8 Month'
                            ],
                            [
                            'name' => 'gross_motor_stands_c_support',
                            'name2' => 'gross_motor_stands_c_support_dq',
                            'label' => 'STANDS WITH SUPPORT',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_stands_c_support',
                            'label2' => '9 Month'
                            ],
                            [
                            'name' => 'gross_motor_creeps_crawl',
                            'name2' => 'gross_motor_creeps_crawl_dq',
                            'label' => 'CREEPS & CRAWL',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_creeps_crawl',
                            'label2' => '12 Month'
                            ],
                            [
                            'name' => 'gross_motor_walk_alone',
                            'name2' => 'gross_motor_walk_alone_dq',
                            'label' => 'WALK ALONE',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_walk_alone',
                            'label2' => '15 Month'
                            ],
                            [
                            'name' => 'gross_motor_run',
                            'name2' => 'gross_motor_run_dq',
                            'label' => 'RUN',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_run',
                            'label2' => '18 Month'
                            ],
                            [
                            'name' => 'gross_motor_walk_up_and_down_stairs',
                            'name2' => 'gross_motor_walk_up_and_down_stairs_dq',
                            'label' => 'WALK UP AND DOWN STAIRS (2 FEAT / STEP)',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_walk_up_and_down_stairs',
                            'label2' => '2 Years'
                            ],
                           /* [
                            'name' => 'gross_motor_2_feat_step',
                            'name2' => 'gross_motor_2_feat_step_dq',
                            'label' => '(2 FEAT / STEP)',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_2_feat_step',
                            'label2' => ''
                            ],*/
                            [
                            'name' => 'gross_motor_jump',
                            'name2' => 'gross_motor_jump_dq',
                            'label' => 'JUMP',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_jump',
                            'label2' => '3 Years'
                            ],
                            [
                            'name' => 'gross_motor_hops',
                            'name2' => 'gross_motor_hops_dq',
                            'label' => 'HOPS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'gross_motor_hops',
                            'label2' => '4 Years'
                            ]
                        ] 
                    ],//Table 1
                    
                    [
                        'title' => 'FINR MOTOR',
                        'columns'=>['Finr Motor','Attained', 'Expected','DQ'],
                        'rows'=>
                        [
                            [
                            'name' => 'finr_motor_bidextrous_reach',
                            'name2' => 'finr_motor_bidextrous_reach_dq',
                            'label' => 'BIDEXTROUS REACH',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_bidextrous_reach',
                            'label2' => '2 Month'
                            ],
                             [
                            'name' => 'finr_motor_unidextrous_reach',
                            'name2' => 'finr_motor_unidextrous_reach_dq',
                            'label' => 'UNIDEXTROUS REACH',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_unidextrous_reach',
                            'label2' => '5 Month'
                            ],
                            [
                            'name' => 'finr_motor_immature_pincer_grasp',
                            'name2' => 'finr_motor_immature_pincer_grasp_dq',
                            'label' => 'IMMATURE PINCER GRASP',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_immature_pincer_grasp',
                            'label2' => '6 Month'
                            ],
                            [
                            'name' => 'finr_motor_mature_grasp',
                            'name2' => 'finr_motor_mature_grasp_dq',
                            'label' => 'MATURE PINCER GRASP',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_mature_grasp',
                            'label2' => '9 Month'
                            ],
                            [
                            'name' => 'finr_motor_scribbling_tower_2_blocks',
                            'name2' => 'finr_motor_scribbling_tower_2_blocks_dq',
                            'label' => 'SCRIBBLING /TOWER 2 BLOCKS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_scribbling_tower_2_blocks',
                            'label2' => '12 Month'
                            ],
                            [
                            'name' => 'finr_motor_scribble_tower_3_blocks',
                            'name2' => 'finr_motor_scribble_tower_3_blocks_dq',
                            'label' => 'SCRIBBLE / TOWER 3 BLOCKS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_scribble_tower_3_blocks',
                            'label2' => '15 Month'
                            ],
                            [
                            'name' => 'finr_motor_tower_6_blocks',
                            'name2' => 'finr_motor_tower_6_blocks_dq',
                            'label' => 'TOWER 6 BLOCKS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_tower_6_blocks',
                            'label2' => '18 Month'
                            ],
                            [
                            'name' => 'finr_motor_tower_9_blocks_copies_circle',
                            'name2' => 'finr_motor_tower_9_blocks_copies_circle_dq',
                            'label' => 'TOWER 9 BLOCKS /COPIES CIRCLE',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_tower_9_blocks_copies_circle',
                            'label2' => '2 Years'
                            ],
                            [
                            'name' => 'finr_motor_copies_cross_bridge_c_blocks',
                            'name2' => 'finr_motor_copies_cross_bridge_c_blocks_dq',
                            'label' => 'COPIES CROSS /BRIDGE C BLOCKS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_copies_cross_bridge_c_blocks',
                            'label2' => '3 Years'
                            ],
                            [
                            'name' => 'finr_motor_copies_triangle_gate_c_blocks',
                            'name2' => 'finr_motor_copies_triangle_gate_c_blocks_dq',
                            'label' => 'COPIES TRIANGLE /GATE C BLOCKS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'finr_motor_copies_triangle_gate_c_blocks',
                            'label2' => '4 Years'
                            ]
                        ] 
                    ],//table 2
                    [
                        'title' => 'SOCIAL & ADAPTIVE',
                        'columns'=>['Social & Adaptive','Attained', 'Expected','DQ'],
                        'rows'=>
                        [
                            [
                            'name' => 'social_adaptive_social_smile',
                            'name2' => '',
                            'label' => 'SOCIAL SMILE',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_social_smile',
                            'label2' => '2 Month'
                            ],
                             [
                            'name' => 'social_adaptive_recognizes_mother',
                            'name2' => '',
                            'label' => 'RECOGNIZES MOTHER',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_recognizes_mother',
                            'label2' => '5 Month'
                            ],
                            [
                            'name' => 'social_adaptive_strainger_anxiety',
                            'name2' => '',
                            'label' => 'STRAINGER ANXIETY',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_strainger_anxiety',
                            'label2' => '6 Month'
                            ],
                            [
                            'name' => 'social_adaptive_bye_bye',
                            'name2' => '',
                            'label' => 'WAVES BYE - BYE',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_bye_bye',
                            'label2' => '9 Month'
                            ],
                            [
                            'name' => 'social_adaptive_simple_ball_game',
                            'name2' => '',
                            'label' => 'SIMPLE BALL GAME',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_simple_ball_game',
                            'label2' => '12 Month'
                            ],
                            [
                            'name' => 'social_adaptive_jargon',
                            'name2' => '',
                            'label' => 'JARGON SPEECH',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_jargon',
                            'label2' => '15 Month'
                            ],
                            [
                            'name' => 'social_adaptive_copies_parents',
                            'name2' => '',
                            'label' => 'COPIES PARENTS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_copies_parents',
                            'label2' => '18 Month'
                            ],
                            [
                            'name' => 'social_adaptive_ask_for_food_toilet',
                            'name2' => '',
                            'label' => 'ASK FOR FOOD / TOILET',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_ask_for_food_toilet',
                            'label2' => '2 Years'
                            ],
                            [
                            'name' => 'social_adaptive_shares_toys_names_gender',
                            'name2' => '',
                            'label' => 'SHARES TOYS / NAMES / GENDER',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_shares_toys_names_gender',
                            'label2' => '3 Years'
                            ],
                            [
                            'name' => 'social_adaptive_toilet_alone',
                            'name2' => '',
                            'label' => 'CO-OPERATIVE PLAY',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_toilet_alone',
                            'label2' => '4 Years'
                            ],
                            [
                            'name' => 'social_adaptive_dress_undress',
                            'name2' => '',
                            'label' => 'DRESS/ UNDRESS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_dress_undress',
                            'label2' => '4 Years'
                            ]
                        ] 
                    ],//table 3
                    [
                        'title' => 'LANGUAGE MILESTONE',
                        'columns'=>['Language Milestone','Attained', 'Expected','DQ;'],
                        'rows'=>
                        [
                            [
                            'name' => 'language_milestone_alerts_to_sound',
                            'name2' => 'language_milestone_alerts_to_sound_dq',
                            'label' => 'ALERTS TO SOUND',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone',
                            'label2' => '2 Month'
                            ],
                             [
                            'name' => 'language_milestone_coos',
                            'name2' => 'language_milestone_coos_dq',
                            'label' => 'COOS AND BABBLES',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_coos',
                            'label2' => '5 Month'
                            ],
                            [
                            'name' => 'language_milestone_laugh_loud',
                            'name2' => 'language_milestone_laugh_loud_dq',
                            'label' => 'LAUGH LOUDLY',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_laugh_loud',
                            'label2' => '6 Month'
                            ],
                            [
                            'name' => 'language_milestone_monosyllables',
                            'name2' => 'language_milestone_monosyllables_dq',
                            'label' => 'MONOSYLLABLES',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_bye_bye',
                            'label2' => '9 Month'
                            ],
                            [
                            'name' => 'language_milestone_bisyllables',
                            'name2' => 'language_milestone_bisyllables_dq',
                            'label' => 'BISYLLABLES',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'social_adaptive_simple_ball_game',
                            'label2' => '12 Month'
                            ],
                            [
                            'name' => 'language_milestone_1_2_word_with_meaning',
                            'name2' => 'language_milestone_1_2_word_with_meaning_dq',
                            'label' => '1-2 WORD WITH MEANING',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_1_2_word_with_meaning',
                            'label2' => '15 Month'
                            ],
                            [
                            'name' => 'language_milestone_8_10_vocabulary',
                            'name2' => 'language_milestone_8_10_vocabulary_dq',
                            'label' => '8-10 VOCABULARY',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_8_10_vocabulary',
                            'label2' => '18 Month'
                            ],
                            [
                            'name' => 'language_milestone_2_3_word_sentence',
                            'name2' => 'language_milestone_2_3_word_sentence_dq',
                            'label' => '2-3 WORD SENTENCE',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_2_3_word_sentence',
                            'label2' => '2 Years'
                            ],
                            [
                            'name' => 'language_milestone_ask_questions',
                            'name2' => 'language_milestone_ask_questions_dq',
                            'label' => 'ASK QUESTIONS/KNOWS NAME AND GENDER',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_ask_questions',
                            'label2' => '3 Years'
                            ],
                            [
                            'name' => 'language_milestone_song_poem_tell_storys',
                            'name2' => 'language_milestone_song_poem_tell_storys_dq',
                            'label' => 'SONG / POEM / TELL STORYS',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_song_poem_tell_storys',
                            'label2' => '4 Years'
                            ],
                            [
                            'name' => 'language_milestone_ask_meaning',
                            'name2' => 'language_milestone_ask_meaning_dq',
                            'label' => 'ASK MEANING ',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'input_type' => 'tablecheckbox',
                            'id' => 'language_milestone_ask_meaning',
                            'label2' => '5 Years'
                            ]
                        ] 
                    ],//table 4

            ],//Tables end
            "vaccination"=>
            [
                
                'title' => 'GROSS MOTOR',
                'columns'=>['Age','Vacccine', 'Catch-up'],
                'rows'=>
                [
                    [
                        'name' => 'vaccination_birth',
                        'name2' => 'vaccination_birth_date',
                        'label' => 'Birth',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_birth',
                        'options'=>
                        [
                                'BCG',
                                'OPV',
                                'HEP - B 1',
                                'DTwp/DTaP 1',
                                'IPV- 1,Hib- 1'
                        ]
                    ],
                    [
                        'name' => 'vaccination_week_6',
                        'name2' => 'vaccination_week_6_date',
                        'label' => '6 Weeks',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_week_6',
                        'options'=>
                        [
                                'DTwp/DTaP 1',
                                'IPV- 1,Hib- 1',
                                'Hep B - 1',
                                'Rotavirus - 1',
                                'PCV - 1'
                        ]
                    ],
                    [
                        'name' => 'vaccination_week_10',
                        'name2' => 'vaccination_week_10_date',
                        'label' => '10 Weeks',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_week_10',
                        'options'=>
                        [
                                'DTwP/DTaP - 2',
                                'IPV - 1',
                                'Hib - 2',
                                'Hep B - 3',
                                'Rotavirus -2',
                                'PCV -2'
                        ]
                    ],
                    [
                        'name' => 'vaccination_week_14',
                        'name2' => 'vaccination_week_14_date',
                        'label' => '14 Weeks',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_week_14',
                        'options'=>
                        [
                                'DTwP/DTap -3',
                                'IPV -3',
                                'Hib -3',
                                'Hep B -4',
                                'Rotavirus - 3',
                                'PCV -3'
                        ]
                    ],
                    [
                        'name' => 'vaccination_month_6',
                        'name2' => 'vaccination_month_6_date',
                        'label' => '6 Weeks',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_month_6',
                        'options'=>
                        [
                                'Influenza (IIV)-1'
                        ]
                    ],
                    [
                        'name' => 'vaccination_month_7',
                        'name2' => 'vaccination_month_7_date',
                        'label' => '6 Weeks',
                        'placeholder' => ' ',
                        'value' => '',
                        'required' => false,
                        'class' => 'form-control',
                        'input_type' => 'tablecheckbox',
                        'id' => 'vaccination_month_7',
                        'options'=>
                        [
                                'Influenza (IIV)-2'
                        ]
                    ],
                ]
            ],//vaccination end
            'dental' => [
                /*[
                    'name' => 'chief_complaint:',
                    'label' => 'Chief Complaints',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'chief_complaint',
                    'rows' => ''
                ],*/
                [
                    'name' => 'h_o_presenting_illness:',
                    'label' => 'H/O Presenting illness :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'h_o_presenting_illness',
                    'rows' => ''
                ],
                [
                    'name' => 'medical_history',
                    'label' => 'Medical History :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'medical_history',
                    'rows' => ''
                ],
                [
                    'name' => 'dental_history',
                    'label' => 'Dental History :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'dental_history',
                    'rows' => ''
                ],
                [
                    'name' => 'child_visit',
                    'label' => '1. Is this the child’s first visit to the dentist?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'class2' => 'form-control-food w-100px',
                    'input_type' => 'checkbox',
                    'name2'=>'child_visit_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'child_visit',
                    'id2' => 'child_visit_answer'
                ],
                [
                    'name' => 'dental_experience',
                    'label' => '2. Has the child had any unpleasant medical or dental experience?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'dental_experience'
                ],
                [
                    'name' => 'oral_truma',
                    'label' => '3. Has the child had any oral trauma?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'name2'=>'oral_truma_answer',
                    'input_type2'=>'text',
                     'class2' => 'form-control-food w-100px',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'oral_truma',
                    'id2' => 'oral_truma_answer'
                ],
                [
                    'name' => 'tooth_eruption',
                    'label' => '4. Age of the child at first tooth eruption?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'id' => 'tooth_eruption'
                ],
                [
                    'name' => 'tooth_eruption_problems',
                    'label' => 'a. Problems, any',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'tooth_eruption_problems'
                ],
                [
                    'name' => 'tooth_eruption_which_tooth',
                    'label' => 'b. Which tooth?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'tooth_eruption_which_tooth'
                ],
                [
                    'name' => 'prenatal_history',
                    'label' => 'Prenatal history :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'label',
                    'id' => 'prenatal_history'
                ],
                [
                    'name' => 'prenatal_history_mother_pregnancy',
                    'label' => '1. Any illness/ trauma to the mother during pregnancy',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'prenatal_history_mother_pregnancy'
                ],
                [
                    'name' => 'prenatal_history_mother_drugs',
                    'label' => '2. Drugs taken during pregnancy :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'prenatal_history_mother_drugs'
                ],
                [
                    'name' => 'prenatal_history_mother_delivery',
                    'label' => '3. Delivery ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Full term',
                        'Pre term'
                    ],
                    'id' => 'prenatal_history_mother_delivery'
                ],
                /*[
                    'name' => 'prenatal_history_type',
                    'label' => '4. Type ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'prenatal_history_type'
                ],*/
                [
                    'name' => 'prenatal_history_type_option',
                    'label' => '4. Type',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control p-0',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal',
                        'Forceps',
                        'Caesarian'
                    ],
                    'id' => 'prenatal_history_type_option'
                ],
                [
                    'name' => 'postnatal_history',
                    'label' => 'Postnatal history :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'label',
                    'id' => 'postnatal_history'
                ],
                [
                    'name' => 'postnatal_blood_group',
                    'label' => '1. Blood group :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'postnatal_blood_group'
                ],
                [
                    'name' => 'postnatal_history_jaundiced',
                    'label' => '2. Whether jaundiced at birth? ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'postnatal_history_breast_feed'
                ],
                [
                    'name' => 'postnatal_history_jaundiced',
                    'label' => '3. Was the child breast fed?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        /*'YesText',*/
                        'No'
                    ],
                    /*'id' => 'postnatal_history_breast_feed',
                    'yes_name'=>'postnatal_history_jaundiced_yes',
                    'yes_input_type'=>'text',
                    'yes_class' => 'form-control-food w-100px',
                    'yes_label' => 'Months &emsp;',
                    'yes_id' => 'postnatal_history_jaundiced_yes'*/
                ],
                [
                    'name' => 'postnatal_history_child_breast_yes',
                    'label' => 'If yes, duration',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        '6 months',
                        '6-12 months',
                        '>12 months'
                    ],
                  
                ],
                [
                    'name' => 'postnatal_history_blood_transfusion',
                    'label' => '4. Was the child given blood transfusion?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                    'id' => 'postnatal_history_blood_transfusion'
                ],
                [
                    'name' => 'postnatal_history_nursing_bottle',
                    'label' => '5. Did the child use nursing bottle?',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        /*'YesText',*/
                        'No'
                    ],
                   /* 'id' => 'postnatal_history_nursing_bottle',
                    'yes_name'=>'postnatal_history_nursing_bottle_yes',
                    'yes_input_type'=>'text',
                    'yes_class' => 'form-control-food w-100px',
                    'yes_label' => 'Months &emsp;',
                    'yes_id' => 'postnatal_history_nursing_bottle_yes'*/
                ],
                  [
                    'name' => 'postnatal_nursing_bottle_long_frequent',
                    'label' => 'a. How long and how frequent :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'postnatal_nursing_bottle_long_frequent'
                ],
                [
                    'name' => 'postnatal_nursing_bottle_nipple_used',
                    'label' => 'b. Type of nipple used :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food',
                    'input_type' => 'text',
                    'id' => 'postnatal_nursing_bottle_nipple_used'
                ],
                 
                  [
                    'name' => 'postnatal_history_nursing_bottle_sleep_fed',
                    'label' => 'c. Does the child go to sleep bottle fed? :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes',
                        'No'
                    ],
                   
                ],
                 [
                    'name' => 'postnatal_history_nursing_bottle_content',
                    'label' => 'd. Content :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Milk',
                        'Juice',
                        'Water',
                        'Others'
                    ],
                   
                ],
                [
                    'name' => 'postnatal_history_milestones_of_development',
                    'label' => '6. Milestones of development',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'postnatal_history_milestones_of_development',
                    'rows' => ''
                ],
                [
                    'name' => 'oral_hygiene_practices',
                    'label' => 'Oral hygiene practices :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'oral_hygiene_practices',
                    'rows' => ''
                ],
                [
                    'name' => 'diet_history',
                    'label' => 'Diet history',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'styleinline' => true,
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Veg',
                        'Non-veg',
                        'Mixed'
                    ],
                    'id' => 'diet_history'
                ],
                [
                    'name' => 'clinical_examination',
                    'label' => 'Clinical examination',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'clinical_examination'
                ],
                [
                    'name' => 'general_examination',
                    'label' => 'General examination',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'clinical_examination'
                ],
                [
                    'name' => 'general_examination_height',
                    'label' => 'Height',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'label_suffix' => 'CM',
                    'id' => 'general_examination_height'
                ],
                [
                    'name' => 'general_examination_weight',
                    'label' => 'Weight',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-100px',
                    'input_type' => 'text',
                    'label_suffix' => 'Kg',
                    'id' => 'general_examination_weight'
                ],
                [
                    'name' => 'general_examination_body_type',
                    'label' => 'Body Type',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Ectomorph',
                        'Endomorph',
                        'Mesomorph'
                    ],
                    'id' => 'general_examination_body_type'
                ],
                [
                    'name' => 'general_examination_speech',
                    'label' => 'Speech',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-200px',
                    'input_type' => 'text',
                    'id' => 'general_examination_speech'
                ],
                [
                    'name' => 'extra_oral_examination',
                    'label' => 'Extra oral examination',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'extra_oral_examination'
                ],
                [
                    'name' => 'extra_oral_examination_shape_of_head',
                    'label' => 'Shape Of Head',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Meso',
                        'Dolicho',
                        'Brachycephalic'
                    ],
                    'id' => 'extra_oral_examination_shape_of_head'
                ],
                [
                    'name' => 'extra_oral_examination_facial_form',
                    'label' => 'Facial form &emsp;&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Square',
                        'Oval',
                        'Round'
                    ],
                    'id' => 'extra_oral_examination_facial_form'
                ],
                [
                    'name' => 'extra_oral_examination_facial_symmetry ',
                    'label' => 'Facial symmetry ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Symmetrical',
                        'Asymmetrical',
                    ],
                    'id' => 'extra_oral_examination_facial_symmetry'
                ],
                [
                    'name' => 'extra_oral_examination_facial_divergence',
                    'label' => 'Facial divergence',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Straight',
                        'Anterior',
                        'Posterior'
                    ],
                    'id' => 'extra_oral_examination_facial_divergence'
                ],
                [
                    'name' => 'extra_oral_examination_profile',
                    'label' => 'Profile',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Straight',
                        'Prognathic',
                        'Retrognathic'
                    ],
                    'id' => 'extra_oral_examination_profile'
                ],
                [
                    'name' => 'extra_oral_examination_lips',
                    'label' => 'Lips ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Competent',
                        'Incompetent',
                        'Short upper lip',
                        'Short lower lip',
                        'Everted lip',
                    ],
                    'id' => 'extra_oral_examination_lips'
                ],
                /*[
                    'name' => 'tmj',
                    'label' => 'TMJ ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false, 
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'tmj'
                ],
                [
                    'name' => 'tmj',
                    'right_name' => 'tmj_right',
                    'left_name' => 'tmj_left',
                    'options_right_name'=>'tmj_right_options',
                    'options_left_name'=>'tmj_left_options',
                    'label' => 'Lips ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkboxleftright',
                    'options_right'=>[
                        'Clicking',
                        'Subluxation',
                        'NDA',
                        'Dislocation',
                        'Deviation',
                        'Abnormalities evident',
                    ],
                    'options_left'=>[
                        'Clicking',
                        'Subluxation',
                        'NDA',
                        'Dislocation',
                        'Deviation',
                        'Abnormalities evident',
                    ],
                    'id' => 'tmj_right'
                ],
                [
                    'name' => 'Lymph_nodes',
                    'label' => 'Lymph nodes',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false, 
                    'class' => 'form-control',
                    'input_type' => 'label',
                    'id' => 'tmj'
                ],
                [
                    'name' => 'tmj',
                    'right_name' => 'lymph_nodes_right',
                    'left_name' => 'lymph_nodes_left',
                    'options_right_name'=>'lymph_nodes_right_options',
                    'options_left_name'=>'lymph_nodes_left_options',
                    'label' => ' ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkboxleftright',
                    'options_right'=>[
                        'Tender',
                        'Paspable',
                        'NDA',
                    ],
                    'options_left'=>[
                        'Clicking',
                        'Subluxation',
                        'NDA',
                        'Dislocation',
                        'Deviation',
                        'Abnormalities evident',
                    ],
                    'id' => 'tmj_right'
                ],*/
                 [
                    'name' => 'extra_oral_examination_tmj',
                    'label' => 'TMJ ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Clicking',
                        'Dislocation',
                        'Subluxation',
                        'Deviation',
                        'Abnormalities evident',
                    ],
                    'id' => 'extra_oral_examination_tmj'
                ],
                 [
                    'name' => 'extra_oral_examination_lymph_nodes',
                    'label' => 'Lymph nodes ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food w-300px',
                    'input_type' => 'text',
                    'id' => 'extra_oral_examination_lymph_nodes'
                ],
                [
                    'name' => 'extra_oral_examination_others',
                    'label' => 'Others ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food w-300px',
                    'input_type' => 'text',
                    'id' => 'extra_oral_examination_others'
                ],
                [
                    'name' => 'local_examination',
                    'label' => 'Local examination',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'local_examination'
                ],
                [
                    'name' => 'local_examination_oral_soft_tissues',
                    'label' => 'Oral soft tissues :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'local_examination_oral_soft_tissues',
                    'rows'=>5
                ],
                [
                    'name' => 'hard_tissue_examination',
                    'label' => 'Hard Tissue examination :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'hard_tissue_examination'
                ],
              /*  [
                    'name' => 'teeth_present',
                    'label' => 'Teeth present',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'teethpresent',
                    'id' => 'teeth_present',
                    'top1' => [
                        '55',
                        '54',
                        '53',
                        '52',
                        '51',
                        '61',
                        '62',
                        '63',
                        '64',
                        '65',
                    ],
                    'top2' => [
                        '18',
                        '17',
                        '16',
                        '15',
                        '14',
                        '13',
                        '12',
                        '11',
                        '21',
                        '22',
                        '23',
                        '24',
                        '25',
                        '26',
                        '27',
                        '28',
                    ],
                    'bottom1' => [
                        '48',
                        '47',
                        '46',
                        '45',
                        '44',
                        '43',
                        '42',
                        '41',
                        '31',
                        '32',
                        '33',
                        '34',
                        '35',
                        '36',
                        '37',
                        '38',
                    ],
                    'bottom2' => [
                        '85',
                        '84',
                        '83',
                        '82',
                        '81',
                        '71',
                        '72',
                        '73',
                        '74',
                        '75',
                    ],

                ],*/

                 [
                    'name' => 'hard_tissue_examination_sound_tooth',
                    'label' => 'Sound tooth &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'hard_tissue_examination_sound_tooth'
                ],
                [
                    'name' => 'hard_tissue_examination_missing_tooth',
                    'label' => 'Missing tooth &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  :  ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'hard_tissue_examination_missing_tooth'
                ],
                [
                    'name' => 'hard_tissue_examination_calculus',
                    'label' => 'Plaque and calculus status&emsp;:',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'hard_tissue_examination_calculus'
                ],
                [
                    'name' => 'restorative_and_endodontic_evaluation',
                    'label' => 'Restorative and endodontic evaluation',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'restorative_and_endodontic_evaluation'
                ],
                [
                    'name' => 'endodontic_evaluation_caries_tooth',
                    'label' => '1. Caries tooth &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_caries_tooth'
                ],
                [
                    'name' => 'endodontic_evaluation_fractured_tooth',
                    'label' => '2. Fractured tooth&emsp;&emsp;&emsp;&emsp;&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_fractured_tooth'
                ],
                [
                    'name' => 'endodontic_evaluation_secondary_caries',
                    'label' => '3. Secondary caries&emsp;&emsp;&emsp;&emsp; ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_secondary_caries'
                ],
                [
                    'name' => 'endodontic_evaluation_tenderness_on_percusion',
                    'label' => '4. Tenderness on percusion',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_tenderness_on_percusion'
                ],
                [
                    'name' => 'endodontic_evaluation_swelling',
                    'label' => '5. Swelling &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_swelling'
                ],
                [
                    'name' => 'endodontic_evaluation_pulp_testing',
                    'label' => '6. Pulp testing  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'endodontic_evaluation_pulp_testing'
                ],
                [
                    'name' => 'orthodontic_evaluation',
                    'label' => 'Orthodontic evaluation ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'label',
                    'id' => 'orthodontic_evaluation'
                ],
                [
                    'name' => 'orthodontic_evaluation_oral_habits',
                    'label' => '1. Oral habits ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Yes','No'
                    ],
                    'id' => 'orthodontic_evaluation_oral_habits'
                ],
                [
                    'name' => 'orthodontic_evaluation_tongue_thrusting',
                    'label' => 'A. Tongue thrusting',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_tongue_thrusting'
                ],
                [
                    'name' => 'orthodontic_evaluation_finger_sucking',
                    'label' => 'B. Thumb / finger sucking',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_finger_sucking'
                ],
                [
                    'name' => 'orthodontic_evaluation_finger_sucking_digit',
                    'label' => 'a. Which digit&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_finger_sucking_digit'
                ],
                 [
                    'name' => 'orthodontic_evaluation_finger_age_stopped',
                    'label' => 'b. Age stopped ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_finger_age_stopped'
                ],
                [
                    'name' => 'orthodontic_evaluation_mouth_breathing',
                    'label' => 'C. Mouth breathing ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_mouth_breathing'
                ],
                [
                    'name' => 'orthodontic_evaluation_bruxism',
                    'label' => 'D. Bruxism &emsp;&emsp;&emsp;&emsp;  ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_bruxism'
                ],
                [
                    'name' => 'orthodontic_evaluation_nail_biting',
                    'label' => 'E. Nail biting &emsp;&emsp;&emsp; ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_nail_biting'
                ],
                [
                    'name' => 'orthodontic_evaluation_lip_biting',
                    'label' => 'F. Lip biting  &emsp;&emsp;&emsp;   ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_lip_biting'
                ],
                [
                    'name' => 'orthodontic_evaluation_cheek_biting',
                    'label' => 'G. Cheek biting&emsp;',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline' => true,
                    'class' => 'form-control-food  ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_cheek_biting'
                ],
                [
                    'name' => 'orthodontic_evaluation_others',
                    'label' => 'H. Others ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_others'
                ],
                [
                    'name' => 'orthodontic_evaluation_terminal_plane_relationship',
                    'label' => '2. Terminal plane relationship ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'orthodontic_evaluation_terminal_plane_relationship'
                ],
                [
                    'name' => 'orthodontic_evaluation_terminal_plane_relationship_right',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-contro',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_terminal_plane_relationship_right_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Right',
                    ],
                    'id' => 'orthodontic_evaluation_terminal_plane_relationship_right',
                    'id2' => 'orthodontic_evaluation_terminal_plane_relationship_right_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_terminal_plane_relationship_left',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_terminal_plane_relationship_left_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Left',
                    ],
                    'id' => 'orthodontic_evaluation_terminal_plane_relationship_left',
                    'id2' => 'orthodontic_evaluation_terminal_plane_relationship_left_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_molar_relationship',
                    'label' => '3. Molar relationship ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'orthodontic_evaluation_molar_relationship'
                ],
                [
                    'name' => 'orthodontic_evaluation_molar_relationship_right',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-contro',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_molar_relationship_right_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Right',
                    ],
                    'id' => 'orthodontic_evaluation_molar_relationship_right',
                    'id2' => 'orthodontic_evaluation_molar_relationship_right_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_molar_relationship_left',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_molar_relationship_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Left',
                    ],
                    'id' => 'orthodontic_evaluation_terminal_plane_relationship_left',
                    'id2' => 'orthodontic_evaluation_terminal_plane_relationship_left_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_canine_relationship',
                    'label' => '4. Canine relationship ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'orthodontic_evaluation_canine_relationship'
                ],
                [
                    'name' => 'orthodontic_evaluation_canine_relationship_right',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-contro',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_canine_relationship_right_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Right',
                    ],
                    'id' => 'orthodontic_evaluation_canine_relationship_right',
                    'id2' => 'orthodontic_evaluation_canine_relationship_right_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_canine_relationship_left',
                    'label' => '',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'class2' => 'form-control-food w-300px',
                    'input_type' => 'checkbox',
                    'name2'=>'orthodontic_evaluation_canine_relationship_left_answer',
                    'input_type2'=>'text',
                    'options'=>[
                        'Left',
                    ],
                    'id' => 'orthodontic_evaluation_canine_relationship_left',
                    'id2' => 'orthodontic_evaluation_canine_relationship_left_answer'
                ],
                [
                    'name' => 'orthodontic_evaluation_overjet',
                    'label' => '5. Overjet ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_overjet'
                ],
                [
                    'name' => 'orthodontic_evaluation_overbite',
                    'label' => '6. Overbite ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_overbite'
                ],
                [
                    'name' => 'orthodontic_evaluation_open_bite',
                    'label' => '7. Open bite ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline'=>true,
                    'options'=>[
                        'Present','Absent'
                    ],
                    'class' => 'form-control-food  ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_open_bite'
                ],
                [
                    'name' => 'orthodontic_evaluation_cross_bite',
                    'label' => '8. Cross bite ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_cross_bite'
                ],
                [
                    'name' => 'orthodontic_evaluation_ectopic_eruption',
                    'label' => '9. Ectopic eruption',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_ectopic_eruption'
                ],
                [
                    'name' => 'orthodontic_evaluation_supernumerary_teeth',
                    'label' => '10. Supernumerary teeth',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_supernumerary_teeth'
                ],
                [
                    'name' => 'orthodontic_evaluation_midline',
                    'label' => '11. Midline ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline'=>true,
                    'class' => 'form-control-food ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Normal','Deviated'
                    ],
                    'id' => 'orthodontic_evaluation_midline'
                ],
                [
                    'name' => 'orthodontic_evaluation_crowding_spacing',
                    'label' => '12. Crowding / spacing',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control-food w-300px ',
                    'input_type' => 'text',
                    'id' => 'orthodontic_evaluation_crowding_spacing'
                ],
                [
                    'name' => 'orthodontic_evaluation_proclination',
                    'label' => '13. Proclination ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'styleinline'=>true,
                    'class' => 'form-control-food ',
                    'input_type' => 'checkbox',
                    'options'=>[
                        'Present','Absent'
                    ],
                    'id' => 'orthodontic_evaluation_proclination'
                ],
                [
                    'name' => 'dental_investigation',
                    'label' => 'Investigation ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'dental_investigation',
                    'rows'=>5
                ],
                [
                    'name' => 'dental_diagnosis',
                    'label' => 'Diagnosis ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'dental_diagnosis',
                    'rows'=>5
                ],
                [
                    'name' => 'treatment',
                    'label' => 'Treatment plan  ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'label',
                    'id' => 'treatment'
                ],
                [
                    'name' => 'treatment_systemic_phase',
                    'label' => '1 Systemic phase ',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_systemic_phase',
                    'rows'=>5
                ],
                [
                    'name' => 'treatment_preventive_phase',
                    'label' => '2 Preventive phase',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_preventive_phase',
                    'rows'=>5
                ],
                 [
                    'name' => 'treatment_preparatory_phase',
                    'label' => '3 Preparatory phase',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_preparatory_phase',
                    'rows'=>5
                ],
                [
                    'name' => 'treatment_corrective_phase',
                    'label' => '4 Corrective phase',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_corrective_phase',
                    'rows'=>5
                ],
                [
                    'name' => 'treatment_maintenance_phase',
                    'label' => '5 Maintenance phase',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_maintenance_phase',
                    'rows'=>5
                ],
                [
                    'name' => 'treatment_any_referral',
                    'label' => 'Referral :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control ',
                    'input_type' => 'textarea',
                    'id' => 'treatment_any_referral',
                    'rows'=>5
                ],
           
            ],// dental end
            "dental_tables"=>[
                 [   'title' => '',
                        'columns'=>['Procedure done','Next Visit'],
                        'rows'=>
                        [
                            [
                            'name' => 'dental_table_procedure',
                            'name2' => 'dental_table_nextvisit',
                            'placeholder' => ' ',
                            'value' => '',
                            'required' => false,
                            'class' => 'form-control',
                            'id' => 'dental_table_procedure_nextvisit',
                            ],
                        ] 
                    ],//Table 1
            ],
             'clinical_notes' => [
                [
                    'name' => 'clinical_notes_chief_complaint:',
                    'label' => 'Chief Complaints',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'clinical_notes_chief_complaint',
                    'rows' => ''
                ],
                [
                    'name' => 'clinical_notes_findings:',
                    'label' => 'Clinical Findings :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'clinical_notes_findings',
                    'rows' => ''
                ],
                [
                    'name' => 'clinical_notes_diagnosis:',
                    'label' => 'Diagnosis :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'clinical_notes_diagnosis',
                    'rows' => ''
                ],
                [
                    'name' => 'clinical_notes_treatments:',
                    'label' => 'Treatments :',
                    'placeholder' => ' ',
                    'value' => '',
                    'required' => false,
                    'class' => 'form-control',
                    'input_type' => 'textarea',
                    'id' => 'clinical_notes_treatments',
                    'rows' => ''
                ],
            ],

        ]
    ]
];