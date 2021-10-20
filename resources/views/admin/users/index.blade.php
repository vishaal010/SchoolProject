@extends('layout.app')

@section('content')


    <div>
        <a href="{{route('admin.users.create')}}"> <button class="py-2 px-3 text-white rounded-lg bg-green-400 shadow-lg block md:inline-block">Maak een gebruiker</button></a>
   </div>

    <div class="mt-8">
    </div>



    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="relative px-9 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative px-9 py-5">
                                <span class="sr-only">Delete</span>
                            </th>
                            <th scope="col" class="relative px-9 py-5">
                                <span class="sr-only">Collectie</span>
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)

                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        {{ $user->id }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    @if($user->status == 1)
                        <a href="{{ route('user.status.update', [$user->id , 'status_code' => 0]) }}"> Active </a>
                    @else
                        <a href="{{ route('user.status.update', [$user->id , 'status_code' => 1]) }}"> Not Active</a>

                    @endif
                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{  $users->first()->roles->first()->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <button type="button" onclick="event.preventDefault();
                                        document.getElementById('delete-user-form-{{$user->id}}').submit()">
                                      <a href="{{ route('admin.users.destroy', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Delete</a> </button>
                                    <form id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}" method="POST" style="display: none">
                                    @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Collectie</a>
                                </td>
                        </tr>

                        @endforeach

                        <!-- More people... -->
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
