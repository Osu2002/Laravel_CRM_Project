<?php


namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function proposal()
    {
        return view('auth.proposal');
    }

    public function store(Request $request)
    {

        $proposal = new Proposal();
        $proposal->customer_id = $request->customer_id;
        $proposal->title = $request->title;
        $proposal->description = $request->description;
        $proposal->status = $request->status;

        $proposal-> save();

        return "success";
    }
}
