<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;

class SearchBuku extends Component
{
    public $search;
    public $sortOrder;
    public $bukus;

    protected $listeners = ['searchBuku' => 'searchBuku'];

    public function mount(){
        $this->search = '';
        $this->sortOrder = 'asc';
        $this->bukus = Buku::orderBy('judul', $this->sortOrder)->get();
    }

    // public function updated($propertyName)
    // {
    //     $this->filterBuku();
    // }

    public function searchBuku(){
        $this->filterBuku();
    }

    public function filterBuku(){
        // dd($this->sortOrder);
        $query = Buku::query()
            ->when($this->search, function($query){
                $query->where('judul', 'like', '%'.$this->search.'%')->orWhere('penulis', 'like', '%'.$this->search.'%');
            })
            ->orderBy('judul', $this->sortOrder);

        $this->bukus = $query->get();
    }

    public function render()
    {
        return view('livewire.search-buku');
    }
}
