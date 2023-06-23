<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function deleteExpense(Expenses $expenses) {
        $expenses->delete();
        return redirect('/');
    }

    public function updateExpense(Expenses $expenses, Request $request) {
        $incomingFields = $request->validate([
            'title'=>'required',
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);

        $expenses->update($incomingFields);
        return redirect('/');
    }

    public function editExpense(Expenses $expenses) {
        return view('edit-expense', ['expenses' => $expenses]);
    }

   public function createExpense(Request $request) {
        $incomingFields = $request->validate([
            'title'=>'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['user_id'] = auth()->id();
        Expenses::create($incomingFields);
        return redirect('/');
   }
}
