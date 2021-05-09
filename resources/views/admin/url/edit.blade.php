@extends('layouts.app')

@section('title', 'Edit Url')

@section('content')
{{ html()->modelForm($url, 'PATCH', route('admin.url.update', $url))->id('edit-url')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Full Url
                        <small class="text-muted">Full Url</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Short Code')
                            ->class('col-md-2 form-control-label')
                            ->for('short_code') }}

                        <div class="col-md-10">
                            {{ html()->text('short_code')
                                ->class('form-control')
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    
                    <div class="form-group row">
                        {{ html()->label('Full Url')
                            ->class('col-md-2 form-control-label')
                            ->for('full_url') }}

                        <div class="col-md-10">
                            <div class="input-group mb-3">
                            {{ html()->text('full_url')
                                ->class('form-control')
                                ->autofocus() }}
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Counter')
                            ->class('col-md-2 form-control-label')
                            ->for('counter') }}

                        <div class="col-md-10">
                            <div class="input-group mb-3">
                            {{ html()->text('counter')
                                ->class('form-control')
                                ->autofocus() }}
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Expiry')
                            ->class('col-md-2 form-control-label')
                            ->for('expiry') }}

                        <div class="col-md-10">
                            <div class="input-group mb-3">
                            {{ html()->text('expiry')
                                ->class('form-control')
                                ->id('picker')
                                ->autofocus() }}
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin.url.index')}}" class="btn btn-secondary">Cancel</a>
                </div><!--col-->

                <div class="col text-right">
                    <button type="sumbit" class="btn btn-primary">Update</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
<script>
    $('#picker').datetimepicker({format: "YYYY-MM-DD HH:mm:ss"});
</script>
@endsection
