@extends('admin.main')
@section('content')
 <div class="p-1 bg-slate-900 rounded-2xl shadow-xl border border-slate-800 ">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold uppercase tracking-wider text-gray-400">Customer Bookings</h2>
    </div>
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-white">{{$error}}</p>
            @endforeach
        @endif
        @if (session('info'))
            <p class="text-white">{{session('info')}}</p>
        @endif
    <div class="w-full overflow-x-auto rounded-xl border border-slate-700">
        <table class="w-full text-sm text-left text-gray-300 ">
            <thead class="text-xs uppercase bg-slate-800 border-b border-slate-700">
                <tr>
                    <th class="px-4 py-4 font-semibold">Room Id</th>
                    <th class="px-4 py-4 font-semibold">Name</th>
                    <th class="px-4 py-4 font-semibold">Email</th>
                    <th class="px-4 py-4 font-semibold">Phone</th>
                    <th class="px-9 py-4 font-semibold">Check In</th>
                    <th class="px-9 py-4 font-semibold">Check Out</th>
                    <th class="px- py-4 font-semibold text-center">Status</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-slate-800 bg-slate-900/50">
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-slate-800/60 transition-colors duration-150">
                        <td class="px-4 py-4 font-medium text-white">{{ $booking->id }}</td>
                        <td class="px-4 py-4 font-semibold text-amber-100">{{ $booking->name }}</td>
                        <td class="px-4 py-4 text-gray-400">{{ $booking->email }}</td>
                        <td class="px-4 py-4">{{ $booking->phone }}</td>
                        <td class="px-4 py-4 text-emerald-400 font-medium">{{ $booking->check_in }}</td>
                        <td class="px-4 py-4 text-red-400 font-medium">{{ $booking->check_out }}</td>
                        {{-- <td class="px-4 py-4 text-center">
                            @if ($booking->status == 'confirmed')
                              <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                            </span>
                            @elseif ($booking->status == 'pending')
                               <span class="px-3 py-1 bg-emerald-500/10 text-yellow-400 border border-emerald-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                               </span>
                            @else
                            <span class="px-3 py-1 bg-emerald-500/10 text-red-400 border border-emerald-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                            </span>
                            @endif
                        </td> --}}
                        <td class="px-6 py-4 text-center align-middle">
                            <div class="flex items-center justify-center w-full">
                                
                                <div x-data="{ open: false }" @click.away="open = false" class="relative inline-block text-left">
                                    
                                    <button @click="open = !open" class="w-32 px-3 py-2 inline-flex items-center justify-between rounded-lg bg-slate-800 text-gray-300 text-xs font-medium border border-slate-700 hover:bg-slate-700/80 active:scale-95 transition duration-150">
                                        <span>
                                             @if ($booking->status == 'confirmed')
                                            <span class="text-emerald-400  font-semibold">
                                                {{ $booking->status }}
                                            </span>
                                            @elseif ($booking->status == 'pending')
                                            <span class="text-yellow-400  text-xs rounded-full font-semibold">
                                                {{ $booking->status }}
                                            </span>
                                            @else
                                            <span class=" text-red-400  text-xs rounded-full font-semibold">
                                                {{ $booking->status }}
                                            </span>
                                            @endif
                                        </span>
                                        <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <div x-show="open"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute right-0 z-50 mt-2 w-40 origin-top-right rounded-lg bg-slate-800 shadow-2xl border border-slate-700 py-1" 
                                        style="display: none;"
                                    >
                                        <form action="{{route('update_booking',$booking->id)}}" method="POST">
                                            @csrf
                                            
                                            <div class="flex flex-col">
                                                <button type="submit" name="status" value="pending" class="text-left px-4 py-2 text-xs font-medium text-yellow-400 hover:bg-slate-700/50 transition duration-150">Pending</button>
                                                <button type="submit" name="status" value="confirmed" class="text-left px-4 py-2 text-xs font-medium text-emerald-400 hover:bg-slate-700/50 transition duration-150">Confirmed</button>
                                                <button type="submit" name="status" value="canceled" class="text-left px-4 py-2 text-xs font-medium text-red-400 hover:bg-slate-700/50 transition duration-150">Canceled</button>
                                                <button type="submit" name="status" value="delete" class="text-left px-4 py-2 text-xs font-medium text-red-400 hover:bg-slate-700/50 transition duration-150">Delete</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection