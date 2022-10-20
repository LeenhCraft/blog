<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NAME</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->idpost }}</td>
                            <td>{{ $post->pos_name }}</td>
                            <td width=10px>
                                <a href="{{ route('admin.posts.edit', $post->idpost) }}"
                                    class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width=10px>
                                <form action="{{ route('admin.posts.destroy', $post->idpost) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
