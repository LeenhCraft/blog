<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination; //para paginacion

class PostsIndex extends Component
{
    use withPagination; //clase para paginacion
    protected $paginationTheme = 'bootstrap'; //estilos de paginacion
    public $search; //variable para busqueda

    public function updatingSearch() //metodo que se activa al escribir en el input
    {
        $this->resetPage(); //para que no se quede en la pagina 1
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->where('pos_name', 'LIKE', '%' . $this->search . '%')
            ->latest('idpost')
            ->paginate();
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
