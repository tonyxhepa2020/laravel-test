<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagsIndex extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $sortField = 'tag_name';
    public $sortAsc = true;
    public $search = '';
    public $category;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function delete($id)
    {
        $cat = Tag::findOrFail($id);
        $cat->delete();

        return view('livewire.tags-index', [
            'tags' => Tag::where('tag_name', 'like', '%'.$this->search.'%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }

    public function render()
    {
        return view('livewire.tags-index', [
            'tags' => Tag::where('tag_name', 'like', '%'.$this->search.'%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
