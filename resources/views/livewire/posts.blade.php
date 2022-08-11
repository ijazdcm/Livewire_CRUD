<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if ($editMode)
        @include('livewire.edit')
    @else
        @include('livewire.create')
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th width="150px">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">edit</button>
                        <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
