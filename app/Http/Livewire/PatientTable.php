<?php

namespace App\Http\Livewire;

use App\Models\Patient;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class PatientTable extends PowerGridComponent
{
    use ActionButton;
    protected $index = 0;
    public string $primaryKey = 'patients.id';
    public string $sortField = 'patients.id';

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;
    private $serialNumber = 1;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        // $this->showCheckBox()
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Patient>|null
    */
    public function datasource(): ?Builder
    {
        return Patient::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            // ->addColumn('id')
            // ->addColumn('first_name')
          ->addColumn('edit', function(Patient $model) {
                    $html = '';
                    $html .= '<a href="'.route('admin.patients.update', ['patient' => $model->id]).'"><i class="fa fa-edit fa-2x"></i></a> &emsp;';
                    $html .= '<a href="#" onclick="event.preventDefault(); if(confirm(\'Are you sure?\')) { document.getElementById(\'delete-patient-'.$model->id.'\').submit(); }"><i class="fa fa-trash text-danger fa-2x"></i></a>&emsp;';
                    $html .= '<a href="'.route('admin.patient.create.appointment', ['patient' => $model->id]).'"><i class="fa fa-plus fa-2x"></i></a>';
                    $html .= '<form id="delete-patient-'.$model->id.'" action="'.route('admin.patients.destroy', ['patient' => $model->id]).'" method="POST" style="display: none;">';
                    $html .= csrf_field();
                    $html .= method_field('DELETE');
                    $html .= '</form>';

                    return $html;
                })

            // ->addColumn('edit',function(Patient $model){
            //     $html='';
            //     $html .= '<a href="'.route('admin.patients.update', ['patient' => $model->id]).'"><i class="fa fa-edit fa-2x"></i></a> &emsp;';
            //     $html .= "<a href='#'><i class='fa fa-trash text-danger fa-2x'></i></a>&emsp;";
            //     $html .= '<a href="'.route('admin.patient.create.appointment', ['patient' => $model->id]).'"><i class="fa fa-plus fa-2x"></i></a>';

            //     return $html;
            // })
            ->addColumn('serial', function () {
                    // Use the serialNumber property and then increment it for the next row
                    $serial = ($this->perPage * ($this->currentPage -1)) + $this->serialNumber;
                    $this->serialNumber++;

                    return $serial;
            })
            ->addColumn('first_name',function(Patient $model){

                $html = '<a href='.route('admin.patients.update',$model->id).'>'.$model->first_name.' '.$model->last_name.'</a>';

                return $html;

            })
            // ->addColumn('last_name')
            ->addColumn('umr_no')
            ->addColumn('d_o_b',function(Patient $model){
                $formattedDate = Carbon::parse($model->d_o_b)->format('d/m/Y');
                $age = ageCalculator($model->d_o_b);
               //  $html = $model->d_o_b.', '.$age.' Years';
               //  $html = $model->d_o_b.', '.'('.$model->age.')';
                $model->formatted_dob = $formattedDate;
                return $model->formatted_dob;
               // return $html;
            })
           // ->addColumn('age')
            ->addColumn('father_name')
            ->addColumn('mother_name')
            // ->addColumn('parents',function(Patient $model){

            //     $html = $model->father_name.' / '.$model->mother_name;

            //     return $html;
            // })
            ->addColumn('address',function(Patient $model){

                return substr($model->address, 0, 20);

            })
            // ->addColumn('address')
            // substr($string, 0, $size);
            // ->addColumn('mobile',function(Patient $model){

            //     $html = $model->father_phone.' / '.$model->mother_phone;

            //     return $html;
            // });

            ->addColumn('father_phone')
            ->addColumn('mother_phone');
            // ->addColumn('d_o_b')
            // ->addColumn('created_at_formatted', function(Patient $model) {
            //     return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            // })
            // ->addColumn('updated_at_formatted', function(Patient $model) {
            //     return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            // });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
//         return [
//             Column::add()
//                 ->title('ID')
//                 ->field('id')
//                 ->makeInputRange(),


//             Column::add()
//                 ->title('CREATED AT')
//                 ->field('created_at_formatted', 'created_at')
//                 ->searchable()
//                 ->sortable()
//                 ->makeInputDatePicker('created_at'),

//             Column::add()
//                 ->title('UPDATED AT')
//                 ->field('updated_at_formatted', 'updated_at')
//                 ->searchable()
//                 ->sortable()
//                 ->makeInputDatePicker('updated_at'),

//         ]
// ;

       // $column[] =Column::add('index', function (Patient $model){
       //          $index = $this->index++;
       //          return ($this->page-1) * $this->perPage + $index + 1 ;
       //      });
        $column[] = Column::add()
                ->title(' ')
                ->field('edit');
        $column[] = Column::add()
                ->title('Sno')
                ->field('serial');

        $column []= Column::add()
                ->title('Baby Name')
                ->field('first_name')
                ->searchable('first_name')
                // ->makeInputText()
                ->sortable();
        // $column []= Column::add()
        //         ->field('last_name')
        //         ->searchable('first_name');
                // ->makeInputText();
                // ->sortable();
        $column []= Column::add()
                ->title('UMR /OP No')
                ->field('op_no')
                ->searchable('op_no')
                // ->makeInputText()
                ->sortable();
        $column []= Column::add()
                ->title('DOB')
                ->field('d_o_b')
                ->searchable('d_o_b')
                // ->makeInputText()
                ->sortable();
                // ->makeInputDatePicker('d_o_b');

        $column []= Column::add()
                ->title('Age')
                ->field('age')
                ->searchable('age');

        $column []= Column::add()
                ->title('Father')
                ->field('father_name')
                ->searchable('father_name');

        $column []= Column::add()
                ->title('Mother')
                ->field('mother_name')
                ->searchable('mother_name');

        // $column []= Column::add()
                // ->title('Parents')
                // ->searchable('patients.father_name')
                // ->field('parents');
                // ->sortable();
                // ->makeInputText();
        $column []= Column::add()
                ->title('Address')
                ->field('address')
                ->searchable('address');
                // ->makeInputText()
                // ->sortable();
         $column []= Column::add()
                ->title('Contact Number')
                ->field('father_phone')
                ->searchable('father_phone');
                // ->makeInputText();
        $column []= Column::add()
                ->title('Alternate Number')
                ->field('mother_phone')
                ->searchable('mother_phone');
        return $column;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Patient Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    public function actions(): array
    {
      /* return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('admin.patients.update', ['patient' => 'id']),

           // Button::add('destroy')
           //     ->caption('Delete')
           //     ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
           //     ->route('patient.destroy', ['patient' => 'id'])
           //     ->method('delete')
        ];*/

        return [

            // Button::add('view')
            //     ->caption('View')
            //     ->class('btn btn-sm btn-primary')
                // ->route('user.edit', ['user' => 'id'])
                // ->emitTo('admin-component','postAdded', ['key' => 'id']),
                // ,

          /*  Button::add('edit')
                ->caption('Edit')
                ->class('btn btn-sm btn-success')
                ->route('admin.patients.update', ['patient' => 'id']),

            Button::add('destroy')
                ->caption('Delete')
                // ->onclick("return confirm('Are you sure?')")
                ->class('btn btn-sm btn-danger')
                // ->route('user.destroy', ['user' => 'id'])
                // ->emitTo('admin-component','postAdded', ['key' => 'id'])
                ->route('admin.patients.update', ['patient' => 'id']),
                // ->method('delete'),

            Button::add('edit')
                ->caption('Add Appoinment')
                ->class('btn btn-sm btn-info')
                ->route('admin.patient.create.appointment', ['patient' => 'id']),*/
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Patient Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($patient) => $patient->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Patient Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Patient::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
