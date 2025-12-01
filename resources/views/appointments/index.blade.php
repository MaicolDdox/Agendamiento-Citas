{{-- resources/views/appointments/index.blade.php --}}
<x-layouts.app>

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Agendamiento Citas') }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ __('Agenda tus citas rapidamente Aqui') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje flash de éxito --}}
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 border border-green-200 px-4 py-2 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('appointments.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent
                          rounded-md font-semibold text-xs text-white uppercase tracking-widest
                          hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500
                          focus:ring-offset-2">
                    + New Appointment
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Client
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Scheduled at
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Notes
                                    </th>
                                    <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                            {{ $appointment->user->name }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                            {{ $appointment->scheduled_at }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm">
                                            {{$appointment->status}}
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-500">
                                            {{ \Illuminate\Support\Str::limit($appointment->notes, 40) }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('appointments.edit', $appointment) }}"
                                               class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                Edit
                                            </a>

                                            <form action="{{ route('appointments.destroy', $appointment) }}"
                                                  method="POST"
                                                  class="inline-block"
                                                  onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500">
                                            No appointments found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
