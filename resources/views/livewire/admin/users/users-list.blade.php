<div>
    <div class="card">
        <div class="card-body">
            <style>
                .form-group {
                    margin-bottom: 7px;
                }
            </style>
            <div class="container-fluid">
                <h6 class="card-title">ایجاد کاربر</h6>

                <a class="btn btn-info" wire:click="$refresh">بروزرسانی</a>

                <form method="POST" wire:submit="update">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                @if ($message = session()->get('success'))
                                    <div class="alert alert-success">
                                        <span>{{ $message }}</span>
                                    </div>
                                @endif
                                @if ($message = session()->get('error'))
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">نام و نام خانوادگی</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-left" dir="rtl" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ایمیل</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-left" dir="rtl" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">موبایل</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-left" dir="rtl" wire:model="mobile">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">پسورد</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-left" dir="rtl" wire:model="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="file"> آپلود عکس </label>
                                <input class="col-sm-6" type="file" class="form-control-file" wire:model="img" id="file">
                                @error('img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                @if ($img)
                                    <div class="col-md-2">
                                        <img style="float: left;width:60px;max-height:60px;" src="{{ $img->temporaryUrl() }}" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""></label>
                                <div class="col-sm-8">
                                    @if ($editUser == null)
                                        <button type="submit" class="btn btn-success  btn-uppercase" wire:loading.remove>
                                            <i class="ti-check-box m-r-5"></i>ایجاد
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-success  btn-uppercase" wire:click="saveEdit({{ $editUser }})" wire:loading.remove>
                                            <i class="ti-check-box m-r-5"></i>ویرایش
                                        </button>
                                    @endif


                                    <div wire:loading>loading...</div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <br>
            <hr>
            <br>
            <div class="table overflow-auto" tabindex="8">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model.live="search">
                        </div>
                        <a class="btn btn-info col-sm-1 text-center " wire:click="$set('search','mani')"> mani ها </a>


                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        @if ($message = session()->get('deleted'))
                            <div class="col-md-12 text-center alert alert-warning">
                                <span>{{ $message }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary" wire:click="$toggle('sortId')">
                                @if ($sortId)
                                    <i class="fa fa-arrow-down"></i>
                                @else
                                    <i class="fa fa-arrow-up"></i>
                                @endif

                                ردیف
                            </th>
                            <th class="text-center align-middle text-primary">عکس</th>
                            <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                            <th class="text-center align-middle text-primary">ایمیل</th>
                            <th class="text-center align-middle text-primary">موبایل</th>
                            <th class="text-center align-middle text-primary"> وضعیت</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">ویرایش خطی</th>
                            <th class="text-center align-middle text-primary">حذف</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody wire:poll.10s>
                        @foreach ($users as $key => $user)
                            <tr>

                                <td class="text-center align-middle">{{ $users->firstItem() + $key }}</td>
                                <td class="text-center align-middle">
                                    <figure class="avatar avatar">
                                        <img src="{{ asset('userImages/' . $user->img) }}" class="rounded-circle" alt="image">
                                    </figure>
                                </td>
                                @if ($editInLine == $user->id)
                                    <td class="text-center align-middle"><input type="text" class="form-control text-left" dir="rtl" wire:model="name"></td>
                                    <td class="text-center align-middle"><input type="text" class="form-control text-left" dir="rtl" wire:model="email"></td>
                                    <td class="text-center align-middle"><input type="text" class="form-control text-left" dir="rtl" wire:model="mobile"></td>
                                @else
                                    <td class="text-center align-middle">{{ $user->name }}</td>
                                    <td class="text-center align-middle">{{ $user->email }}</td>
                                    <td class="text-center align-middle">{{ $user->mobile }}</td>
                                @endif

                                <td class="text-center align-middle">
                                    <span class="cursor-pointer badge badge-success">{{ $user->status == 'active' ? 'فعال' : 'غیر فعال' }}</span>
                                </td>
                                <td class="text-center align-middle">
                                    @if ($editUser !== $user->id)
                                        <a class="btn btn-outline-info" href="#" wire:click="edit({{ $user->id }})">
                                            ویرایش
                                        </a>
                                    @endif
                                </td>

                                <td class="text-center align-middle">
                                    @if ($editInLine == $user->id)
                                        <a class="btn btn-outline-success" wire:click="updateRow({{ $user->id }})">
                                            ثبت
                                        </a>
                                    @else
                                        <a class="btn btn-outline-info" wire:click="editRow({{ $user->id }})">
                                            ویرایش
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn  btn-danger" wire:click="delete({{ $user->id }})">
                                        1 حذف
                                    </a>
                                    {{-- <a class="btn  btn-danger" wire:click="deleteAlert({{ $user->id }})"> --}}
                                    <a class="btn  btn-danger" wire:click="$dispatch('deleteRow', { id: {{ $user->id }} })">
                                        2 حذف
                                    </a>

                                </td>

                                <td class="text-center align-middle">{{ $user->created_at }}</td>
                            </tr>
                        @endforeach

                        {{ $users->links() }}

                </table>
                <div style="margin: 40px !important;" class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteRow', (data) => {
            Swal.fire({
                title: "حذف شود؟",
                text: "این حدف قابل یازیابی نیست!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: "خیر",
                confirmButtonText: "بله!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete', {
                        userId: data.id
                    })
                    Swal.fire({
                        title: "حذف شد!",
                        text: "با موفقیت حذف شد",
                        icon: "success"
                    });
                }
            });

        });
    });
</script>
