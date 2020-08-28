@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="#">Blog</a>
            <span class="breadcrumb-item active">Blog Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h5>Post List <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-warning pull-right" >Add New Post</a></h5>
                <div class="table-wrapper">
                    <table id="post_table" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Title English</th>
                            <th class="wd-15p">Title Hindi</th>
                            <th class="wd-15p">Category English</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ Str::limit($post->post_title_en, 40) }}</td>
                                <td>{{ Str::limit($post->post_title_in, 40) }}</td>
                                <td>{{ $post->category ? $post->category->category_name_en : 'Uncategorized' }}</td>
                                <td><img src="{{ asset($post->post_image) }}" height="50" alt=""></td>
                                <td>
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.post.destroy', $post->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->


@endsection
