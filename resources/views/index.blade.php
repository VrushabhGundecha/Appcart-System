@extends('app')

@section('content')
    <div>
        <h1>Users List</h1>

        <!-- Search Form -->
        <form action="{{ route('users.index') }}" method="GET">
            <input type="text" name="search" id="search" placeholder="Search by name, email, etc." value="{{ request()->get('search') }}">
            <button type="submit" id="searchButton">Search</button>
        </form>

        <!-- Users Table -->
        <table>
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Salary</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
                @php $srNo = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $srNo++ }}</td>                            
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->salary }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   

        <!-- Pagination Links -->
        {{ $users->links() }}
    </div>
@endsection
