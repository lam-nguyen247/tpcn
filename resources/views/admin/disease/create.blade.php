<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('diseases.store')}}" class="floating-labels mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-5">
                        <select class="form-control p-0" name="display_home" id="display_home" required>
                            <option value="1" @if(1 == old('display_home')) selected @endif>Hiển thị</option>
                            <option value="0" @if(0 == old('display_home')) selected @endif>Không hiển thị</option>
                        </select>
                        <span class="bar"></span>
                        <label for="category">Hiển Thị Trên Trang Chủ</label>
                    </div>
                    <div class="form-group mb-5 focused @error('name') has-error @enderror">
                        <input id="name" type="text" name="name" value="{{old('name')}}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        <span class="bar"></span>
                        <label for="name">Tên Loại Bệnh</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
