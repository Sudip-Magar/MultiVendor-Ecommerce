<div class="min-h-screen bg-gray-100 p-6">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Contact Messages</h2>

        <!-- Table container -->
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            user</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subject
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Row -->
                    @foreach ($messages as $idx => $message)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $idx + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                @if ($message->user_id)
                                    Logged in user
                                @else
                                    Guest User
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $message->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $message->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $message->subject }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($message->message, 20, '...') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $message->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold">
                                @if (!$message->is_read)
                                    <span class="text-red-600">New</span>
                                @else
                                    <span class="text-green-600">Read</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white "><a href="{{ route('admin.message-datail',['id' => $message->id]) }}" class="bg-emerald-400 hover:bg-emerald-500 py-1.5 px-3 rounded-lg cursor-pointer">Veiw Message </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination (static example) -->
        <div class="mt-4 flex justify-end space-x-2">
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">1</button>
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">2</button>
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">3</button>
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Next</button>
        </div>
    </div>
</div>
