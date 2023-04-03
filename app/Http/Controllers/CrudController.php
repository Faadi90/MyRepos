<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Http\Requests\StoreCrudRequest;
use App\Http\Requests\UpdateCrudRequest;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Crud::all();
        $data = Crud::paginate(4);
        // $data = Crud::simplePaginate(4);

        // return $data;
        return view('crud', ['data'=> $data]);
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            $crud = new Crud;
            $crud->name = $request->name;
            $crud->detail = $request->detail;
            $crud->image = $request->image;
            $status = $crud->save();

            // AnOther way to store all the values in db for below also add fillable fields in model:            
            // $status = Crud::create($request->all());

            $request->session()->flash('crud','Your data has been saved successfully');

            // return redirect('crud');
            return to_route('crudfront');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrudRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = Crud::find($id);

        // return view('crudedit', ['data'=>$data]);
        return view('crudedit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Crud::find($request->id);
        $data->name = $request->name;
        $data->detail = $request->detail;
        $data->image = $request->image;

/*        $data->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $request->image
        ]);
*/

        $status = $data->save();
        $request->session()->flash('update','Your data has been updated successfully');

        return redirect('crud');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $data = Crud::find($id);
        $status = $data->delete();
        $request->session()->flash('delete','Your data has been deleted successfully');

        return redirect('crud');

    }
}
