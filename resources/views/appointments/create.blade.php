{{-- resources/views/appointments/create.blade.php --}}
<x-layouts.app>

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">
            {{ __('Asignar una Cita') }}
        </flux:heading>

        <flux:subheading size="lg" class="mb-6">
            {{ __('Crea tus citas rápidamente aquí') }}
        </flux:subheading>

        <flux:separator variant="subtle" />
    </div>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">



                    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Cliente --}}
                        <flux:field>
                            <flux:label>Cliente</flux:label>
                            <select id="user_id" name="user_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                           focus:border-indigo-500 focus:ring-indigo-500 text-sm p-3">
                                <option value="">Selecciona un cliente</option>
                                @foreach ($users as $user)
                                    <option
                                        value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </flux:field>

                        {{-- Fecha y hora --}}
                        <flux:field>
                            <flux:label>Horario de atencion</flux:label>
                            <flux:description>
                                Elija la fecha y hora para la cita.
                            </flux:description>

                            <flux:input
                                type="date"
                                name="scheduled_at"
                            />
                        </flux:field>

                        {{-- Estado --}}
                        <flux:field>
                            <flux:label>Estado</flux:label>
                            <flux:description>
                                Estado inicial de la cita
                            </flux:description>
                            <select id="status" name="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                           focus:border-indigo-500 focus:ring-indigo-500 text-sm p-3">
                                <option value="disponible">Disponible</option>
                                <option value="atendida">Atendida</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </flux:field>

                        {{-- Notes (multiline) --}}
                        <flux:field>
                            <flux:label>Notes</flux:label>
                            <flux:description>
                            Información adicional o comentarios sobre esta cita.
                            </flux:description>

                            <flux:input
                                type="text"
                                name="notes"
                            >
                            </flux:input>
                        </flux:field>

                        {{-- Botones --}}
                        <div class="flex justify-end gap-3">
                            <flux:button tag="a"
                                href="{{ route('appointments.index') }}"
                                variant="outline"
                            >
                                Cancel
                            </flux:button>

                            <flux:button type="submit" variant="primary">
                                Save
                            </flux:button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-layouts.app>
