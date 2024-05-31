<div>
    <div class="col-md-12  m-10">
        <div class="row">
            <form class="form-control d-flex p-10 m-10 h-100" wire:submit="{{ $isEdit ? 'update(' . $isEdit . ')' : 'addTodo' }}">
                <div class="col-md-1 m-10">
                    <label for="title" class=" m-10">عنوان : </label>
                </div>
                <div class="col-md-9 m-10">
                    <input type="text" class="form-control m-10" id="title" wire:model="title">
                </div>
                <div class="col-md-2 m-10">
                    <button class="btn btn-success form-control m-10">ثبت</button>
                </div>
            </form>
        </div>
    </div>

    <div class="loader" wire:loading></div>
    <div class="alert alert-danger   col-md-12" wire:offline>
        <span class="">اینترنت شما قطع میباشد</span>
    </div>
    <div class="col-md-12">
        <div class="">
            <ul class="d-block w-100">
                @foreach ($toDoList as $key => $toDo)
                    <li class="d-flex form-control m-10 p-10 {{ $toDo->status == 2 ? 'opacity-5' : '' }}" style="height: 50px">
                        <span class="col-md-1">{{ $key + $toDoList->firstItem() }}</span>
                        <span class="col-md-1"><input type="checkbox" class="{{ $toDo->status == 2 ? 'd-none' : '' }}"" wire:click="done({{ $toDo->id }})"></span>
                        <span class="col-md-8">{{ $toDo->title }}</span>
                        <span class="col-md-1"><a class="btn btn-sm btn-info {{ $toDo->status == 2 ? 'd-none' : '' }}" wire:click="edit({{ $toDo->id }})">Edit</a></span>
                        <span class="col-md-1"><a class="btn btn-sm btn-danger {{ $toDo->status == 2 ? 'd-none' : '' }}" wire:click="delete({{ $toDo->id }})">Delete</a></span>
                    </li>
                @endforeach

                <div class="">
                    {{ $toDoList->links() }}
                </div>
            </ul>
        </div>
    </div>
</div>
