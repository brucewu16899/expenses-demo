<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseSupplement;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $expense = Expense::create($request->only(['description', 'base_amount']));

        if($request->has('supplement')) {
            //$supplements = $this->parseSupplements($request);
            $supplements = $request->get('supplement');

            // now we save the models to the database
            foreach($supplements as $id => $supplement) {
                $expense->supplements()->create($supplement);
            }
        }

        // all saved and good to go
        return redirect()->route('expenses.index')->with('success', 'Successfully created a new expense');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // Save the updated expense
        $expense = Expense::findOrFail($id);
        $expense->base_amount = $request->get('base_amount');
        $expense->description = $request->get('description');
        $expense->save();

        // construct and save the expense supplements
        if($request->has('supplement')) {

            //$supplements = $this->parseSupplements($request);
            $supplements = $request->get('supplement');

            // now we save the models to the database
            foreach($supplements as $id => $supplement) {

                $result = ExpenseSupplement::find($id);
                if($result instanceof ExpenseSupplement) {
                    $result->update($supplement);
                } else {
                    $expense->supplements()->create($supplement);
                }
            }
        }

        // all saved and good to go
        return redirect()->back()->with('success', 'Expense note saved');

    }

    private function parseSupplements($request)
    {
        $supplements = [];

        foreach($request->get('name') as $id => $supplement_name) {
            $supplements[$id]['name'] = $supplement_name;
        }

        foreach($request->get('amount') as $id => $supplement_amount) {
            $supplements[$id]['amount'] = $supplement_amount;
        }

        foreach($request->get('commissionable') as $id => $commissionable) {
            $supplements[$id]['commissionable'] = '1';
        }

        foreach($supplements as $id => $supplement) {
            // check if we got the checkbox for commissionable, if not, set its value to 0
            if( ! array_key_exists('commissionable', $supplement) ) $supplements[$id]['commissionable'] = '0';
        }

        return $supplements;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $supplements = array_column($expense->supplements()->get()->toArray(), 'id');
        ExpenseSupplement::destroy($supplements);
        Expense::destroy($expense->id);
    }
}
