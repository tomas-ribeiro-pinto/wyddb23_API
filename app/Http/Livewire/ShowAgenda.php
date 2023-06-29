<?php

namespace App\Http\Livewire;

use App\Models\ActionTeam;
use App\Models\EntryDay;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAgenda extends Component
{
    use WithPagination;

    public $search = '';
    public $tag;
    public $sortField = 'action_id';
    public $sortDirection = 'asc';
    public $filterAccreditation = 'asc';
    public $filterTag = 'asc';

    public $selectAll = false;
    public $selectPage = false;
    public $selected = [];

    public function render()
    {
        if($this->selectAll)
        {
            $this->selected = $this->entries->pluck('id')->map(fn($id) => (string) $id);
        }

        $team = Auth::user()->currentTeam;

        return view('livewire.show-agenda', [
            'entryDays' => $this->entries
        ]);
    }

    public function sortBy($field)
    {
        $this->sortField === $field
            ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : $this->sortDirection = 'asc';

        $this->sortField = $field;
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function updatedSelected($value)
    {
        $this->selectedAll = false;
    }

    public function updatedSelectPage($value)
    {
        $this->selected = $value
            ? $this->entries->pluck('id')->map(fn($id) => (string) $id)
            : [];
    }

    public function getEntriesProperty()
    {
        return EntryDay::paginate(5);
    }
}
