<?php

namespace App\Http\Controllers\People;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\People\Person;

class PersonController extends Controller
{

    private $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $people = $this->person->paginate(10);
        return view('panel.people.index',compact('people'));
        //return response()->view('Panel.People.people',$people, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.people.create-edit',compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $this->person->updateCpfCnpj($request->all());
        $this->person->create($dataForm)->adress()->create($dataForm);
        $people = $this->person->paginate(10);
        return redirect('people')->with(compact('people'))->with('msg','Cadastro Realizado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = $this->person->find($id);
        ($person['cpf']) ? $person['cpf_cnpj'] = $person['cpf'] : $person['cpf_cnpj'] = $person['cnpj'];
        return view('panel.people.create-edit',compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $this->person->updateCpfCnpj($request->except('_method','_token'));
        $person = $this->person->find($id);
        $person->update($dataForm); //dd($dataForm);
        if (isset($dataForm['postal_code'])) {
            isset($person->adress) ? $person->adress()->create($dataForm) : $person->adress()->update($dataForm);
        }
       dd(5);
        $people = $this->person->paginate(10);
        return redirect('people')->with(compact('people'))->with('msg','Edição Realizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->person->find($id)->delete();
        return back();
    }
}
