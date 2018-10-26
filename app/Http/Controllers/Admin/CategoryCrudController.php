<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Category Title"
        ]);
        $this->crud->addField([
        'name' => 'slug',
        'type' => 'text',
        'label' => "URL (slug, alphanumeric -and- dashes only!)"
        ]);
        $this->crud->addField([
            'name' => 'order',
            'type' => 'number',
            'label' => "Order"
        ]);
        $this->crud->addField([
            'name' => 'parent_id',
            'type' => 'select2',



            'name' => 'parent_id', // the db column for the foreign key
            'entity' => 'parent', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Category",
            'label' => "Parent ID"
        ]);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'tinymce',
            'label' => 'Content'
        ]);
        $this->crud->addField([
            'label' => "Thumbnail",
            'name' => "thumbnail",
            'type' => 'image',
            'upload' => true,
        ]);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        $this->crud->addColumns(['title', 'slug', 'parent_id', 'order', 'thumbnail']); 

        // add asterisk for fields that are required in CategoryRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        // dd($request);
        if($request['thumbnail'] == NULL){
            $request['thumbnail'] = 'no-file.jpg';
        }
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
