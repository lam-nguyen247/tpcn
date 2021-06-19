@extends('admin.layouts.app')

@section('title', 'Loại Bệnh')

@section('content')
    @includeWhen(isset($disease), 'admin.disease.edit')
    @includeWhen(!isset($disease), 'admin.disease.create')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('diseases.create') }}"><i class="fas fa-plus-circle"></i> @lang('Add New')</a>
                    <h4 class="card-title">Danh sách loại bệnh</h4>
                    <h6 class="card-subtitle">&nbsp;</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-bcommented display js-datatable w-100">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Trang chủ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($diseases as $key => $disease)
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$disease->name}}</td>
                                    <td>
                                        <label class="text-{{$disease->display_home==1?'success':'info'}}">
                                            {{$disease->display_home==1?'Hiển thị':'Không hiển thị'}}
                                        </label>
                                    </td>
                                    <td>
                                        <form action="{{ route('diseases.destroy', $disease->id) }}" method="POST">
                                            <a href="{{ route('diseases.edit', $disease->id) }}" class="text-inverse pr-2" data-toggle="tooltip" title="@lang('Edit')">
                                                <i class="ti-marker-alt"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-inverse js-delete-sweetalert" data-toggle="tooltip" title="@lang('Delete')">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
