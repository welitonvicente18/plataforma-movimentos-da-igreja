<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Imports\MembersImport;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Members::query();

        if (isset($request->search) && $request->search == '1') {
            $this->filterMembers($request, $query);
        }

        $members = $query->orderBy('name')->paginate(20)->appends($request->all());;

        return view('members.index', ['members' => $members]);
    }

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$events = Event::query()->events()->get();

		$teams = EventTeam::query()->team()->get();

		return view('members.create', ['events' => $events, "teams" => $teams->all()]);
	}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        $member = new Members();
        $this->setDataMember($member, $request);
        if (!empty($request->photo)) {
            $filename = 'photo_' . date('YmdHis') . '.' . $request->file('photo')->getClientOriginalExtension();
            $member->photo = $request->file('photo')->storeAs('members/photo/' . $member->id, $filename);
        }

        $member->save();

        return redirect()->route('members.index')->with('success', 'Integrante cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Members::find($id);

        $events = Event::query()->events()->get();

        $teams = EventTeam::query()->team()->get();

        return view('members.create', ['member' => $member, 'events' => $events, "teams" => $teams->all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, string $id)
    {
        $member = Members::findOrFail($id);

        $this->setDataMember($member, $request);

        if (!empty($request->photo)) {
            $filename = 'photo_' . date('YmdHis') . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('members/photo/' . $member->id, $filename);
            $member->photo = $member->id . '/' . $filename;
        }
        $member->save();

        return redirect()->route('members.index')->with('success', 'Integrante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Members::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Integrante excluído com sucesso!');
    }

    /**
     * Report de members
     */
    public function report(Request $request)
    {
        $query = Members::query();

        $teams = [];
        $events = [];
        $members = [];
        if (isset($request->search) && $request->search) {

            $teams = EventTeam::query()->team()->get();

            $this->filterMembers($request, $query);

            $members = $query->orderBy('name')->get();

            $events = Event::query()->events()->get();
            $teams = EventTeam::query()->team()->get();

        }

        return view('members.report', ['members' => $members,'events' => $events, 'teams' => $teams]);
    }

    public function import(Request $request)
    {
        Excel::import(new MembersImport, $request->file('arquivo'));
        dd('');
    }

    /**
     * @param Members $member
     * @param MemberRequest $request
     * @return void
     */
    public function setDataMember(Members $member, MemberRequest $request): void
    {
        $member->entidade_id = Auth::user()->entidade_id;
        $member->user_id = Auth::user()->id;
        $member->name = $request->input('name');
        $member->surname = $request->input('surname');
        $member->spouse = $request->input('spouse');
        $member->type = $request->input('type');
        $member->status = $request->input('status');
        $member->event = $request->input('event');
        $member->circle = $request->input('circle');
        $member->sex = $request->input('sex');
        $member->telephone = $request->input('telephone');
        $member->birth_date = $request->input('birth_date');
        $member->uf = $request->input('uf');
        $member->city = $request->input('city');
        $member->address = $request->input('address');
        $member->team = json_encode($request->input('team'));
        $member->observation = $request->input('observation');
    }

    /**
     * @param Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function filterMembers(Request $request, \Illuminate\Database\Eloquent\Builder $query)
    {
        $request->name ? $query->where('name', 'like', '%' . $request->name . '%') : '';
        $request->telephone ? $query->Where('telephone', 'like', '%' . $request->telephone . '%') : '';
        $request->type ? $query->Where('type', 'like', '%' . $request->type . '%') : '';
        $request->status ? $query->Where('status', 'like', '%' . $request->status . '%') : '';
    }

}
