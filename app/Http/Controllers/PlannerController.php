<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Earning;
use App\Models\User;

class PlannerController extends Controller
{
    public function planner() {
        $expenses = Expense::where('user_id', auth()->id())->get();
        $earnings = Earning::where('user_id', auth()->id())->get();
        return view('app.planner', compact('expenses', 'earnings'));
    }

    public function expenseStore(Request $request) {
        $data = request()->validate([
            'category' => 'required',
            'planned_amount' => 'required|numeric',
        ]);


        $user = auth()->user();

        $user->expenses()->create($data);

        return redirect()->back();
    }

    public function earningStore(Request $request) {
        $data = request()->validate([
            'category' => 'required',
            'planned_amount' => 'required|numeric',
        ]);

        $user = auth()->user();

        $user->earnings()->create($data);

        return redirect()->back();
    }
}
