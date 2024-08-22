<?php


namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function proposal()
    {
        return view('auth.Proposal.proposal');
    }
    public function proposalindex()
    {
        $proposals = Proposal::all();
        return view('auth.Proposal.proposalindex', compact('proposals'));
    }

    public function store(Request $request)
    {

        $proposal = new Proposal();
        $proposal->customer_id = $request->customer_id;
        $proposal->title = $request->title;
        $proposal->description = $request->description;
        $proposal->status = $request->status;

        $proposal-> save();

        return redirect()->route('proposal.index');
        }

    public function edit($proposal_id)
    {
        $proposal = Proposal::where('id', $proposal_id)->first();
        return view('auth.Proposal.edit', compact('proposal'));
    }
    public function update(Request $request, $proposal_id)
    {
        $proposal = Proposal::where('id', $proposal_id)->first();
        $proposal->customer_id = $request->customer_id;
        $proposal->title = $request->title;
        $proposal->description = $request->description;
        $proposal->status = $request->status;
        $proposal->save();
        return redirect()->route('proposal.index');
    }

    public function delete($proposal_id){
        Proposal::where('id',$proposal_id)->delete();
        return redirect()->route('proposal.index');
    }
}
