<form action="{{ route('frontend.emp_registration_form_process') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">

        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" class="form-control" name="f_name" value="" id="f_name" placeholder="First Name *"
                     data-validation-required-message="Please enter your name" />
                    @error('f_name')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" class="form-control" name="l_name"  value="" id="" placeholder="Last Name"
                     data-validation-required-message="Please enter your name" />
                    @error('l_name')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="email" class="form-control" name="email" id="" value=""
                    placeholder="Email Address" 
                    data-validation-required-message="Please enter your email" />
                    @error('email')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="tel" name="mobile" class="form-control" id="mobile" value=""
                    placeholder="Phone Number" 
                    data-validation-required-message="Please enter your mobile" />
                    @error('mobile')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" name="p_address" class="form-control" id="p_address" value="" placeholder="Address"
                     data-validation-required-message="Please enter your email" />
                    @error('p_address')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" name="p_city" class="form-control" id="p_city" value="" placeholder="SUBURB / CITY"
                     data-validation-required-message="Please enter your city" />
                    @error('p_city')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" name="pincode" class="form-control" id="p_pincode" value="" placeholder="Post Code"
                     data-validation-required-message="Please enter your post code" />
                    @error('p_pincode')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="control-group form-group">
                <input type="text" name="state" class="form-control" id="p_state" value="" placeholder="State"
                     data-validation-required-message="Please enter your state" />
                    @error('p_state')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="control-group form-group">
                <textarea name="additional_information" cols="40" rows="10" class="form-control"
                    aria-required="true"  value="" aria-invalid="false" placeholder="ADDITIONAL INFORMATION*"></textarea>
                    @error('additional_information')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-12">
            <b>WHICH TYPE OF LICENCE YOU HAVE</b><br>
            <span class="wpcf7-form-control-wrap job-position">
                <span class="wpcf7-form-control wpcf7-checkbox" style="display: grid;">
                    <span class="wpcf7-list-item first"><label>
                        <input type="radio" name="licence_type"
                                value="Security Officer">
                                <span class="wpcf7-list-item-label">Security
                                Officer</span></label></span>
                    <span class="wpcf7-list-item"><label>
                        <input type="radio" name="licence_type"
                                value="Corporate Security">
                                <span class="wpcf7-list-item-label">Corporate
                                Security</span>
                            </label></span>
                    <span class="wpcf7-list-item"><label>
                        <input type="radio" name="licence_type"
                                value="Concierge"><span
                                class="wpcf7-list-item-label">Concierge</span></label></span>
                    <span class="wpcf7-list-item"><label><input type="radio" name="licence_type"
                                value="Risk-safety consultant">
                                <span class="wpcf7-list-item-label">Risk/safety
                                consultant</span></label></span>
                    <span class="wpcf7-list-item"><label>
                        <input type="radio" name="licence_type"
                                value="Event Personnel"><span class="wpcf7-list-item-label">Event
                                Personnel</span></label></span>
                    <span class="wpcf7-list-item"><label>
                        <input type="radio" name="licence_type"
                                value="Training"><span
                                class="wpcf7-list-item-label">Training</span></label></span>
                    <span class="wpcf7-list-item last"><label>
                        <input type="radio" name="licence_type"
                                value="Other"><span
                                class="wpcf7-list-item-label">Other</span></label></span></span></span>
        </div>


        <div class="col-12">
         <label>Upload Resume </label><br>
            <span class="wpcf7-form-control-wrap upload-file">
                <input type="file" name="resume" size="40" class="wpcf7-form-control wpcf7-file"
                        accept=".jpg,.jpeg,.pdf,.doc,.docx"
                        aria-invalid="false">
                        @error('resume')
                        <span class="text-success" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    </span>
        </div>

    </div>
    <p>
        @if(session('message')!==null)
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
    </p>
    <div>
        <button class="btn btn-primary" type="submit" id="sendMessageButton">Apply</button>
    </div>
</form>