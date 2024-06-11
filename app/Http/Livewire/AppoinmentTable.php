<?php

namespace App\Http\Livewire;

use App\Models\Appoinment;
use App\Models\User;
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

final class AppoinmentTable extends PowerGridComponent
{
    use ActionButton;
    protected $index = 0;
    public string $primaryKey = 'appoinments.id';
    public string $sortField = 'appoinments.id';
    private $serialNumber = 1;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
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
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Appoinment>|null
    */
    public function datasource(): ?Builder
    {
        return Appoinment::query()->with('user');
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
        // return [
        //     'patient' => [
        //         'op_no',
        //     ],
        //     // 'restaurants' => [
        //     //     'title',
        //     // ],
        // ];
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

            ->addColumn('action',function(Appoinment $app){
                // dd($app->id);
                $html='';
                $html .= '<a class="btn btn-sm bg-primary my-3 w-90 m-1 text-white" href="'. route('admin.patients.get.appointment',$app->id).'">View</a>';
                // $html .= '<a class="btn btn-sm bg-info my-3 w-72 m-1 text-white" href="'.route('admin.patients.update',$app->user->patient->id).'">Goto Patient</a>';
                // @if(isset($app->prescription))
				//         				<a class="btn btn-sm bg-warning my-3 w-100 text-white" target="_blank" href="{{route('admin.patients.appointments.prescription',['appointment_id' => $app->id,'prescription_id' => $app->prescription->id])}}">Prescription</a>
			    //     				@endif
                $html .= '<a class="btn btn-sm bg-success my-3 w-90 m-1 text-white" href="'.route('admin.patients.appointments.billing',['appoinment' => $app->id]).'">Billing</a>';
                 
                return $html;
            })

            ->addColumn('serial', function () {
                // Use the serialNumber property and then increment it for the next row
                $serial = ($this->perPage * ($this->currentPage -1)) + $this->serialNumber;
                $this->serialNumber++;
                
                return $serial;               
            })
            
            ->addColumn('need_to_see', function (Appoinment $app) {
                
                $doctor = User::find($app->doctor_id);
                if ($doctor) {
                    $name = $doctor->name;
                    return $name;
                } else {
                    return ''; // Or any other appropriate message
                }
            })
            ->addColumn('first_name', function (Appoinment $app) {
                // dd($app->user->first_name);
                return $app->user->first_name;
            })

            ->addColumn('umr_no',function (Appoinment $app){
                return $app->user->patient->umr_no;
            })

            ->addColumn('op_no',function (Appoinment $app){
                return $app->user->patient->op_no;
            })

            ->addColumn('d_o_b', function (Appoinment $app) {
                $formattedDate = Carbon::parse($app->user->patient->d_o_b)->format('d/m/Y');
                $age = ageCalculator($app->user->patient->d_o_b);
                $app->formatted_dob = $formattedDate . ' (' . $age . ' Years)';
                return $app->formatted_dob;
                // return  "" .$app->user->patient->age;
            })

            ->addColumn('father_phone',function (Appoinment $app){

                return $app->user->patient->father_phone;
            })

            ->addColumn('appoinment_date',function (Appoinment $app){

                // return $app->appoinment_date;
                $formattedDate = Carbon::parse($app->appoinment_date)->format('d/m/Y');
                return $formattedDate;
            })

            ->addColumn('appoinment_session',function (Appoinment $app){

                return $app->appoinment_session;
            })

            ->addColumn('status', function (Appoinment $app) {
                // Return a button with red color if the status is "completed"
                if ($app->status == 'completed') {
                    return '<button class="btn btn-sm bg-success text-white">' . ucfirst($app->status) . '</button>';
                }elseif($app->status == 'assigned') {
                    return '<button class="btn btn-sm bg-primary text-white">' . ucfirst($app->status) . '</button>';
                }elseif($app->status == 'awaiting') {
                    return '<button class="btn btn-sm bg-warning text-white">' . ucfirst($app->status) . '</button>';
                }else {
                    return ucfirst($app->status);
                }
                
                
            });

            
            
            ;
            // ->addColumn('created_at_formatted', function(Appoinment $model) {
            //     return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
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
        // return [
        //     Column::add()
        //         ->title('ID')
        //         ->field('id')
        //         ->searchable()
        //         ->sortable(),

        //     Column::add()
        //         ->title('Name')
        //         ->field('name')
        //         ->searchable()
        //         ->makeInputText('name')
        //         ->sortable(),

        //     Column::add()
        //         ->title('Created at')
        //         ->field('created_at')
        //         ->hidden(),

        //     Column::add()
        //         ->title('Created at')
        //         ->field('created_at_formatted')
        //         ->makeInputDatePicker('created_at')
        //         ->searchable()
        // ];
        $column []= Column::add()
                ->title('Action')
                ->field('action');

        $column[] = Column::add()
                ->title('Sno')
                ->field('serial');

        $column []= Column::add()
                ->title('Need to See')
                ->field('need_to_see');
                // ->searchable('first_name') 
                // ->sortable();

        $column []= Column::add()
                ->title('Name')
                ->field('first_name')
                ->searchable('first_name') 
                ->sortable();
                
         $column []=Column::add()
                ->title(__('UMR NO'))
                ->field('umr_no');
                // ->searchable('op_no');

         $column []=Column::add()
                ->title(__('OP NO'))
                ->field('op_no');
                // ->searchable('op_no');

        $column []= Column::add()
                ->title('DOB')
                ->field('d_o_b');
                // ->makeInputText()
                // ->searchable('d_o_b')
                // ->sortable();

        $column []= Column::add()
                ->title('Phone')
                ->field('father_phone')
                ->sortable();
                // ->makeInputText();
                // ->searchable('father_phone');

        $column []= Column::add()
                ->title('Op Date')
                ->field('appoinment_date')
                // ->makeInputText()
                ->searchable('appointment_date')
                ->sortable();

        $column []= Column::add()
                ->title('Op Session')
                ->field('appoinment_session');
                

        $column []= Column::add()
                ->title('Status')
                ->field('status');
                

        
                
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
     * PowerGrid Appoinment Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('appoinment.edit', ['appoinment' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('appoinment.destroy', ['appoinment' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Appoinment Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($appoinment) => $appoinment->id === 1)
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
     * PowerGrid Appoinment Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Appoinment::query()
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
