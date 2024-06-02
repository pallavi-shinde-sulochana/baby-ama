<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Button;

use App\Models\User;
use App\Models\UserInfo;

final class AdminTable extends PowerGridComponent
{
    use ActionButton;
    private $serialNumber = 1;

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Collection
    {

        $data = User::with("roles")->whereHas("roles", function($q) {
                $q->whereIn("name", ['admin','super-admin'])->where('email','!=','demo@demo.com');
            })->get();
        // dd($data);
        return collect(
            
                // ['id' => 1, 'name' => 'Name 1', 'price' => 1.58, 'created_at' => now(),],
                // ['id' => 2, 'name' => 'Name 2', 'price' => 1.68, 'created_at' => now(),],
                // ['id' => 3, 'name' => 'Name 3', 'price' => 1.78, 'created_at' => now(),],
                // ['id' => 4, 'name' => 'Name 4', 'price' => 1.88, 'created_at' => now(),],
                // ['id' => 5, 'name' => 'Name 5', 'price' => 1.98, 'created_at' => now(),],
                $data
            
        );
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showExportOption('download', ['excel', 'csv'])
            ->showSearchInput();
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
            ->addColumn('roles',function ($entry) {
                $test = $entry->getRoleNames()->first();

                $div ='<span class="ms-1 badge rounded-pill bg-info text-white">'.ucwords(str_replace(['-'],' ',$test)).'</div>';
                // return ucwords(str_replace(['-'],' ',$test));
                return $div;
            });
            // ->addColumn('created_at_formatted', function ($entry) {
            //     return Carbon::parse($entry->created_at)->format('d/m/Y');
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
                ->title('Role')
                ->field('roles')
                // ->searchable()
                // ->makeInputText('email')
                // ->sortable(),


            // Column::add()
            //     ->title('Role')
            //     ->field('role')
            //     ->sortable()
                // ->makeInputRange('price', '.', ''),

            // Column::add()
            //     ->title('Created At')
            //     ->field('created_at_formatted')
            //     ->makeInputDatePicker('created_at'),
        ];
    }

     public function actions(): array
    {
        return [

                Button::add('edit')
                ->caption('Edit')
                ->class('btn btn-sm btn-success')
                ->route('admin.users.update.admin', ['admin' => 'id']),
        ];
    }
}
