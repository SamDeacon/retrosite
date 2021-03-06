<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PageRequest as StoreRequest;
use App\Http\Requests\PageRequest as UpdateRequest;

/**
 * Class PageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PageCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Page');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page');
        $this->crud->setEntityNameStrings('page', 'pages');
        $this->crud->addColumns(['title', 'slug','excerpt', 'image']); 
        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Page Title"
        ]);
        $this->crud->addField([
        'name' => 'slug',
        'type' => 'text',
        'label' => "URL (slug, alphanumeric -and- dashes only!)"
        ]);
        $this->crud->addField([
            'name' => 'excerpt',
            'type' => 'textarea',
            'label' => 'Excerpt'
        ]);
        $this->crud->addField([
            'name' => 'body',
            'type' => 'tinymce',
            'label' => 'Content'
        ]);
        $this->crud->addField([
            'name' => 'image',
            'type' => 'browse',
            'label' => 'Image'
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'type' => 'textarea',
            'label' => 'Meta description'
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => 'Meta keywordsz'
        ]);

                //   'author_id', 'title', 'excerpt', 'body', 'image', 'slug', 'meta_description', 'meta_keywords', 'published'
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in PageRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
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
