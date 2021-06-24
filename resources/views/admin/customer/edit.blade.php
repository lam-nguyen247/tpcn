<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">@lang('Changing customer information')</h4>
                <form method="POST" action="{{route('customer.update', $customer->id)}}" class="floating-labels mt-4">
                    @csrf
                    @method('PUT')
                    <x-input name="first_name" value="{{$customer->first_name}}" label="Tên" />
                    <x-input name="last_name" value="{{$customer->last_name}}" label="Tên Lót" />
                    <x-input name="phone" value="{{$customer->phone}}" label="Phone number" />
                    <x-input name="email" value="{{$customer->email}}" type="email" label="E-Mail Address" />
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
