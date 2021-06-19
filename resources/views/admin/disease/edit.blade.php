<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('diseases.update', $disease->id)}}" class="floating-labels mt-4">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-5">
                        <select class="form-control p-0" name="display_home" id="display_home" required>
                            <option value="1" @if(1 == $disease->display_home) selected @endif>Hiển thị</option>
                            <option value="0" @if(0 == $disease->display_home) selected @endif>Không hiển thị</option>
                        </select>
                        <span class="bar"></span>
                        <label for="category">Hiển Thị Trên Trang Chủ</label>
                    </div>
                    <div class="form-group mb-5 focused @error('name') has-error @enderror">
                        <input type="hidden" name='id' value="{{old('id') ?? $disease->id}}">
                        <input id="name" type="text" name="name" value="{{old('name') ?? $disease->name}}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        <span class="bar"></span>
                        <label for="name">Tên Loại Bệnh</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
