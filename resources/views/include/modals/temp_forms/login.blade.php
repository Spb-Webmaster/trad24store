    <div class="F_form F_form_474  F_form_login" style="display: none" id="modal_login" data-token="{{ csrf_token() }}">
        @honeypot
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class="F_form__body new__temp">
            <div class="new__temp_top"> </div><!--.new__temp_top-->


            <div class="new__temp_middle">
             <div class="alax_inputs">

                                 @include('pages.leader.order.partial.login')

           </div><!--.alax_inputs-->

            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

