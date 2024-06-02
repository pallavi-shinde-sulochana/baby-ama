<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserInfo;
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
use Illuminate\Support\Collection;

final class DoctorTable extends PowerGridComponent
{
    use ActionButton;
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
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\User>|null
    */
    public function datasource(): ?Builder
    {
        // return User::query();
        $data = User::with("roles")->whereHas("roles", function($q) {
                $q->whereIn("name", ['doctor']);
            });
        // dd(collect($data));
        // return collect(

        //         // ['id' => 1, 'name' => 'Name 1', 'price' => 1.58, 'created_at' => now(),],
        //         // ['id' => 2, 'name' => 'Name 2', 'price' => 1.68, 'created_at' => now(),],
        //         // ['id' => 3, 'name' => 'Name 3', 'price' => 1.78, 'created_at' => now(),],
        //         // ['id' => 4, 'name' => 'Name 4', 'price' => 1.88, 'created_at' => now(),],
        //         // ['id' => 5, 'name' => 'Name 5', 'price' => 1.98, 'created_at' => now(),],
        //         $data

        // );
        return $data;
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
                ->addColumn('serial', function () {
                    // Use the serialNumber property and then increment it for the next row
                    $serial = $this->serialNumber;
                    $this->serialNumber++;

                    return $serial;
                })
                ->addColumn('first_name')
                ->addColumn('last_name')
                ->addColumn('email')
                ->addColumn('specialist_type',function(User $model){
                    $specialist_type = json_decode($model->info->specialist_type,TRUE);
                    $html = '';
                    $find = ['-'];
                    try{
                        //dd($specialist_type);
                        // $specialist_type =json_decode($specialist_type);
                        if(is_array($specialist_type)){

                            // $specialist_type = explode(',',$specialist_type);
                        }

                    }catch(Exception $e){
                        $specialist_type=$specialist_type;
                    }
                    // dd($specialist_type);
                    if(is_array($specialist_type)){
                    // if($specialist_type){
                        foreach($specialist_type as $s){
                            $html .= '<span class="ms-1 badge rounded-pill bg-info text-white">'.str_replace($find,' ',ucfirst($s)).'</span>';
                        }
                    }else{
                        $html .= '<span class="ms-1 badge rounded-pill bg-info text-white">'.str_replace($find,' ',ucfirst($specialist_type)).'</span>';
                    }
                    return $html;
                });
            // ->addColumn('id')
            // ->addColumn('name')
            // ->addColumn('created_at')
            // ->addColumn('created_at_formatted', function(User $model) {
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
        return [
            Column::add()
                ->title('Sno')
                // ->field('id')
                ->field('serial')
                // ->searchable()
                ->sortable(),

            Column::add()
                ->title('First Name')
                ->field('first_name')
                ->searchable()
                // ->makeInputText('first_name')
                ->sortable(),

            Column::add()
                ->title('Last Name')
                ->field('last_name')
                ->searchable()
                // ->makeInputText('last_name')
                ->sortable(),

            Column::add()
                ->title('Email')
                ->field('email')
                ->searchable()
                // ->makeInputText('email')
                ->sortable(),

            Column::add()
                ->title('Specialist Type')
                ->field('specialist_type'),

            // Column::add()
            //     ->title('Name')
            //     ->field('name')
            //     ->searchable()
            //     ->makeInputText('name')
            //     ->sortable(),

            // Column::add()
            //     ->title('Created at')
            //     ->field('created_at')
            //     ->hidden(),

            // Column::add()
            //     ->title('Created at')
            //     ->field('created_at_formatted')
            //     ->makeInputDatePicker('created_at')
            //     ->searchable()
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid User Action Buttons.
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
               ->route('user.edit', ['user' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('user.destroy', ['user' => 'id'])
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
     * PowerGrid User Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($user) => $user->id === 1)
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
     * PowerGrid User Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = User::query()
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
    public function actions(): array
    {
        return [

                Button::add('edit')
                ->caption('Edit')
                ->class('btn btn-sm btn-success')
                ->route('doctor.users.update.doctor', ['doctor' => 'id']),
        ];
    }
}
