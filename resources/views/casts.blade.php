<html>
    <body>
        <div class="container">    
            @if(session()->has('success'))

                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>

            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))

                            <a href="{{ route('casts.index') }}" class="btn btn-info btn-sm">View All Casts</a>

                            <a href="{{ route('casts.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>

                            @else

                            <a href="{{ route('casts.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary btn-sm">View Deleted Casts</a>

                            @endif
                            
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($casts) > 0)
                                @foreach($casts as $row)

                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                        @if(request()->has('view_deleted'))

                                            <a href="{{ route('casts.restore', $row->id) }}" class="btn btn-success btn-sm">Restore</a>
                                        @else
                                            <form method="post" action="{{ route('casts.delete', $row->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Casts Found</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
