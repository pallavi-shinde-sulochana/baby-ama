<?php

namespace App\Http\Livewire\Admin\User;

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
use Livewire\Component;

final class Table extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;
    protected $index = 0;
    public $role;
    public string $primaryKey = 'users.id';
    public string $sortField = 'users.id';


    public function __construct($role)
    {
        $this->role = $role;
    }

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
            ->showToggleColumns()
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
        return User::query()
        ->join('user_infos', function ($user_infos) {
            $user_infos->on('user_infos.user_id', '=', 'users.id');
        })
        ->role($this->role);
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
            ->addColumn('index', function (User $model){
                $index = $this->index++;
                return ($this->page-1) * $this->perPage + $index + 1 ;
            })
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('phone',function(User $model){
                return $model->info->phone;
            })
            ->addColumn('role',function(User $model){
                $roles = $model->roles->pluck('name');
                $html = '';
                foreach($roles as $role){
                    $html .= '<span class="ms-1 badge rounded-pill bg-info text-white">'.ucfirst($role).'</span>';
                }
                return $html;
            })
            ->addColumn('specialist_type',function(User $model){
                $specialist_type = json_decode($model->info->specialist_type);
                $html = '';
                $find = ['-'];
                if(is_array($specialist_type)){
                    foreach($specialist_type as $s){
                        $html .= '<span class="ms-1 badge rounded-pill bg-info text-white">'.str_replace($find,' ',ucfirst($s)).'</span>';
                    }
                }
                return $html;
            });
            // ->addColumn('created_at')
                
            // ->addColumn('created_at_formatted', function(User $model) {
            //     return $model->created_at->diffForHumans();
            //     // return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
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
        $column = [];

        $column[] = Column::add()
                ->title('No')
                ->field('index');

        $column[] = Column::add()
                ->title('Name')
                ->field('name');
                // ->searchable()
                // ->sortable();

        $column[] = Column::add()
                ->title('Email')
                ->field('email','users.email')
                ->searchable()
                ->makeInputText()
                ->sortable();

        $column[] = Column::add()
                ->title('Phone Number')
                ->field('phone','user_infos.phone')
                ->searchable()
                ->makeInputText()
                ->sortable();

        $column[] = Column::add()
                ->title('User Role')
                ->field('role');
                // ->searchable()
                // ->sortable();

        if($this->role === 'doctor'){
            $column[] = Column::add()
                ->title('Specialist Type')
                ->field('specialist_type');
                // ->searchable()
                // ->sortable();
        }
        

        // $column = Column::add()
        //         ->title('Created at')
        //         ->field('created_at')
        //         ->hidden();
        // array_push($temp,$column);

        // $column = Column::add()
        //         ->title('Created at')
        //         ->field('created_at_formatted')
        //         ->makeInputDatePicker('created_at')
        //         ->searchable();
        // array_push($temp,$column);



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
     * PowerGrid User Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    
    public function actions(): array
    {
       return [

            Button::add('view')
                ->caption('View')
                ->class('btn btn-sm btn-primary')
                // ->route('user.edit', ['user' => 'id'])
                // ->emitTo('admin-component','postAdded', ['key' => 'id']),
                ,

            Button::add('edit')
                ->caption('Edit')
                ->class('btn btn-sm btn-success')
                ->emit('editUserDetails', ['id' => 'id']),

            Button::add('destroy')
                ->caption('Delete')
                ->class('btn btn-sm btn-danger')
                // ->route('user.destroy', ['user' => 'id'])
                // ->emitTo('admin-component','postAdded', ['key' => 'id'])
                ->emit('removeUser', ['id' => 'id']),

           
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

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(), 
            [
                'roleChanged' => 'roleChanged',
                'removeUser' => 'removeUser'
            ]);
    }


    public function roleChanged($role){
        $this->role = $role;
    }

    public function removeUser($data){
        $this->dispatchBrowserEvent('remove:user', ['data' => $data]);
    }
}
