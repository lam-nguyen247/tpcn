<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">@lang('Changing customer information')</h4>
                <form method="POST" action="{{route('customer.update', $customer->id)}}" class="floating-labels mt-4">
                    @csrf
                    @method('PUT')
                    <x-input name="domain" value="{{$customer->domain}}" label="Domain" />
                    <x-input name="theme" value="{{$customer->theme}}" label="Theme" />
                    <x-input name="language" value="{{$customer->language}}" label="Language" />
                    <x-input name="company" value="{{$customer->company}}" label="Company" />
                    <x-input name="name" value="{{$customer->name}}" label="Name" />
                    <x-input name="phone" value="{{$customer->phone}}" label="Phone number" />
                    <x-input name="email" value="{{$customer->email}}" type="email" label="E-Mail Address" />
                    <x-input name="address" value="{{$customer->address}}" label="Address" />
                    <x-input name="content" value="{{$customer->content}}" label="Content" />
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">@lang('Save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
