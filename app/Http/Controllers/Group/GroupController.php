<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('group.index', compact('groups'));
    }

    public function show(Group $group)
    {
        return view('group.show', compact('group'));
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Group::firstOrCreate($data);
        return redirect()->route('group.index')->with('success', 'Group created successfully');
    }

    public function edit(Group $group)
    {
        return view('group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);
        return view('group.show', compact('group'));
    }

    public function delete(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index');
    }
}
