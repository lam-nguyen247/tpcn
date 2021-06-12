@component('mail::message')

@component('mail::table')
|                                                    |                         |
| -------------------------------------------------- |-------------------------|
@isset($customer->domain)|   @lang('Domain')         | {{$customer->domain}}   |
@endisset
@isset($customer->theme)|    @lang('Theme')          | {{$customer->theme}}    |
@endisset
@isset($customer->language)| @lang('Language')       | {{$customer->language}} |
@endisset
@isset($customer->company)|  @lang('Company')        | {{$customer->company}}  |
@endisset
@isset($customer->name)|     @lang('Name')           | {{$customer->name}}     |
@endisset
@isset($customer->phone)|    @lang('Phone number')   | {{$customer->phone}}    |
@endisset
@isset($customer->email)|    @lang('E-Mail Address') | {{$customer->email}}    |
@endisset
@isset($customer->address)|  @lang('Address')        | {{$customer->address}}  |
@endisset
@isset($customer->content)|  @lang('Content')        | {{$customer->content}}  |
@endisset
@endcomponent

@endcomponent
