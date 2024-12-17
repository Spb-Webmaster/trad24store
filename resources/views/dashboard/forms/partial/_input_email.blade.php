<div class="c__flex_100">
    <div class="text_input">
        <x-forms.text-input_fromLabel
            type="text"
            id="registerEmail"
            name="email"
            placeholder="Email*"
            value="{{ (old('email'))?:((isset($user->email))?$user->email:'')  }}"
            class="input fio"
            required="true"
            :isError="$errors->has('email')"
        />
        <x-forms.error class="error_email"/>
    </div>
</div>
