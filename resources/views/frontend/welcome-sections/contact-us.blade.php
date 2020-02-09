<div class="section landing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center">Keep in touch?</h2>
                <form class="contact-form" action="{{route('store.message')}}" method="post">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                                </div>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                                </div>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" rows="4" name="message"
                              placeholder="Tell us your thoughts and feelings..."></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <button type="submit" class="btn btn-danger btn-lg btn-fill">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
