<section class="secao-padding" id="secao_erro">
    @if ($message = Session::get('success') || $message = Session::get('alert') || $message = Session::get('error') || $message = Session::get('status') || count($errors) > 0)
    <div class="row mt-3">
        <div class="col-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('alert'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>
    </div>
    @endif
</section>