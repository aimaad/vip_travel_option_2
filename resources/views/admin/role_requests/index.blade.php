@extends("Layout::admin.app")

@section('content')
    <h2 class="title-bar" style="padding-bottom: 100px !important;">{{ $page_title ?? __("Role Upgrade Requests") }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="custom-table-container" style="background-color: white !important ; padding-top: 20px 10px 10px 20px !important;">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __("Name") }}</th>
                    <th>{{ __("Email") }}</th>
                    <th>{{ __("Requested Role") }}</th>
                    <th>{{ __("Agency Name") }}</th>
                    <th>{{ __("IATA/Office ID") }}</th>
                    <th>{{ __("Date Request") }}</th>
                    <th>{{ __("Status") }}</th>
                    <th>{{ __("Actions") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roleRequests as $index => $request)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->user->email }}</td>
                        <td>{{ $request->type }}</td>
                        <td>{{ $request->agency_name }}</td>
                        <td>{{ $request->iata_office_id }}</td>
                        <td>{{ $request->created_at->format('m/d/Y') }}</td>
                        <td>
                            @if($request->status == 'pending')
                                <span class="badge badge-warning">{{ __("Pending") }}</span>
                            @elseif($request->status == 'approved')
                                <span class="badge badge-success">{{ __("Approved") }}</span>
                            @elseif($request->status == 'declined')
                                <span class="badge badge-danger">{{ __("Declined") }}</span>
                            @endif
                        </td>
                        <td>
                            @if($request->status == 'pending')
                                <a href="{{ route('user.admin.roleUpgradeApprove', $request->id) }}" class="btn btn-success">{{ __("Approve") }}</a>
                                <a href="{{ route('user.admin.roleUpgradeDecline', $request->id) }}" class="btn btn-danger">{{ __("Decline") }}</a>
                            @else
                                <span>{{ __("No actions available") }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


