 <div class="p-6 bg-slate-900 border-b border-slate-700">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold uppercase tracking-wider text-gray-400">Customer Bookings</h2>
    </div>

    <div class="rounded-xl border border-slate-700 overflow-hidden">
        <table class="w-full text-sm text-left text-gray-300">
            <thead class="text-xs uppercase bg-slate-800 border-b border-slate-700">
                <tr>
                    <th class="px-2 py-4 font-semibold">Room Name</th>
                    <th class="px-2 py-4 font-semibold">Name</th>
                    <th class="px-2 py-4 font-semibold">Email</th>
                    <th class="px-2 py-4 font-semibold">Phone</th>
                    <th class="px-2 py-4 font-semibold">Check In</th>
                    <th class="px-2 py-4 font-semibold">Check Out</th>
                    <th class="px-2 py-4 font-semibold text-center">Status</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-slate-800 bg-slate-900/50">
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-slate-800/60 transition-colors duration-150">
                        <td class="px-2 py-4 font-medium text-white">{{ $booking->rooms->room_name}}</td>
                        <td class="px-2 py-4 font-semibold text-amber-100">{{ $booking->name }}</td>
                        <td class="px-2 py-4 text-gray-400">{{ $booking->email }}</td>
                        <td class="px-2 py-4">{{ $booking->phone }}</td>
                        <td class="px-2 py-4 text-emerald-400 font-medium">{{ $booking->check_in }}</td>
                        <td class="px-2 py-4 text-red-400 font-medium">{{ $booking->check_out }}</td>
                        <td class="px-2 py-4 text-center">
                            @if ($booking->status == 'confirmed')
                              <span class="px-2 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                              </span>
                            @elseif ($booking->status == 'pending')
                               <span class="px-2 py-1 bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                               </span>
                            @else
                               <span class="px-2 py-1 bg-red-500/10 text-red-400 border border-red-500/20 text-xs rounded-full font-semibold">
                                {{ $booking->status }}
                               </span> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
