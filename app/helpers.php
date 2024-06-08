<?php

if (!function_exists('get_svg_icon')) {
    function get_svg_icon($path, $class = null, $svgClass = null)
    {
        $file_path = public_path(theme()->getMediaUrlPath() . $path);

        if (!file_exists($file_path)) {
            return '';
        }

        $svg_content = file_get_contents($file_path);

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');

        if (!empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $asd = explode('/media/', $path);
        if (isset($asd[1])) {
            $path = 'assets/media/' . $asd[1];
        }

        $output = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="' . implode(' ', $cls) . '">' . $string . '</span>';
        $output .= "\n<!--end::Svg Icon-->";

        return $output;
    }
}

if (!function_exists('theme')) {
    function theme()
    {
        return app(\App\Core\Adapters\Theme::class);
    }
}

if (!function_exists('util')) {
    function util()
    {
        return app(\App\Core\Adapters\Util::class);
    }
}

if (!function_exists('assetIfHasRTL')) {
    function assetIfHasRTL($path, $secure = null)
    {
        if (isRTL()) {
            return asset(dirname($path) . '/' . basename($path, '.css') . '.rtl.css');
        }

        return asset($path, $secure);
    }
}

if (!function_exists('isRTL')) {
    function isRTL()
    {
        return (bool) request()->input('rtl');
    }
}

if (!function_exists('deleteFilesFromGivenPath')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    function deleteFilesFromGivenPath($path)
    {
        if ($path) {
            if (\File::exists(storage_path('app/public/' . $path))) {

                \File::delete(storage_path('app/public/' . $path));
            }
        }
    }
}


if (!function_exists('assignUserRole')) {
    function assignUserRole($user = null, $role = 'patient')
    {
        if ($user) {
            $user->assignRole($role);
        }
    }
}

if (!function_exists('getUMRONo')) {
    function getUMRONo()
    {

        $result = env('BABY_UMRO_START');
        $start = env('BABY_UMRO_START');

        $year = date('y');
        $month = date('m');
        $formData = $year . $month;

        // $data = \App\Models\Patient::select('umr_no')->max('umr_no');
        $data = \App\Models\Patient::select('op_no')->where('op_no', 'like', '%' . $formData . '%')->max('op_no');

        if ($data) {
            $result = (int) $data + 1;
        } else {
            $result = $formData . $start;
        }

        return $result;
    }
}

if (!function_exists('ageCalculator')) {
    function ageCalculator($dob)
    {
        if (!empty($dob)) {
            $birthdate = new DateTime($dob);
            $today = new DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
        } else {
            return 0;
        }
    }
}

// if (!function_exists('ageCalculator')) {
//     function ageCalculator($dob)
//     {
//         if (!empty($dob)) {
//             $birthdate = new DateTime($dob);
//             $today = new DateTime('today');
//             $ageInYears = $birthdate->diff($today)->y;

//             if ($ageInYears > 0) {
//                 return $ageInYears;
//             } else {
//                 $ageInMonths = $birthdate->diff($today)->m;
//                 return $ageInMonths . ' Months';
//             }
//         } else {
//             return '0 Years';
//         }
//     }
// }

if (!function_exists('getDoctorSpecialistType')) {
    function getDoctorSpecialistType()
    {
        return config('specialist-type.specialist_type');
    }
}

if (!function_exists('getPharmacySpecialistType')) {
    function getTherapistSpecialistType()
    {
        return config('therapist-specialist-type.specialist_type');
    }
}

if (!function_exists('helperGetAuthUser')) {
    function helperGetAuthUser($param = null)
    {
        $auth = \Auth::user();

        if ($auth && !empty($param)) {
            // $result = (isset($auth->$param)) ? $auth->$param : null;
            $result = (isset($auth->$param)) ? $auth->$param : null;
            if (!$result) {
                $result = (isset($auth->info->$param)) ? $auth->info->$param : null;
            }
            return $result;
        } elseif ($auth) {
            return $auth;
        }
        return null;

    }
}

if (!function_exists('helperGetAuthPatient')) {
    function helperGetAuthPatient($param = null)
    {
        $auth = \Auth::user();

        if ($auth && !empty($param)) {
            // $result = (isset($auth->$param)) ? $auth->$param : null;
            $result = (isset($auth->$param)) ? $auth->$param : null;
            if (!$result) {
                $result = (isset($auth->patient->$param)) ? $auth->patient->$param : null;
            }
            return $result;
        } elseif ($auth) {
            return $auth;
        }
        return null;

    }
}

if (!function_exists('helperGetAuthUserSpecialization')) {
    function helperGetAuthUserSpecialization($onlyone = null)
    {
        $data = helperGetAuthUser('specialist_type');
        if ($data) {
            $data = json_decode($data);
            if ($onlyone) {
                $data = $data[0];
            }

            if (is_array($data)) {
                // If it's an array, proceed with implode
                $implodedData = implode(',', $data);
                // Use $implodedData as needed
            } else {
                // If $data is not an array, handle the situation accordingly
                echo "Error: \$data is not an array";
                // Or perform any other error handling or operations you require
            }



            $data = strtoupper(str_replace(['_'], ' ', $data));
            $data = str_replace([','], ', ', $data);

        }

        return $data;

    }
}


if (!function_exists('helperAssetUrl')) {
    function helperAssetUrl($path)
    {
        $url = asset('/front-end') . '/' . $path;
        return $url;
    }
}

if (!function_exists('helperParseDate')) {
    function helperParseDate($date, $createFrom = 'Y-m-d', $returnTo = 'Y-m-d')
    {
        if ($date) {

            $date = \Carbon\Carbon::createFromFormat($createFrom, $date)->format($returnTo);
            return $date;
        }
    }
}


if (!function_exists('helperGetPediatricForm')) {
    function helperGetPediatricForm()
    {
        $form = new \StdClass();

        // $form->chief_complaints

    }
}

if (!function_exists('helperGenerateOTP')) {

    function helperGenerateOTP($n = 4)
    {

        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        helperForgetSystemSession('user_otp');
        helperSetSystemSession('user_otp', $result);

        return $result;
    }
}

if (!function_exists('helperSetSystemSession')) {
    function helperSetSystemSession($key = 'ksSetSystemSession', $value = 'yes')
    {
        \Session::put($key, $value);
        \Session::save();
    }
}

if (!function_exists('helperGetSystemSession')) {
    function helperGetSystemSession($key = 'ksSetSystemSession')
    {
        $ksGetSystemSession = \Session::get($key);
        return $ksGetSystemSession;
    }
}

if (!function_exists('helperForgetSystemSession')) {
    function helperForgetSystemSession($key = 'ksSetSystemSession')
    {
        \Session::forget($key);
        \Session::save();
    }
}


if (!function_exists('helperFormatMedicinePrefix')) {
    function helperFormatMedicinePrefix($key = 'tablet')
    {
        $result = '';
        if ($key == 'tablet') {
            $result = 'TAB';
        } elseif ($key == 'syrup') {
            $result = 'SYP';
        } elseif ($key == 'injection') {
            $result = 'INJ';
        } elseif ($key == 'drops') {
            $result = 'DRP';
        }

        return $result;
    }
}


if (!function_exists('helperGenerteHtml')) {
    function helperGenerteHtml($data = [])
    {
        $html = '';

        $value = isset($data->value) ? $data->value : '';

        if ($data) {

            if ($data->input_type == 'label') {
                $html .= '<div id="' . $data->container_id . '" class="' . $data->container_calss . '">';
                $html .= ' <label for="' . $data->id . '" class="' . $data->class . '">' . $data->label . ' </label>';
                $html .= '</div>';

            }
            if ($data->input_type == 'text') {
                $suffix = isset($data->label_suffix) ? ' ' . $data->label_suffix : '';
                $html .= '<div id="' . $data->container_id . '" class="' . $data->container_calss . '">';
                $html .= ' <div class="' . $data->class . '">';
                $html .= ' <label for="' . $data->id . '" class="form-label">' . $data->label . ' </label>';
                $html .= ' <input type="' . $data->input_type . '" class="form-field" id="' . $data->id . '" name="' . $data->name . '" value="' . $value . '"><span class="ps-2"

                >' . $suffix . '</span>';
                $html .= '</div>';
                $html .= '</div>';
            }
            if ($data->input_type == 'textarea') {
                $html .= '<div id="' . $data->container_id . '" class="' . $data->container_calss . '">';
                $html .= ' <label for="' . $data->id . '" class="form-label">' . $data->label . ' </label>';
                $html .= ' <textarea rows="' . $data->rows . '"  class="' . $data->class . '" id="' . $data->id . '" name="' . $data->name . '">' . $value . '</textarea>';
                $html .= '</div>';

            }

            if ($data->input_type == 'checkbox') {
                $html .= '<div id="' . $data->container_id . '" class="' . $data->container_calss . '">';
                $html .= ' <label for="' . $data->id . '" class="form-label">' . $data->label . ' </label>';
                foreach ($data->options as $option) {
                    if ($data->value) {
                        $isChecked = (in_array($option, $data->value)) ? 'checked' : '';
                    } else {
                        $isChecked = '';
                    }
                    $html .= '<div class="checkbox-list">';
                    $html .= '<label class="checkbox">
                    <input type="checkbox"  name="' . $data->name . '[]" value="' . $option . '" ' . $isChecked . '/>
                    <span>' . $option . '</span>
                    </label>';
                    $html .= '</div>';
                }
                $html .= '</div>';

            }

            if ($data->input_type == 'inputcheckbox') {
                $suffix = isset($data->label_suffix) ? ' ' . $data->label_suffix : '';
                if ($data->value) {
                    $isChecked = ($data->value) ? 'checked' : '';
                } else {
                    $isChecked = '';
                }
                $html .= '<div id="' . $data->container_id . '" class="input-with-checkbox ' . $data->container_calss . '">';
                $html .= '<div class="input-lbl">' . $data->label . '</div>';
                $html .= '<div class="input-fld ' . $data->class . '">';
                $html .= '<label class="checkbox" for="' . $data->id . '">';
                $html .= '<input type="checkbox" id="' . $data->id . '" name="' . $data->name . '-checkbox" value="' . $data->value . '" ' . $isChecked . '>';
                $html .= '<span>' . $suffix . '</span>';
                $html .= '</label>';
                $html .= ' <label class="input-fld" for="' . $data->id . '">';
                $html .= '<input type="text" class="form-field" id="' . $data->id . '" name="' . $data->name . '" value="' . $data->value . '">';
                $html .= '</label>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }

        return $html;
    }
}


if (!function_exists('helperGenerteHtmlDentalForm')) {
    function helperGenerteHtmlDentalForm($data = [])
    {
        $html = '';

        $value = isset($data->value) ? $data->value : '';
        $value2 = isset($data->value2) ? $data->value2 : '';
        $value_yes = isset($data->value_yes) ? $data->value_yes : '';

        if ($data) {

            if ($data->input_type == 'label') {
                $html .= ' <label for="' . $data->label . '" class="form-label">' . $data->label . ' </label>';
            }

            if ($data->input_type == 'text') {
                $suffix = isset($data->label_suffix) ? ' ' . $data->label_suffix : '';
                $html .= ' <label for="' . $data->label . '" class="form-label">' . $data->label . ' </label>';
                $html .= ' <input type="' . $data->input_type . '" class="' . $data->class . '" id="' . $data->id . '" name="' . $data->name . '" value="' . $value . '">' . $suffix;

            }
            if ($data->input_type == 'textarea') {
                $html .= ' <label for="' . $data->label . '" class="form-label">' . $data->label . ' </label>';
                $html .= ' <textarea rows="' . $data->rows . '"  class="' . $data->class . '" id="' . $data->id . '" name="' . $data->name . '">' . $value . '</textarea>';
            }

            if ($data->input_type == 'checkbox') {

                if (!empty($data->label)) {

                    $html .= ' <label for="' . $data->label . '" class="form-label">' . $data->label . ' </label>';
                }

                $html .= !isset($data->styleinline) ? '<div class=" ">' : '&emsp;';
                foreach ($data->options as $option) {
                    if ($data->value) {
                        $isChecked = (in_array($option, $data->value)) ? 'checked' : '';
                    } else {
                        $isChecked = '';
                    }

                    if ($option != 'YesText') {

                        $html .= '<label class="checkbox">
                    <input type="checkbox"  name="' . $data->name . '[]" value="' . $option . '" ' . $isChecked . '/>
                    <span></span>
                        ' . $option . '
                    </label> &emsp;';
                    } else {

                        if (isset($data->yes_name)) {
                            $html .= ' <input type="' . $data->yes_input_type . '" class="' . $data->yes_class . '" id="' . $data->yes_id . '" name="' . $data->yes_name . '" value="' . $value_yes . '">' . $data->yes_label;
                        }
                    }
                }

                if (isset($data->name2)) {
                    $html .= ' <input type="' . $data->input_type2 . '" class="' . $data->class2 . '" id="' . $data->id2 . '" name="' . $data->name2 . '" value="' . $value2 . '">';
                }

                $html .= !isset($data->styleinline) ? '</div>' : '';


            }
        }

        return $html;
    }
}

if (!function_exists('getMedcineDetail')) {
    function getMedcineDetail($id = null)
    {
        return \App\Models\Medicine::find($id);
    }
}


if (!function_exists('getUserCRUDRedirect')) {
    function getUserCRUDRedirect()
    {
        $getRoute = Illuminate\Support\Facades\Route::currentRouteName();
        // dd($getRoute);
        $result = '';
        if (str_contains($getRoute, '.admin')) {
            $result = 'admin.users.list.admin';
        } elseif (str_contains($getRoute, '.pharmacy')) {
            $result = 'pharmacy.users.list.pharmacy';
        } elseif (str_contains($getRoute, '.doctor')) {
            $result = 'doctor.users.list.doctor';
        } elseif (str_contains($getRoute, '.therapist')) {
            $result = 'therapist.users.list.therapist';
        } else {
            $result = 'admin.users.list.admin';
        }
        return $result;
    }
}
