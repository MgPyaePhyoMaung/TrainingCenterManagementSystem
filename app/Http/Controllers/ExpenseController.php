<?php

namespace App\Http\Controllers;
use App\Expense;
use App\Category;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expense::all();
        return view('expenses.show_expenses',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
       return view('expenses.create_expenses',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
      
           
            
            'category_name' => 'required',
            'expense_amount' => 'required',
            'expense_date' => 'required',
         ]);
              Expense::create([
                'category_id'=>$request->category_name,
                'amount'=>$request->expense_amount,
                'date'=>$request->expense_date,
                
              ]);
          return redirect('/expenses/create')->with('status','Hey.....Successful Insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $expense=Expense::find($id);
        return view('expenses.edit_expenses',compact('expense','categories'));
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
        $expense=Expense::find($id);
        $expense->category_id=$request->category_name;
        $expense->amount=$request->expense_amount;
        $expense->date=$request->expense_date;
        $expense->save();
        return redirect('/expenses/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::destroy($id);
        return redirect('/expenses');
    }
}
