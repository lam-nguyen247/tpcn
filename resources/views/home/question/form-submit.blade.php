<div class="row">
    <form id="form_faq" method="post" action="{{ route('home.new-question') }}" class="col-xs-12 col-sm-8">
        @csrf
        <div class="text-danger"></div>
        <div class="row">
            <div class="col-sm-6">
                <input type="text" name="txtname" class="txt_name" placeholder="Nhập họ tên" value="">
            </div>
            <div class="col-sm-6">
                <input type="text" name="txtmail" class="txt_mail" placeholder="Nhập mail" value="">
            </div>
            <div class="col-sm-12">
                <textarea class="faq_content" name="news_description" placeholder="Viết câu hỏi" id="input-description"></textarea>
            </div>
            <div class="text-right">
                <input id="faq_send" class="faq_send" type="submit" data-loading-text="Đang xử lý ..." value="GỬI">
            </div>
        </div>
    </form>
</div>
