@extends('admin.admin-master')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('seo.admin') }}">SEO Setting</a>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">SEO</h6>
                <form action="{{ route('update.seo') }}" method="POST" >
                    @csrf @method('PUT')
                    <input type="hidden" name="id" value="{{ $seo->id }}">
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="meta_title" class="form-control-label">Meta Title:</label>
                                    <input class="form-control" id="meta_title" type="text" name="meta_title" value="{{ $seo->meta_title }}">

                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="meta_author" class="form-control-label">Meta Author:</label>
                                    <input class="form-control" id="meta_author" type="text" name="meta_author" value="{{ $seo->meta_author }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="meta_tag" class="form-control-label">Meta Tag:</label>
                                    <input class="form-control" id="meta_tag" type="text" name="meta_tag" value="{{ $seo->meta_tag }}">
                                </div>
                            </div><!-- col-6 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="meta_description" class="form-control-label">Meta Description:</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description">{{ $seo->meta_description }}</textarea>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="google_analytics" class="form-control-label">Google Analytics:</label>
                                    <textarea class="form-control" id="google_analytics" name="google_analytics">{{ $seo->google_analytics }}</textarea>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bing_analytics" class="form-control-label">Bing Analytics:</label>
                                    <textarea class="form-control" id="bing_analytics" name="bing_analytics">{{ $seo->bing_analytics }}</textarea>
                                </div>
                            </div><!-- col-12 -->

                        </div><!-- row -->
                    </div><!-- form layout -->
                    <div class="form-layout-footer mt-2">
                        <button class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection



